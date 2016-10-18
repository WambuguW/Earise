<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

include_once '../conf.php';
include_once '../froms.php';
include_once '../function.php';
$q = $_GET["q"];
nsearch($q);

function nsearch($m) {
    $chqry = mysql_query('select * from newmember where membernumber="' . base64_encode($m) . '"') or die(mysql_error());
    if (mysql_num_rows($chqry) == 1) {
        $row = mysql_fetch_array($chqry);
        echo '<div class="form-group">
           <label>member Name</label> 
           <input type="text" class="form-control input-medium"  name="mname" readonly value="' . base64_decode($row['firstname']) . ' ' . base64_decode($row['middlename']) . ' ' . base64_decode($row['lastname']) . '" readonly required placeholder="Enter Member Name" title="Enter Member Name"/></div>';

        //$name = substr(strtoupper(base64_decode($row['firstname'])), 0, 1);
        //$name .= substr(strtoupper(base64_decode($row['middlename'])), 0, 1);
        //$name .= substr(strtoupper(base64_decode($row['lastname'])), 0, 1);
        //$mc=get_Loantype();<div id="loanType"> </div>
        $refno= '';
        $refno.= $m.'/'.date('m/Y');
        echo'<div class="form-group">
<label>Enter Loan Reference Number</label>
<input class="form-control input-medium"  name="refNo" placeholder="Enter Loan Reference Number" title="Enter Loan Reference Number" id="loanType"  value="'.$refno.'">  </div>';
    } else {
        echo '<div class="form-group"><label>member Name</label><input type="text" class="form-control input-medium"  name="mname" readonly value="Name Not Found" readonly required placeholder="Enter Member Name" title="Enter Member Name"/></div>';
    }
}
