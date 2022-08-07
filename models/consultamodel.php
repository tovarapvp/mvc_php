<?php
include 'models/alumno.php';
class ConsultaModel extends Model{

    function __construct(){
        parent::__construct();
    }
    public  function get() {
        // $this->db->connect();
        // echo "inserta datos";
       $items=[]; 
       
       try{
           $query =$this->db->connect()->query('SELECT * FROM alumnos');

           While($row= $query->fetch())
           {
            $item= new Alumno();
            $item->matricula = $row['matricula'];
            $item->nombre = $row['nombre'];
            $item->apellido = $row['apellido'];
           
            array_push($items,$item);
        
        }
        return $items;
       }catch(PDOException $e){


       }

        // var_dump($datos);
    }
    public function getById($id){
        $item=new Alumno(); 
       
        try{
            $query =$this->db->connect()->prepare('SELECT * FROM alumnos WHERE matricula = :matricula');
            $query->execute(['matricula'=>$id]);
            While($row= $query->fetch())
            {
             $item->matricula = $row['matricula'];
             $item->nombre = $row['nombre'];
             $item->apellido = $row['apellido'];
            
           
         
         }
         return $item;
        }catch(PDOException $e){
 
 
        }
    }

    public function update($id){
        
        try{
            $query =$this->db->connect()->prepare('UPDATE  alumnos SET nombre = :nombre, apellido = :apellido WHERE matricula = :matricula');
            $query->execute([
                'matricula'=> $id['matricula'],
                'nombre'=> $id['nombre'],
                'apellido'=> $id['apellido']
            ]);
         
           
            return true;
         }
        catch(PDOException $e){
 
        return false;
        }

    }
    public function delete($id){
        try{
            $query =$this->db->connect()->prepare('DELETE  alumnos where matricula = :matricula');
 
            $query->execute(['matricula'=>$id]);
         return true;
        }catch(PDOException $e){
 
            return false;
        }
    }
}



?>