<?php
error_reporting(0);
$count = $_POST['count'];
$prev = '';
$amm = 0;
while($count!=0){
$contact[$count] = $_POST['contact'][$count];
if($contact[$count]!==''){
$prev = $prev.$contact[$count];
}
if($contact[$count]!=0)
{
$amm++;
}
$count--;
}
header('location: message.php?id='.$prev.'&amm='.$amm);

//create new address book
if(isset($_POST['createAddressBook'])){
header('location: create_address_book.php');    
}
