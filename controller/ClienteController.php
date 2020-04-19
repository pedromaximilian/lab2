<?php

class ClienteController extends ControladorBase
{
    public $conectar;
    public $adapter;

    public function __construct()
    {
        parent::__construct();

        $this->conectar = new Conectar();
        $this->adapter = $this->conectar->conexion();
    }

    public function index()
    {
        $cliente = new Cliente($this->adapter);
        $lista = $cliente->getAll();

        //Cargamos la vista index y le pasamos valores
        $this->view("Cliente/index", array(
            "lista" => $lista
        ));
    }

    public function insertar()
    {


        //Cargamos la vista para mostrar formulario de insert
        $this->view("Cliente/insertar", array());

    }

    //Procesa los datos del formulario de inserción
    public function crear()
    {

        if (isset($_POST["nombre"]) && isset($_POST["apellido"]) && isset($_POST["dni"]) && isset($_POST["domicilio"]) && isset($_POST["mail"]) && isset($_POST["telefono"])) {


           //return var_dump("Detecta los campos llenos");
            $nombre = $this->sanitize($_POST["nombre"]);
            $apellido = $this->sanitize($_POST["apellido"]);
            $dni = $this->sanitize($_POST["dni"]);
            $domicilio = $this->sanitize($_POST["domicilio"]);
            $mail = $this->sanitize($_POST["mail"]);

            if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) { //valido formato mail

                $this->view("Cliente/insertar", array(
                    "error" => "formato de email invalido"
                ));

            }
            $telefono= $this->sanitize($_POST["telefono"]);

            //return var_dump("Hizo la validacion del mail");

            $cliente = new Cliente($this->adapter);
            $cliente->setNombre($nombre);
            $cliente->setApellido($apellido);
            $cliente->setDni($dni);
            $cliente->setDomicilio($domicilio);
            $cliente->setMail($mail);
            $cliente->setTelefono($telefono);

            $save = $cliente->save();

            //return var_dump($save);
            $this->redirect("Cliente", "index");

        }else{
            $this->view("Cliente/insertar", array(
                "error" => "Algunos campos estan incompletos, es posible que su navegador no soporte javascript"
            ));
        }

    }


    //Muestra el formulario de Actualizacion
    public function editar()
    {
        if (isset($_GET["id"])) {
            $id = (int)$_GET["id"];


            //traemos todos los datos del usuario para mostrarlos en el formulario
            $cliente = new Cliente($this->adapter);
            $cliente = $cliente->getById($id);

            //Cargamos la vista para mostrar formulario de insert
            $this->view("Cliente/actualizar", array(
                "i" => $cliente
            ));
        }
    }

    //Procesa los datos del formulario de edición
    public function actualizar()
    {

        if(!is_numeric($_POST["id"])){
            $this->view("Cliente/insertar", array(
                "error" => "Error en el id de cliente, contacte al administrador del sistema"
            ));
        }


        if (isset($_POST["id"]) && isset($_POST["nombre"]) && isset($_POST["apellido"])  && isset($_POST["dni"]) && isset($_POST["domicilio"]) && isset($_POST["mail"]) && isset($_POST["telefono"])) {

            $id = $this->sanitize($_POST["id"]);
            $nombre = $this->sanitize($_POST["nombre"]);
            $apellido = $this->sanitize($_POST["apellido"]);
            $dni = $this->sanitize($_POST["dni"]);
            $domicilio = $this->sanitize($_POST["domicilio"]);
            $mail = $this->sanitize($_POST["mail"]);

            if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) { //valido formato mail

                $this->view("Cliente/insertar", array(
                    "error" => "formato de email invalido"
                ));

            }
            $telefono= $this->sanitize($_POST["telefono"]);



            $cliente = new Cliente($this->adapter);
            $cliente->setId($id);
            $cliente->setNombre($nombre);
            $cliente->setApellido($apellido);
            $cliente->setDni($dni);
            $cliente->setDomicilio($domicilio);
            $cliente->setMail($mail);
            $cliente->setTelefono($telefono);

            $save = $cliente->save();
            $this->redirect("Cliente", "index");
        }else{
            $this->view("Cliente/index", array(
                "error" => "Algunos campos estan incompletos, es posible que su navegador no soporte javascript"
            ));
        }
    }


    //Procesa el borrado de un Usuario
    public function borrar()
    {
        if (isset($_GET["id"])) {
            $id = (int)$_GET["id"];

            $admin = new Cliente($this->adapter);
            $admin->deleteById($id);
        }
        $this->redirect("Cliente", "index");
    }

}

