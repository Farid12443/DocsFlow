<x-app-layouts>
    <x-slot:title>
        Daftar - Kategori
    </x-slot:title>

    <x-slot:svg>
       <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round"
            d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
        </svg>
    </x-slot:svg>

    <x-slot:judul>
        Kategori
    </x-slot:judul>

    <x-slot:subjudul>
        Kelola seluruh Kategori
    </x-slot:subjudul>

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-8">
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-900">Tambah Kategori Dokumen</h2>
            <p class="text-gray-600 mt-1">
                Gunakan kategori untuk mengelompokkan dokumen agar lebih rapi
            </p>
        </div>
        <form class="space-y-5" action="/admin/tambah-kategori" method="post">
            @csrf
            @method('POST')

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Nama Kategori
                </label>
                <input name="nama_kategori" type="text" placeholder="Contoh: Surat Resmi" class="w-full rounded-lg border border-gray-300 px-4 py-2 text-sm
                       focus:outline-none focus:ring-2 focus:ring-green-500" value="{{ old('nama_kategori') }}"/>
                @error('nama_kategori')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Keterangan
                </label>
                <textarea rows="4" name="keterangan" placeholder="Deskripsi singkat tentang kategori ini..." class="w-full rounded-lg border border-gray-300 px-4 py-2 text-sm
                       focus:outline-none focus:ring-2 focus:ring-green-500">{{ old('keterangan') }}</textarea>
                @error('keterangan')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-end gap-3 pt-4 border-t">
                <button type="button" class="px-4 py-2 text-sm rounded-lg border border-gray-300 text-gray-600
                       hover:bg-gray-100 transition">
                    Batal
                </button>
                <button type="submit" class="px-5 py-2 text-sm rounded-lg bg-green-600 text-white
                       hover:bg-green-700 transition shadow">
                    Simpan Kategori
                </button>
            </div>
        </form>
    </div>


</x-app-layouts>