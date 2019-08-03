@extends('layouts.default')
@section('content')


<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">List Soal dari {{ $Test->nama_tes }}</h1>
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
        <th scope="col">Pertanyaan</th>
        <th scope="col">Jawaban</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>

      @foreach ($soaltest as $soal)
      <tr>
        <th scope="row">{{$loop->iteration}}</th>
        <td>{{ $soal->pertanyaan }}</td>
        <td>{{ $soal->kunci_jwb }}</td>
        <td>
              <form action="{{ route('hapus_soal',[$Test->id,$soal->id]) }}" method="post">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <input class="btn btn-danger" name="submitbutton" type="submit" value="Hapus" />
              </form>
        </td>
      </tr>
      @endforeach

    </tbody>
  </table>
</div>
<form action="{{ route('buat_soal',$Test->id) }}"><input class="btn btn-primary btn-block" type="submit" value="Buat Soal" />
</form>
@stop