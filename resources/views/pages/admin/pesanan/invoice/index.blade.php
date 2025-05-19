<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Invoice CV. LINKOM</title>

    <!-- Favicon -->
    <link rel="icon" href="./images/favicon.png" type="image/x-icon" />
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            -webkit-print-color-adjust: exact !important;
            print-color-adjust: exact !important;
        }

    </style>

    <!-- Invoice styling -->
    <style>
        body {
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            text-align: center;
            color: #777;
        }

        body h1 {
            font-weight: 300;
            margin-bottom: 0px;
            padding-bottom: 0px;
            color: #000;
        }

        body h3 {
            font-weight: 300;
            margin-top: 10px;
            margin-bottom: 20px;
            font-weight: bold;
            color: #555;
        }

        body a {
            color: #06f;
        }

        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
            border-collapse: collapse;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }
    </style>
</head>

<body>
    <div class="invoice-box" style="margin-top:10vh">
        <table>
            <tr class="top">
                <td colspan="5">
                    <table>
                        <tr>
                            <td class="title">
                                <h3>CV. LINKOM</h3>
                            </td>

                            <td>
                                Invoice #: {{ $pesanan->order_id }}<br />
                                Dibuat : {{ \Carbon\Carbon::parse($pesanan->created_at)->format('d F Y') }}<br />
                                Status : {{ ucWords($pesanan->status) }}<br />
                                Metode Pembayaran : {{ ucWords($pesanan->payment?->tipe) }}<br />
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                CV. LINKOM.<br />
                                Jalan Bangau 1133 Ilir Tim. II<br />
                                Kota Palembang, 30126 <br>
                                <a data-mdb-ripple-color="dark" style="cursor: pointer" onclick="window.print()"><i class="fas fa-print text-primary"></i> Print</a>
                            </td>

                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="heading">
                <td style="text-align:center; width: 5%">#</td>
                <td style="text-align:center; width: 30%">Barang</td>
                <td style="text-align:center; width: 5%">Jumlah</td>
                <td style="text-align:center; width: 30%">Harga</td>
                <td style="text-align:center; width: 30%">Total Harga</td>
            </tr>

            <?php $i = 1; ?>
            @foreach ($pesanan->detailOrders as $item)
                <tr class="item">
                    <th style="text-align: center">{{ $i++ }}</th>
                    <td style="text-align: left">{{ $item->barang->nama }}</td>
                    <td style="text-align: center">{{ $item->jumlah }}</td>
                    <td style="text-align: center">@currency($item->barang->harga)</td>
                    <td style="text-align: right">@currency($item->harga)</td>
                </tr>
            @endforeach
            {{-- <tr class="item last">
					<td>Domain name (1 year)</td>

					<td>$10.00</td>
				</tr> --}}

            <tr class="total">
                <td colspan="5" style="text-align: right">@currency($pesanan->total_harga)</td>
            </tr>
        </table>
    </div>
</body>

</html>
