<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            -webkit-print-color-adjust: exact !important;
            print-color-adjust: exact !important;
        }

    </style>
</head>
<body>
    <div class="card">
        <div class="card-body">
            <div class="container mb-5 mt-3">
                <div class="row d-flex align-items-baseline">
                    <div class="col-xl-9">
                        <p style="color: #7e8d9f;font-size: 20px;">Invoice >> <strong>ID: {{$pesanan->order_id}}</strong></p>
                    </div>
                    <div class="col-xl-3 float-end">
                        <a class="btn text-capitalize border-0" data-mdb-ripple-color="dark" onclick="window.print()"><i class="fas fa-print text-primary"></i> Print</a>
                    </div>
                    <hr>
                </div>

                <div class="container">
                    <div class="col-md-12">
                        <div class="text-center">
                            <p class="pt-0 display-6">CV. Kasur Asssahaz</p>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-xl-8">
                            <ul class="list-unstyled">
                                <li class="text-muted">Kepada: <span style="color:#5d9fc5 ;">{{$pesanan->user->name}}</span></li>
                                <li class="text-muted">{{$pesanan->user->email}}</li>
                                <li class="text-muted">Indonesia</li>
                                <li class="text-muted"><i class="fas fa-phone"></i> {{$pesanan->user->phone_number}}</li>
                            </ul>
                        </div>
                        <div class="col-xl-4">
                            <p class="text-muted" style="font-weight: bold">Invoice</p>
                            <ul class="list-unstyled">
                                <li class="text-muted"><i class="fa-solid fa-circle fa-2xs"></i> <span class="fw-bold">ID:</span> {{$pesanan->order_id}}</li>
                                <li class="text-muted"><i class="fa-solid fa-circle fa-2xs"></i> <span class="fw-bold">Tanggal Order: </span>{{\Carbon\Carbon::parse($pesanan->created_at)->isoFormat('D MMMM YYYY')}}</li>
                                <li class="text-muted"><i class="fa-solid fa-circle fa-2xs"></i> <span class="me-1 fw-bold">Status:</span><span class="text-black fw-bold">
                                        {{$pesanan->status}}</span></li>
                            </ul>
                        </div>
                    </div>

                    <div class="row my-2 mx-1 justify-content-center">
                        <table class="table table-striped table-borderless">
                            <thead style="background-color:#84B0CA ;" class="text-white">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Barang</th>
                                    <th scope="col">Qty</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1;?>
                                @foreach ($pesanan->detailOrders as $item)

                                <tr>
                                    <th scope="row">{{$i++}}</th>
                                    <td>{{$item->barang->nama}}</td>
                                    <td>{{$item->jumlah}}</td>
                                    <td>@currency($item->barang->harga)</td>
                                    <td>@currency($item->harga)</td>
                                </tr>
                                @endforeach

                            </tbody>

                        </table>
                    </div>
                    <div class="row">
                        <div class="col-xl-8">

                        </div>
                        <div class="col-xl-3">

                            <p class="text-black float-start"><span class="text-black me-3"> Jumlah Total</span><span style="font-size: 25px;">@currency($pesanan->total_harga)</span></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xl-10">
                            <p>Thank you for your purchase</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>
