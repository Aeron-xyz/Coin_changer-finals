<x-app-layout title="Coin Inventory">
    <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="page-title">Coin Inventory</h1>
            <p class="page-subtitle">Total value: <span class="text-accent">₱{{ number_format($totalValue) }}</span></p>
        </div>
        <a href="{{ route('admin.inventory.edit') }}" class="btn-primary">Update Stock</a>
    </div>

    <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
        @foreach ($inventory as $item)
            <div class="card text-center">
                <p class="text-sm text-powder">₱{{ $item->coin_value }} Coin</p>
                <p class="mt-2 text-4xl font-bold text-offwhite">{{ number_format($item->quantity) }}</p>
                <p class="mt-1 text-xs text-powder-dark">Value: ₱{{ number_format($item->coin_value * $item->quantity) }}</p>
            </div>
        @endforeach
    </div>
</x-app-layout>
