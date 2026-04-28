<x-guest-layout>
    @if (session('status'))
        <div class="mb-4 rounded-2xl border border-pink-300/20 bg-white/10 px-4 py-3 text-sm text-pink-100">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}" class="space-y-4 max-w-sm mx-auto">
        @csrf

        <div>
            <label for="email" class="block mb-2 text-sm font-medium text-white/80">
                Email
            </label>
            <input
    id="email"
    type="email"
    name="email"
    value="{{ old('email') }}"
    required
    autofocus
    autocomplete="username"
    placeholder="Enter your email"
    class="w-full rounded-2xl border border-white/20 bg-white px-4 py-3 text-gray-900 placeholder-gray-400 outline-none transition focus:border-pink-400 focus:ring-2 focus:ring-pink-400/40"
    style="-webkit-text-fill-color: #111827; caret-color: #111827;"
>
            @error('email')
                <p class="mt-2 text-sm text-pink-200">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="password" class="block mb-2 text-sm font-medium text-white/80">
                Password
            </label>
            <input
            id="password"
            type="password"
            name="password"
            required
            autocomplete="current-password"
            placeholder="Enter your password"
            class="w-full rounded-2xl border border-white/20 bg-white px-4 py-3 text-gray-900 placeholder-gray-400 outline-none transition focus:border-pink-400 focus:ring-2 focus:ring-pink-400/40"
            style="-webkit-text-fill-color: #111827; caret-color: #111827;"
        >
            @error('password')
                <p class="mt-2 text-sm text-pink-200">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center justify-between gap-3">
            <label for="remember_me" class="inline-flex items-center text-sm text-white/70">
                <input
                    id="remember_me"
                    type="checkbox"
                    name="remember"
                    class="rounded border-white/30 bg-white/10 text-pink-500 focus:ring-pink-400"
                >
                <span class="ms-2">Remember me</span>
            </label>

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-sm text-pink-200 transition hover:text-white">
                    Forgot password?
                </a>
            @endif
        </div>

        <button
            type="submit"
            class="w-full rounded-2xl bg-gradient-to-r from-pink-500 to-purple-600 px-4 py-3 text-sm font-semibold uppercase tracking-wider text-white shadow-lg transition hover:scale-[1.02] hover:from-pink-400 hover:to-purple-500"
        >
            Sign In
        </button>

        <p class="text-center text-sm text-white/70">
            Don’t have an account?
            <a href="{{ route('register') }}" class="font-semibold text-pink-200 transition hover:text-white">
                Create Account
            </a>
        </p>
    </form>
</x-guest-layout>