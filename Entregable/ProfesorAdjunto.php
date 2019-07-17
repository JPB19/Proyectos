<?php
// Modelo clase Profesor adjunto
  class ProfesorAdjunto extends Profesor
{
  private $horasConsulta;


  function __construct(string $unNombre, string $unApellido, int $unaAntiguedad, int $unCodigo , int $horas)
  {
    parent::__construct ($unNombre, $unApellido, $unaAntiguedad,  $unCodigo);
    $this->horasConsulta = $horas;
  }

  public function getHorasConsulta() {
    return $this->horasConsulta;
  }

  public function setHorasConsulta() {
    $this->horasConsulta = $horas;
  }
}

 ?>
