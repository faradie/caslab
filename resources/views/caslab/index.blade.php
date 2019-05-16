@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Data Calon Asisten Laboratorium Komputer Multimedia') }}</div>
                <div class="card-body">
                @role('admin')
                    <form method="POST" action="">
                        {{ csrf_field() }}
                            <div class="form-group row">
                                <label for="" class="col-md-4 col-form-label text-md-right">NIM</label>
                                <input type="text" class="form-control col-md-6" name="nim" placeholder="NIM">
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-md-4 col-form-label text-md-right">Nama</label>
                                <input type="text" class="form-control col-md-6" name="nama_caslab" placeholder="Nama">
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-md-4 col-form-label text-md-right">Tempat Lahir</label>
                                <input type="text" class="form-control col-md-6" name="tempat_lahir" placeholder="Tempat Lahir">
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-md-4 col-form-label text-md-right">Tanggal Lahir</label>
                                <input type="date" class="form-control col-md-6" name="tgl_lahir">
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-md-4 col-form-label text-md-right">Alamat</label>
                                <input type="text" class="form-control col-md-6" name="alamat" placeholder="Alamat">
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-md-4 col-form-label text-md-right">User ID</label>
                                <input type="text" class="form-control col-md-6" name="user_id" placeholder="User ID">
                            </div>
                            <div class="form-group row col-md-8">
                                <div class="col-md-8 offset-md-6">
                                    <button type="submit" class="btn btn-primary">Tambahkan</button>
                                </div>
                            </div>
                    </form>
                @endrole
                    <table class="table table-hover ">
                        <tr>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Alamat</th>
                            @role('admin')
                            <th>Kelola Data</th>
                            @endrole
                        </tr>
                        @foreach($data_caslab as $c)
                        <tr>
                            <td>{{ $c->nim }}</td>
                            <td>{{ $c->nama_caslab }}</td>
                            <td>{{ $c->tempat_lahir }}</td>
                            <td>{{ $c->tgl_lahir }}</td>
                            <td>{{ $c->alamat }}</td>
                            @role('admin')
                                <td>
                                <center>
                                <a href="{{route('data_caslab.edit', $c->nim)}}" class="btn btn-warning">Ubah</a>
                                <a href="{{route('data_caslab.show', $c->nim)}}" class="btn btn-danger">Hapus</a>
                                    <!-- <a href="/data_caslab/{{$c->nim}}" class="btn btn-warning btn-sm">Ubah</a>
                                    <form action="{{ route('data_caslab.destroy', $c->nim)}}" method="POST">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <button type="submit" class="btn btn-xs btn-danger">Hapus</button>
                                    </form>  -->
                                </centar>
                                </td>
                            @endrole
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection