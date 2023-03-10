@extends('layouts.admin_app')

@section('meta_title', 'Edit Customer')

@section('page_content')


@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="col-24">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info">Edit Data Pelanggan</h6>
        </div>
        <div class="card-body">
            <form class="user" action="{{ route('customers.update', $customer->idNumber) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Equivalent to... -->
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <input type="hidden" name="id" value="{{ $customer->id }}" />
                <div class="form-group row">
                    <div class="col-sm-12 mb-3 mb-sm-0">
                        <label for="fullName">Nama Lengkap</label>
                        <input value="{{ old('fullName', $customer->fullName) }}" type="text" class="form-control" id="fullName" name="fullName" placeholder="Nama Lengkap">
                    </div>

                </div>
                <div class="form-group row">
                    <div class="col-sm-12 mb-3 mb-sm-0">
                        <label for="idNumber">ID Member</label>
                        <input value="{{ old('idNumber', $customer->idNumber) }}" type="text" class="form-control" id="idNumber" name="idNumber" placeholder="ID Member" readonly>
                    </div>

                </div>

                <div class="form-group row">
                    <div class="col-sm-12 mb-3 mb-sm-0">
                        <label for="dateOfBirth">Tanggal Lahir</label>
                        <input value="{{ old('dateOfBirth', $customer->dateOfBirth) }}" type="date" class="form-control" id="dateOfBirth" name="dateOfBirth"
                            placeholder="Tanggal Lahir">
                    </div>

                </div>

                <div class="form-group row">
                    <div class="col-sm-12 mb-3 mb-sm-0">
                        <label for="gender">Jenis Kelamin</label>
                        <select value="{{ old('gender', $customer->gender) }}" class="form-control" name="gender">
                            <option value="L" @selected($customer->gender == "L")>Laki-laki</option>
                            <option value="P" @selected($customer->gender == "P")>Perempuan</option>
                        </select>
                    </div>

                </div>


                <div class="form-group row">
                    <div class="col-sm-12 mb-3 mb-sm-0">
                        <label for="address">Alamat</label>
                        <input value="{{ old('address', $customer->address) }}" type="text" class="form-control" id="address" name="address" placeholder="Alamat">
                    </div>

                </div>

                <div class="d-flex justify-content-end">
                    <button class="btn btn-primary btn">
                        <i class="fas fa-save"></i> Update
                    </button>

                    <a href="{{ route('customers.index') }}" class="btn btn-google btn">
                        <i class="fas fa-backspace"></i> Batal
                    </a>

                </div>


            </form>
        </div>
    </div>
</div>

@endsection
