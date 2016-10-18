<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
error_reporting(E_ALL ^ E_NOTICE);
ini_set('display_errors', '0');
include_once '../conf.php';
include_once '../froms.php';
include_once '../function.php';
//include_once '../classes.php';
$q = $_GET["q"];
pasoreport("user", $q);

function pasoreport($user, $q) {
		$mqry = mysql_query('select * from newmember where membernumber like "%' . base64_encode($q) . '%"') or die(mysql_error());
		if (mysql_num_rows($mqry) >= 1) {
				$mqry = mysql_query('select * from newmember where membernumber like "%' . base64_encode($q) . '%"') or die(mysql_error());
				$mrslt = mysql_fetch_array($mqry);
				echo '        <form method="get" action="">

        <table class="table table-bordered table-striped table-condensed flip-content"">
        <tr><th>Member Number</th><th>Member Name</th><th>Phone</th></tr>
        <tr><td>' . base64_decode($mrslt['membernumber']) . '</td>
            <td>' . base64_decode($mrslt['firstname']) . ' ' . base64_decode($mrslt['middlename']) . ' ' . base64_decode($mrslt['lastname']) . '</td>
            <td>' . base64_decode($mrslt['mobileno']) . '</td></tr>

</table>
<table class="table table-bordered table-striped table-condensed flip-content"">
<tr><th>Loan Name</th><th>Loan Id</th><th>Loan Amount</th><th>Status</th><th>View</th></tr>';
				$qry = mysql_query('select * from loanapplication where membernumber="' . base64_encode($q) . '" and status="' . base64_encode('active') . '"') or die(mysql_error());
				$_SESSION['lrmno'] = base64_encode($q);
				while ($row = mysql_fetch_array($qry)) {
						echo '<tr><td>' . loanname($row['transactionid']) . '</td><td>' . base64_decode($row['transactionid']) . '</td><td>' . number_format(loanamt($row['transactionid'])) . '</td><td>' . base64_decode($row['status']) . '</td><td><div class="two">
   <a class="two" class="btn green" href="pasocharge.php?view=' . $row['transactionid'] . '&mno=' . $row['membernumber'] . '">Select Loan</a></div></td></tr>';
				}
				echo '</table>
</form>';

		} else {
				echo '<span class="red" >Sorry member number did not match..proceed and complete member number</span>';
				include_once '../loading.html';
		}
}

?>
