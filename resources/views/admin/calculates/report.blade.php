@extends('layouts.report_app')

@section('meta_title', 'Report')

@section('page_content')


<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Calculates</h1>

</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-dark">Decision Matrix (X)</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead class="bg-dark">
                    <tr class="text-white">
                        <th width="10">No</th>
                        <th>Customer Name</th>
                        @foreach ($criterias as $criteria)
                        <th>{{ $criteria->code }}</th>
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


<div class="card shadow mb-4" id='criteriaWeightSection'>
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-dark">Criteria Weight (W)</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead class="bg-dark">
                    <tr class="text-white">
                        @foreach ($criterias as $criteria)
                        <th>{{ $criteria->code }}</th>
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
        <h6 class="m-0 font-weight-bold text-dark">Normalization Matrix (R)</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead class="bg-dark">
                    <tr class="text-white">
                        <th width="10">No</th>
                        <th>Customer Name</th>
                        @foreach ($criterias as $criteria)
                        <th>{{ $criteria->code }}</th>
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
        <h6 class="m-0 font-weight-bold text-dark">Matrix (Y)</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead class="bg-dark">
                    <tr class="text-white">
                        <th width="10">No</th>
                        <th>Customer Name</th>
                        @foreach ($criterias as $criteria)
                        <th>{{ $criteria->code }}</th>
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
        <h6 class="m-0 font-weight-bold text-dark">Positive Ideal Solution (A<sup>+</sup>)</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead class="bg-dark">
                    <tr class="text-white">
                        @foreach ($criterias as $criteria)
                        <th>{{ $criteria->code }}</th>
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
        <h6 class="m-0 font-weight-bold text-dark">Negative Ideal Solution (A<sub>+</sub>)</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead class="bg-dark">
                    <tr class="text-white">
                        @foreach ($criterias as $criteria)
                        <th>{{ $criteria->code }}</th>
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
        <h6 class="m-0 font-weight-bold text-dark">Positive Ideal Distance (S<sub>i</sub><sup>+</sup>)</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead class="bg-dark">
                    <tr class="text-white">
                        <th width="10">No</th>
                        <th>Customer Name</th>
                        <th>Distance</th>
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
        <h6 class="m-0 font-weight-bold text-dark">Negative Ideal Distance (S<sub>i</sub><sup>-</sup>)</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead class="bg-dark">
                    <tr class="text-white">
                        <th width="10">No</th>
                        <th>Customer Name</th>
                        <th>Distance</th>
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
        <h6 class="m-0 font-weight-bold text-dark">Relative Closeness to the Ideal Solution (V)</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead class="bg-dark">
                    <tr class="text-white">
                        <th width="10">No</th>
                        <th>Customer Name</th>
                        <th>Distance</th>
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

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-dark">Final Results Ranking</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead class="bg-dark">
                    <tr class="text-white">
                        <th>Customer Name</th>
                        <th>Distance</th>
                        <th>Rank</th>

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

@section('javascript_content')

<script>
    function generatePDF() {
        var opt = {
            margin: [0.5, 0, 0, 0],
            filename: 'report-best-customer.pdf',
            image: {
                type: 'jpeg',
                quality: 0.98
            },
            html2canvas: {
                scale: 2
            },
            jsPDF: {
                unit: 'in',
                format: 'letter',
                orientation: 'landscape'
            },
            pagebreak: { mode: ['avoid-all', 'css', 'legacy'] }
        };

        const element = document.getElementById('wrapper');
        html2pdf().set(opt).from(element).save();
    }
    generatePDF()
</script>

@endsection
