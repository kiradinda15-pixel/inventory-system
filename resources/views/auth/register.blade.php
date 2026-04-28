<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" class="space-y-4 max-w-sm mx-auto">
        @csrf

        <div>
            <label for="name" class="block mb-2 text-sm font-semibold text-white/90">
                Name
            </label>
            <input
                id="name"
                type="text"
                name="name"
                value="{{ old('name') }}"
                required
                autofocus
                autocomplete="name"
                placeholder="Enter your name"
                class="w-full rounded-2xl border border-white/15 bg-white/10 px-3 py-2.5 text-base text-white placeholder-white/40 outline-none focus:border-pink-400 focus:ring-2 focus:ring-pink-400/30"
            >
            @error('name')
                <p class="mt-2 text-sm text-pink-200">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="email" class="block mb-2 text-sm font-semibold text-white/90">
                Email
            </label>
            <input
                id="email"
                type="email"
                name="email"
                value="{{ old('email') }}"
                required
                autocomplete="username"
                placeholder="Enter your email"
             class="w-full rounded-xl border border-white/15 bg-white/10 px-3 py-2.5 text-sm text-white placeholder-white/40 outline-none focus:border-pink-400 focus:ring-2 focus:ring-pink-400/30"
            >
            @error('email')
                <p class="mt-2 text-sm text-pink-200">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="password" class="block mb-1.5 text-xs font-semibold text-white/90">
                Password
            </label>
            <input
                id="password"
                type="password"
                name="password"
                required
                autocomplete="new-password"
                placeholder="Create a password"
                class="w-full rounded-2xl border border-white/15 bg-white/10 px-3 py-2.5 text-base text-white placeholder-white/40 outline-none focus:border-pink-400 focus:ring-2 focus:ring-pink-400/30"
            >
            @error('password')
                <p class="mt-2 text-sm text-pink-200">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="password_confirmation" class="block mb-2 text-sm font-semibold text-white/90">
                Confirm Password
            </label>
            <input
                id="password_confirmation"
                type="password"
                name="password_confirmation"
                required
                autocomplete="new-password"
                placeholder="Confirm your password"
                class="w-full rounded-2xl border border-white/15 bg-white/10 px-3 py-2.5 text-base text-white placeholder-white/40 outline-none focus:border-pink-400 focus:ring-2 focus:ring-pink-400/30"
            >
            @error('password_confirmation')
                <p class="mt-2 text-sm text-pink-200">{{ $message }}</p>
            @enderror
        </div>

        <button
            type="submit"
            class="w-full rounded-2xl bg-gradient-to-r from-pink-500 to-purple-600 px-3 py-2.5 text-sm md:text-base font-bold uppercase tracking-wider text-white shadow-lg transition hover:opacity-95"
        >
            Create Account
        </button>

        <p class="text-center text-sm md:text-base text-white/70">
            Already have an account?
            <a href="{{ route('login') }}" class="font-semibold text-pink-200 hover:text-white">
                Sign In
            </a>
        </p>
    </form>
</x-guest-layout>