<?php
include_once '../conf.php';
include_once '../froms.php';
include_once '../function.php';

$q = $_GET["q"];
namesearch($q);

function namesearch($m) {
    $chqry = mysql_query('select * from newmember where membernumber="' . base64_encode($m) . '" or firstname LIKE "%' . base64_encode($m) . '%" or middlename LIKE "%' . base64_encode($m) . '%" or lastname LIKE "%' . base64_encode($m) . '%"') or die(mysql_error());
    $qry = mysql_query('select * from memberaccs where mno = "' . base64_encode($m) . '" and status = ("aW5hY3RpdmU=" OR "YWN0aXZl")  ') or die(mysql_error());
    $stl=mysql_query("SELECT * FROM  loanapplication   WHERE  membernumber='".  base64_encode($m)."'  AND   status='".base64_encode('not disbursed')."' ");
     $sth=mysql_query("SELECT * FROM  loanapplication   WHERE  membernumber='".  base64_encode($m)."'  AND   status='".base64_encode('not disbursed')."' ");
    if (mysql_num_rows($chqry) == 1) {
        $row = mysql_fetch_array($chqry);
        echo '<div class="form-group">
        <label>Member Name</label>
        <input class="form-control input-medium" type="text" name="mname" value="' . base64_decode($row['firstname']) . ' ' . base64_decode($row['middlename']) . ' ' . base64_decode($row['lastname']) . ' ' . base64_decode($row['membernumber']) . '" readonly required placeholder="Enter Member Name" title="Enter Member Name"/>
        </div>
         </div>';
      /*  <div class="form-group"><br />
        <label>Select Loan Name</label>
        <select class="form-control input-medium select2me" name ="tname" required data-placeholder="Select Loan Name" title = "Select Loan Name">';
        echo '<option></option>';
       
        while ($row2 = mysql_fetch_array($stl)) {
            
            
           echo '<option value="' . base64_decode($row2['transactionid']) . '">' . (loanname($row2['transactionid'])) . '</option>';
                  
            
        }
        echo'</select>        </div>';
       * 
       */
        if (mysql_num_rows($sth) == 1) {
             $rowd = mysql_fetch_array($sth);
             $appd= date('d-M-Y', base64_decode($rowd['appdate'])) ;
            //return $appd;
             print'<div class="form-group">
<label>Date Of  Applicaton</label>';
    print'<input type="text" id="START_DATE" readonly value="'.$appd.'"placeholder = "Enter Date Of  Disbursement" title = "Enter Date Of  Disbursement" id="dnt" name="" class="form-control input-medium date-picker"   data-date-format="dd-M-yyyy"  required />
</div>';
        }
        else{
            print'no loan';
        }
        
    }
   
}


