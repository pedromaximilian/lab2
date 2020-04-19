<?php


class ImagenController extends ControladorBase
{
    public $conectar;
    public $adapter;

    public function __construct()
    {
        parent::__construct();

        $this->conectar = new Conectar();
        $this->adapter = $this->conectar->conexion();
    }


    public function insertar()
    {

        if (isset($_GET["id"])) {
            $id = (int)$_GET["id"];


            //traemos todos los datos del usuario para mostrarlos en el formulario
            $cabania = new Cabania($this->adapter);
            $cabania = $cabania->getById($id);

            $imagenes = new Imagen($this->adapter);
            $imagenes = $imagenes->buscaImagenes($id);
            //Cargamos la vista para mostrar formulario de insert
            $this->view("Imagen/insertar", array(
                "i" => $cabania,
                "imagenes" => $imagenes
            ));
        }
    }


    public function actualizar() {
        $resultado = array();
        if (isset($_FILES['file']) && isset($_POST['id'])) {



            $reporte = null;
            for ($x = 0; $x < count($_FILES['file']['name']); $x++) {
                $file = $_FILES['file'];
                $nombre = $file['name'][$x];
                $tipo = $file["type"][$x];
                $temp = $file["tmp_name"][$x];
                $size = $file["size"][$x];
                $carpeta = $_SERVER['DOCUMENT_ROOT'] . '/images/';
                $uniq = uniqid();

                if ($tipo != 'image/jpeg' && $tipo != 'image/jpg' && $tipo != 'image/png') {
                    $resultado = "error en el tipo de imagen" . $nombre;
                    var_dump($resultado);
                } else if ($size > 1024 * 1024) {
                    $resultado = "error en el tamaño de la imagen " . $nombre;
                    var_dump($resultado);
                } else {
                    $res =move_uploaded_file($temp, $carpeta . $uniq . $nombre);
                    $resultado = "Exito";
                    //var_dump($res . $carpeta . $uniq . $nombre);

                    $imagen = new Imagen($this->adapter);

                    $imagen->setUri($uniq . $nombre);
                    $imagen->setIdCabania($_POST["id"]);
                    $imagen->save($imagen);


                    $cabania = new Cabania($this->adapter);
                    $cabania = $cabania->getById((int)$_POST['id']);

                    $imagenes = new Imagen($this->adapter);
                    $imagenes = $imagenes->buscaImagenes((int)$_POST['id']);

                    $this->view("Imagen/insertar", array(
                        "i" => $cabania,
                        "imagenes" => $imagenes
                    ));
                }
            }
        }
    }

    public function borrar()
    {
        if (isset($_GET["id"])) {
            $id = (int)$_GET["id"];

            $admin = new Imagen($this->adapter);
            $admin->deleteById($id);
        }


        $cabania = new Cabania($this->adapter);
        $cabania = $cabania->getById((int)$_GET["idCabania"]);

        $imagenes = new Imagen($this->adapter);
        $imagenes = $imagenes->buscaImagenes((int)$_GET["idCabania"]);

        $this->view("Imagen/insertar", array(
            "i" => $cabania,
            "imagenes" => $imagenes
        ));
    }


}