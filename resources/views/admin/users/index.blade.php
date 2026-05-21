<x-app-layout title="User Management">
    <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-3xl font-extrabold text-white">User Management</h1>
            <p class="text-zinc-400">Create and manage cashier accounts</p>
        </div>
        <a href="{{ route('admin.users.create') }}" class="btn-primary">Add New Cashier</a>
    </div>

    <div class="card overflow-x-auto">
        <table class="table-dark">
            <thead>
                <tr>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Created</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td class="font-semibold">{{ $user->fullname }}</td>
                        <td>{{ $user->username }}</td>
                        <td><span class="badge badge-info">{{ ucfirst($user->role) }}</span></td>
                        <td>
                            <span class="badge {{ $user->status === 'active' ? 'badge-success' : 'badge-danger' }}">
                                {{ ucfirst($user->status) }}
                            </span>
                        </td>
                        <td>{{ $user->created_at->format('M d, Y') }}</td>
                        <td class="space-x-2">
                            <a href="{{ route('admin.users.show', $user) }}" class="text-sm text-zinc-400 hover:text-white">View</a>
                            <a href="{{ route('admin.users.edit', $user) }}" class="text-sm text-red-400 hover:text-red-300">Edit</a>
                            @if (!$user->isAdmin())
                                <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline"
                                      onsubmit="return confirm('Delete this user?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-sm text-red-600 hover:text-red-400">Delete</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="text-center text-zinc-500">No users found.</td></tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-4">{{ $users->links() }}</div>
    </div>
</x-app-layout>
