@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Input Nilai Wawancara Calon Asisten Laboratorium Komputer Multimedia') }}</div>
                <div class="card-body">
                        <form method="POST" action="">
                        {{ csrf_field() }}
                            <div class="form-group row">
                                <label for="" class="col-md-4 col-form-label text-md-right">NIM</label>
                                <input type="text" class="form-control col-md-6" name="nim_caslab" placeholder="NIM">
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-md-4 col-form-label text-md-right">Nama</label>
                                <input type="text" class="form-control col-md-6" name="nama" placeholder="Nama">
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-md-4 col-form-label text-md-right">Keputusan</label>
                                <input type="integer" class="form-control col-md-6" name="keputusan" placeholder="Nilai">
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-md-4 col-form-label text-md-right">Karakter</label>
                                <input type="integer" class="form-control col-md-6" name="karakter"placeholder="Nilai">
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-md-4 col-form-label text-md-right">Microteaching</label>
                                <input type="integer" class="form-control col-md-6" name="microteaching" placeholder="Nilai">
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-md-4 col-form-label text-md-right">Komunikasi</label>
                                <input type="integer" class="form-control col-md-6" name="komunikasi" placeholder="Nilai">
                            </div>
                            <!-- <div class="form-group row">
                                <label for="" class="col-md-4 col-form-label text-md-right">Jumlah</label>
                                <input type="integer" class="form-control col-md-6" name="jumlah" placeholder="Nilai">
                            </div> -->
                            <div class="form-group row col-md-8">
                                <div class="col-md-8 offset-md-6">
                                    <button type="submit" class="btn btn-primary">Tambahkan</button>
                                </div>
                            </div>
                        </form>
                    <table class="table table-bordered">
                        <tr>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Pengambilan Keputusan</th>
                            <th>Karakter</th>
                            <th>Microteaching</th>
                            <th>Komunikasi</th>
                            <th>Total Nilai</th>
                        </tr>
                        @foreach($wawancara as $w)
                        <tr>
                            <td>{{ $w->nim_caslab }}</td>
                            <td>{{ $w->nama }}</td>
                            <td>{{ $w->keputusan }}</td>
                            <td>{{ $w->karakter }}</td>
                            <td>{{ $w->microteaching }}</td>
                            <td>{{ $w->komunikasi }}</td>
                            <td>
                            <?php
                                $jml = "select sum(keputusan,karakter,microteaching,komunikasi) from wawancaras";
                                $hsl = @mysql_query($jml) or die (@mysql_error);
                                $w = @mysql_fetch_array($hsl);
                                
                            ?>
                            {{ $w->jumlah }}
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection