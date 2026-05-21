@php
    $isAdmin = auth()->user()->isAdmin();
    $links = $isAdmin
        ? [
            ['route' => 'admin.dashboard', 'label' => 'Dashboard', 'icon' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6'],
            ['route' => 'admin.users.index', 'label' => 'User Management', 'icon' => 'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z'],
            ['route' => 'admin.inventory.index', 'label' => 'Coin Inventory', 'icon' => 'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z'],
            ['route' => 'admin.transactions.index', 'label' => 'All Transactions', 'icon' => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2'],
            ['route' => 'admin.activity-logs.index', 'label' => 'Activity Logs', 'icon' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z'],
        ]
        : [
            ['route' => 'user.dashboard', 'label' => 'Dashboard', 'icon' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6'],
            ['route' => 'user.transactions.create', 'label' => 'New Transaction', 'icon' => 'M12 6v6m0 0v6m0-6h6m-6 0H6'],
            ['route' => 'user.transactions.history', 'label' => 'My History', 'icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z'],
            ['route' => 'user.inventory.index', 'label' => 'Coin Inventory', 'icon' => 'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z'],
        ];
@endphp

<aside class="fixed inset-y-0 left-0 z-40 hidden w-64 flex-col border-r border-zinc-800 bg-zinc-900 lg:flex">
    <div class="flex h-16 items-center border-b border-zinc-800 px-6">
        <span class="text-xl font-extrabold text-white">Coin <span class="text-red-500">Changer</span></span>
    </div>

    <nav class="flex-1 space-y-1 px-3 py-4">
        @foreach ($links as $link)
            <a href="{{ route($link['route']) }}"
               class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-semibold transition
                      {{ request()->routeIs(str_replace('.index', '.*', $link['route'])) || request()->routeIs($link['route'])
                          ? 'bg-red-600/20 text-red-400'
                          : 'text-zinc-400 hover:bg-zinc-800 hover:text-white' }}">
                <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $link['icon'] }}"/>
                </svg>
                {{ $link['label'] }}
            </a>
        @endforeach
    </nav>

    <div class="border-t border-zinc-800 p-4">
        <p class="text-xs text-zinc-500">{{ $isAdmin ? 'Administrator' : 'Cashier' }}</p>
        <p class="truncate text-sm font-semibold text-white">{{ auth()->user()->fullname }}</p>
    </div>
</aside>
