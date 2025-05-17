@extends('layouts.main')
@section('title', 'Detail Barang')

@section('content')

<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Barang / </span> Detail Barang</h4>


<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-header">
                <h4 class="text-center fw-bold border-bottom pb-4">{{$barang->nama}}</h4>
            </div>
            <div class="card-body">
                <div class="row g-0">
                    <div class="col-md-4 mb-3">
                        <img src="{{asset('storage/product_image')}}/{{$barang->foto}}" class="img-fluid img-thumbnail rounded" alt="product image">
                    </div>
                    <div class="col-md-8" style="padding-left: 30px">
                        <h4 class="card-title">{{$barang->nama}}</h4>
                        <p class="card-text my-1">Kategori <span class="mx-2">:</span> {{$barang->kategori->nama}}</p>
                        <p class="card-text my-1">Tipe <span class="mx-2">:</span> {{$barang->tipe}}</p>
                        <p class="card-text my-1">Harga <span class="mx-2">:</span> Rp. {{$barang->harga}}</p>
                        <p class="card-text my-1">In Stock <span class="mx-2">:</span> {{$barang->in_stock}}</p>
                        <p class="card-text my-1">Stock Terjual <span class="mx-2">:</span> {{$barang->sell_stock}}</p>
                        <p class="card-text my-1">Keterangan <span class="mx-2">:</span> {{$barang->keterangan}}</p>

                    </div>
                </div>
                <div class="mt-4 text-end">
                    <a href="{{route('barang.index')}}" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
