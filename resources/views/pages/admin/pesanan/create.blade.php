@extends('layouts.main')
@section('title', 'Tambah Barang')

@push('custom-css')
    <style>
        #cash,
        #transfer {
            display: none;
        }
    </style>
@endpush
@section('content')

    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Transaksi / Pesanan / </span> Tambah Baru</h4>


    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="container py-4">
                    <form action="{{ route('pesanan.store') }}" method="post" id="form-pesanan" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <input type="hidden" name="grandtotal" id="grandtotal">
                        <div class="col-12">
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <label for="defaultFormControlInput" class="form-label">Nomor Pesanan</label>
                                    <input type="text" value="{{ old('order_id') }}" readonly id="order_id"
                                        class="form-control @error('order_id') is-invalid @enderror" name="order_id"
                                        id="order_id" aria-describedby="defaultFormControlHelp" />
                                    @error('order_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <label for="defaultFormControlInput" class="form-label">Tanggal Belanja</label>
                                    <input type="text" value="{{ \Carbon\Carbon::now()->format('d F Y H:i A') }}"
                                        readonly id="date_order"
                                        class="form-control @error('date_order') is-invalid @enderror" name="date_order"
                                        id="date_order" aria-describedby="defaultFormControlHelp" />
                                    @error('date_order')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <label for="kategori_id" class="form-label">Barang</label>
                                    <select class="select2 form-control form-select form-select" name="barang_id"
                                        id="barang_id">
                                        {{-- <option value="" selected disabled>-- Pilih Barang --</option> --}}
                                        @foreach ($barang as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                    @error('kategori_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>
                            <div class="row mt-1">
                                <div class="col-md-12 mt-3">
                                    <button type="button" class="btn btn-primary addCart w-100 btn-sm" id="addCart"
                                        onclick="addToCart()">Tambahkan ke keranjang</button>
                                </div>
                            </div>
                            <div class="row mt-5 mb-1">
                                <div class="h-100" style="background-color: #f5f5f9;">
                                    <div class="container h-100 py-4">
                                        <div class="row d-flex justify-content-center align-items-center h-100">
                                            <div class="col-12">

                                                <div
                                                    class="d-flex justify-content-center align-items-center mb-4 border-bottom pb-4">
                                                    <h5 class="fw-bold mb-0 text-black">Keranjang Belanja</h5>
                                                </div>
                                                <div class="carttwo" id="carttwo">
                                                    <div id="cart-empty-msg" class="text-muted text-center">Belum ada barang
                                                        di dalam cart</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="h-100" style="background-color: #f5f5f9;">
                                    <div class="container h-100 py-4">
                                        <div class="text-center">
                                            <div>Total Belanja</div>
                                            <h4 class="mb-0">Rp. <span id="total">0</span></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="kategori_id" class="form-label">Pilih Metode Pembayaran</label>
                                    <select class="form-control form-select form-select" name="payment_method"
                                        id="payment_method">
                                        <option value="cash">Cash</option>
                                        <option value="transfer">Transfer</option>
                                    </select>
                                    @error('payment_method')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>
                            <div id="cash">
                                <div class="row mt-3">

                                    <div class="col-md-6 ">
                                        <label for="nominal_display" class="form-label">Jumlah Uang</label>
                                        <div class="input-group w-100">
                                            <span class="input-group-text" id="basic-addon1">Rp.</span>
                                            <input type="text w-100"
                                                value="{{ old('nominal') ? number_format(old('nominal'), 0, ',', '.') : '' }}"
                                                class="form-control @error('nominal') is-invalid @enderror"
                                                id="nominal_display" aria-describedby="basic-addon1" />

                                            <input type="hidden" name="harga_cash" id="nominal"
                                                value="{{ old('nominal') }}">

                                            @error('nominal')
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="defaultFormControlInput" class="form-label">Kembalian</label>
                                        <input type="text" readonly id="kembalian"
                                            class="form-control @error('kembalian') is-invalid @enderror" name="kembalian"
                                            id="kembalian" aria-describedby="defaultFormControlHelp" />
                                        @error('kembalian')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3" id="transfer">
                                <div class="col-md-12">
                                    <div class="h-100" style="background-color: #f5f5f9;">
                                        <div class="container h-100 py-4">
                                            <div class="text-center">
                                                <h4 class="fw-bold mb-2">BCA</h4>
                                                <div>Nomor Rekening : <b>116-5455888</b></div>
                                                <div>Nama Rekening : <b>LINKOM CV</b></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <label for="nominal_transfer_display" class="form-label">Nominal Transfer</label>
                                    <div class="input-group w-100">
                                        <span class="input-group-text" id="basic-addon1">Rp.</span>
                                        <input type="text w-100"
                                            value="{{ old('nominal_transfer') ? number_format(old('nominal_transfer'), 0, ',', '.') : '' }}"
                                            class="form-control @error('nominal_transfer') is-invalid @enderror"
                                            id="nominal_transfer_display" aria-describedby="basic-addon1" />

                                        <input type="hidden" name="harga_transfer" id="nominal_transfer"
                                            value="{{ old('nominal_transfer') }}">

                                        @error('nominal_transfer')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="mt-4 mb-2 text-end">
                            <a href="{{ route('barang.index') }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection

@push('custom-scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script type="text/javascript">
        $('.select2').select2({
            placeholder: '-- Pilih Barang --'
        });
    </script>
@endpush
@push('custom-scripts')
    <script>
        $(document).ready(function() {
            function togglePaymentFields() {
                const selected = $('#payment_method').val();
                $('#cash').hide();
                $('#transfer').hide();

                if (selected === 'cash') {
                    $('#cash').show();
                } else if (selected === 'transfer') {
                    $('#transfer').show();
                }
            }

            $('#payment_method').on('change', togglePaymentFields);
            togglePaymentFields(); // Initial call
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
    <script>
        const displayHargaTransfer = document.getElementById('nominal_transfer_display');
        const hiddenHargaTransfer = document.getElementById('nominal_transfer');

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

        displayHargaTransfer.addEventListener('input', function() {
            let raw = this.value.replace(/[^0-9]/g, '');
            hiddenHargaTransfer.value = raw;
            this.value = formatRupiah(raw);
        });

        // Format saat halaman dimuat ulang (edit / error validation)
        window.addEventListener('DOMContentLoaded', () => {
            if (hiddenHargaTransfer.value) {
                displayHargaTransfer.value = formatRupiah(hiddenHargaTransfer.value);
            }
        });
    </script>
    <script>
        const displayHarga = document.getElementById('nominal_display');
        const hiddenHarga = document.getElementById('nominal');

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
@endpush
@push('custom-scripts')
    <!-- Script -->
    <script type="text/javascript">
        window.onload = function() {
            let randNumber = getRandomInt(1, 100000000000);
            document.getElementById('order_id').value = randNumber;
            toggleEmptyCartMessage(); // initial check
        }

        function getRandomInt(min, max) {
            min = Math.ceil(min);
            max = Math.floor(max);
            return 'INV' + Math.floor(Math.random() * (max - min + 1)) + min;
        }

        let selectedValues = [];

        function toggleEmptyCartMessage() {
            const msg = document.getElementById('cart-empty-msg');
            if (selectedValues.length === 0) {
                msg.style.display = 'block';
            } else {
                msg.style.display = 'none';
            }
        }

        function calculateGrandTotal() {
            let total = 0;
            selectedValues.forEach(id => {
                const qtyInput = document.getElementById(`qty-${id}`);
                const harga = parseInt(qtyInput.getAttribute('data-harga'));
                const qty = parseInt(qtyInput.value);
                if (!isNaN(harga) && !isNaN(qty)) {
                    total += qty * harga;
                }
            });

            const totalElement = document.getElementById('total');
            totalElement.textContent = total.toLocaleString('id-ID');

            $('#grandtotal').val(total);
        }

        function changeQty(id) {
            const qtyInput = document.getElementById(`qty-${id}`);
            const qty = parseInt(qtyInput.value);
            const harga = parseInt(qtyInput.getAttribute('data-harga'));
            const total = qty * harga;

            const totalHargaElement = document.getElementById(`total-harga-${id}`);
            totalHargaElement.textContent = "Rp. " + total.toLocaleString('id-ID');

            calculateGrandTotal();
        }

        function addToCart() {
            let selectElement = document.getElementById("barang_id");
            let selectedValue = selectElement.value;

            if (selectedValue != null && selectedValue !== "") {
                let isExists = selectedValues.includes(selectedValue);
                if (!isExists) {
                    var barang = @json($barang);
                    for (let i = 0; i < barang.length; i++) {
                        if (barang[i].id == selectedValue) {
                            let cart = `
                        <div class="card rounded-3 mb-4" id="cartbox-${barang[i].id}" data-hidden-value='${barang[i].id}'>
                            <div class="card-body p-4">
                                <div class="row d-flex justify-content-between align-items-center">
                                    <div class="col-md-2 col-lg-2 col-xl-2">
                                        <img src="/storage/product_image/${barang[i].foto}" class="img-fluid rounded-3" alt="${barang[i].nama}">
                                    </div>
                                    <div class="col-md-3 col-lg-3 col-xl-3 mt-3">
                                        <input type='hidden' name='pid[]' value='${barang[i].id}'>
                                        <p class="lead fw-normal mb-0">${barang[i].nama}</p>
                                        <p class="mb-0"><span class="text-muted">Kategori: </span>${barang[i].kategori['nama']}</p>
                                        <p class="mb-0"><span class="text-muted mt-0">Tipe: </span>${barang[i].tipe} </p>
                                        <p><span class="text-muted">Harga: </span>Rp. ${barang[i].harga.toLocaleString('id-ID')}</p>
                                    </div>
                                    <div class="col-md-3 col-lg-3 col-xl-2">
                                        <p class="mb-0"><span class="text-muted">Stock: </span>${barang[i].in_stock}</p>
                                        <input id="qty-${barang[i].id}" min="1" max="${barang[i].in_stock}"
                                            name="quantity[]" value="1" type="number"
                                            class="form-control form-control-sm"
                                            data-harga="${barang[i].harga}"
                                            onchange="changeQty(${barang[i].id})" />
                                        <input type="hidden" name="harga[]" value='${barang[i].harga}'>
                                    </div>
                                    <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                        <p class="mb-0">Total Harga :</p>
                                        <h5 class="mb-0" id="total-harga-${barang[i].id}">Rp. ${barang[i].harga.toLocaleString('id-ID')}</h5>
                                    </div>
                                    <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                        <a href="#!" class="text-danger" onclick='handleDelete(${barang[i].id})'><i class='bx bx-trash'></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>`;

                            $('.carttwo').append(cart);
                            selectedValues.push(selectedValue);
                            toggleEmptyCartMessage();
                            calculateGrandTotal();
                            selectElement.selectedIndex = 0;
                        }
                    }
                }
            }
        }

        function handleDelete(id) {
            if (selectedValues.length > 0) {
                var index = selectedValues.indexOf(String(id));
                if (index !== -1) {
                    selectedValues.splice(index, 1);
                    var parentElementId = "cartbox-" + id;
                    var parentElement = document.getElementById(parentElementId);
                    if (parentElement) {
                        parentElement.remove();
                    }
                    toggleEmptyCartMessage();
                    calculateGrandTotal();
                }
            }
        }
    </script>

    <!-- STORING DATA -->
    <script>
        $(document).ready(function() {
            $('#form-pesanan').on('submit', function(e) {
                e.preventDefault(); // prevent normal submit

                let formData = new FormData(this);

                Swal.fire({
                    title: 'Konfirmasi',
                    text: "Apakah kamu yakin ingin menyimpan pesanan ini?",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Simpan',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: $(this).attr('action'),
                            type: 'POST',
                            data: formData,
                            processData: false,
                            contentType: false,
                            beforeSend: function() {
                                Swal.showLoading()
                            },
                            success: function(response) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil!',
                                    text: 'Pesanan berhasil disimpan.',
                                    showConfirmButton: false,
                                    timer: 2000
                                }).then(() => {
                                    window.location.href =
                                        "{{ route('pesanan.index') }}"; // redirect setelah sukses
                                });
                            },
                            error: function(xhr) {
                                let errors = xhr.responseJSON?.errors;
                                let errorMessages = '';

                                if (errors) {
                                    for (let key in errors) {
                                        if (errors[key].length) {
                                            errorMessages += `• ${errors[key][0]}<br>`;
                                        }
                                    }
                                } else {
                                    errorMessages =
                                        'Terjadi kesalahan saat menyimpan data.';
                                }

                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal Menyimpan!',
                                    html: errorMessages
                                });
                            }
                        });
                    }
                });
            });
        });
    </script>
@endpush
