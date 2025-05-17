<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\DetailOrder;
use App\Models\Pesanan;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Mockery\Undefined;

class LaporanController extends Controller
{
    public function laporanStock(): View
    {
        return view('pages.owner.laporan.laporan-stock', [
            'stocks' => Stock::with('barang')->orderBy('created_at', 'DESC')->get(),
        ]);
    }

    public function cetakLaporanStock(Request $request)
    {
        $date_from = $request->date_from;
        $date_to = $request->date_to;
        $out_stock = Pesanan::with('detailOrders')->whereBetween('created_at', [$date_from, $date_to])->get();
        // $stocks = Stock::whereBetween('created_at', [$date_from, $date_to])->groupBy('barang_id')
        //     ->orderBy('id', 'DESC')
        //     ->get(array(
        //         DB::raw('barang_id as barang_id'),
        //         DB::raw('SUM(jumlah) as "jumlah"')
        //     ));

        $stocks = DB::table("barang")
            // ->select("barang.*")
            ->join(DB::raw("(SELECT
            stocks.barang_id,
            SUM(stocks.jumlah) as jumlah,
            Count(*) as total
            FROM stocks
            GROUP BY stocks.barang_id
            ) as stocks"), function ($join) {
                $join->on("stocks.barang_id", "=", "barang.id");
            })
            ->groupBy("barang.id")
            ->whereNull('barang.id')
            ->whereBetween('created_at', [$date_from, $date_to])
            ->get();

        $orders = DB::table("barang")
            ->join(DB::raw("(SELECT
            detail_pesanan.barang_id,
            SUM(detail_pesanan.jumlah) as jumlah_out
            FROM detail_pesanan
            GROUP BY detail_pesanan.barang_id
            ) as detail_pesanan"), function ($join) {
                $join->on("detail_pesanan.barang_id", "=", "barang.id");
            })
            ->groupBy("barang.id")
            ->whereBetween('created_at', [$date_from, $date_to])
            ->get();

        $items = Barang::with('stocks', 'detailOrders')->whereBetween('created_at', [$date_from, $date_to])->get();
        $first = Barang::with('stocks')->whereBetween('created_at', [$date_from, $date_to])->orderBy('created_at', 'ASC')->first();
        // dd($first->stocks[0]->stock_awal);
        return view('pages.reports.laporan-stock', [
            'stocks' => $stocks,
            'items' => $items,
            'date_from' => $date_from,
            'date_to' => $date_to,
            'orders' => $orders,
            'first' => $first
        ]);
    }

    public function laporanTransaksi(): View
    {
        return view('pages.owner.laporan.laporan-transaksi', [
            'transactions' => Pesanan::with('user', 'barang', 'detailOrders')->where('status', 'Selesai')->orderBy('id', 'DESC')->get(),
        ]);
    }


    public function cetakLaporanTransaksi(Request $request)
    {
        $date_from = $request->date_from;
        $date_to = $request->date_to;
        $transactions = Pesanan::with('user', 'barang', 'detailOrders')->where('status', 'Selesai')->whereDate('created_at', '>=', $date_from)->whereDate('created_at', '<=', $date_to)->get();
        return view('pages.reports.laporan-transaksi', ['transactions' => $transactions, 'date_from' => $date_from, 'date_to' => $date_to]);
    }

    public function jurnalUmum(): View
    {
        return view('pages.owner.laporan.jurnal-umum', [
            'data' => Stock::orderBy('created_at', 'ASC')->get(),
        ]);
    }

    public function cetakjurnalUmum(Request $request)
    {
        $date_from = $request->date_from;
        $date_to = $request->date_to;
        $data = Stock::whereDate('created_at', '>=', $date_from)->whereDate('created_at', '<=', $date_to)->orderBy('created_at', 'ASC')->get();
        $balance = 0;
        foreach ($data as $item) {
            $balance += $item->harga_beli;
        }
        return view('pages.reports.jurnal-umum', [
            'data' => $data,
            'date_from' => $date_from,
            'date_to' => $date_to,
            'balance' => $balance
        ]);
    }

    public function labaRugi(): View
    {
        $data = Pesanan::orderBy('created_at', 'ASC')->get();
        $hpp = 0;
        foreach ($data as $item) {
            $hpp += $item->total_harga;
        }
        $stocks = Stock::orderBy('created_at', 'ASC')->get();
        $harga_pembelian = 0;
        foreach ($stocks as $item) {
            $harga_pembelian += $item->harga_beli;
        }
        $laba = $hpp - $harga_pembelian;
        return view('pages.owner.laporan.laporan-labarugi', [
            'harga_pembelian' => $harga_pembelian,
            'hpp' => $hpp,
            'laba' => $laba,
        ]);
    }

    public function cetakLabaRugi(Request $request)
    {
        $date_from = $request->date_from;
        $date_to = $request->date_to;
        $data = Pesanan::whereDate('created_at', '>=', $date_from)->whereDate('created_at', '<=', $date_to)->orderBy('created_at', 'ASC')->get();
        $hpp = 0;
        foreach ($data as $item) {
            $hpp += $item->total_harga;
        }
        $stocks = Stock::whereDate('created_at', '>=', $date_from)->whereDate('created_at', '<=', $date_to)->orderBy('created_at', 'ASC')->get();
        $harga_pembelian = 0;
        foreach ($stocks as $item) {
            $harga_pembelian += $item->harga_beli;
        }
        $laba = $hpp - $harga_pembelian;
        return view('pages.reports.Laporan-labarugi', [
            'harga_pembelian' => $harga_pembelian,
            'date_from' => $date_from,
            'date_to' => $date_to,
            'hpp' => $hpp,
            'laba' => $laba,
        ]);
    }

    public function bukuBesar(): View
    {
        $data = Stock::orderBy('created_at', 'ASC')->get();
        $stocks = Stock::orderBy('created_at', 'ASC')->get();
        $orders = Pesanan::orderBy('created_at', 'ASC')->get();


        return view('pages.owner.laporan.laporan-buku-besar', [
            'data' => $data,
            'orders' => $orders,

        ]);
    }

    public function cetakBukuBesar(Request $request)
    {
        $date_from = $request->date_from;
        $date_to = $request->date_to;
        $data = Stock::whereDate('created_at', '>=', $date_from)->whereDate('created_at', '<=', $date_to)->orderBy('created_at', 'ASC')->get();
        $stocks = Stock::whereDate('created_at', '>=', $date_from)->whereDate('created_at', '<=', $date_to)->orderBy('created_at', 'ASC')->get();
        $orders = Pesanan::whereDate('created_at', '>=', $date_from)->whereDate('created_at', '<=', $date_to)->orderBy('created_at', 'ASC')->get();


        // $stocks = Barang::select('barang.*')
        //     ->leftJoin('stocks', 'barang.id', '=', 'stocks.customer_id')
        //     ->whereNull('stocks.customer_id')->first();



        return view('pages.reports.Laporan-buku-besar', [
            'date_from' => $date_from,
            'date_to' => $date_to,
            'data' => $data,
            'orders' => $orders,
        ]);
    }
}
