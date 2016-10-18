<?php
include_once '../conf.php';
include_once '../froms.php';
include_once '../function.php';

$sth=mysql_query("SELECT * FROM   newmember  WHERE membernumber='".base64_encode($_POST['mno'])."'  ");

while($row=  mysql_fetch_array($sth)){
   echo  getMembername(($row['membernumber']));
}