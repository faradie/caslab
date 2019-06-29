@extends('layouts.default')
@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Input Wawancara</h1>
    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
</div>
<label for="portofolio_file">List peserta berdasarkan hasil tes tulis.</label>
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
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($nilaiTulisLanjut as $key => $value)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{ $key }}</td>
                <td>
                    @if (\App\Wawancara::where(['nim' =>
                    $key])->where('idTest',$Test->id)->first() != null)
                    Telah terisi
                    @else
                    <div class="btn-group" role="group" aria-label="...">
                            <form action="{{ route('action_wawancara',[$Test->id,$key]) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('PATCH') }}
                                <input class="btn btn-danger" name="submitbutton" type="submit" value="Diskualifikasi" />
                                <input class="btn btn-info" name="submitbutton" type="submit" value="Penilaian" />
                            </form>
                        </div>
                    @endif
                    
                </td>
            </tr>

            @endforeach

        </tbody>
    </table>
</div>

@stop