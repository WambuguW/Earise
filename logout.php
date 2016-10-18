<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
include_once './classes.php';
$end= 0;
$end_time= time();
$destroy = mysql_query('UPDATE session SET valid = "'.  base64_encode($end).'", end_timestamp = "'.  base64_encode($end_time).'" WHERE session_id = "'.$_SESSION['id'].'"');
session_destroy();
header('location:login');
?>
