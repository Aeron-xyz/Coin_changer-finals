<x-app-layout title="All Transactions">
    <div class="mb-6">
        <h1 class="page-title">All Transactions</h1>
        <p class="page-subtitle">Complete transaction history across all cashiers</p>
    </div>

    <div class="card overflow-x-auto">
        <table class="table-dark">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Cashier</th>
                    <th>Type</th>
                    <th>₱1</th>
                    <th>₱5</th>
                    <th>₱10</th>
                    <th>₱20</th>
                    <th>Total</th>
                    <th>Date</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($transactions as $tx)
                    <tr>
                        <td>#{{ $tx->id }}</td>
                        <td>{{ $tx->user->fullname }}</td>
                        <td>
                            <span class="badge {{ $tx->type === 'load' ? 'badge-success' : 'badge-warning' }}">
                                {{ ucfirst($tx->type) }}
                            </span>
                        </td>
                        <td>{{ $tx->coin_1 }}</td>
                        <td>{{ $tx->coin_5 }}</td>
                        <td>{{ $tx->coin_10 }}</td>
                        <td>{{ $tx->coin_20 }}</td>
                        <td class="font-bold text-powder-light">₱{{ number_format($tx->total_amount) }}</td>
                        <td>{{ $tx->created_at->format('M d, Y H:i') }}</td>
                        <td><a href="{{ route('admin.transactions.show', $tx) }}" class="link-action">View</a></td>
                    </tr>
                @empty
                    <tr><td colspan="10" class="py-8 text-center text-powder-dark">No transactions yet.</td></tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-4">{{ $transactions->links() }}</div>
    </div>
</x-app-layout>
