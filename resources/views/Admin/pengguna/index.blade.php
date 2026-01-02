<x-app-layouts>
    <x-slot:title>
        Daftar - Pengguna
    </x-slot:title>

    <x-slot:svg>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="w-8 h-8">
            <path stroke-linecap="round" stroke-linejoin="round"
            d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
        </svg>
        </svg>
    </x-slot:svg>

    <x-slot:judul>
        Pengguna
    </x-slot:judul>

    <x-slot:subjudul>
        Kelola seluruh Pengguna
    </x-slot:subjudul>

    <div class="p-8 bg-gray-50 rounded-2xl shadow-sm">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6 mb-8">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Daftar Pengguna</h1>
                <p class="text-gray-600 mt-1">
                    Kelola Pengguna untuk menejemen dokumen
                </p>

            </div>
            <div class="flex flex-col md:flex-row gap-4 items-center justify-end w-full md:w-auto">
                <div class="relative w-full md:w-80">
                    <input type="text" placeholder="Cari kategori..."
                        class="w-full rounded-lg border border-gray-300 px-4 py-3 pl-12 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition">
                    <svg class="absolute left-4 top-3.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m21 21-4.35-4.35m1.85-5.15a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                    </svg>
                </div>

                <div class="flex items-center gap-3">
                    <a href="/admin/tambah-kategori"
                        class="flex items-center justify-center px-4 py-3 rounded-lg bg-green-500 text-white hover:bg-green-600 hover:shadow-md transition focus:outline-none focus:ring-2 focus:ring-green-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="h-5 w-5 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        Tambah Kategori
                    </a>
                </div>
            </div>
        </div>

        <div class="overflow-x-auto rounded-xl border border-gray-200 bg-white shadow-sm">
            <table class="w-full text-sm">

                @if ($pengguna->count() > 0)
                    <thead class="bg-gray-100 text-gray-700">
                        <tr>
                            <th class="pl-6 py-3 text-left">Nama Pengguna</th>
                            <th class="px-4 py-3 text-left">Email</th>
                            <th class="px-4 py-3 text-left">Role</th>
                            <th class="px-4 py-3 text-left">Jumlah Dokumen</th>
                            <th class="px-4 py-3 text-left">Tanggal Gabung</th>
                            <th class="pr-4 py-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                @endif
            
                <tbody class="divide-y">
                    @forelse ($pengguna as $item)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="pl-6 py-3 font-medium text-gray-800"> {{Str::title($item->nama ) }} </td>
                            <td class="px-4 py-3">{{ $item->email }}</td>
                            <td class="px-4 py-3">{{Str::title($item->role ) }}</td>
                            <td class="px-4 py-3">{{ $item->documents_count ?? 0 }}</td>
                            <td class="px-4 py-3 text-left text-gray-500"> {{ $item->updated_at }} </td>
                            
                            <td class="pr-4 py-3 text-center">
                                <div class="relative group"> 
                                    <button data-action-btn
                                        class="rounded-md bg-gray-100 p-2 text-gray-600 hover:bg-gray-200 transition"> <svg
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z" />
                                        </svg> 
                                    </button>
                                    <div data-tooltip
                                        class="fixed w-48 bg-white border border-gray-200 rounded-md shadow-lg opacity-0 pointer-events-none transition z-9999">
                                        <a href="#"
                                            class="flex items-center gap-2 px-4 py-2 text-sm text-blue-600 hover:bg-blue-50 transition">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-4">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                            </svg> View Kategori </a> <a href="#"
                                            class="flex items-center gap-2 px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 transition">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-4">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                            </svg> Edit Kategori </a> <a href="#"
                                            class="flex items-center gap-2 px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-4">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                            </svg> Delete Kategori </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="px-6 py-12 text-center" colspan="7">
                                <div class="flex flex-col items-center justify-center text-gray-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="h-12 w-12 mb-4 text-gray-400">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                    <p class="text-lg font-medium text-gray-700">Belum ada data</p>
                                    <p class="text-sm text-gray-500 mt-1">Tambahkan kategori baru untuk memulai</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <x-modal-success />

    <script>
        document.querySelectorAll('[data-action-btn]').forEach(btn => {
            const wrapper = btn.parentElement
            const tooltip = wrapper.querySelector('[data-tooltip]')

            let isHover = false
            let hideTimeout = null

            const showTooltip = () => {
                clearTimeout(hideTimeout)

                tooltip.style.opacity = '1'
                tooltip.style.pointerEvents = 'auto'

                const rect = btn.getBoundingClientRect()
                const tooltipWidth = tooltip.offsetWidth
                const padding = 8

                let left = rect.right - tooltipWidth
                if (left < padding) left = padding
                if (left + tooltipWidth > window.innerWidth - padding) {
                    left = window.innerWidth - tooltipWidth - padding
                }

                tooltip.style.top = rect.bottom + 8 + 'px'
                tooltip.style.left = left + 'px'
            }

            const hideTooltip = () => {
                hideTimeout = setTimeout(() => {
                    tooltip.style.opacity = '0'
                    tooltip.style.pointerEvents = 'none'
                }, 500)
            }

            btn.addEventListener('mouseenter', showTooltip)
            btn.addEventListener('mouseleave', hideTooltip)

            tooltip.addEventListener('mouseenter', () => {
                clearTimeout(hideTimeout)
            })

            tooltip.addEventListener('mouseleave', hideTooltip)
        })
    </script>
</x-app-layouts>