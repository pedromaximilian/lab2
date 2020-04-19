<?php

class CabaniaController extends ControladorBase
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
        $cabania = new Cabania($this->adapter);
        $lista = $cabania->getAll();

        //Cargamos la vista index y le pasamos valores
        $this->view("Cabania/index", array(
            "lista" => $lista
        ));
    }

    public function insertar()
    {

        $propietarios = new Propietario($this->adapter);


        $propietarios = $propietarios->getAll();
        //Cargamos la vista para mostrar formulario de insert
        $this->view("Cabania/insertar", array(
            "propietarios" => $propietarios
        ));

    }

    //Procesa los datos del formulario de inserción
    public function crear()
    {

        if (isset($_POST["domicilio"])) {

            $cabania = new Cabania($this->adapter);
            $cabania->setDomicilio($_POST['domicilio']);
            $cabania->setLocalidad($_POST['localidad']);
            $cabania->setCapacidad($_POST['capacidad']);
            $cabania->setObservaciones($_POST['observaciones']);

            $propietario = new Propietario($this->adapter);
            $propietario->setId($_POST['propietario']);
            $cabania->setPropietario($propietario);

            //return var_dump($propietario->getId());

            $cabania->setPrecio($_POST['precio']);

            $save = $cabania->save();
        }
        $this->redirect("Cabania", "index");
    }


    //Muestra el formulario de Actualizacion
    public function editar()
    {
        if (isset($_GET["id"])) {
            $id = (int)$_GET["id"];

            //traemos todos los datos del usuario para mostrarlos en el formulario
            $cabania = new Cabania($this->adapter);
            $cabania = $cabania->getById($id);

            $propietarios = new Propietario($this->adapter);


            $propietarios = $propietarios->getAll();

            //return var_dump($propietarios);

            //return var_dump($cabania->observaciones);
            //Cargamos la vista para mostrar formulario de insert
            $this->view("Cabania/actualizar", array(
                "i" => $cabania,
                "propietarios" => $propietarios
            ));
        }
    }

    //Procesa los datos del formulario de edición
    public function actualizar()
    {
        if (isset($_POST["domicilio"])) {
            $cabania = new Cabania($this->adapter);
            $cabania->setId($_POST['id']);
            $cabania->setDomicilio($_POST['domicilio']);
            $cabania->setLocalidad($_POST['localidad']);
            $cabania->setCapacidad($_POST['capacidad']);
            $cabania->setObservaciones($_POST['observaciones']);

            $propietario = new Propietario($this->adapter);
            $propietario->setId($_POST['propietario']);
            $cabania->setPropietario($propietario);

            $cabania->setPrecio($_POST['precio']);

            $save = $cabania->save();
        }
        $this->redirect("Cabania", "index");
    }


    //Procesa el borrado de un Usuario
    public function borrar()
    {
        if (isset($_GET["id"])) {
            $id = (int)$_GET["id"];

            $admin = new Cabania($this->adapter);
            $admin->deleteById($id);
        }
        $this->redirect("Cabania", "index");
    }

}

