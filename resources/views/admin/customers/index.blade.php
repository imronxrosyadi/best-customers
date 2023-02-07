@extends('layouts.admin_app')

@section('meta_title', 'Customers')

@section('page_content')
<!-- Page Heading -->
<!-- <h1 class="h3 mb-2 text-gray-800">Criteria</h1> -->
<!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
    For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official
        DataTables documentation</a>.</p> -->
@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ $message }}
</div>
@endif
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Pelanggan</h1>
    <a href="{{ route('customers.create') }}" class="d-none d-sm-inline-block btn btn-md btn-info shadow-sm"><i
            class="fas fa-plus text-white-50"></i> Tambah Data Pelanggan</a>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-info">Tabel Data Pelanggan</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTableCustomers" width="100%" cellspacing="0">
                <thead class="bg-gradient-info">
                    <tr class="text-white">
                        <th>ID Member</th>
                        <th>Nama Lengkap</th>
                        <th>Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot class="bg-gradient-info">
                    <tr class="text-white">
                        <th>ID Member</th>
                        <th>Nama Lengkap</th>
                        <th>Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>Aksi</th>

                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($customers as $customer)
                    <tr>
                        <td>{{ $customer->idNumber }}</td>
                        <td>{{ $customer->fullName }}</td>
                        <td>{{ $customer->dateOfBirth }}</td>
                        <td>{{ $customer->gender }}</td>
                        <td>{{ $customer->address }}</td>
                        <td>
                            <div class="d-flex justify-content-center">
                                <a href="/admin/customers/{{$customer->idNumber}}/edit" class="btn btn-primary btn">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <a class="btn btn-google btn" data-toggle="modal" id="smallButton"
                                    data-attr="/admin/customers/delete/{{ $customer->idNumber }}"
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
            url: href
            , beforeSend: function() {
                // $('#loader').show();
            },
            // return the result
            success: function(result) {
                $('#smallModal').modal("show");
                $('#smallBody').html(result).show();
            }
            , complete: function() {
                // $('#loader').hide();
            }
            , error: function(jqXHR, testStatus, error) {
                console.log(error);
                alert("Page " + href + " cannot open. Error:" + error);
                // $('#loader').hide();
            }
            , timeout: 8000
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
