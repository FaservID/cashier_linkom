<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\DetailOrder;
use App\Models\Kategori;
use App\Models\Pesanan;
use App\Models\Stock;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(): View
    {
        return view('home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome(): View
    {
        $barang = Barang::all();
        $stock = 0;
        for ($i = 0; $i < count($barang); $i++) {
            $stock += $barang[$i]->in_stock;
        }

        $pesanan = Pesanan::where('status', 'Completed')->get();
        $pemasukan = 0;
        $pengeluaran = Stock::sum('harga_beli');
        for ($i = 0; $i < count($pesanan); $i++) {
            $pemasukan += $pesanan[$i]->total_harga;
        }

        // dd($stock);
        $data = [
            'barang' => Barang::count(),
            'kategori' => Kategori::count(),
            'terjual' => DetailOrder::count(),
            'stock' => $stock,
            'transaksi' => Pesanan::count(),
            'supplier' => Supplier::count(),
            'pemasukan' => $pemasukan,
            'pengeluaran' => $pengeluaran
        ];
        return view('pages.admin.index', compact('data'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function ownerHome(): View
    {
        $barang = Barang::all();
        $stock = 0;
        for ($i = 0; $i < count($barang); $i++) {
            $stock += $barang[$i]->in_stock;
        }

        $pesanan = Pesanan::where('status', 'Completed')->get();
        $pemasukan = 0;
        $pengeluaran = Stock::sum('harga_beli');
        for ($i = 0; $i < count($pesanan); $i++) {
            $pemasukan += $pesanan[$i]->total_harga;
        }

        // dd($stock);
        $data = [
            'barang' => Barang::count(),
            'kategori' => Kategori::count(),
            'terjual' => DetailOrder::count(),
            'stock' => $stock,
            'transaksi' => Pesanan::count(),
            'supplier' => Supplier::count(),
            'pemasukan' => $pemasukan,
            'pengeluaran' => $pengeluaran
        ];
        return view('pages.owner.index', compact('data'));
    }
}
