<?php
include_once './classes.php';
$bank = new User();
$users = new Users();
  



    $date=date("d-M-Y");
    $bank->addothrsrc(base64_encode($_POST['othrsour']), base64_encode($_POST['invoiceno']), base64_encode($_POST['account']), base64_encode($_POST['purp']), 
            
    base64_encode($_POST['dte']), base64_encode($_POST['payee']), base64_encode($_POST['modep']), base64_encode($_POST['receno']), base64_encode($_POST['amount']), base64_encode(date($date)) );
     
?>