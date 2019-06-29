@extends('layouts.default')
@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Ujian!</h1>
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
                <th scope="col">Nama Ujian</th>
                <th scope="col">Tanggal dibuat</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($listujian as $ujian)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{ $ujian->nama_tes }}</td>
                <td>{{ $ujian->created_at }}</td>
                <td>
                    @if (\App\NilaiTulis::where(['nim' =>
                    auth()->user()->nim])->where('idTest',$ujian->id)->first() != null)
                    <form action="{{ route('rincian_ujian_caslab',$ujian->id) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                            <input class="btn btn-info" name="submitbutton" type="submit" value="Rincian" />
                        </form>
                    @else
                    <form action="{{ route('action_ujian_caslab',$ujian->id) }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <input class="btn btn-primary" name="submitbutton" type="submit" value="Kerjakan" />
                    </form>
                    @endif

                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>

@stop