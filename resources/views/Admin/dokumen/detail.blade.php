<x-app-layouts>
    <x-slot:title>
        Detail Dokumen
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
        Detail Dokumen
    </x-slot:judul>

    <x-slot:subjudul>
        Lihat semua detail tentang dokumen
    </x-slot:subjudul>

    <div class="space-y-6">
        <div class="bg-white rounded-xl shadow-sm border p-6">
            <h1 class="text-2xl font-semibold text-gray-800">
                {{ Str::title($dokumen->judul) }}
            </h1>

            <div class="mt-2 flex items-center gap-3 text-sm text-gray-500">
                @if ($dokumen->status == 'aktif')
                    <span class="px-2 py-1 rounded bg-blue-100 text-blue-600">
                        Aktif
                    </span>
                @else
                    <span class="px-2 py-1 rounded bg-gray-100 text-red-600">
                        Arsip
                    </span>
                @endif
                    
                <span>Versi aktif: <b>{{ $dokumen->activeVersion?->versi ?? '-' }}</b></span>
                <span>•</span>
                <span>Diperbarui: {{ $dokumen->updated_at->format('d M Y') }}</span>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-6">

            <div class="bg-white rounded-xl shadow-sm border p-6 space-y-4">
                <h2 class="font-semibold text-gray-700">Informasi Dokumen</h2>

                <div class="text-sm">
                    <p class="text-gray-500">Kategori</p>
                    <p class="font-medium text-gray-800">{{ $dokumen->category->nama_kategori }}</p>
                </div>

                <div class="text-sm">
                    <p class="text-gray-500">Deskripsi</p>
                    <p class="text-gray-800">
                      {{$dokumen->deskripsi}}
                    </p>
                </div>

                <div class="text-sm">
                    <p class="text-gray-500">Dibuat oleh</p>
                    <p class="font-medium text-gray-800">{{ Str::title($dokumen->user->role) }}</p>
                </div>
            </div>

            <div class="bg-white rounded-xl mt-6 shadow-sm border p-6 space-y-4">
                <h2 class="font-semibold text-gray-700">Preview Dokumen</h2>

                <div class="border rounded-lg overflow-hidden bg-gray-50">
                    @switch($dokumen->file_type)

                        @case('pdf')
                            <iframe
                                src="{{ asset('storage/' . $dokumen->file_path) }}"
                                class="w-full h-screen"
                            ></iframe>
                        @break

                        @case('jpg')
                        @case('jpeg')
                        @case('png')
                            <img
                                src="{{ asset('storage/' . $dokumen->file_path) }}"
                                alt="Preview Dokumen"
                                class="max mx-auto object-contain"
                            />
                        @break

                        @case('doc')
                        @case('docx')
                            <div class="p-6 text-center space-y-3">
                                <p class="text-gray-600 text-sm">
                                    Dokumen Word tidak bisa ditampilkan langsung.
                                </p>

                                <a href="{{ asset('storage/' . $dokumen->file_path) }}"
                                class="inline-block px-4 py-2 bg-blue-600 text-white rounded-lg text-sm hover:bg-blue-700">
                                    Download Dokumen
                                </a>
                            </div>
                        @break

                        @default
                            <div class="p-6 text-center text-gray-500 text-sm">
                                Preview tidak tersedia untuk tipe file ini.
                            </div>

                    @endswitch
                </div>
            </div>
        </div>
    </div>

</x-app-layouts>