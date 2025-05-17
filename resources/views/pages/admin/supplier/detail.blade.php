@extends('layouts.main')
@section('title', 'Detail Supplier')

@section('content')

<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Supplier / </span> Detail Supplier</h4>


<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-body">
                <div class="row g-0">
                    <div class="col-md-12" style="padding-left: 30px">
                        <h4 class="card-title fw-bold mt-4">{{$supplier->supplier_name}}</h4>
                        <p class="card-text my-1">Nama Supplier <span class="mx-2">:</span> {{$supplier->supplier_name}}</p>
                        <p class="card-text my-1">Contact Person <span class="mx-2">:</span> {{$supplier->contact_person}} CM</p>
                        <p class="card-text my-1">Nomor Handphone <span class="mx-2">:</span> {{$supplier->phone}}</p>
                        <p class="card-text my-1">Email <span class="mx-2">:</span> Rp. {{$supplier->email}}</p>
                        <p class="card-text my-1">Alamat <span class="mx-2">:</span> {{$supplier->address}}</p>

                    </div>
                </div>
                <div class="mt-4 text-end">
                    <a href="{{route('supplier.index')}}" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
