@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Edit Data Calon Asisten Laboratorium Komputer Multimedia</div>
                <div class="card-body">
                    <form id="update-form" method="POST" action="{{route('data_caslab.update', $caslab->nim)}}">
                        @csrf 
                            <div class="form-group">
                                <input type="hidden" name="_method" value="PUT">
                                <label for="nim" >NIM</label>
                                <input type="text" name="nim" class="form-control{{$errors->has('nim')? ' is-invalid ' : ' '}}mb-2" value="{{$caslab->nim}}" placeholder="NIM">
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="_method" value="PUT">
                                <label for="nama_caslab" >Nama</label>
                                <input type="text" name="nama_caslab" class="form-control{{$errors->has('nama_caslab')? ' is-invalid ' : ' '}}mb-2" value="{{$caslab->nama_caslab}}" placeholder="Nama">
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="_method" value="PUT">
                                <label for="tempat_lahir" >Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" class="form-control{{$errors->has('tempat_lahir')? ' is-invalid ' : ' '}}mb-2" value="{{$caslab->tempat_lahir}}" placeholder="Tempat Lahir">
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="_method" value="PUT">
                                <label for="tgl_lahir" >Tanggal Lahir</label>
                                <input type="text" name="tgl_lahir" class="form-control{{$errors->has('tgl_lahir')? ' is-invalid ' : ' '}}mb-2" value="{{$caslab->tgl_lahir}}" placeholder="Tanggal Lahir">
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="_method" value="PUT">
                                <label for="alamat" >Alamat</label>
                                <input type="text" name="alamat" class="form-control{{$errors->has('alamat')? ' is-invalid ' : ' '}}mb-2" value="{{$caslab->alamat}}" placeholder="Alamat">
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="_method" value="PUT">
                                <label for="user_id" >User ID</label>
                                <input type="text" name="user_id" class="form-control{{$errors->has('user_id')? ' is-invalid ' : ' '}}mb-2" value="{{$caslab->user_id}}" placeholder="User ID">
                            </div>
                            <div class="card-footer text-muted text-center justify-content-center">
                                <button onclick="event.preventDefault(); document.getElementById('update-form').submit();" class="btn btn-primary">Ubah</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection