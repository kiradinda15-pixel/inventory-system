<nav x-data="{ open: false }"
     class="fixed top-0 left-0 right-0 z-50 border-b shadow-lg backdrop-blur-xl"
     style="background: rgba(74, 18, 63, 0.95); border-color: rgba(244, 114, 182, 0.25);">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <div class="flex items-center gap-8">
                <div class="hidden sm:flex items-center gap-3">
                    <a href="{{ route('dashboard') }}"
                       class="inline-flex items-center rounded-xl px-4 py-2 text-sm font-semibold transition {{ request()->routeIs('dashboard') ? 'bg-pink-500/20 text-white border border-pink-300/30 shadow-md' : 'text-white/80 hover:text-white hover:bg-white/10 border border-transparent' }}">
                        Dashboard
                    </a>

                    <a href="{{ route('items.index') }}"
                       class="inline-flex items-center rounded-xl px-4 py-2 text-sm font-semibold transition {{ request()->routeIs('items.*') ? 'bg-pink-500/20 text-white border border-pink-300/30 shadow-md' : 'text-white/80 hover:text-white hover:bg-white/10 border border-transparent' }}">
                        Items
                    </a>

                    <a href="{{ route('suppliers.index') }}"
                       class="inline-flex items-center rounded-xl px-4 py-2 text-sm font-semibold transition {{ request()->routeIs('suppliers.*') ? 'bg-pink-500/20 text-white border border-pink-300/30 shadow-md' : 'text-white/80 hover:text-white hover:bg-white/10 border border-transparent' }}">
                        Suppliers
                    </a>

                    <a href="{{ route('transactions.index') }}"
                       class="inline-flex items-center rounded-xl px-4 py-2 text-sm font-semibold transition {{ request()->routeIs('transactions.*') ? 'bg-pink-500/20 text-white border border-pink-300/30 shadow-md' : 'text-white/80 hover:text-white hover:bg-white/10 border border-transparent' }}">
                        Transactions
                    </a>
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-4 py-2 border text-sm leading-4 font-medium rounded-xl text-white bg-white/10 hover:bg-white/20 focus:outline-none transition ease-in-out duration-150"
                                style="border-color: rgba(244, 114, 182, 0.25);">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ms-2">
                                <svg class="fill-current h-4 w-4 text-white/70" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = !open" class="inline-flex items-center justify-center p-2 rounded-md text-white/70 hover:text-white hover:bg-white/10 focus:outline-none transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div :class="{ 'block': open, 'hidden': !open }"
         class="hidden sm:hidden border-t"
         style="background: rgba(90, 24, 74, 0.95); border-color: rgba(244, 114, 182, 0.25);">
        <div class="pt-2 pb-3 space-y-1">
            <a href="{{ route('dashboard') }}"
               class="block mx-2 rounded-xl px-4 py-2 text-base font-medium transition {{ request()->routeIs('dashboard') ? 'bg-pink-500/20 text-white border border-pink-300/30' : 'text-white/80 hover:bg-white/10 hover:text-white' }}">
                Dashboard
            </a>

            <a href="{{ route('items.index') }}"
               class="block mx-2 rounded-xl px-4 py-2 text-base font-medium transition {{ request()->routeIs('items.*') ? 'bg-pink-500/20 text-white border border-pink-300/30' : 'text-white/80 hover:bg-white/10 hover:text-white' }}">
                Items
            </a>

            <a href="{{ route('suppliers.index') }}"
               class="block mx-2 rounded-xl px-4 py-2 text-base font-medium transition {{ request()->routeIs('suppliers.*') ? 'bg-pink-500/20 text-white border border-pink-300/30' : 'text-white/80 hover:bg-white/10 hover:text-white' }}">
                Suppliers
            </a>

            <a href="{{ route('transactions.index') }}"
               class="block mx-2 rounded-xl px-4 py-2 text-base font-medium transition {{ request()->routeIs('transactions.*') ? 'bg-pink-500/20 text-white border border-pink-300/30' : 'text-white/80 hover:bg-white/10 hover:text-white' }}">
                Transactions
            </a>
        </div>

        <div class="pt-4 pb-1 border-t" style="border-color: rgba(244, 114, 182, 0.25);">
            <div class="px-4">
                <div class="font-medium text-base text-white">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-white/60">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <a href="{{ route('profile.edit') }}"
                   class="block mx-2 rounded-xl px-4 py-2 text-base font-medium text-white/80 hover:bg-white/10 hover:text-white">
                    Profile
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault(); this.closest('form').submit();"
                       class="block mx-2 rounded-xl px-4 py-2 text-base font-medium text-white/80 hover:bg-white/10 hover:text-white">
                        Log Out
                    </a>
                </form>
            </div>
        </div>
    </div>
</nav>