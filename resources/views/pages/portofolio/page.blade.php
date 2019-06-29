@extends('layouts.default')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Upload Portofolio!</h1>
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
<form method="POST" class="porto" action="{{ route('porto_upload') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
    <div class="form-group">
        <label for="portofolio_file">Cari dan upload file portofolio anda.</label>
        <input type="file" class="form-control-file{{ $errors->has('portofolio_file') ? ' is-invalid' : '' }}"
            value="{{ old('portofolio_file') }}" id="portofolio_file" name="portofolio_file" required>
        @if ($errors->has('portofolio_file'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('portofolio_file') }}</strong>
        </span>
        @endif
    </div>
    <div class="form-group">
        <select id="testPorto" name="testPorto" class="js-example-basic-single js-states form-control">
            <option value="">Pilih Test..</option>
            @foreach ($tests as $test)
                <option value="{{ $test->id }}">{{strtoupper($test->nama_tes)}}</option>
            @endforeach
        </select>
        @if ($errors->has('testPorto'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('testPorto') }}</strong>
        </span>
        @endif
    </div>
    <div class="form-group no-margin">
        <button type="submit" class="btn btn-primary">
            {{ __('Upload Portofolio') }}
        </button>
    </div>
</form>
@stop