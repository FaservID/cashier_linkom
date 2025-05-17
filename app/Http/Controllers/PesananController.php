<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePesananRequest;
use App\Models\Barang;
use App\Models\DetailOrder;
use App\Models\Pesanan;
use App\Models\User;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.admin.pesanan.index', [
            'orders' => Pesanan::with('user', 'barang', 'detailOrders', 'payment')->where('status', '!=', 'Selesai')->orderBy('id', 'DESC')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.pesanan.create', [
            'barang' => Barang::with('kategori')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreatePesananRequest $request)
    {

        $pid = $request->pid;
        $countPid = count($pid);
        // dd($request->barang_id);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'password' => bcrypt('12345678'),
        ]);

        $getUser = User::orderBy('id', 'DESC')->first();

        Pesanan::create([
            'order_id' => $request->order_id,
            'status' => 'Belum Dibayar',
            'user_id' => $getUser->id
        ]);
        $arr_harga = [];
        $pesanan = Pesanan::orderBy('id', 'DESC')->first();

        if ($countPid > 0) {
            for ($i = 0; $i < $countPid; $i++) {
                $arr_harga[] = $request->harga[$i] * $request->quantity[$i];
                $barang = Barang::where('id', $request->pid[$i])->first();
                // dd($barang);
                $data = array(
                    'pesanan_id' => $pesanan->id,
                    'order_id' => $request->order_id,
                    'barang_id' => $request->pid[$i],
                    'harga' => $request->harga[$i] * $request->quantity[$i],
                    'jumlah' => $request->quantity[$i],
                );
                DetailOrder::create($data);

                Barang::where('id', $request->pid[$i])->update([
                    'in_stock' => ($barang->in_stock - $request->quantity[$i]),
                    'sell_stock' => $barang->sell_stock + $request->quantity[$i],
                ]);
            }
        }
        $total_harga = array_sum($arr_harga);
        Pesanan::where('order_id', $request->order_id)->update(['total_harga' => $total_harga]);



        return redirect()->route('pesanan.index')->with('message', 'Berhasil Membuat Pesanan');
    }

    public function finishOrder(Pesanan $pesanan)
    {
        $pesanan->update(['status' => 'Selesai']);
        return redirect()->route('pesanan.index')->with('message', 'Pesanan Telah diselesaikan');
    }

    public function history()
    {
        return view('pages.admin.history.index', [
            'orders' => Pesanan::with('user', 'barang', 'detailOrders')->where('status', 'Selesai')->orderBy('id', 'DESC')->get(),
        ]);
    }

    public function invoice(Pesanan $pesanan)
    {
        return view('pages.admin.pesanan.invoice.index', [
            'pesanan' => $pesanan
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Pesanan $pesanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pesanan $pesanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pesanan $pesanan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pesanan $pesanan)
    {
        // $barang = array();
        // $quantity = array();
        // foreach ($pesanan->detailOrders as $key => $item) {
        //     // array_push($barang, $item->barang_id[$key]);
        //     $barang[] = $item->barang_id;
        //     $quantity[] = $item->jumlah;
        // }
        // $getQty = array();
        // if(count($barang) > 0) {
        //     foreach($barang as $key => $item){
        //         $items = Barang::where('id', $item[$key])->first();
        //         $getQty[] = $items->jumlah;
        //     }
        // }
        // dd($getQty);
        // $barang = $pesanan->detailOrders->barang_id;
        $pesanan->delete();
        return redirect()->route('pesanan.index')->with('message', 'Pesanan Berhasil Dihapus');

    }
}
