<x-app-layout title="Transaction Details">
    <div class="mb-6">
        <a href="{{ route('admin.transactions.index') }}" class="link-back">&larr; Back</a>
        <h1 class="page-title mt-2">Transaction #{{ $transaction->id }}</h1>
    </div>

    <div class="card max-w-lg space-y-3 text-sm">
        <div class="detail-row"><span>Cashier:</span> <span>{{ $transaction->user->fullname }} ({{ $transaction->user->username }})</span></div>
        <div class="detail-row"><span>Type:</span>
            <span class="badge {{ $transaction->type === 'load' ? 'badge-success' : 'badge-warning' }}">{{ ucfirst($transaction->type) }}</span>
        </div>
        <div class="detail-row"><span>₱1:</span> <span>{{ $transaction->coin_1 }}</span></div>
        <div class="detail-row"><span>₱5:</span> <span>{{ $transaction->coin_5 }}</span></div>
        <div class="detail-row"><span>₱10:</span> <span>{{ $transaction->coin_10 }}</span></div>
        <div class="detail-row"><span>₱20:</span> <span>{{ $transaction->coin_20 }}</span></div>
        <div class="detail-row"><span>Total:</span> <span class="text-xl font-bold text-powder-light">₱{{ number_format($transaction->total_amount) }}</span></div>
        @if ($transaction->notes)
            <div class="detail-row"><span>Notes:</span> <span>{{ $transaction->notes }}</span></div>
        @endif
        <div class="detail-row"><span>Date:</span> <span>{{ $transaction->created_at->format('F d, Y H:i:s') }}</span></div>
    </div>
</x-app-layout>
