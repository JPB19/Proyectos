<?php

// Parte B

// 1. Reralizar un diagrama de clase que modele a la clase Curso.
class Curso
{
  // 2. Implementar la clase creando los atributos necesarios
  protected $nombreCurso;
  protected $codigoCurso;
  protected $cupo; // E - Agrego cupo de alumnos
  protected $profesorTitular;
  protected $profesorAdjunto;
  protected $listaAlumnos = [];

  public function __construct(string $unNombre, int $unCodigo, int $unCupo)
  {
    $this->nombreCurso = $unNombre;
    $this->codigoCurso = $unCodigo;
    $this->cupo = $unCupo;
  }

// 3. Crear los getters y setters necesarios
  public function getNombre() {
    return $this->nombreCurso;
  }

  public function setNombre($unNombre){
    $this->nombreCurso = $unNombre;
  }

  public function getCodigo() {
    return $this->codigoCurso;
  }

  public function setCodigo($unCurso){
    $this->codigoCurso = $unCurso;
  }

// Setters y getters para profesores
  public function setProfesorAdjunto(ProfesorAdjunto $profesor) {
    $this->profesorAdjunto = $profesor;
  }

  public function getProfesorAdjunto(){
    return $this->profesorAdjunto;
  }

  public function setProfesorTitular(ProfesorTitular $profesor) {
    $this->profesorTitular = $profesor;
  }

  public function getProfesorTitular(){
    return $this->profesorTitular;
  }

  public function setCupo($unCupo) {
    $this->cupo = $unCupo;
  }

  public function getCupo(){
    return $this->cupo;
  }

// Punto E - Listar Alumnos
  public function setListaAlumnos(Alumno $nuevoAlumno) {
    $this->listaAlumnos[] = $nuevoAlumno;
  }

  public function getListaAlumnos(){
    return $this->listaAlumnos;
  }

// Parte G - Agregar Alumno
  public function agregarUnAlumno (Alumno $unAlumno){
      if (count($this->getListaAlumnos()) < $this->getCupo()) {
        array_push($this->listaAlumnos, $unAlumno);
        return true;
      } else {
        return false;
      }
    }
  }

 ?>
