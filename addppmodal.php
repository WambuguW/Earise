<?php

include_once './classes.php';

$purpose = base64_encode($_POST['purpose']);


$query=mysql_query("INSERT INTO  trasferpurpose(purpose) VALUES ('$purpose')            ");

if ($query) {
        echo 'Save was Successful';
} else {
        echo'Save Failed';
}
