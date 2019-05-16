@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Jawablah pertanyaan dari soal tes di bawah ini!</div>
                <div class="card-body">

                @role('admin')
                <form method="POST" action="">
                {{ csrf_field() }}
                    <div class="form-group row">
                        <label for="" class="col-md-4 col-form-label text-md-right">Soal</label>
                        <textarea name="pertanyaan" id="nomor" class="form-control col-md-6" rows="3" placeholder="Soal"></textarea>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 col-form-label text-md-right">A.</label>
                        <input type="text" class="form-control col-md-6" name="jawab_a" placeholder="Pilihan A">
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 col-form-label text-md-right">B.</label>
                        <input type="text" class="form-control col-md-6" name="jawab_b" placeholder="Pilihan B">
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 col-form-label text-md-right">C.</label>
                        <input type="text" class="form-control col-md-6" name="jawab_c" placeholder="Pilihan C">
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 col-form-label text-md-right">D.</label>
                        <input type="text" class="form-control col-md-6" name="jawab_d" placeholder="Pilihan D">
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 col-form-label text-md-right">Kunci Jawaban</label>
                        <input type="text" class="form-control col-md-6" name="jawaban" placeholder="Kunci Jawaban">
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 col-form-label text-md-right">Jawaban ID</label>
                        <input type="text" class="form-control col-md-6" name="nilai_id" placeholder="Jawaban ID">
                    </div>
                    <div class="form-group row col-md-8">
                        <div class="col-md-8 offset-md-6">
                            <button type="submit" class="btn btn-primary">Tambahkan</button>
                        </div>
                    </div>
                </form>
                @endrole

                    @foreach($tes as $t)
                        {{ $t->nomor }}. {{ $t->pertanyaan }}<br>
                        a. <input type='radio' value value='a' name='jawaban[".$t["nomor"]."]'/> {{ $t->jawab_a }}<br>
                        b. <input type='radio' value value='b' name='jawaban[".$t["nomor"]."]'/> {{ $t->jawab_b }}<br>
                        c. <input type='radio' value value='c' name='jawaban[".$t["nomor"]."]'/> {{ $t->jawab_c }}<br>
                        d. <input type='radio' value value='d' name='jawaban[".$t["nomor"]."]'/> {{ $t->jawab_d }}<br><br>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection