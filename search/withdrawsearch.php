<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
error_reporting(0);
include_once '../conf.php';
include_once '../froms.php';
include_once '../function.php';

$j = $_GET["q"];
withdrawalsearch($j);
function withdrawalsearch($j) {
    $sql = mysql_query('select * from newmember where membernumber ="' . base64_encode($j) .'" and status="' . base64_encode('active') . '"') or die(mysql_error());
    if (mysql_num_rows($sql) == 1) {
        $row = mysql_fetch_array($sql);
        $saved = getMemberSavings($row['membernumber']);
        $withdrawfee = getWithdrawalFee();
        $savings=$saved - $withdrawfee;
        withdrawsearchresults($_SESSION['users'], $row['membernumber'], $row['firstname'], $row['middlename'], $row['lastname'], $row['idnumber'], $row['county'], $row['county'], $row['mobileno'], $row['comments'],$savings,$withdrawfee);
    } else {
        echo '<span class="red" >Sorry member number did not match..proceed and complete member number</span>';
        include_once '../loading.html';
    }
}

