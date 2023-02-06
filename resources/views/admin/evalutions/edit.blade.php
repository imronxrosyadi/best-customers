@extends('layouts.admin_app')
@section('meta_title', 'Edit Customer Evaluation')
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
            <h6 class="m-0 font-weight-bold text-primary">Edit Data Evaluasi Pelanggan</h6>
        </div>
        <div class="card-body">
            <form class="user" action="{{ route('evaluations.update', $customerSelected->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group row">
                    <div class="col-sm-12 mb-3 mb-sm-0">
                        <label for="type">Pelanggan</label>
                        <select value="{{ old('customer_id', $customerSelected->customer->id) }}" class="form-control" name="customer_id" disabled>
                            <option selected>Pilih data pelanggan</option>
                            @foreach ($customers as $customer)
                                <option value="{{ $customerSelected->customer_id }}" @selected($customer->id == $customerSelected->customer_id)>{{ $customer->fullName }}</option>
                            @endforeach
                        </select>
                        </select>
                    </div>
                </div>


                @foreach ($customerSelected->customerPointEvaluation as $customerEvalutionSelected)
                    <div class="form-group row">
                        <div class="col-sm-12 mb-3 mb-sm-0">
                            <label for="type">{{ $customerEvalutionSelected->subCriteria->criteria->name }}</label>
                            <select value="{{ old('subcriteria[]', $customerEvalutionSelected->subCriteria->sub_criteria_id) }}" class="form-control" name="subcriteria[]">
                                @foreach ($customerEvalutionSelected->subCriteria->criteria->subCriteria as $subcriteria)
                                    <option value="{{$subcriteria->id }}" @selected($customerEvalutionSelected->subCriteria->id == $subcriteria->id)>{{ $subcriteria->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                @endforeach

                <div class="d-flex justify-content-end">
                    <button class="btn btn-primary btn">
                        <i class="fas fa-save"></i> Update
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
