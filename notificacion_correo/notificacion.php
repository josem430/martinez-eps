<?php
    ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    $from = "martinezeps@eps.com";
    $to = "josem430@outlook.com";
    $subject = "Bienvenida";
    $message = "Hola usted se ha registrado correctamente";
    $headers = "From:" . $from;
    mail($to,$subject,$message, $headers);
    echo "The email message was sent.";
?>