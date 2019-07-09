@extends('layouts.default')
@section('content')
@php
    foreach($nilai_tests as $nilai_test){
      ${'tulis'.$nilai_test->nims}=0;
      ${'wawancaras'.$nilai_test->nims}=0;
      ${'total'.$nilai_test->nims}=0;
    }
    foreach($nilai_tests as $nilai_test){
      ${'porto'.$nilai_test->nims}=0;
      if ($nilai_test->hasils == 1) {
        ${'tulis'.$nilai_test->nims} +=10;
      }
      ${'wawancaras'.$nilai_test->nims} = $nilai_test->keputusan+ $nilai_test->karakter + $nilai_test->microteaching + $nilai_test->komunikasi;
      if ($nilai_test->porto_id != null) {
        ${'porto'.$nilai_test->nims} +=10;
      }
      ${'total'.$nilai_test->nims} = ${'tulis'.$nilai_test->nims} + ${'wawancaras'.$nilai_test->nims} + ${'porto'.$nilai_test->nims};
    }
@endphp

<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Rincian nilai {{ $Test->nama_tes }}</h1>
  <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
</div>

@if(session()->has('result_berhasil'))
<div class="alert alert-success">
  {{ session()->get('result_berhasil') }}
</div>
@endif
@if(session()->has('result_gagal'))
<div class="alert alert-danger">
  {{ session()->get('result_gagal') }}
</div>
@endif
<div class="table-responsive">
  <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">NIM</th>
        <th scope="col">Tulis</th>
        <th scope="col">Wawancara</th>
        <th scope="col">Portofolio</th>
        <th>Total</th>
      </tr>
    </thead>
    <tbody>

      @foreach ($nilai_tests->unique('nims') as $nilai_test)
      <tr>
        <th scope="row">{{$loop->iteration}}</th>
        <td>{{ $nilai_test->nims }}</td>
        <td>
            {{ ${'tulis'.$nilai_test->nims} }}
        </td>
        <td>{{ ${'wawancaras'.$nilai_test->nims} }}</td>
        <td>{{ ${'porto'.$nilai_test->nims} }}</td>
        <td>{{ ${'total'.$nilai_test->nims} }}</td>
      </tr>
      @endforeach

    </tbody>
  </table>
</div>
@stop