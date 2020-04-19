<?php


class Propietario extends EntidadBase
{
    private $id;
    private $nombre;
    private $apellido;
    private $dni;
    private $domicilio;
    private $mail;
    private $telefono;
    private $pass;

    /**
     * propietario constructor.
     */
    public function __construct($adapter) {
        $table="propietario";
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
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre): void
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * @param mixed $apellido
     */
    public function setApellido($apellido): void
    {
        $this->apellido = $apellido;
    }

    /**
     * @return mixed
     */
    public function getDni()
    {
        return $this->dni;
    }

    /**
     * @param mixed $dni
     */
    public function setDni($dni): void
    {
        $this->dni = $dni;
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
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param mixed $mail
     */
    public function setMail($mail): void
    {
        $this->mail = $mail;
    }

    /**
     * @return mixed
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * @param mixed $telefono
     */
    public function setTelefono($telefono): void
    {
        $this->telefono = $telefono;
    }

    /**
     * @return mixed
     */
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * @param mixed $pass
     */
    public function setPass($pass): void
    {
        $this->pass = $pass;
    }

    public function save(){


        //verifico si el usuario se encuentra en la BD
        //sino es null entonces UPDATE
        //si es null entonces INSERT
        if($this->id){


            $query= "UPDATE propietario set nombre = '".$this->nombre."', apellido = '".$this->apellido."', dni= '".$this->dni."', domicilio= '".$this->domicilio."', mail= '".$this->mail."', telefono= '".$this->telefono."' where id = ".$this->id.";";



            $save=$this->db()->query($query);
            //$this->db()->error;
            return $save;

        }
        else{


            $query = "INSERT INTO propietario (id, nombre, apellido, dni, domicilio, mail, telefono) VALUES (NULL, '".$this->nombre."', '".$this->apellido."', '".$this->dni."', '".$this->domicilio."', '".$this->mail."', '".$this->telefono."');";

            $save=$this->db()->query($query);
            $this->db()->error;

            //var_dump("Funcion save de propietario ". $this->db()->error);
            return $save;
        }
    }


    public function guardaPass()
    {
        if ($this->id){
            $query = "UPDATE propietario set pass = '".$this->pass."' where id = ".$this->id.";";

        }
    }

    public function guardaCodigo()
    {
        if ($this->id){
            $query = "UPDATE propietario set codigo = '".$this->codigo."' where id = ".$this->id.";";

        }
    }


}