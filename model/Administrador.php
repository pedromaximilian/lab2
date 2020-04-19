<?php


class Administrador extends EntidadBase
{
private $id;
private $mail;
private $pass;

    /**
     * Administrador constructor.
     */
    public function __construct($adapter) {
        $table="administrador";
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
    public function setId($id)
    {
        $this->id = $id;
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
    public function setMail($mail)
    {
        $this->mail = $mail;
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
    public function setPass($pass)
    {
        $this->pass = $pass;
    }




    public function save(){


        //verifico si el usuario se encuentra en la BD
        //sino es null entonces UPDATE
        //si es null entonces INSERT
        if($this->id){


            $query= "UPDATE administrador set mail = '".$this->mail."', pass = '".$this->pass."' where id = ".$this->id.";";



            $save=$this->db()->query($query);
            //$this->db()->error;
            return $save;

        }
        else{


            $query = "INSERT INTO administrador (id, mail, pass) VALUES (NULL, '".$this->mail."', '".$this->pass."');";

            $save=$this->db()->query($query);
            $this->db()->error;

            //var_dump("Funcion save de administrador ". $this->db()->error);
            return $save;
        }
    }


}