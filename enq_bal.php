<?php
include_once './classes.php';
$client = $_SESSION['user'];
$enq = $dbhs->prepare("SELECT * FROM users WHERE id = '".$client."' ");
$enq->execute();
$bal = $enq->fetch();
if($bal['balance']>0){
echo 'balance: '.$bal['balance'].' Units';
}
 else {
    echo 'balance: 0 Units';
}
