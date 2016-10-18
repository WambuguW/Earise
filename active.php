<?php
include 'config2.php';
$status = base64_encode($_POST['status']);
$url = base64_encode($_POST['url']);
try{
$stmt = $dbhs->prepare('UPDATE pages SET status = :stat WHERE url = :url');
$stmt-> execute(array(':stat'=>$status, ':url'=>$url));
echo 'successfully updated';
}
 catch (PDOException $e){
echo 'failed to updated';
 }