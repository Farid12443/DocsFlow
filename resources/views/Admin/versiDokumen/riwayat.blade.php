<x-app-layouts>
    <x-slot:title>
        Riwayat Versi - Dokumen
    </x-slot:title>

    <x-slot:svg>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="w-8 h-8">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
        </svg>
    </x-slot:svg>

    <x-slot:judul>
        Versi Dokumen
    </x-slot:judul>

    <x-slot:subjudul>
        Kelola versi dokumen yang telah diunggah oleh pengguna
    </x-slot:subjudul>

    <div class="p-8 bg-gray-50 rounded-2xl shadow-sm">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6 mb-8">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Riwayat Versi Dokumen</h1>
                <p class="text-gray-600 mt-1">
                    Daftar perubahan dan versi dokumen
                </p>
            </div>
        </div>

        <div class="bg-white rounded-xl p-6 shadow mb-6">
            <h2 class="font-medium text-gray-700 mb-2">Informasi Dokumen</h2>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 text-sm">
                <div>
                    <p class="text-gray-500">Judul</p>
                    <p class="font-medium">{{ $dokumen->judul }}</p>
                </div>
                <div>
                    <p class="text-gray-500">Kategori</p>
                    <p class="font-medium">{{ $dokumen->category->nama_kategori }}</p>
                </div>
                <div>
                    <p class="text-gray-500">Status</p>
                    <span class="px-2 py-1 bg-green-100 text-green-700 rounded text-xs">
                        {{ $dokumen->status }}
                    </span>
                </div>
                <div>
                    <p class="text-gray-500">Versi Aktif</p>
                    <p class="font-medium">v1.1</p>
                </div>
            </div>
        </div>


        <div class="overflow-x-auto rounded-xl border border-gray-200 bg-white shadow-sm">
            <table class="w-full text-sm border rounded-xl overflow-hidden">
                <thead class="bg-gray-100 text-gray-600">
                    <tr>
                        <th class="px-4 py-3 text-left">Versi</th>
                        <th class="px-4 py-3 text-left">Catatan Perubahan</th>
                        <th class="px-4 py-3 text-left">Diubah Oleh</th>
                        <th class="px-4 py-3 text-left">Tanggal</th>
                        <th class="px-4 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    @foreach ($versi_dokumen as $v )
                        <tr>
                            <td class="px-4 py-3 font-medium">
                                {{ $v->versi }}
                                @if ($v->is_active)
                                    <span class="ml-2 text-xs bg-green-200 text-green-700 px-2 py-0.5 rounded-full">
                                        Aktif
                                    </span>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-gray-600">{{ $v->catatan_perubahan }}</td>
                            <td class="px-4 py-3">Admin</td>
                            <td class="px-4 py-3 text-gray-500">{{ $v->updated_at->format('d M Y ') }}</td>
                            <td class="px-4 py-3 text-center space-x-2">
                                <a href="#" class="text-blue-600 hover:underline">Download</a>
                                @if ($v->is_active)
                                    <button class="text-red-500 hover:underline">
                                        Rollback
                                    </button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>    
            </table>
        </div>
    </div>

</x-app-layouts>