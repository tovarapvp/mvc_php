<?php

Class Nuevo extends Controller {

public function __construct()
{
    parent::__construct();
    $this->view->mensaje="";
}
function render(){
    $this->view->render('nuevo/index');

}
function registrarAlumno(){
    $mensaje="";
    //echo "alumno creado";
    if($_POST['matricula'] !=='' && $_POST['nombre'] !=='' &&  $_POST['apellido'] !==''){
        // echo "<br/>datos insertado <br/>";
        $matricula = $_POST['matricula'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
       if( $this->model->insert(['matricula'=>$matricula,'nombre' =>$nombre,'apellido'=>$apellido])){

           $mensaje="Nuevo alumno creado";
       }

       else{
           // echo "<br/>inserte datos <br/>";
           // var_dump(isset($_POST['nombre']));
           $mensaje="La matricula ya existe";
    
       }

    }else{
        
           $mensaje="ingrese datos";
    }
    $this->view->mensaje=$mensaje;
    $this->render();

}
}

?>