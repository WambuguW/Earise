<?php

include_once './classes.php';

$authority = base64_encode($_POST['authority']);


$query=mysql_query("INSERT INTO   approvalauthority(authority) VALUES ('$authority')            ");

if ($query) {
        echo 'Save was Successful';
} else {
        echo'Save Failed';
}
