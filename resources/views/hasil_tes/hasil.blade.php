@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Hasil Seleksi Asisten Laboratorium Komputer Multimedia') }}</div>
                <div class="card-body">
                    <table class="table table-hover">
                        <tr>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Portofolio</th>
                            <th>Tes Tulis</th>
                            <th>Wawancara</th>
                            <th>Total Point</th>
                        </tr>
                        @foreach($hasil as $h)
                        <tr>
                            <td>{{ $h->nim }}</td>
                            <td>{{ $h->nama }}</td>
                            <td>{{ $h->portofolio }}</td>
                            <td>{{ $h->tes_tulis }}</td>
                            <td>{{ $h->wawancara }}</td>
                            <td>{{ $h->total }}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
