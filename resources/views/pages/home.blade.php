@extends('layouts.default')
@section('content')
        
        <div class="container-fluid">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Selamat Datang {{ auth()->user()->nim }}!</h1>
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
                            <td>{{auth()->user()->name}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Alamat</th>
                            <td>{{auth()->user()->alamat}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Tempat & Tanggal Lahir</th>
                            <td>{{auth()->user()->tempat_lahir }}, {{ auth()->user()->tgl_lahir }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Alamat Email</th>
                            <td>{{auth()->user()->email}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Akun dibuat pada </th>
                            <td>{{auth()->user()->created_at}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
              </div>
        </div>
@stop