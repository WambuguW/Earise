<?php

include_once './classes.php';

$officer = base64_encode($_POST['officer']);


$query=mysql_query("INSERT INTO  bankingofficer(officer) VALUES ('$officer')            ");

if ($query) {
        echo "Save was Successful";
} else {
        echo "Save Failed";
}
