<x-app-layout title="View User">
    <div class="mb-6">
        <a href="{{ route('admin.users.index') }}" class="text-sm text-zinc-400 hover:text-white">&larr; Back to users</a>
        <h1 class="mt-2 text-3xl font-extrabold text-white">{{ $user->fullname }}</h1>
    </div>

    <div class="card max-w-lg space-y-4">
        <div><span class="text-zinc-500">Username:</span> <span class="font-semibold">{{ $user->username }}</span></div>
        <div><span class="text-zinc-500">Role:</span> <span class="badge badge-info">{{ ucfirst($user->role) }}</span></div>
        <div><span class="text-zinc-500">Status:</span>
            <span class="badge {{ $user->status === 'active' ? 'badge-success' : 'badge-danger' }}">{{ ucfirst($user->status) }}</span>
        </div>
        <div><span class="text-zinc-500">Member since:</span> {{ $user->created_at->format('F d, Y') }}</div>
        <div><span class="text-zinc-500">Transactions:</span> {{ $user->transactions()->count() }}</div>

        <a href="{{ route('admin.users.edit', $user) }}" class="btn-primary inline-block">Edit User</a>
    </div>
</x-app-layout>
