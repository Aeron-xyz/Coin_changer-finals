<?php

namespace App\Services;

use App\Models\CoinInventory;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class CoinInventoryService
{
    /**
     * Apply a transaction to inventory (load adds coins, dispense removes).
     *
     * @param  array<int, int>  $coins
     */
    public function applyTransaction(string $type, array $coins): void
    {
        DB::transaction(function () use ($type, $coins) {
            foreach (CoinInventory::DENOMINATIONS as $value) {
                $qty = (int) ($coins[$value] ?? 0);

                if ($qty <= 0) {
                    continue;
                }

                $inventory = CoinInventory::where('coin_value', $value)->lockForUpdate()->first();

                if (! $inventory) {
                    throw new InvalidArgumentException("Coin inventory for ₱{$value} not found.");
                }

                if ($type === Transaction::TYPE_LOAD) {
                    $inventory->quantity += $qty;
                } else {
                    if ($inventory->quantity < $qty) {
                        throw new InvalidArgumentException(
                            "Insufficient ₱{$value} coins in inventory. Available: {$inventory->quantity}, requested: {$qty}."
                        );
                    }
                    $inventory->quantity -= $qty;
                }

                $inventory->save();
            }
        });
    }

    /**
     * Admin manual stock adjustment.
     *
     * @param  array<int, int>  $quantities  Full quantities per denomination
     */
    public function updateStock(array $quantities): void
    {
        foreach (CoinInventory::DENOMINATIONS as $value) {
            CoinInventory::where('coin_value', $value)->update([
                'quantity' => max(0, (int) ($quantities[$value] ?? 0)),
            ]);
        }
    }
}
