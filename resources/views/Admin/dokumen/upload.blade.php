<x-app-layouts>
    <x-slot:title>
        Dokumen - Aktif
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
        Dokumen
    </x-slot:judul>

    <x-slot:subjudul>
        Kelola seluruh dokumen digital
    </x-slot:subjudul>

    <div class="bg-white rounded-xl shadow p-6 space-y-6">
        <h2 class="text-xl font-semibold text-gray-800">Upload Dokumen</h2>

        <form class="space-y-6" action="{{ route('dokumen.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div>
                <label for="judul_laporan" class="block text-sm font-medium text-gray-700">Judul Dokumen</label>
                <input type="text" id="judul" name="judul_laporan" placeholder="Contoh: Surat Keputusan"
                    class="mt-1 p-2 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-green-500 focus:border-green-500">
                @error('judul_laporan')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="kategori" class="block text-sm font-medium text-gray-700">Kategori</label>
                <select id="kategori" name="kategori"
                    class="mt-1 p-2 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-green-500 focus:border-green-500">

                    <option value="" disabled {{ old('kategori') ? '' : 'selected' }}>
                        -- Pilih Kategori --
                    </option>

                    @forelse ($kategori as $item)
                        <option value="{{ $item->id }}" {{ old('kategori') == $item->id ? 'selected' : '' }}>
                            {{ $item->nama_kategori }} - {{ $item->keterangan }}
                        </option>
                    @empty
                        <option value="">Belum ada kategori, Silahkan tambah kategori</option>
                    @endforelse

                </select>
                @error('kategori')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                <textarea id="deskripsi" name="deskripsi" rows="3" placeholder="Deskripsi singkat dokumen"
                    class="mt-1 block w-full p-2 rounded-lg border-gray-300 shadow-sm focus:ring-green-500 focus:border-green-500"></textarea>
                @error('deskripsi')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    File Dokumen
                </label>

                <label for="file" id="dropzone"
                    class="flex flex-col items-center justify-center w-full h-56 border-2 border-dashed border-gray-300 rounded-xl cursor-pointer bg-gray-50 hover:bg-gray-100 transition text-center">

                    <div id="placeholder" class="flex flex-col items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 text-gray-400 mb-4" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 16.5V9m0 0l-3 3m3-3l3 3M4.5 15.75A4.5 4.5 0 019 11.25h.75A5.25 5.25 0 0119.5 13.5a3 3 0 01-3 3H6.75A2.25 2.25 0 014.5 15.75Z" />
                        </svg>

                        <p class="text-gray-600 font-medium">
                            Drag & drop file di sini
                        </p>
                        <p class="text-sm text-gray-400">
                            atau klik untuk memilih file
                        </p>
                        <p class="text-xs text-gray-400 mt-1">
                            PDF, DOC, DOCX, JPG, PNG
                        </p>
                    </div>


                    <div id="preview" class="hidden flex-col items-center gap-3">
                        <img id="img-preview" class="hidden w-32 h-32 object-cover rounded-lg border" />
                        <svg id="file-icon" xmlns="http://www.w3.org/2000/svg" class="hidden w-14 h-14 text-blue-500"
                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19.5 14.25V6.75a2.25 2.25 0 00-2.25-2.25H8.25A2.25 2.25 0 006 6.75v10.5A2.25 2.25 0 008.25 19.5h3.75" />
                        </svg>
                        <p id="file-name" class="text-sm text-gray-700 font-medium"></p>
                        <p class="text-xs text-gray-400">Klik untuk ganti file</p>
                    </div>

                    <input id="file" name="file" type="file" accept=".pdf,.doc,.docx,.jpg,.png" class="hidden" required>
                </label>
                @error('file')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                <select id="status" name="status"
                    class="mt-1 p-2 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-green-500 focus:border-green-500">
                    <option value="aktif">Aktif</option>
                    <option value="arsip">Arsip</option>
                </select>
                @error('status')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>


            <div class="flex justify-end gap-3">
                <button type="button"
                    class="px-4 py-2 rounded-lg bg-gray-200 text-gray-700 hover:bg-gray-300 transition duration-200">
                    Batal
                </button>
                <button type="submit" onclick="console.log('tes')"
                    class="px-4 py-2 rounded-lg bg-green-600 text-white hover:bg-green-700 transition duration-200">
                    Simpan Dokumen
                </button>
            </div>
        </form>
    </div>

    <script>
        const input = document.getElementById('file')
        const placeholder = document.getElementById('placeholder')
        const preview = document.getElementById('preview')
        const imgPreview = document.getElementById('img-preview')
        const fileIcon = document.getElementById('file-icon')
        const fileName = document.getElementById('file-name')

        input.addEventListener('change', () => {
            const file = input.files[0]
            if (!file) return

            placeholder.classList.add('hidden')
            preview.classList.remove('hidden')
            fileName.textContent = file.name

            if (file.type.startsWith('image/')) {
                imgPreview.src = URL.createObjectURL(file)
                imgPreview.classList.remove('hidden')
                fileIcon.classList.add('hidden')
            } else {
                imgPreview.classList.add('hidden')
                fileIcon.classList.remove('hidden')
            }
        })
    </script>


</x-app-layouts>