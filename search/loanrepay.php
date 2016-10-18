
 <?php
include_once '../conf.php';
include_once '../froms.php';
include_once '../function.php';


$q = base64_encode($_GET["q"]);

loanrepay($q);
   
?>
