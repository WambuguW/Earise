<?php
include_once './classes.php';

$id = $_GET['q'];
$scqry = mysql_query('select * from receiveinvoice where creditorid="' . base64_encode($id) . '" and status="' . base64_encode("Unpaid") . '"') or die(mysql_error());
echo '<label>Select Invoice: </label>';
if (mysql_num_rows($scqry) > 0){
    echo '<select name="rece" class="form-control input-medium" title="select invoice"><option></option>';
    while ($rs = mysql_fetch_array($scqry)){
        echo '<option value="' . $rs['id'] . '">' . base64_decode($rs['invno']) . '</option>';
    }
}
else {
    echo 'There are no invoices for this creditor';
}



