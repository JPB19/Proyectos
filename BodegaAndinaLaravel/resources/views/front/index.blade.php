@extends('front.template')

@section('pageTitle', 'Bodega Andina')

@section('link_style')
  <link rel="stylesheet" href="/css/index.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
@endsection

@section('header')
  <header class="main-header-index">
    <div class="logoEnCel">
      <img src="images/logo-secundario.png" alt="logo andina">
    </div>
  </header>
@endsection

@section('mainContent')
  <!-- Linea degradé  -->
  <div class="linea-degrade"></div>

  <!-- Que hacemos  -->
  <section class="queHacemos">
    <p>
      <strong>Andina</strong> es una bodega Argentina
      dedicada a la producción y comercialización de
      vinos de alta calidad
    </p>
  </section>
@endsection

@section('secondContent')
  <!-- Historia -->
  <section class="historia">
      <h2>Historia</h2>
    <div class="textoHistoria">
      <p>
        Todos los sueños nacen de un momento único de inspiración, pero algunos solo pueden hacerse realidad gracias a la inquebrantable tenacidad de los soñadores. Así sucedió con Bodega Andina: nuestra bodega nació de la mano del visionario Julio Viola, quien concibió la creación de un nuevo polo vitivinícola y decidió apostar por las riquezas de los nuevos terruños mendozinos. <br>

        Andina fue la pionera en la provincia de Mendoza, inaugurando la producción de vino en esta zona privilegiada. <br>

        En 2009 la familia Viola se asoció a Eduardo Eurnekian, uno de los empresarios más importantes de latinoamérica, y desde entonces ambas familias trabajan para llevar los vinos a todo el mundo. <br>
      </p>
    </div>

    <div class="textoHistoria">
      <p>Elaboramos extraordinarios vinos que subliman la esencia de la tierra mendozina, reconocida por su belleza en el mundo entero.
      En los paisajes únicos de esta región crecen nuestras 870 hectáreas de viñedos, regadas por las aguas del río y cuidadas con celo por nuestros agrónomos. Con ellas elaboramos vinos únicos con foco en el terruño.<br>

      En Andina nuestro objetivo es crear vinos que reflejen el lugar en el que nos encontramos y eso es posible gracias al esfuerzo de quienes día a día trabajan en el viñedo y la bodega con la pasión del primer día.</p>
    </div>
  </section>
@endsection

@section('thirdContent')
  <!-- animate -->
  <section class="animate">
    <h2>
      Animate a elegir nuestro shopping online
    </h2>

    <div class="compra-flex">
      <div class="compra">
        <img src="images/icons/icon-tilde.png" alt="" class="iconoAnimateF">
        <h3 class="subtituloAnimateF">Comprá fácil y rápidamente</h3>
        <p class="txtAnimate">Sabemos lo que significa viajar para vos, por eso hacemos q   ue tu experiencia de compras sea simple, ágil y segura.
          Conseguí todo para tu próximo viaje desde la web o llamandonos al 0810 810 9994.</p>
        <strong><a href="#" class="accionAnimateF">Comprar</a></strong>
      </div>

      <div class="compra">
        <img src="images/icons/icon-tarjeta-gris.png" alt="" class="iconoAnimateF">
        <h3 class="subtituloAnimateF">Aprovechá las formas de pago y benificios</h3>
        <p class="txtAnimate">Para facilitar tu experiencia te ofrecemos varias formas de pago para adaptarnos a todas las posibilidades.</p>
        <strong><a href="#" class="accionAnimateF">Ver medios de pago</a></strong>
      </div>

      <div class="compra">
        <img src="images/icons/icon-perfil.png" alt="" class="iconoAnimateF">
        <h3 class="subtituloAnimateF">Gestioná tus compras desde tu cuenta</h3>
        <p class="txtAnimate">Ya sea desde tu celular, tablet o computadora podes gestinar tu cuenta</p>
        <strong><a href="#" class="accionAnimateF">Ir a mis compras</a></strong>
      </div>
    </div>
  </section>
@endsection
