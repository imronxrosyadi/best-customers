@extends('layouts.report_app')

@section('meta_title', 'Report')

@section('page_content')

    <div class="header-report">
        <div class="row-lg-12 d-inline-flex">
            <div class="col-lg-4">
                <img src="{{ asset('images/logo.jpeg') }}" alt="setiabudi-hojaya" width="150px" height="150px">
            </div>
            <div class="col-lg-12 justify-content-center">
                <h5>PT. SETIABUDI HOJAYA</h5>
                <h6>Ruko Taman Palem Lestari Blok A10 No 8C RT.12/RW.10</h6>
                <h6>Cengkareng - Jakarta Barat 11730 Indonesia</h6>
                <h6>Email : ptsetiabudihojaya@gmail.com</h6>
                <h6>Telp : (021)52397068</h6>
            </div>
        </div>
    </div>

    <hr>

    <div class="title-report text-center">
        <h6>LAPORAN HASIL SISTEM PENUNJANG KEPUTUSAN PELANGGAN TERBAIK</h6>
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
                        @if($i == 0)
                            <td>{{ $rank["name"] }}</td>
                            <td>{{ $rank["value"] }}</td>
                            <td>{{ $loop->index + 1 }}</td>
                            @break
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

    <div class="mt-4">
        <p>Demikian surat keputusan penilaian penerimaan beasiswa terbaik, harap digunakan sebagaimana semestinya</p>
    </div>
    <div class="sign-on text-right">
        <div class="mt-6">
            <p>................ , ..........................</p>
        </div>
        <div class="sign-on-name">
            <p>(........................................................)</p>
        </div>
    </div>
@endsection

@section('javascript_content')

<script>
    function generatePDF() {
        var opt = {
            margin: [0.5, 0, 0, 0],
            filename: 'SuratKeputusan.pdf',
            image: {
                type: 'jpeg',
                quality: 0.98
            },
            html2canvas: {
                scale: 2
            },
            jsPDF: {
                unit: 'in',
                format: 'a4',
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
