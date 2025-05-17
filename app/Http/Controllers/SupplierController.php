<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSupplierRequest;
use App\Http\Requests\EditSupplierRequest;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suppliers = Supplier::latest()->get();
        return view('pages.admin.supplier.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateSupplierRequest $request)
    {
        try {
            Supplier::create($request->validated());
            return redirect()->route('supplier.index')->with('message', 'Supplier created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('message', 'Gagal menambah supplier');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Supplier $supplier)
    {
        return view('pages.admin.supplier.detail', compact('supplier'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier)
    {
        return view('pages.admin.supplier.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditSupplierRequest $request, Supplier $supplier)
    {
        try {
            $supplier->update($request->validated());
            return redirect()->route('supplier.index')->with('message', 'Supplier updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('message', 'Gagal mengubah supplier');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        return redirect()->route('supplier.index')->with('message', 'Berhasil Menghapus Data');
    }
}
