<x-app-layout title="Activity Logs">
    <div class="mb-6">
        <h1 class="page-title">Activity Logs</h1>
        <p class="page-subtitle">Login, logout, and system events</p>
    </div>

    <div class="card overflow-x-auto">
        <table class="table-dark">
            <thead>
                <tr>
                    <th>User</th>
                    <th>Action</th>
                    <th>Description</th>
                    <th>IP Address</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($logs as $log)
                    <tr>
                        <td>{{ $log->user?->fullname ?? '—' }}</td>
                        <td><span class="badge badge-info">{{ $log->action }}</span></td>
                        <td class="max-w-md">{{ $log->description }}</td>
                        <td class="text-powder-dark">{{ $log->ip_address }}</td>
                        <td>{{ $log->created_at->format('M d, Y H:i:s') }}</td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="py-8 text-center text-powder-dark">No logs recorded.</td></tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-4">{{ $logs->links() }}</div>
    </div>
</x-app-layout>
