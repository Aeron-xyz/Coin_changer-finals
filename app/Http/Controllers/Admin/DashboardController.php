<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\CoinInventory;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $stats = [
            'users' => User::where('role', User::ROLE_USER)->count(),
            'transactions' => Transaction::count(),
            'total_inventory' => CoinInventory::get()
                ->sum(fn ($item) => $item->coin_value * $item->quantity),
            'recent_logs' => ActivityLog::with('user')->latest()->take(5)->get(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
