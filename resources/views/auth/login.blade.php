<x-login-layout>
    <div class="login-split">
        <section class="login-split__form">
            <div class="glass-card w-full max-w-[420px] animate-float">
                <div class="mb-8 text-center">
                    <div class="mx-auto mb-3 flex h-12 w-12 items-center justify-center rounded-xl border border-powder-dark bg-charcoal-elevated">
                        <i class="fa-solid fa-gamepad text-xl text-powder-light"></i>
                    </div>
                    <p class="lgc-logo-text">
                        Lukas <span class="lgc-logo-accent">Gaming Center</span>
                    </p>
                </div>

                <h1 class="font-display text-center text-3xl font-bold tracking-tight text-offwhite sm:text-[2rem]">Sign In</h1>

                <x-auth-session-status class="mt-6 text-center text-sm text-powder-light" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="mt-8 space-y-4">
                    @csrf

                    <div>
                        <input
                            id="username"
                            name="username"
                            type="text"
                            value="{{ old('username') }}"
                            class="field-input"
                            placeholder="Username"
                            required
                            autofocus
                            autocomplete="username"
                        />
                        <x-input-error :messages="$errors->get('username')" class="mt-2 text-center text-sm text-red-400" />
                    </div>

                    <div>
                        <input
                            id="password"
                            name="password"
                            type="password"
                            class="field-input"
                            placeholder="Password"
                            required
                            autocomplete="current-password"
                        />
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-center text-sm text-red-400" />
                    </div>

                    <button type="submit" class="btn-signin">Sign In</button>
                </form>
            </div>
        </section>

        <section class="login-split__visual" aria-hidden="true">
            <img
                src="{{ asset('images/lukas-gaming-hero.png') }}"
                alt=""
                class="login-split__hero-img"
                loading="eager"
            />
            <div class="login-split__overlay login-split__overlay--hero"></div>
            <div class="circuit-pattern absolute inset-0 opacity-30"></div>
        </section>
    </div>
</x-login-layout>
