{{-- @extends('layouts.app') --}}
@extends('front.template')
​
@section('pageTitle', 'Iniciar sesión')
​
@section('link_style')
  <link rel="stylesheet" href="/css/app.css">
  <link rel="stylesheet" href="/css/login.css">
  {{-- <link rel="stylesheet" href="/css/register.css"> --}}
@endsection
​
@section('secondContent')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>
​
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
​
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail</label>
​
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email" autofocus>
​
                                <div class="invalid-feedback">
                                  @error('name')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                                </div>
                            </div>
                        </div>
​
                        <div class="form-group row">
                            <label for="user" class="col-md-4 col-form-label text-md-right">Usuario</label>
​
                            <div class="col-md-6">
                                <input id="user" type="text" class="form-control @error('user') is-invalid @enderror" name="user" value="{{ old('user') }}"  autocomplete="user" autofocus>
​
                                <div class="invalid-feedback">
                                  @error('name')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                                </div>
                            </div>
                        </div>
​
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña</label>
​
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password">
​
                                <div class="invalid-feedback">
                                  @error('name')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                                </div>
                            </div>
                        </div>
​
                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
​
                                    <label class="form-check-label" for="remember">
                                        Recordarme
                                    </label>
                                </div>
                            </div>
                        </div>
​
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Ingresar
                                </button>
​
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        No recuerdo mi contraseña
                                    </a>
                                @endif
                            </div>
                        </div>
​
                        <div class="form-group row mb-0">
                          <div class="col-md-8 offset-md-4">
                            <a class="btn btn-primary" href="/register">
                              Registrarme
                            </a>
                          </div>
                        </div>
​
​
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
​
​
@section('javaScript')
<script src="/js/formValidation.js"></script>
@endsection
