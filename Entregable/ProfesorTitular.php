<?php
// Modelo clase Profesor titular
  class ProfesorTitular extends Profesor
{
  protected $especialidad;

  function __construct (string $unNombre, string $unApellido, int $unaAntiguedad, int $unCodigo , string $unaEspecialidad)
  {
    parent::__construct ($unNombre, $unApellido, $unaAntiguedad,  $unCodigo);

    $this->especialidad = $unaEspecialidad;
  }

  public function getEspecialidad() {
    return $this->especialidad;
  }

  public function setEspecialidad() {
    $this->especialidad = $unaEspecialidad;
  }
}

 ?>
