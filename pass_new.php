<?php
include './classes.php';
$password = base64_encode($_POST['pass1']);
$old_pass = base64_encode($_POST['pass2']);
$id = base64_decode($_POST['id']);

$sql = "UPDATE users SET password ='" . $password . "' WHERE id= '" . $id . "'";
$result = mysql_query($sql);
mysql_query($result);
$mess = ('Your Password was Successfully Reset. Proceed to Login.');
header('location: index.php?mess='.$mess);

