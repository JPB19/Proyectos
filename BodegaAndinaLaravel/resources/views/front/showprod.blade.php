@extends('front.template')

@section('pageTitle', 'Detalle producto')

@section('link_style')

  <link rel="stylesheet" href="/css/app.css">

  <link rel="stylesheet" href="/css/styles.css">

    <link rel="stylesheet" href="/css/preguntas-frecuentes.css">

    <link rel="stylesheet" href="/css/products.css">
@endsection


@section('header')
  <div class="titulo-productos">

    <h2>Nuestros Productos</h2>

  </div>
@endsection

@section('mainContent')
    <div class="container-productos">
      {{-- <div class="container-productos"> --}}
      <div class="preguntas-body">

        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="/storage/vinos/{{ $product->image }}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="/storage/vinos/mockup-botella.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="/storage/vinos/{{ $product->image }}" class="d-block w-100" alt="...">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>





          <div class="preguntas-pedido ventanaProducto">
            <h3>{{ $product->name }}</h3>
            <p>{{ $product->varietal->name }}</p>
            <p>{{ $product->spec }}</p>
            <strong><p class="precio">$ {{ $product->price }}</p></strong>
            <a href="/productos/" name="button" class="comprar">Volver</a>
          </div>




      </div>

    </div>

@endsection

@section('secondContent')
  <script type="text/javascript">
  $('.carousel').carousel({
    interval: 2000
  })
  </script>


@endsection
