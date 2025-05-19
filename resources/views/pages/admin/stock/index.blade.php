@extends('layouts.main')
@section('title', 'Stock')

@push('custom-css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/5.0.7/sweetalert2.min.css" rel="stylesheet">
@endpush

@section('content')

    <div class="d-flex justify-content-between flex-column flex-sm-row">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Master Barang /</span> Stock</h4>
    </div>

    @if (session('message'))
        <div class="alert alert-success alert-dismissible" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="col-md-12">
        <div class="row">
            <!-- Tambah Stock -->
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header text-center border-bottom">
                        <h4 class="card-title fw-bold mb-0">Tambah Stock</h4>
                    </div>
                    <div class="card-body mt-3">
                        <form action="{{ route('stock.store') }}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="defaultFormControlInput" class="form-label">Tanggal</label>
                                    <input type="date" value="{{ old('tanggal') }}"
                                        class="form-control @error('tanggal') is-invalid @enderror" name="tanggal"
                                        id="tanggal" {{-- placeholder="John Doe" --}} aria-describedby="defaultFormControlHelp" />
                                    @error('tanggal')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <label for="defaultFormControlInput" class="form-label">Nama Barang</label>
                                    {{-- <input type="text" value="{{ old('nama') }}" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" placeholder="John Doe" aria-describedby="defaultFormControlHelp" /> --}}
                                    <select class="select2 form-control form-select" name="barang_id">
                                        <option value="" selected disabled>-- Pilih Barang --</option>
                                        @foreach ($barang as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                    @error('nama')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <label for="defaultFormControlInput" class="form-label">Pilih Supplier</label>
                                    <select class="select2 form-control form-select" name="supplier_id">
                                        <option value="" selected disabled>-- Pilih Supplier --</option>
                                        @foreach ($suppliers as $supplier)
                                            <option value="{{ $supplier->id }}">{{ $supplier->supplier_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('nama')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <label for="defaultFormControlInput" class="form-label">Jumlah</label>
                                    <input type="number" value="{{ old('jumlah') }}"
                                        class="form-control @error('jumlah') is-invalid @enderror" name="jumlah"
                                        id="jumlah" {{-- placeholder="John Doe" --}} aria-describedby="defaultFormControlHelp" />
                                    @error('jumlah')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <label for="harga_beli_display" class="form-label">Harga Total Pembelian</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1">Rp.</span>
                                        <input type="text"
                                            value="{{ old('harga_beli') ? number_format(old('harga_beli'), 0, ',', '.') : '' }}"
                                            class="form-control @error('harga_beli') is-invalid @enderror"
                                            id="harga_beli_display" aria-describedby="basic-addon1" />

                                        <input type="hidden" name="harga_beli" id="harga_beli"
                                            value="{{ old('harga_beli') }}">

                                        @error('harga_beli')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="mt-3 text-end">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <!-- END TAMBAH STOCK -->
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header border-bottom">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title fw-bold mb-0">List Stock </h4>
                        </div>
                    </div>
                    <div class="card-body mt-4">
                        <div class="table-responsive text-nowrap">
                            <table id="example" class="display table table-bordered py-3">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Barang</th>
                                        <th>Harga Beli</th>
                                        <th>Jumlah</th>
                                        <th>Tanggal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach ($stocks as $stock)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td><a href="barang/{{ $stock->barang->slug }}">{{ $stock->barang->nama }}</a>
                                            </td>
                                            <td>@currency($stock->harga_beli)</td>
                                            <td>{{ $stock->jumlah }}</td>
                                            <td>{{ \Carbon\Carbon::parse($stock->tanggal)->isoFormat('D MMMM YYYY') }}</td>
                                            <td class="d-flex justify-content-center">
                                                <div class="dropdown">
                                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                        data-bs-toggle="dropdown">
                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <button type="button" class="dropdown-item"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#editData{{ $stock->id }}"
                                                            data-target="#editData{{ $stock->id }}">
                                                            <i class="bx bx-edit-alt me-1"></i> Edit
                                                        </button>
                                                        <form method="POST"
                                                            action="{{ route('stock.destroy', $stock->id) }}">
                                                            @csrf
                                                            <input name="_method" type="hidden" value="DELETE">
                                                            <button type="submit"
                                                                class="btn dropdown-item show-alert-delete-box"
                                                                data-toggle="tooltip" title='Delete'><i
                                                                    class="bx bx-trash me-1"></i> Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Barang</th>
                                        <th>Harga Beli</th>
                                        <th>Jumlah</th>
                                        <th>Tanggal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                            </table>

                        </div>
                    </div>
                </div>

            </div>

            <!-- Button trigger modal -->

            @foreach ($stocks as $stock)
                <div class="modal fade" id="editData{{ $stock->id }}" data-bs-backdrop="static"
                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="{{ route('stock.update', $stock->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Stock</h1>
                                </div>
                                <div class="modal-body">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="defaultFormControlInput" class="form-label">Barang ID</label>
                                                <input type="hidden" value="{{ $stock->barang->id }}" name="barang_id">
                                                <div class="form-control">{{ $stock->barang->nama }}</div>
                                            </div>
                                            <div class="col-md-12 mt-3">
                                                <label for="defaultFormControlInput" class="form-label">Harga Beli</label>
                                                <input type="text" value="{{ $stock->harga_beli }}"
                                                    class="form-control @error('harga_beli') is-invalid @enderror"
                                                    name="harga_beli" id="harga_beli" {{-- placeholder="John Doe" --}}
                                                    aria-describedby="defaultFormControlHelp" />
                                                @error('harga_beli')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-12 mt-3">
                                                <label for="defaultFormControlInput" class="form-label">Jumlah</label>
                                                <input type="number" value="{{ $stock->jumlah }}"
                                                    class="form-control @error('jumlah') is-invalid @enderror"
                                                    name="jumlah" id="jumlah" {{-- placeholder="John Doe" --}}
                                                    aria-describedby="defaultFormControlHelp" />
                                                @error('jumlah')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
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
        $('.select2').select2({
            placeholder: '-- Pilih Opsi --'
        });
    </script>
    <script>
        const displayHarga = document.getElementById('harga_beli_display');
        const hiddenHarga = document.getElementById('harga_beli');

        function formatRupiah(angka) {
            let number_string = angka.replace(/[^,\d]/g, '').toString(),
                sisa = number_string.length % 3,
                rupiah = number_string.substr(0, sisa),
                ribuan = number_string.substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                let separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }
            return rupiah;
        }

        displayHarga.addEventListener('input', function() {
            let raw = this.value.replace(/[^0-9]/g, '');
            hiddenHarga.value = raw;
            this.value = formatRupiah(raw);
        });

        // Format saat halaman dimuat ulang (edit / error validation)
        window.addEventListener('DOMContentLoaded', () => {
            if (hiddenHarga.value) {
                displayHarga.value = formatRupiah(hiddenHarga.value);
            }
        });
    </script>

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
