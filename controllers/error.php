<?php
class Erro extends Controller{
function __construct()
    {
      parent::__construct();
      $this->view->mensaje="Hubo un erro en la solicitud o no existe la pagina";
    $this->view->render('error/index');
      // echo "<p>Error en url</p>";   
    }
}

?>