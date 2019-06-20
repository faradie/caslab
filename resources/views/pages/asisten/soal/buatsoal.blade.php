@extends('layouts.default')
@section('content')


<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Buat Soal untuk {{ $test->nama_tes }}!</h1>
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


<form action="{{ route('buat_soal_submit',$test->id) }}" method="POST">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
    <input type="text" class="form-control" id="inputPertanyaan" placeholder="Berikan Pertanyaan" name="inputPertanyaan"
        value="{{ old('inputPertanyaan') }}" required>
        <br>
        <input type="text" class="form-control" id="jawaban_a" placeholder="Pilihan Benar" name="jawaban_a"
        value="{{ old('jawaban_a') }}" required>
        <br>
        <input type="text" class="form-control" id="jawaban_b" placeholder="Pilihan Salah 1" name="jawaban_b"
        value="{{ old('jawaban_b') }}" required>
        <br>
        <input type="text" class="form-control" id="jawaban_c" placeholder="Pilihan Salah 2" name="jawaban_c"
        value="{{ old('jawaban_c') }}" required>
        <br>
        <input type="text" class="form-control" id="jawaban_d" placeholder="Pilihan Salah 3" name="jawaban_d"
        value="{{ old('jawaban_d') }}" required>
        <br>
    <input class="btn btn-primary btn-block" type="submit" value="Buat Soal" />
</form>

@stop