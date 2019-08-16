{{-- @extends('layouts.app') --}}
@extends('front.template')

@section('pageTitle', 'Registrarme')

@section('link_style')
  <link rel="stylesheet" href="/css/app.css">
  <link rel="stylesheet" href="/css/register.css">
@endsection

@section('navbar')
  <div class="cualquiernombre">
    @include('front.navbar')
  </div>
@endsection

@section('secondContent')

  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  {{-- <div class="card-header">{{ __('Register') }}</div> --}}

                  <div class="card-body">
                      <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                          @csrf

                          {{-- Nombre --}}
                          <div class="form-group row">
                              <label for="name" class="col-md-4 col-form-label text-md-right">Nombre</label>

                              <div class="col-md-6">
                                  <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                                  <div class="invalid-feedback">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                  </div>

                              </div>
                          </div>


                          {{-- Usuario --}}
                          <div class="form-group row">
                              <label for="user" class="col-md-4 col-form-label text-md-right">{{ __('Usuario') }}</label>

                              <div class="col-md-6">
                                  <input id="name" type="text" class="form-control @error('user') is-invalid @enderror" name="user" value="{{ old('user') }}" autocomplete="user" autofocus>

                                  <div class="invalid-feedback">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                  </div>
                              </div>
                          </div>

                          {{-- País --}}
                          <div class="form-group row">
                              <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('País') }}</label>

                              <div class="col-md-6">
                                <select class="form-control @error('country') is-invalid @enderror" name="country" id="country">
  																<option value="">Seleccione un País</option>
  															</select>

                                <div class="invalid-feedback">
                                  @error('country')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                                </div>
                                  </div>
                              </div>
                          </div>

                          {{--ciudad--}}
                          <div class="form-group row" style="display: none;">
                              <label for="country" class="col-md-4 col-form-label text-md-right">Provincia:</label>

                              <div class="col-md-6">
                                <select class="form-control @error('provincia') is-invalid @enderror" name="city" id="provincia">

                                  <option value="">Seleccione una Provincia</option>
                                </select>

                                <div class="invalid-feedback">
                                  @error('provincia')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                                </div>
                              </div>
                          </div>

                          {{-- E-Mail --}}
                          <div class="form-group row">
                              <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                              <div class="col-md-6">
                                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">

                                  <div class="invalid-feedback">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                  </div>
                              </div>
                          </div>

                          {{-- Imagen --}}
                          <div class="form-group row">
                            <label for="avatar" class="col-md-4 col-form-label text-md-right">Imágen</label>

                            <div class="col-6">
                              {{-- <div class="form-control"> --}}
                                <div class="custom-file form-control">
                                  <input type="file" class="custom-file-input @error('avatar') is-invalid @enderror" name="avatar">
                                  <label class="custom-file-label" for="customFile">Subir imagen</label>
                                </div>
                              {{-- </div> --}}


                              <div class="invalid-feedback">
                                @error('avatar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              </div>
                            </div>

                          </div>

                          {{-- Password --}}
                          <div class="form-group row">
                              <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                              <div class="col-md-6">
                                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                                  <div class="invalid-feedback">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                  </div>
                              </div>
                          </div>

                          {{-- Repassword --}}
                          <div class="form-group row">
                              <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                              <div class="col-md-6">
                                  <input id="password-confirm" type="password"class="form-control @error('password') is-invalid @enderror" name="password_confirmation" autocomplete="new-password">

                                  <div class="invalid-feedback">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                  </div>
                              </div>
                          </div>

                          <div class="form-group row mb-0">
                              <div class="col-md-6 offset-md-4">
                                  <button type="submit" class="btn btn-primary">
                                      {{ __('Registrarme') }}
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



{{-- @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection --}}

@section('javaScript')
<script src="/js/formValidation.js"></script>
<script src="/js/fetch.js"></script>
@endsection
