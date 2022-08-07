<?php

Class Consulta extends Controller {

public function __construct()
{
    parent::__construct();
    $this->view->alumnos=[];
}
function render(){
    $alumnos= $this->model->get();
    $this->view->alumnos =$alumnos; 
    $this->view->render('consulta/index');
}

function verAlumno($param= null){
    $idAlumno =$param[0];
    $alumno= $this->model->getById($idAlumno);
    session_start();
    $_SESSION['id_verAlumno'] =$alumno->matricula;
$this->view->alumno= $alumno;
$this->view->mensaje ="";
$this->view->render('consulta/detalle');
// var_dump($param);
}
function actualizarAlumno(){
    session_start();
    $matricula = $_SESSION['id_verAlumno'];
    $nombre = $_POST['nombre'];
    $apellido =$_POST['apellido'];

    unset($_SESSION['id_verAlumno']);

    if($this->model->update(['matricula' =>$matricula,'nombre'=>$nombre,'apellido'=>$apellido])){
            $alumno =new Alumno();
            $alumno->matricula =$matricula;
            $alumno->apellido =$apellido;
            $alumno->nombre = $nombre;
        $this->view->alumno =$alumno;
            $this->view->mensaje= "se pudo actualizar";

    }else{
        //mensaje de error
            $this->view->mensaje= "no se pudo actualizar";
    }
        $this->view->render('consulta/detalle');
}
function eliminarAlumno($param=null){
    if($this->model->delete($param[0]))
    {
             $this->view->mensaje= "se pudo eliminar";

}else{
    //mensaje de error
        $this->view->mensaje= "no se pudo eliminar";
}
    $this->render();

// var_dump($param);
}
}
