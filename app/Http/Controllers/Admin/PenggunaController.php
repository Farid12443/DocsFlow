<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DocumentAccessModel;
use App\Models\DocumentsModel;
use App\Models\User;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    public function index()
    {
        $pengguna = User::withCount('documents')->get();
        // dd($pengguna);

        return view('Admin.pengguna.index', compact('pengguna'));
    }

    public function hakAkses()
    {

        $dokumen = DocumentsModel::with('category')->get();
        // dd($dokumen);

        $pengguna = User::get();

        $hak_akses = DocumentAccessModel::get();
        // dd($hak_akses);

        return view('Admin.pengguna.hak-akses', compact('dokumen', 'pengguna', 'hak_akses'));
    }

    public function hakStore(Request $request)
    {
        $validated = $request->validate([
            'dokumen' => 'required|integer|exists:tb_documents,id',
            'pengguna' => 'required|integer|exists:tb_users,id',
            'hak_akses' => 'required|string|in:view,edit,delete',
        ], [
            'dokumen.required' => 'Dokumen harus dipilih',
            'dokumen.integer' => 'Dokumen harus berupa angka',
            'dokumen.exists' => 'Dokumen tidak ditemukan',
            'pengguna.required' => 'Pengguna harus dipilih',
            'pengguna.integer' => 'Pengguna harus berupa angka',
            'pengguna.exists' => 'Pengguna tidak ditemukan',
            'hak_akses.required' => 'Hak akses harus dipilih',
            'hak_akses.string' => 'Hak akses harus berupa teks',
            'hak_akses.in' => 'Hak akses hanya boleh view, edit, atau delete',
        ]);

        dd($request);

        // DocumentAccessModel::create([
        //     'document_id' => $request->dokumen,
        //     'user_id' => $request->pengguna,
        //     'permission' => $request->hak_akses,
        // ]);

        return redirect('/admin/hak-akses')->with('success', 'Hak Akses berhasil ditambah');
    }
}
