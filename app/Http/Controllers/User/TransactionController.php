<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreTransactionRequest;
use App\Models\CoinInventory;
use App\Models\Transaction;
use App\Services\ActivityLogService;
use App\Services\CoinInventoryService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use InvalidArgumentException;

class TransactionController extends Controller
{
    public function __construct(
        protected CoinInventoryService $inventoryService,
        protected ActivityLogService $activityLog
    ) {}

    public function create(): View
    {
        $inventory = CoinInventory::orderBy('coin_value')->get();

        return view('user.transactions.create', compact('inventory'));
    }

    public function store(StoreTransactionRequest $request): RedirectResponse
    {
        $coins = [
            1 => (int) $request->input('coin_1', 0),
            5 => (int) $request->input('coin_5', 0),
            10 => (int) $request->input('coin_10', 0),
            20 => (int) $request->input('coin_20', 0),
        ];

        $total = Transaction::calculateTotal($coins);

        if ($total <= 0) {
            return back()->withInput()->with('error', 'Enter at least one coin quantity.');
        }

        try {
            DB::transaction(function () use ($request, $coins, $total) {
                $this->inventoryService->applyTransaction($request->type, $coins);

                $transaction = Transaction::create([
                    'user_id' => Auth::id(),
                    'type' => $request->type,
                    'coin_1' => $coins[1],
                    'coin_5' => $coins[5],
                    'coin_10' => $coins[10],
                    'coin_20' => $coins[20],
                    'total_amount' => $total,
                    'notes' => $request->notes,
                ]);

                $this->activityLog->log(
                    'transaction',
                    strtoupper($request->type)." transaction #{$transaction->id} — ₱{$total}."
                );
            });
        } catch (InvalidArgumentException $e) {
            return back()->withInput()->with('error', $e->getMessage());
        }

        return redirect()->route('user.transactions.history')
            ->with('success', 'Transaction recorded successfully.');
    }

    public function history(): View
    {
        $transactions = Transaction::where('user_id', Auth::id())
            ->latest()
            ->paginate(15);

        return view('user.transactions.history', compact('transactions'));
    }

    public function inventory(): View
    {
        $inventory = CoinInventory::orderBy('coin_value')->get();
        $totalValue = $inventory->sum(fn ($item) => $item->coin_value * $item->quantity);

        return view('user.inventory.index', compact('inventory', 'totalValue'));
    }
}
