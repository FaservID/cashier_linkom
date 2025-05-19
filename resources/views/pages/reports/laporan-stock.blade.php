<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laporan Stock Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        table,
        tr,
        th,
        td {
            border: 1px solid #000;
            font-size: 14px;
        }

        hr {
            border: 1px solid #000;
        }

        body {
            -webkit-print-color-adjust: exact !important;
            print-color-adjust: exact !important;
        }

    </style>
</head>
<body>
    <div class="col-12 my-5">
        <div class="row mb-0 text-center">
            <h1 class="display-6" style="font-weight: bold; text-transform: uppercase">CV. LINKOM</h1>
            <h5>Laporan Stock Barang</h5>
            <div>Pertanggal {{\Carbon\Carbon::parse($date_from)->isoFormat('D MMMM YYYY')}} - {{\Carbon\Carbon::parse($date_to)->isoFormat('D MMMM YYYY')}}</div>
        </div>
    </div>
    <hr class="mb-4 border-black">
    <table class="table table-bordered table-striped">
        <thead class="text-white text-center align-middle table-dark">
            <tr>
                <th scope="col" rowspan="2">#</th>
                <th scope="col" rowspan="2">Nama Barang</th>
                <th scope="col" rowspan="2">Stock Awal</th>
                <th scope="col" colspan="2">Mutasi</th>
                <th scope="col" rowspan="2">Stock Akhir</th>

            </tr>
            <tr>
                <th scope="col">Masuk</th>
                <th scope="col">Keluar</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; ?>
            @foreach ($items as $key => $item)
            <tr>
                <th scope="row" class="text-center">{{$i++}}</th>
                <td>{{$item->nama}}</td>
                <td class="text-center">
                    <div style="display: none">
                        {{ $in_stock = 0 }}
                    </div>
                    @foreach ($item->stocks as $stock)
                    <div style="display: none">{{$in_stock = $item->in_stock - $stock->jumlah}}</div>
                    @endforeach
                    @if ($in_stock == 0)
                    {{$item->in_stock}}
                    @else
                    {{$in_stock}}
                    @endif

                </td>
                <td class="text-center">
                    <div style="display: none">
                        {{ $stock_masuk = 0}}
                    </div>
                    @foreach ($item->stocks as $stock)
                    <div style="display: none">{{$stock_masuk += $stock->jumlah}}</div>
                    @endforeach
                    {{$stock_masuk}}
                </td>
                <td class="text-center">
                    <div style="display: none">
                        {{ $stock_keluar = 0 }}
                    </div>
                    @foreach ($item->detailOrders as $order)
                    <div style="display: none">{{$stock_keluar += $order->jumlah}}</div>
                    @endforeach
                    {{$stock_keluar}}
                </td>
                <td class="text-center">
                    @if ($in_stock == 0)
                    {{ $item->in_stock + $stock_masuk - $stock_keluar }}
                    @else
                    {{$in_stock + $stock_masuk - $stock_keluar}}
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <script>
        // window.print()

    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>
