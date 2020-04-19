<?php
class Provincia extends EntidadBase{
    private $id;
    private $descripcion;
    
    public function __construct($adapter) {
        $table="provincias";
        parent::__construct($table, $adapter);
    }
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }
    
    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

	
    public function save(){
        $query="INSERT INTO provincias (id,descripcion)
                VALUES(NULL,
                       '".$this->descripcion."');";
        $save=$this->db()->query($query);
        //$this->db()->error;
        return $save;
    }
	

}
?>