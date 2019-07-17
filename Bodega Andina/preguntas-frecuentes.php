<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php require_once 'form-master-controller.php'; ?>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/preguntas-frecuentes.css">
    <link rel="stylesheet" href="css/stylesf.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Preguntas Frecuentes</title>
  </head>

  <body>

    <div class="container-perguntas">

      <div>
        <header>
          <div class="nav-preguntas">
            <div class="logo-preguntas">
              <img src="images/logo-principal.png" alt="logo andina">
            </div>
          </div>
              <?php
              require_once("partials/nav-bar.php");
               ?>
        </header>
      </div>

      <div class="linea-degrade-preguntas">

      </div>

      <h2 id="h2-preguntas">Lo más consultado</h2>

      <div class="preguntas-body">
           <div class="preguntas-pedido">
             <h3>Estado de mi pedido</h3>
             <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
               ut labore et dolore magna aliqua.</p>
           </div>

           <div class="preguntas-cambios">
             <h3>Cambios sobre mi pedido</h3>
             <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
               ut labore et dolore magna aliqua.</p>
           </div>

           <div class="preguntas-pagos">
             <h3>Medios de pagos, precios y beneficios</h3>
             <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
               ut labore et dolore magna aliqua.</p>
           </div>
           </div>

      <div class="preguntas-body2">
           <div class="preguntas-devolucion">
             <h3>Facturación, devolución y dudas de cobro</h3>
             <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
               ut labore et dolore magna aliqua.</p>
           </div>

           <div class="preguntas-inconvenientes">
             <h3>Inconvenientes en el destino</h3>
             <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
               ut labore et dolore magna aliqua.</p>
           </div>

           <div class="preguntas-cuenta">
             <h3>Dudas sobre mi cuenta</h3>
             <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
               ut labore et dolore magna aliqua.</p>
           </div>
      </div> <!-- cierro preguntas body -->

        <div class="preguntas-bg">
           <h1>¿Cómo podemos ayudarte?</h1>

           <form action="" target="">
             <input id="campo" type="text" name="Ingresá tu consulta" value="" placeholder="Ingresá tu consulta">
             <br>
             <br>
             <input id="boton" type="submit" value="Enviar">
           </form>
        </div>

         <footer>
          <?php
          require_once("partials/footerIndex.php")
          ?>
         </footer>
    </div> <!-- cierro container -->

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script>
    	$('.toggle-nav').click(function (e) {
    		e.preventDefault();
    		$('.main-nav').slideToggle('fast');
    	});
    </script>

  </body>
</html>
