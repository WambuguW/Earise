<?php
include 'config2.php';
$url = $_POST['url'];
$name = $_POST['name'];
$stmt = $dbhs->prepare('DELETE FROM pages WHERE url = :url AND name = :name');
$stmt->execute(array(':url'=>$url, ':name'=>$name));
if($stmt){
    echo 'successfully deleted';
}
 else {
    echo 'failed to delete!';
}
