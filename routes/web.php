<?php

use App\Http\Controllers\Admin\ActivityLogController as AdminActivityLogController;
use App\Http\Controllers\Admin\CoinInventoryController as AdminCoinInventoryController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\TransactionController as AdminTransactionController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\User\TransactionController as UserTransactionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (Auth::check()) {
        return Auth::user()->isAdmin()
            ? redirect()->route('admin.dashboard')
            : redirect()->route('user.dashboard');
    }

    return redirect()->route('login');
});

Route::middleware(['auth', 'active'])->group(function () {
    Route::middleware('role:admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

        Route::resource('users', AdminUserController::class);

        Route::get('/inventory', [AdminCoinInventoryController::class, 'index'])->name('inventory.index');
        Route::get('/inventory/edit', [AdminCoinInventoryController::class, 'edit'])->name('inventory.edit');
        Route::put('/inventory', [AdminCoinInventoryController::class, 'update'])->name('inventory.update');

        Route::get('/transactions', [AdminTransactionController::class, 'index'])->name('transactions.index');
        Route::get('/transactions/{transaction}', [AdminTransactionController::class, 'show'])->name('transactions.show');

        Route::get('/activity-logs', [AdminActivityLogController::class, 'index'])->name('activity-logs.index');
    });

    Route::middleware('role:user')->prefix('user')->name('user.')->group(function () {
        Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');

        Route::get('/transactions/create', [UserTransactionController::class, 'create'])->name('transactions.create');
        Route::post('/transactions', [UserTransactionController::class, 'store'])->name('transactions.store');
        Route::get('/transactions/history', [UserTransactionController::class, 'history'])->name('transactions.history');

        Route::get('/inventory', [UserTransactionController::class, 'inventory'])->name('inventory.index');
    });
});

require __DIR__.'/auth.php';
