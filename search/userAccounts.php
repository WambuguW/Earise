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
    $chqry = mysql_query('select * from newmember where membernumber="' . base64_encode($m) . '" or firstname LIKE "%' . base64_encode($m) . '%" or middlename LIKE "%' . base64_encode($m) . '%" or lastname LIKE "%' . base64_encode($m) . '%"') or die(mysql_error());
    $qry = mysql_query('select * from memberaccs where mno = "' . base64_encode($m) . '" and status = "' . base64_encode("active") . '"') or die(mysql_error());
   
    if (mysql_num_rows($chqry) == 1) {   
      
       
        while ($row2 = mysql_fetch_array($qry)) {          
            if (getglcombi(base64_decode($row2['glaccid'])) == '1' || getglcombi(base64_decode($row2['glaccid'])) == '2' || getglcombi(base64_decode($row2['glaccid'])) == '3') {
                
            echo '<option value="' . (base64_decode($row2['glaccid'])) . '">' . base64_decode($row2['accno']) . '-' . getglacc(base64_decode($row2['glaccid'])) . '</option>';
            }   
            
        
           
        }
       
    }
}

