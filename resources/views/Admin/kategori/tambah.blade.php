<x-app-layouts>
    <x-slot:title>
        Daftar - Kategori
    </x-slot:title>

    <x-slot:svg>
        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
            </path>
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