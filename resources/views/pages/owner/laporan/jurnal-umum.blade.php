@extends('layouts.main')
@section('title', 'Laporan')

@push('custom-css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/5.0.7/sweetalert2.min.css" rel="stylesheet">
@endpush

@section('content')

<div class="d-flex justify-content-between flex-column flex-sm-row">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Laporan /</span> Jurnal Umum</h4>
    <div class="py-3">
        <button class="btn btn-danger float-right" data-bs-toggle="modal" data-bs-target="#laporan" data-target="#laporan">
            <i class='bx bxs-file-pdf me-1'></i>Cetak Laporan
        </button>
    </div>
</div>

@if(session('message'))
<div class="alert alert-success alert-dismissible" role="alert">
    {{session('message')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif


<div class=" col-md-12">
    <div class="card mb-4">
        <div class="card-header">
            Jurnal Umum
        </div>
        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="display table table-bordered py-3">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Keterangan</th>
                            <th>DEBET</th>
                            <th>KREDIT</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td rowspan="2">{{\Carbon\Carbon::parse($item->tanggal)->isoFormat('D MMMM YYYY')}}</td>
                            <td>Pembelian barang</td>
                            <td>@currency($item->harga_beli)</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Kas</td>
                            <td></td>
                            <td>@currency($item->harga_beli)</td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Button trigger modal -->

    <div class="modal fade" id="laporan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{route('owner.pesanan.cetak_jurnal_umum')}}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Laporan Stock</h1>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="defaultFormControlInput" class="form-label">Dari Tanggal</label>
                                    <input type="date" class="form-control @error('date_from') is-invalid @enderror" name="date_from" id="date_from" {{-- placeholder="John Doe" --}} aria-describedby="defaultFormControlHelp" />
                                    @error('date_from')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-12 mt-2">
                                    <label for="defaultFormControlInput" class="form-label">Sampai Tanggal</label>
                                    <input type="date" class="form-control @error('date_to') is-invalid @enderror" name="date_to" id="date_to" {{-- placeholder="John Doe" --}} aria-describedby="defaultFormControlHelp" />
                                    @error('date_to')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" formtarget="_blank" class="btn btn-primary">Cetak Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
</div>
@endsection

@push('custom-scripts')
<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
    });

</script>
@endpush
@push('custom-scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script type="text/javascript">
    $('.show-alert-delete-box').click(function(event) {
        var form = $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        swal({
            title: "Apakah Anda Yakin Ingin Menghapus Data ini?"
            , text: "Jika ini terhapus, data akan hilang selamanya"
            , icon: "warning"
            , type: "warning"
            , buttons: ["Cancel", "Yes!"]
            , confirmButtonColor: '#3085d6'
            , cancelButtonColor: '#d33'
            , confirmButtonText: 'Yes, delete it!'
        }).then((willDelete) => {
            if (willDelete) {
                form.submit();
            }
        });
    });

</script>
@endpush
