@extends('layouts.admin_app')

@section('meta_title', 'Calculates')

@section('page_content')


<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Kalkulasi</h1>
    <a href="/admin/calculates/report" target="_blank" class="d-none d-sm-inline-block btn btn-md btn-info shadow-sm"><i class="fas fa-print text-white-50"></i> Cetak</a>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-info">Matriks Keputusan (X)</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead class="bg-gradient-info">
                    <tr class="text-white">
                        <th width="10">No</th>
                        <th>Nama Pelanggan</th>
                        @foreach ($criterias as $criteria)
                        <th>{{ $criteria->name }}</th>
                        @endforeach
                    </tr>
                </thead>

                <tbody>
                    @foreach ($customersEvaluation as $customerEvaluation)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $customerEvaluation->customer->fullName }}</td>
                        @foreach ($customerEvaluation->customerPointEvaluation as $customerPointEvaluation)
                        <td>{{ $customerPointEvaluation->subCriteria->value }}</td>
                        @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-info">Bobot Kriteria (W)</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead class="bg-gradient-info">
                    <tr class="text-white">
                        @foreach ($criterias as $criteria)
                        <th>{{ $criteria->name }}</th>
                        @endforeach
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        @foreach ($criterias as $criteria)
                        <td>{{ $criteria->weight }}</td>
                        @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-info">Matriks Normalisasi (R)</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead class="bg-gradient-info">
                    <tr class="text-white">
                        <th width="10">No</th>
                        <th>Nama Pelanggan</th>
                        @foreach ($criterias as $criteria)
                        <th>{{ $criteria->name }}</th>
                        @endforeach
                    </tr>
                </thead>

                <tbody>
                    @foreach ($customersEvaluation as $i => $customerEvaluation)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $customerEvaluation->customer->fullName }}</td>
                        @foreach($normalizationsMatrixR as $j => $normalizationMatrixR)
                            <td>{{ $normalizationMatrixR[$i] }}</td>
                        @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-info">Matriks (Y)</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead class="bg-gradient-info">
                    <tr class="text-white">
                        <th width="10">No</th>
                        <th>Nama Pelanggan</th>
                        @foreach ($criterias as $criteria)
                        <th>{{ $criteria->name }}</th>
                        @endforeach
                    </tr>
                </thead>

                <tbody>
                    @foreach ($customersEvaluation as $i => $customerEvaluation)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $customerEvaluation->customer->fullName }}</td>
                        @foreach($normalizationsMatrixY as $j => $normalizationMatrixY)
                            <td>{{ $normalizationMatrixY[$i] }}</td>
                        @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-info">Solusi Ideal Positif (A<sup>+</sup>)</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead class="bg-gradient-info">
                    <tr class="text-white">
                        @foreach ($criterias as $criteria)
                        <th>{{ $criteria->name }}</th>
                        @endforeach
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        @foreach ($positiveIdealSolutions as $i => $positiveIdealSolution)
                            <td>{{ $positiveIdealSolution }}</td>
                        @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-info">Solusi Ideal Negatif (A<sub>+</sub>)</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead class="bg-gradient-info">
                    <tr class="text-white">
                        @foreach ($criterias as $criteria)
                        <th>{{ $criteria->name }}</th>
                        @endforeach
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        @foreach ($negativeIdealSolutions as $i => $negativeIdealSolution)
                            <td>{{ $negativeIdealSolution }}</td>
                        @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-info">Jarak Ideal Positf (D<sub>i</sub><sup>+</sup>)</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead class="bg-gradient-info">
                    <tr class="text-white">
                        <th width="10">No</th>
                        <th>Nama Pelanggan</th>
                        <th>Jarak</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($customersEvaluation as $i => $customerEvaluation)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $customerEvaluation->customer->fullName }}</td>
                        <td>{{ $positiveIdealDistances[$i] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-info">Jarak Ideal Negatif (D<sub>i</sub><sup>-</sup>)</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead class="bg-gradient-info">
                    <tr class="text-white">
                        <th width="10">No</th>
                        <th>Nama Pelanggan</th>
                        <th>Jarak</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($customersEvaluation as $i => $customerEvaluation)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $customerEvaluation->customer->fullName }}</td>
                        <td>{{ $negativeIdealDistances[$i] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-info">Kedekatan Relatif dengan Solusi Ideal (V)</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead class="bg-gradient-info">
                    <tr class="text-white">
                        <th width="10">No</th>
                        <th>Nama Pelanggan</th>
                        <th>Jarak</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($topsisCustomers as $i => $customer)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $customer["name"] }}</td>
                        <td>{{ $customer["value"] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="col-lg-12 mt-3 mb-3 text-right">
    <a href="calculates/report/decree" target="_blank" class="btn btn-md btn-info" type="submit">Unduh</a>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-info">Peringkat Hasil Akhir</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead class="bg-gradient-info">
                    <tr class="text-white">
                        <th>Nama Pelanggan</th>
                        <th>Jarak</th>
                        <th>Peringkat</th>

                    </tr>
                </thead>

                <tbody>
                    @foreach ($ranking as $i => $rank)
                    <tr>
                        <td>{{ $rank["name"] }}</td>
                        <td>{{ $rank["value"] }}</td>
                        <td>{{ $loop->index + 1 }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
