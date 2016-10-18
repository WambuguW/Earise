<?php
$q =base64_encode($_GET['q']);
include_once './classes.php';
$query=mysql_query(" SELECT * FROM   receiveinvoice WHERE  creditorid = '$q'    ");

while($row=mysql_fetch_array($query)){
echo '<option value="'.$row['id'].'">'.base64_decode($row['invno']).'</option>';
}


