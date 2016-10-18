<?php
include_once '../conf.php';
include_once '../froms.php';
include_once '../function.php';

$sth=mysql_query("SELECT * FROM   loanapplication  WHERE transactionid='$tid' ");

while($row=  mysql_fetch_array($sth)){
   echo  (($row['amount']));
}