<x-user-layout>
    <x-slot:title>
        Dashboard User
    </x-slot:title>

    <x-slot:svg>
        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M3 12h18M3 17h18" />
        </svg>
    </x-slot:svg>

    <x-slot:judul>
        Dokumen Saya
    </x-slot:judul>

    <x-slot:subjudul>
        Daftar dokumen yang bisa Anda akses
    </x-slot:subjudul>

    <!-- Statistik Ringkas -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
        <div class="bg-white border rounded-xl p-5 shadow-sm">
            <p class="text-sm text-gray-500">Total Dokumen</p>
            <p class="text-2xl font-semibold text-gray-800">12</p>
        </div>

        <div class="bg-white border rounded-xl p-5 shadow-sm">
            <p class="text-sm text-gray-500">Dokumen Aktif</p>
            <p class="text-2xl font-semibold text-blue-600">9</p>
        </div>

        <div class="bg-white border rounded-xl p-5 shadow-sm">
            <p class="text-sm text-gray-500">Terakhir Dibuka</p>
            <p class="text-sm text-gray-800 mt-1">Pedoman Kepegawaian</p>
        </div>
    </div>

    <!-- List Dokumen -->
    <div class="bg-white border rounded-xl shadow-sm overflow-hidden">
        <div class="px-6 py-4 border-b">
            <h2 class="font-semibold text-gray-700">Daftar Dokumen</h2>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-gray-50 text-gray-600">
                    <tr>
                        <th class="px-6 py-3 text-left">Judul</th>
                        <th class="px-6 py-3 text-left">Kategori</th>
                        <th class="px-6 py-3 text-left">Versi</th>
                        <th class="px-6 py-3 text-left">Status</th>
                        <th class="px-6 py-3 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y">
                    <!-- Dummy Data -->
                    <tr>
                        <td class="px-6 py-4 font-medium text-gray-800">
                            Pedoman Kepegawaian
                        </td>
                        <td class="px-6 py-4 text-gray-600">
                            Internal
                        </td>
                        <td class="px-6 py-4">
                            v1.2
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 text-xs rounded bg-green-100 text-green-700">
                                Aktif
                            </span>
                        </td>
                        <td class="px-6 py-4 text-center space-x-2">
                            <a href="#" class="text-blue-600 hover:underline">
                                Lihat
                            </a>
                            <a href="#" class="text-gray-600 hover:underline">
                                Download
                            </a>
                        </td>
                    </tr>

                    <tr>
                        <td class="px-6 py-4 font-medium text-gray-800">
                            SOP Absensi
                        </td>
                        <td class="px-6 py-4 text-gray-600">
                            Operasional
                        </td>
                        <td class="px-6 py-4">
                            v1.0
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 text-xs rounded bg-gray-100 text-gray-600">
                                Arsip
                            </span>
                        </td>
                        <td class="px-6 py-4 text-center space-x-2">
                            <a href="#" class="text-blue-600 hover:underline">
                                Lihat
                            </a>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>

</x-user-layout>