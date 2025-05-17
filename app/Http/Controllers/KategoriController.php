<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateKategoriRequest;
use App\Http\Requests\EditKategoriRequest;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Kategori::all();
        return view('pages.admin.kategori.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateKategoriRequest $request)
    {
        Kategori::create($request->validated());
        return redirect()->route('kategori.index')->with('message', 'Berhasil Menambahkan Data');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori $kategori)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditKategoriRequest $request, Kategori $kategori)
    {
        // dd($request->all());
        $kategori->update($request->validated());
        return redirect()->route('kategori.index')->with('message', 'Berhasil Mengubah Data');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori)
    {
        $kategori->delete();
        return redirect()->route('kategori.index')->with('message', 'Berhasil Menghapus Data');
    }
}
