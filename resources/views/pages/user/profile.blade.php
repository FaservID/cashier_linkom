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

        .size {
            width: 50%;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #BA68C8
        }

        .profile-button {
            background: rgb(99, 39, 120);
            box-shadow: none;
            border: none
        }

        .profile-button:hover {
            background: #682773
        }

        .profile-button:focus {
            background: #682773;
            box-shadow: none
        }

        .profile-button:active {
            background: #682773;
            box-shadow: none
        }

        .back:hover {
            color: #682773;
            cursor: pointer
        }

        .labels {
            font-size: 11px
        }

        .add-experience:hover {
            background: #BA68C8;
            color: #fff;
            cursor: pointer;
            border: solid 1px #BA68C8
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

        {{-- <div class="container px-4 px-lg-5 mt-0 py-5"> --}}
        <div class="container size rounded bg-white mt-5 mb-5">
            <div class="row">
                <div class="col-md-4 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="{{asset('profile-picture')}}/{{Auth::user()->picture}}"><span class="font-weight-bold mt-2">{{Auth::user()->name}}</span><span class="text-black-50">{{Auth::user()->email}}</span><span> </span></div>
                </div>
                <div class="col-md-7 border-right">
                    <form action="{{route('fe.profil.update', Auth::user()->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="p-3 py-5">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="text-right">Profile Settings</h4>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <label class="labels">Nama</label>
                                    <input type="text" name="name" required class="form-control" placeholder="Nama" value="{{Auth::user()->name}}">
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <label class="labels">Email</label>
                                    <input type="text" name="email" required class="form-control" value="{{Auth::user()->email}}" placeholder="Email">
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <label class="labels">Nomor Handphone</label>
                                    <input type="text" name="phone_number" required class="form-control" value="{{Auth::user()->phone_number}}" placeholder="Nomor Handphone">
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <label class="labels">Dibuat Tanggal</label>
                                    <input type="text" readonly class="form-control" value="{{\Carbon\Carbon::parse(Auth::user()->created_at)->isoFormat('D MMMM YYYY')}}" placeholder="Nomor Handphone">
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <button class="btn btn-primary profile-button" style="width: 100%" type="submit">Ubah Profile</button>
                                </div>
                            </div>
                            <div class="row mt-4">
                                @if(session('message'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{session('message')}}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                @endif
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            {{-- </div> --}}

        </div>
    </section>

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
