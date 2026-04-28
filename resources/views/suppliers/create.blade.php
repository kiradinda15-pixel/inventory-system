<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between" style="margin-bottom: 18px;">
            <h2 style="font-size: 56px; font-weight: 800; line-height: 1.1; color: white;">
                Tambah Supplier
            </h2>

            <a href="{{ route('suppliers.index') }}"
                style="width: 100px; height: 56px;"
                class="inline-flex min-w-[180px] items-center justify-center rounded-2xl border border-white/15 bg-white/10 px-8 py-3 text-base font-bold text-white transition hover:bg-white/15">
                Kembali
            </a>
        </div>
    </x-slot>

    <div class="pb-8 px-4">
        <div class="max-w-4xl mx-auto">

            <div class="bg-white/10 border border-white/10 rounded-3xl p-6 backdrop-blur-md">
                <form action="{{ route('suppliers.store') }}" method="POST" class="space-y-5">
                    @csrf

                    <div>
                        <label class="block mb-2 text-sm font-bold text-white">
                            Nama
                        </label>
                        <input
                            type="text"
                            name="name"
                            class="w-full rounded-2xl border border-white/15 bg-white px-6 py-3 text-base outline-none focus:border-pink-400 focus:ring-2 focus:ring-pink-400/30"
                            style="color: #111827; -webkit-text-fill-color: #111827; caret-color: #111827;"
                            required
                        >
                    </div>

                    <div>
                        <label class="block mb-2 text-sm font-bold text-white">
                            Phone
                        </label>
                        <input
                            type="text"
                            name="phone"
                            class="w-full rounded-2xl border border-white/15 bg-white px-6 py-3 text-base outline-none focus:border-pink-400 focus:ring-2 focus:ring-pink-400/30"
                            style="color: #111827; -webkit-text-fill-color: #111827; caret-color: #111827;"
                        >
                    </div>

                    <div>
                        <label class="block mb-2 text-sm font-bold text-white">
                            Address
                        </label>
                        <textarea
                            name="address"
                            rows="4"
                            class="w-full rounded-2xl border border-white/15 bg-white px-6 py-3 text-base outline-none focus:border-pink-400 focus:ring-2 focus:ring-pink-400/30"
                            style="color: #111827; -webkit-text-fill-color: #111827; caret-color: #111827;"
                        ></textarea>
                    </div>

                    <div class="flex justify-end gap-3 pt-4">
                        <a href="{{ route('suppliers.index') }}"
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