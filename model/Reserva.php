<?php


class Reserva extends  EntidadBase
{

    private $id;
    private  $inicio;
    private  $fin;
    private  $costo;
    private $idCliente;
    private $idCabania;
    private $comision;
    private $ganancia;

    private $cliente;
    private $cabania;


    public function __construct($adapter) {
        $table="reserva";
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
    public function getInicio()
    {
        return $this->inicio;
    }

    /**
     * @param mixed $inicio
     */
    public function setInicio($inicio): void
    {
        $this->inicio = $inicio;
    }

    /**
     * @return mixed
     */
    public function getFin()
    {
        return $this->fin;
    }

    /**
     * @param mixed $fin
     */
    public function setFin($fin): void
    {
        $this->fin = $fin;
    }

    /**
     * @return mixed
     */
    public function getCosto()
    {
        return $this->costo;
    }

    /**
     * @param mixed $costo
     */
    public function setCosto($costo): void
    {
        $this->costo = $costo;
    }

    /**
     * @return mixed
     */
    public function getIdCliente()
    {
        return $this->idCliente;
    }

    /**
     * @param mixed $idCliente
     */
    public function setIdCliente($idCliente): void
    {
        $this->idCliente = $idCliente;
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

    /**
     * @return mixed
     */
    public function getComision()
    {
        return $this->comision;
    }

    /**
     * @param mixed $comision
     */
    public function setComision($comision): void
    {
        $this->comision = $comision;
    }

    /**
     * @return mixed
     */
    public function getGanancia()
    {
        return $this->ganancia;
    }

    /**
     * @param mixed $ganancia
     */
    public function setGanancia($ganancia): void
    {
        $this->ganancia = $ganancia;
    }

    /**
     * @return mixed
     */
    public function getCliente()
    {
        return $this->cliente;
    }

    /**
     * @param mixed $cliente
     */
    public function setCliente($cliente): void
    {
        $this->cliente = $cliente;
    }

    /**
     * @return mixed
     */
    public function getCabania()
    {
        return $this->cabania;
    }

    /**
     * @param mixed $cabania
     */
    public function setCabania($cabania): void
    {
        $this->cabania = $cabania;
    }


    public function save(){


        //verifico si el usuario se encuentra en la BD
        //sino es null entonces UPDATE
        //si es null entonces INSERT
        if($this->id){


            $query= "UPDATE reserva set inicio = '".$this->inicio."', fin = '".$this->fin."', costo= '".$this->costo."', idCliente= '".$this->idCliente."', idCabania= '".$this->idCabania."', comision= '".$this->comision."', ganancia= '".$this->ganancia."' where id = ".$this->id.";";



            $save=$this->db()->query($query);
            //$this->db()->error;
            return $save;

        }
        else{



            $query = "INSERT INTO reserva (id, inicio, fin, costo, idCliente, idCabania, comision, ganancia) VALUES (NULL, '".$this->inicio."', '".$this->fin."', '".$this->costo."', '".$this->idCliente."', '".$this->idCabania."', '".$this->comision."', '".$this->ganancia."');";
            //return var_dump($query);
            $save=$this->db()->query($query);
            $this->db()->error;



            //var_dump("Funcion save de Cliente ". $this->db()->error);
            return $save;
        }
    }




}