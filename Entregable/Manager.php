<?php

// Parte F - Realizar un diagrama de clase que modele a la clase DigitalHouseManager. En principio, DigitalHouseManager tiene una lista de alumnos (Alumnos) , una lista de profesores (Profesores) y una lista de cursos (Cursos).

class DigitalHouseManager
{
  protected $listaAlumnos = [];
  protected $listaProfesores = [];
  protected $listaCursos = [];

  /*function __construct($unaListaAlumnos, $unaListaProfesores, $unaListaCursos)
  {
    $this->listaAlumnos = $unaListaAlumnos;
    $this->$listaProfesores = $unaListaProfesores;
    $this->$listaCursos = $unaListaCursos;
  }*/

  public function setListaAlumnos($unaListaAlumnos){
    $this->listaAlumnos = $unaListaAlumnos;
  }

  public function getListaAlumnos() {
    return $this->listaAlumnos;
  }

  public function setListaPorfesores($unaListaProfesores){
    $this->listaProfesores = $unaListaProfesores;
  }

  public function getListaProfesores() {
    return $this->listaProfesores;
  }

  public function setListaCursos($unaListaCursos){
    $this->listaCursos = $unaListaCursos;
  }

  public function getListaCursos() {
    return $this->listaCursos;
  }

// Parte H - Dar de alta un curso
  public function altaCurso(string $nombre, int $codigoCurso, int $cupo){
    $curso = new Curso($nombre, $codigoCurso, $cupo);
    array_push($this->listaCursos, $curso);
    return $curso;
  }

// Parte H - Dar de alta un Profesor Adjunto
  public function altaProfesorAdjunto(string $nombre, string $apellido, int $antiguedad, int $codigo , int $horas){
    $profesor = new ProfesorAdjunto ($nombre, $apellido, $antiguedad, $codigo, $horas);
    array_push($this->listaProfesores, $profesor);
    return $profesor;
  }

// Parte H - Dar de alta un Profesor Titular
  public function altaProfesorTitular(string $nombre, string $apellido, int $antiguedad, int $codigo , string $especialidad){
    $profesor = new ProfesorTitular ($nombre, $apellido, $antiguedad, $codigo, $especialidad);
    array_push($this->listaProfesores, $profesor);
    return $profesor;
  }

// Parte H - Dar de alta un Alumno
  public function altaAlumno(string $nombre, string $apellido, int $codigo){
    $alumno = new Alumno ($nombre, $apellido, $codigo);
    array_push($this->listaAlumnos, $alumno);
    return $alumno;
  }

// Parte I - Inscribir Alumno
  public function buscarAlumno($codigoAlumno){
    foreach ($this->listaAlumnos as $alumno){
      if ($alumno->getCodigo() == $codigoAlumno){
         return $alumno;
      }
    }
  }

  public function buscarCurso($codigoCurso){
      foreach ($this->listaCursos as $curso){
       if ($curso->getCodigo() == $codigoCurso){
         return $curso;
      }
    }
  }

  public function buscarProfesor($codigoProfesor){
     foreach ($this->listaProfesores as $profesor){
       if ($profesor->getCodigo() == $codigoProfesor){
         return $profesor;
      }
    }
  }

  public function inscribirAlumno(int $codigoAlumno, int $codigoCurso){
    $curso = $this->buscarCurso($codigoCurso);
    $alumno = $this->buscarAlumno($codigoAlumno);
    $curso->agregarUnAlumno($alumno);
  }

// Parte I - Asignar profesores
  public function asignarProfesores(int $codigoCurso, int $codigoProfesorTitular, int $codigoProfesorAdjunto){
    $curso = $this->buscarCurso($codigoCurso);
    $profesorTitular = $this->buscarProfesor($codigoProfesorTitular);
    $profesorAdjunto = $this->buscarProfesor($codigoProfesorAdjunto);
    $curso-> setProfesorTitular($profesorTitular);
    $curso-> setProfesorAdjunto($profesorAdjunto);
  }
}

 ?>
