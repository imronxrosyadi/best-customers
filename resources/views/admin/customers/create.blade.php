@extends('layouts.admin_app')

@section('meta_title', 'Create Customer')

@section('page_content')

<!-- @if ($message = Session::get('error'))
    <div class="alert alert-success">
        {{ $message }}
    </div>
@endif -->

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
            <h6 class="m-0 font-weight-bold text-primary">Create Customer</h6>
        </div>
        <div class="card-body">
            <form class="user" action="{{ route('customers.store') }}" method="POST">
                @csrf

                <!-- Equivalent to... -->
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <div class="form-group row">
                    <div class="col-sm-12 mb-3 mb-sm-0">
                        <label for="fullName">Full Name</label>
                        <input type="text" class="form-control" id="fullName" name="fullName" placeholder="Full Name">
                    </div>

                </div>
                <div class="form-group row">
                    <div class="col-sm-12 mb-3 mb-sm-0">
                        <label for="idNumber">ID Member</label>
                        <input type="text" class="form-control" id="idNumber" name="idNumber" placeholder="ID Member">
                    </div>

                </div>

                <div class="form-group row">
                    <div class="col-sm-12 mb-3 mb-sm-0">
                        <label for="placeOrDateOfBirth">Place / Date of Birth</label>
                        <input type="date" class="form-control" id="dateOfBirth" name="dateOfBirth"
                            placeholder="Place / Date of Birth">
                    </div>

                </div>

                <div class="form-group row">
                    <div class="col-sm-12 mb-3 mb-sm-0">
                        <label for="gender">Gender</label>
                        <select class="form-control" name="gender">
                            <option selected>Please select for gender</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>

                </div>


                <div class="form-group row">
                    <div class="col-sm-12 mb-3 mb-sm-0">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Address">
                    </div>

                </div>

                <div class="d-flex justify-content-end">
                    <button class="btn btn-primary btn">
                        <i class="fas fa-save"></i> Save
                    </button>

                    <a href="{{ route('customers.index') }}" class="btn btn-google btn">
                        <i class="fas fa-backspace"></i> Cancel
                    </a>

                </div>


            </form>
        </div>
    </div>
</div>

@endsection
