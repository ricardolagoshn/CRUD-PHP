<?php


class Fotografias{

    // Conexion
    private $conn;

    // Tabla
    private $db_table = "fotografias";

    // Columnas
    public $id;
    public $imagen;


    // Constructor de clae
    public function __construct($db){
        $this->conn = $db;
    }


    public function StoreImage(){
        $sqlQuery = "INSERT INTO
                    ". $this->db_table ."
                SET
                imagen = :imagen";
    
        $stmt = $this->conn->prepare($sqlQuery);
      
        // binding data
        $stmt->bindParam(":imagen", $this->imagen);

           
        if($stmt->execute()){
           return true;
        }
        return false;
    }

}

?>