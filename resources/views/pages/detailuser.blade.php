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
    <div class="card-body">
        <table class="table">
            <tbody>
                <tr>
                    <th scope="row">Nama Lengkap</th>
                    <td>{{$this_user->name}}</td>
                </tr>
                <tr>
                    <th scope="row">Alamat</th>
                    <td>{{$this_user->alamat}}</td>
                </tr>
                <tr>
                    <th scope="row">Tempat & Tanggal Lahir</th>
                    <td>{{$this_user->tempat_lahir }}, {{ $this_user->tgl_lahir }}</td>
                </tr>
                <tr>
                    <th scope="row">Alamat Email</th>
                    <td>{{$this_user->email}}</td>
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
            </tbody>
        </table>
    </div>
</div>
@stop