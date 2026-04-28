<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between" style="margin-bottom: 18px;">
            <h2 style="font-size: 56px; font-weight: 800; line-height: 1.1; color: white;">
                Tambah Barang
            </h2>
        </div>
    </x-slot>

    <div class="pb-8 px-4">
        <div class="max-w-3xl mx-auto">
            <div class="bg-white/10 border border-white/10 rounded-3xl p-8 backdrop-blur-md shadow-2xl">

                <form action="{{ route('items.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <div>
                        <label class="block mb-2 text-sm font-semibold text-white/90">Nama Barang</label>
                        <input
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            class="w-full rounded-2xl border border-white/15 bg-white/10 px-4 py-3 text-white placeholder-white/40 outline-none focus:border-pink-400 focus:ring-2 focus:ring-pink-400/30"
                            placeholder="Masukkan nama barang"
                        >
                        @error('name')
                            <p class="mt-2 text-sm text-pink-200">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block mb-2 text-sm font-semibold text-white/90">Stock</label>
                            <input
                                type="number"
                                name="stock"
                                value="{{ old('stock') }}"
                                class="w-full rounded-2xl border border-white/15 bg-white/10 px-4 py-3 text-white placeholder-white/40 outline-none focus:border-pink-400 focus:ring-2 focus:ring-pink-400/30"
                                placeholder="Masukkan jumlah stock"
                            >
                            @error('stock')
                                <p class="mt-2 text-sm text-pink-200">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block mb-2 text-sm font-semibold text-white/90">Min Stock</label>
                            <input
                                type="number"
                                name="min_stock"
                                value="{{ old('min_stock') }}"
                                class="w-full rounded-2xl border border-white/15 bg-white/10 px-4 py-3 text-white placeholder-white/40 outline-none focus:border-pink-400 focus:ring-2 focus:ring-pink-400/30"
                                placeholder="Masukkan batas minimum stock"
                            >
                            @error('min_stock')
                                <p class="mt-2 text-sm text-pink-200">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label class="block mb-2 text-sm font-semibold text-white/90">Supplier</label>
                        <select name="supplier_id">
                            <option value="">Pilih supplier</option>
                            @foreach($suppliers as $supplier)
                                <option value="{{ $supplier->id }}" {{ old('supplier_id') == $supplier->id ? 'selected' : '' }}>
                                    {{ $supplier->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('supplier_id')
                            <p class="mt-2 text-sm text-pink-200">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex flex-col sm:flex-row gap-3 pt-2">
                        <button
                            type="submit"
                            class="rounded-2xl bg-gradient-to-r from-pink-500 to-purple-600 px-6 py-3 text-sm font-semibold text-white shadow-lg transition hover:opacity-95">
                            Simpan
                        </button>

                        <a href="{{ route('items.index') }}"
                           class="rounded-2xl border border-white/15 bg-white/10 px-6 py-3 text-sm font-semibold text-white text-center transition hover:bg-white/15">
                            Kembali
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>