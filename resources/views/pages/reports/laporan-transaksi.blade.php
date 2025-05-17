<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laporan Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        table,
        tr,
        th,
        td {
            border: 1px solid #000;
            font-size: 12px;
        }

        hr {
            border: 1px solid #000;
        }

        ul {
            margin-left: -10px;
        }

        li {
            list-style-type: none;
            margin-left: -20px;
            margin-bottom: -10px;
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
            <h5>Laporan Transaksi</h5>
            <div>Pertanggal {{\Carbon\Carbon::parse($date_from)->isoFormat('D MMMM YYYY')}} - {{\Carbon\Carbon::parse($date_to)->isoFormat('D MMMM YYYY')}}</div>
        </div>
    </div>
    <hr class="mb-4 border-black">
    <table class="table table-bordered table-striped">
        <thead style="background-color:#84B0CA ;" class="text-white">
            <tr style="text-align: center">
                <th scope="col">#</th>
                <th scope="col">No Pesanan</th>
                <th scope="col" style="width: 100px">Nama</th>
                <th scope="col" style="width: 200px">Nama Barang</th>
                <th scope="col">Total Harga</th>
                <th scope="col">Status</th>
                <th scope="col">Tanggal Order</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; ?>
            @foreach ($transactions as $transaction)
            <tr>
                <th scope="row">{{$i++}}</th>
                <td>{{$transaction->order_id}}</td>
                <td>{{$transaction->user->name}}</td>
                <td>
                    <?php $x=1; ?>
                    @foreach ($transaction->detailOrders as $item)
                    <ul>
                        <li>{{$x++}}. {{$item->barang->nama}}</li>
                    </ul>
                    @endforeach
                </td>
                <td>
                    <?php $y=1; ?>
                    @foreach ($transaction->detailOrders as $item)
                    <ul>
                        <li>{{$y++}}. Rp. @currency($item->barang->harga)</li>
                    </ul>
                    @endforeach
                </td>
                <td>{{$transaction->status}}</td>
                <td>{{\Carbon\Carbon::parse($transaction->created_at)->isoFormat('D MMMM YYYY')}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <script>
        window.print()

    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>
