<?php
include 'config2.php';
$url = base64_encode($_POST['url']);
$name = base64_encode($_POST['name']);
$menu = base64_encode($_POST['menu']);
$submen=  base64_encode($_POST['submenu']);
$check = $dbhs->prepare('SELECT * FROM pages WHERE url = :url');
$check->bindParam(':url', $url);
$check->execute();
if($check->rowCount()>0){
   $stmt = $dbhs->prepare('UPDATE pages SET name = :name, menu = :menu, submenu= :sub WHERE url = :url');
   $stmt->execute(array(':url'=>$url, ':name'=>$name, ':menu'=>$menu, ':sub'=>$submen));
}
else{
$stmt = $dbhs->prepare('INSERT INTO pages (url, name, menu,submenu, status) VALUES(:url, :name, :menu, :sub, :stat)');
$stmt->execute(array(':url'=>$url, ':name'=>$name, ':menu'=>$menu, ':sub'=>$submen,':stat'=>base64_encode('active')));
}
if($stmt){
echo 'successfully updated';
}
else {
    echo 'failed to update, please try again';
}

