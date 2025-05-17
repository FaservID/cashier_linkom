@extends('layouts.main')
@section('title', 'Kategori Barang')

@push('custom-css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/5.0.7/sweetalert2.min.css" rel="stylesheet">
@endpush

@section('content')

<div class="d-flex justify-content-between flex-column flex-sm-row">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Master Barang /</span> Kategori</h4>
</div>

@if(session('message'))
<div class="alert alert-success alert-dismissible" role="alert">
    {{session('message')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="col-md-12">
    <div class="row">

        <!-- BUAT KATEGORI -->
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header">
                    Buat Kategori
                </div>
                <div class="card-body">
                    <form action="{{route('kategori.store')}}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="row">
                            <div class="col-md-12">
                                <label for="defaultFormControlInput" class="form-label">Nama Kategori</label>
                                <input type="text" value="{{ old('nama') }}" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" {{-- placeholder="John Doe" --}} aria-describedby="defaultFormControlHelp" />
                                @error('nama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label for="defaultFormControlInput" class="form-label">Deskripsi</label>
                                <textarea name="deskripsi" id="deskripsi" class="form-control" cols="30" rows="3"></textarea>
                                @error('deskripsi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-3 text-end">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <!-- END BUAT KATEGORI -->
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header border-bottom">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title fw-bold mb-0">List Kategori</h4>
                    </div>
                </div>
                <div class="card-body mt-4">
                    <div class="table-responsive text-nowrap">
                        <table id="example" class="display table table-bordered py-3">
                            <thead class="table-light">
                                <tr>
                                    <th class="text-center fw-bold">#</th>
                                    <th class="text-center fw-bold">Nama</th>
                                    <th class="text-center fw-bold">Deskripsi</th>
                                    <th class="text-center fw-bold">dibuat Tanggal</th>
                                    <th class="text-center fw-bold">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; ?>
                                @foreach ($categories as $category)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$category->nama}}</td>
                                    <td>{{$category->deskripsi}}</td>
                                    <td>{{\Carbon\Carbon::parse($category->created_at)->isoFormat('dddd, D MMMM YYYY');}}</td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <button type="button" class="btn btn-warning btn-xs" data-bs-toggle="modal" data-bs-target="#editData{{$category->id}}" data-target="#editData{{$category->id}}">
                                                Edit
                                            </button>
                                            <form method="POST" action="{{route('kategori.destroy', $category->id)}}">
                                                @csrf
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button type="submit" class="btn btn-danger btn-xs ms-1 show-alert-delete-box" data-toggle="tooltip" title='Delete'>Delete</button>
                                            </form>

                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>

        <!-- Button trigger modal -->

        @foreach ($categories as $category)

        <div class="modal fade" id="editData{{$category->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{route('kategori.update', $category->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Kategori</h1>
                        </div>
                        <div class="modal-body">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="defaultFormControlInput" class="form-label">Nama Kategori</label>
                                        <input type="text" value="{{$category->nama}}" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" {{-- placeholder="John Doe" --}} aria-describedby="defaultFormControlHelp" />
                                        @error('nama')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mt-2">
                                        <label for="defaultFormControlInput" class="form-label">Deskripsi</label>
                                        <textarea name="deskripsi" id="deskripsi" class="form-control" cols="30" rows="3">{{$category->deskripsi}}</textarea>
                                        @error('deskripsi')
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
                            <button type="submit" class="btn btn-primary">Ubah Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endforeach

        <!-- Modal -->
    </div>




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
