@extends('layouts.default')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Daftar Portofolio Terkumpul</h1>
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
        <th scope="col">Diupload pada</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>

      @foreach ($portos as $porto)

      <tr>
        <th scope="row">{{$loop->iteration}}</th>
        <td>{{ $porto->nim }}</td>
        <td>
          {{ $porto->created_at }}
        </td>
        <td>
          @if ($porto->nilai == null)
          <form action="{{ route('penilaian_porto',$porto->id) }}" method="post">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <input class="btn btn-primary" name="submitbutton" type="submit" value="Penilaian" />
          </form>
          @else
          Sudah dinilai
          @endif
        </td>
      </tr>

      @endforeach

    </tbody>
  </table>
</div>
@stop