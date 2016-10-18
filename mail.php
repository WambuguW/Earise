<?php
function mailing($name, $path, $filename){
$href = $_SERVER['HTTP_REFERER'];
/**
 * This example shows sending a message using PHP's mail() function.
 */

require 'phpMailer/PHPMailerAutoload.php';

//Create a new PHPMailer instance
$mail = new PHPMailer;
//Set who the message is to be sent from
$mail->setFrom('info@ryanada.com', 'Ryanada');
//Set an alternative reply-to address
$mail->addReplyTo('noreply@ryanada.com', 'ESACCO');
//Set who the message is to be sent to
$mail->addAddress(base64_decode($name['email']), base64_decode($name['firstname']));
//Set the subject line
$mail->Subject = 'Statement';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';
$mail->Body = 'This is a plain-text message body';
//Attach an image file
$mail->addAttachment($path . $filename);

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "<script>alert('file sent');window.location.href='".$href."';</script>";
}
}
