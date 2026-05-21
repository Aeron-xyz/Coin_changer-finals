<x-app-layout title="My Transactions">
    <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-3xl font-extrabold text-white">My Transaction History</h1>
        </div>
        <a href="{{ route('user.transactions.create') }}" class="btn-primary">New Transaction</a>
    </div>

    <div class="card overflow-x-auto">
        <table class="table-dark">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Type</th>
                    <th>₱1</th>
                    <th>₱5</th>
                    <th>₱10</th>
                    <th>₱20</th>
                    <th>Total</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($transactions as $tx)
                    <tr>
                        <td>#{{ $tx->id }}</td>
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
                    </tr>
                @empty
                    <tr><td colspan="8" class="text-center text-zinc-500">No transactions yet.</td></tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-4">{{ $transactions->links() }}</div>
    </div>
</x-app-layout>
