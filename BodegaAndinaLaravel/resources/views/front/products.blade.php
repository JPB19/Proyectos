@extends('front.template')

@section('pageTitle', 'Productos')

@section('link_style')
  <link rel="stylesheet" href="/css/app.css">
  {{-- <link rel="stylesheet" href="/css/styles.css">
  <link rel="stylesheet" href="/css/preguntas-frecuentes.css"> --}}
  <link rel="stylesheet" href="/css/products.css">
  {{-- <meta name="viewport" content="width=device-width, initial-scale=1"> --}}
@endsection

@section('header')
  <div class="titulo-productos">
    <h2>Nuestros Productos</h2>
  </div>
@endsection

@section('mainContent')
    <div class="container-productos">
    <!-- Sidebar -->
    <div class="categoriasProductos">

      <h3>Varietales</h3>

      <ul>
        <li><a href="/prodcabernet/"> Cabernet </a></li>
        <li><a href="/prodmalbec/"> Malbec </a></li>
        <li><a href="/prodtorrontes/"> Torrontes </a></li>
      </ul>

      <h3>Buscador</h3>

      <ul>
        <li><a href="/busqueda"> Buscar por nombre </a></li>
      </ul>
    </div>

    <!-- /#sidebar-wrapper -->
@endsection

@section('secondContent')
  {{-- <div class="container-productos"> --}}
    <div class="vinos-productos">
      @foreach ($products as $product)
        <div class="preguntas-pedido ventanaProducto card-body">
          <img src="/storage/vinos/{{ $product->image }}" class="botella">
          <h3 class="card-text">{{ $product->name }}</h3>
          <p class="card-text"> {{ $product->varietal->name }}</p>
          <p class="card-text">{{ $product->spec }}</p>
          <strong><p class="precio">$ {{ $product->price }}</p></strong>
          <a href="/showprod/{{ $product->id }}" name="button" class="comprar">Ver más</a>
        </div>
      @endforeach
    </div>
  {{-- </div> --}}
  </div>
@endsection
