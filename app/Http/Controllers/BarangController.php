<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBarangRequest;
use App\Http\Requests\EditBarangRequest;
use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        return view('pages.admin.barang.index', [
            'items' => Barang::with('kategori')->orderBy('id', 'DESC')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.barang.create', [
            'categories' => Kategori::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateBarangRequest $request)
    {
        // dd($request->all());
        if ($request->file('foto') != null) {
            $file = $request->file('foto');
            $extension = $file->getClientOriginalExtension();
            // if (!in_array($file, ['png', 'jpg', 'jpeg', 'pdf'])) continue;
            $filename = time() . '.' . $extension;
            $filename = str_replace(' ', '-', $filename);
            $file->move('product_image', $filename);
        }
        $tempSlug = $request->nama_barang . ' ' . time();
        $slug = Str::of($tempSlug)->slug('-');
        // dd($slug);
        $data = [
            'nama' => $request->nama_barang,
            'tipe'  => $request->tipe,
            'slug' => $slug,
            'harga'  => $request->harga,
            'in_stock'  => $request->in_stock,
            'keterangan'  => $request->keterangan,
            'kategori_id'  => $request->kategori_id,
            'foto'  => $filename,
        ];
        // dd($data);
        Barang::create($data);

        return redirect()->route('barang.index')->with('message', 'Berhasil Menambahkan Data');
    }

    /**
     * Display the specified resource.
     */
    public function show(Barang $barang)
    {
        return view('pages.admin.barang.detail', [
            'barang' => $barang
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barang $barang)
    {
        return view('pages.admin.barang.edit', [
            'barang' => $barang,
            'categories' => Kategori::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(EditBarangRequest $request, Barang $barang)
    {
        $filename = $barang->foto;

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $extension = strtolower($file->getClientOriginalExtension());

            if (in_array($extension, ['jpg', 'jpeg', 'png'])) {
                // Nama file baru
                $newFilename = time() . '.webp';
                $webpPath = storage_path('app/public/product_image/' . $newFilename);

                // Pastikan folder ada
                if (!file_exists(dirname($webpPath))) {
                    mkdir(dirname($webpPath), 0755, true);
                }

                // Buka gambar
                $image = null;
                if ($extension === 'jpg' || $extension === 'jpeg') {
                    $image = imagecreatefromjpeg($file->getPathname());
                } elseif ($extension === 'png') {
                    $image = imagecreatefrompng($file->getPathname());
                }

                if ($image) {
                    // Simpan sebagai webp ke storage
                    imagewebp($image, $webpPath, 80); // kualitas 80%
                    imagedestroy($image);
                    $filename = $newFilename;

                    // Hapus gambar lama jika ada
                    if ($barang->foto && Storage::exists('public/product_image/' . $barang->foto)) {
                        Storage::delete('public/product_image/' . $barang->foto);
                    }
                }
            } else {
                return back()->withErrors(['foto' => 'Format gambar harus .jpg, .jpeg, atau .png']);
            }
        }

        $data = [
            'nama' => $request->nama_barang,
            'tipe'  => $request->tipe,
            'harga'  => $request->harga,
            'in_stock'  => $request->in_stock,
            'keterangan'  => $request->keterangan,
            'kategori_id'  => $request->kategori_id,
            'foto'  => $filename,
        ];

        $barang->update($data);

        return redirect()->route('barang.index')->with('message', 'Berhasil Mengubah Data');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang $barang)
    {
        $barang->delete();
        return redirect()->route('barang.index')->with('message', 'Berhasil Menghapus Data');
    }
}
