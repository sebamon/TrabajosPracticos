<?php
include_once "../../configuracion.php";

use PHPMailer;
use POP3;
use SMTP;

$datos = data_submitted();

//Create a new PHPMailer instance
$mail = new PHPMailer();
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// SMTP::DEBUG_OFF = off (for production use)
// SMTP::DEBUG_CLIENT = client messages
// SMTP::DEBUG_SERVER = client and server messages
$mail->SMTPDebug = SMTP::DEBUG_SERVER;
//Set the hostname of the mail server
$mail->Host = 'mta2.edersa.com.ar';
//Set the SMTP port number - likely to be 25, 465 or 587
$mail->Port = 25;
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication
$mail->Username = 'smon';
//Password to use for SMTP authentication
$mail->Password = 'Starscream031';
//Set who the message is to be sent from
$mail->setFrom('smon@edersa.com.ar', 'Sebastian Mon');
//Set an alternative reply-to address
$mail->addReplyTo('smon@edersa.com.ar', 'Sebastian Mon');
//Set who the message is to be sent to
$mail->addAddress('smon@edersa.com.ar', 'John Doe');
//Set the subject line
$mail->Subject = $datos['asunto'];
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML($datos['texto']);
$mail->body=$datos['cuerpoEmail'];
//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';
//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message sent!';
}

?>



