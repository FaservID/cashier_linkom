<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Toko Kasur</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="{{asset('fe/css/styles.css')}}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{asset('DataTables/datatables.min.css')}}" />
    <script type="text/javascript" src="{{asset('DataTables/datatables.min.js')}}"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src=" https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

    <style>
        body {
            background-color: #eeeeee;
            /* font-family: 'Open Sans', serif; */
            font-size: 14px;
            position: relative;
            margin: 0;
            padding: 0;
            min-height: 100%;
        }

        footer {
            position: absolute;
            width: 100%;
            /* bottom: -100px; */
        }

    </style>
</head>
<body>
    <!-- Navigation-->
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top border-bottom mb-5">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="/" style="font-weight: bold">CV. KASUR ASSSAHAZ</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('fe.pesanan')}}">Pesanan</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <a class="btn" type="submit" href="{{route('fe.cart')}}">
                        <i class="bi-cart-fill text-white"></i>
                        <span class="badge bg-danger text-white rounded-pill cart">0</span>
                    </a>
                    <a class="btn border-light text-white" href="{{route('fe.profil')}}" style="margin-right:10px">
                        <i class='bx bxs-user text-white'></i>
                    </a>
                    @if (!Auth::check())
                    <a class="btn border-light text-white" href="login">
                        <i class='bx bx-log-in text-white'></i> Masuk
                    </a>
                    @else
                    <a class="btn border-light text-white" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit(); destroyLocalStorage()">
                        <i class="bx bx-power-off"></i>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </nav>
    <!-- Header-->

    <!-- Section-->
    <section class="py-5 mb-5 mt-3">
        <div class="container px-4 px-lg-5 mt-0 py-5">
            <div class="card">
                <div class="card-header">
                    List Pesanan
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="display table table-bordered py-3">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>No Pesanan</th>
                                    <th>Nama</th>
                                    <th>Nama Barang</th>
                                    <th>Total Harga</th>
                                    <th>Status</th>
                                    <th>Tanggal Order</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $a=1; ?>
                                @foreach ($orders as $order)
                                <tr>
                                    <td>{{$a++}}</td>
                                    <td>{{$order->order_id}}</td>
                                    <td>{{$order->user->name}}</td>
                                    <td>
                                        <div class="badge bg-secondary" style="cursor: pointer" data-bs-toggle="modal" data-bs-target="#showData{{$order->id}}" data-target="#showData{{$order->id}}">Lihat Barang</div>
                                        <div class="modal fade" id="showData{{$order->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-xl">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Nomor Pesanan : <span class="font-weight-bold">{{$order->order_id}}</span></h1>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="col-md-12">
                                                            <div class="table-responsive">
                                                                <table class="table table-bordered">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>#</th>
                                                                            <th>Gambar</th>
                                                                            <th>Nama Barang</th>
                                                                            <th>Tipe</th>
                                                                            <th>Ukuran</th>
                                                                            <th>Jumlah</th>
                                                                            <th>Harga</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php $i=1; ?>
                                                                        @foreach ($order->detailOrders as $item)
                                                                        <tr>
                                                                            <td>{{$i++}}</td>
                                                                            <th><img src="{{asset('product_image')}}/{{$item->barang->foto}}" width="100" class="img img-fluid"></th>
                                                                            <td>{{$item->barang->nama}}</td>
                                                                            <td>{{$item->barang->tipe}}</td>
                                                                            <td>{{$item->barang->panjang}} x {{$item->barang->lebar}}</td>
                                                                            <td>{{$item->jumlah}}</td>
                                                                            <td>@currency($item->harga)</td>
                                                                        </tr>
                                                                        @endforeach
                                                                    </tbody>
                                                                    <tfoot>
                                                                        <tr>
                                                                            <th>#</th>
                                                                            <th colspan="5">Total Harga</th>
                                                                            <th>@currency($item->pesanan->total_harga)</th>
                                                                        </tr>
                                                                    </tfoot>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                    </td>
                                    <td>@currency($order->total_harga)</td>
                                    <td>
                                        @if ($order->status == "Belum Dibayar")
                                        <div class="badge bg-danger text-white">{{$order->status}}</div>
                                        @elseif($order->status == "Pesanan Diproses")
                                        <div class="badge bg-warning text-white">{{$order->status}}</div>
                                        @else
                                        <div class="badge bg-success text-white">{{$order->status}}</div>
                                        @endif
                                    </td>
                                    <td>{{\Carbon\Carbon::parse($order->created_at)->isoFormat('D MMMM YYYY')}}</td>
                                    <td class="d-flex justify-content-center">
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                @if ($order->status == "Belum Dibayar")
                                                <button type="button" class="btn dropdown-item" data-bs-toggle="modal" data-bs-target="#inputPembayaran{{$order->id}}" data-target="#inputPembayaran{{$order->id}}">
                                                    <i class='bx bx-wallet me-1'></i> Input Pembayaran
                                                </button>

                                                @endif

                                                <a href="{{route('fe.pesanan.invoice', $order->order_id)}}" target="_blank" class="dropdown-item"><i class='bx bx-receipt me-1'></i> Cetak Receipt</a>
                                            </div>
                                        </div>
                                    </td>

                                    @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>No Pesanan</th>
                                    <th>Nama</th>
                                    <th>Nama Barang</th>
                                    <th>Total Harga</th>
                                    <th>Status</th>
                                    <th>Tanggal Order</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Button trigger modal -->
    @foreach ($orders as $order)
    <div class="modal fade" id="inputPembayaran{{$order->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{route('fe.pesanan.payment')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <input type="hidden" name="pesanan_id" value="{{$order->id}}">
                    <input type="hidden" name="user_id" value="{{$order->user_id}}">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Input Pembayaran</h1>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="defaultFormControlInput" class="form-label">Nama</label>
                                    <input type="text" readonly value="{{$order->user->name}}" class="form-control @error('name') is-invalid @enderror" name="name" id="name" {{-- placeholder="John Doe" --}} aria-describedby="defaultFormControlHelp" />
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label for="defaultFormControlInput" class="form-label">Nomor Handphone</label>
                                    <input type="text" readonly value="{{$order->user->phone_number}}" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" id="phone_number" {{-- placeholder="John Doe" --}} aria-describedby="defaultFormControlHelp" />
                                    @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="defaultFormControlInput" class="form-label">Email</label>
                                    <input type="email" readonly value="{{$order->user->email}}" class="form-control @error('email') is-invalid @enderror" name="email" id="email" {{-- placeholder="John Doe" --}} aria-describedby="defaultFormControlHelp" />
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12">
                                    <div class="h-100">
                                        <div class="container h-100 py-2">
                                            <div class="row d-flex justify-content-center align-items-center h-100">
                                                <div class="border py-3 rounded text-center">
                                                    <div class="mb-2">
                                                        Total Bayar
                                                    </div>
                                                    <div class="display-4 ">@currency($order->total_harga)</div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <label for="defaultFormControlInput" class="form-label">Pembayaran</label>
                                    <select name="type" id="type-{{$order->id}}" class="form-control" onchange="selectPayment({{$order->id}})">
                                        <option value="" selected disabled>-- Pilih Pembayaran --</option>
                                        <option value="Cash">Cash</option>
                                        <option value="Transfer">Transfer</option>
                                    </select>
                                    @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div id="cash-{{$order->id}}" class="cash d-none">
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <label for="defaultFormControlInput" class="form-label">Nominal Bayar</label>
                                        <input type="text" class="form-control @error('total_bayar') is-invalid @enderror" name="total_bayar" id="total_bayar" {{-- placeholder="John Doe" --}} aria-describedby="defaultFormControlHelp" />
                                        @error('total_bayar')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div id="transfer-{{$order->id}}" class="transfer d-none">
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <label for="defaultFormControlInput" class="form-label">Pilih Bank</label>
                                        <select name="type_bank" id="type_bank" class="form-control">
                                            <option value="" selected disabled>-- Pilih Bank --</option>
                                            <option value="bri">Bank Rakyat Indonesia (BRI)</option>
                                            <option value="bca">Bank Central Asia (BCA)</option>
                                            <option value="mandiri">Mandiri</option>
                                            <option value="bni">Bank Negara Indonesia (BNI)</option>
                                        </select>
                                        @error('type_bank')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label for="defaultFormControlInput" class="form-label">Masukan Nomor Rekening</label>
                                        <input type="number" class="form-control @error('no_rek') is-invalid @enderror" name="no_rek" id="no_rek" {{-- placeholder="John Doe" --}} aria-describedby="defaultFormControlHelp" />
                                        @error('no_rek')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="defaultFormControlInput" class="form-label">Nama Rekening</label>
                                        <input type="text" class="form-control @error('nama_rek') is-invalid @enderror" name="nama_rek" id="nama_rek" {{-- placeholder="John Doe" --}} aria-describedby="defaultFormControlHelp" />
                                        @error('nama_rek')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <label for="defaultFormControlInput" class="form-label">Jumlah Transfer</label>
                                        <input type="text" class="form-control @error('jumlah') is-invalid @enderror" name="jumlah" id="jumlah" {{-- placeholder="John Doe" --}} aria-describedby="defaultFormControlHelp" />
                                        @error('jumlah')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <label for="defaultFormControlInput" class="form-label">Bukti Transfer</label>
                                        <input type="file" class="form-control @error('bukti_tf') is-invalid @enderror" name="bukti_tf" id="bukti_tf" {{-- placeholder="John Doe" --}} aria-describedby="defaultFormControlHelp" />
                                        @error('bukti_tf')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Bayar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach
    <!-- Modal -->

    <!-- Footer-->
    <footer class="py-5 bg-dark footer mt-5">
        <div class="container">
            <p class="m-0 text-center text-white">
                Copyright &copy; CV. Kasur Asssahaz 2023
            </p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->

    <script src="js/scripts.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable();
        });

    </script>
    <script type="text/javascript">
        let data = JSON.parse(localStorage.getItem('listaCards'))
        let cart = document.querySelector('.cart');

        cart.innerText = data.length
        console.log(data)

    </script>
    <script type="text/javascript">
        function selectPayment(id) {
            console.log(id)
            let type = document.getElementById(`type-${id}`).value;
            let cash = document.getElementById(`cash-${id}`);
            console.log(cash)
            let transfer = document.getElementById(`transfer-${id}`);
            if (type == "Cash") {
                cash.classList.remove("d-none")
                transfer.classList.add("d-none")
            } else {
                transfer.classList.remove("d-none")
                cash.classList.add("d-none")

            }
        }
        function destroyLocalStorage() {
            localStorage.clear();
        }
    </script>
    
</body>
</html>
