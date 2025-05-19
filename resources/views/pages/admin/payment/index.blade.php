@extends('layouts.main')
@section('title', 'Pembayaran')

@push('custom-css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/5.0.7/sweetalert2.min.css" rel="stylesheet">
@endpush

@section('content')

<div class="d-flex justify-content-between flex-column flex-sm-row">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Transaksi /</span> Pembayaran</h4>
</div>

@if(session('message'))
<div class="alert alert-success alert-dismissible" role="alert">
    {{session('message')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif


<div class="col-md-12">
    <div class="card mb-4">
        <div class="card-header">
            List Pembayaran
        </div>
        <div class="card-body">
            <div class="table-responsive text-nowrap">

                <table id="example" class="display table table-bordered py-3">
                    <thead class="table-light">
                        <tr>
                            <th class="text-center fw-bold">#</th>
                            <th class="text-center fw-bold">No Pesanan</th>
                            <th class="text-center fw-bold">Tanggal</th>
                            <th class="text-center fw-bold">User</th>
                            <th class="text-center fw-bold">Tipe</th>
                            <th class="text-center fw-bold">Nominal</th>
                            <th class="text-center fw-bold">Bank</th>
                            {{-- <th class="text-center fw-bold">Nomor Rekening</th>
                            <th class="text-center fw-bold">Nama Rekening</th> --}}
                            <th class="text-center fw-bold">Bukti Pembayaran</th>
                            <th class="text-center fw-bold">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $a=1; ?>
                        @foreach ($payments as $payment)
                        <tr>
                            <td>{{$a++}}</td>
                            <td class="fw-bold">#{{$payment->pesanan->order_id}}</td>
                            <td>{{\Carbon\Carbon::parse($payment->created_at)->format('d F Y, h:i A')}}</td>
                            <td>{{$payment->user->name}}</td>
                            <td class="text-center">{{ucWords($payment->tipe)}}</td>
                            <td>@currency($payment->nominal)</td>
                            <td style="text-transform: uppercase" class="text-center">{{$payment->bank_type == null ? '-' : $payment->bank_type}}</td>
                            {{-- <td>{{$payment->nomor_rekening == null ? '-' : $payment->nomor_rekening}}</td>
                            <td>{{$payment->nama_rekening == null ? '-' : $payment->nama_rekening}}</td> --}}
                            <td class="text-center">
                                @if ($payment->tipe == 'transfer')
                                <a href="{{asset('storage/bukti_tf')}}/{{$payment->bukti_pembayaran}}">Bukti Transfer</a>
                                @else
                                -
                                @endif
                            </td>
                            <td class="d-flex justify-content-center">
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <form method="POST" action="{{route('pembayaran.destroy', $payment->id)}}">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button type="submit" class="btn dropdown-item show-alert-delete-box" data-toggle="tooltip" title='Delete'><i class="bx bx-trash me-1"></i> Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </td>

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
    function selectPayment(id) {
        console.log(id)
        let type = document.getElementById(`type-${id}`).value;
        let cash = document.getElementById(`cash-${id}`);
        console.log(cash)
        let transfer = document.getElementById(`transfer-${id}`);
        if (type == "Cash") {
            cash.classList.remove("d-none")
            transfer.classList.add("d-none")
        } else {
            transfer.classList.remove("d-none")
            cash.classList.add("d-none")

        }
    }

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
<script type="text/javascript">
    $('.finish_alert').click(function(event) {
        var form = $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        swal({
            title: "Selesaikan Pesanan ini?"
            , text: "klik Ya apabila proses pesanan telah selesai"
            , icon: "warning"
            , type: "warning"
            , buttons: ["Cancel", "Yes!"]
            , confirmButtonColor: '#3085d6'
            , cancelButtonColor: '#d33'
            , confirmButtonText: 'Ya, Selesaikan!'
        }).then((willDelete) => {
            if (willDelete) {
                form.submit();
            }
        });
    });

</script>
@endpush
