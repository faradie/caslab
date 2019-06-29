@extends('layouts.default')
@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Rincian {{ auth()->user()->nim }} di {{ $Test->nama_tes }}!</h1>
    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
</div>
<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Jenis Ujian</th>
                <th scope="col">Nilai</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Tulis</td>
                <td>{{ $tulis }}</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Wawancara</td>
                <td>{{ $nilai_wawancara }}</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Portofolio</td>
                <td>{{ $nilai_portof }}</td>
            </tr>
            <tr>
                <th scope="row">#</th>
                <td><b>Total</b></td>
                <td>{{ $total }}</td>
            </tr>
        </tbody>
    </table>
</div>
@stop