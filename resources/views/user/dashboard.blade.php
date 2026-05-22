<x-app-layout title="Cashier Dashboard">
    <div class="mb-8">
        <h1 class="page-title">Welcome, {{ auth()->user()->fullname }}</h1>
        <p class="page-subtitle">Coin changer cashier panel</p>
    </div>

    <div class="mb-8 grid gap-6 sm:grid-cols-2">
        <div class="stat-card">
            <p class="stat-card__label">Today's Transactions</p>
            <p class="stat-card__value stat-card__value--accent">{{ $stats['today_transactions'] }}</p>
        </div>
        <div class="stat-card">
            <p class="stat-card__label">Total Transactions</p>
            <p class="stat-card__value">{{ $stats['total_transactions'] }}</p>
        </div>
    </div>

    <div class="card">
        <div class="mb-6 flex items-center justify-between">
            <h3 class="section-title">Current Coin Stock</h3>
            <a href="{{ route('user.transactions.create') }}" class="btn-primary">New Transaction</a>
        </div>
        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
            @foreach ($stats['inventory'] as $item)
                <div class="app-tile">
                    <p class="text-sm text-powder">₱{{ $item->coin_value }}</p>
                    <p class="mt-2 text-2xl font-bold text-offwhite">{{ number_format($item->quantity) }}</p>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
