<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

  <?php
    // $pruebaLetra = "el microchip está en la cocacola";
    // $findme = "h";
    //
    // echo strpos($pruebaLetra, $findme);

  ?>

  <br>

  <?php
  // echo ctype_upper($pruebaLetra);
  // $cadenas = array('AKLWC139', 'LMNSDO', 'akwSKWsm');
  // foreach ($cadenas as $caso_prueba) {
  //   if (ctype_upper($caso_prueba)) {
  //     echo "1<br>";
  //   } else {
  //     echo "2<br>";
  //   }
  // }
  ?>

  <br>

  <?php
  // echo ctype_upper($pruebaLetra);
    // $password = "123listo";
    // $letraH = "1";
    // $varcero = "0";
    // function comprobacion($var1, $var2) {
    //   if strpos($var1, $var2)>$varcero) {
    //     echo "1";
    //   }
    //
    // }
    //
    // comprobacion($password, $letraH);


//
//     $password = "google es skYnet";
//
// function verifica ($cadena, $verificador) {
//  return strpos($cadena, $verificador);
// }
//
// echo verifica ($password, "y");


  $pass2 = "a mar del plata, dos horas";
  $aVerificar = "DH";

  // function verifica2 ($cadena2, $verificador2) {
  //   if (strpos($cadena2, $verificador2)>0) {
  //    echo "1";
  //   } else {
  //    echo "0";
  //   }
  // }
  //
  // verifica2 ($pass2, $aVerificar);


  function verifica2 ($cadena2, $verificador2) {
    if (strpos($cadena2, $verificador2)>=0) {
     return true;
   }
   else {
     return false;
   }
  }

  var_dump(verifica2($pass2, $aVerificar));
  ?>


  </div>

  </body>
</html>
