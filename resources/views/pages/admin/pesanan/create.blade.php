@extends('layouts.main')
@section('title', 'Tambah Barang')

@section('content')

<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Transaksi / Pesanan / </span> Tambah Baru</h4>


<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="container py-4">
                <form action="{{route('pesanan.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="col-12">
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label for="defaultFormControlInput" class="form-label">Nomor Pesanan</label>
                                <input type="text" value="{{ old('order_id') }}" readonly id="order_id" class="form-control @error('order_id') is-invalid @enderror" name="order_id" id="order_id" {{-- placeholder="John Doe" --}} aria-describedby="defaultFormControlHelp" />
                                @error('order_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>

                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4">
                                <label for="defaultFormControlInput" class="form-label">Nama</label>
                                <input type="text" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" name="name" id="name" {{-- placeholder="John Doe" --}} aria-describedby="defaultFormControlHelp" />
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="defaultFormControlInput" class="form-label">Nomor Handphone</label>
                                <input type="text" value="{{ old('phone_number') }}" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" id="phone_number" {{-- placeholder="John Doe" --}} aria-describedby="defaultFormControlHelp" />
                                @error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="defaultFormControlInput" class="form-label">Email</label>
                                <input type="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" name="email" id="email" {{-- placeholder="John Doe" --}} aria-describedby="defaultFormControlHelp" />
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label for="kategori_id" class="form-label">Barang</label>
                                <select class="select2 form-control form-select form-select" name="barang_id" id="barang_id">
                                    {{-- <option value="" selected disabled>-- Pilih Barang --</option> --}}
                                    @foreach ($barang as $item)
                                    <option value="{{$item->id}}">{{$item->nama}}</option>
                                    @endforeach
                                </select>
                                @error('kategori_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>

                        </div>
                        <div class="row mt-1">
                            <div class="col-md-12 mt-3">
                                <button type="button" style="width: 100%" class="btn btn-primary addCart" id="addCart" onclick="addToCart()">Tambahkan</button>
                            </div>
                        </div>
                        <div class="row mt-5 mb-3">
                            <div class="h-100" style="background-color: #f5f5f9;">
                                <div class="container h-100 py-4">
                                    <div class="row d-flex justify-content-center align-items-center h-100">
                                        <div class="col-12">

                                            <div class="d-flex justify-content-between align-items-center mb-4">
                                                <h5 class="fw-normal mb-0 text-black">Keranjang Belanja</h5>
                                            </div>

                                            {{-- <div class="card rounded-3 mb-4" id="cart">
                                                <div class="card-body p-4">
                                                    <div class="row d-flex justify-content-between align-items-center">
                                                        <div class="col-md-2 col-lg-2 col-xl-2">
                                                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-shopping-carts/img1.webp" class="img-fluid rounded-3" alt="Cotton T-shirt">
                                                        </div>
                                                        <div class="col-md-3 col-lg-3 col-xl-3">
                                                            <p class="lead fw-normal mb-2"><span id="namaBarang" class="namaBarang"></span></p>
                                                            <p><span class="text-muted">Size: </span>M <span class="text-muted">Color: </span>Grey</p>
                                                        </div>
                                                        <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                                            <button class="btn btn-link px-2" onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                                                <i class="fas fa-minus"></i>
                                                            </button>

                                                            <input id="form1" min="0" name="quantity" value="2" type="number" class="form-control form-control-sm" />

                                                            <button class="btn btn-link px-2" onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                                                <i class="fas fa-plus"></i>
                                                            </button>
                                                        </div>
                                                        <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                                            <h5 class="mb-0">$499.00</h5>
                                                        </div>
                                                        <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                                            <a href="#!" class="text-danger"><i class='bx bx-trash'></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}
                                            <div class="carttwo" id="carttwo">
                                                {{-- <div id="child">

                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>        
                    </div>
                    <div class="mt-4 mb-2 text-end">
                        <a href="{{route('barang.index')}}" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection

@push('custom-scripts')
<script type="text/javascript">
    $('.select2').select2({
        placeholder: '-- Pilih Barang --'
    });

</script>
@endpush
@push('custom-scripts')
<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
    });

</script>
@endpush
@push('custom-scripts')

<script type="text/javascript">
    window.onload = function() {
        let randNumber = getRandomInt(1, 100000000000)
        document.getElementById('order_id').value = randNumber
    }

    function getRandomInt(min, max) {
        min = Math.ceil(min);
        max = Math.floor(max);
        return 'INV' + Math.floor(Math.random() * (max - min + 1)) + min;

    }

    let selectedValues = [];


    function addToCart() {
        let selectElement = document.getElementById("barang_id");
        let selectedValue = selectElement.value;
        if (selectedValue != null) {
            let ceknilai = selectedValues.includes(selectedValue)
            if (!ceknilai) {
                var barang = @json($barang);
                for (let i = 0; i < barang.length; i++) {
                    if (barang[i].id == selectedValue) {
                        var qty = 1
                        var cart = `<div class="card rounded-3 mb-4" id="cartbox-${barang[i].id}" data-hidden-value='${barang[i].id}'>
                                <div class="card-body p-4">
                                    <div class="row d-flex justify-content-between align-items-center">
                                        <div class="col-md-2 col-lg-2 col-xl-2">
                                            <img src="http://127.0.0.1:8000/product_image/${barang[i].foto}" class="img-fluid rounded-3" alt="Cotton T-shirt">
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-xl-3">
                                            <input type='hidden' name='pid[]' value='${barang[i].id}'>
                                            <p class="lead fw-normal mb-2"><span id="namaBarang" class="namaBarang">${barang[i].nama}</span></p>
                                            <p><span class="text-muted">Tipe: </span>${barang[i].tipe} <br><span class="text-muted">Ukuran: </span>${barang[i].panjang} x ${barang[i].lebar}</p>
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-xl-2">
                                            <p><span class="text-muted">Stock: </span>${barang[i].in_stock} 
                                                <br> <span class="text-muted">Kategori: </span>${barang[i].kategori['nama']}  
                                            </p>
                                            <input id="qty" min="0" max="${barang[i].in_stock}" name="quantity[]" onChange="changeQty(${barang[i].harga})" value="1" type="number" class="form-control form-control-sm" />
                                            <input type="hidden" name="harga[]" value='${barang[i].harga}' >
                                        </div>
                                        <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                            <h5 class="mb-0">Rp. ${barang[i].harga}</h5>
                                        </div>
                                        <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                            <a href="#!" class="text-danger" onclick='handleDelete(${barang[i].id})'><i class='bx bx-trash'></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>`

                        $('.carttwo').append(cart);
                        selectedValues.push(selectedValue);
                        console.log('selected values: ', selectedValues);

                        let conString = JSON.stringify(selectedValue);
                        console.log('STRINGIFY : ', conString)
                        selectElement.selectedIndex = 0; // Reset select option
                    }
                }
            }
        }
    }

    function handleDelete(id) {
        if (selectedValues.length > 0) {
            var indexNilai = selectedValues.indexOf(id);
            selectedValues.splice(indexNilai, 1);
            var parentElementId = "cartbox-" + id;
            var grandparentElement = document.getElementById("carttwo");
            var parentElement = document.getElementById(parentElementId);
            grandparentElement.removeChild(parentElement);
        }
    }

</script>

@endpush
