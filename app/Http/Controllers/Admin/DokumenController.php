<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategoriesModel;
use App\Models\DocumentsModel;
use App\Models\DocumentVersionsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DokumenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dokumen = DocumentsModel::get();

        return view('Admin.dokumen.index', compact('dokumen'));
    }

    public function documentActiv()
    {
        $dokumen = DocumentsModel::where('status', 'aktif')->get();

        return view('Admin.dokumen.aktif', compact('dokumen'));
    }

    public function documentArsip()
    {
        $dokumen = DocumentsModel::where('status', 'arsip')->get();

        return view('Admin.dokumen.arsip', compact('dokumen'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $kategori = CategoriesModel::get();

        // dd($kategori);
        return view('Admin.dokumen.upload', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul_laporan' => 'required|string|max:255',
            'kategori' => 'required|exists:tb_categories,id',
            'deskripsi' => 'required|string',
            'file' => 'required|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:20480',
            'status' => 'required|in:aktif,arsip',
        ], [
            'judul_laporan.required' => 'Judul laporan wajib diisi.',
            'judul_laporan.string' => 'Judul laporan harus berupa teks.',
            'judul_laporan.max' => 'Judul laporan maksimal 255 karakter.',

            'kategori.required' => 'Kategori wajib dipilih.',
            'kategori.exists' => 'Kategori yang dipilih tidak valid.',

            'deskripsi.required' => 'Deskripsi dokumen wajib diisi.',
            'deskripsi.string' => 'Deskripsi harus berupa teks.',

            'file.required' => 'File dokumen wajib diunggah.',
            'file.file' => 'File yang diunggah tidak valid.',
            'file.mimes' => 'Format file harus pdf, doc, docx, jpg, jpeg, atau png.',
            'file.max' => 'Ukuran file maksimal 20 MB.',

            'status.required' => 'Status wajib dipilih.',
            'status.in' => 'Status yang dipilih tidak valid.',
        ]);

        $file = $request->file('file');
        // dd($file);

        $extension = $request->file->extension();
        // dd($extension);

        $filename = Str::random(10).'.'.$extension;
        // dd($filename);

        $path = $file->storeAs('dokumen', $filename, 'public');
        // dd($path);

        DB::transaction(function () use ($request, $extension, $path) {

            $document = DocumentsModel::create([
                'user_id' => Auth::id(),
                'kategori_id' => $request->kategori,
                'judul' => $request->judul_laporan,
                'deskripsi' => $request->deskripsi,
                'file_type' => $extension,
                'file_path' => $path,
                'status' => $request->status,
            ]);

            DocumentVersionsModel::create([
                'document_id' => $document->id,
                'versi' => 'v1.0',
                'file_path' => $document->file_path,
                'catatan_perubahan' => 'Upload awal dokumen',
                'is_active' => true,
            ]);
        });

        return redirect('/admin/dokumen')->with('success', 'Dokumen berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dokumen = DocumentsModel::withCount('versions')->findOrFail($id);
        // dd($dokumen);

        return view('Admin.dokumen.detail', compact('dokumen'));
    }

    public function version(string $id)
    {
        $dokumen = DocumentsModel::findOrFail($id);
        // dd($dokumen);

        $versi_dokumen = $dokumen->versions()->orderBy('created_at', 'asc')->get();

        return view('Admin.versiDokumen.riwayat', compact('dokumen', 'versi_dokumen'));
    }

    public function rollback($versionId)
    {
        $version = DocumentVersionsModel::findOrFail($versionId);

        DB::transaction(function () use ($version) {

            DocumentVersionsModel::where('document_id', $version->document_id)
                ->update(['is_active' => false]);

            $version->update([
                'is_active' => true,
            ]);

            DocumentsModel::where('id', $version->document_id)
                ->update([
                    'file_path' => $version->file_path,
                ]);
        });

        return back()->with('success', "Berhasil rollback ke versi {$version->versi}");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dokumen = DocumentsModel::withCount('versions')->findOrFail($id);
        // dd($dokumen);
        $kategori = CategoriesModel::get();

        return view('Admin.dokumen.edit', compact('dokumen', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'judul_laporan' => 'required|string|max:255',
            'kategori' => 'required|exists:tb_categories,id',
            'deskripsi' => 'required|string',
            'status' => 'required|in:aktif,arsip',
        ], [
            'judul_laporan.required' => 'Judul laporan wajib diisi.',
            'judul_laporan.string' => 'Judul laporan harus berupa teks.',
            'judul_laporan.max' => 'Judul laporan maksimal 255 karakter.',

            'kategori.required' => 'Kategori wajib dipilih.',
            'kategori.exists' => 'Kategori yang dipilih tidak valid.',

            'deskripsi.required' => 'Deskripsi wajib diisi.',
            'deskripsi.string' => 'Deskripsi harus berupa teks.',

            'status.required' => 'Status wajib dipilih.',
            'status.in' => 'Status yang dipilih tidak valid.',
        ]);

        // dd($request);

        $dokumen = DocumentsModel::findOrFail($id);
        $dokumen->update([
            'kategori_id' => $request->kategori,
            'judul' => $request->judul_laporan,
            'deskripsi' => $request->deskripsi,
            'status' => $request->status,
        ]);

        return redirect('/admin/dokumen')->with('success', 'Informasi Dokumen berhasil diperbarui');
    }

    public function revisiDokumen(Request $request, string $id)
    {
        $documentId = $id;

        $request->validate([
            'file' => 'required|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:20480',
            'catatan_perubahan' => 'required|string',
        ], [
            'file.required' => 'File dokumen wajib diunggah.',
            'file.file' => 'File yang diunggah tidak valid.',
            'file.mimes' => 'Format file harus pdf, doc, docx, jpg, jpeg, atau png.',
            'file.max' => 'Ukuran file maksimal 20 MB.',
            'catatan_perubahan.required' => 'Catatan perubahan dokumen wajib diisi.',
            'catatan_perubahan.string' => 'catatan Perubahan harus berupa teks.',
        ]);

        $file = $request->file('file');
        // dd($file);

        $extension = $request->file->extension();
        // dd($extension);

        $filename = Str::random(10).'.'.$extension;
        // dd($filename);

        $path = $file->storeAs('dokumen', $filename, 'public');
        // dd($path);

        $lastVersion = DocumentVersionsModel::where('document_id', $documentId)
            ->orderByDesc('created_at')
            ->first();
        // dd($lastVersion);

        $nextVersionNumber = 1.0;

        if ($lastVersion) {
            $nextVersionNumber = (float) str_replace('v', '', $lastVersion->versi) + 0.1;
        }

        // Nonaktifkan versi lama
        DocumentVersionsModel::where('document_id', $documentId)
            ->update(['is_active' => false]);

        // Insert versi baru
        DocumentVersionsModel::create([
            'document_id' => $documentId,
            'versi' => 'v'.number_format($nextVersionNumber, 1),
            'file_path' => $path,
            'catatan_perubahan' => $request->catatan_perubahan,
            'is_active' => true,
        ]);

        return redirect('/admin/dokumen')->with('success', 'Revisi dokumen Dokumen berhasil diupload');

    }

    public function updateStatus(Request $request, string $id)
    {
        $dokumen = DocumentsModel::findOrFail($id);

        $statusValue = $request->input('status', 'aktif');

        $dokumen->update([
            'status' => $statusValue,
        ]);

        return redirect('/admin/dokumen')->with('success', 'Status dokumen berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dokumen = DocumentsModel::findOrFail($id);

        DocumentVersionsModel::where('document_id', $id)->delete();

        $dokumen->delete();

        return redirect('/admin/dokumen')->with('success', 'Dokumen berhasil dihapus');
    }
}
