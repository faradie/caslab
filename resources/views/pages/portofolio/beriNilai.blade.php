@extends('layouts.default')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Beri Nilai Portofolio</h1>
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
<picture>
        <img src="/caslabFiles/{{$nilaiTest->file}}" class="rounded mx-auto d-block" alt="Responsive image" />
</picture>
<br>

<form action="{{ route('nilai_porto_submit',$nilaiTest->id) }}" method="POST">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
  
        <input type="text" class="form-control" id="inputNilai" placeholder="Nilai Portofolio" name="inputNilai"
            value="{{ old('inputNilai') }}" required>
            <br>
        <input class="btn btn-primary btn-block" type="submit" value="Submit" />
    </form>


@stop