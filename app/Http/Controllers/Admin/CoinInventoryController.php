<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateCoinInventoryRequest;
use App\Models\CoinInventory;
use App\Services\ActivityLogService;
use App\Services\CoinInventoryService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CoinInventoryController extends Controller
{
    public function __construct(
        protected CoinInventoryService $inventoryService,
        protected ActivityLogService $activityLog
    ) {}

    public function index(): View
    {
        $inventory = CoinInventory::orderBy('coin_value')->get();
        $totalValue = $inventory->sum(fn ($item) => $item->coin_value * $item->quantity);

        return view('admin.inventory.index', compact('inventory', 'totalValue'));
    }

    public function edit(): View
    {
        $inventory = CoinInventory::orderBy('coin_value')->get();

        return view('admin.inventory.edit', compact('inventory'));
    }

    public function update(UpdateCoinInventoryRequest $request): RedirectResponse
    {
        $quantities = [];
        foreach (CoinInventory::DENOMINATIONS as $value) {
            $quantities[$value] = (int) $request->input("coin_{$value}", 0);
        }

        $this->inventoryService->updateStock($quantities);

        $this->activityLog->log(
            'update_inventory',
            'Administrator updated coin inventory stock levels.'
        );

        return redirect()->route('admin.inventory.index')
            ->with('success', 'Coin inventory updated successfully.');
    }
}
