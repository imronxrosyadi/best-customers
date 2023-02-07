@extends('layouts.admin_app')

@section('meta_title', 'Create Critteria')

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
            <h6 class="m-0 font-weight-bold text-info">Tambah Data Evaluasi Pelanggan</h6>
        </div>
        <div class="card-body">
            <form class="user" action="{{ route('evaluations.store') }}" method="POST">
                @csrf
                <div class="form-group row">
                    <div class="col-sm-12 mb-3 mb-sm-0">
                        <label for="type">Pelanggan</label>
                        <select class="form-control" name="customer_id">
                            <option selected>Pilih data pelanggan</option>
                            @foreach ($customers as $customer)
                                <option value="{{ $customer->id }}">{{ $customer->fullName }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                @foreach ($criterias as $criteria)
                    <div class="form-group row">
                        <div class="col-sm-12 mb-3 mb-sm-0">
                            <label for="type">{{ $criteria->name }}</label>
                            <select class="form-control" name="subcriteria[]">
                                <option selected>Pilih data nilai kriteria</option>
                                @foreach ($criteria->subCriteria as $subcriteria)
                                    <option value="{{ $subcriteria->id }}">{{ $subcriteria->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                @endforeach



                <div class="d-flex justify-content-end">
                    <button class="btn btn-primary btn">
                        <i class="fas fa-save"></i> Simpan
                    </button>

                    <a href="{{ route('evaluations.index') }}" class="btn btn-google btn">
                        <i class="fas fa-backspace"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
