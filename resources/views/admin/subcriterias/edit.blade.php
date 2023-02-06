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
            <h6 class="m-0 font-weight-bold text-primary">Edit Data Nilai Kriteria</h6>
        </div>
        <div class="card-body">
            <form class="user" action="{{ route('sub-criterias.update', $subCriteria->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Equivalent to... -->
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <input type="hidden" name="id" value="{{ $subCriteria->id }}" />
                <!-- sub criteria -->
                <div class="form-group row">
                    <div class="col-sm-12 mb-3 mb-sm-0">
                        <label for="name">Nama Nilai Kriteria</label>
                        <input value="{{ old('name', $subCriteria->name) }}" type="text" class="form-control" id="name" name="name" placeholder="Nama Nilai Kriteria">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-12 mb-3 mb-sm-0">
                        <label for="weight">Nilai</label>
                        <input value="{{ old('value', $subCriteria->value) }}" type="text" class="form-control" id="value" name="value" placeholder="Nilai">
                    </div>
                </div>

                <div class="d-flex justify-content-end">
                    <button class="btn btn-primary btn">
                        <i class="fas fa-save"></i> Update
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
