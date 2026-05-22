<x-app-layout title="Add Cashier">
    <div class="mb-6">
        <a href="{{ route('admin.users.index') }}" class="link-back">&larr; Back to users</a>
        <h1 class="page-title mt-2">Add New Cashier</h1>
    </div>

    <div class="card max-w-xl">
        <form method="POST" action="{{ route('admin.users.store') }}" class="space-y-5">
            @csrf
            <div>
                <label class="form-label" for="fullname">Full Name</label>
                <input id="fullname" name="fullname" type="text" value="{{ old('fullname') }}" class="form-input" required />
                <x-input-error :messages="$errors->get('fullname')" class="mt-1" />
            </div>
            <div>
                <label class="form-label" for="username">Username</label>
                <input id="username" name="username" type="text" value="{{ old('username') }}" class="form-input" required />
                <x-input-error :messages="$errors->get('username')" class="mt-1" />
            </div>
            <div>
                <label class="form-label" for="password">Password</label>
                <input id="password" name="password" type="password" class="form-input" required />
                <x-input-error :messages="$errors->get('password')" class="mt-1" />
            </div>
            <div>
                <label class="form-label" for="password_confirmation">Confirm Password</label>
                <input id="password_confirmation" name="password_confirmation" type="password" class="form-input" required />
            </div>
            <div>
                <label class="form-label" for="status">Status</label>
                <select id="status" name="status" class="form-input">
                    <option value="active" @selected(old('status') === 'active')>Active</option>
                    <option value="inactive" @selected(old('status') === 'inactive')>Inactive</option>
                </select>
                <x-input-error :messages="$errors->get('status')" class="mt-1" />
            </div>
            <button type="submit" class="btn-primary">Create Cashier</button>
        </form>
    </div>
</x-app-layout>
