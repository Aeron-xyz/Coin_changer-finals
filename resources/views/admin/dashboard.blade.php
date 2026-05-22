<x-app-layout title="Admin Dashboard">
    <div class="mb-8">
        <h1 class="page-title">Admin Dashboard</h1>
        <p class="page-subtitle">Overview of the coin changer system</p>
    </div>

    <div class="mb-8 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
        <div class="stat-card">
            <p class="stat-card__label">Cashiers</p>
            <p class="stat-card__value">{{ $stats['users'] }}</p>
        </div>
        <div class="stat-card">
            <p class="stat-card__label">Total Transactions</p>
            <p class="stat-card__value stat-card__value--accent">{{ $stats['transactions'] }}</p>
        </div>
        <div class="stat-card">
            <p class="stat-card__label">Inventory Value</p>
            <p class="stat-card__value">₱{{ number_format($stats['total_inventory']) }}</p>
        </div>
    </div>

    <div class="card">
        <h3 class="section-title mb-4">Recent Activity</h3>
        <div class="overflow-x-auto">
            <table class="table-dark">
                <thead>
                    <tr><th>User</th><th>Action</th><th>Description</th><th>Date</th></tr>
                </thead>
                <tbody>
                    @forelse ($stats['recent_logs'] as $log)
                        <tr>
                            <td>{{ $log->user?->fullname ?? '—' }}</td>
                            <td><span class="badge badge-info">{{ $log->action }}</span></td>
                            <td class="max-w-xs truncate">{{ $log->description }}</td>
                            <td>{{ $log->created_at->format('M d, Y H:i') }}</td>
                        </tr>
                    @empty
                        <tr><td colspan="4" class="py-8 text-center text-powder-dark">No activity yet.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <a href="{{ route('admin.activity-logs.index') }}" class="link-action mt-4 inline-block">View all logs</a>
    </div>
</x-app-layout>
