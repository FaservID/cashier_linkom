<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePembayaranRequest;
use App\Models\Pembayaran;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.admin.payment.index', [
            'payments' => Pembayaran::with('pesanan', 'user')->orderBy('id', 'DESC')->get()
        ]);
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
    public function store(CreatePembayaranRequest $request)
    {
        // dd($request->all());
        $filename = $request->bukti_tf;

        if ($request->hasFile('bukti_tf')) {
            $file = $request->file('bukti_tf');
            $extension = strtolower($file->getClientOriginalExtension());

            if (in_array($extension, ['jpg', 'jpeg', 'png'])) {
                // Nama file baru
                $newFilename = time() . '.webp';
                $webpPath = storage_path('app/public/bukti_tf/' . $newFilename);

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
                    if ($request->foto && Storage::exists('public/product_image/' . $request->foto)) {
                        Storage::delete('public/product_image/' . $request->foto);
                    }
                }
            } else {
                return back()->withErrors(['foto' => 'Format gambar harus .jpg, .jpeg, atau .png']);
            }
        }
        $transfer = [
            'pesanan_id' => $request->pesanan_id,
            'bank_type' => $request->type_bank,
            'nominal' => $request->jumlah,
            'bukti_pembayaran' => $filename,
        ];

        Pembayaran::where('pesanan_id', $request->pesanan_id)->update($transfer);

        Pesanan::where('id', $request->pesanan_id)->update(['status' => 'Paid']);
        return redirect()->route('pesanan.index')->with('message', 'Pembayaran Berhasil');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pembayaran $pembayaran)
    {
        $pembayaran->delete();
        return redirect()->route('pembayaran.index')->with('message', 'Pembayaran Dihapus');
    }
}
