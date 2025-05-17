@extends('layouts.main')
@section('title', 'Barang')

@push('custom-css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/5.0.7/sweetalert2.min.css" rel="stylesheet">
    <style>
        .fancybox__container {
            z-index: 99999 !important;
        }
    </style>
@endpush

@section('content')

    <div class="d-flex justify-content-between flex-column flex-sm-row">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Master Barang /</span> Barang</h4>
    </div>

    @if (session('message'))
        <div class="alert alert-success alert-dismissible" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif


    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-header border-bottom">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title fw-bold mb-0">List Barang</h4>
                    <div>
                        <a href="{{ route('barang.create') }}" class="btn btn-primary btn-sm">Tambah Baru</a>
                    </div>
                </div>
            </div>
            <div class="card-body mt-4">
                <div class="table-responsive text-nowrap">

                    <table id="example" class="display table table-bordered py-3 table-responsive">
                        <thead class="table-light">
                            <tr>
                                <th class="text-center fw-bold" style="width: 2%">#</th>
                                <th class="text-center fw-bold">Nama</th>
                                <th class="text-center fw-bold">Tipe</th>
                                <th class="text-center fw-bold">Gambar</th>
                                <th class="text-center fw-bold">Harga</th>
                                <th class="text-center fw-bold">Dalam Stock</th>
                                <th class="text-center fw-bold">Stock Terjual</th>
                                <th class="text-center fw-bold">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach ($items as $item)
                                <tr>
                                    <td class="text-center">{{ $i++ }}</td>
                                    <td>
                                        {{ $item->nama }}
                                    </td>
                                    <td class="text-center">{{ $item->tipe }} <br> <span style="font-size:10px" class="fst-italic">Kategori : {{$item->kategori->nama}}</span> </td>
                                    <td class="text-center">
                                        <a data-fancybox="gallery"
                                            href="{{ asset('storage/product_image/' . $item->foto) }}">
                                            <button class="btn btn-xs btn-primary">Preview</button>
                                        </a>
                                    </td>
                                    <td>@currency($item->harga)</td>
                                    <td class="text-center">{{ $item->in_stock }}</td>
                                    <td class="text-center">{{ $item->sell_stock }}</td>
                                    <td class="text-center">
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a href="{{ route('barang.show', $item->slug) }}" class="dropdown-item"><i
                                                        class='bx bx-search-alt'></i> Detail</a>
                                                <a class="dropdown-item" href="{{ route('barang.edit', $item->slug) }}"><i
                                                        class="bx bx-edit-alt me-1"></i> Edit</a>
                                                <form method="POST" action="{{ route('barang.destroy', $item->slug) }}">
                                                    @csrf
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button type="submit" class="btn dropdown-item show-alert-delete-box"
                                                        data-toggle="tooltip" title='Delete'><i
                                                            class="bx bx-trash me-1"></i> Delete</button>
                                                </form>
                                            </div>
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.umd.js"></script>

    <script type="text/javascript">
        $('.show-alert-delete-box').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                title: "Apakah Anda Yakin Ingin Menghapus Data ini?",
                text: "Jika ini terhapus, data akan hilang selamanya",
                icon: "warning",
                type: "warning",
                buttons: ["Cancel", "Yes!"],
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
        });
    </script>
@endpush
