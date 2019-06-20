@extends('layouts.default')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Daftar Caslab</h1>
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
              <form action="{{ route('detail_user',$user->nim) }}" method="post">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <input class="btn btn-info" name="submitbutton" type="submit" value="Detail" />
              </form>
            </div>
          </td>
        </tr>
  
        @endforeach
  
      </tbody>
    </table>
  </div>
@stop