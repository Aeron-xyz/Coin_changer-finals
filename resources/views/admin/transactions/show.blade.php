<x-app-layout title="Transaction Details">
    <div class="mb-6">
        <a href="{{ route('admin.transactions.index') }}" class="text-sm text-zinc-400 hover:text-white">&larr; Back</a>
        <h1 class="mt-2 text-3xl font-extrabold text-white">Transaction #{{ $transaction->id }}</h1>
    </div>

    <div class="card max-w-lg space-y-3">
        <div><span class="text-zinc-500">Cashier:</span> {{ $transaction->user->fullname }} ({{ $transaction->user->username }})</div>
        <div><span class="text-zinc-500">Type:</span>
            <span class="badge {{ $transaction->type === 'load' ? 'badge-success' : 'badge-warning' }}">{{ ucfirst($transaction->type) }}</span>
        </div>
        <div><span class="text-zinc-500">₱1:</span> {{ $transaction->coin_1 }}</div>
        <div><span class="text-zinc-500">₱5:</span> {{ $transaction->coin_5 }}</div>
        <div><span class="text-zinc-500">₱10:</span> {{ $transaction->coin_10 }}</div>
        <div><span class="text-zinc-500">₱20:</span> {{ $transaction->coin_20 }}</div>
        <div><span class="text-zinc-500">Total:</span> <span class="text-xl font-bold text-red-500">₱{{ number_format($transaction->total_amount) }}</span></div>
        @if ($transaction->notes)
            <div><span class="text-zinc-500">Notes:</span> {{ $transaction->notes }}</div>
        @endif
        <div><span class="text-zinc-500">Date:</span> {{ $transaction->created_at->format('F d, Y H:i:s') }}</div>
    </div>
</x-app-layout>
