<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUserRequest;
use App\Http\Requests\Admin\UpdateUserRequest;
use App\Models\User;
use App\Services\ActivityLogService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class UserController extends Controller
{
    public function __construct(
        protected ActivityLogService $activityLog
    ) {}

    public function index(): View
    {
        $users = User::orderBy('fullname')->paginate(10);

        return view('admin.users.index', compact('users'));
    }

    public function create(): View
    {
        return view('admin.users.create');
    }

    public function store(StoreUserRequest $request): RedirectResponse
    {
        $user = User::create([
            'fullname' => $request->fullname,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => User::ROLE_USER,
            'status' => $request->status,
        ]);

        $this->activityLog->log(
            'create_user',
            "Created cashier account: {$user->fullname} ({$user->username})."
        );

        return redirect()->route('admin.users.index')
            ->with('success', 'Cashier account created successfully.');
    }

    public function show(User $user): View
    {
        return view('admin.users.show', compact('user'));
    }

    public function edit(User $user): View
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user): RedirectResponse
    {
        $data = [
            'fullname' => $request->fullname,
            'username' => $request->username,
            'status' => $request->status,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        $this->activityLog->log(
            'update_user',
            "Updated account: {$user->fullname} ({$user->username})."
        );

        return redirect()->route('admin.users.index')
            ->with('success', 'User updated successfully.');
    }

    public function destroy(User $user): RedirectResponse
    {
        if ($user->isAdmin()) {
            return back()->with('error', 'Cannot delete the administrator account.');
        }

        if ($user->id === auth()->id()) {
            return back()->with('error', 'You cannot delete your own account.');
        }

        $name = $user->fullname;
        $username = $user->username;
        $user->delete();

        $this->activityLog->log(
            'delete_user',
            "Deleted account: {$name} ({$username})."
        );

        return redirect()->route('admin.users.index')
            ->with('success', 'User deleted successfully.');
    }
}
