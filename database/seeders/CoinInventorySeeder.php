<?php

namespace Database\Seeders;

use App\Models\CoinInventory;
use Illuminate\Database\Seeder;

class CoinInventorySeeder extends Seeder
{
    /**
     * Initialize coin denominations with starting stock.
     */
    public function run(): void
    {
        $defaults = [
            1 => 500,
            5 => 300,
            10 => 200,
            20 => 100,
        ];

        foreach (CoinInventory::DENOMINATIONS as $value) {
            CoinInventory::updateOrCreate(
                ['coin_value' => $value],
                ['quantity' => $defaults[$value]]
            );
        }
    }
}
