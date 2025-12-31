<x-app-layouts>
    <x-slot:title>
        Hak - Akses - Pengguna
    </x-slot:title>

    <x-slot:svg>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="w-8 h-8">
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

    <div class="p-8 bg-gray-50 rounded-2xl shadow-sm space-y-8">

        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">
            <div>
                <h1 class="text-2xl font-semibold text-gray-800">Hak Akses Dokumen</h1>
                <p class="text-sm text-gray-500">
                    Kelola hak akses pengguna terhadap dokumen
                </p>
            </div>

            <div class="relative w-full md:w-80">
                <input id="searchUser" type="text"
                    placeholder="Cari user (nama / email)..."
                    class="w-full rounded-xl border border-gray-300 px-4 py-3 pl-11 text-sm
                    focus:ring-2 focus:ring-green-500 focus:border-green-500 focus:outline-none">

                <svg class="absolute left-4 top-3.5 h-5 w-5 text-gray-400"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m21 21-4.35-4.35m1.85-5.15a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                </svg>
            </div>
        </div>

        <form action="/admin/hak-akses" method="post" class=" flex flex-col gap-6">
            @csrf
            @method("POST")
            <div  class="bg-white rounded-xl shadow p-6">
                <h2 class="font-medium text-gray-700 mb-4">Pilih Dokumen</h2>
                <label class="text-sm text-gray-600">Dokumen</label>
                <select name="dokumen" id="documentSelect" class="w-full p-2 mt-1 rounded-lg border border-gray-300 text-sm">
                    <option value="" disabled {{ old('dokumen') ? '' : 'selected' }}>-- Pilih Dokumen --</option>
                    @foreach ($dokumen as $item)
                        <option value="{{ $item->id }}" {{ old('dokumen') == $item->id ? 'selected' : '' }}>{{ $item->judul }}</option>
                    @endforeach
                </select>
                @error('dokumen')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror              
            </div>

            <div id="documentDetail" class="bg-white rounded-xl shadow p-6 mb-6" style="display: none;">
                <h2 class="font-medium text-gray-700 mb-2">Detail Dokumen</h2>
                <div class="text-sm text-gray-600 space-y-1">
                    <p><span class="font-medium">Judul:</span> <span id="docTitle"></span></p>
                    <p><span class="font-medium">Kategori:</span> <span id="docCategory"></span></p>
                    <p><span class="font-medium">Status:</span>
                        <span id="docStatus" class="px-2 py-1 rounded text-xs"></span>
                    </p>
                </div>
            </div>

            <div class="bg-white rounded-xl flex flex-col justify-between gap-4 shadow p-6">
                <h2 class="font-medium text-gray-700 mb-4">Tambah Hak Akses</h2>
                    <div>
                        <label class="text-sm text-gray-600">Pengguna</label>
                        <select name="pengguna" id="userSelect" class="w-full border mt-1 p-2 rounded-lg border-gray-300 text-sm">
                            <option value="" disabled {{ old('pengguna') ? '' : 'selected' }}>-- Pilih User --</option>
                            @foreach ($pengguna as $item)
                                <option value="{{ $item->id }}" {{ old('pengguna') == $item->id ? 'selected' : '' }}>{{ $item->nama }}</option>
                            @endforeach
                        </select>
                        @error('pengguna')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div id="userDetail" class="bg-white border rounded-xl p-5 shadow-sm hidden">
                        <h2 class="text-sm font-semibold text-gray-600 mb-2">User Terpilih</h2>

                        <div class="flex items-center justify-between">
                            <div>
                                <p class="font-medium text-gray-800">
                                    <span id="userName"></span>
                                </p>
                                <p class="text-sm text-gray-500">
                                    <span id="userEmail"></span>
                                </p>
                            </div>

                            <span class="px-3 py-1 text-xs rounded-full" id="userRole">
                            </span>
                        </div>
                    </div>

                    <div>
                        <label class="text-sm text-gray-600">Hak Akses</label>
                        <select name="hak_akses" class="w-full mt-1 p-2 rounded-lg border border-gray-300 text-sm">
                            <option value="" disabled {{ old('hak_akses') ? '' : 'selected' }}>-- Pilih Hak Akses --</option>
                            <option value="view" {{ old('hak_akses') == 'view' ? 'selected' : '' }}>View</option>
                            <option value="edit" {{ old('hak_akses') == 'edit' ? 'selected' : '' }}>Edit</option>
                            <option value="download" {{ old('hak_akses') == 'download' ? 'selected' : '' }}>Download</option>
                        </select>
                        @error('hak_akses')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex items-end">
                        <button type="submit"
                            class="w-full bg-green-600 text-white rounded-lg px-4 py-2 text-sm hover:bg-green-700 transition">
                            Tambah Akses
                        </button>
                    </div>
            </div>
        </form>
        <div class="bg-white rounded-xl shadow overflow-hidden border">
        <table class="w-full text-sm">
            <thead class="bg-gray-100 text-gray-600">
                <tr>
                    <th class="px-5 py-3 text-left">User</th>
                    <th class="px-5 py-3 text-left">Hak Akses</th>
                    <th class="px-5 py-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse ($hak_akses as $item)
                     <tr class="hover:bg-gray-50">
                    <td class="px-5 py-3">{{ Str::title($item->user->nama) }}</td>
                    <td class="px-5 py-3">
                        @switch($item->permission)
                            @case('view')
                                <span class="px-3 py-1 rounded-full bg-blue-100 text-blue-600 text-xs">
                                    View
                                </span>
                                @break
                            
                            @case('edit')
                                <span class="px-3 py-1 rounded-full bg-yellow-100 text-yellow-600 text-xs">
                                    Edit
                                </span>
                                @break
                            
                            @case('download')
                                <span class="px-3 py-1 rounded-full bg-green-100 text-green-600 text-xs">
                                    Download
                                </span>
                                @break
                            
                            @default
                                <span class="px-3 py-1 rounded-full bg-gray-100 text-gray-600 text-xs">
                                    Tidak Ada
                                </span>
                        @endswitch
                    </td>
                    <td class="px-5 py-3 text-center">
                        <button class="text-red-500 hover:text-red-700 text-sm">
                            Hapus
                        </button>
                    </td>
                </tr>
                @empty
                    
                @endforelse
            </tbody>
        </table>
    </div>

    <x-modal-success />

    <script>
        const documents = @json($dokumen);
        const documentSelect = document.getElementById('documentSelect');
        const documentDetail = document.getElementById('documentDetail');
        const docTitle = document.getElementById('docTitle');
        const docCategory = document.getElementById('docCategory');
        const docStatus = document.getElementById('docStatus');

        documentSelect.addEventListener('change', function() {
            const selectedId = this.value;
            if (!selectedId) {
                documentDetail.style.display = 'none';
                return;
            }

            const selectedDoc = documents.find(doc => doc.id == selectedId);
            if (selectedDoc) {
                docTitle.textContent = selectedDoc.judul;
                docCategory.textContent = selectedDoc.category.nama_kategori; // Akses nama_kategori dari kategori_id
                docStatus.textContent = selectedDoc.status;
                docStatus.className = selectedDoc.status === 'Aktif'
                    ? 'px-2 py-1 rounded bg-green-100 text-green-600 text-xs'
                    : 'px-2 py-1 rounded bg-gray-200 text-gray-600 text-xs';
                documentDetail.style.display = 'block';
            }
        });

        const users = @json($pengguna);
        const userSelect   = document.getElementById('userSelect');
        const userDetail   = document.getElementById('userDetail');
        const userName     = document.getElementById('userName');
        const userEmail    = document.getElementById('userEmail');
        const userRole     = document.getElementById('userRole');

        userSelect.addEventListener('change', function () {
            const selectedId = this.value;

            if (!selectedId) {
                userDetail.classList.add('hidden');
                return;
            }

            const selectedUser = users.find(user => user.id == selectedId);

            if (selectedUser) {
                userName.textContent  = selectedUser.nama;
                userEmail.textContent = selectedUser.email;
                userRole.textContent  = selectedUser.role.toUpperCase();

                // styling role
                userRole.className =
                    selectedUser.role === 'admin'
                    ? 'px-3 py-1 text-xs rounded-full bg-red-100 text-red-600'
                    : 'px-3 py-1 text-xs rounded-full bg-blue-100 text-blue-600';

                userDetail.classList.remove('hidden');
            }
        });

    </script>
</x-app-layouts>