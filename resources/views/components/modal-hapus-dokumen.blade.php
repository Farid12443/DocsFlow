<div id="modalHapusDokumen" class="fixed inset-0 bg-black/50 items-center justify-center hidden z-50">
    <div class="bg-white rounded-lg shadow-lg p-6 w-11/12 max-w-md">

        <h2 class="text-xl font-semibold mb-4 text-gray-800">Konfirmasi Hapus</h2>

        <p class="text-gray-600 mb-4">
            Apakah kamu yakin menghapus dokumen ini?
        </p>

        <form action="{{ route('dokumen.destroy', $item->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <div class="flex justify-end gap-3 mt-4">
                <button type="button" onclick="closeModalHapusDokumen()"
                    class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300">
                    Batal
                </button>

                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">
                    Hapus
                </button>
            </div>
        </form>

    </div>
</div>