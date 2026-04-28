<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between" style="margin-bottom: 18px;">
            <h2 style="font-size: 56px; font-weight: 800; line-height: 1.1; color: white;">
                Data Barang
            </h2>

            <a href="{{ route('items.create') }}"
            style="width: 100px; height: 56px;"
            class="inline-flex items-center justify-center rounded-2xl bg-gradient-to-r from-pink-500 to-purple-600 text-base font-bold text-white shadow-lg transition hover:opacity-95">
             + Tambah Barang
         </a>
        </div>
    </x-slot>

    <div class="pb-8 px-4">
        <div class="max-w-7xl mx-auto space-y-6">

            <div class="bg-white/10 border border-white/10 rounded-xl p-6 backdrop-blur-md">
                <form action="{{ route('items.index') }}" method="GET" class="flex flex-col md:flex-row gap-4 md:items-center md:justify-between">
                    <div class="w-full md:max-w-xl">
                        <input
                            type="text"
                            name="search"
                            value="{{ request('search') }}"
                            placeholder="Cari barang..."
                            class="w-full rounded-2xl border border-white/15 bg-white px-10 py-3 text-base outline-none focus:border-pink-400 focus:ring-2 focus:ring-pink-400/30"
                            style="color: #111827; -webkit-text-fill-color: #111827; caret-color: #111827;"
                        >
                    </div>

                    <div class="flex gap-4 items-center" style="width: auto;">
                        <button
                            type="submit"
                            style="width: 100px; height: 48px;"
                            class="rounded-2xl bg-gradient-to-r from-pink-500 to-purple-600 text-base font-bold text-white shadow-lg transition hover:opacity-95">
                            Search
                        </button>
                    
                        <a href="{{ route('items.index') }}"
                           style="width: 100px; height: 48px;"
                           class="rounded-2xl border border-white/70 flex items-center justify-center text-base font-bold text-white transition hover:bg-white/10">
                            Reset
                        </a>
                    </div>
                </form>
            </div>

            <div class="bg-white/10 border border-white/10 rounded-3xl p-6 backdrop-blur-md">
                <div class="overflow-x-auto">
                    <table class="w-full border-separate border-spacing-0 text-left text-sm text-white/85">
                        <thead>
                            <tr>
                                <th class="px-4 py-4 border-b border-white/15 text-white font-semibold">Nama</th>
                                <th class="px-4 py-4 border-b border-white/15 text-white font-semibold text-center">Stock</th>
                                <th class="px-4 py-4 border-b border-white/15 text-white font-semibold text-center">Min Stock</th>
                                <th class="px-4 py-4 border-b border-white/15 text-white font-semibold">Supplier</th>
                                <th class="px-4 py-4 border-b border-white/15 text-white font-semibold text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($items as $item)
                                <tr class="hover:bg-white/5 transition">
                                    <td class="px-4 py-4 border-b border-white/10">{{ $item->name }}</td>
                                    <td class="px-4 py-4 border-b border-white/10 text-center">{{ $item->stock }}</td>
                                    <td class="px-4 py-4 border-b border-white/10 text-center">{{ $item->min_stock }}</td>
                                    <td class="px-4 py-4 border-b border-white/10">{{ $item->supplier->name ?? '-' }}</td>
                                    <td class="px-4 py-4 border-b border-white/10 text-center">
                                        @if($item->stock <= 0)
                                            <span class="inline-flex items-center rounded-full bg-red-500/15 border border-red-300/20 px-3 py-1 text-xs font-semibold text-red-200">
                                                Out of Stock
                                            </span>
                                        @elseif($item->stock <= $item->min_stock)
                                            <span class="inline-flex items-center rounded-full bg-pink-500/15 border border-pink-300/20 px-3 py-1 text-xs font-semibold text-pink-200">
                                                Low Stock
                                            </span>
                                        @else
                                            <span class="inline-flex items-center rounded-full bg-emerald-500/15 border border-emerald-300/20 px-3 py-1 text-xs font-semibold text-emerald-200">
                                                Aman
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-4 py-6 text-center text-white/60">
                                        Belum ada data barang
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>