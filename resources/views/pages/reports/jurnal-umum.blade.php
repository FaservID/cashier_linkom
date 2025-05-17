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
    <div class="col-12">
        <div class="row mb-0 text-center">
            <h1 class="display-6" style="font-weight: bold; text-transform: uppercase">CV. Kasur Asssahaz</h1>
            <h5>Jurnal Umum</h5>
            <div>Pertanggal {{\Carbon\Carbon::parse($date_from)->isoFormat('D MMMM YYYY')}} - {{\Carbon\Carbon::parse($date_to)->isoFormat('D MMMM YYYY')}}</div>
        </div>
    </div>
    <hr class="mb-4 border-black">
    <table class="table table-bordered table-striped">
        <thead style="background-color:#84B0CA ;" class="text-white text-center">
            <tr>
                <th>Tanggal</th>
                <th>Keterangan</th>
                <th>DEBET</th>
                <th>KREDIT</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr>
                <td rowspan="2" class="text-center align-middle">{{\Carbon\Carbon::parse($item->tanggal)->isoFormat('D MMMM YYYY')}}</td>
                <td>Pembelian barang</td>
                <td class="text-end">@currency($item->harga_beli)</td>
                <td></td>
            </tr>
            <tr>
                <td><span class="py-2" style="padding-left: 20px">Kas</span></td>
                <td></td>
                <td class="text-end">@currency($item->harga_beli)</td>
            </tr>
            @endforeach

        </tbody>
        <tfoot>
            <tr>
                <th colspan="2">Balance</th>
                <th class="text-end">@currency($balance)</th>
                <th class="text-end">@currency($balance)</th>
            </tr>
        </tfoot>
    </table>
    <script>
        window.print()

    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>
