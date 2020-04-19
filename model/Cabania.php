<?php


class Cabania extends EntidadBase
{
    private $id;
    private $domicilio;
    private $localidad;
    private $capacidad;
    private $observaciones;
    private $propietario;
    private $precio;
    private $imagenes;

    public function __construct($adapter) {
        $table="cabania";
        parent::__construct($table, $adapter);
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getDomicilio()
    {
        return $this->domicilio;
    }

    /**
     * @param mixed $domicilio
     */
    public function setDomicilio($domicilio): void
    {
        $this->domicilio = $domicilio;
    }

    /**
     * @return mixed
     */
    public function getLocalidad()
    {
        return $this->localidad;
    }

    /**
     * @param mixed $localidad
     */
    public function setLocalidad($localidad): void
    {
        $this->localidad = $localidad;
    }

    /**
     * @return mixed
     */
    public function getCapacidad()
    {
        return $this->capacidad;
    }

    /**
     * @param mixed $capacidad
     */
    public function setCapacidad($capacidad): void
    {
        $this->capacidad = $capacidad;
    }

    /**
     * @return mixed
     */
    public function getObservaciones()
    {
        return $this->observaciones;
    }

    /**
     * @param mixed $observaciones
     */
    public function setObservaciones($observaciones): void
    {
        $this->observaciones = $observaciones;
    }

    /**
     * @return mixed
     */
    public function getPropietario()
    {
        return $this->propietario;
    }

    /**
     * @param mixed $propietario
     */
    public function setPropietario($propietario): void
    {
        $this->propietario = $propietario;
    }


    /**
     * @return mixed
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * @param mixed $precio
     */
    public function setPrecio($precio): void
    {
        $this->precio = $precio;
    }

    /**
     * @return mixed
     */
    public function getImagenes()
    {
        return $this->imagenes;
    }

    /**
     * @param mixed $imagenes
     */
    public function setImagenes($imagenes): void
    {
        $this->imagenes = $imagenes;
    }



    public function save(){
        require_once "Propietario.php";

        if($this->id){


            $query= "UPDATE cabania set domicilio = '".$this->domicilio."', localidad = '".$this->localidad."', capacidad= '".$this->capacidad."', observaciones= '".$this->observaciones."', idPropietario= '".$this->propietario->getId()."', precio= '".$this->precio."' where id = ".$this->id.";";



            $save=$this->db()->query($query);
            //$this->db()->error;
            return $save;

        }
        else{

//var_dump("INSERT INTO cabania (id, domicilio, localidad, capacidad, observaciones, idPropietario, precio) VALUES (NULL, '".$this->domicilio."', '".$this->localidad."', '".$this->capacidad."', '".$this->observaciones."', '".$this->propietario->getId()."', '".$this->precio."');");
            $query = "INSERT INTO cabania (id, domicilio, localidad, capacidad, observaciones, idPropietario, precio) VALUES (NULL, '".$this->domicilio."', '".$this->localidad."', '".$this->capacidad."', '".$this->observaciones."', '".$this->propietario->getId()."', '".$this->precio."');";

            $save=$this->db()->query($query);
            $this->db()->error;

            //var_dump("Funcion save de Cabañas ". $this->db()->error);
            return $save;
        }
    }


    public function disponibles($inicio, $fin){
        $resultSet = array();

            $query=$this->db()->query("SELECT * FROM cabania c WHERE c.id NOT IN(SELECT c.id from reserva r INNER JOIN cabania c ON c.id = r.idCabania WHERE ('".$inicio."' <= r.fin) AND ('".$fin."' >= r.inicio))");

            //return var_dump($query);

            while ($row = $query->fetch_object()) {
                $resultSet[]=$row;
            }

            return $resultSet;

    }

}