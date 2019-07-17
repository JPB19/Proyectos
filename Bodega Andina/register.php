<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php
  require_once "form-master-controller.php";

  if (isLogged()) {
    header("location: perfil-de-usuario.php");
    exit;
  }

  $countries = [
		'ar' => 'Argentina',
		'al' => 'Alaska',
		'bo' => 'Bolivia',
		'br' => 'Brasil',
    'ca' => 'Canada',
    'cl' => 'Chile',
		'co' => 'Colombia',
		'cr' => 'Costa Rica',
		'cu' => 'Cuba',
		'ec' => 'Ecuador',
		'us' => 'Estados Unidos',
		'gu' => 'Guyana',
		'mx' => 'Mejico',
		'pa' => 'Paraguay',
		'pe' => 'Perú',
		'pu' => 'Puerto Rico',
		'rd' => 'Republica Dominicana',
    'su' => 'Suriname',
		'uy' => 'Uruguay',
		've' => 'Venezuela',
	];


  $errorsInRegister = [];

  $name = "";
  $user = "";
	$countryFromPost = "";
  $email = "";
  $password = "";
  $rePassword = "";

  if ($_POST) {
    $name = trim($_POST["name"]);
    $user = trim($_POST["user"]);
    $countryFromPost = $_POST["country"];
    $email = trim($_POST["email"]);

    $errorsInRegister = validationRegister();

    if ( !$errorsInRegister ) {

			// Guardo la imagen y obtengo el nombre aleatorio creado
			$imgName = saveImage();

			// Creo en $_POST una posición "avatar" para guardar el nombre de la imagen
			$_POST['avatar'] = $imgName;

			// Guardo al usuario en el archivo JSON, y me devuelve al usuario que guardó en array
			$theUser = saveUser();

			// Al momento en que se registar vamos a mantener la sesión abierta
			setcookie('userLoged', $theUser['email'], time() + 143000);

			// Logueo al usuario
			login($theUser);
		}

// var_dump($_POST);
// var_dump($errorsInRegister);
// var_dump($saveUser);
}


?>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/stylesf.css">
  <link rel="stylesheet" href="css/register.css">
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
              class="login" <?= isset($errorsInRegister["name"]) ? "showError" : null ?>
              type="text"
              name="name"
              value="<?= $name; ?>"
              placeholder="Nombre completo"
            >
            <div class="showError">
              <?= isset($errorsInRegister["name"]) ? $errorsInRegister["name"] : null; ?>
            </div>


            <!-- Usuario -->
            <input
              class="login"
              type="text"
              name="user"
              value="<?= $user; ?>"
              placeholder="Nombre de usuario"
            >
            <div class="showError">
              <?= isset($errorsInRegister['user']) ? $errorsInRegister['user'] : null; ?>
            </div>

            <!-- País -->
            <select
              name="country"
              class="login" <?= isset($errorsInRegister['country']) ? 'showError' : null; ?>
            >
              <option value="">Elegí tu país de nacimiento</option>
              <?php foreach ($countries as $code => $country): ?>
                <option
                  value="<?= $code ?>"
                  <?= $code == $countryFromPost ? 'selected' : null; ?>
                >
                  <?= $country ?>
                </option>
              <?php endforeach; ?>
            </select>
            <div class="showError">
              <?= isset($errorsInRegister['country']) ? $errorsInRegister['country'] : null; ?>
            </div>


            <!-- Mail -->
            <input
              class="login"
              type="text"
              name="email"
              value="<?= $email; ?>"
              placeholder="Correo electronico"
            >
            <div class="showError">
              <?= isset($errorsInRegister['email']) ? $errorsInRegister['email'] : null; ?>
            </div>

            <!-- Check box de Es mayor -->

            <div class="form-check">
              <label class="form-check-label">
            <input
              class="login-check"
              type="checkbox"
              name="older"
              value=""
            >Soy mayor de 18 años
            </label>
            </div>
            <div class="showError">
              <?= isset($errorsInRegister['older']) ? $errorsInRegister['older'] : null; ?>
            </div>

            <!-- elegir imagen de perfil  -->

            <input
              class="login-file"
              type="file"
              name="avatar"
              placeholder="Seleccione una imagen de prefil"
            >
            <div class="showError">
              <?= isset($errorsInRegister["avatar"]) ? $errorsInRegister['avatar'] : null; ?>
            </div>



            <!-- password -->
            <input
              class="login" <?= isset($errorsInRegister["password"]) ? "showError" : null ?>
              type="password"
              name="password"
              value="<?= $password; ?>"
              placeholder="Contraseña"
            >
            <div class="showError">
              <?= isset($errorsInRegister["password"]) ? $errorsInRegister["password"] : null; ?>
            </div>


            <!-- confirmar password -->

            <input
              class="login" <?= isset($errorsInRegister["rePassword"]) ? "showError" : null ?>"
              type="password"
              name="rePassword"
              value="<?= $rePassword; ?>"
              placeholder="Confirme su contraseña"
            >
            <div class="showError">
              <?= isset($errorsInRegister["rePassword"]) ? $errorsInRegister["rePassword"] : null; ?>
            </div>


            <button
              class="boton-regi"
              type="submit"
              name="Registrarme">Registrarme
            </button>


          </form>


        </article>
      </section>


      <footer class="footer-login" >
        <?php
        require_once("partials/footerIndex.php")
         ?>

      </footer>






    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script>
      $('.toggle-nav-regi').click(function (e) {
      e.preventDefault();
      $('.nav-register').slideToggle('fast');
      });
    </script>
  </body>
</html>
