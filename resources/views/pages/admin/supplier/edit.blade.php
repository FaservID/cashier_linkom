@extends('layouts.main')
@section('title', 'Edit Supplier')

@section('content')

    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Supplier / </span> Edit Supplier</h4>


    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="container py-4">
                    <form action="{{ route('supplier.update', $supplier->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="col-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="supplier_name" class="form-label">Nama Supplier</label>
                                    <input type="text"
                                        value="{{ old('supplier_name', $supplier->supplier_name ?? '') }}"
                                        class="form-control @error('supplier_name') is-invalid @enderror"
                                        name="supplier_name" id="supplier_name"
                                        aria-describedby="defaultFormControlHelp" />
                                    @error('supplier_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-4">
                                    <label for="contact_person" class="form-label">Contact Person</label>
                                    <input type="text"
                                        value="{{ old('contact_person', $supplier->contact_person ?? '') }}"
                                        class="form-control @error('contact_person') is-invalid @enderror"
                                        name="contact_person" id="contact_person"
                                        aria-describedby="defaultFormControlHelp" />
                                    @error('contact_person')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <label for="phone" class="form-label">Phone Number</label>
                                    <input type="text"
                                        value="{{ old('phone', $supplier->phone ?? '') }}"
                                        class="form-control @error('phone') is-invalid @enderror"
                                        name="phone" id="phone"
                                        aria-describedby="defaultFormControlHelp" />
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email"
                                        value="{{ old('email', $supplier->email ?? '') }}"
                                        class="form-control @error('email') is-invalid @enderror"
                                        name="email" id="email"
                                        aria-describedby="defaultFormControlHelp" />
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <label for="address" class="form-label">Alamat</label>
                                    <textarea class="form-control @error('address') is-invalid @enderror" rows="5" name="address" id="address">{{ old('address', $supplier->address ?? '') }}</textarea>
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mt-4 mb-2 text-end">
                                <a href="{{ route('supplier.index') }}" class="btn btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
