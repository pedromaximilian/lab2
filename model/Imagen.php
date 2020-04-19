<?php


class Imagen extends EntidadBase
{

    private $id;
    private $uri;
    private $idCabania;

    public function __construct($adapter) {
        $table="imagen";
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
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * @param mixed $uri
     */
    public function setUri($uri): void
    {
        $this->uri = $uri;
    }

    /**
     * @return mixed
     */
    public function getIdCabania()
    {
        return $this->idCabania;
    }

    /**
     * @param mixed $idCabania
     */
    public function setIdCabania($idCabania): void
    {
        $this->idCabania = $idCabania;
    }



    public function save(){

            $query = "INSERT INTO imagen (id, uri, idcabania) VALUES (NULL, '".$this->uri."', '".$this->idCabania."');";

            $save=$this->db()->query($query);
            $this->db()->error;

            //var_dump("Funcion save de Cliente ". $this->db()->error);
            return $save;

    }


    public function buscaImagenes($id){
        $resultSet = array();

            $query=$this->db()->query("SELECT * FROM imagen where idCabania=$id");



            while ($row = $query->fetch_object()) {
                $resultSet[]=$row;
            }

            return $resultSet;



    }



}