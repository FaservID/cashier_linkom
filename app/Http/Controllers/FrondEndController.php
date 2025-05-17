<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\DetailOrder;
use App\Models\Kategori;
use App\Models\Pembayaran;
use App\Models\Pesanan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use PhpParser\Node\Stmt\Return_;

class FrondEndController extends Controller
{
    public function index(): View
    {
        $items = Barang::orderBy('created_at', 'DESC');
        if (request('katalog')) {
            if (request('katalog') == 'Kasur') {
                $items->where('kategori_id', 1);
            } else {
                $items->where('kategori_id', 2);
            }
        }
        if (request('keyword')) {
            $items->where('nama', 'like', '%' . request('keyword') . '%');
        }
        if (Auth::check()) {
            return view('pages.user.index', [
                'items' => $items->get(),
                'katalog' => Kategori::all(),
                'user_id' => Auth::user()->id
            ]);
        } else {
            return view('pages.user.index', [
                'items' => $items->get(),
                'katalog' => Kategori::all(),
                'user_id' => null

            ]);
        }
    }

    public function cart()
    {
        if (Auth::check()) {
            return view('pages.user.cart', [
                'user_id' => Auth::user()->id
            ]);
        } else {
            return redirect()->route('login');
        }
    }

    public function addCart(Request $request)
    {
        $barang_id = $request->barang_id;
        $barang_id = str_replace(",", " ", $barang_id[0]);
        $arrBarang_id = explode(" ", $barang_id);

        $quantity = $request->quantity;
        $quantity = str_replace(",", " ", $quantity[0]);
        $arrQuantity = explode(" ", $quantity);

        $harga = $request->harga;
        $harga = str_replace(",", " ", $harga[0]);
        $arrHarga = explode(" ", $harga);

        Pesanan::create([
            'order_id' => $request->order_id,
            'status' => 'Belum Dibayar',
            'user_id' => Auth::user()->id
        ]);
        $pesanan = Pesanan::orderBy('id', 'DESC')->first();
        $arr_harga = [];
        if (count($arrBarang_id) > 0) {
            // for ($i = 0; $i < $arrBarang_id; $i++) {
            foreach ($arrBarang_id as $key => $item) {
                $arr_harga[] = $arrHarga[$key] * $arrQuantity[$key];
                $barang = Barang::where('id', $arrBarang_id[$key])->first();
                // dd($barang);
                $data = array(
                    'pesanan_id' => $pesanan->id,
                    'order_id' => $request->order_id,
                    'barang_id' => $arrBarang_id[$key],
                    'harga' => $arrHarga[$key] * $arrQuantity[$key],
                    'jumlah' => $arrQuantity[$key],
                );
                // dd($data);
                DetailOrder::create($data);

                Barang::where('id', $arrBarang_id[$key])->update([
                    'in_stock' => ($barang->in_stock - $arrQuantity[$key]),
                    'sell_stock' => $barang->sell_stock + $arrQuantity[$key],
                ]);
            }
        }

        $total_harga = array_sum($arr_harga);
        Pesanan::where('order_id', $request->order_id)->update(['total_harga' => $total_harga]);


        return redirect()->route('fe.cart')->with('message', 'Berhasil Membuat Pesanan, Segera Untuk Melakukan Pembayaran');
        // dd($request->all());
    }


    public function pesanan()
    {
        if (Auth::check()) {
            return view('pages.user.pesanan', [
                'orders' => Pesanan::with('user', 'barang', 'detailOrders')
                    ->where('user_id', Auth::user()->id)
                    ->orderBy('id', 'DESC')
                    ->get(),
            ]);
        } else {
            return redirect()->route('login');
        }
    }

    public function invoice(Pesanan $pesanan)
    {
        if (Auth::check()) {
            return view('pages.admin.pesanan.invoice.index', [
                'pesanan' => $pesanan
            ]);
        } else {
            return redirect()->route('login');
        }
    }
    public function payment(Pembayaran $pembayaran, Request $request)
    {
        if (Auth::check()) {
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
                'type' => $request->type,
                'nominal' => $request->total_bayar
            ];
            $transfer = [
                'pesanan_id' => $request->pesanan_id,
                'user_id' => $request->user_id,
                'type' => $request->type,
                'bank_type' => $request->type_bank,
                'no_rekening' => $request->no_rek,
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
            return redirect()->route('fe.pesanan')->with('message', 'Pembayaran Berhasil');
        } else {
            return redirect()->route('login');
        }
    }

    public function profile()
    {
        if (Auth::check()) {
            return view('pages.user.profile', [
                'user_id' => Auth::user()->id
            ]);
        } else {
            return redirect()->route('login');
        }
    }

    public function updateProfil(User $user, Request $request)
    {
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number
        ]);
        return redirect()->route('fe.profil')->with('message', 'Berhasil Mengubah Profil');

    }
}
