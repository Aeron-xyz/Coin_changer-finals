<x-app-layout title="Update Inventory">
    <div class="mb-6">
        <a href="{{ route('admin.inventory.index') }}" class="link-back">&larr; Back to inventory</a>
        <h1 class="page-title mt-2">Update Coin Stock</h1>
    </div>

    <div class="card max-w-xl">
        <form method="POST" action="{{ route('admin.inventory.update') }}" class="space-y-5">
            @csrf
            @method('PUT')
            @foreach ($inventory as $item)
                <div>
                    <label class="form-label" for="coin_{{ $item->coin_value }}">₱{{ $item->coin_value }} — Quantity</label>
                    <input id="coin_{{ $item->coin_value }}" name="coin_{{ $item->coin_value }}" type="number" min="0"
                           value="{{ old('coin_'.$item->coin_value, $item->quantity) }}" class="form-input" required />
                    <x-input-error :messages="$errors->get('coin_'.$item->coin_value)" class="mt-1" />
                </div>
            @endforeach
            <button type="submit" class="btn-primary">Save Inventory</button>
        </form>
    </div>
</x-app-layout>
