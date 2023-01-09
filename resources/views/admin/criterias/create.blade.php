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
            <h6 class="m-0 font-weight-bold text-primary">Create Criteria</h6>
        </div>
        <div class="card-body">
            <form class="user" action="{{ route('criterias.store') }}" method="POST">
                @csrf
    
                <!-- Equivalent to... -->
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <div class="form-group row">
                    <div class="col-sm-12 mb-3 mb-sm-0">
                        <label for="code">Criteria Code</label>
                        <input type="text" class="form-control" id="code" name="code" placeholder="Criteria Code">
                    </div>

                </div>
                <div class="form-group row">
                    <div class="col-sm-12 mb-3 mb-sm-0">
                        <label for="name">Criteria Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Criteria Name">
                    </div>

                </div>

                <div class="form-group row">
                    <div class="col-sm-12 mb-3 mb-sm-0">
                        <label for="weight">Weight</label>
                        <input type="number" class="form-control" id="weight" name="weight"
                            placeholder="Weight">
                    </div>

                </div>

                <div class="form-group row">
                    <div class="col-sm-12 mb-3 mb-sm-0">
                        <label for="type">Type</label>
                        <select class="form-control" name="type">
                            <option selected>Please select for type</option>
                            <option value="Cost">Cost</option>
                            <option value="Benefit">Benefit</option>
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
