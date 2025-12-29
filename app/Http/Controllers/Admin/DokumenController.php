<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DocumentsModel;
use Illuminate\Http\Request;

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
        return view('Admin.dokumen.upload');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
