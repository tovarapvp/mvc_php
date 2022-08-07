<?php

class NuevoModel extends Model{

    function __construct(){
        parent::__construct();
    }
    public  function insert($datos) {
        // $this->db->connect();
        // echo "inserta datos";
        
        try{
            $query= $this->db->connect()->prepare('INSERT INTO ALUMNOS (MATRICULA, NOMBRE , APELLIDO) VALUES (:matricula,:nombre,:apellido)');
            $query->execute(['matricula'=>$datos['matricula'],'nombre'=>$datos['nombre'],'apellido'=>$datos['apellido']]);
            // echo "Datos insertados";            
        }catch(PDOException $e){
        //  echo  "Matricula duplicada";
         return false;   
        }

        // var_dump($datos);
    }
}


?>