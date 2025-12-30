<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategoriesModel;
use App\Models\DocumentsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            'kategori' => 'required|exists:kategori,id',
            'deskripsi' => 'required|string',
            'file' => 'required|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:20480',
            'status' => 'required|in:aktif,arsip',
        ], [
            'judul_laporan.required' => 'Judul laporan wajib diisi.',
            'judul_laporan.string' => 'Judul laporan harus berupa teks.',
            'judul_laporan.max' => 'Judul laporan maksimal 255 karakter.',

            'kategori.required' => 'Kategori wajib dipilih.',
            'kategori.exists' => 'Kategori yang dipilih tidak valid.',

            'deskripsi.required' => 'Deskripsi laporan wajib diisi.',
            'deskripsi.string' => 'Deskripsi harus berupa teks.',

            'file.required' => 'File laporan wajib diunggah.',
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

        DocumentsModel::create([
            'user_id' => Auth::id(),
            'kategori_id' => $request->kategori,
            'judul' => $request->judul_laporan,
            'deskripsi' => $request->deskripsi,
            'file_type' => $extension,
            'file_path' => $path,
            'status' => $request->status,
        ]);

        return redirect('/admin/dokumen')->with('success', 'Dokumen berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
