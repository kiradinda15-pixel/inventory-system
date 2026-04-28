<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between" style="margin-bottom: 18px;">
            <h2 style="font-size: 56px; font-weight: 800; line-height: 1.1; color: white;">
                Data Supplier
            </h2>

            <a href="{{ route('suppliers.create') }}"
               class="inline-flex min-w-[240px] items-center justify-center rounded-2xl bg-gradient-to-r from-pink-500 to-purple-600 px-8 py-3 text-base font-bold text-white shadow-lg transition hover:opacity-95">
                + Tambah Supplier
            </a>
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
                    <table class="w-full border-separate border-spacing-0 text-left text-sm text-white/85">
                        <thead>
                            <tr>
                                <th class="px-4 py-4 border-b border-white/15 text-white font-semibold">Nama</th>
                                <th class="px-4 py-4 border-b border-white/15 text-white font-semibold">Phone</th>
                                <th class="px-4 py-4 border-b border-white/15 text-white font-semibold">Address</th>
                                <th class="px-4 py-4 border-b border-white/15 text-white font-semibold text-center">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($suppliers as $supplier)
                                <tr class="hover:bg-white/5 transition">
                                    <td class="px-4 py-4 border-b border-white/10">
                                        {{ $supplier->name }}
                                    </td>

                                    <td class="px-4 py-4 border-b border-white/10">
                                        {{ $supplier->phone }}
                                    </td>

                                    <td class="px-4 py-4 border-b border-white/10">
                                        {{ $supplier->address }}
                                    </td>

                                    <td class="px-4 py-4 border-b border-white/10 text-center">
                                        <div class="flex items-center justify-center gap-3">
                                            <a href="{{ route('suppliers.edit', $supplier->id) }}"
                                                style="transition: 0.3s;"
                                                onmouseover="this.style.background='linear-gradient(to right, #ec4899, #9333ea)'; this.style.borderColor='#ec4899';"
                                                onmouseout="this.style.background='rgba(255,255,255,0.1)'; this.style.borderColor='rgba(255,255,255,0.15)';"
                                                class="rounded-xl bg-white/10 border border-white/15 px-4 py-2 text-sm font-bold text-white">
                                                 Edit
                                             </a>
                                             
                                             <form action="{{ route('suppliers.destroy', $supplier->id) }}" method="POST"
                                                   onsubmit="return confirm('Yakin ingin menghapus supplier ini?')">
                                                 @csrf
                                                 @method('DELETE')
                                             
                                                 <button type="submit"
                                                     style="transition: 0.3s;"
                                                     onmouseover="this.style.background='#ef4444'; this.style.borderColor='#f87171';"
                                                     onmouseout="this.style.background='rgba(239,68,68,0.2)'; this.style.borderColor='rgba(252,165,165,0.2)';"
                                                     class="rounded-xl bg-red-500/20 border border-red-300/20 px-4 py-2 text-sm font-bold text-red-100">
                                                     Delete
                                                 </button>
                                             </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-4 py-6 text-center text-white/60">
                                        Belum ada data supplier
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