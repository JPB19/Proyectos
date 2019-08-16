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
      <div class="form-group">

        <form action='/products/result/' method="get">
          <div class="form-group">
            <label>Buscar Vino</label>
            <input type="text" name="word" class="form-control">
          </div>
          <button type="submit" class="btn btn-info">Buscar</button>
        </form>
      </div>
    </div>
@endsection
