<?php
error_reporting(0);
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once '../conf.php';
include_once '../froms.php';
include_once '../function.php';
$q = base64_encode($_GET["q"]);
$query=mysql_query(" SELECT * FROM fines WHERE   mno='". $q."'   ");
if(mysql_num_rows($query) < 1){
    echo'<table  class="table table-striped table-bordered table-hover table-full-width" >
           <thead  class="style"><tr><th class="style">Member Number</th>
            <th class="style">Member Name</th><th class="style">Loan Name</th>
            <th class="style">Amount</th><th class="style">Date</th></tr></thead>';

   echo'<tbody><tr><td colspan="5"><center>No Data Available</center></td></tr></tbody></table>';   
}
else{
    while ($row = mysql_fetch_array($query)) {
    echo'<table  class="table table-striped table-bordered table-hover table-full-width" >
               <thead  class="style"><tr><th class="style">Member Number</th>
                <th class="style">Member Name</th><th class="style">Loan Name</th>
                <th class="style">Amount</th><th class="style">Date</th></tr></thead>';

       echo'<tbody><tr><td>' .base64_decode($row['mno']). '</td><td>' . getMembername($row['mno']) . '</td><td>' . getloaname(base64_decode($row['loanid'])) . '</td><td>' . getsymbol() . ' '.  number_format(base64_decode($row['amount']),2). '</td><td>' .date('d-M-Y',($row['date'])). '</td></tr></tbody></table>';   
       }
}
     
?>
