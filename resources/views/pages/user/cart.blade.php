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
    <style>
        @media (min-width: 1025px) {
            .h-custom {
                height: 100vh !important;
            }
        }

        /* @import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap'); */

        body {
            background-color: #eeeeee;
            /* font-family: 'Open Sans', serif; */
            font-size: 14px;
            position: relative;
            margin: 0;
            padding: 0;
            min-height: 100%;
        }

        .container-fluid {
            margin-top: 20px
        }

        .card-body {
            -ms-flex: 1 1 auto;
            flex: 1 1 auto;
            padding: 1.40rem
        }

        .img-sm {
            width: 80px;
            height: 80px
        }

        .itemside .info {
            padding-left: 15px;
            padding-right: 7px
        }

        .table-shopping-cart .price-wrap {
            line-height: 1.2
        }

        .table-shopping-cart .price {
            font-weight: bold;
            margin-right: 5px;
            display: block
        }

        .text-muted {
            color: #969696 !important
        }

        a {
            text-decoration: none !important
        }

        .card {
            position: relative;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-direction: column;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid rgba(0, 0, 0, .125);
            border-radius: 0px
        }

        .itemside {
            position: relative;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            width: 100%
        }

        .dlist-align {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex
        }

        [class*="dlist-"] {
            margin-bottom: 5px
        }

        .price {
            font-weight: 600;
            color: #212529
        }

        .btn.btn-out {
            outline: 1px solid #fff;
            outline-offset: -5px
        }

        .btn-main {
            border-radius: 2px;
            text-transform: capitalize;
            font-size: 15px;
            padding: 10px 19px;
            cursor: pointer;
            color: #fff;
            width: 100%
        }

        .btn-light {
            color: #ffffff;
            background-color: #F44336;
            border-color: #f8f9fa;
            font-size: 12px
        }

        .btn-light:hover {
            color: #ffffff;
            background-color: #F44336;
            border-color: #F44336
        }

        .btn-apply {
            font-size: 11px
        }

        footer {
            /* position: absolute;
            right: 0;
            bottom: 0;
            left: 0; */
        }

    </style>
</head>
<body>
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
                    <button class="btn" type="submit">
                        <i class="bi-cart-fill text-white"></i>
                        <span class="badge bg-danger text-white rounded-pill cart">0</span>
                    </button>
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
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-0">
            <div class="container-fluid py-5">
                <div class="row">
                    <aside class="col-lg-9">
                        @if(session('message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{session('message')}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                        <div class="card mb-3">

                            <div class="table-responsive">
                                <form action="" method="POST">
                                    @csrf
                                    @method('POST')

                                    <table class="table table-bordered table-shopping-cart">
                                        <thead class="text-muted">
                                            <tr class="small text-uppercase">
                                                <th scope="col" width="20%" class="align-middle">Nomor Pesanan</th>
                                                <th scope="col"><input type="text" name="order_id" class="order_id form-control" id="order_id" readonly></th>
                                            </tr>
                                            <tr class="small text-uppercase">
                                                <th scope="col" width="20%" class="align-middle">Nama</th>
                                                <th scope="col"><input type="text" name="nama" class="nama form-control" id="nama" value="{{Auth::user()->name}}"></th>
                                            </tr>
                                            <tr class="small text-uppercase">
                                                <th scope="col" class="align-middle">Email</th>
                                                <th scope="col"><input type="text" name="email" class="email form-control" id="email" value="{{Auth::user()->email}}"></th>
                                            </tr>
                                            <tr class="small text-uppercase">
                                                <th scope="col" class="align-middle">Nomor Handphone</th>
                                                <th scope="col"><input type="text" name="phone_number" class="phone_number form-control" id="phone_number" value="{{Auth::user()->phone_number}}"></th>
                                            </tr>
                                        </thead>

                                    </table>
                            </div>
                        </div>
                        <div class="card">
                            <div class="table-responsive">
                                <table class="table table-bordered table-shopping-cart">
                                    <thead class="text-muted">
                                        <tr class="small text-uppercase">
                                            <th scope="col">Product</th>
                                            <th scope="col" width="25%" class="text-center">Quantity</th>
                                            <th scope="col" width="30%" class="text-center">Price</th>
                                        </tr>
                                    </thead>
                                    <tbody class="items">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </aside>
                    <aside class="col-lg-3">
                        <div class="card">
                            <input type="hidden" name="quantity[]" class="quantity">
                            <input type="hidden" name="total" class="input_total">
                            <input type="hidden" name="barang_id[]" class="barang_id">
                            <input type="hidden" name="harga[]" class="harga">

                            <div class="card-body">
                                <div class="mb-2">
                                    <label for="defaultFormControlInput" class="form-label">Pembayaran</label>
                                    <select name="type" id="type" class="form-control" required onchange="selectPayment()">
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
                                <div class="d-none mb-3" id="transfer">
                                    <label for="defaultFormControlInput" class="form-label">Nomor Rekening</label>
                                    <input type="text" readonly class="form-control @error('no_rek') is-invalid @enderror" name="no_rek" id="no_rek" value="BRI 08321312321" />
                                    @error('no_rek')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <dl class="dlist-align">
                                    <dt>Total price: </dt>
                                    <dd class="text-right px-1 total"> 0</dd>
                                </dl>
                                <dl class="dlist-align">
                                    <dt>Discount:</dt>
                                    <dd class="text-right text-danger px-1"> -0</dd>
                                </dl>
                                <dl class="dlist-align">
                                    <dt>Total:</dt>
                                    <dd class="text-right text-dark b px-1">Rp. <strong class="grandtotal"> 0</strong></dd>
                                </dl>
                                <hr> <button type="submit" class="btn btn-out btn-primary btn-square btn-main" onclick="destroyLocalStorage()"> Make Purchase </button> <a href="/" class="btn btn-out btn-success btn-square btn-main mt-2" data-abc="true">Continue Shopping</a>
                                </form>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
        <!-- Footer-->
    </section>
    <footer class="py-5 bg-dark mt-5">
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
    <script>
        window.onload = function() {
            let randNumber = getRandomInt(1, 100000000000)
            document.getElementById('order_id').value = randNumber
        }

        function getRandomInt(min, max) {
            min = Math.ceil(min);
            max = Math.floor(max);
            return 'INV' + Math.floor(Math.random() * (max - min + 1)) + min;

        }

        function selectPayment() {
            let type = document.getElementById(`type`).value;
            let transfer = document.getElementById(`transfer`);
            if (type == "Transfer") {
                transfer.classList.remove("d-none")
            } else {
                transfer.classList.add("d-none")

            }
        }

        let data = JSON.parse(localStorage.getItem('listaCards'))
        let cart = document.querySelector('.cart');
        let total = document.querySelector('.total');
        let input_total = document.querySelector('.input_total');
        let quantity = document.querySelector('.quantity');
        let barang_id = document.querySelector('.barang_id');
        let harga = document.querySelector('.harga');
        let items = document.querySelector('.items');
        let grandtotal = document.querySelector('.grandtotal');
        cart.innerText = data.length
        console.log(data)

        let user_id = @json($user_id);
        console.log('user_id ', user_id)

        function initApp() {

            items.innerHTML = "";
            let totalPrice = 0;
            let bid = [];
            let qty = [];
            let price = [];
            data.forEach((value, key) => {
                if (value.user_id == user_id) {
                    totalPrice = totalPrice + parseInt(value.harga);
                    // count = count + value.quantity;
                    let newDiv = document.createElement('tr');
                    newDiv.classList.add('item');
                    console.log(value.nama)
                    newDiv.innerHTML = `
                        <tr>
                        <td>
                            <figure class="itemside align-items-center">
                                <div class="aside"><img src="http://127.0.0.1:8000/product_image/${value.foto}" class="img-sm" width="200"></div>
                                <figcaption class="info"> <a href="#" class="title text-dark" data-abc="true">${value.nama}</a>
                                    <p class="text-muted small">Tipe: ${value.tipe} <br> Ukuran: ${value.panjang} cm x ${value.lebar} cm</p>
                                </figcaption>
                            </figure>
                        </td>
                        <td class="d-flex justify-content-between">
                            <button onclick="changeQuantity(${key}, ${value.quantity - 1})" class="btn btn-sm btn-primary mx-1">-</button>
                            <div readonly type="number" class="count form-control text-center">${value.quantity}</div>
                            <button onclick="changeQuantity(${key}, ${value.quantity + 1})" class="btn btn-sm btn-primary mx-1">+</button>

                        </td>
                        <td>
                            <div class="price-wrap"> <var class="price">Rp. ${value.harga.toLocaleString()}</var> </div>
                        </td>
                        </tr>`

                    items.appendChild(newDiv);
                    bid.push(value.id)
                    qty.push(value.quantity)
                    price.push(value.harga)
                }

            })
            // console.log(totalPrice.toLocaleString())
            // quantity.innerText = count;
            console.log('total hraga', totalPrice)
            total.innerText = totalPrice.toLocaleString()
            grandtotal.innerText = totalPrice.toLocaleString()
            input_total.value = totalPrice.toLocaleString()
            barang_id.value = bid
            harga.value = price
            quantity.value = qty
            localStorage.setItem('listaCards', JSON.stringify(data.filter(card => card !== null)));

        }

        initApp()


        function changeQuantity(key, quantity) {
            console.log('quantity ', quantity, key)
            if (quantity == 0) {
                delete data[key];
            } else {
                data[key].quantity = quantity;
                data[key].harga = (quantity * data[key].price);
            }
            initApp()
        }

        function destroyLocalStorage() {
            localStorage.clear();
        }

    </script>
</body>
</html>
