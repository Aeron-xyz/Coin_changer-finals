<x-app-layout title="Admin Dashboard">
    <div class="mb-8">
        <h1 class="text-3xl font-extrabold text-white">Admin Dashboard</h1>
        <p class="mt-1 text-zinc-400">Overview of the coin changer system</p>
    </div>

    <div class="mb-8 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
        <div class="card">
            <p class="text-sm font-medium text-zinc-400">Cashiers</p>
            <p class="mt-2 text-4xl font-extrabold text-white">{{ $stats['users'] }}</p>
        </div>
        <div class="card">
            <p class="text-sm font-medium text-zinc-400">Total Transactions</p>
            <p class="mt-2 text-4xl font-extrabold text-red-500">{{ $stats['transactions'] }}</p>
        </div>
        <div class="card">
            <p class="text-sm font-medium text-zinc-400">Inventory Value</p>
            <p class="mt-2 text-4xl font-extrabold text-white">₱{{ number_format($stats['total_inventory']) }}</p>
        </div>
    </div>

    <div class="card">
        <h3 class="mb-4 text-lg font-bold text-white">Recent Activity</h3>
        <div class="overflow-x-auto">
            <table class="table-dark">
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Action</th>
                        <th>Description</th>
                        <th>Date</th>
                    </tr>
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
                        <tr><td colspan="4" class="text-center text-zinc-500">No activity yet.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
