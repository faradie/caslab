@extends('layouts.authlayout')

@section('content')
<!-- Outer Row -->
<div class="row justify-content-center">

<div class="col-xl-10 col-lg-12 col-md-9">

  <div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
      <!-- Nested Row within Card Body -->
      <div class="row">
      <img class="col-lg-6 d-none d-lg-block " src="{{ asset('assets/img/profil.jpg') }}">
        <div class="col-lg-6">
          <div class="p-5">
            <div class="text-center">
              <h1 class="h4 text-gray-900 mb-4">Selamat Datang Calon Asisten!</h1>
            </div>
            @if(session()->has('erro_login'))
            <div class="alert alert-danger">
                {{ session()->get('erro_login') }}
            </div>
            @endif
            <form class="user" method="POST" action="{{ route('login') }}">
            @csrf
              <div class="form-group">
                <input id="nim" type="nim" class="form-control-user form-control{{ $errors->has('nim') ? ' is-invalid' : '' }}" name="nim" value="{{ old('nim') }}" required autofocus aria-describedby="nimHelp" placeholder="Masukkan NIM . . .">
                @if ($errors->has('nim'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nim') }}</strong>
                                    </span>
                                @endif
              </div>
              <div class="form-group">
                <input id="password" type="password" class="form-control-user form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password">
                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
              </div>
              <button type="submit" class="btn btn-primary btn-user btn-block">
                                    {{ __('Masuk') }}
                                </button>
              
            </form>
            <hr>
            <div class="text-center">
              <a class="small" href="forgot-password.html">Lupa Password?</a>
            </div>
            <div class="text-center">
              <a class="small" href="{{ route('register') }}">Buat Akun!</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

</div>

<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="nim" class="col-md-4 col-form-label text-md-right">{{ __('NIM') }}</label>

                            <div class="col-md-6">
                                <input id="nim" type="nim" class="form-control{{ $errors->has('nim') ? ' is-invalid' : '' }}" name="nim" value="{{ old('nim') }}" required autofocus>

                                @if ($errors->has('nim'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nim') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection
