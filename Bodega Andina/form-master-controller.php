<?php

  session_start();

  define('ALLOWED_IMAGE_FORMATS', ['jpg', 'jpeg', 'png', 'gif']);
	define('IMAGE_PATH', dirname(__FILE__) . '/data/avatars/');
	define('USERS_JSON_PATH', dirname(__FILE__) . '/data/users.json');


  if ( isset($_COOKIE['userLoged']) && !isLogged() ) {
		// Busco al usuario por el email que tengo almacenado en la cookie
		$theUser = getUserByEmail($_COOKIE['userLoged']);

		// Guardo en sesión al usuario que busqué anteiormente
		$_SESSION['userLoged'] = $theUser;
	}


  // Para los errores en la registración

  function validationRegister(){
    $errors = [];

    $name = trim($_POST["name"]);
    $user = trim($_POST["user"]);
    $country = $_POST['country'];
    $email = trim($_POST["email"]);
    // soyMayor
    $avatar = $_FILES['avatar'];
    $password = trim($_POST["password"]);
    $rePassword = trim($_POST["rePassword"]);

    // validacion de nombre
    if (empty($name)) {
      $errors["name"] = "El campo nombre es obligatorio";
    }

    // validación de usuario
    if (empty($user)) {
      $errors["user"] = "El campo usuario es obligatorio";
    } elseif ( userExist($user) ) { // Si el usuario ya existe, es porque alguien ya se registró con el mismo
			$errors["user"] = "Ese usuario ya está registrado";
		}

    // Validación de correo elctrónico
    if ( empty($email) ) {
			$errors["email"] = "El campo email es obligatorio";
		} elseif ( !filter_var($email, FILTER_VALIDATE_EMAIL) ) { // Si el campo $email NO es un formato de email válido
			$errors["email"] = "El formato de e-mail no es válido";
		} elseif ( emailExist($email) ) { // Si el email ya existe, es porque alguien ya se registró con el mismo
			$errors["email"] = "Ese correo ya está registrado";
		}

    // validación de países
    if ( empty($country) ) {
			$errors["country"] = "Elegí tu país";
		}

    // Validaciónde avatar
    if ( $avatar["error"] != UPLOAD_ERR_OK ) {
      $errors["avatar"] = "Subí una imagen";
    } else {
      // Si cargaron algún archivo, obtengo su extensión
      $ext = pathinfo($avatar["name"], PATHINFO_EXTENSION);

      // Si la extesión del archivo que cargaron NO está en mi array de formatos permitidos
      if ( !in_array($ext, ALLOWED_IMAGE_FORMATS) ) {
        $errors["avatar"] = "Los formatos permitidos son JPG, PNG y GIF";
      }
    }


    if ( empty($password) ) {
			$errors["password"] = "El campo password es obligatorio";
		} elseif (strlen($password)<5) {
      $errors["password"] = "El campo password debe tener al menos 5 caracteres";
    } elseif (!verifica2($password)) {
      $errors["password"] = "La contraseña debe contener los caracteres DH en mayuscula";
      // var_dump(verifica2($password, "DH"));
    }


		if ( empty($rePassword) ) {
			$errors["rePassword"] = "El campo confirmar password es obligatorio";
		} elseif ($password != $rePassword) {
			$errors["password"] = "La validación de contraseñas es incorrectas";
			$errors["rePassword"] = "La validación de contraseñas es incorrectas";
		}

    return $errors;
  }

  // Funcion para verificar el DH queda por fuera de el if gigante de control de errores
  // porque de esta forma se puede utilizar en todos lados (pero ademas adentro del if no funciona)
  function verifica2 ($cadena2) {
    if ( preg_match("/DH/", $cadena2) ) {
     return true;
    }
   return false;
  }


  function saveImage() {
		// extensión del archivo
		$ext = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);

		// archivo temporal
		$tempFile = $_FILES['avatar']['tmp_name'];

		// nombre de la img
		$finalName = uniqid('img_andina_') . '.' . $ext;

		// Destino final (PERMISOS ok)
		$finalPath = IMAGE_PATH . $finalName;

		// guarda en carpeta data/avatars
		move_uploaded_file($tempFile, $finalPath);

		// termino retornando el el nombre del avatar
		return $finalName;
	}


  // Función para generar un ID
  function generateID() {
    // Traigo a todos los usuarios
    $allUsers = getAllUsers();

    // para que no pinche si no hay ningun usuario. O puedo dejarle un primer
    // usuario para que no pinche
    if ( count($allUsers) == 0 ) {
      return 1;
    }

    // da la ultima pocisión disponible
    $lastUser = array_pop($allUsers);

    // retorna el id del nuevo usuario
    return $lastUser['id'] + 1;
  }


  // Trae todos los JSON
  function getAllUsers() {
    // primero el contenido del archivo
    $fileContent = file_get_contents(USERS_JSON_PATH);

    // lo transforma en un array asociativo
    $allUsers = json_decode($fileContent, true);

    // devuelve el array asociativo con todos los usuarios
    return $allUsers;
  }


  // Función para guardar al usuario
  function saveUser() {
    // Trimeamos los valores que vinieron por $_POST
    $_POST['name'] = trim($_POST['name']);
    $_POST['email'] = trim($_POST['email']);

    // Hasheo el password del usuario
    $_POST['password'] = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);

    // Genero el ID y lo guardo en una posición de $_POST llamada "id"
    $_POST['id'] = generateID();

    // Elimino de $_POST la posición "rePassword" ya que no me interesa guardar este dato en mi DB (Data Base)
    unset($_POST['rePassword']);

    // En la variable $finalUser guardo el array de $_POST
    $finalUser = $_POST;

    // Obtengo todos los usuarios
    $allUsers = getAllUsers();

    // En la última posición del array de usuarios, inserto al usuario nuevo
    $allUsers[] = $finalUser;

    // Guardo todos los usuarios de vuelta en el JSON
    file_put_contents(USERS_JSON_PATH, json_encode($allUsers));

    // Retorno al usuario que acabo de guardar para poder tenerlo listo y loguearlo
    return $finalUser;
  }


  // Función para loguear al usuario
  /*
    Recibe como parámetro un array que contenga la información del usuario.
  */
  function login($user) {
    // Del usuario que recibo saco la posición "password" pues no me interesa tenerla en sesión
    unset($user['password']);

    // Guardo en sesión al usuario que recibo por parámetro
    $_SESSION['userLoged'] = $user;

    // Redirecciono al perfil del usuario
    header('location: perfil-de-usuario.php');
    exit; // Siempre, después de una redirección se recomienda hacer un exit.
  }


  // Función para saber si está logueado la/el usuaria/o
  function isLogged() {
    // El return devuelve true o false, según lo que retorne la función isset()
    return isset($_SESSION['userLoged']);
  }


  // Función para preguntar si el email existe
  /*
    Recibe como parámetro el email a buscar
  */
  function emailExist($email) {
    // Traigo a todos los usuarios
    $allUsers = getAllUsers();

    // Recorro el array de usuarios
    foreach ($allUsers as $oneUser) {
      // Si la posición "email" del usuario en la iteración coincide con el email que pasé como parámetro
      if ($oneUser['email'] == $email) {
        return true;
      }
    }

    // Si termino de recorrer el array y no se encontró al email que pasé como parámetro
    return false;
  }


  // Funcion para ver si existe el usuario

  function userExist($user) {
    // Traigo a todos los usuarios
    $allUsers = getAllUsers();

    // Recorro el array de usuarios
    foreach ($allUsers as $oneUser) {
      // Si la posición "usuario" del usuario en la iteración coincide con el usuario que pasé como parámetro
      if ($oneUser['user'] == $user) {
        return true;
      }
    }

    // Si termino de recorrer el array y no se encontró al usuario que pasé como parámetro
    return false;
  }


  // Función para validar el login
  /*
    No le pasamos parámetros pues usamos la variables super global $_POST
  */

  function loginValidate() {
    // Genero el array local de errores que retornaré al final
    $errors = [];

    // Trimeo los campos que recibo por $_POST
    $email = trim($_POST['email']);
    $user = trim($_POST['user']);
    $password = trim($_POST['password']);

    // Si está vacío el campo: $email
    if ( empty($email) ) {

      // validación de usuario

    if (empty($user)) {
        $errors["user"] = "El campo usuario es obligatorio";
    } elseif ( userExist($user) ) { // Si el usuario ya existe, es porque alguien ya se registró con el mismo
  			$errors["user"] = "Ese usuario ya está registrado";
    }
      $errors['email'] = 'El campo email es obligatorio';
    } elseif ( !filter_var($email, FILTER_VALIDATE_EMAIL) ) { // Si el campo $email no es un email válido
      $errors['email'] = 'Introducí un formato de email válido';
    } elseif ( !emailExist($email) ) { // Si no existe el email
      // $errors['email'] = 'Ese correo no está registrado en nuestra base de datos';
      $errors['email'] = 'Las credenciales no coinciden';
    } else {
      // Si pasamos las 3 validaciones anteriores, busco y  obtengo al usuario con el email que llegó por $_POST
      $theUser = getUserByEmail($email);

      // Si el password que recibí por $_POST NO coincide con el password hasheado que está guardado en el usuario
      if ( !password_verify($password, $theUser['password']) ) {
        $errors['password'] = 'Las credenciales no coinciden';
      }
    }

    // Si está vacío el campo: $password
    if ( empty($password) ) {
      $errors['password'] = 'El campo password es obligatorio';
    }
    // Retorno el array de errores con los mensajes de error
    return $errors;
  }

  // Función para traer a 1 usuario por email
  /*
    Recibe como parámetro el email que quiero buscar
  */
  function getUserByEmail($email){
    // Obtengo a todos los usuarios
    $allUsers = getAllUsers();

    // Recorro el array de usuarios
    foreach ($allUsers as $oneUser) {
      // Si la posición email del usuario de esa iteración es igual al email que me pasan por parámetro
      if ($oneUser['email'] == $email) {
        // Retorno al usuario encontrado
        return $oneUser;
      }
    }
  }
 ?>
