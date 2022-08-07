<?php
require_once 'controllers/error.php';
class App
{
    function __construct()
    {
        // echo "<p>new APP</p>" ;  

        // var_dump( $url);
        $url = isset($_GET['url']) ? $_GET['url'] : 'main';
        $url = rtrim($url, "/");
        $url = explode('/', $url);


        $archivoCOntroller = 'controllers/' . $url[0] . ".php";

        if (file_exists($archivoCOntroller)) {
            require_once $archivoCOntroller;


            //inicializar controlador
            $controller = new $url[0];
            $controller->loadModel($url[0]);

            // # elementos del arreglo

            $nparam = sizeof($url);

            if ($nparam > 1){
                if ($nparam > 2) {
                    $param = [];
                    for ($i = 2; $i < $nparam; $i++) {
                        array_push($param, $url[$i]);
                    }
                    $controller->{$url[1]}($param);
                } else {
                    $controller->{$url[1]}();
                }
            }
                else {
                    $controller->render();
                   }

                
            //si hay  un metodo que se requiere cargar
            // if (isset($url[1])) {
            //     $controller->{$url[1]}();
            
        } else {
            $controller = new Erro();
        }
    }
}
