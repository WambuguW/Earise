<?php

include_once './classes.php';

$aed = base64_encode($_POST['aed']);
$usd = base64_encode($_POST['usd']);

$id = 1;

$query = "UPDATE settings SET aed='$aed',usd='$usd' WHERE id='$id'";
$result = mysql_query($query);
mysql_query($result);

if ($query) {
        echo 'Editing was Successful';
} else {
        echo'Editing Failed';
}
