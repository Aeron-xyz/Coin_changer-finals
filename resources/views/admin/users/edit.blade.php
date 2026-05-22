<x-app-layout title="Edit User">
    <div class="mb-6">
        <a href="{{ route('admin.users.index') }}" class="link-back">&larr; Back to users</a>
        <h1 class="page-title mt-2">Edit User</h1>
    </div>

    <div class="card max-w-xl">
        <form method="POST" action="{{ route('admin.users.update', $user) }}" class="space-y-5">
            @csrf
            @method('PUT')
            <div>
                <label class="form-label" for="fullname">Full Name</label>
                <input id="fullname" name="fullname" type="text" value="{{ old('fullname', $user->fullname) }}" class="form-input" required />
                <x-input-error :messages="$errors->get('fullname')" class="mt-1" />
            </div>
            <div>
                <label class="form-label" for="username">Username</label>
                <input id="username" name="username" type="text" value="{{ old('username', $user->username) }}" class="form-input" required />
                <x-input-error :messages="$errors->get('username')" class="mt-1" />
            </div>
            <div>
                <label class="form-label" for="password">New Password <span class="text-powder-dark">(leave blank to keep)</span></label>
                <input id="password" name="password" type="password" class="form-input" />
                <x-input-error :messages="$errors->get('password')" class="mt-1" />
            </div>
            <div>
                <label class="form-label" for="password_confirmation">Confirm Password</label>
                <input id="password_confirmation" name="password_confirmation" type="password" class="form-input" />
            </div>
            <div>
                <label class="form-label" for="status">Status</label>
                <select id="status" name="status" class="form-input" @disabled($user->isAdmin())>
                    <option value="active" @selected(old('status', $user->status) === 'active')>Active</option>
                    <option value="inactive" @selected(old('status', $user->status) === 'inactive')>Inactive</option>
                </select>
                <x-input-error :messages="$errors->get('status')" class="mt-1" />
            </div>
            <button type="submit" class="btn-primary">Update User</button>
        </form>
    </div>
</x-app-layout>
