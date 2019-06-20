@extends('layouts.default')
@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Ujian {{ $Test->nama_tes }}!</h1>
    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
</div>

<label for="portofolio_file">Kerjakan soal dengan kemampuan anda dan jujur..</label>
<hr>
<br>
<form action="">
        @foreach ($soaltest as $soal)
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{ $soal->pertanyaan }}</h6>
            </div>
            <div class="card-body">
                <fieldset id="group{{$loop->iteration}}">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="group{{$loop->iteration}}" id="exampleRadios1" value="option1"
                            checked>
                        <label class="form-check-label" for="exampleRadios1">
                            Default radio
                        </label>
                    </div>
                </fieldset>
            </div>
        </div>
        
        @endforeach
</form>

@stop