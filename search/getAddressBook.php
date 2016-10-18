<?php
include_once '../conf.php';
include_once '../froms.php';
include_once '../function.php';

?>
   
    
 <table class="table table-striped table-hover table-bordered">
<tr><th style="border: none;">Add Contacts</th><th style="border: none"></th><th style="border: none;"></th></tr>
<tr><th>Phone Number</th><th>Members Name</th><th>Members Number</th></tr>   
<?php
addressBook($_GET['q'])
?>
    </table>  
<?php

/*
 * function addressBook($q) {
    if ($q == 1) {

        $loancontacts = mysql_query("SELECT * FROM LOANS  GROUP BY membernumber");
        while ($row = mysql_fetch_array($loancontacts)) {
            $membernumber = $row['membernumber'];


            $contact_name = mysql_query("SELECT* FROM newmember WHERE membernumber = '$membernumber' AND mobileno !=''");
            while ($name = mysql_fetch_array($contact_name)) {

                $fname = $name['firstname'];
                $mname = $name['middlename'];
                $lname = $name['lastname'];

                $fullname = ( base64_decode($fname) . " " . base64_decode($mname) . " " . base64_decode($lname) );
                $phone_number = base64_decode($name['mobileno']);


                echo '<tr><td> <input name="chkbx[]" id="chkbx" class="chkbx" type="checkbox" value="' . $phone_number . '" checked="true">' . $phone_number . ' </td>
            <td>' . $fullname . '</td> <td>' . base64_decode($membernumber) . ' </td></tr>';
            }
        }
    } elseif ($q == 2) {
        //gurantors
        $guarantors = mysql_query("SELECT* FROM guarantors GROUP BY guarantorno");
        while ($row2 = mysql_fetch_array($guarantors)) {
            $guarantors_number = mysql_query("SELECT * FROM newmember WHERE membernumber = '" . $row2['guarantorno'] . "'");
            while ($row3 = mysql_fetch_array($guarantors_number)) {
                echo ''
                . '<tr><td>  <input name="chkbx[]" id="chkbx" class="chkbx" type="checkbox" value="' . base64_decode($row3['mobileno']) . '" checked="true">' . base64_decode($row3['mobileno']) . ' '
                . '</td><td> ' . ucwords(strtolower(base64_decode($row3['firstname']))) . ' ' . ucwords(strtolower(base64_decode($row3['middlename']))) . ' ' . ucwords(strtolower(base64_decode($row3['lastname']))) . ''
                . '</td><td> ' . base64_decode($row3['membernumber']) . ''
                . '</td></tr>';
            }
        }
    } elseif ($q == 3) {
        //loan defaulters
        $m = 3;
        loandefaulters($m);
    } elseif ($q == 4) {
        //loan defaulters gurantors

        loanDefaultesGurantors();
    } else {
        //all members
        $allcontacts = mysql_query("SELECT * FROM newmember WHERE mobileno !=''");
        while ($member = mysql_fetch_array($allcontacts)) {
            $no = base64_decode($member['membernumber']);
            $fisrt_name = $member['firstname'];
            $midle_name = $member['middlename'];
            $last_name = $member['lastname'];
            $mobile_no = base64_decode($member['mobileno']);
            $person_name = base64_decode($fisrt_name) . " " . base64_decode($midle_name) . " " . base64_decode($last_name);

            echo '<tr>
            <td> <input name="chkbx[]" id="chkbx" class="chkbx" type="checkbox" value="' . $mobile_no . '" checked="true">' . $mobile_no . ' </td>
            <td> <input type="hidden" name="contact" value="' . $person_name . '">' . $person_name . '</td>    
            <td>' . $no . ' </td>
                </tr>';
        }
    }
}
 * 
 * 
 */

