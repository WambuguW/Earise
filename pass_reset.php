<?php

include './classes.php';
$url=  default_setting();
foreach($url as $value){
 $system_url= base64_decode($url['system_url'])  ;
 //$org= base64_decode($url[$key]['system_url'])  ;
}
$sacco=sacco_Details();
foreach($sacco as $value){
$saccoName= base64_decode($sacco['compname'])  ;
 $emailaddress= base64_decode($sacco['emailaddress'])  ;
}


$email = base64_encode($_POST['email']);
$stmt = mysql_query("SELECT * FROM users WHERE email = '" . $email . "'") or die(mysql_error());
if(mysql_num_rows($stmt) == '1') {
while ($pass = mysql_fetch_array($stmt)) {
$to      = $_POST['email'];
$subject = 'Password Reset Was Successful.';
$message = "Greetings Dear $saccoName User, Kindly check your email for the password reset link. Thank you for working diligently with us. Please Click on the Link Below
	    $system_url/new_pass.php?bxc=" . base64_encode($pass['id']) . '&dfs='.  base64_encode($pass['password']);
$headers = "From: $saccoName <noreply@$saccoName.com>" . "\r\n" .
    "Reply-To: noreply@$saccoName.com" . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
$mess = base64_encode('Request was Successful. Kindly Check Your Email to Reset Your Password.');
header('location:reset_pass.php?mess='.$mess);
}

} else {

$alert = '<script type="text/javascript">alert("ERROR! Kindly Check the Email Entered");
        document.location.href = "reset_pass.php";</script>';
        echo $alert;
}

