<x-app-layout title="Coin Inventory">
    <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-3xl font-extrabold text-white">Coin Inventory</h1>
            <p class="text-zinc-400">Total value: <span class="font-bold text-red-500">₱{{ number_format($totalValue) }}</span></p>
        </div>
        <a href="{{ route('admin.inventory.edit') }}" class="btn-primary">Update Stock</a>
    </div>

    <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
        @foreach ($inventory as $item)
            <div class="card text-center">
                <p class="text-sm text-zinc-400">₱{{ $item->coin_value }} Coin</p>
                <p class="mt-2 text-4xl font-extrabold text-white">{{ number_format($item->quantity) }}</p>
                <p class="mt-1 text-xs text-zinc-500">Value: ₱{{ number_format($item->coin_value * $item->quantity) }}</p>
            </div>
        @endforeach
    </div>
</x-app-layout>
