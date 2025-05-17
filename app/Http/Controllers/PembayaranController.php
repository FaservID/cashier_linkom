<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePembayaranRequest;
use App\Models\Pembayaran;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.admin.payment.index', [
            'payments' => Pembayaran::with('pesanan','user')->orderBy('id', 'DESC')->get()
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
        $filename = "";
        if ($request->file('bukti_tf') != null) {
            $file = $request->file('bukti_tf');
            $extension = $file->getClientOriginalExtension();
            // if (!in_array($file, ['png', 'jpg', 'jpeg', 'pdf'])) continue;
            $filename = time() . '.' . $extension;
            $filename = str_replace(' ', '-', $filename);
            $file->move('bukti_tf', $filename);
        }
        $cash = [
            'pesanan_id' => $request->pesanan_id,
            'user_id' => $request->user_id,
            'tipe' => $request->type,
            'nominal' => $request->total_bayar
        ];
        $transfer = [
            'pesanan_id' => $request->pesanan_id,
            'user_id' => $request->user_id,
            'tipe' => $request->type,
            'bank_type' => $request->type_bank,
            'nomor_rekening' => $request->no_rek,
            'nama_rekening' => $request->nama_rek,
            'nominal' => $request->jumlah,
            'bukti_pembayaran' => $filename,

        ];

        if ($request->type == 'Cash') {
            Pembayaran::create($cash);
        } else {
            Pembayaran::create($transfer);
        }

        Pesanan::where('id', $request->pesanan_id)->update(['status' => 'Pesanan diproses']);
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
