<?php


class ReservaController extends ControladorBase
{
    public $conectar;
    public $adapter;

    public function __construct()
    {
        parent::__construct();

        $this->conectar = new Conectar();
        $this->adapter = $this->conectar->conexion();
    }

    /*
    public function ajaxReserva()
    {
        $reserva = new Reserva($this->adapter);
        $lista = $reserva->getAll();

        echo json_encode($lista);

    }
    */

    public function index()
    {
        $reserva = new Reserva($this->adapter);
        $lista = $reserva->getAll();

        //Cargamos la vista index y le pasamos valores
        $this->view("Reserva/index", array(
            "lista" => $lista
        ));
    }

    public function disponibles()
    {

        if (isset($_POST["inicio"]) && isset($_POST["fin"])){
            if ((strtotime($_POST["fin"]) - strtotime($_POST["inicio"])) <= 0){

                $cliente = new Cliente($this->adapter);
                $clientes = $cliente->getAll();

                $this->view("Reserva/insertar", array(
                    "clientes" => $clientes,
                    "error"=> "La fecha de inicio es igual o menor a la fecha de fin"
                ));
                return;
            }
        }

        $cabanias = new Cabania($this->adapter);
        $cabanias = $cabanias->disponibles($_POST["inicio"], $_POST["fin"]);


        $lista = array();


        if ($_POST["capacidad"] != "") {
            foreach ($cabanias as $key => $cabania) {
                if ($cabania->capacidad != $_POST["capacidad"]) {
                    unset($cabanias[$key]);
                }
            }
        }
        if ($_POST["localidad"] != "") {
            foreach ($cabanias as $key => $cabania) {
                if ($cabania->localidad != $_POST["localidad"]) {
                    unset($cabanias[$key]);
                }
            }
        }
        if ($_POST["domicilio"] != "") {
            foreach ($cabanias as $key => $cabania) {
                if ($cabania->capacidad != $_POST["domicilio"]) {
                    unset($cabanias[$key]);
                }
            }
        }

        if ($_POST["precio"] != "") {
            foreach ($cabanias as $key => $cabania) {
                if ($cabania->precio != $_POST["precio"]) {
                    unset($cabanias[$key]);
                }
            }
        }


        foreach ($cabanias as $c) {
            $coleccion = new Imagen($this->adapter);
            $imagenes = array();
            $imagenes = $coleccion->buscaImagenes($c->id);
            $c->imagenes = $imagenes;
            $lista[] = $c;
        }

        $inicio = $_POST["inicio"];
        $fin = $_POST["fin"];


        $cliente = null;
        if (isset($_POST["idCliente"]) && (int)$_POST["idCliente"] > 0) {
            $cliente = new Cliente($this->adapter);
            $cliente = $cliente->getById((int)$_POST["idCliente"]);
        }
        $this->view("Reserva/disponibles", array(
            "lista" => $lista,
            "inicio" => $inicio,
            "fin" => $fin,
            "cliente" => $cliente
        ));


    }


    public function insertar()
    {

        $clientes = new Cliente($this->adapter);
        $clientes = $clientes->getAll();
        //Cargamos la vista para mostrar formulario de insert
        $this->view("Reserva/insertar", array(
            "clientes" => $clientes
        ));

    }

    //Procesa los datos del formulario de inserción
    public function crear()
    {

        $exito = null;
        $error = null;








        if (isset($_POST["inicio"]) && isset($_POST["fin"]) && isset($_POST["idCliente"]) && isset($_POST["idCabania"])) {

            //return var_dump("Detecta los campos llenos");
            $inicio = $_POST["inicio"];
            $fin = $_POST["fin"];
            $cabania = new Cabania($this->adapter);
            $cabania = $cabania->getById((int)$_POST["idCabania"]);

            $cliente = new Cliente($this->adapter);
            $cliente = $cliente->getById((int)$_POST["idCliente"]);

            $diferenciaDias = ((strtotime($fin) - strtotime($inicio)) / (60 * 60 * 24));

            //return var_dump($cabania->id);

            $costo = $cabania->precio * $diferenciaDias;
            $comision = (PORCENTAJE * $costo) / 100;

            $ganancia = $costo - $comision;

            $reserva = new Reserva($this->adapter);

            $reserva->setInicio($inicio);
            $reserva->setFin($fin);
            $reserva->setCosto($costo);
            $reserva->setIdCabania($cabania->id);
            $reserva->setIdCliente($cliente->id);
            $reserva->setComision($comision);
            $reserva->setGanancia($ganancia);


            if ($reserva->save()) {

                $resCorreo = $this->enviaCorreo("Confirmacion de reserva",
                    "$cliente->nombre . ' su reserva para el dia ' . $inicio . 'ha sido confirmada.';",
                    "$cliente->mail");

                if ($resCorreo) {
                    $exito = "Correo enviado con Exito";
                } else {
                    $error = "No se pudo enviar el correo";
                }
                //-------------------------------------------------------------------------------------------
                $reserva = new Reserva($this->adapter);
                $lista = $reserva->getAll();

                //Cargamos la vista para mostrar formulario de insert
                $this->view("Reserva/index", array(
                    "exito" => "Reserva agregada con exito",
                    "error" => $error,
                    "lista" => $lista
                ));
            } else {
                $reserva = new Reserva($this->adapter);
                $lista = $reserva->getAll();

                //Cargamos la vista para mostrar formulario de insert
                $this->view("Reserva/insertar", array(
                    "lista" => $lista,
                    "error" => "se projujo un error intente nuevamente"
                ));
            }
        } else {
            $reserva = new Reserva($this->adapter);
            $lista = $reserva->getAll();

            //Cargamos la vista para mostrar formulario de insert
            $this->view("Reserva/insertar", array(
                "lista" => $lista,
                "error" => "se projujo un error intente nuevamente"
            ));
        }
    }


    //Procesa el borrado de un Usuario
    public function borrar()
    {
        if (isset($_GET["id"])) {
            $id = (int)$_GET["id"];

            $reserva = new Reserva($this->adapter);
            $reserva->deleteById($id);
        }
        $this->redirect("Reserva", "index");
    }

}

