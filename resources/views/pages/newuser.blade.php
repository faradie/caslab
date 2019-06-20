@extends('layouts.default')
@section('content')
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Peserta Baru</h1>
                <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
            </div>
<div class="table-responsive">
  <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">NIM</th>
      <th scope="col">Nama</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

    @foreach ($users as $user)

    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{ $user->nim }}</td>
      <td>{{ $user->name }}</td>
      <td>
      <div class="btn-group" role="group" aria-label="...">
            <a class="btn btn-info" name="terimaUser" type="button" value="Detail" href="#">Terima</a>
            <a class="btn btn-danger" name="tolakUser" type="button" value="Hapus" href="#">Tolak</a>
          </div>
      </td>
    </tr>

    @endforeach
    
  </tbody>
  </table>
</div>
@stop