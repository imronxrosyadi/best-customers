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
            <h6 class="m-0 font-weight-bold text-primary">Edit Customer</h6>
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
                        <label for="fullName">Full Name</label>
                        <input value="{{ old('fullName', $customer->fullName) }}" type="text" class="form-control" id="fullName" name="fullName" placeholder="Full Name">
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
                        <label for="dateOfBirth">Date of Birth</label>
                        <input value="{{ old('dateOfBirth', $customer->dateOfBirth) }}" type="date" class="form-control" id="dateOfBirth" name="dateOfBirth"
                            placeholder="Place / Date of Birth">
                    </div>

                </div>

                <div class="form-group row">
                    <div class="col-sm-12 mb-3 mb-sm-0">
                        <label for="gender">Gender</label>
                        <select value="{{ old('gender', $customer->gender) }}" class="form-control" name="gender">
                            <option value="L" @selected($customer->gender == "L")>Laki-laki</option>
                            <option value="P" @selected($customer->gender == "P")>Perempuan</option>
                        </select>
                    </div>

                </div>


                <div class="form-group row">
                    <div class="col-sm-12 mb-3 mb-sm-0">
                        <label for="address">Address</label>
                        <input value="{{ old('address', $customer->address) }}" type="text" class="form-control" id="address" name="address" placeholder="Address">
                    </div>

                </div>

                <div class="form-group row">
                    <div class="col-sm-12 mb-3 mb-sm-0">
                        <label for="religion">Religion</label>
                        <select value="{{ old('religion', $customer->religion) }}" class="form-control" name="religion">
                            <option value="Kristen" @selected($customer->religion == "Kristen")>Kristen</option>
                            <option value="Katolik" @selected($customer->religion == "Katolik")>Katolik</option>
                            <option value="Islam" @selected($customer->religion == "Islam")>Islam</option>
                            <option value="Budha" @selected($customer->religion == "Budha")>Budha</option>
                            <option value="Hindu" @selected($customer->religion == "Hindu")>Hindu</option>
                        </select>
                    </div>

                </div>

                <div class="form-group row">
                    <div class="col-sm-12 mb-3 mb-sm-0">
                        <label for="maritalStatus">Marital Status</label>
                        <select value="{{ old('maritalStatus', $customer->maritalStatus) }}" class="form-control" name="maritalStatus">
                            <option value="Belum Kawin" @selected($customer->maritalStatus == "Kawin")>Belum Kawin</option>
                            <option value="Kawin" @selected($customer->maritalStatus == "Kawin")>Kawin</option>
                            <option value="Cerai Hidup" @selected($customer->maritalStatus == "Cerai Hidup")>Cerai Hidup</option>
                            <option value="Cerai Mati" @selected($customer->maritalStatus == "Cerai Mati")>Cerai Mati</option>
                        </select>
                    </div>

                </div>

                <div class="form-group row">
                    <div class="col-sm-12 mb-3 mb-sm-0">
                        <label for="job">Job</label>
                        <select value="{{ old('job', $customer->job) }}" class="form-control" name="job">
                            <option value="Belum/ Tidak Bekerja" @selected($customer->job == "Belum/ Tidak Bekerja")>Belum/ Tidak Bekerja</option>
                            <option value="Mengurus Rumah Tangga" @selected($customer->job == "Mengurus Rumah Tangga")>Mengurus Rumah Tangga</option>
                            <option value="Pelajar/ Mahasiswa" @selected($customer->job == "Pelajar/ Mahasiswa")>Pelajar/ Mahasiswa</option>
                            <option value="Pensiunan" @selected($customer->job == "Pensiunan")>Pensiunan</option>
                            <option value="Pewagai Negeri Sipil" @selected($customer->job == "Pegawai Negeri Sipil")>Pewagai Negeri Sipil</option>
                            <option value="Tentara Nasional Indonesia" @selected($customer->job == "Tentara Nasional Indonesia")>Tentara Nasional Indonesia</option>
                            <option value="Kepolisian RI" @selected($customer->job == "Kepolisian RI")>Kepolisian RI</option>
                            <option value="Perdagangan" @selected($customer->job == "Perdagangan")>Perdagangan</option>
                            <option value="Petani/ Pekebun" @selected($customer->job == "Petani / Pekebun")>Petani/ Pekebun</option>
                            <option value="Peternak" @selected($customer->job == "Peternak")>Peternak</option>
                            <option value="Nelayan/ Perikanan" @selected($customer->job == "Nelayan/ Perikanan")>Nelayan/ Perikanan</option>
                            <option value="Industri" @selected($customer->job == "Idustri")>Industri</option>
                            <option value="Konstruksi" @selected($customer->job == "Konstruksi")>Konstruksi</option>
                            <option value="Transportasi" @selected($customer->job == "Transportasi")>Transportasi</option>
                            <option value="Karyawan Swasta" @selected($customer->job == "Karyawan Swasta")>Karyawan Swasta</option>
                            <option value="Karyawan BUMN" @selected($customer->job == "Karyawan BUMN")>Karyawan BUMN</option>
                            <option value="Karyawan Honorer" @selected($customer->job == "Karyawan Honorer")>Karyawan Honorer</option>
                            <option value="Buruh Harian Lepas" @selected($customer->job == "Buruh Harian Lepas")>Buruh Harian Lepas</option>
                            <option value="Buruh Tani/ Perkebunan" @selected($customer->job == "Buruh Tani/ Perkebunan")>Buruh Tani/ Perkebunan</option>
                            <option value="Buruh Nelayan/ Perikanan" @selected($customer->job == "Buruh Nelayan/ Perikanan")>Buruh Nelayan/ Perikanan</option>
                            <option value="Buruh Peternakan" @selected($customer->job == "Buruh Peternakan")>Buruh Peternakan</option>
                            <option value="Pembantu Rumah Tangga" @selected($customer->job == "Pembantu Rumah Tangga")>Pembantu Rumah Tangga</option>
                            <option value="Tukang Cukur" @selected($customer->job == "Tukang Cukur")>Tukang Cukur</option>
                            <option value="Tukang Listrik" @selected($customer->job == "Tukang Listrik")>Tukang Listrik</option>
                            <option value="Tukang Batu" @selected($customer->job == "Tukang Batu")>Tukang Batu</option>
                        </select>
                    </div>

                </div>


                <div class="form-group row">
                    <div class="col-sm-12 mb-3 mb-sm-0">
                        <label for="citizenship">Citizenship</label>
                        <select value="{{ old('citizenship', $customer->citizenship) }}" class="form-control" name="citizenship">
                            <option value="WNI" @selected($customer->citizenship == "WNI")>WNI</option>
                            <option value="WNA" @selected($customer->citizenship == "WNA")>WNA</option>
                        </select>
                    </div>

                </div>
                  
                <div class="d-flex justify-content-end">
                    <button class="btn btn-primary btn">
                        <i class="fas fa-save"></i> Update
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
