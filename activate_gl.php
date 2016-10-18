<?php
include 'conf.php';
$status = $_POST['status'];
$code = $_POST['url'];
$stmt = mysql_query('UPDATE glaccounts SET status  = "'. base64_encode($status) .'" WHERE accode = "'. base64_encode($code) .'"');
echo 'successfully update account';