<?php

//Parte A

//1. Reralizar un diagrama de clase que modele a la clase Alumno.
class Alumno
{
  //2. Implementar la clase creando los atributos necesarios
  protected $nombreAlumno;
  protected $apellidoAlumno;
  protected $codigoAlumno;

//3. Crear un cosntructor para el alumno que tome por parámetro un nombre, un apellido y un código de alumno.
  public function __construct(string $unNombre, string $unApellido, int $unCodigo)
  {
    $this->nombreAlumno = $unNombre;
    $this->apellidoAlumno = $unApellido;
    $this->codigoAlumno = $unCodigo;
  }

//4. Crear los getters y setters necesarios.
  public function getNombre() {
    return $this->nombreAlumno;
  }

  public function setNombre($unNombre){
    $this->nombreAlumno = $unNombre;
  }

  public function getApellido() {
    return $this->apellidoAlumno;
  }

  public function setApellido($unApellido){
    $this->apellidoAlumno = $unApellido;
  }

  public function getCodigo() {
    return $this->codigoAlumno;
  }
  
  public function setCodigo($unCodigo){
    $this->codigoAlumno = $unCodigo;
  }
}

 ?>
