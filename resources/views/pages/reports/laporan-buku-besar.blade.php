<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laporan Buku Besar</title>
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
    <div class="col-12">
        <div class="row mb-0 text-center">
            <h1 class="display-6" style="font-weight: bold; text-transform: uppercase">CV. Kasur Asssahaz</h1>
            <h5>Buku Besar</h5>
            <div>Pertanggal {{\Carbon\Carbon::parse($date_from)->isoFormat('D MMMM YYYY')}} - {{\Carbon\Carbon::parse($date_to)->isoFormat('D MMMM YYYY')}}</div>
        </div>
    </div>
    <hr class="mb-4 border-black">
    <div class="kas">
        Nama Akun : Kas
        <table class="table table-bordered table-striped">
            <thead style="background-color:#84B0CA ;" class="text-white text-center align-middle">
                <tr>
                    <th rowspan="2" class="text-center align-middle">Tanggal</th>
                    <th rowspan="2" class="text-center align-middle">Keterangan</th>
                    <th rowspan="2" class="text-center align-middle">Ref</th>
                    <th rowspan="2" class="text-center align-middle">Debet</th>
                    <th rowspan="2" class="text-center align-middle">Kredit</th>
                    <th colspan="2" class="text-center align-middle">Saldo</th>
                </tr>
                <tr>
                    <th class="text-center align-middle">Debet</th>
                    <th class="text-center align-middle">Kredit</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)

                <tr>
                    <td>{{\Carbon\Carbon::parse($item->created_at)->isoFormat('D MMMM YYYY')}}</td>
                    <td>Kas</td>
                    <td>111</td>
                    <td></td>
                    <td>@currency($item->harga_beli)</td>
                    <td></td>
                    <td>@currency($item->harga_beli)</td>
                </tr>
                @endforeach
                @foreach ($orders as $order)
                <tr>
                    <td>{{\Carbon\Carbon::parse($order->created_at)->isoFormat('D MMMM YYYY')}}</td>
                    <td>Kas</td>
                    <td>111</td>
                    <td>@currency($order->total_harga)</td>
                    <td></td>
                    <td>@currency($order->total_harga)</td>
                    <td></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="penjualan">
        Nama Akun : Penjualan
        <table class="table table-bordered table-striped">
            <thead style="background-color:#84B0CA ;" class="text-white text-center align-middle">
                <tr>
                    <th rowspan="2" class="text-center align-middle">Tanggal</th>
                    <th rowspan="2" class="text-center align-middle">Keterangan</th>
                    <th rowspan="2" class="text-center align-middle">Ref</th>
                    <th rowspan="2" class="text-center align-middle">Debet</th>
                    <th rowspan="2" class="text-center align-middle">Kredit</th>
                    <th colspan="2" class="text-center align-middle">Saldo</th>
                </tr>
                <tr>
                    <th class="text-center align-middle">Debet</th>
                    <th class="text-center align-middle">Kredit</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                <tr>
                    <td>{{\Carbon\Carbon::parse($order->created_at)->isoFormat('D MMMM YYYY')}}</td>
                    <td>Penjualan</td>
                    <td>411</td>
                    <td></td>
                    <td>@currency($order->total_harga)</td>
                    <td></td>
                    <td>@currency($order->total_harga)</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="pembelian">
        Nama Akun : Pembelian
        <table class="table table-bordered table-striped">
            <thead style="background-color:#84B0CA ;" class="text-white text-center align-middle">
                <tr>
                    <th rowspan="2" class="text-center align-middle">Tanggal</th>
                    <th rowspan="2" class="text-center align-middle">Keterangan</th>
                    <th rowspan="2" class="text-center align-middle">Ref</th>
                    <th rowspan="2" class="text-center align-middle">Debet</th>
                    <th rowspan="2" class="text-center align-middle">Kredit</th>
                    <th colspan="2" class="text-center align-middle">Saldo</th>
                </tr>
                <tr>
                    <th class="text-center align-middle">Debet</th>
                    <th class="text-center align-middle">Kredit</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)

                <tr>
                    <td>{{\Carbon\Carbon::parse($item->created_at)->isoFormat('D MMMM YYYY')}}</td>
                    <td>Pembelian</td>
                    <td>500</td>
                    <td>@currency($item->harga_beli)</td>
                    <td></td>
                    <td>@currency($item->harga_beli)</td>
                    <td></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        window.print()

    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>
