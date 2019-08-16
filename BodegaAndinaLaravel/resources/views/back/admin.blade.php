@extends('front.template')

@section('pageTitle', 'Administrador de Productos')

@section('link_style')
  <link rel="stylesheet" href="/css/app.css">
  <link rel="stylesheet" href="/css/admin.css">
@endsection

@section('mainContent')
  <div class="vinosTitulo">
    <h2>Nuestros Productos</h2>
    <h3>Hola Admin</h3>
  </div>
@endsection

@section('secondContent')
  <div class="contVinos1">
    <div class="botonCrear">
      <a href="/create" type="button" name="button" class="btn alert-secondary">Crear Vino</a>
    </div>
  </div>
@endsection

@section('thirdContent')
  <div class="contVinos">
    <div class="vinosTodos">
      @foreach ($adminProducts as $adminProduct)
        <div class="cajaVino">
          <img src="/storage/vinos/{{ $adminProduct->image }}" class="botella">
          <h3>{{ $adminProduct->name }}</h3>
          <p>{{ $adminProduct->varietal->name }}</p>
          <p>{{ $adminProduct->spec }}</p>
          <strong><p class="precio">$ {{ $adminProduct->price }}</p></strong>
          <a href="/edit/{{ $adminProduct->id }}" type="button" name="button" class="btn alert-secondary">Editar</a>
          <form action="/admin/{{ $adminProduct->id }}" method="post">
            @csrf
            {{ method_field('delete') }}
            <button type="submit" class="btn btn-warning">BORRAR</button>
          </form>
        </div>
      @endforeach

    </div>

  </div>

@endsection
