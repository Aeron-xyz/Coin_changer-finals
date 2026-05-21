<x-app-layout title="Cashier Dashboard">
    <div class="mb-8">
        <h1 class="text-3xl font-extrabold text-white">Welcome, {{ auth()->user()->fullname }}</h1>
        <p class="mt-1 text-zinc-400">Coin changer cashier panel</p>
    </div>

    <div class="mb-8 grid gap-6 sm:grid-cols-2">
        <div class="card">
            <p class="text-sm text-zinc-400">Today's Transactions</p>
            <p class="mt-2 text-4xl font-extrabold text-red-500">{{ $stats['today_transactions'] }}</p>
        </div>
        <div class="card">
            <p class="text-sm text-zinc-400">Total Transactions</p>
            <p class="mt-2 text-4xl font-extrabold text-white">{{ $stats['total_transactions'] }}</p>
        </div>
    </div>

    <div class="card">
        <h3 class="mb-4 text-lg font-bold text-white">Current Coin Stock</h3>
        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
            @foreach ($stats['inventory'] as $item)
                <div class="rounded-lg border border-zinc-800 bg-zinc-950 p-4 text-center">
                    <p class="text-sm text-zinc-400">₱{{ $item->coin_value }}</p>
                    <p class="text-2xl font-bold text-white">{{ number_format($item->quantity) }}</p>
                </div>
            @endforeach
        </div>
        <div class="mt-4">
            <a href="{{ route('user.transactions.create') }}" class="btn-primary">New Transaction</a>
        </div>
    </div>
</x-app-layout>
