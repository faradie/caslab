@extends('layouts.default')
@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Input Wawancara untuk {{ $caslab->nim }}</h1>
    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
</div>

<form action="{{ route('submit_wawancara',[$Test->id,$caslab->nim]) }}" method="POST">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
    <label for="inputKeputusan">Pengambilan Keputusan.</label>
    <input type="text" class="form-control" id="inputKeputusan" placeholder="Nilai pengambilan keputusan" name="inputKeputusan"
        value="{{ old('inputKeputusan') }}" required>
    <br>
    <label for="inputKarakter">Karakter Calon Asisten.</label>
    <input type="text" class="form-control" id="inputKarakter" placeholder="Nilai Karakter" name="inputKarakter"
        value="{{ old('inputKarakter') }}" required>
    <br>
    <label for="inputMicroteaching">Microteaching.</label>
    <input type="text" class="form-control" id="inputMicroteaching" placeholder="Nilai Microteaching" name="inputMicroteaching"
        value="{{ old('inputMicroteaching') }}" required>
    <br>
    <label for="inputKomunikasi">Komunikasi.</label>
    <input type="text" class="form-control" id="inputKomunikasi" placeholder="Nilai Komunikasi" name="inputKomunikasi"
        value="{{ old('inputKomunikasi') }}" required>
    <br>
    <input class="btn btn-primary btn-block" type="submit" value="Submit" />
</form>


@stop