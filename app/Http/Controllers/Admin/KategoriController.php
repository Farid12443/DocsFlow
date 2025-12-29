<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategoriesModel;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = CategoriesModel::get();

        return view('Admin.kategori.index', compact('kategori'));
    }

    public function create()
    {
        return view('Admin.kategori.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|min:5|max:50',
            'keterangan' => 'required|min:5|max:500',
        ], [
            'nama_kategori.required' => 'Nama kategori wajib diisi!',
            'nama_kategori.min:' => 'Nama kategori minimal 5 huruf!',
            'nama_kategori.max' => 'Nama kategori maximal 50 huruf!',
            'keterangan.required' => 'Ketarangan wajib diisi!',
            'keterangan.min:' => 'Keterangan minimal 5 huruf!',
            'keterangan.max' => 'Keterangan maximal 500 huruf!',
        ]);

        CategoriesModel::create([
            'nama_kategori' => $request->nama_kategori,
            'keterangan' => $request->keterangan,
            '',
        ]);

        return redirect('/admin/kategori')->with('success', 'Kategori berhasil disimpan');
    }
}
