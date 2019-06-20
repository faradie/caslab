@extends('layouts.default')
@section('content')


<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Buat Ujian!</h1>
    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
</div>


<form action="{{ route('buat_ujian_submit') }}" method="POST">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
    <input type="text" class="form-control" id="inputNama" placeholder="Nama Ujian" name="inputNama"
        value="{{ old('inputNama') }}" required>
        <br>
    <input class="btn btn-primary btn-block" type="submit" value="Buat Ujian" />
</form>

@stop