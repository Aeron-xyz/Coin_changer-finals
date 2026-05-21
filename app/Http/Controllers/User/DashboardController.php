<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CoinInventory;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $user = Auth::user();

        $stats = [
            'today_transactions' => Transaction::where('user_id', $user->id)
                ->whereDate('created_at', today())
                ->count(),
            'total_transactions' => Transaction::where('user_id', $user->id)->count(),
            'inventory' => CoinInventory::orderBy('coin_value')->get(),
        ];

        return view('user.dashboard', compact('stats'));
    }
}
