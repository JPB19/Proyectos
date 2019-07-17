<?php
// Parte C

//1. Reralizar un diagrama de clase que modele a la clase Profesor.
  abstract class Profesor //Parte D: Creo una clase abstracta para que las clases profesores titulares y adjuntos hereden de la misma.
  {
  //2. Implementar la clase creando los atributos necesarios
  protected $nombreProfesor;
  protected $apellidoProfesor;
  protected $antiguedadProfesor;
  protected $codigoProfesor;

  public function __construct(string $unNombre, string $unApellido, int $unaAntiguedad, int $unCodigo)
  {
    $this->nombreProfesor = $unNombre;
    $this->apellidoProfesor = $unApellido;
    $this->antiguedadProfesor = $unaAntiguedad;
    $this->codigoProfesor = $unCodigo;
  }

//3. Crear los getters y setters necesarios
  public function getNombre() {
    return $this->nombreProfesor;
  }

  public function getApellido() {
    return $this->apellidoProfesor;
  }

  public function getAntiguedad() {
    return $this->antiguedadProfesor;
  }

  public function getCodigo() {
    return $this->codigoProfesor;
  }

  public function setNombre($unNombre) {
    $this->nombreProfesor = $unNombre;
  }

  public function setApellido($unApellido) {
   $this->apellidoProfesor = $unApellido;
  }

  public function setAntiguedad($unaAntiguedad) {
    $this->antiguedadProfesor = $unaAntiguedad;
  }

  public function setCodigo($unCodigo) {
    $this->codigoProfesor = $unCodigo;
  }
}

 ?>
