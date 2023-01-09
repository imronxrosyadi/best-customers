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

                <div class="form-group row">
                    <div class="col-sm-12 mb-3 mb-sm-0">
                        <label for="religion">Religion</label>
                        <select class="form-control" name="religion">
                            <option value="" selected>Please select for religion</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Katolik">Katolik</option>
                            <option value="Islam">Islam</option>
                            <option value="Budha">Budha</option>
                            <option value="Hindu">Hindu</option>
                        </select>
                    </div>

                </div>

                <div class="form-group row">
                    <div class="col-sm-12 mb-3 mb-sm-0">
                        <label for="maritalStatus">Marital Status</label>
                        <select class="form-control" name="maritalStatus">
                            <option selected>Please select for marital status</option>
                            <option value="Belum Kawin">Belum Kawin</option>
                            <option value="Kawin">Kawin</option>
                            <option value="Cerai Hidup">Cerai Hidup</option>
                            <option value="Cerai Mati">Cerai Mati</option>
                        </select>
                    </div>

                </div>

                <div class="form-group row">
                    <div class="col-sm-12 mb-3 mb-sm-0">
                        <label for="job">Job</label>
                        <select class="form-control" name="job">
                            <option selected>Please select for job</option>
                            <option value="Belum/ Tidak Bekerja">Belum/ Tidak Bekerja</option>
                            <option value="Mengurus Rumah Tangga">Mengurus Rumah Tangga</option>
                            <option value="Pelajar/ Mahasiswa">Pelajar/ Mahasiswa</option>
                            <option value="Pensiunan">Pensiunan</option>
                            <option value="Pensiunan">Pensiunan</option>
                            <option value="Pewagai Negeri Sipil">Pewagai Negeri Sipil</option>
                            <option value="Tentara Nasional Indonesia">Tentara Nasional Indonesia</option>
                            <option value="Kepolisisan RI">Kepolisisan RI</option>
                            <option value="Perdagangan">Perdagangan</option>
                            <option value="Petani/ Pekebun">Petani/ Pekebun</option>
                            <option value="Peternak">Peternak</option>
                            <option value="Nelayan/ Perikanan">Nelayan/ Perikanan</option>
                            <option value="Industri">Industri</option>
                            <option value="Konstruksi">Konstruksi</option>
                            <option value="Transportasi">Transportasi</option>
                            <option value="Karyawan Swasta">Karyawan Swasta</option>
                            <option value="Karyawan BUMN">Karyawan BUMN</option>
                            <option value="Karyawan Honorer">Karyawan Honorer</option>
                            <option value="Buruh Harian Lepas">Buruh Harian Lepas</option>
                            <option value="Buruh Tani/ Perkebunan">Buruh Tani/ Perkebunan</option>
                            <option value="Buruh Nelayan/ Perikanan">Buruh Nelayan/ Perikanan</option>
                            <option value="Buruh Peternakan">Buruh Peternakan</option>
                            <option value="Pembantu Rumah Tangga">Pembantu Rumah Tangga</option>
                            <option value="Tukang Cukur">Tukang Cukur</option>
                            <option value="Tukang Listrik">Tukang Listrik</option>
                            <option value="Tukang Batu">Tukang Batu</option>
                        </select>
                    </div>

                </div>


                <div class="form-group row">
                    <div class="col-sm-12 mb-3 mb-sm-0">
                        <label for="citizenship">Citizenship</label>
                        <select class="form-control" name="citizenship">
                            <option selected>Please select for citinzenship</option>
                            <option value="WNI">WNI</option>
                            <option value="WNA">WNA</option>
                        </select>
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
