<?php

require("class.phpmailer.php");

if (isset($_POST['subject']) &&
        isset($_POST['comment']) &&
        isset($_POST['email']) &&
        isset($_POST['name'])
) {
    $mail = new PHPMailer();
    $mail->Username = 'hvscontacto@gmail.com';
    $mail->Password = 'hvscontact';

    $mail->AddAddress("andrealineros@gmail.com");
    $mail->AddAddress("alineros@digisoftcr.com");
    $mail->AddAddress("alineros@digisoftcr.com");

    $mail->Subject = $_POST['subject'];
    $mail->Body = "Nombre: " . $_POST['name'] . " \n\nConsulta: " . $_POST['comment'] . "\n\nCorreo a responder:\n" . $_POST['email'];

    $mail->IsSMTP();
    $mail->Host = 'ssl://smtp.gmail.com';
    $mail->Port = 465;
    $mail->SMTPAuth = true;

    $mail->From = "hvscontacto@gmail.com";
    $mail->FromName = "HVS-Corp - Contacto";
    $mail->Sender = "hvscontacto@gmail.com";
    $mail->AddReplyTo($_POST['email'], "" . $_POST['email']);

    if (!$mail->Send()) {
        echo "No conection, please try again";
    } else {
        echo "Successfully sent";
    }
} else {
    echo "Error #001: Incorrect info. Try again";
}
?>
