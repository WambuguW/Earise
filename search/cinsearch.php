<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once '../conf.php';
include_once '../froms.php';
include_once '../function.php';
$q = $_GET["q"];
namesearch($q);

function namesearch($m) {
		$chqry = mysql_query('select * from newmember where membernumber="' . base64_encode($m) . '"') or die(mysql_error());
		if (mysql_num_rows($chqry) == 1) {
				$row = mysql_fetch_array($chqry);
				echo '<div class="form-group">
        <label class="col-md-3 control-label">Member Name</label>
        <div class="col-md-4">
        <input class="form-control input-medium" type="text" name="mname" value="' . base64_decode($row['firstname']) . ' ' . base64_decode($row['middlename']) . ' ' . base64_decode($row['lastname']) . '" readonly required placeholder="Enter Member Name" title="Enter Member Name"/>
    </div></div>';
		} else {
				echo '<div class="form-group">
        <label class="col-md-3 control-label">Member Name</label>
        <div class="col-md-4">        
        <input class="form-control input-medium" type="text" name="mname" value="Name Not Found" readonly required placeholder="Enter Member Name" title="Enter Member Name"/>
        </div></div>';
		}
}

?>
