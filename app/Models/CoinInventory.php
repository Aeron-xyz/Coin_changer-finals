<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CoinInventory extends Model
{
    public const DENOMINATIONS = [1, 5, 10, 20];

    protected $table = 'coin_inventory';

    /**
     * @var list<string>
     */
    protected $fillable = [
        'coin_value',
        'quantity',
    ];

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'coin_value' => 'integer',
            'quantity' => 'integer',
        ];
    }

    public static function getQuantitiesMap(): array
    {
        return self::query()
            ->orderBy('coin_value')
            ->pluck('quantity', 'coin_value')
            ->all();
    }
}
