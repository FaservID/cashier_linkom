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
</head>
<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top border-bottom">
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
                    @if (Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('fe.pesanan')}}">Pesanan</a>
                    </li>
                    @endif

                </ul>
                <div class="d-flex">
                    <a class="btn" type="submit" href="{{route('fe.cart')}}">
                        <i class="bi-cart-fill text-white"></i>
                        <span class="badge bg-danger text-white rounded-pill cart">0</span>
                    </a>
                    @if(Auth::check())
                    <a class="btn border-light text-white" href="{{route('fe.profil')}}" style="margin-right:10px">
                        <i class='bx bxs-user text-white'></i>
                    </a>

                    @endif
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
    <header class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            {{-- <div class="container"> --}}
            <div class="col-md-12 mt-5">
                <div class="row">

                    <div class="col-md-3 mb-4 mb-md-0">
                        <ul class="list-group">
                            <li class="list-group-item bg-dark text-white"><i class='bx bx-list-ul me-2'></i><span style="font-weight: bold">Katalog</span></li>
                            @foreach ($katalog as $item)
                            <li class="list-group-item"><a href="{{route('fe.index')}}?katalog={{$item->nama}}" class="text-dark text-decoration-none"><i class='bx bx-chevron-right me-2'></i> {{$item->nama}}</a></li>
                            @endforeach
                            <li class="list-group-item"><a href="{{route('fe.index')}}" class="text-dark text-decoration-none"><i class='bx bx-chevron-right me-2'></i> Semua Katalog</a></li>
                        </ul>
                        <ul class="list-group mt-2">
                            <li class="list-group-item bg-dark text-white"><i class='bx bx-list-ul me-2'></i><span style="font-weight: bold">Cari Produk</span></li>
                            <div class="d-flex justify-content-between list-group-item">
                                <form action="#">
                                    <div class="row">
                                        <div class="col-8 mb-md-2">
                                            <input type="text" class="form-control" placeholder="Cari produk" name="keyword" style="width: 100%">
                                        </div>
                                        <div class="col-4">
                                            <button type="submit" style="width: 100%" class="btn btn-dark"><i class='bx bx-search'></i></button>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </ul>
                    </div>
                    <div class="col-md-9 ">
                        <div id="carouselExampleCaptions" class="carousel slide">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="{{asset('fe/assets/bg4.jpg')}}" class="d-block w-100" alt="..." />
                                    <div class="carousel-caption d-none d-md-block">
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="{{asset('fe/assets/bg5.jpg')}}" class="d-block w-100" alt="..." />
                                    <div class="carousel-caption d-none d-md-block">

                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="{{asset('fe/assets/bg6.jpg')}}" class="d-block w-100" alt="..." />
                                    <div class="carousel-caption d-none d-md-block">

                                    </div>
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        {{-- <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Shop in style</h1>
                    <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage template</p>
                </div> 
        </div>  --}}
    </header>
    <section class="py-5 my-5" style="background-color: whitesmoke">
        <div class="container px-5">
            <div class="row gx-5 align-items-center">
                <div class="col-lg-4 d-flex justify-content-end ">
                    <div class="p-2"><img class="img-fluid img-thumbnail" src="{{asset('fe/assets/welcome.jpeg')}}" alt="welcome" width="300" /></div>
                </div>
                <div class="col-lg-8 d-flex justify-content-start">
                    <div class="p-2">
                        <h2 class="display-4">Tentang Kami!</h2>
                        <p style="text-align:justify; line-spacing:2px">
                            <div style="word-spacing:5px">
                                CV. Kasur Asssahaz adalah destinasi utama untuk kebutuhan tidur berkualitas tinggi di kota Palembang. Dengan pengalaman lebih dari 10 tahun dalam industri ini, toko ini telah membangun reputasi yang solid sebagai penyedia kasur terbaik dengan pelayanan yang unggul.
                            </div>
                            <div style="word-spacing:5px;" class="py-2">
                                CV. Kasur Asssahaz menawarkan berbagai macam kasur dengan kualitas terbaik dan pilihan desain yang beragam. Setiap produk yang dijual di toko ini dipilih dengan cermat untuk memastikan kenyamanan dan dukungan yang optimal bagi pelanggan. Dari kasur busa memori yang ergonomis hingga kasur pegas yang kokoh, toko ini memiliki solusi tidur yang sesuai untuk setiap preferensi individu.
                            </div>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section-->
    <section class="py-2 mt-5">
        <div class="container px-4 px-lg-5 mt-0">
            <div class="site-section-heading text-center py-4">
                <h2 style="font-family: 'Fira Sans', sans-serif; font-weight:bold">Produk Kami</h2>
            </div>
            <div class="col-md-12">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-lg-4 d-flex justify-content-center product">
                </div>
            </div>
        </div>
    </section>
    <div class="listCard">

    </div>
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <div class="total"></div>
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
        let product = document.querySelector('.product');
        let listCard = document.querySelector('.listCard');
        let total = document.querySelector('.total');
        let cart = document.querySelector('.cart');
        let products = @json($items);
        let listCards = [];

        let user_id = @json($user_id);
        console.log('user_id ', user_id)

        function initApp() {
            // debugger;
            if (localStorage.getItem('listaCards')) {
                listCards = JSON.parse(localStorage.getItem('listaCards'));
                reloadCard();
            }
            console.log(products)
            product.innerHTML = "";
            products.forEach((value, key) => {
                let newDiv = document.createElement('div');
                newDiv.classList.add('item');
                newDiv.innerHTML = `
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top p-2 img-fluid" src="http://127.0.0.1:8000/product_image/${value.foto}" alt="..." />
                            <!-- Product details-->
                            <div class="card-body px-4 py-1">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder" style="font-family: 'Roboto Condensed', sans-serif;">${value.nama}</h5>
                                    <div>${value.panjang == '-' ? ' ' : value.panjang} ${value.panjang == '-' ? ' ' : 'x'} ${value.lebar == '-' ? ' ' : value.lebar} </div>
                                    <!-- Product price-->
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center mt-2">
                                    <div class="btn btn-danger text-white">Rp. ${value.harga.toLocaleString()}</div>
                                    <button onClick='addToCard(${key})' class="btn btn-outline-dark mt-auto" type="button"><i class='bx bx-cart-add'></i></button>
                                </div>
                            </div>
                        </div>
                    </div>`;


                product.appendChild(newDiv);
            })

        }

        initApp();

        function addToCard(key) {
            // debugger;
            if(user_id == null) {
                window.location.href ="http://127.0.0.1:8000/login"
            } else {
                if (listCards[key] == null) {
                    // copy product form list to list card
                    listCards[key] = JSON.parse(JSON.stringify(products[key]));
                    listCards[key].quantity = 1;
                    listCards[key].price = listCards[key].harga;
                    listCards[key].user_id = user_id
                }
                reloadCard();

            }
        }

        function reloadCard() {
            listCard.innerHTML = '';
            let count = 0;
            let totalPrice = 0;
            let price = 0;
            console.log(listCards)
            listCards.forEach((value, key) => {
                totalPrice = totalPrice + parseInt(value.harga);
                count = count + value.quantity;
                price = value.harga
            })
            // cart.innerText = listCards.length;
            // console.log(count)
            let data = JSON.parse(localStorage.getItem('listaCards'))
            let cart = document.querySelector('.cart');
            console.log('total hraga', totalPrice.toLocaleString())
            data == null ? '0' : cart.innerText = data.length;

            localStorage.setItem('listaCards', JSON.stringify(listCards.filter(card => card !== null)));
        }

    </script>
</body>
</html>
