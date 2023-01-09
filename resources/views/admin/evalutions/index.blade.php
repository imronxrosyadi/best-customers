@extends('layouts.admin_app')

@section('meta_title', 'Evaluations')

@section('page_content')

@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ $message }}
</div>
@endif
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Evaluations</h1>
    <a href="{{ route('evaluations.create') }}" class="d-none d-sm-inline-block btn btn-md btn-primary shadow-sm"><i class="fas fa-plus text-white-50"></i> Add Customer Evaluation</a>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Evaluations Table</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTableCustomers" width="100%" cellspacing="0">
                <thead class="bg-gradient-primary">
                    <tr class="text-white">
                        <th width="10">No</th>
                        <th>Customer Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tfoot class="bg-gradient-primary">
                    <tr class="text-white">
                        <th width="10">No</th>
                        <th>Customer Name</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($customersEvaluation as $customerEvaluation)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $customerEvaluation->customer->fullName }}</td>

                        <td>
                            <div class="d-flex justify-content-center">
                                <a href="/admin/evaluations/{{$customerEvaluation->id}}/edit" class="btn btn-primary btn">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <a class="btn btn-google btn" data-toggle="modal" id="smallButton"
                                    data-attr="/admin/evaluations/delete/{{ $customerEvaluation->id }}"
                                    data-target="#smallModal">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- small modal -->
<div class="modal fade" id="smallModal" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="smallBody">
                <div>
                    <!-- the result to be displayed apply here -->
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('javascript_content')

<script>
    // display a modal (small modal)
    $(document).on('click', '#smallButton', function(event) {
        event.preventDefault();
        let href = $(this).attr('data-attr');
        $.ajax({
            url: href,
            beforeSend: function() {},
            // return the result
            success: function(result) {
                $('#smallModal').modal("show");
                $('#smallBody').html(result).show();
            },
            complete: function() {},
            error: function(jqXHR, testStatus, error) {
                console.log(error);
                alert("Page " + href + " cannot open. Error:" + error);
            },
            timeout: 8000
        })
    });
</script>

<script>
    // display a modal (small modal)
    $(document).on('click', '#cancelButton', function(event) {
        event.preventDefault();
        $('#smallModal').modal("hide");
        $('#smallBody').html(result).hide();
    });
</script>

@endsection