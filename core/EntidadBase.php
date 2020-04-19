<?php
class EntidadBase{
    private $table;
    private $db;
    private $conectar;

    public function __construct($table, $adapter) {
        $this->table=(string) $table;
        
        require_once 'Conectar.php';
        $this->conectar=new Conectar();
        $this->db=$this->conectar->conexion();
		 
		$this->conectar = null;
		$this->db = $adapter;
    }
    
    public function getConetar(){
        return $this->conectar;
    }
    
    public function db(){
        return $this->db;
    }
    
    public function getAll(){
        $resultSet = array();
        try{
            $query=$this->db->query("SELECT * FROM $this->table");


            while ($row = $query->fetch_object()) {
                $resultSet[]=$row;
            }

            return $resultSet;
        }catch (MySqlException $e){
           var_dump($e);
        }


    }
    
    public function getById($id){
        $resultSet = null;
        $query=$this->db->query("SELECT * FROM $this->table WHERE id=$id");

        if($row = $query->fetch_object()) {
           $resultSet=$row;
        }
        
        return $resultSet;
    }


    public function getByMail($mail){
        $query=$this->db->query("SELECT * FROM $this->table WHERE mail='$mail'");

        if($row = $query->fetch_object()) {
            $resultSet=$row;
        }

        return $resultSet;
    }


    
    public function getBy($column,$value){
        $query=$this->db->query("SELECT * FROM $this->table WHERE $column='$value'");

        while($row = $query->fetch_object()) {
           $resultSet[]=$row;
        }
        
        return $resultSet;
    }
    
    public function deleteById($id){
        $query=$this->db->query("DELETE FROM $this->table WHERE id=$id"); 
        return $query;
    }
    
    public function deleteBy($column,$value){
        $query=$this->db->query("DELETE FROM $this->table WHERE $column='$value'"); 
        return $query;
    }
    

    /*
     * Aqui podemos agregar otros métodos que nos ayuden
     * a hacer operaciones con la base de datos de la entidad
     */

    public function validaAdministrador($mail){
        $resultSet = null;

        $query=$this->db->query("SELECT * FROM administrador a WHERE a.mail LIKE '$mail'");

        if($row = $query->fetch_object()) {
            $resultSet=$row;
        }
        return $resultSet;
    }

    public function validaPropietario($mail, $pass){
        $query=$this->db->query("SELECT * FROM administrador a WHERE a.mail LIKE $mail AND a.pass like $pass");

        if($row = $query->fetch_object()) {
            $resultSet=$row;
        }
        return $resultSet;
    }
}
?>
