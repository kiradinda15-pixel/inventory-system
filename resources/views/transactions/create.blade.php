<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between" style="margin-bottom: 18px;">
            <h2 style="font-size: 56px; font-weight: 800; line-height: 1.1; color: white;">
                Tambah Transaksi
            </h2>

            <a href="{{ route('transactions.index') }}"
                style="width: 100px; height: 56px;"
                class="inline-flex min-w-[180px] items-center justify-center rounded-2xl border border-white/15 bg-white/10 px-8 py-3 text-base font-bold text-white transition hover:bg-white/15">
                Kembali
            </a>
        </div>
    </x-slot>

    <div class="pb-8 px-4">
        <div class="max-w-4xl mx-auto">

            @if(session('error'))
                <div
                    id="errorAlert"
                    class="mb-6 rounded-2xl border border-red-300/20 bg-red-500/15 px-6 py-4 text-red-100 font-semibold shadow-lg transition-all duration-500">
                    {{ session('error') }}
                </div>
            @endif

            <div class="bg-white/10 border border-white/10 rounded-3xl p-6 backdrop-blur-md">
                <form action="{{ route('transactions.store') }}" method="POST" class="space-y-5">
                    @csrf

                    <div>
                        <label class="block mb-2 text-sm font-bold text-white">
                            Barang
                        </label>
                    
                        <input
                            type="text"
                            name="item_name"
                            list="itemsList"
                            class="w-full rounded-2xl border border-white/15 bg-white px-6 py-3 text-base outline-none focus:border-pink-400 focus:ring-2 focus:ring-pink-400/30"
                            style="color: #111827;"
                            placeholder="Ketik atau pilih barang..."
                            required
                        >
                    
                        <datalist id="itemsList">
                            @foreach($items as $item)
                                <option value="{{ $item->name }}"></option>
                            @endforeach
                        </datalist>
                    </div>

                    <div>
                        <label class="block mb-2 text-sm font-bold text-white">
                            Type
                        </label>
                        <select
                            name="type"
                            class="w-full rounded-2xl border border-white/15 bg-white px-6 py-3 text-base outline-none focus:border-pink-400 focus:ring-2 focus:ring-pink-400/30"
                            style="color: #111827; -webkit-text-fill-color: #111827;"
                            required>
                            <option value="IN">IN</option>
                            <option value="OUT">OUT</option>
                        </select>
                    </div>

                    <div>
                        <label class="block mb-2 text-sm font-bold text-white">
                            Quantity
                        </label>
                        <input
                            type="number"
                            name="quantity"
                            min="1"
                            class="w-full rounded-2xl border border-white/15 bg-white px-6 py-3 text-base outline-none focus:border-pink-400 focus:ring-2 focus:ring-pink-400/30"
                            style="color: #111827; -webkit-text-fill-color: #111827; caret-color: #111827;"
                            required
                        >
                    </div>

                    <div>
                        <label class="block mb-2 text-sm font-bold text-white">
                            Tanggal
                        </label>
                        <input
                            type="date"
                            name="date"
                            class="w-full rounded-2xl border border-white/15 bg-white px-6 py-3 text-base outline-none focus:border-pink-400 focus:ring-2 focus:ring-pink-400/30"
                            style="color: #111827; -webkit-text-fill-color: #111827; caret-color: #111827;"
                            required
                        >
                    </div>

                    <div class="flex justify-end gap-3 pt-4">
                        <a href="{{ route('transactions.index') }}"
                           style="width: 100px; height: 56px;"
                           class="flex items-center justify-center rounded-2xl border border-white/15 bg-white/10 text-base font-bold text-white transition hover:bg-white/15">
                            Batal
                        </a>

                        <button
                            type="submit"
                            style="width: 100px; height: 56px;"
                            class="flex items-center justify-center rounded-2xl bg-gradient-to-r from-pink-500 to-purple-600 text-base font-bold text-white shadow-lg transition hover:opacity-95">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>