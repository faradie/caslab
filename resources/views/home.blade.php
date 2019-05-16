@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <!-- <div class="card-header">Dashboard</div> -->
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <!-- You are logged in! -->

                        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="..." class="d-block w-100" alt="1">
                            </div>
                            <div class="carousel-item">
                            <img src="..." class="d-block w-100" alt="2">
                            </div>
                            <div class="carousel-item">
                            <img src="..." class="d-block w-100" alt="3">
                            </div>
                        </div>
                        </div>

                    </div>                
            </div>
        </div>
    </div>
</div>
@endsection
