<x-guest-layout>
    <h2 class="mb-6 text-2xl font-bold text-white">Sign In</h2>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <div>
            <label for="username" class="form-label">Username</label>
            <input id="username" name="username" type="text" value="{{ old('username') }}"
                   class="form-input" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('username')" class="mt-2" />
        </div>

        <div>
            <label for="password" class="form-label">Password</label>
            <input id="password" name="password" type="password"
                   class="form-input" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center">
            <input id="remember_me" name="remember" type="checkbox"
                   class="rounded border-zinc-600 bg-zinc-800 text-red-600 focus:ring-red-500" />
            <label for="remember_me" class="ms-2 text-sm text-zinc-400">Remember me</label>
        </div>

        <button type="submit" class="btn-primary w-full py-3 text-base font-bold">
            Sign In
        </button>
    </form>
</x-guest-layout>
