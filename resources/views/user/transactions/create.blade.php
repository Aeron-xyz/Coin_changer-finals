<x-app-layout title="New Transaction">
    <div class="mb-6">
        <h1 class="text-3xl font-extrabold text-white">New Coin Transaction</h1>
        <p class="text-zinc-400">Load coins into the machine or dispense to customers</p>
    </div>

    <div class="grid gap-6 lg:grid-cols-2">
        <div class="card">
            <h3 class="mb-3 font-bold text-zinc-300">Current Stock</h3>
            <div class="grid grid-cols-2 gap-3">
                @foreach ($inventory as $item)
                    <div class="rounded-lg bg-zinc-950 p-3 text-center">
                        <p class="text-xs text-zinc-500">₱{{ $item->coin_value }}</p>
                        <p class="text-lg font-bold">{{ number_format($item->quantity) }}</p>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="card">
            <form method="POST" action="{{ route('user.transactions.store') }}" class="space-y-5" id="transaction-form">
                @csrf

                <div>
                    <label class="form-label">Transaction Type</label>
                    <div class="mt-2 flex gap-4">
                        <label class="flex items-center gap-2">
                            <input type="radio" name="type" value="load" class="text-red-600 focus:ring-red-500" checked />
                            <span>Load (add coins)</span>
                        </label>
                        <label class="flex items-center gap-2">
                            <input type="radio" name="type" value="dispense" class="text-red-600 focus:ring-red-500" />
                            <span>Dispense (give coins)</span>
                        </label>
                    </div>
                    <x-input-error :messages="$errors->get('type')" class="mt-1" />
                </div>

                @foreach ([1, 5, 10, 20] as $value)
                    <div>
                        <label class="form-label" for="coin_{{ $value }}">₱{{ $value }} coins — quantity</label>
                        <input id="coin_{{ $value }}" name="coin_{{ $value }}" type="number" min="0" value="{{ old('coin_'.$value, 0) }}"
                               class="form-input coin-qty" data-value="{{ $value }}" />
                    </div>
                @endforeach

                <div class="rounded-lg border border-zinc-700 bg-zinc-950 p-4">
                    <p class="text-sm text-zinc-400">Estimated total</p>
                    <p class="text-3xl font-extrabold text-red-500" id="total-display">₱0</p>
                </div>

                <div>
                    <label class="form-label" for="notes">Notes (optional)</label>
                    <textarea id="notes" name="notes" rows="2" class="form-input">{{ old('notes') }}</textarea>
                </div>

                <button type="submit" class="btn-primary w-full">Submit Transaction</button>
            </form>
        </div>
    </div>

    <script>
        document.querySelectorAll('.coin-qty').forEach(input => {
            input.addEventListener('input', updateTotal);
        });
        function updateTotal() {
            let total = 0;
            document.querySelectorAll('.coin-qty').forEach(input => {
                total += (parseInt(input.value) || 0) * parseInt(input.dataset.value);
            });
            document.getElementById('total-display').textContent = '₱' + total.toLocaleString();
        }
    </script>
</x-app-layout>
