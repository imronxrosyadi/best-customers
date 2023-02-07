@extends('layouts.admin_app')

@section('meta_title', 'Criterias')

@section('page_content')

@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ $message }}
</div>
@endif
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Kriteria</h1>
    <a href="{{ route('criterias.create') }}" class="d-none d-sm-inline-block btn btn-md btn-info shadow-sm"><i class="fas fa-plus text-white-50"></i> Tambah Data Kriteria</a>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-info">Tabel Data Kriteria</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTableCustomers" width="100%" cellspacing="0">
                <thead class="bg-gradient-info">
                    <tr class="text-white">
                        <th width="10">No</th>
                        <th>Kode Kriteria</th>
                        <th>Nama Kriteria</th>
                        <th>Beban</th>
                        <th>Tipe</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot class="bg-gradient-info">
                    <tr class="text-white">
                        <th>No</th>
                        <th>Kode Kriteria</th>
                        <th>Nama Kriteria</th>
                        <th>Beban</th>
                        <th>Tipe</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($criterias as $criteria)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $criteria->code }}</td>
                        <td>{{ $criteria->name }}</td>
                        <td>{{ $criteria->weight }}</td>
                        <td>{{ $criteria->type }}</td>

                        <td>
                            <div class="d-flex justify-content-center">
                                <a href="/admin/criterias/{{$criteria->code}}/edit" class="btn btn-primary btn">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <a class="btn btn-google btn" data-toggle="modal" id="smallButton"
                                    data-attr="/admin/criterias/delete/{{ $criteria->code }}"
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
