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
    $sth=mysql_query("SELECT * FROM  loan   WHERE  membernumber='".  base64_encode($m)."'  AND   status='".base64_encode('pending')."'");
   $stmt=  mysql_query("SELECT * FROM   newvehicle  WHERE 	memberno ='" . base64_encode($m) . "'	");
    if (mysql_num_rows($chqry) == 1) {
        $row = mysql_fetch_array($chqry);
        echo '<div class = "form-group">
        <label>Member Name</label>
        <input class="input-medium form-control" type="text" name="mname" value="' . base64_decode($row['firstname']) . ' ' . base64_decode($row['middlename']) . ' ' . base64_decode($row['lastname']) . ' ' . base64_decode($row['membernumber']) . '" readonly required placeholder="Enter Member Name" title="Enter Member Name"/>
        </div>
        
        <div class = "form-group">                                                    
        <label>Select Account Name</label><br />
        <select class="form-control input-medium select2me " data-placeholder="Select Account Name" name ="tname" required title = "Select Account Name">';
        echo '<option></option>';
       
        while ($row2 = mysql_fetch_array($qry)) {
            if((base64_decode($row2['accno'])) != 'Fx'.$m){
            if (getglcombi(base64_decode($row2['glaccid'])) == '1' || getglcombi(base64_decode($row2['glaccid'])) == '2' || getglcombi(base64_decode($row2['glaccid'])) == '3') {
              
             
                  
            echo '<option value="' . (base64_decode($row2['glaccid'])) . '">' . base64_decode($row2['accno']) . '-' . getglacc(base64_decode($row2['glaccid'])) . '</option>';
            }   
            
        
            }else{
              echo '<option value="' . 'Fx'.(base64_decode($row2['glaccid'])) . '">' . base64_decode($row2['accno']) . '-' . getFixedDepoName(base64_decode($row2['glaccid'])) . '</option>';  
            }
        }
        echo'</select>        </div>';
        /*echo'<div class="two">
        <label>Vehicle Registration Name/ Nick Name</label>
        <select class="input-medium form-control" name ="vehicleid" title = "Payment type">';
        echo '<option></option>';
       
        while ($row3 = mysql_fetch_array($stmt)) {
                  
            echo '<option value="' . (($row3['primarykey'])) . '">' . base64_decode($row3['vehicleregno']) . '  '. base64_decode($row3['nickname']) . '</option>';
             
        }
        echo'</select>        </div>';*/
    }
}

