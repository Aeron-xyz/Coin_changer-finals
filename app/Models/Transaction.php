<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    public const TYPE_LOAD = 'load';

    public const TYPE_DISPENSE = 'dispense';

    public const COIN_FIELDS = [
        1 => 'coin_1',
        5 => 'coin_5',
        10 => 'coin_10',
        20 => 'coin_20',
    ];

    /**
     * @var list<string>
     */
    protected $fillable = [
        'user_id',
        'type',
        'coin_1',
        'coin_5',
        'coin_10',
        'coin_20',
        'total_amount',
        'notes',
    ];

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'coin_1' => 'integer',
            'coin_5' => 'integer',
            'coin_10' => 'integer',
            'coin_20' => 'integer',
            'total_amount' => 'integer',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Calculate total peso amount from coin quantities.
     *
     * @param  array<int, int>  $coins  Keys: 1, 5, 10, 20
     */
    public static function calculateTotal(array $coins): int
    {
        $total = 0;

        foreach (CoinInventory::DENOMINATIONS as $value) {
            $qty = (int) ($coins[$value] ?? 0);
            $total += $value * $qty;
        }

        return $total;
    }

    /**
     * @return array<int, int>
     */
    public function getCoinsArray(): array
    {
        return [
            1 => $this->coin_1,
            5 => $this->coin_5,
            10 => $this->coin_10,
            20 => $this->coin_20,
        ];
    }
}
