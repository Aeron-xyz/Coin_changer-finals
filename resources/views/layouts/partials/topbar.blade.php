<header class="app-topbar">
    <div>
        <h2 class="font-display text-lg font-bold text-offwhite">{{ $title ?? 'Dashboard' }}</h2>
        <p class="text-xs text-powder-dark">@ {{ auth()->user()->username }}</p>
    </div>

    <form method="POST" action="{{ route('logout') }}" class="ml-auto">
        @csrf
        <button type="submit" class="btn-secondary">Sign Out</button>
    </form>
</header>
