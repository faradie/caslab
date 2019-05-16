@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Seleksi Asisten Laboratorium Komputer Multimedia') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ url('/data_portofolio')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="name" class="form-control" name="name" value="{{ auth()->user()->name }}" required autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="portofolio" class="col-md-4 col-form-label text-md-right">Portofolio</label>

                            <div class="col-md-6">
                                <input id="portofolio" type="file" class="form-control" name="portofolio" value="{{ old('portofolio') }}" required autofocus>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Upload') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
