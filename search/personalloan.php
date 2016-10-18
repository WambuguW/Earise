<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once '../conf.php';
include_once '../froms.php';
include_once '../function.php';
$id = $_GET["id"];
$query=mysql_query(" SELECT * FROM  loanapplication WHERE id ='$id'   ");
   //membernumber 	loantype 	purpose 	installments 	date 	appdate 	gperiod 	tperiod
 echo'<table  class="table table-striped table-bordered table-hover table-full-width">
<thead  class="style">
<tr>
<th class="style">Member No</th>
<th class="style">Member Name</th>
<th class="style">Loan Type</th>
<th class="style">Purpose</th>
<th class="style">Payment Mode</th>
<th class="style">Application Date</th>
<th class="style">Grace Period</th>
<th class="style">No. Intrervals</th></tr>
</thead>';
       while ($row = mysql_fetch_array($query)) {
 echo'<tbody><tr><td>'.base64_decode($row['membernumber']).' </td>
           <td>'.getmembername($row['membernumber']).' </td>
           <td>'. (base64_decode($row['loantype'])).' </td>           
           
          <td>'.base64_decode($row['purpose']).' </td>
		  <td>'.base64_decode($row['paymode']).' </td>
           <td>'.date('d-M-Y',(base64_decode($row['appdate']))).' </td>
		   <td>'.  base64_decode($row['gperiod']).' </td>
		   
		   
           <td>'.base64_decode($row['interval']).'&nbsp;<a button href="repay.php?id='.$row['id'].'">View Repayment</a button></td></tr>';
       $paymode=base64_decode($row['paymode']);
	   $interval=base64_decode($row['interval']);
	   $gracep=(base64_decode($row['gperiod']));
	   $appdate=(base64_decode($row['appdate']));
	  }
	   
	 echo'</tbody></table>';
	 
	$datelast= +$interval.$paymode  ;
	$datem=+"1".$paymode;
    $stdate = $appdate+ $gracep *1 * 24 * 60 *	60 ;
    $startdate=strtotime(date('d-M-Y',$stdate));
	$enddate = strtotime($datelast,$startdate);

	echo'<table class="table table-striped table-bordered table-hover table-full-width">';
while ($startdate <= $enddate) {
echo  '<tr></td>'. date("d-M-Y", $startdate).'</td></tr>';
$startdate = strtotime($datem,$startdate);
}
echo '</table>';
 
?>
