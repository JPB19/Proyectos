<?php
require_once 'partials/autoload.php';

// Instancio Alumnos
$jose = new Alumno("Jose ", "Perez", 245);
$ana = new Alumno ("Ana ", "Rodriguez", 124);
$pedro = new Alumno ("Pedro ", "Alonzo", 22);

// Instancio profesores
$ramon= new ProfesorAdjunto("Ramon ", "Perez", 24, 345, 9 );
$enrique= new ProfesorTitular("Enrique ", "Romero", 2, 1200, "Mobile IOS");

// Instancio Curso
$fullstack = new curso ("FullStack", 153, 30);

// Setters
// Seteo los 2 profesores tanto el adjunto como el titular
$fullstack->setProfesorAdjunto($ramon);
$fullstack->setProfesorTitular($enrique);

// Seteo lista de alumnos con 3 alumnos creados
$fullstack->setListaAlumnos($jose);
$fullstack->setListaAlumnos($pedro);
$fullstack->setListaAlumnos($ana);

// Prueba obtener profesores
//var_dump($fullstack->getProfesorAdjunto());
//var_dump($fullstack->getProfesorTitular());

// Creo un alumno
$mariana = new Alumno("Mariana ", "Yedro ", 123);

// Agrego un alumno al curso Full Stack
$fullstack->agregarUnAlumno($mariana);
/*echo "<pre>";
var_dump($fullstack);
echo "</pre>";*/

// Creo un Manager
$manager= new DigitalHouseManager;

// Le doy de alta un curso
$manager->altaCurso("Manager ", 234, 15);

// Le doy de alta un profe adjunto
$manager->altaProfesorAdjunto("Juan ", "Perez ", 2, 212, 20);

// Doy de alta un profe titular
$manager->altaProfesorTitular("Pablo ", "Palermo ", 5, 215, "UX");

// Alta de alumnos
$manager->altaAlumno("Juan ", "Dybala ", 13);

echo "<br><br>";

var_dump ($manager->buscarAlumno(13));

echo "<br><br>";

var_dump ($manager->buscarProfesor(212));

echo "<br><br>";

var_dump ($manager->buscarProfesor(215));

echo "<br><br>";

var_dump ($manager->buscarCurso(234));

echo "<br><br>";

var_dump ($manager->inscribirAlumno(13, 234));

echo "<br><br>";

var_dump ($manager->buscarCurso(234));

echo "<br><br>";

var_dump($manager->asignarProfesores(234, 215, 212));

echo "<br><br>";

var_dump ($manager->buscarCurso(234));

/*echo "<pre>";
var_dump($manager);
echo "</pre>";*/
