<?php
//funcion para envio de mail
function sendmail($emailuser,$name){

    ini_set( 'display_errors', 1 ); //Avisará de error si no se ejecuta
    error_reporting( E_ALL );
    $asunto = 'Bienvienido '.$name.' al Foro';
    $cuerpo = 'Gracias por registrarte. '.$name.' Recuerda tener tus claves de acceso en un lugar seguro';

    $date = date('d-m-Y');           //Recuperamos fecha actual en formato dia-mes-año
    $to = $emailuser;                  //Destinatario
    $subject = $asunto;                     //Asunto
    $message = $cuerpo                 ;  //Consulta
    $headers = "Date:" . $date;             //Adjuntamos fecha
    $headers .= "From: Foro PHP";
    $headers .= "User mail ".$emailuser;     //Añadimos datos concatenados por punto (.=)
    mail($to,$subject,$message, $headers);  //Funcion de envio
}

//Función de validación de mail
function validate_mail($email){
    if(filter_var($email, FILTER_VALIDATE_EMAIL)) {     //Valida mail
        return $email;
    }else{
       return $email = '';}
}

?>