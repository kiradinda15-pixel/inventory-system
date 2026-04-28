<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between" style="margin-bottom: 18px;">
            <h2 style="font-size: 56px; font-weight: 800; line-height: 1.1; color: white;">
                Data Transaksi
            </h2>

            <div class="flex items-center gap-3">
                <a href="{{ route('transactions.export') }}"
                   class="inline-flex min-w-[170px] items-center justify-center rounded-2xl border border-emerald-300/20 bg-emerald-500/20 px-6 py-3 text-base font-bold text-emerald-100 shadow-lg transition hover:bg-emerald-500/30">
                    Export Excel
                </a>

                <a href="{{ route('transactions.create') }}"
                   class="inline-flex min-w-[220px] items-center justify-center rounded-2xl bg-gradient-to-r from-pink-500 to-purple-600 px-8 py-3 text-base font-bold text-white shadow-lg transition hover:opacity-95">
                    + Tambah Transaksi
                </a>
            </div>
        </div>
    </x-slot>

    <div class="pb-8 px-4">
        <div class="max-w-7xl mx-auto space-y-6">

            @if(session('success'))
                <div
                    id="successAlert"
                    class="mb-6 rounded-2xl border border-emerald-300/20 bg-emerald-500/15 px-6 py-4 text-emerald-100 font-semibold shadow-lg transition-all duration-500">
                    {{ session('success') }}
                </div>

                <script>
                    setTimeout(function () {
                        const alert = document.getElementById('successAlert');

                        if (alert) {
                            alert.style.opacity = '0';
                            alert.style.transform = 'translateY(-10px)';

                            setTimeout(() => {
                                alert.remove();
                            }, 500);
                        }
                    }, 2500);
                </script>
            @endif

            <div class="bg-white/10 border border-white/10 rounded-3xl p-6 backdrop-blur-md">
                <div class="overflow-x-auto">
                    <table class="w-full border-collapse text-white/85">
                        <thead>
                            <tr class="border-b border-white/30">
                                <th class="px-6 py-6 text-center text-lg font-extrabold text-white">Barang</th>
                                <th class="px-6 py-6 text-center text-lg font-extrabold text-white">Type</th>
                                <th class="px-6 py-6 text-center text-lg font-extrabold text-white">Qty</th>
                                <th class="px-6 py-6 text-center text-lg font-extrabold text-white">Tanggal</th>
                            </tr>
                        </thead>
                    
                        <tbody>
                            @forelse($transactions as $t)
                                <tr class="border-b border-white/15 hover:bg-white/5 transition">
                                    <td class="px-6 py-6 text-center">
                                        {{ $t->item->name }}
                                    </td>
                    
                                    <td class="px-6 py-6 text-center">
                                        @php
                                            $type = strtolower(trim($t->type));
                                        @endphp
                    
                                        @if($type == 'in' || $type == 'masuk')
                                            <span
                                                style="background-color: #22c55e; color: white; border: 1px solid #86efac;"
                                                class="inline-block px-4 py-1.5 rounded-full text-sm font-bold">
                                                IN
                                            </span>
                                        @elseif($type == 'out' || $type == 'keluar')
                                            <span
                                                style="background-color: #ef4444; color: white; border: 1px solid #fca5a5;"
                                                class="inline-block px-4 py-1.5 rounded-full text-sm font-bold">
                                                OUT
                                            </span>
                                        @else
                                            <span
                                                style="background-color: #6b7280; color: white; border: 1px solid #d1d5db;"
                                                class="inline-block px-4 py-1.5 rounded-full text-sm font-bold">
                                                {{ strtoupper($t->type) }}
                                            </span>
                                        @endif
                                    </td>
                    
                                    <td class="px-6 py-6 text-center">
                                        {{ $t->quantity }}
                                    </td>
                    
                                    <td class="px-6 py-6 text-center">
                                        {{ $t->date }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-10 text-center text-white/60">
                                        Belum ada data transaksi
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