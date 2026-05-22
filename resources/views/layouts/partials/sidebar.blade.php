@php
    $isAdmin = auth()->user()->isAdmin();
    $links = $isAdmin
        ? [
            ['route' => 'admin.dashboard', 'prefix' => 'admin.dashboard', 'label' => 'Dashboard', 'icon' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6'],
            ['route' => 'admin.users.index', 'prefix' => 'admin.users', 'label' => 'User Management', 'icon' => 'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z'],
            ['route' => 'admin.inventory.index', 'prefix' => 'admin.inventory', 'label' => 'Coin Inventory', 'icon' => 'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z'],
            ['route' => 'admin.transactions.index', 'prefix' => 'admin.transactions', 'label' => 'Transactions', 'icon' => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2'],
            ['route' => 'admin.activity-logs.index', 'prefix' => 'admin.activity-logs', 'label' => 'Activity Logs', 'icon' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z'],
        ]
        : [
            ['route' => 'user.dashboard', 'prefix' => 'user.dashboard', 'label' => 'Dashboard', 'icon' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6'],
            ['route' => 'user.transactions.create', 'prefix' => 'user.transactions.create', 'label' => 'New Transaction', 'icon' => 'M12 6v6m0 0v6m0-6h6m-6 0H6'],
            ['route' => 'user.transactions.history', 'prefix' => 'user.transactions', 'label' => 'My History', 'icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z'],
            ['route' => 'user.inventory.index', 'prefix' => 'user.inventory', 'label' => 'Coin Inventory', 'icon' => 'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z'],
        ];
@endphp

<aside id="sidebar" class="app-sidebar">
    <div class="flex h-16 items-center border-b border-charcoal-border px-5">
        <span class="font-display text-lg font-bold text-offwhite">
            Lukas <span class="text-powder">Gaming Center</span>
        </span>
    </div>

    <nav class="flex-1 space-y-0.5 px-3 py-4">
        @foreach ($links as $link)
            @php $active = request()->routeIs($link['prefix']) || request()->routeIs($link['prefix'].'.*'); @endphp
            <a href="{{ route($link['route']) }}" class="app-sidebar-link {{ $active ? 'app-sidebar-link--active' : '' }}">
                <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="{{ $link['icon'] }}"/>
                </svg>
                {{ $link['label'] }}
            </a>
        @endforeach
    </nav>

    <div class="border-t border-charcoal-border p-4">
        <div class="flex items-center gap-3">
            <div class="app-avatar">{{ strtoupper(substr(auth()->user()->fullname, 0, 1)) }}</div>
            <div class="min-w-0 flex-1">
                <p class="truncate text-sm font-semibold text-offwhite">{{ auth()->user()->fullname }}</p>
                <p class="text-xs text-powder-dark">{{ $isAdmin ? 'Administrator' : 'Cashier' }}</p>
            </div>
        </div>
    </div>
</aside>
