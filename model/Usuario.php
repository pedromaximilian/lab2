<?php
class Usuario extends EntidadBase{
    private $id;
    private $nombre;
    private $apellido;
    private $email;
    private $password;
	private $provincia;
    
    public function __construct($adapter) {
        $table="usuarios";
        parent::__construct($table, $adapter);
    }
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }
    
    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function getProvincia() {
        return $this->provincia;
    }

    public function setProvincia($provincia) {
        $this->provincia = $provincia;
    }

	
    public function save(){
		require_once "Provincia.php";
		
		//verifico si el usuario se encuentra en la BD
		//sino es null entonces UPDATE
		//si es null entonces INSERT
		if($this->id){
			
			$query= "UPDATE usuarios set nombre = '$this->nombre', apellido = '$this->apellido'
			,email = '$this->email' ,provincia = ".$this->provincia->getId(). " where id = $this->id";
			
			$save=$this->db()->query($query);
			//$this->db()->error;
			return $save;
			
		}
		else{
					
			$query= "INSERT INTO usuarios (id,nombre,apellido,email,password,provincia)
					VALUES(NULL,
						   '".$this->nombre."',
						   '".$this->apellido."',
						   '".$this->email."',
						   '".$this->password."',
						   ".$this->provincia->getId().");";
			$save=$this->db()->query($query);
			//$this->db()->error;
			return $save;
		}	
    }
	

}
?>