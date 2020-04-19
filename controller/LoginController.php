<?php


class LoginController extends ControladorBase
{

    public function __construct() {
        parent::__construct();

        $this->conectar=new Conectar();
        $this->adapter =$this->conectar->conexion();
    }

    public function index()
    {

        //Cargamos la vista index y le pasamos valores
        $this->view("Login/index", array());
    }

    public function login(){

        if (isset($_POST['mail']) && isset($_POST['pass']) && isset($_POST['rol'])){
            $mail = $this->sanitize($_POST['mail']);
            $pass = $this->sanitize($_POST['pass']);
            $rol = $this->sanitize($_POST['rol']);

            $administrador = new Administrador($this->adapter);

            if ($rol=="admin"){

                $result = $administrador->validaAdministrador($mail);
                if (isset($result) && password_verify($pass, $result->pass)){
                    session_start();
                    $_SESSION["rol"] = "admin";
                    $_SESSION["nombre"] = $mail;

                    $this->redirect("Administrador", "index");
                }else{
                    $this->view("Login/index", array(
                        "error" => "Verifique datos ingresados"
                    ));
                }
            }else{
                if ($rol=="propietario"){
                    $result = $administrador->validaPropietario($mail,$pass);
                    if (isset($result) && password_verify($pass, $result->pass)){
                        session_start();
                        $_SESSION["rol"] = "propietario";
                        $_SESSION["nombre"] = $mail;
                        $this->redirect("Propietario", "index");
                    }else{
                        $this->view("Login/index", array(
                            "error" => "Existen campos vacios"
                        ));
                    }
                }else{
                    $this->view("Login/index", array(
                        "error" => "Campo rol no seleccionado"
                    ));
                }
            }
        }
        else{
            $this->view("Login/index", array(
                "error" => "Campos no ingresados"
            ));
        }
    }

    public function salir()
    {

        session_start();
        session_destroy();

        //Cargamos la vista index y le pasamos valores
        $this->view("Login/index", array());
    }
}