@extends('layouts.admin_app')
@section('meta_title', 'Sub Criterias')
@section('page_content')

@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ $message }}
</div>
@endif
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Nilai Kriteria</h1>

</div>

@foreach ($criterias as $criteria)
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="d-sm-flex align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">{{ $criteria->name }} ({{ $criteria->code }})</h6>
            <a href="/admin/sub-criterias/{{$criteria->id}}/create"
                class="d-none d-sm-inline-block btn btn-md btn-primary shadow-sm"><i
                    class="fas fa-plus text-white-50"></i> Tambah Nilai Kriteria</a>
        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTableSubCriterias" width="100%" cellspacing="0">
                <thead class="bg-gradient-primary">
                    <tr class="text-white">
                        <th width="10">No</th>
                        <th>Nama Nilai Kriteria</th>
                        <th>Nilai</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot class="bg-gradient-primary">
                    <tr class="text-white">
                        <th width="10">No</th>
                        <th>Nama Nilai Kriteria</th>
                        <th>Nilai</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                @foreach ($criteria->subCriteria as $subCriteria)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $subCriteria->name }}</td>
                        <td>{{ $subCriteria->value }}</td>
                        <td>
                            <div class="d-flex justify-content-center">
                                <a href="/admin/sub-criterias/{{$subCriteria->id}}/edit" class="btn btn-primary btn">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <a class="btn btn-google btn" data-toggle="modal" id="smallButton"
                                    data-attr="/admin/sub-criterias/delete/{{ $subCriteria->id }}"
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
@endforeach


<!-- small modal -->
<div class="modal fade" id="smallModal" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel"
    aria-hidden="true">
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
