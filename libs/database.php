<?php
class Database{
     private $host;
     private $db;

     function __construct()
     {
       $this->host = constant('HOST'); 
       $this->db = constant('DB');
     }
     function connect(){
    try    {$configure = 'sqlsrv:Server=' . $this->host . ';Database=' .$this->db;

    $options= [PDO::ATTR_ERRMODE=> PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false];

    $pdo= new PDO($configure,'','',$options);

    return $pdo;
    }

    catch(PDOException $e){
        echo "Exception " . $e->getMessage();
    }
     }

}
?>