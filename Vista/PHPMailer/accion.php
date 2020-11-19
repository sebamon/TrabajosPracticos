<html>
    <head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<?php
include_once "../../configuracion.php";



$datos = data_submitted();
$archiv= new AbmArchivo();
if(isset($FILES_['file']))
{
$archiv->UploadFile($datos);
}

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
// $mail->Host='smtp.live.com'; hotmail
//Set the SMTP port number - likely to be 25, 465 or 587
$mail->Port = 25;
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication
$mail->Username = 'smon';
// $mail->Username = 'seba_mon1@hotmail.com'; hotmail
//Password to use for SMTP authentication
$mail->Password = 'Starscream031';
//Set who the message is to be sent from
$mail->setFrom('smon@edersa.com.ar', 'Sebastian Mon');
//Set an alternative reply-to address
$mail->addReplyTo('smon@edersa.com.ar', 'Sebastian Mon');
// //Set who the message is to be sent to
// $mail->setFrom('seba_mon@hotmail.com', 'Sebastian Mon');
// //Set an alternative reply-to address
// $mail->addReplyTo('seba_mon@hotmail.com', 'Sebastian Mon');
//Set who the message is to be sent to
$mail->addAddress($datos['email'], 'Nombre');
//Set the subject line
$mail->Subject = $datos['asunto'];
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML($datos['texto']);
$mail->Body=$datos['cuerpoEmail'];
//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';
//Attach an image file
//$mail->addAttachment($datos['file']);
if(isset($FILES_['file']))
{
    $mail->addAttachment('../../archivos/'.$_FILES['file']['name']);
}
//send the message, check for errors
if (!$mail->send()) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message sent!';
}

?>
<a href="test.php"><button class="btn btn-primary">Volver</button></a>

</body>
</html>