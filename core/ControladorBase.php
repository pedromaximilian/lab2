<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require (dirname(__DIR__).'/view/Reserva/src/Exception.php');
require (dirname(__DIR__).'/view/Reserva/src/PHPMailer.php');
require (dirname(__DIR__).'/view/Reserva/src/SMTP.php');




class ControladorBase{

    public function __construct() {
		require_once 'Conectar.php';
        require_once 'EntidadBase.php';
        require_once 'ModeloBase.php';
        
        //Incluir todos los modelos
        foreach(glob("model/*.php") as $file){
            require_once $file;
        }



    }
    
    //funcionalidades comunes a todos los controladores
    
    public function view($vista,$datos){
        foreach ($datos as $id_assoc => $valor) {
            //define y setea todas las variables que se usarán en la vista
            ${$id_assoc}=$valor; 
        }
        
        //crea una instancia con funciones ùtiles para las vistas
        require_once 'core/AyudaVistas.php';
        $helper=new AyudaVistas();
    
        require_once 'view/'.$vista.'View.php';
    }
    
    public function redirect($controlador=CONTROLADOR_DEFECTO,$accion=ACCION_DEFECTO){
        header("Location:index.php?controller=".$controlador."&action=".$accion);
    }
    
    //Métodos para los controladores

    public function sanitize($variable){

        return htmlentities(addslashes($variable));
    }



    public function enviaCorreo($asunto, $mensaje, $destinatario){
        $mail = new PHPMailer(true);

        try {
            //Server settings
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'test@gmail.com';                     // SMTP username
            $mail->Password   = 'test';                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom('test@gmail.com', 'perseo');
            $mail->addAddress($destinatario);     // Add a recipient




            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $asunto;
            $mail->Body    =  $mensaje;
            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();

            return true;


        } catch (Exception $e) {

            return false;

        }
    }


}
?>
