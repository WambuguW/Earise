<?php

include 'session.php';
mysql_connect("localhost","root","");
mysql_select_db("esacco_sms");



 
$sender = $_SESSION['user'];
$recipients = $_POST['contacts'];
$message = $_POST['message'];
$default_status = "unsent";

$settime = str_replace("- ", "", $_POST['settime']);
$createtime = strtotime($settime);


/*-------schedule message-------*/
if($stmt = mysql_query("INSERT INTO scheduled_messages (sender, recipients, message, TimeSet, status) VALUES ('$sender', '$recipients', '$message', '$createtime','$default_status')")){
  echo 'Message scheduled for sending...'; //On success print this message

}

?>