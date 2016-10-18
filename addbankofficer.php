<?php

include_once './classes.php';

$officer = base64_encode($_POST['officer']);


$query=mysql_query("INSERT INTO    bankingofficer(officer) VALUES ('$officer')            ");

if ($query) {
        echo '<span class="green">Save was Successful</span></br>';
} else {
        echo'<span class="red">Save Failed</span></br>';
}
