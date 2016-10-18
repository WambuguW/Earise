
<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once '../conf.php';
include_once '../froms.php';
$q = $_GET["q"];
persornalinformationsearch($q);

function persornalinformationsearch($m) {
    $chqry = mysql_query('select * from newmember where membernumber like "%' . base64_encode($m) . '%" or firstname like "%' . base64_encode($m) . '%" or middlename like "%' . base64_encode($m) . '%" or lastname like "%' . base64_encode($m) . '%"') or die(mysql_error());
    if (mysql_num_rows($chqry) == 1) {
        $row = mysql_fetch_array($chqry);
         membersearchresults("user", $row['photo'], $row['firstname'],$row['middlename'],$row['lastname'],$row['dob'],$row['gender'],$row['recruitedby'],$row['idnumber'],$row['membernumber'],$row['county'],$row['mobileno'],$row['pinnumber'],$row['residence'],$row['email'],$row['comments'],$row['status'],$row['regdate'],$row['member_cat_id'],$row['title_id'],$row['floor'],$row['org_name'],$row['cro_id'],$row['country'],$row['building_name'],$row['frequency_payment'],$row['occupation'],$row['periodical_saving'],$row['region'],$row['post_address'],$row['business_location'],$row['post_code'],$row['constituency'],$row['office_cell'],$row['office_landline'],$row['office_mail'],$row['primarykey']
);
    } else {
        echo '<span class="red" >Sorry member number did not match..proceed and complete member number</span>';
        include_once '../loading.html';
    }
}

?>

