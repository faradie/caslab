@extends('layouts.default')
@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Ujian {{ $Test->nama_tes }}!</h1>
    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
</div>

<label for="portofolio_file">Kerjakan soal dengan kemampuan anda dan jujur..</label>
<hr>
<br>
@if(!$soaltest->isEmpty())
<form action="{{ route('submit_pengerjaan',$Test->id) }}" method="POST">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        @foreach ($soaltest as $soal)
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{ $soal->pertanyaan }}</h6>
            </div>
            <div class="card-body">
                @foreach ($soal->jawaban->shuffle() as $item)
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="{{ $soal->id }}" id="{{ $soal->id }}"
                        value="{{ $item->jawaban }}" required>
                    <label class="form-check-label" for="{{ $item->jawaban }}">
                        {{ $item->jawaban }}
                    </label>
                </div>
                @endforeach
            </div>
        </div>
        @endforeach
        <input class="btn btn-primary btn-block" type="submit" value="Kumpulkan" />
        <br>
    </form>
@endif

@stop