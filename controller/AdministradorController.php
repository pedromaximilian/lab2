<?php

class AdministradorController extends ControladorBase
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
        $admin = new Administrador($this->adapter);
        $lista = $admin->getAll();
        //$allusers = "";

        //Cargamos la vista index y le pasamos valores
        $this->view("Administrador/index", array(
            "lista" => $lista
        ));
    }

    public function insertar()
    {


        //Cargamos la vista para mostrar formulario de insert
        $this->view("Administrador/insertar", array());

    }

    //Procesa los datos del formulario de inserción
    public function crear()
    {

        if (isset($_POST["mail"]) && isset($_POST["pass"])) { //valido campos llenos


            $mail = ($_POST["mail"]);

            if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) { //valido formato mail

                $this->view("Administrador/insertar", array(
                    "error" => "formato de email invalido"
                ));

            }


            $admin = new Administrador($this->adapter);
            $admin->setMail($_POST['mail']);

            $password = $_POST["pass"];
            $pass_cifrado = password_hash($password, PASSWORD_DEFAULT);
            $admin->setPass($pass_cifrado);

            $save = $admin->save();
        }
        $this->redirect("Administrador", "index");
    }


    //Muestra el formulario de Actualizacion
    public function editar()
    {
        if (isset($_GET["id"])) {
            $id = (int)$_GET["id"];


            //traemos todos los datos del usuario para mostrarlos en el formulario
            $administrador = new Administrador($this->adapter);
            $administrador = $administrador->getById($id);

            //Cargamos la vista para mostrar formulario de insert
            $this->view("Administrador/actualizar", array(
                "i" => $administrador
            ));
        }
    }

    //Procesa los datos del formulario de edición
    public function actualizar()
    {
        if (isset($_POST["mail"])) {

            $admin = new Administrador($this->adapter);
            $admin->setMail($_POST["mail"]);
            $admin->setId($_POST["id"]);
            $admin->setPass($_POST["pass"]);


            $save = $admin->save();
        }
        $this->redirect("Administrador", "index");
    }


    //Procesa el borrado de un Usuario
    public function borrar()
    {
        if (isset($_GET["id"])) {
            $id = (int)$_GET["id"];

            $admin = new Administrador($this->adapter);
            $admin->deleteById($id);
        }
        $this->redirect();
    }

}

