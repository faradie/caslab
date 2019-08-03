@extends('layouts.default')
@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Hasil perhitungan TOPSIS!</h1>
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
        <th scope="col">Nama</th>
        <th scope="col">Bobot Rekomendasi</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>

        @foreach ($toSorts as $key => $toSort)
        <tr>
          <th scope="row">{{$loop->iteration}}</th>
          <td>{{ $toSort["nim"] }}</td>
          <td>{{ $toSort["nama"] }}</td>
          <td>
            {{ $toSort["bobots"] }}
          </td>
          <td>
            @if ($loop->iteration > 6)
            <div class="alert alert-danger" role="alert">
              Tolak aja!
            </div>
  
            @else
            <div class="alert alert-success" role="alert">
              Terima
            </div>
            @endif
          </td>
        </tr>
        @endforeach

    </tbody>
  </table>
</div>
@stop