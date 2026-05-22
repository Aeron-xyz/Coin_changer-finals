<x-app-layout title="View User">
    <div class="mb-6">
        <a href="{{ route('admin.users.index') }}" class="link-back">&larr; Back to users</a>
        <h1 class="page-title mt-2">{{ $user->fullname }}</h1>
    </div>

    <div class="card max-w-lg space-y-4 text-sm">
        <div class="detail-row"><span>Username:</span> <span class="font-semibold">{{ $user->username }}</span></div>
        <div class="detail-row"><span>Role:</span> <span class="badge badge-info">{{ ucfirst($user->role) }}</span></div>
        <div class="detail-row"><span>Status:</span>
            <span class="badge {{ $user->status === 'active' ? 'badge-success' : 'badge-danger' }}">{{ ucfirst($user->status) }}</span>
        </div>
        <div class="detail-row"><span>Member since:</span> <span>{{ $user->created_at->format('F d, Y') }}</span></div>
        <div class="detail-row"><span>Transactions:</span> <span>{{ $user->transactions()->count() }}</span></div>
        <a href="{{ route('admin.users.edit', $user) }}" class="btn-primary inline-block">Edit User</a>
    </div>
</x-app-layout>
