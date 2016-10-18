<?php
include_once '../conf.php';
include_once '../froms.php';
include_once '../function.php';

$sth=mysql_query("SELECT * FROM  bank_details   WHERE member_number='".base64_encode($_POST['mno'])."'  ");
echo '<option></option>';
while($row=  mysql_fetch_array($sth)){
   echo '<option value="'.base64_decode($row['bank_id']).'">'. getbankname(base64_decode($row['bank_id'])).'</option>';
}