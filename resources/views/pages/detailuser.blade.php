@extends('layouts.default')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Detail User {{ $this_user->nim }}!</h1>
    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
</div>
<!-- Approach -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Informasi Pribadi</h6>
    </div>
    <form class="" action="{{ route('user.edit',$this_user->nim) }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        <div class="card-body">
            <table class="table">
                <tbody>
                    <tr>
                        <th scope="row">Nama Lengkap</th>
                        <td><input type="text" class="form-control" id="inputNama" placeholder="Nama" name="inputNama"
                                value="{{ old('nama') ?? $this_user->name }}" required></td>
                    </tr>
                    <tr>
                        <th scope="row">Alamat</th>
                        <td><input type="text" class="form-control" id="inputAlamat" placeholder="Alamat"
                                name="inputAlamat" value="{{ old('alamat') ?? $this_user->alamat }}" required></td>
                    </tr>
                    <tr>
                        <th scope="row">Tempat & Tanggal Lahir</th>
                        <td>{{$this_user->tempat_lahir }}, {{ $this_user->tgl_lahir }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Alamat Email</th>
                        <td><input type="text" class="form-control" id="inputEmail" placeholder="Email"
                                name="inputEmail" value="{{ old('email') ?? $this_user->email }}" required></td>
                    </tr>
                    <tr>
                        <th scope="row">Akun dibuat pada </th>
                        <td>{{$this_user->created_at}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Role </th>
                        <td>
                            @foreach ($roles as $role)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="get_roles[]" type="checkbox" id="{{ $role->id }}"
                                    value="{{ $role->name }}" {{ $this_user->hasRole($role->name) ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineCheckbox1">{{ $role->name }}</label>
                            </div>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Permission </th>
                        <td>
                            @foreach ($permissions as $permission)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="get_permissions[]" type="checkbox" id="{{ $permission->id }}" value="{{ $permission->name }}"  {{ $this_user->hasPermissionTo($permission->name) ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineCheckbox1">{{ $permission->name }}</label>
                            </div>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="btn-group" role="group" aria-label="...">
                <input class="btn btn-danger" type="button" id="UncheckAll" value="UncheckAll" />
                <input class="btn btn-dark" type="button" id="CheckAll" value="CheckAll" />
              </div>

              <button type="submit" class="btn btn-primary" value="save" >Simpan</button>

        </div>
        
    </form>

</div>
<script type="text/javascript">

    $("#UncheckAll").click(function(){
      $("input[type='checkbox']").prop('checked',false);
    });
  
  
    $("#CheckAll").click(function(){
      $("input[type='checkbox']").prop('checked',true);
    })
  
  </script>
@stop