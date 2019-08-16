{{-- @extends('layouts.app') --}}
@extends('front.template')

@section('pageTitle', 'Editar producto')

@section('link_style')

  <link rel="stylesheet" href="/css/app.css">

  <link rel="stylesheet" href="/css/styles.css">

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


                  <div class="card-body">
                      <form
                        action="/admin/edit/{{ $productToEdit->id }}"
                        method="post"
                        enctype="multipart/form-data"
                      >
                          @csrf

                          {{ method_field('PUT') }}

                          {{-- Nombre --}}
                          <div class="form-group row">
                              <label for="name" class="col-md-4 col-form-label text-md-right">Nombre</label>

                              <div class="col-md-6">
                                  <input
                                    type="text"
                                    class="form-control"
                                    name="name"
                                    value="{{ old('name', $productToEdit->name) }}"
                                    autofocus
                                    >

                                  @if ($errors->has('name'))
                                    <span class="text-danger">
                                      {{ $errors->first('name') }}
                                    </span>
                                  @endif
                              </div>
                          </div>


                          {{-- Especificación --}}
                          <div class="form-group row">
                              <label for="spec" class="col-md-4 col-form-label text-md-right">{{ __('Detalle') }}</label>

                              <div class="col-md-6">
                                  <input
                                    type="text"
                                    class="form-control"
                                    name="spec"
                                    value="{{ old('spec', $productToEdit->spec) }}"
                                    autofocus
                                  >

                                  @if ($errors->has('spec'))
                                    <span class="text-danger">
                                      {{ $errors->first('spec') }}
                                    </span>
                                  @endif
                              </div>
                          </div>

                          {{-- Varietales--}}
                          <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Varietal</label>
                            <select class="col-md-6" name="varietal_id">
                              <option value="" class="form-control">Elegí una opción</option>
                              @foreach ($varietals as $varietal)
                                <option
                                  value="{{ $varietal->id }}"
                                  {{ $varietal->id === $productToEdit->varietal_id ? 'selected' : null }}
                                </option>
                              @endforeach

                              @if ($errors->has('varietal_id'))
                                <span class="text-danger">
                                  {{ $errors->first('varietal_id') }}
                                </span>
                              @endif
                            </select>

                          </div>

                          {{-- Precio --}}
                          <div class="form-group row">
                              <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Precio') }}</label>

                              <div class="col-md-6">
                                  <input
                                    type="text"
                                    class="form-control"
                                    name="price"
                                    value="{{ old('price', $productToEdit->price) }}"
                                    autofocus
                                  >

                                  @if ($errors->has('price'))
                                    <span class="text-danger">
                                      {{ $errors->first('price') }}
                                    </span>
                                  @endif
                              </div>
                          </div>

                          {{-- Imagen --}}
                          <div class="form-group row">
                              <label for="image" class="col-md-6">Imágen</label>

                              <input
                                type="file"
                                class="col-md-6"
                                name="image"
                                value="{{ old('image') }}"
                                autocomplete="image">

                                @error('image')
                                  <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                          </div>

                          <div class="form-group row mb-0">
                              <div class="col-md-6 offset-md-4">
                                  <button type="submit" class="btn btn-primary">
                                      Guardar cambios
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
