<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php
  require_once 'form-master-controller.php';

  if (isLogged()) {
    header("location: perfil-de-usuario.php");
    exit;
  }

  // echo "<pre>";
  // var_dump($_POST);
  // echo "</pre>";


  $errorsInLogin = [];

  // Persistencia
  $user = "";
  $email = "";

  if ($_POST) {
    // Persistimos el email con lo vino por $_POST
    $email = trim($_POST["email"]);
    $user = trim($_POST["user"]);

    // La función nos retorna el array de errores que almacenamos en esta variable
    $errorsInLogin = loginValidate();

    if ( !$errorsInLogin ) {
      // Traemos al usuario que vamos a loguear
      $userToLogin = getUserByEmail($email);

      // Preguntamos si quiere ser recordado
      if ( isset($_POST['rememberUser']) ) {
        setcookie('userLoged', $email, time() + 143000);
      }
      // Logeamos al usuario
      login($userToLogin);
    }
  }

?>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/stylesf.css">
  <link rel="stylesheet" href="css/login.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Inicia Secion</title>

</head>

  <body>

    <div class="container">

      <header class="header-register">
        <div class="logo-register">
          <img src="images/logo-principal.png" alt="Bodega Andina" >

        </div>
        <a href="#" class="toggle-nav-regi">
          <span class="ion-navicon-round"></span>
        </a>



        <nav class="nav-register">

          <div class="boton"><a href="index.php">Home</a></div>
          <div class="boton"><a href="productos.php">Productos</a></div>
          <div class="boton"><a href="contacto.php">Contacto</a></div>
          <div class="boton"><a href="preguntas-frecuentes.php">Preguntas</a></div>
          <div class="boton"><a href="login.php"><strong>Clientes</strong></a></div>

        </nav>

      </header>

      <section class="bg-login">
        <div class="img-iz">
          <!-- imagen de fondo -->
        </div>
        <article class="form">
          <h2 class="titulo-registro">Ingresa tus datos</h2>
          <form class="text" method="post" enctype="multipart/form-data">


            <!-- Nombre  -->
          <input
              class="login" <?= isset($errorsInLogin["user"]) ? "showError" : null; ?>
              type="text"
              name="user"
              value="<?= $user; ?>"
              placeholder="Usuario"
            >
            <div class="showError">
              <?= isset($errorsInLogin["user"]) ? $errorsInLogin["user"] : null; ?>
            </div>


            <input
              class="login" <?= isset($errorsInLogin["email"]) ? "showError" : null; ?>
              type="text"
              name="email"
              value="<?= $email; ?>"
              placeholder="Correo Electrónico"
            >
            <div class="showError">
              <?= isset($errorsInLogin["email"]) ? $errorsInLogin["email"] : null; ?>
            </div>


            <input
              class="login" <?= isset($errorsInLogin["password"]) ? "showError" : null; ?>
              type="password"
              name="password"
              value=""
              placeholder="Contraseña"
            >
            <div class="showError">
              <?= isset($errorsInLogin["password"]) ? $errorsInLogin["password"] : null; ?>
            </div>

          <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="rememberUser">Recordarme

              </label>
            </div>

            <button
              class="boton-ini"
              type="submit"
              name="ingresar">Ingresar
            </button>

            <button
              class="boton-regi"
              type="submit"
              name="Registrarme">
              <a class="boton" href="register.php">
                Registrarme
              </a>
            </button>
          </form>
        </article>
      </section>







      <footer class="footer-login" >
        <?php
        require_once("partials/footerIndex.php")
         ?>

      </footer>




    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script>
      $('.toggle-nav-regi').click(function (e) {
      e.preventDefault();
      $('.nav-register').slideToggle('fast');
      });
    </script>
  </body>
</html>
