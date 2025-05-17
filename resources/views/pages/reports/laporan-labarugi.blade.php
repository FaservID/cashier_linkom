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
            /* border: 1px solid #000; */
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
            <h5>Laba Rugi</h5>
            <div>Pertanggal {{\Carbon\Carbon::parse($date_from)->isoFormat('D MMMM YYYY')}} - {{\Carbon\Carbon::parse($date_to)->isoFormat('D MMMM YYYY')}}</div>
        </div>
    </div>
    <hr class="mb-4 border-black">
    <div class="col-md-12">
       <table style="width:100%; border:0px;" class="table-borderless">
            <thead>
                <tr>
                    <th colspan="2">
                        Pendapatan
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="px-4">HPP</td>
                    <td align="right">@currency($hpp)</td>
                </tr>
                <tr>
                    <td class="px-4">Harga Pembelian</td>
                    <td align="right" style="border-bottom:2px solid #000;">@currency($harga_pembelian)</td>
                </tr>
                <tr>
                    <td colspan="2" align="right">@currency($laba)</td>
                </tr>
            </tbody>
       </table>
    </div>
    <script>
        // window.print()

    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>
