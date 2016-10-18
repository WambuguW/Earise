<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once '../conf.php';
include_once '../froms.php';
include_once '../function.php';
$q = $_GET["q"];
bsearch($q);

function bsearch($m) {
    $chqry = mysql_query('select * from addbank where primarykey="' . ($m) . '"') or die(mysql_error());
    if (mysql_num_rows($chqry) == 1) {
        $row = mysql_fetch_array($chqry);
        echo '
        <label>Bank Name</label>
        <input type="text" class="form-control input-medium" name="name" value="' . base64_decode($row['bankname']) . '" readonly required placeholder="Enter Bank Name" title="Enter Member Name"/>
 
        <label>Bank Branch</label>
        <input type="text" class="form-control input-medium" name="branch" value="' . base64_decode($row['branch']) . '" readonly required placeholder="Enter Bank Branch" title="Enter Member Name"/>      
      
        <label>Account Number</label>
        <input type="text" class="form-control input-medium" name="accno" value="' . base64_decode($row['accno']) . '" readonly required placeholder="Enter Account Number" title="Enter Member Name"/>';

        } else {
        
            echo '
        <label>No Bank Data</label>
        <input type="text" class="form-control input-medium" name="mname" value="No Bank Data" readonly required placeholder="No Bank Data" title="No Bank Data"/>';
    }
}

?>
