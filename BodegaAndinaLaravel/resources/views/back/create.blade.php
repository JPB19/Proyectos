{{-- @extends('layouts.app') --}}
@extends('front.template')

@section('pageTitle', 'Crear Producto')

@section('link_style')

  <link rel="stylesheet" href="/css/app.css">

  <link rel="stylesheet" href="/css/styles.css">

  <link rel="stylesheet" href="/css/register.css">
@endsection


@section('secondContent')

  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  {{-- <div class="card-header">{{ __('Register') }}</div> --}}

                  <div class="card-body">
                      <form method="post" action="/admin" enctype="multipart/form-data">
                          @csrf

                          {{-- Nombre --}}
                          <div class="form-group row">
                              <label for="name" class="col-md-4 col-form-label text-md-right">Nombre</label>

                              <div class="col-md-6">
                                  <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                  @error('name')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>


                          {{-- Especificación --}}
                          <div class="form-group row">
                              <label for="spec" class="col-md-4 col-form-label text-md-right">{{ __('Detalle') }}</label>

                              <div class="col-md-6">
                                  <input id="spec" type="text" class="form-control @error('spec') is-invalid @enderror" name="spec" value="{{ old('spec') }}" required autocomplete="user" autofocus>

                                  @error('spec')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>

                          {{-- Varietales--}}
                          <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Varietal</label>
                            <select class="col-md-6" name="varietal_id">
                              <option value="" class="form-control">Elegí una opción</option>
                              @foreach ($varietals as $varietal)
                                <option id="varietal_id" value="{{ $varietal->id }}">{{ $varietal->name }}</option>
                              @endforeach
                            </select>
                            <div class="invalid-feedback">
                              Aquí va el error del genre_id
                            </div>
                            @if ($errors->has('varietal_id'))
                              <span class="text-danger">
                                {{ $errors->first('varietal_id') }}
                              </span>
                            @endif
                          </div>

                          {{-- Precio --}}
                          <div class="form-group row">
                              <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Precio') }}</label>

                              <div class="col-md-6">
                                  <input id="name" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required autocomplete="price" autofocus>

                                  @error('price')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>

                          {{-- Imagen --}}
                          <div class="form-group row">
                              <label for="image" class="col-md-6">Imágen</label>

                              <input id="image" type="file" class="col-md-6 @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" autocomplete="image">

                                @error('image')
                                  <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                          </div>


                          {{-- Repassword --}}
                          {{-- <div class="form-group row">
                              <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                              <div class="col-md-6">
                                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                              </div>
                          </div> --}}

                          <div class="form-group row mb-0">
                              <div class="col-md-6 offset-md-4">
                                  <button type="submit" class="btn btn-primary">
                                      {{ __('Crear vino') }}
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
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

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
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

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
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
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
