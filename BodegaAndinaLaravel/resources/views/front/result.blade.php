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
      <ul>
    		@forelse ($products as $product)
          <div class="preguntas-pedido ventanaProducto">
            <img src="/storage/vinos/{{ $product->image }}" class="botella">
            <h3><strong>{{ $product->name }} </strong></h3>
            <p>{{ $product->varietal->name }}</p>
            <p>{{ $product->spec }}</p>
            <strong><p class="precio">$ {{ $product->price }}</p></strong>
            <p><a href="/showprod/{{ $product->id }}" class="btn btn-success">ver detalle</a></p>
            <p><a href="/productos/" name="button" class="comprar">Volver</a></p>
          </div>
    		@empty
    			<li>No hay resultados</li>
    		@endforelse
    	</ul>
    </div>
@endsection
