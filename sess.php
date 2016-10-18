<?php
session_start();
$sess = $_SESSION['id'];
$check = mysql_query('SELECT * FROM session WHERE session_id = "'.$sess.'" AND valid = 1');
if(mysql_num_rows($check)==0){
    header('location: login.php');
}
 else {
    
}
