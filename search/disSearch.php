<?php
include_once '../conf.php';
include_once '../froms.php';
include_once '../function.php';

$sth=mysql_query("SELECT * FROM   loanapplication  WHERE membernumber='".base64_encode($_POST['mno'])."' AND   status='bm90IGRpc2J1cnNlZA==' ");

while($row=  mysql_fetch_array($sth)){
   echo '<option value="'.base64_decode($row['transactionid']).'">'. loanname(($row['transactionid'])).'</option>';
}