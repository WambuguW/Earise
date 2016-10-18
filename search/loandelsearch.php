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
loanrepaymentreport("user", $q);

function loanrepaymentreport($user, $q) {
     $confirmdelete = "return confirm('Are you sure you want to Reverse this loan?');";
		$mqry = mysql_query('select * from newmember where membernumber like "%' . base64_encode($q) . '%"') or die(mysql_error());
		if (mysql_num_rows($mqry) >= 1) {
				$mqry = mysql_query('select * from newmember where membernumber like "%' . base64_encode($q) . '%"') or die(mysql_error());
				$mrslt = mysql_fetch_array($mqry);
				echo '        <form method="get" action="">

       <br/> <table class="table table-bordered table-striped table-condensed flip-content"">
        <tr><th>Member Number</th><th>Member Name</th><th>Phone</th></tr>
        <tr><td>' . base64_decode($mrslt['membernumber']) . '</td>
            <td>' . base64_decode($mrslt['firstname']) . ' ' . base64_decode($mrslt['middlename']) . ' ' . base64_decode($mrslt['lastname']) . '</td>
            <td>' . base64_decode($mrslt['mobileno']) . '</td></tr>

</table>

<table class="table table-bordered table-striped table-condensed flip-content"">
<tr><th>Loan Name</th><th>Loan Id</th><th>Loan Amount</th><th>Status</th><th>View</th></tr>';
				$qry = mysql_query('select * from loanapplication where membernumber="' . base64_encode($q) . '"') or die(mysql_error());
				$_SESSION['lrmno'] = base64_encode($q);
				while ($row = mysql_fetch_array($qry)) {
						echo '<tr><td>' . loanname($row['transactionid']) . '</td><td>' . (base64_decode($row['transactionid'])) . '</td><td>'.  getsymbol().' ' . number_format(loanamt($row['transactionid']), 2) . '</td><td>' . base64_decode($row['status']) . '</td>
                                                    <td><div class="two"><form action="" method="POST"><input type="hidden" name="tra_id" value="'. $row['transactionid'] .'" />
                                                        <input type="hidden" name="mno" value="'.$row['membernumber'] .'" />
   <button type="submit" name="btnreverse"  class="btn red" onClick="' . $confirmdelete . '" >Reverse Loan</button></form></div></td></tr>';
				}
				echo '</table>
</form>';

				guranteed($_SESSION['users'], $q);
		} else {
				echo '<span class="red" >Sorry member number did not match..proceed and complete member number</span>';
				include_once '../loading.html';
		}
}

?>
