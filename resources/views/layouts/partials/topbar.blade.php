<header class="sticky top-0 z-30 flex h-16 items-center justify-between border-b border-zinc-800 bg-zinc-950/90 px-6 backdrop-blur">
    <div>
        <h2 class="text-lg font-bold text-white">{{ $title ?? 'Dashboard' }}</h2>
        <p class="text-xs text-zinc-500">@ {{ auth()->user()->username }}</p>
    </div>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn-secondary text-red-400 hover:text-red-300">
            Sign Out
        </button>
    </form>
</header>
