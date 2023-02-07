@extends('layouts.admin_app')

@section('meta_title', 'Create Sub Criteria')

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
            <h6 class="m-0 font-weight-bold text-info">Tambah Data Nilai Kriteria</h6>
        </div>
        <div class="card-body">
            <form class="user" action="/admin/sub-criterias/" method="POST">
                @csrf

                <!-- Equivalent to... -->
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <input type="hidden" name="criteria_id" value="{{ $criteriaId }}" />
                <div class="form-group row">
                    <div class="col-sm-12 mb-3 mb-sm-0">
                        <label for="name">Nama Nilai Kriteria</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nama Nilai Kriteria">
                    </div>

                </div>
                <div class="form-group row">
                    <div class="col-sm-12 mb-3 mb-sm-0">
                        <label for="value">Nilai</label>
                        <input type="text" class="form-control" id="value" name="value" placeholder="Nilai">
                    </div>
                </div>

                <div class="d-flex justify-content-end">
                    <button class="btn btn-primary btn">
                        <i class="fas fa-save"></i> Simpan
                    </button>

                    <a href="{{ route('sub-criterias.index') }}" class="btn btn-google btn">
                        <i class="fas fa-backspace"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
