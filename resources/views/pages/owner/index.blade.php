@extends('layouts.main')
@section('title', 'owner Home')


@section('content')
<div class="row">
    <div class="col-lg-12 mb-4 order-0">
        <div class="row">
            <div class="col-lg-8 mb-md-0 mb-3">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-7">
                            <div class="card-body">
                                <h5 class="card-title text-primary display-6">Halo, {{auth()->user()->name}}! 🎉</h5>
                                <p class="mb-4">
                                    {{\Carbon\Carbon::now()->isoFormat('dddd, D MMMM YYYY');}}
                                </p>
                                <p class="fw-bold text-muted" style="font-size: 13px">
                                    *) Laporan Hari Ini
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-5 text-center text-sm-left">
                            <div class="card-body pb-0 px-0 px-md-4">
                                <img src="{{asset('sneat/assets/img/illustrations/man-with-laptop-light.png')}}" height="140" alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png" data-app-light-img="illustrations/man-with-laptop-light.png" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-12">
                            <div class="card-body">
                                <i class='bx bx-dollar-circle' style="font-size: 35px;"></i>
                                <div class="py-2">Total Pemasukan</div>
                                <h2>@currency($data['pemasukan'])</h2>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12 col-md-12 order-1">
        <div class="row">
            <div class="col-lg-2 col-md-3 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <i class='bx bx-package text-dark' style="font-size: 35px;"></i>
                            </div>
                        </div>
                        <span class="fw-semibold d-block mb-1">Jumlah Barang</span>
                        <h3 class="card-title mb-2">{{$data['barang']}}</h3>
                        {{-- <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +72.80%</small> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <i class='bx bx-category' style="font-size: 35px;"></i>
                            </div>
                        </div>
                        <span class="fw-semibold d-block mb-1">Kategori</span>
                        <h3 class="card-title mb-2">{{$data['kategori']}}</h3>
                        {{-- <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +28.42%</small> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <i class='bx bxs-archive-out' style="font-size: 35px;"></i>
                            </div>
                        </div>
                        <span class="fw-semibold d-block mb-1">Terjual</span>
                        <h3 class="card-title mb-2">{{$data['terjual']}}</h3>
                        {{-- <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +28.42%</small> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <i class='bx bx-box' style="font-size: 35px;"></i>
                            </div>
                        </div>
                        <span class="fw-semibold d-block mb-1">Stock</span>
                        <h3 class="card-title mb-2">{{$data['stock']}}</h3>
                        {{-- <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +28.42%</small> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <i class='bx bxs-cart-download' style="font-size: 35px;"></i>
                            </div>
                        </div>
                        <span class="fw-semibold d-block mb-1">Transaksi</span>
                        <h3 class="card-title mb-2">{{$data['transaksi']}}</h3>
                        {{-- <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +28.42%</small> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <i class='bx bx-user-circle text-dark' style="font-size: 35px;"></i>
                            </div>
                        </div>
                        <span class="fw-semibold d-block mb-1">Pengguna</span>
                        <h3 class="card-title mb-2">{{$data['pengguna']}}</h3>
                        {{-- <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +28.14%</small> --}}
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection


@push('custom-scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
@endpush

@push('custom-scripts')

@endpush
