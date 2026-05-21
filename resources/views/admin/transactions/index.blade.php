<x-app-layout title="All Transactions">
    <div class="mb-6">
        <h1 class="text-3xl font-extrabold text-white">All Transactions</h1>
        <p class="text-zinc-400">Complete transaction history across all cashiers</p>
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
                        <td class="font-bold text-red-400">₱{{ number_format($tx->total_amount) }}</td>
                        <td>{{ $tx->created_at->format('M d, Y H:i') }}</td>
                        <td><a href="{{ route('admin.transactions.show', $tx) }}" class="text-red-400 hover:text-red-300">View</a></td>
                    </tr>
                @empty
                    <tr><td colspan="10" class="text-center text-zinc-500">No transactions yet.</td></tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-4">{{ $transactions->links() }}</div>
    </div>
</x-app-layout>
