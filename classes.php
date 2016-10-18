<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
ob_start();
error_reporting(E_ALL ^ E_NOTICE);
set_time_limit(0);
ini_set('display_errors', '0');
include_once './conf.php';
require_once('registrationform.php');
require_once('registerclass.php');
include_once './froms.php';
include_once './function.php';
include_once './class.amort.php';
include_once './classmort.php';
//include './includetimeout.php';

include_once './navigation/navigations.php';

class User {

    public function balancebf($user, $mno, $shares, $loan, $comments, $tid, $date) {
        $chem = mysql_query('select * from newmember where membernumber="' . base64_encode($mno) . '" and status="' . base64_encode("active") . '"') or die(mysql_error());
        if (mysql_num_rows($chem) == 1) {
            $chshq = mysql_query('select * from sharesbf where memberno="' . base64_encode($mno) . '" and sharesbf="' . base64_encode($shares) . '" and loanbf="' . base64_encode($loan) . '" and date="' . base64_encode(date("d-M-Y")) . '"') or die(mysql_error());
            if (mysql_num_rows($chshq) == 1) {
                echo '<span class="red" >Sorry Compulsory Savings brought forward have already been recorded successfully</span></br>';
            } else {
//if (floatvalidation($shares)) {
                if (floatvalidation($loan)) {
                    mysql_query("BEGIN") or die(mysql_error());


                    $inq = mysql_query('insert into sharesbf values("","' . base64_encode($shares) . '","' . base64_encode($loan) . '","' . base64_encode($mno) . '",
                  "' . base64_encode($comments) . '","' . base64_encode($tid) . '","' . base64_encode("active") . '","' . base64_encode($date) . '")') or die(mysql_error());

                    if ($loan !== '0') {
                        $qry = mysql_query('insert into loanapplication values("","' . base64_encode($mno) . '","' . base64_encode("default") . '","' . base64_encode("default") . '",
                "' . base64_encode("default") . '","' . base64_encode($date) . '","' . base64_encode("default") . '","' . base64_encode("default") . '","' . base64_encode("default") . '","' . base64_encode("default") . '","' . base64_encode($tid) . '","' . base64_encode("pending") . '")') or die(mysql_error());

                        $inqry = mysql_query('insert into loanintrests values("","' . base64_encode($mno) . '","' . base64_encode("default") . '","' . base64_encode("active") . '","' . base64_encode($date) . '","' . base64_encode($tid) . '")') or die(mysql_error());

                        $adloan = mysql_query('insert into loans values("","' . base64_encode($mno) . '","' . base64_encode($loan) . '","' . base64_encode("default") . '","' . base64_encode($date) . '","' . base64_encode("active") . '","' . base64_encode($tid) . '", "")') or die(mysql_error());


                        $gur = mysql_query('insert into guarantors values("' . base64_encode($mno) . '","' . base64_encode($mno) . '","' . base64_encode($loan) . '","' . base64_encode($date) . '","' . base64_encode("self guarantor") . '","","' . base64_encode($tid) . '","' . base64_encode("granted") . '")') or die(mysql_error());
                    }

                    if ($inq) {
                        mysql_query("COMMIT") or die(mysql_error());
                        $users = new Users();
                        $activity = "Added compulsory saving for " . getMembername($mno);
                        $users->audittrail($user, $activity, $user);
                        $alertyes = '<script type="text/javascript">alert("Compulsory Savings have been successfully added!");</script>';
                        echo $alertyes;
                    } else {
                        mysql_query("ROLLBACK") or die(mysql_error());
                        $alertfail = '<script type="text/javascript">alert("Compulsory Savings Brought Forward Failed To add!");</script>';
                        echo $alertfail;
                    }
                } else {
                    $invalid = '<script type="text/javascript">alert("Sorry Loan Entered is not valid!");</script>';
                    echo $invalid;
                }
                /* } else {
                  echo '<span class="red" >Sorry Share Entered not valid</span></br>';
                  } */
            }
        } else {
            $invalidd = '<script type="text/javascript">alert("Sorry Member Number was not found!");</script>';
            echo $invalidd;
        }
    }

    public function membergroup($user, $mno, $gname) {
        $chemeqry = mysql_query('select * from newmember where membernumber="' . base64_encode($mno) . '"') or die(mysql_error());
        if (mysql_num_rows($chemeqry) == 1) {
            $checkqry = mysql_query('select * from groups where memberno="' . base64_encode($mno) . '" and groupid="' . base64_encode($gname) . '" and status="' . base64_encode("active") . '"') or die(mysql_error());
            if (mysql_num_rows($checkqry) == 1) {
                echo '<span class="red" >Sorry ' . getMembername($mno) . ' is already regeistered to ' . groupname($gname) . '</span></br>';
            } else {
                $adqqry = mysql_query('insert into groups values("","' . base64_encode($gname) . '","' . base64_encode($mno) . '","' . base64_encode("active") . '", "' . base64_encode($user) . '", "' . base64_encode(date('d-M-Y')) . '")') or die(mysql_error());
                if ($adqqry) {

                    $getgrpname = groupname($gname);
                    $getgrpgl = getglid($getgrpname);
                    $user = new User;
                    $user->memberaccounts($user, $mno, $getgrpgl, '');
                    $users = new Users();
                    $activity = "Added member  " . getMembername(base64_encode($mno)) . ' to group ' . groupname($gname);
                    $users->audittrail($_SESSION['users'], $activity, $user);
                    $alertyes = '<script type="text/javascript">alert("' . getMembername(base64_encode($mno)) . ' has been registered to ' . groupname($gname) . ' Group successfully");</script>';
                    $alertfail = '<script type="text/javascript">alert("' . getMembername($mno) . ' registration to ' . groupname($gname) . ' failed");</script>';
                    echo $alertyes;
                } else {
                    echo $alertfail;
                }
            }
        } else {
            $invalid = '<script type="text/javascript">alert("Sorry member number not found");</script>';
            echo $invalid;
        }
    }

    public function memberaccounts($user, $mno, $gname, $ona) {

        $random = mt_rand(1000, 9999);
        $two = getglcode($gname) . '' . $random;

        $chemeqry = mysql_query('select * from newmember where membernumber="' . base64_encode($mno) . '"') or die(mysql_error());
        if (mysql_num_rows($chemeqry) == 1) {
            $checkqry = mysql_query('select * from memberaccs where mno="' . base64_encode($mno) . '" and glaccid="' . base64_encode($gname) . '"') or die(mysql_error());
            if (mysql_num_rows($checkqry) == 1) {
                if ($ona == 'one') {
                    echo '<span class="red" >' . getMembername(base64_encode($mno)) . ' already has an ' . getglacc($gname) . ' Account.</span></br>';
                }
            } else {
                $adqqry = mysql_query('insert into memberaccs values("","' . base64_encode($mno) . '","' . base64_encode($two) . '","' . base64_encode($gname) . '","' . base64_encode("active") . '", "' . base64_encode($user) . '", "' . base64_encode(date('d-M-Y')) . '")') or die(mysql_error());
                if ($adqqry) {
                    $users = new Users();
                    $activity = "created account " . getglacc($gname) . ' for ' . getMembername(base64_encode($mno));
                    $users->audittrail($_SESSION['users'], $activity, $user);
                    $alertyes = '<script type="text/javascript">alert("' . getglacc($gname) . ' Account successfully created for ' . getMembername(base64_encode($mno)) . '");</script>';
                    echo $alertyes;
                } else {
                    $alertfail = '<script type="text/javascript">alert("' . getglacc($gname) . ' Account Creation failed");</script>';
                    echo $alertfail;
                }
            }
        } else {
            $alert = '<script type="text/javascript">alert("Sorry member number not found!");</script>';
            echo $alert;
        }
    }

    public function assetdepreciation() {
        $current_year = date('Y');
        $execute_date = "31-12-" . $current_year;
        $today = date('d-m-Y');
        $getasset = mysql_query('SELECT * FROM fixed_assets');
        while ($rowd = mysql_fetch_array($getasset)) {

            if (base64_decode($rowd['dep_type']) == "straight" && $execute_date == $today) {
                //straight line
                $asset_value = base64_decode($rowd['asset_value']);
                $salvage_value = base64_decode($rowd['salvage_value']);
                $life_time = base64_decode($rowd['useful_life']);
                $date = base64_decode($rowd['purchase_date']);
                $dater = date('d-m-Y', strtotime($date));
                list($day, $themonth, $yearh) = explode('-', $dater);
                $qry = mysql_query("SELECT * FROM depreciation WHERE asset_id='" . base64_encode($rowd['id']) . "' ORDER BY id DESC");
                if (mysql_num_rows($qry) > 0) {
                    $row = mysql_fetch_array($qry);
                    $current_val = base64_decode($row['current_value']);
                    $yealold = base64_decode($row['year']);
                    $finalyear = $yearh + $life_time;

                    if ($finalyear > $yealold) {
                        $yeared = ++$yealold;

                        $dep_annum = (($current_val - $salvage_value) / $life_time);
                        $bookvalue = $current_val - $dep_annum;
                        $poster = mysql_query("insert into depreciation(asset_id,year,depreciation,current_value) values('" . base64_encode($rowd['id']) . "','" . base64_encode($yeared) . "','" . base64_encode(round($dep_annum, 2)) . "','" . base64_encode(round($bookvalue, 2)) . "') ");
                        if ($poster) {

                            /// echo'dep';
                        }
                    } else {
                        // dispose asset
                    }
                } else {
                    //call first year 

                    $begin = new DateTime($dater);
                    $yea = date('Y');
                    $theEnd = "31-12-" . $yea;
                    $end = new DateTime($theEnd);
                    $nday = 0;


                    $interval = DateInterval::createFromDateString('1 month');
                    $period = new DatePeriod($begin, $interval, $end);
                    foreach ($period as $kye => $dt) {
                        $datr = $dt->format("d-m-Y");
                        list($day, $themont, $yeared) = explode('-', $datr);
                        $d = cal_days_in_month(CAL_GREGORIAN, $themont, $yeared);
                        $nday +=$d;
                    }
                    //$nday;
                    $dep_annum = (($asset_value - $salvage_value) / $life_time);
                    $dep_first = (($dep_annum / 365) * $nday);
                    $bookvalue = $asset_value - $dep_first;
                    $poster = mysql_query("INSERT INTO depreciation(asset_id,year,depreciation,current_value) values('" . base64_encode($rowd['id']) . "','" . base64_encode($yeared) . "','" . base64_encode(round($dep_first, 2)) . "','" . base64_encode(round($bookvalue, 2)) . "') ");
                    if ($poster) {
                        
                    }
                }
            } else if (base64_decode($rowd['dep_type']) == "reducing" && $execute_date == $today) {

                //reducing balance
                $asseted_value = base64_decode($rowd['asset_value']);
                $dep_rate = base64_decode($rowd['dep_rate']);
                $life_time = base64_decode($rowd['useful_life']);
                $date = base64_decode($rowd['purchase_date']);
                $dated = date('d-m-Y', strtotime($date));
                list($day, $themonth, $yearstart) = explode('-', $dated);
                $qry = mysql_query("SELECT * FROM depreciation WHERE asset_id='" . base64_encode($rowd['id']) . "' ORDER BY id DESC");
                if (mysql_num_rows($qry) > 0) {
                    $row = mysql_fetch_array($qry);
                    $current_val = base64_decode($row['current_value']);
                    $yealold = base64_decode($row['year']);
                    $finalyear = $yearstart + $life_time;

                    if ($finalyear > $yealold) {
                        $yeared = ++$yealold;

                        $derpce = ($current_val * $dep_rate / 100);
                        $new_value = $current_val - $derpce;

                        $poster = mysql_query("insert into depreciation(asset_id,year,depreciation,current_value) values('" . base64_encode($rowd['id']) . "','" . base64_encode($yeared) . "','" . base64_encode(round($derpce, 2)) . "','" . base64_encode(round($new_value, 2)) . "') ");
                        if ($poster) {

                            //asset depreciated
                        }
                    } else {
                        // dispose. useful life over
                    }
                } else {
                    $derpce = ($asseted_value * $dep_rate / 100);
                    $new_value = $asseted_value - $derpce;
                    $poster = mysql_query("insert into depreciation(asset_id,year,depreciation,current_value) values('" . base64_encode($rowd['id']) . "','" . base64_encode($yearstart) . "','" . base64_encode(round($derpce, 2)) . "','" . base64_encode(round($new_value, 2)) . "') ");
                    if ($poster) {
                        
                    }
                }
            }
        }
    }
    
    public function loanpayupload($memberno, $paidby, $loantype, $amount, $session, $datefrom, $dateto, $date, $bankid, $paymentype){
        //ensure no field is blank
        if(!empty($memberno) && !empty($paidby) && !empty($loantype) && !empty($amount) && !empty($date) && !empty($bankid)){//no blank field
                       
            if(memberactive($memberno) === 1){//member not withdrawn
                $transactionid = loantid($memberno, $loantype);
                if(strlen($transactionid) > 1){
                    //insert into loan payments
                    $insert = mysql_query("insert into loanpayment(id,payee,payeeid,transid,mno,amount,session,date,bnkid) values('', '" . base64_encode($paidby) . "','" . base64_encode($memberno) . "','" . $transactionid . "','" . base64_encode($memberno) . "', '".base64_encode($amount)."', '".$session."', '".base64_encode($date)."', '".base64_encode($bankid)."') ") or die(mysql_error());
                    $mem = mysql_query("insert into membercontribution(paymenttype,memberno,payee,payeeid,transaction,amount,vehicleregno,datefrom,dateto,date,primarykey,session,transid,bnkid)"
                            . " values('" . base64_encode($paymentype) . "','" . base64_encode($memberno) . "','" . base64_encode($paidby) . "','" . base64_encode($memberno) . "', '".base64_encode($loantype)."', '".base64_encode($amount)."', '', '".base64_encode($datefrom)."', '".base64_encode($dateto)."', '".base64_encode($date)."', '', '".$session."', '".$transactionid."', '".$bankid."') ") or die(mysql_error());
                    if($insert){
                        if($mem){
                            //check if loan payment is complete
                            loanpayupdate($memberno, $transactionid, $loantype);
                            $alert = '<script type="text/javascript">alert("Upload Successful"); window.location.href="loandetailsupload.php";</script>';
                            echo $alert;
                        }
                        else{
                            $alert = '<script type="text/javascript">alert("Failed to add contribution"); window.location.href="loandetailsupload.php";</script>';
                            echo $alert;
                        }
                    }
                    else{
                        $alert = '<script type="text/javascript">alert("Upload Failed!"); window.location.href="loandetailsupload.php";</script>';
                        echo $alert;
                    }
                }
                else{
                    $alert = '<script type="text/javascript">alert("Failed. The member has not applied for that loan type"); window.location.href="loandetailsupload.php";</script>';
                    echo $alert;
                }
            } else{
                $alert = '<script type="text/javascript">alert("Failed. The member is withdrawn"); window.location.href="loandetailsupload.php";</script>';
                    echo $alert;
            }            
        }
    }
    
    public function loaninterestupload($amount, $paymentmode, $approvedby, $status, $paidby, $memberno, $comments, $date, $bnkid, $session, $loantype){
        //blank fields not allowed
        if(!empty($memberno) && !empty($amount) && !empty($paymentmode) && !empty($approvedby) && !empty($paidby)){
            if(memberactive($memberno) === 1){//withdrawn members cannot contribute
                $transactionid = loantid($memberno, $loantype);
                
                if(strlen($transactionid) > 1){
                    $insert = mysql_query("insert into paymentin(transname,transid, amount,paymentype,approvedby, status,paidby,payeeid,comments,date,bnkid,primarykey,session)"
                            . " values('". base64_encode('125')."', '" . $transactionid . "','" . base64_encode($amount) . "','" . base64_encode($paymentmode) . "','" . base64_encode($approvedby) . "', '" . $status . "', '" . base64_encode($paidby) . "', '".base64_encode($memberno)."','" . base64_encode($comments) . "', '" . base64_encode($date) . "', '" . base64_encode($bnkid) . "', '', '" . $session . "') ") or die(mysql_error());

                    if($insert){
                        $alert = '<script type="text/javascript">alert("Upload Successful"); window.location.href="loandetailsupload.php";</script>';
                        echo $alert;
                    }
                    else{
                        $alert = '<script type="text/javascript">alert("Upload Failed!"); window.location.href="loandetailsupload.php";</script>';
                        echo $alert;
                    }
                }
                else{
                    $alert = '<script type="text/javascript">alert("Failed. The member has not applied for that loan type"); window.location.href="loandetailsupload.php";</script>';
                echo $alert;
                }
            }
            else{
                $alert = '<script type="text/javascript">alert("Failed. The member is withdrawn"); window.location.href="loandetailsupload.php";</script>';
                echo $alert;
            }
        }
            else{
                $alert = '<script type="text/javascript">alert("Upload failed! Ensure there are no blank fields in the file"); window.location.href="loandetailsupload.php";</script>';
                echo $alert;
            }
        
    }

    public function membercontribution($user, $mno, $vreg, $payeeid, $payee, $tname, $ptype, $amount, $dfrom, $dto, $dates, $session, $tid, $submit, $bnkid) {
        if(memberactive($mno) === 1){//if member is not withdrawn, process
            $fixed = getFixedDetail(base64_encode($tname));

            $date = date("d-M-Y", strtotime($dates));
            $this->_user = $user;
            $this->_mno = $mno;
            if ($mno == "") {
                echo '<span class="red" >Sorry Member number cannot be blank</span></br>';
            } else {
                if ($payeeid == "") {
                    echo '<span class="red" >Please fill in payee id</span></br>';
                } else {
                    if ($payee == "") {
                        echo '<span class="red" >Please fill in payee name</span></br>';
                    } else {
                        if (namevalidation($payee)) {
                            if ($tname == "") {
                                echo '<span class="red" >Please select an account</span></br>';
                            } else {
                                if ($ptype == "") {
                                    echo '<span class="red" >Please select payment method</span></br>';
                                } else {
                                    if ($amount == "") {
                                        echo '<span class="red" >Amount cannot be blank</span></br>';
                                    } else {
                                        if (($amount >= 0)) {
                                            if ($dfrom == "") {
                                                echo '<span class="red" >Please fill in Date From</span></br>';
                                            } else {
                                                if ($dto == "") {
                                                    echo '<span class="red" >Please fill in Date To</span></br>';
                                                } else {
                                                    $fme = mysql_query('select * from newmember where membernumber="' . base64_encode($mno) . '"') or die(mysql_error());
                                                    if (mysql_num_rows($fme) >= 1) {
                                                        $cchcoqry = mysql_query('select * from membercontribution where paymenttype="' . base64_encode($ptype) . '" and memberno="' . base64_encode($mno) . '"
                 and payee="' . base64_encode($payee) . '" and payeeid="' . base64_encode($payeeid) . '" and transaction="' . base64_encode($tname) . '" and
                     amount="' . base64_encode($amount) . '" and vehicleregno="' . base64_encode($vreg) . '" and datefrom="' . base64_encode($dfrom) . '" and dateto="' . base64_encode($dto) . '" and transid="' . base64_encode($tid) . '" and  bnkid="' . base64_encode($bnkid) . '" ') or die(mysql_error());
                                                        if (mysql_num_rows($cchcoqry) >= 1) {
                                                            echo '<span class="red" >Sorry it seems you have just processed a similar transation</span></br>';
                                                        } else {
    //check if selcted account is fixed deposit account
                                                            if ($tname == base64_decode($fixed['gl_account'])) {
                                                                //check if amount entered is less thn min
                                                                if ($amount < base64_decode($fixed['min_account_balance'])) {
                                                                    $alert = '<script type="text/javascript">alert("Sorry, Contribution is less than Minimum Amount Allowed!");</script>';
                                                                    echo $alert;
                                                                } else if ($amount > base64_decode($fixed['max_account_balance'])) {
                                                                    $alert = '<script type="text/javascript">alert("Sorry, Contribution Exceeds The Maxmum Amount Allowed!");</script>';
                                                                    echo $alert;
                                                                } else {
                                                                    //check if member have ever contributed to fixed deposit account
                                                                    $qrys = mysql_query('select * from membercontribution where  memberno="' . base64_encode($mno) . '" and  transaction="' . base64_encode($tname) . '" ') or die(mysql_error());
                                                                    if (mysql_num_rows($qrys) >= 1) {
                                                                        $cmqry = mysql_query('insert into membercontribution values("' . base64_encode($ptype) . '","' . base64_encode($mno) . '",
                "' . base64_encode($payee) . '","' . base64_encode($payeeid) . '","' . base64_encode($tname) . '","' . base64_encode($amount) . '",
                    "' . base64_encode($vreg) . '","' . base64_encode($dfrom) . '","' . base64_encode($dto) . '","' . base64_encode($date) . '","","' . $session . '", "' . base64_encode($tid) . '","' . base64_encode($bnkid) . '")') or die(mysql_error());
                                                                        $prim_Kye = mysql_insert_id();
                                                                        if ($cmqry) {

                                                                            $users = new Users();
                                                                            $activity = "Added a " . $tname . " contribution of amount " . ($amount) . 'for' . getMembername(base64_encode($mno));
                                                                            $users->audittrail($user, $activity, $mno);
                                                                            $alert = '<script type="text/javascript">alert("Contribution Added Successfully!"); window.location.href="contribution.php";</script>';
                                                                            echo $alert;
                                                                        }
                                                                        //print receipt
                                                                        if ($submit == "2") {
                                                                            contributionreceipt($this->_user, $prim_Kye, $mno, $vreg, $tid, $payeeid, $payee, $tname, $ptype, $amount, $dfrom, $dto, $_SESSION['session'], $date);

                                                                        } elseif ($submit == "3") {
                                                                            updateMi();
                                                                            $alert = '<script type="text/javascript">alert("Contribution Added Successfully!"); window.location.href="contribution.php";</script>';
                                                                            echo $alert;
                                                                        } else {
                                                                            $alert = '<script type="text/javascript">alert("Contribution Added Successfully!"); window.location.href="contribution.php";</script>';
                                                                            echo $alert;
                                                                        }
                                                                    } else {
                                                                        //member first time to contribute to fixed deposit account.Deduct entry fee and post in as fee to company

                                                                        if (base64_decode($fixed['entry_fee']) != 0 && $amount >= base64_decode($fixed['entry_fee'])) {

                                                                            //if entry fee is not equal to zero.Check if member have ever paid enrty fee
                                                                            $cheker = mysql_query('SELECT * FROM paymentin WHERE transname="' . $fixed['entry_fee'] . '" AND  payeeid="' . base64_encode($mno) . '"');
                                                                            if (mysql_num_rows($cheker) >= 1) {
                                                                                //memeber has already contributed reg fee
                                                                            } else {

                                                                                $entryFee = base64_decode($fixed['entry_fee']);
                                                                                $lipa = mysql_query('insert into paymentin values("' . $fixed['accountfee_gl_id'] . '","","' . $fixed['entry_fee'] . '" ,"' . base64_encode($ptype) . '","' . base64_encode('sacco officials') . '","' . base64_encode('active') . '","' . base64_encode(getMembername(base64_encode($mno))) . '",
                          "' . base64_encode($mno) . '","' . base64_encode($vreg) . '","' . base64_encode($date) . '", "' . base64_encode($bnkid) . '", "","' . $session . '")') or die(mysql_error());

                                                                                if ($lipa) {
                                                                                    $paidmony = $amount;
                                                                                    //after deducting entry fee.Contribute the rem amount
                                                                                    $remAmount = $paidmony - base64_decode($fixed['entry_fee']);
                                                                                    $cmqry = mysql_query('insert into membercontribution values("' . base64_encode($ptype) . '","' . base64_encode($mno) . '",
                "' . base64_encode($payee) . '","' . base64_encode($payeeid) . '","' . base64_encode($tname) . '","' . base64_encode($remAmount) . '",
                    "' . base64_encode($vreg) . '","' . base64_encode($dfrom) . '","' . base64_encode($dto) . '","' . base64_encode($date) . '","","' . $session . '", "' . base64_encode($tid) . '","' . base64_encode($bnkid) . '")') or die(mysql_error());
                                                                                    $prim_Kye = mysql_insert_id();
                                                                                    if ($cmqry) {
                                                                                        $users = new Users();
                                                                                        $activity = "Added a " . $tname . " contribution of amount " . ($remAmount) . 'for' . getMembername(base64_encode($mno));
                                                                                        $users->audittrail($user, $activity, $mno);
                                                                                        $alert = '<script type="text/javascript">alert("Contribution Added Successfully!");</script>';
                                                                                        echo $alert;
                                                                                    }

                                                                                    //print receipt
                                                                                    if ($submit == "2") {
                                                                                        contributionreceipt($this->_user, $prim_Kye, $mno, $vreg, $tid, $payeeid, $payee, $tname, $ptype, $paidmony, $dfrom, $dto, $_SESSION['session'], $date);
                                                                                    } elseif ($submit == "3") {
                                                                                        updateMi();
                                                                                        $alert = '<script type="text/javascript">alert("Contribution Added Successfully!"); window.location.href="contribution.php";</script>';
                                                                                        echo $alert;
                                                                                    } else {
                                                                                        $alert = '<script type="text/javascript">alert("Contribution Added Successfully!"); window.location.href="contribution.php";</script>';
                                                                                        echo $alert;
                                                                                    }
                                                                                }
                                                                            }
                                                                        } else {

                                                                            //contribute without deduction of entry fee
                                                                            $cmqry = mysql_query('insert into membercontribution values("' . base64_encode($ptype) . '","' . base64_encode($mno) . '",
                "' . base64_encode($payee) . '","' . base64_encode($payeeid) . '","' . base64_encode($tname) . '","' . base64_encode($amount) . '",
                    "' . base64_encode($vreg) . '","' . base64_encode($dfrom) . '","' . base64_encode($dto) . '","' . base64_encode($date) . '","","' . $session . '", "' . base64_encode($tid) . '","' . base64_encode($bnkid) . '")') or die(mysql_error());
                                                                            $prim_Kye = mysql_insert_id();
                                                                            if ($cmqry) {
                                                                                $users = new Users();
                                                                                $activity = "Added a " . $tname . " contribution of amount " . ($amount) . 'for' . getMembername(base64_encode($mno));
                                                                                $users->audittrail($user, $activity, $mno);
                                                                                $alert = '<script type="text/javascript">alert("Contribution Added Successfully!");</script>';
                                                                                echo $alert;
                                                                            }
                                                                            //print receipt
                                                                            if ($submit == "2") {
                                                                                contributionreceipt($this->_user, $prim_Kye, $mno, $vreg, $tid, $payeeid, $payee, $tname, $ptype, $amount, $dfrom, $dto, $_SESSION['session'], $date);
                                                                            } elseif ($submit == "3") {
                                                                                updateMi();
                                                                                $alert = '<script type="text/javascript">alert("Contribution Added Successfully!"); window.location.href="contribution.php";</script>';
                                                                                echo $alert;
                                                                            } else {
                                                                                $alert = '<script type="text/javascript">alert("Contribution Added Successfully!"); window.location.href="contribution.php";</script>';
                                                                                echo $alert;
                                                                            }
                                                                        }
                                                                    }//close amount check
                                                                }
                                                            } elseif (getglcombi($tname) != '1') {
                                                                //other gl accounts contribution method

                                                                $cmqry = mysql_query('insert into membercontribution values("' . base64_encode($ptype) . '","' . base64_encode($this->_mno) . '",
                "' . base64_encode($payee) . '","' . base64_encode($payeeid) . '","' . base64_encode($tname) . '","' . base64_encode($amount) . '",
                    "' . base64_encode($vreg) . '","' . base64_encode($dfrom) . '","' . base64_encode($dto) . '","' . base64_encode($date) . '","","' . $session . '", "' . base64_encode($tid) . '","' . base64_encode($bnkid) . '")') or die(mysql_error());
                                                                $prim_Kye = mysql_insert_id();
                                                                if ($cmqry) {
                                                                    $users = new Users();
                                                                    $activity = "Added a " . $tname . " contribution of amount " . ($amount) . 'for' . base64_encode($mno);

                                                                    
                                                                }

                                                                if ($submit == "2") {
                                                                    $alert = '<script type="text/javascript">alert("Contribution Added Successfully!");</script>';
                                                                    echo $alert;
                                                                    contributionreceipt($this->_user, $prim_Kye, $mno, $vreg, $tid, $payeeid, $payee, $tname, $ptype, $amount, $dfrom, $dto, $_SESSION['session'], $date);
                                                                } elseif ($submit == "3") {                                                                    
                                                                    updateMi();
                                                                    $alert = '<script type="text/javascript">alert("Contribution Added Successfully!"); window.location.href="contribution.php";</script>';
                                                                    echo $alert;
                                                                } else {
                                                                    $alert = '<script type="text/javascript">alert("Contribution Added Successfully!"); window.location.href="contribution.php";</script>';
                                                                    echo $alert;
                                                                }
                                                            } else {


                                                                $acnaqr = mysql_query('select * from loansettings where lname="' . base64_encode(getglacc($tname)) . '" and status="' . base64_encode("Active") . '"') or die(mysql_error());
                                                                while ($lrslt = mysql_fetch_array($acnaqr)) {

                                                                    /* $sth=mysql_query("SELECT * FROM  loanapplication where membernumber='" . base64_encode($mno) . "' AND loantype='".$lrslt['id']."'  AND status='".  base64_encode('pending')."'  ");
                                                                      if(mysql_num_rows($sth >=1 )){ */
                                                                    if ($lrslt['ratetype'] == base64_encode('1')) {

                                                                        $loanamt = loanamt(loantid($mno, getloanid(getglacc($tname))));
                                                                    } else {

                                                                        $loanamt = principlepaid(loantid($mno, getloanid(getglacc($tname))));
                                                                    }
                                                                    //check if loan is time based 
                                                                    $loanintrest = loaninterestratetype($lrslt['id']);
                                                                    if (($loanintrest) == ('timed')) {
                                                                        $rate = (loanrate($lrslt['id']) / 100) / 12;
                                                                        $intrest = ceil($rate * $loanamt);
                                                                        $ttid = loantid($mno, getloanid(getglacc($tname)));
                                                                        // function to return x value where x is no of days
                                                                        //between today and date ought to have been paid
                                                                        $dateoughttopay = datetopay($ttid);
                                                                        $paiddate = strtotime($date);  // the day member come to pay the loan

                                                                        if ($paiddate == $dateoughttopay) {

                                                                            $intrst = ($intrest);
                                                                        } else if ($paiddate > $dateoughttopay) {

                                                                            $days = (($dateoughttopay - $paiddate) / 86400);   //dividing with 86400 to convert to days                                                                    
                                                                            $intrst = ceil($intrest + ($days / 30) * $intrest);
                                                                        } else {

                                                                            $days = (($paiddate - $dateoughttopay) / 86400);   //dividing with 86400 to convert to days                                                                    
                                                                            $intrst = ceil($intrest + ($days / 30) * $intrest);
                                                                        }

                                                                        //dont use time baesd transaction
                                                                    } else {
                                                                        $rate = (loanrate($lrslt['id']) / 100) / 12;
                                                                        $intrstx = $rate * $loanamt;
                                                                        $intrst = ceil($intrstx);
                                                                    }

                                                                    if ($paiddate > $dateoughttopay) {

                                                                        $rate2 = (loanfinerate($lrslt['id']) / 100) / 12;
                                                                        $fine = $rate2 * $loanamt;
                                                                        $newfine = floor($fine);
                                                                        $newuser = new User();
                                                                        $newuser->addextracash($user, $mno, loantid($mno, getloanid(getglacc($tname))), loanid(loantid($mno, getloanid(getglacc($tname)))), '144', $newfine);
                                                                    }


                                                                    $extrafee = getextrafee(loantid($mno, getloanid(getglacc($tname))));
                                                                    $addextrafeepaid = addextrafeepaid(loantid($mno, getloanid(getglacc($tname))));

                                                                    if ($lrslt['ratetype'] == base64_encode('2')) {

                                                                        addchargedinterest(loantid($mno, getloanid(getglacc($tname))), $intrst, $mno, $date);


                                                                        if ($extrafee > $addextrafeepaid) {

                                                                            $newextrabal = $extrafee - $addextrafeepaid;

                                                                            if ($amount < $newextrabal) {

                                                                                if ($amount > 0) {
                                                                                    mysql_query('insert into paymentin values("' . base64_encode('144') . '","' . loantid($mno, getloanid(getglacc($tname))) . '","' . base64_encode(round($amount)) . '"
                          ,"' . base64_encode($ptype) . '","' . base64_encode('sacco officials') . '","' . base64_encode('active') . '","' . base64_encode(getMembername(base64_encode($mno))) . '",
                          "' . base64_encode($mno) . '","' . base64_encode($vreg) . '","' . base64_encode($date) . '", "' . base64_encode($bnkid) . '","","' . $session . '")') or die(mysql_error());
                                                                                }
                                                                            } else {

                                                                                $newamount2 = $amount - $newextrabal;

                                                                                if ($newextrabal > 0) {
                                                                                    mysql_query('insert into paymentin values("' . base64_encode('144') . '","' . loantid($mno, getloanid(getglacc($tname))) . '","' . base64_encode(round($newextrabal)) . '"
                          ,"' . base64_encode($ptype) . '","' . base64_encode('sacco officials') . '","' . base64_encode('active') . '","' . base64_encode(getMembername(base64_encode($mno))) . '",
                          "' . base64_encode($mno) . '","' . base64_encode($vreg) . '","' . base64_encode($date) . '", "' . base64_encode($bnkid) . '","","' . $session . '")') or die(mysql_error());
                                                                                }

                                                                                if ($newamount2 > $intrst) {

                                                                                    $newamt = $newamount2 - $intrst;

                                                                                    if ($newamt >= 0) {

                                                                                        mysql_query('insert into loanpayment values("","' . base64_encode($payee) . '","' . base64_encode($payeeid) . '","' . loantid($mno, getloanid(getglacc($tname))) . '","' . base64_encode($mno) . '","' . base64_encode(round($newamt)) . '","' . $session . '","' . base64_encode($date) . '","' . base64_encode($bnkid) . '")') or die(mysql_error());
                                                                                    }

                                                                                    if ($newamount2 >= 0) {

                                                                                        $cmqry = mysql_query('insert into membercontribution values("' . base64_encode($ptype) . '","' . base64_encode($this->_mno) . '",
                "' . base64_encode($payee) . '","' . base64_encode($payeeid) . '","' . base64_encode($tname) . '","' . base64_encode($newamount2) . '",
                    "' . base64_encode($vreg) . '","' . base64_encode($dfrom) . '","' . base64_encode($dto) . '","' . base64_encode($date) . '","","' . $session . '", "' . loantid($mno, getloanid(getglacc($tname))) . '","' . base64_encode($bnkid) . '")') or die(mysql_error());
                                                                                        $prim_Kye = mysql_insert_id();
                                                                                    }

                                                                                    if ($intrst >= 0) {
                                                                                        mysql_query('insert into paymentin values("' . base64_encode('125') . '","' . loantid($mno, getloanid(getglacc($tname))) . '","' . base64_encode(round($intrst)) . '"
                          ,"' . base64_encode($ptype) . '","' . base64_encode('sacco officials') . '","' . base64_encode('active') . '","' . base64_encode(getMembername(base64_encode($mno))) . '",
                          "' . base64_encode($mno) . '","' . base64_encode($vreg) . '","' . base64_encode($date) . '", "' . base64_encode($bnkid) . '", "","' . $session . '")') or die(mysql_error());
                                                                                    }
                                                                                } else {

                                                                                    if ($newamount2 >= 0) {
                                                                                        mysql_query('insert into paymentin values("' . base64_encode('125') . '","' . loantid($mno, getloanid(getglacc($tname))) . '","' . base64_encode(round($newamount2)) . '"
                          ,"' . base64_encode($ptype) . '","' . base64_encode('sacco officials') . '","' . base64_encode('active') . '","' . base64_encode(getMembername(base64_encode($mno))) . '",
                          "' . base64_encode($mno) . '","' . base64_encode($vreg) . '","' . base64_encode($date) . '", "' . base64_encode($bnkid) . '","","' . $session . '")') or die(mysql_error());
                                                                                    }

                                                                                    if ($newamount2 >= 0) {

                                                                                        $cmqry = mysql_query('insert into membercontribution values("' . base64_encode($ptype) . '","' . base64_encode($this->_mno) . '",
                "' . base64_encode($payee) . '","' . base64_encode($payeeid) . '","' . base64_encode($tname) . '","' . base64_encode($newamount2) . '",
                    "' . base64_encode($vreg) . '","' . base64_encode($dfrom) . '","' . base64_encode($dto) . '","' . base64_encode($date) . '","","' . $session . '", "' . loantid($mno, getloanid(getglacc($tname))) . '","' . base64_encode($bnkid) . '")') or die(mysql_error());
                                                                                        $prim_Kye = mysql_insert_id();
                                                                                    }
                                                                                }
                                                                            }
                                                                        } elseif ($amount > $intrst) {

                                                                            $newamt = $amount - $intrst;

                                                                            if ($newamt >= 0) {

                                                                                mysql_query('insert into loanpayment values("","' . base64_encode($payee) . '","' . base64_encode($payeeid) . '","' . loantid($mno, getloanid(getglacc($tname))) . '","' . base64_encode($mno) . '","' . base64_encode(round($newamt)) . '","' . $session . '","' . base64_encode($date) . '","' . base64_encode($bnkid) . '")') or die(mysql_error());
                                                                            }

                                                                            if ($amount >= 0) {

                                                                                $cmqry = mysql_query('insert into membercontribution values("' . base64_encode($ptype) . '","' . base64_encode($this->_mno) . '",
                "' . base64_encode($payee) . '","' . base64_encode($payeeid) . '","' . base64_encode($tname) . '","' . base64_encode($amount) . '",
                    "' . base64_encode($vreg) . '","' . base64_encode($dfrom) . '","' . base64_encode($dto) . '","' . base64_encode($date) . '","","' . $session . '", "' . loantid($mno, getloanid(getglacc($tname))) . '","' . base64_encode($bnkid) . '")') or die(mysql_error());
                                                                                $prim_Kye = mysql_insert_id();
                                                                            }

                                                                            if ($intrst >= 0) {
                                                                                mysql_query('insert into paymentin values("' . base64_encode('125') . '","' . loantid($mno, getloanid(getglacc($tname))) . '","' . base64_encode(round($intrst)) . '"
                          ,"' . base64_encode($ptype) . '","' . base64_encode('sacco officials') . '","' . base64_encode('active') . '","' . base64_encode(getMembername(base64_encode($mno))) . '",
                          "' . base64_encode($mno) . '","' . base64_encode($vreg) . '","' . base64_encode($date) . '", "' . base64_encode($bnkid) . '", "","' . $session . '")') or die(mysql_error());
                                                                            }
                                                                        } else {

                                                                            if ($amount >= 0) {
                                                                                mysql_query('insert into paymentin values("' . base64_encode('125') . '","' . loantid($mno, getloanid(getglacc($tname))) . '","' . base64_encode(round($amount)) . '"
                          ,"' . base64_encode($ptype) . '","' . base64_encode('sacco officials') . '","' . base64_encode('active') . '","' . base64_encode(getMembername(base64_encode($mno))) . '",
                          "' . base64_encode($mno) . '","' . base64_encode($vreg) . '","' . base64_encode($date) . '", "' . base64_encode($bnkid) . '","","' . $session . '")') or die(mysql_error());
                                                                            }

                                                                            if ($amount >= 0) {

                                                                                $cmqry = mysql_query('insert into membercontribution values("' . base64_encode($ptype) . '","' . base64_encode($this->_mno) . '",
                "' . base64_encode($payee) . '","' . base64_encode($payeeid) . '","' . base64_encode($tname) . '","' . base64_encode($amount) . '",
                    "' . base64_encode($vreg) . '","' . base64_encode($dfrom) . '","' . base64_encode($dto) . '","' . base64_encode($date) . '","","' . $session . '", "' . loantid($mno, getloanid(getglacc($tname))) . '","' . base64_encode($bnkid) . '")') or die(mysql_error());
                                                                                $prim_Kye = mysql_insert_id();
                                                                            }
                                                                        }
                                                                    } elseif ($lrslt['ratetype'] == base64_encode('4')) {

                                                                        $tid = loantid($mno, getloanid(getglacc($tname)));
                                                                        $loanAmount = principalamount($tid); //applied amount
                                                                        $loanAmountPaid = loanRepaymentPrincipal($tid); ////loan balance
                                                                        $amountPaidBal = $loanAmount - $loanAmountPaid;
                                                                        $totalIntCharged = totalloanint($tid);
                                                                        $dateOfDisbusment = dateOfDbrs($tid);
                                                                        $getGracePeriod = getGracePeriod($tid);
                                                                        $fDate = strtotime($dateOfDisbusment) + ($getGracePeriod * 86400);
                                                                        $date = strtotime($date);

                                                                        $firstDayOfPayment = date('d-M-Y', ($fDate));
                                                                        $date2pay = strtotime($firstDayOfPayment);
                                                                        $day = '86400';

                                                                        $rate = (loanrate($lrslt['id']) / 100) / 12;


                                                                        if ($date < $date2pay) {
                                                                            $days = ( $date2pay - $date) / $day;
                                                                            $weeks = floor($days / 7);

                                                                            if ($weeks >= 4) {
                                                                                $intrestAmt = 1 * (5 / 100);
                                                                                $int = $amountPaidBal * $intrestAmt;
                                                                            } else {

                                                                                $intrestAmt = $weeks * (5 / 100);
                                                                                $newInt = $amountPaidBal * $intrestAmt;

                                                                                $int = $totalIntCharged - $newInt;     /////interst charged
                                                                            }
                                                                        } else {
                                                                            $days = ( $date - $date2pay) / $day;

                                                                            if ($days == 0) {

                                                                                $intrestAmt = 4 * (5 / 100);
                                                                            } else {
                                                                               $weeks = floor($days / 7);


                                                                                $intrestAmt = $weeks * (5 / 100);
                                                                            }
                                                                              $int = $amountPaidBal * $intrestAmt;
                                                                        }

                                                                       $totalLoanBal = $amountPaidBal + $int;

                                                                        //////////changes of payments////////////

                                                                        if ($amount >= $totalLoanBal) {

                                                                            $newAmount = $totalLoanBal - $int;
                                                                            //memeber conteribution
                                                                            $cmqry = mysql_query('insert into membercontribution values("' . base64_encode($ptype) . '","' . base64_encode($this->_mno) . '",
                "' . base64_encode($payee) . '","' . base64_encode($payeeid) . '","' . base64_encode($tname) . '","' . base64_encode($totalLoanBal) . '",
                    "' . base64_encode($vreg) . '","' . base64_encode($dfrom) . '","' . base64_encode($dto) . '","' . base64_encode($date) . '","","' . $session . '", "' . loantid($mno, getloanid(getglacc($tname))) . '","' . base64_encode($bnkid) . '")') or die(mysql_error());
                                                                            $prim_Kye = mysql_insert_id();
                                                                            //loan repayment
                                                                            mysql_query('insert into loanpayment values("","' . base64_encode($payee) . '","' . base64_encode($payeeid) . '","' . loantid($mno, getloanid(getglacc($tname))) . '","' . base64_encode($mno) . '","' . base64_encode(round($newAmount)) . '","' . $session . '","' . base64_encode($date) . '","' . base64_encode($bnkid) . '")') or die(mysql_error());
                                                                            //intrest
                                                                            mysql_query('insert into paymentin values("' . base64_encode('144') . '","' . loantid($mno, getloanid(getglacc($tname))) . '","' . base64_encode(round($int)) . '"
                          ,"' . base64_encode($ptype) . '","' . base64_encode('sacco officials') . '","' . base64_encode('active') . '","' . base64_encode(getMembername(base64_encode($mno))) . '",
                          "' . base64_encode($mno) . '","' . base64_encode($vreg) . '","' . base64_encode($date) . '", "' . base64_encode($bnkid) . '","","' . $session . '")') or die(mysql_error());
                                                                        } else {

                                                                            $newAmount = $amount - $int;



                                                                            //memeber conteribution
                                                                            $cmqry = mysql_query('insert into membercontribution values("' . base64_encode($ptype) . '","' . base64_encode($this->_mno) . '",
                "' . base64_encode($payee) . '","' . base64_encode($payeeid) . '","' . base64_encode($tname) . '","' . base64_encode($amount) . '",
                    "' . base64_encode($vreg) . '","' . base64_encode($dfrom) . '","' . base64_encode($dto) . '","' . base64_encode($date) . '","","' . $session . '", "' . loantid($mno, getloanid(getglacc($tname))) . '","' . base64_encode($bnkid) . '")') or die(mysql_error());
                                                                            $prim_Kye = mysql_insert_id();
                                                                            //loan repayment
                                                                            mysql_query('insert into loanpayment values("","' . base64_encode($payee) . '","' . base64_encode($payeeid) . '","' . loantid($mno, getloanid(getglacc($tname))) . '","' . base64_encode($mno) . '","' . base64_encode(round($newAmount)) . '","' . $session . '","' . base64_encode($date) . '","' . base64_encode($bnkid) . '")') or die(mysql_error());
                                                                            //intrest
                                                                            mysql_query('insert into paymentin values("' . base64_encode('144') . '","' . loantid($mno, getloanid(getglacc($tname))) . '","' . base64_encode(round($int)) . '"
                          ,"' . base64_encode($ptype) . '","' . base64_encode('sacco officials') . '","' . base64_encode('active') . '","' . base64_encode(getMembername(base64_encode($mno))) . '",
                          "' . base64_encode($mno) . '","' . base64_encode($vreg) . '","' . base64_encode($date) . '", "' . base64_encode($bnkid) . '","","' . $session . '")') or die(mysql_error());
                                                                        }
                                                                    } else {

                                                                        $totaloaninterest = getinterest(loantid($mno, getloanid(getglacc($tname))));
                                                                        $interstpaid = addinterestpaid(loantid($mno, getloanid(getglacc($tname))));
                                                                        $bal = $totaloaninterest - $interstpaid;

                                                                        //extra fee code starts here
                                                                        if ($extrafee > $addextrafeepaid) {

                                                                            $newextrabal = $extrafee - $addextrafeepaid;

                                                                            if ($amount < $newextrabal) {

                                                                                if ($amount > 0) {
                                                                                    mysql_query('insert into paymentin values("' . base64_encode('144') . '","' . loantid($mno, getloanid(getglacc($tname))) . '","' . base64_encode(round($amount)) . '"
                          ,"' . base64_encode($ptype) . '","' . base64_encode('sacco officials') . '","' . base64_encode('active') . '","' . base64_encode(getMembername(base64_encode($mno))) . '",
                          "' . base64_encode($mno) . '","' . base64_encode($vreg) . '","' . base64_encode($date) . '", "' . base64_encode($bnkid) . '","","' . $session . '")') or die(mysql_error());
                                                                                }
                                                                            } else {

                                                                                $newamount2 = $amount - $newextrabal;

                                                                                if ($newextrabal > 0) {
                                                                                    mysql_query('insert into paymentin values("' . base64_encode('144') . '","' . loantid($mno, getloanid(getglacc($tname))) . '","' . base64_encode(round($newextrabal)) . '"
                          ,"' . base64_encode($ptype) . '","' . base64_encode('sacco officials') . '","' . base64_encode('active') . '","' . base64_encode(getMembername(base64_encode($mno))) . '",
                          "' . base64_encode($mno) . '","' . base64_encode($vreg) . '","' . base64_encode($date) . '", "' . base64_encode($bnkid) . '","","' . $session . '")') or die(mysql_error());
                                                                                }

                                                                                if ($totaloaninterest > $interstpaid) {

                                                                                    $newinterest = $totaloaninterest - $interstpaid;

                                                                                    if ($newamount2 < $newinterest) {

                                                                                        if ($newamount2 > 0) {
                                                                                            mysql_query('insert into paymentin values("' . base64_encode('125') . '","' . loantid($mno, getloanid(getglacc($tname))) . '","' . base64_encode(round($newamount2)) . '"
                          ,"' . base64_encode($ptype) . '","' . base64_encode('sacco officials') . '","' . base64_encode('active') . '","' . base64_encode(getMembername(base64_encode($mno))) . '",
                          "' . base64_encode($mno) . '","' . base64_encode($vreg) . '","' . base64_encode($date) . '", "' . base64_encode($bnkid) . '","","' . $session . '")') or die(mysql_error());
                                                                                        }

                                                                                        if ($newamount2 >= 0) {

                                                                                            $cmqry = mysql_query('insert into membercontribution values("' . base64_encode($ptype) . '","' . base64_encode($this->_mno) . '",
                "' . base64_encode($payee) . '","' . base64_encode($payeeid) . '","' . base64_encode($tname) . '","' . base64_encode($newamount2) . '",
                    "' . base64_encode($vreg) . '","' . base64_encode($dfrom) . '","' . base64_encode($dto) . '","' . base64_encode($date) . '","","' . $session . '", "' . loantid($mno, getloanid(getglacc($tname))) . '","' . base64_encode($bnkid) . '")') or die(mysql_error());
                                                                                            $prim_Kye = mysql_insert_id();
                                                                                        }
                                                                                    } else {

                                                                                        $principle = $newamount2 - $newinterest;

                                                                                        if ($principle > 0) {
                                                                                            mysql_query('insert into loanpayment values("","' . base64_encode($payee) . '","' . base64_encode($payeeid) . '","' . loantid($mno, getloanid(getglacc($tname))) . '","' . base64_encode($mno) . '","' . base64_encode(round($principle)) . '","' . $session . '","' . base64_encode($date) . '","' . base64_encode($bnkid) . '")') or die(mysql_error());
                                                                                        }

                                                                                        if ($newinterest > 0) {
                                                                                            mysql_query('insert into paymentin values("' . base64_encode('125') . '","' . loantid($mno, getloanid(getglacc($tname))) . '","' . base64_encode(round($newinterest)) . '"
                          ,"' . base64_encode($ptype) . '","' . base64_encode('sacco officials') . '","' . base64_encode('active') . '","' . base64_encode(getMembername(base64_encode($mno))) . '",
                          "' . base64_encode($mno) . '","' . base64_encode($vreg) . '","' . base64_encode($date) . '", "' . base64_encode($bnkid) . '","","' . $session . '")') or die(mysql_error());
                                                                                        }

                                                                                        if ($newamount2 > 0) {
                                                                                            $cmqry = mysql_query('insert into membercontribution values("' . base64_encode($ptype) . '","' . base64_encode($this->_mno) . '",
                "' . base64_encode($payee) . '","' . base64_encode($payeeid) . '","' . base64_encode($tname) . '","' . base64_encode($newamount2) . '",
                    "' . base64_encode($vreg) . '","' . base64_encode($dfrom) . '","' . base64_encode($dto) . '","' . base64_encode($date) . '","","' . $session . '", "' . loantid($mno, getloanid(getglacc($tname))) . '","' . base64_encode($bnkid) . '")') or die(mysql_error());
                                                                                            $prim_Kye = mysql_insert_id();
                                                                                        }
                                                                                    }
    //end of interest
                                                                                } else {


                                                                                    if ($newamount2 > 0) {
                                                                                        mysql_query('insert into loanpayment values("","' . base64_encode($payee) . '","' . base64_encode($payeeid) . '","' . loantid($mno, getloanid(getglacc($tname))) . '","' . base64_encode($mno) . '","' . base64_encode(round($newamount2)) . '","' . $session . '","' . base64_encode($date) . '","' . base64_encode($bnkid) . '")') or die(mysql_error());
                                                                                    }

                                                                                    if ($newamount2 > 0) {
                                                                                        $cmqry = mysql_query('insert into membercontribution values("' . base64_encode($ptype) . '","' . base64_encode($this->_mno) . '",
                "' . base64_encode($payee) . '","' . base64_encode($payeeid) . '","' . base64_encode($tname) . '","' . base64_encode($newamount2) . '",
                    "' . base64_encode($vreg) . '","' . base64_encode($dfrom) . '","' . base64_encode($dto) . '","' . base64_encode($date) . '","","' . $session . '", "' . loantid($mno, getloanid(getglacc($tname))) . '","' . base64_encode($bnkid) . '")') or die(mysql_error());
                                                                                        $prim_Kye = mysql_insert_id();
                                                                                    }
                                                                                }
                                                                            }
                                                                        } elseif ($totaloaninterest > $interstpaid) {


                                                                            $newinterest = $totaloaninterest - $interstpaid;

                                                                            if ($amount < $newinterest) {

                                                                                if ($amount > 0) {

                                                                                    mysql_query('insert into paymentin values("' . base64_encode('125') . '","' . loantid($mno, getloanid(getglacc($tname))) . '","' . base64_encode(round($amount)) . '"
                          ,"' . base64_encode($ptype) . '","' . base64_encode('sacco officials') . '","' . base64_encode('active') . '","' . base64_encode(getMembername(base64_encode($mno))) . '",
                          "' . base64_encode($mno) . '","' . base64_encode($vreg) . '","' . base64_encode($date) . '", "' . base64_encode($bnkid) . '","","' . $session . '")') or die(mysql_error());
                                                                                }

                                                                                if ($amount >= 0) {

                                                                                    $cmqry = mysql_query('insert into membercontribution values("' . base64_encode($ptype) . '","' . base64_encode($this->_mno) . '",
                "' . base64_encode($payee) . '","' . base64_encode($payeeid) . '","' . base64_encode($tname) . '","' . base64_encode($amount) . '",
                    "' . base64_encode($vreg) . '","' . base64_encode($dfrom) . '","' . base64_encode($dto) . '","' . base64_encode($date) . '","","' . $session . '", "' . loantid($mno, getloanid(getglacc($tname))) . '","' . base64_encode($bnkid) . '")') or die(mysql_error());
                                                                                    $prim_Kye = mysql_insert_id();
                                                                                }
                                                                            } else {

                                                                                $principle = $amount - $newinterest;

                                                                                if ($principle > 0) {
                                                                                    mysql_query('insert into loanpayment values("","' . base64_encode($payee) . '","' . base64_encode($payeeid) . '","' . loantid($mno, getloanid(getglacc($tname))) . '","' . base64_encode($mno) . '","' . base64_encode(round($principle)) . '","' . $session . '","' . base64_encode($date) . '","' . base64_encode($bnkid) . '")') or die(mysql_error());
                                                                                }

                                                                                if ($newinterest > 0) {
                                                                                    mysql_query('insert into paymentin values("' . base64_encode('125') . '","' . loantid($mno, getloanid(getglacc($tname))) . '","' . base64_encode(round($newinterest)) . '"
                          ,"' . base64_encode($ptype) . '","' . base64_encode('sacco officials') . '","' . base64_encode('active') . '","' . base64_encode(getMembername(base64_encode($mno))) . '",
                          "' . base64_encode($mno) . '","' . base64_encode($vreg) . '","' . base64_encode($date) . '", "' . base64_encode($bnkid) . '","","' . $session . '")') or die(mysql_error());
                                                                                }

                                                                                if ($amount > 0) {
                                                                                    $cmqry = mysql_query('insert into membercontribution values("' . base64_encode($ptype) . '","' . base64_encode($this->_mno) . '",
                "' . base64_encode($payee) . '","' . base64_encode($payeeid) . '","' . base64_encode($tname) . '","' . base64_encode($amount) . '",
                    "' . base64_encode($vreg) . '","' . base64_encode($dfrom) . '","' . base64_encode($dto) . '","' . base64_encode($date) . '","","' . $session . '", "' . loantid($mno, getloanid(getglacc($tname))) . '","' . base64_encode($bnkid) . '")') or die(mysql_error());
                                                                                    $prim_Kye = mysql_insert_id();
                                                                                }
                                                                            }
    //end of interest
                                                                        } else {


                                                                            if ($amount > 0) {
                                                                                mysql_query('insert into loanpayment values("","' . base64_encode($payee) . '","' . base64_encode($payeeid) . '","' . loantid($mno, getloanid(getglacc($tname))) . '","' . base64_encode($mno) . '","' . base64_encode(round($amount)) . '","' . $session . '","' . base64_encode($date) . '","' . base64_encode($bnkid) . '")') or die(mysql_error());
                                                                            }

                                                                            if ($amount > 0) {
                                                                                $cmqry = mysql_query('insert into membercontribution values("' . base64_encode($ptype) . '","' . base64_encode($this->_mno) . '",
                "' . base64_encode($payee) . '","' . base64_encode($payeeid) . '","' . base64_encode($tname) . '","' . base64_encode($amount) . '",
                    "' . base64_encode($vreg) . '","' . base64_encode($dfrom) . '","' . base64_encode($dto) . '","' . base64_encode($date) . '","","' . $session . '", "' . loantid($mno, getloanid(getglacc($tname))) . '","' . base64_encode($bnkid) . '")') or die(mysql_error());
                                                                                $prim_Kye = mysql_insert_id();
                                                                            }
                                                                        }
                                                                    }

                                                                    if ($cmqry) {
                                                                        $users = new Users();
                                                                        $activity = "Added contribution amount " . ($amount) . 'for' . base64_encode($mno);
                                                                        $users->audittrail($user, $activity, $mno);
                                                                        $alert = '<script type="text/javascript">alert("contribution added successfully!");</script>';
                                                                        echo $alert;

                                                                        loanupdate($mno, loantid($mno, getloanid(getglacc($tname))), $tname);
                                                                    }
                                                                }

                                                                if ($submit == "2") {
                                                                    contributionreceipt($this->_user, $prim_Kye, $mno, $vreg, $tid, $payeeid, $payee, $tname, $ptype, $newamt, $dfrom, $dto, $_SESSION['session'], $date);
                                                                }
                                                            }
                                                        }
                                                    } else {
                                                        echo '<span class="red" >Sorry Member was not found</span></br>';
                                                    }
                                                }
                                            }
                                        } else {
                                            echo '<span class="red" >Amount is not valid</span></br>';
                                        }
                                    }
                                }
                            }
                        } else {
                            echo '<span class="red" >Payee Name not valid</span></br>';
                        }
                    }
                }
            }
        }
        else{//member is withdrawn
            echo '<span class="red" >Sorry,member number ' . $mno . ' is withdrawn.</span></br>';
        }
    }

    public function shareswithdrawal($user, $tid, $mno, $apby, $status, $facc, $amt, $comments, $date) {


        $checktid = mysql_query('select * from membercontribution where transid="' . base64_encode($tid) . '"') or die(mysql_error());
        if (mysql_num_rows($checktid) == 1) {
            echo '<span class="red" >Sorry Transaction has already been recorded</span></br>';
        } else {
            $fromqry = mysql_query('select * from newmember where membernumber="' . base64_encode($mno) . '"') or die(mysql_error());
            if (mysql_num_rows($fromqry) == 1) {
                if (namevalidation($apby)) {
                    if ($facc == "") {
                        echo '<span class="red" >Please Fill in From Account</span></br>';
                    } else {

                        foreach (getWithdrawfee($facc) as $with_amt) {
                            if ($amt >= $with_amt['amountfrom'] && $amt <= $with_amt['amount_to']) {
                                $chargefee = $with_amt['amount'];
                            }
                        }
                        $newamout = $amt - $charge;
                        $amount = -($newamout);
                        mysql_query("BEGIN") or die(mysql_error());


                        $conry = mysql_query('insert into membercontribution values("' . base64_encode('adjustments') . '","' . base64_encode($mno) . '",
                        "' . base64_encode(getMembername(base64_encode($mno))) . '","' . base64_encode($mno) . '",
                        "' . base64_encode($facc) . '","' . base64_encode($amount) . '","' . base64_encode("none") . '","' . base64_encode("none") . '",
                        "' . base64_encode("none") . '","' . base64_encode($date) . '","","","","")');
//deduct the ammount from the account
                        $reqry = mysql_query('insert into paymentin values("' . base64_encode($facc) . '","' . base64_encode($tid) . '",    "' . base64_encode($amt) . '","' . base64_encode("adjustments") . '","' . base64_encode($apby) . '",
                                                "' . base64_encode($status) . '","' . base64_encode(getMembername(base64_encode($mno))) . '"
                                                    ,"' . base64_encode($mno) . '","' . base64_encode($comments) . '",
                                                    "' . base64_encode($date) . '","","","")') or die(mysql_error());
//
                        //deduct withraw fee          
                        $sainc = mysql_query('insert into paymentin (transname,transid,amount,paymentype,status,payeeid,date,bnkid) values ("' . getDefaultWithdrawAccount() . '","' . base64_encode($tid) . '",  "' . base64_encode($chargefee) . '","' . base64_encode("withdrawfee") . '","' . base64_encode($status) . '" ,"' . base64_encode($mno) . '","' . base64_encode($date) . '","' . getdefaultbank() . '")');


                        if ($conry) {
                            mysql_query("COMMIT") or die(mysql_error());
                            $alert = '<script type="text/javascript">alert("' . getGlname($facc) . 'Withdrawal for ' . getMembername(base64_encode($mno)) . ' was successful!");</script>';
                            echo $alert;
                        }
                    }
                } else {
                    $alt = '<script type="text/javascript">alert("Sorry ' . $apby . ' name is not valid");</script>';
                    echo $alt;
                }
            } else {
                $altd = '<script type="text/javascript">alert("Sorry From Member Number ' . $mno . ' was not found");</script>';
                echo $altd;
            }
        }
    }

    public function bpayments($user, $bname, $acode, $acname, $chqno, $desc, $amt, $date, $ptype, $transid) {

        $chqry = mysql_query('select * from bpayments where glcode="' . base64_encode(($acode)) . '" and glacc="' . base64_encode($acname) . '" and amount="' . base64_encode(($amt)) . '" and date="' . base64_encode($date) . '"') or die(mysql_error());
        if (mysql_num_rows($chqry) >= 1) {
            $_SESSION['error'] = 'Sorry The Banking Entry for ' . getGlname($acname) . ' already exists';
        } else {
            $inqry = mysql_query('insert into bpayments values("' . base64_encode($user) . '", "' . base64_encode($bname) . '","' . base64_encode(($acode)) . '","' . base64_encode(($acname)) . '",
                "' . base64_encode($chqno) . '", "' . base64_encode($desc) . '", "' . base64_encode($amt) . '", "' . base64_encode($date) . '", "' . base64_encode($ptype) . '", "' . base64_encode($transid) . '","")') or die(mysql_error());
            if ($inqry) {

                $users = new Users();
                $activity = "add banking entry " . $acname . " of transid " . $transid;
                $users->audittrail($user, $activity, $user);
                $alertyes = '<script type="text/javascript">alert("Banking Entry was successful!");</script>';
                $alertfail = '<script type="text/javascript">alert("Banking Entry failed to save!");</script>';
                echo $alertyes;
            } else {
                echo $alertfail;
            }
        }
    }

    public function rpayments($user, $bname, $rece, $creditor, $acode, $acname, $chqno, $desc, $amt, $date, $ptype, $transid) {

        $chqry = mysql_query('select * from receivepayments where glcode="' . base64_encode(($acode)) . '" and glacc="' . base64_encode($acname) . '" and amount="' . base64_encode(($amt)) . '" and date="' . base64_encode($date) . '"') or die(mysql_error());
        if (mysql_num_rows($chqry) >= 1) {
            $_SESSION['error'] = 'Sorry The Banking Entry for ' . getGlname($acname) . ' already exists';
        } else {
            $inqry = mysql_query('insert into receivepayments values("' . base64_encode($user) . '","' . base64_encode($bname) . '", "' . base64_encode($rece) . '","' . base64_encode($creditor) . '","' . base64_encode(($acode)) . '","' . base64_encode(($acname)) . '",
                "' . base64_encode($chqno) . '", "' . base64_encode($desc) . '", "' . base64_encode($amt) . '", "' . base64_encode($date) . '", "' . base64_encode($ptype) . '", "' . base64_encode($transid) . '","")') or die(mysql_error());

            if ($inqry) {
                invorecupdt($user, $creditor, $acode, $acname, $amt, $rece);

                $users = new Users();
                $activity = "add banking entry " . $acname . " of transid " . $transid;
                $users->audittrail($user, $activity, $user);
                $alertyes = '<script type="text/javascript">alert("Banking Entry was successful!");</script>';
                $alertfail = '<script type="text/javascript">alert("Banking Entry failed to save!");</script>';
                echo $alertyes;
            } else {
                echo $alertfail;
            }
        }
    }

    public function sharestoself($user, $tid, $mno, $apby, $status, $facc, $tacc, $amount, $comments, $date) {

        $transfer = getTransfercharge($facc, $tacc);
        $chargefee = base64_decode($transfer['amount_charged']);
        $minaccount = getminsavingsbal();
        $checktid = mysql_query('select * from paymentin where transid="' . base64_encode($tid) . '"') or die(mysql_error());
        if (mysql_num_rows($checktid) >= 1) {
            echo '<span class="red" >Sorry Transaction has already been recorded</span></br>';
        } else {

            $checktid2 = mysql_query('select * from membercontribution where transid="' . base64_encode($tid) . '"') or die(mysql_error());
            if (mysql_num_rows($checktid2) >= 1) {
                echo '<span class="red" >Sorry Transaction has already been recorded</span></br>';
            } else {

                $fromqry = mysql_query('select * from newmember where membernumber="' . base64_encode($mno) . '"') or die(mysql_error());
                if (mysql_num_rows($fromqry) >= 1) {
                    if (namevalidation($apby)) {
                        if ($facc == "") {
                            echo '<span class="red" >Please Fill in From Account</span></br>';
                        } else {
                            if (floatvalidation($amount)) {
                                if ($facc == $tacc) {
                                    echo '<span class="red" >Account To and From Should not be the same</span></br>';
                                } else {
                                    if ($amount > $chargefee) {
                                        $newamount = ($amount - $chargefee);

                                        $fromrslt = mysql_fetch_array($fromqry);
                                        /* if ((avcheck($_SESSION['users'], $mno)) < $amount) {
                                          echo '<span class="red" >Sorry Amount too big for The Member to transfer </span></br>';
                                          } else {
                                         *
                                         */
                                        mysql_query("BEGIN") or die(mysql_error());


                                        if (getglcombi($tacc) != '1') {

                                            $reqry = mysql_query('insert into paymentin values("' . base64_encode($facc) . '","' . base64_encode($tid) . '",    "' . base64_encode($newamount) . '","' . base64_encode("adjustments") . '","' . base64_encode($apby) . '",
                                                "' . base64_encode($status) . '","' . base64_encode(getMembername(base64_encode($mno))) . '"
                                                    ,"' . base64_encode($mno) . '","' . base64_encode($comments) . '",
                                                    "' . base64_encode($date) . '","","","")') or die(mysql_error());
//ongeza pesa
                                            $conqry = mysql_query('insert into membercontribution values("' . base64_encode($facc) . '","' . base64_encode($mno) . '",
                                                "' . base64_encode(getMembername(base64_encode($mno))) . '","' . base64_encode($mno) . '",
                                                    "' . base64_encode($tacc) . '","' . base64_encode($newamount) . '","' . base64_encode("none") . '","' . base64_encode("none") . '",
                                                        "' . base64_encode("none") . '","' . base64_encode($date) . '","", "", "' . base64_encode($tid) . '","")'); //end of adding money

                                            $conqry = mysql_query('insert into membercontribution values("' . base64_encode("adjustments") . '","' . base64_encode($mno) . '",
                                                "' . base64_encode(getMembername(base64_encode($mno))) . '","' . base64_encode($mno) . '",
                                                    "' . base64_encode($facc) . '","' . base64_encode($newamount) . '","' . base64_encode("none") . '","' . base64_encode("none") . '",
                                                        "' . base64_encode("none") . '","' . base64_encode($date) . '","", "", "' . base64_encode($tid) . '","")');
                                            //deduct the transfer fee  
                                            if ($chargefee != '0.01') {
                                                $sainc = mysql_query('insert into paymentin (transname,transid,amount,paymentype,status,payeeid,date,bnkid) values ("' . getDefaultTransfeeAccount() . '","' . base64_encode($tid) . '",  "' . base64_encode($chargefee) . '","' . base64_encode("income") . '","' . base64_encode($status) . '" ,"' . base64_encode($mno) . '","' . base64_encode($date) . '","' . getdefaultbank() . '")');
                                            }
                                        } else {
                                            echo "nalipia loan" . $newamt;
                                            active($mno);
                                            $acnaqr = mysql_query('select * from loansettings where lname="' . base64_encode(getglacc($tacc)) . '" and status="' . base64_encode("Active") . '"') or die(mysql_error());
                                            while ($lrslt = mysql_fetch_array($acnaqr)) {

                                                if ($lrslt['ratetype'] == base64_encode('1')) {

                                                    $loanamt = loanamt(loantid($mno, getloanid(getglacc($tacc))));
                                                } else {
                                                    $loanamt = principlepaid(loantid($mno, getloanid(getglacc($tacc))));
                                                }

                                                $rate = (loanrate($lrslt['id']) / 100) / 12;
                                                $intrst = $rate * $loanamt;
                                                $newamt = $newamount - $intrst;

                                                $insrt = mysql_query('insert into loanpayment values("","' . base64_encode(getMembername(base64_encode($mno))) . '","' . base64_encode($mno) . '","' . loantid($mno, getloanid(getglacc($tacc))) . '","' . base64_encode($mno) . '","' . base64_encode($newamt) . '","","' . base64_encode(strtotime($date)) . '","' . getdefaultbank() . '")') or die(mysql_error());

                                                $pyn = mysql_query('insert into paymentin values("' . base64_encode($facc) . '","' . loantid($mno, getloanid(getglacc($tacc))) . '","' . base64_encode($intrst) . '"
                      ,"' . base64_encode("adjustments") . '","' . base64_encode('sacco officials') . '","' . base64_encode('active') . '","' . base64_encode(getMembername(base64_encode($mno))) . '",
                      "' . base64_encode($mno) . '","' . base64_encode('ok') . '","' . base64_encode($date) . '","","","")') or die(mysql_error());
                                                //deduct the account funds were transfered from
                                                $reqry = mysql_query('insert into paymentin values("' . base64_encode($facc) . '","' . base64_encode($tid) . '",    "' . base64_encode($newamt) . '","' . base64_encode("adjustments") . '","' . base64_encode($apby) . '",
                                                "' . base64_encode($status) . '","' . base64_encode(getMembername(base64_encode($mno))) . '"
                                                    ,"' . base64_encode($mno) . '","' . base64_encode($comments) . '",
                                                    "' . base64_encode($date) . '","","","")') or die(mysql_error());
                                            }

                                            $conqry = mysql_query('insert into membercontribution values("' . base64_encode("adjustments") . '","' . base64_encode($mno) . '",
                                                "' . base64_encode(getMembername(base64_encode($mno))) . '","' . base64_encode($mno) . '",
                                                    "' . base64_encode($tacc) . '","' . base64_encode($newamount) . '","' . base64_encode("none") . '","' . base64_encode("none") . '",
                                                        "' . base64_encode("none") . '","' . base64_encode($date) . '","", "", "' . base64_encode(date("dmyisag")) . '","")');

                                            //deduct the transfer fee  
                                            if ($chargefee != '0.01') {
                                                $sainc = mysql_query('insert into paymentin (transname,transid,amount,paymentype,status,payeeid,date,bnkid) values ("' . getDefaultTransfeeAccount() . '","' . base64_encode($tid) . '",  "' . base64_encode($chargefee) . '","' . base64_encode("income") . '","' . base64_encode($status) . '" ,"' . base64_encode($mno) . '","' . base64_encode($date) . '","' . getdefaultbank() . '")');
                                            }
                                        }
//}

                                        loanupdate($mno, loantid($mno, getloanid(getglacc($tacc))), $tacc);
                                        if ($sainc) {
                                            mysql_query("COMMIT") or die(mysql_error());
                                            $users = new Users();
                                            $activity = "did account transfer for  " . getMembername(base64_encode($mno)) . ' amounting to ' . $amount;
                                            $users->audittrail($user, $activity, $user);
                                            $alertyes = '<script type="text/javascript">alert("Accounts Transfer was successful!");</script>';
                                            echo $alertyes;
                                        }
                                    } else {
                                        echo '<span class="red" >No enough amount ' . $amount . ' to transfer including transfer charge</span></br>';
                                    }
                                }
                            } else {
                                echo '<span class="red" >Amount ' . $amount . ' is not valid</span></br>';
                            }
                        }
                    } else {
                        echo '<span class="red" >Sorry ' . $apby . ' name is not valid</span></br>';
                    }
                } else {
                    echo '<span class="red" >Sorry From Member Number ' . $mno . ' was not found</span></br>';
                }
            }
        }
    }

    public function creategroup($user, $gname, $status, $comm) {

        $hqry = mysql_query('select * from cgroup where gname="' . base64_encode($gname) . '"') or die(mysql_error());

        if (mysql_num_rows($hqry) >= 1) {
            echo '<span class="red" >' . $gname . ' group already exists</span></br>';
        } else {

            $cchqry = mysql_query('insert into cgroup values ("", "' . base64_encode($gname) . '", "' . base64_encode($status) . '", "' . base64_encode($comm) . '", "' . base64_encode($user) . '", "' . base64_encode(date('d-M-Y')) . '")') or die(mysql_error());

            if ($cchqry) {
                $users = new Users();
                $activity = "added member group " . $gname;
                $users->audittrail($user, $activity, $user);
                $alertyes = '<script type="text/javascript">alert("' . $gname . ' group has successfully been created!");</script>';
                echo $alertyes;

                $newid = mysql_insert_id();
                $accode = '21101' . $newid;
                $inqry = mysql_query('insert into glaccounts values("", "' . base64_encode(($accode)) . '", "' . base64_encode($gname) . '","' . base64_encode('2') . '", "' . base64_encode('Active') . '","' . base64_encode(date('d-M-Y')) . '")') or die(mysql_error());
            }
        }
    }

    public function loanpay($users, $acc, $loan, $amount, $tid, $mno) {

        $checktid = mysql_query('select * from paymentin where transid="' . base64_encode($tid) . '" and payeeid="' . base64_encode($mno) . '"') or die(mysql_error());
        if (mysql_num_rows($checktid) >= 1) {
            echo '<span class="red" >Sorry Transaction has already been recorded</span></br>';
        } else {
            $cecktid = mysql_query('select * from membercontribution where transid="' . base64_encode($tid) . '" and memberno="' . base64_encode($mno) . '"') or die(mysql_error());
            if (mysql_num_rows($cecktid) >= 1) {
                echo '<span class="red" >Sorry Transaction has already been recorded</span></br>';
            } else {
                $chektid = mysql_query('select * from loanpayment where transid="' . base64_encode($tid) . '" and payeeid="' . base64_encode($mno) . '"') or die(mysql_error());
                if (mysql_num_rows($chektid) >= 1) {
                    echo '<span class="red" >Sorry Transaction has already been recorded</span></br>';
                } else {
                    if ($acc == "") {
                        echo '<span class="red" >Please Fill in a valid Account</span></br>';
                    } else {
                        if ($amount == "") {
                            echo '<span class="red" >Please Fill in the Amount</span></br>';
                        } else {
                            if ($mno == "") {
                                echo '<span class="red" >Please Select at least one member</span></br>';
                            } else {
                                if ($loan == "") {
                                    echo '<span class="red" >Please Fill in the Correct Loan Account</span></br>';
                                } else {
                                    $reqry = mysql_query('insert into paymentin values("' . base64_encode($acc) . '","' . base64_encode($tid) . '",
                                            "' . base64_encode($amount) . '","' . base64_encode("Standing Order(Loan Repayment)") . '","' . base64_encode('sacco officials') . '",
                                                "' . base64_encode('active') . '","' . base64_encode(getMembername(base64_encode($mno))) . '"
                                                    ,"' . base64_encode($mno) . '","' . base64_encode('ok') . '",
                                                    "' . base64_encode(date("d-M-Y")) . '","","","")') or die(mysql_error());
                                    if ($reqry) {
                                        $conqry = mysql_query('insert into membercontribution values("' . base64_encode("Standing Order") . '","' . base64_encode($mno) . '",
                                                "' . base64_encode(getMembername(base64_encode($mno))) . '","' . base64_encode($mno) . '",
                                                    "' . base64_encode($loan) . '","' . base64_encode($amount) . '","' . base64_encode("none") . '","' . base64_encode("none") . '",
                                                        "' . base64_encode("none") . '","' . base64_encode(date("d-M-Y")) . '","","","' . base64_encode($tid) . '","")');

                                        if ($conqry) {
                                            active($mno);
                                            $acnaqr = mysql_query('select * from loansettings where lname="' . base64_encode($loan) . '" and status="' . base64_encode("Active") . '"') or die(mysql_error());
                                            while ($lrslt = mysql_fetch_array($acnaqr)) {
                                                mysql_query('insert into loanpayment values("","' . base64_encode(getMembername(base64_encode($mno))) . '","' . base64_encode($mno) . '","' . loantid($mno, getloanid($loan)) . '","' . base64_encode($mno) . '","' . base64_encode($amount) . '","' . base64_encode(date("d-M-Y")) . '")') or die(mysql_error());
                                            }

                                            loanupdate($mno, loantid($mno, getloanid($loan)));

                                            mysql_query("COMMIT") or die(mysql_error());
                                            $users = new Users();
                                            $activity = "added loan payment for " . getMembername(base64_encode($mno)) . ' amouting to ' . $amount;
                                            $users->audittrail($users, $activity, $users);
                                            $alertyes = '<script type="text/javascript">alert("Loan Repayment via Standing Order was successful!");</script>';
                                            echo $alertyes;
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }

    public function orderstands($user, $acc, $unt, $amount, $tid, $mno) {

        $checktid = mysql_query('select * from paymentin where transid="' . base64_encode($tid) . '" and payeeid="' . base64_encode($mno) . '"') or die(mysql_error());
        if (mysql_num_rows($checktid) >= 1) {
            echo '<span class="red" >Sorry Transaction has already been recorded</span></br>';
        } else {
            $fromqry = mysql_query('select * from newmember where membernumber="' . base64_encode($mno) . '"') or die(mysql_error());
            if (mysql_num_rows($fromqry) == 1) {
                if (namevalidation($acc)) {
                    if ($unt == "") {
                        echo '<span class="red" >Please Fill in From Account</span></br>';
                    } else {
                        if (floatvalidation($amount)) {
                            if ($acc == $unt) {
                                echo '<span class="red" >Account To and From Should not be the same</span></br>';
                            } else {
                                $fromrslt = mysql_fetch_array($fromqry);

                                mysql_query("BEGIN") or die(mysql_error());
                                $reqry = mysql_query('insert into paymentin values("' . base64_encode($unt) . '","' . base64_encode($tid) . '",
                                            "' . base64_encode($amount) . '","' . base64_encode("Standing Order(Debit)") . '","' . base64_encode('sacco officials') . '",
                                                "' . base64_encode('active') . '","' . base64_encode(getMembername(base64_encode($mno))) . '"
                                                    ,"' . base64_encode($mno) . '","' . base64_encode('ok') . '",
                                                    "' . base64_encode(date("d-M-Y")) . '","","","")') or die(mysql_error());
                                if ($reqry) {
                                    $conqry = mysql_query('insert into paymentin values("' . base64_encode($unt) . '","' . base64_encode($tid) . '",
                                            "' . base64_encode($amount) . '","' . base64_encode("Standing Order") . '","' . base64_encode('sacco officials') . '",
                                                "' . base64_encode('active') . '","' . base64_encode(getMembername(base64_encode($mno))) . '"
                                                    ,"' . base64_encode($mno) . '","' . base64_encode('ok') . '",
                                                    "' . base64_encode(date("d-M-Y")) . '","","","")') or die(mysql_error());
                                    if ($conqry) {
                                        mysql_query("COMMIT") or die(mysql_error());
                                        $users = new Users();
                                        $activity = "added starding order to " . $unt;
                                        $users->audittrail($user, $activity, $user);
                                        $alertyes = '<script type="text/javascript">alert("Standing Order to ' . $unt . ' was successful!");</script>';
                                        echo $alertyes;
                                    } else {
                                        mysql_query("ROLLBACK");

                                        $alertyes = '<script type="text/javascript">alert("Sorry, Standing Order from ' . $acc . ' has Failed!");</script>';
                                        echo $alertyes;
                                    }
                                } else {
                                    mysql_query("ROLLBACK");
                                    $alertyes = '<script type="text/javascript">alert("Sorry, Standing Orders  from ' . $acc . ' has Failed!");</script>';
                                    echo $alertyes;
                                }
                            }
                        } else {
                            echo '<span class="red" >Amount ' . $amount . ' is not valid</span></br>';
                        }
                    }
                } else {
                    echo '<span class="red" >Sorry ' . $unt . ' name is not valid</span></br>';
                }
            } else {
                echo '<span class="red" >Sorry Member Number ' . $mno . ' was not found</span></br>';
            }
        }
    }

    public function standContrib($users, $acc, $amount, $tid, $mno) {

        $checktid = mysql_query('select * from paymentin where transid="' . base64_encode($tid) . '" and payeeid="' . base64_encode($mno) . '"') or die(mysql_error());
        if (mysql_num_rows($checktid) >= 1) {
            echo '<span class="red" >Sorry Transaction has already been recorded</span></br>';
        } else {
            $cecktid = mysql_query('select * from membercontribution where transid="' . base64_encode($tid) . '" and memberno="' . base64_encode($mno) . '"') or die(mysql_error());
            if (mysql_num_rows($cecktid) >= 1) {
                echo '<span class="red" >Sorry Transaction has already been recorded</span></br>';
            } else {
                if ($amount == "") {
                    echo '<span class="red" >Please Fill in the Amount</span></br>';
                } else {
                    if ($mno == "") {
                        echo '<span class="red" >Please Select at least one member</span></br>';
                    } else {
                        $reqry = mysql_query('insert into paymentin values("' . base64_encode($acc) . '","' . base64_encode($tid) . '",
                                            "' . base64_encode($amount) . '","' . base64_encode("Standing Order(Contributions)") . '","' . base64_encode('sacco officials') . '",
                                                "' . base64_encode('active') . '","' . base64_encode(getMembername(base64_encode($mno))) . '"
                                                    ,"' . base64_encode($mno) . '","' . base64_encode('ok') . '",
                                                    "' . base64_encode(date("d-M-Y")) . '","","","")') or die(mysql_error());
                        if ($reqry) {
                            $conqry = mysql_query('insert into membercontribution values("' . base64_encode("Standing Order") . '","' . base64_encode($mno) . '",
                                                "' . base64_encode(getMembername(base64_encode($mno))) . '","' . base64_encode($mno) . '",
                                                    "' . base64_encode("member deposits") . '","' . base64_encode($amount) . '","' . base64_encode("none") . '","' . base64_encode("none") . '",
                                                        "' . base64_encode("none") . '","' . base64_encode(date("d-M-Y")) . '","","","' . base64_encode($tid) . '","")');



                            mysql_query("COMMIT") or die(mysql_error());
                            $users = new Users();
                            $activity = "added amount for contribution via standing order for " . getMembername(base64_encode($mno));
                            $users->audittrail($users, $activity, $user);
                            $alertyes = '<script type="text/javascript">alert("Contribution payment via Standing Order was successful!");</script>';
                            echo $alertyes;
                        }
                    }
                }
            }
        }
    }

    public function sharesmembertomember($user, $tid, $from, $to, $apby, $status, $facc, $tacc, $amount, $date, $comments) {
        $minaccount = getminsavingsbal();
        $transfer = getTransfercharge($facc, $tacc);
        $chargefee = base64_decode($transfer['amount_charged']);

        $checktid = mysql_query('select * from paymentin where transid="' . base64_encode($tid) . '"') or die(mysql_error());
        if (mysql_num_rows($checktid) == 1) {
            echo '<span class="red" >Sorry Transaction has been recorded</span></br>';
        } else {
            $fromqry = mysql_query('select * from newmember where membernumber="' . base64_encode($from) . '"') or die(mysql_error());
            if (mysql_num_rows($fromqry) == 1) {
                $toqry = mysql_query('select * from newmember where membernumber="' . base64_encode($to) . '"') or die(mysql_error());
                if (mysql_num_rows($toqry) == 1) {
                    if (namevalidation($apby)) {
                        if ($facc == "") {
                            echo '<span class="red" >Please Fill in From Account</span></br>';
                        } else {
                            if ($tacc == "") {
                                echo '<span class="red" >Please Fill in To Account</span></br>';
                            } else {
                                if (floatvalidation($amount)) {
                                    if ($from == $to) {
                                        echo '<span class="red" >Sorry Member cannot transfere shares to self</span></br>';
                                    } else {
                                        if ($chargefee > $amount) {
                                            echo '<span class="red" >Sorry.No enough amount to transfer</span></br>';
                                        } else {
                                            $newamount = ($amount - $chargefee);

                                            $fromrslt = mysql_fetch_array($fromqry);
                                            $torslt = mysql_fetch_array($toqry);
                                            //deduct the ammount transfered
                                            $reqry = mysql_query('insert into paymentin values("' . base64_encode($facc) . '","' . base64_encode($tid) . '",    "' . base64_encode($amount) . '","' . base64_encode("adjustments") . '","' . base64_encode($apby) . '", "' . base64_encode($status) . '","' . base64_encode(getMembername(base64_encode($from))) . '","' . base64_encode($from) . '","' . base64_encode($comments) . '", "' . base64_encode(date('d-M-Y')) . '","","","")') or die(mysql_error());
//add amount to member transfered to
                                            $conq = mysql_query('insert into membercontribution values("' . base64_encode('transfers') . '","' . base64_encode($to) . '", "' . base64_encode(getMembername(base64_encode($to))) . '","' . base64_encode($to) . '", "' . base64_encode($tacc) . '","' . base64_encode($amount) . '","' . base64_encode("none") . '","' . base64_encode("none") . '", "' . base64_encode("none") . '","' . base64_encode(date('d-M-Y')) . '","", "", "' . base64_encode($tid) . '","")'); //end of adding money
                                            if ($reqry) {
                                                $conqry = mysql_query('insert into membercontribution values("' . base64_encode("adjustments") . '","' . base64_encode($to) . '",
                                                "' . base64_encode(getMembername(base64_encode($to))) . '","' . base64_encode($to) . '",
                                                    "' . base64_encode($tacc) . '","' . base64_encode(-$newamount) . '","' . base64_encode("none") . '","' . base64_encode("none") . '",
                                                        "' . base64_encode("none") . '","' . base64_encode($date) . '","", "", "' . base64_encode($tid) . '","")');
                                                //deduct the transfer fee          
                                                $sainc = mysql_query('insert into paymentin (transname,transid,amount,paymentype,status,payeeid,date,bnkid) values ("' . getDefaultTransfeeAccount() . '","' . base64_encode($tid) . '",  "' . base64_encode($chargefee) . '","' . base64_encode("income") . '","' . base64_encode($status) . '" ,"' . base64_encode($mno) . '","' . base64_encode($date) . '","' . getdefaultbank() . '")');

                                                if ($conqry) {
                                                    mysql_query("COMMIT") or die(mysql_error());
                                                    $users = new Users();
                                                    $activity = "added share transfer from  " . $from . ' to ' . $to . ' amounting to ' . $amount;
                                                    $users->audittrail($user, $activity, $user);
                                                    $altd = '<script type="text/javascript">alert("Shares Transfer was successful");</script>';
                                                    echo $altd;
                                                } else {
                                                    mysql_query("ROLLBACK");
                                                    $alt = '<script type="text/javascript">alert("Sorry Shares Transfer from ' . $from . ' to ' . $to . ' Failed");</script>';
                                                    echo $alt;
                                                }
                                            } else {
                                                mysql_query("ROLLBACK");
                                                $altdd = '<script type="text/javascript">alert("Sorry Shares Transfare from ' . $from . ' to ' . $to . ' Failed");</script>';
                                                echo $altdd;
                                            }
                                            // }
                                        }
                                    }
                                } else {
                                    $a = '<script type="text/javascript">alert("Amount ' . $amount . ' is not valid");</script>';
                                    echo $a;
                                }
                            }
                        }
                    } else {
                        echo '<span class="red" >Sorry ' . $apby . ' name is not valid</span></br>';
                    }
                } else {
                    echo '<span class="red" >Sorry To Member Number ' . $to . ' was not found</span></br>';
                }
            } else {
                echo '<span class="red" >Sorry From Member Number ' . $from . ' was not found</span></br>';
            }
        }
    }

    public function sharestosacco($user, $tid, $mno, $apby, $status, $facc, $tacc, $amount, $date, $comments) {
        $transfer = getTransfercharge($facc, $tacc);
        $chargefee = base64_decode($transfer['amount_charged']);
        $minaccount = getminsavingsbal();
        $checktid = mysql_query('select * from paymentin where transid="' . base64_encode($tid) . '"') or die(mysql_error());
        if (mysql_num_rows($checktid) >= 1) {
            echo '<span class="red" >Sorry Transaction has already been recorded</span></br>';
        } else {
            $fromqry = mysql_query('select * from newmember where membernumber="' . base64_encode($mno) . '"') or die(mysql_error());
            if (mysql_num_rows($fromqry) == 1) {
                if (namevalidation($apby)) {
                    if ($facc == "") {
                        echo '<span class="red" >Please Fill in From Account</span></br>';
                    } else {
                        if (floatvalidation($amount)) {
                            if ($facc == $tacc) {
                                echo '<span class="red" >Account To and From Should not be the same</span></br>';
                            } else {
                                if ($chargefee > $amount) {
                                    echo '<span class="red" >Sorry.No enough amount to transfer</span></br>';
                                } else {
                                    $newamount = ($amount - $chargefee);
                                    $fromrslt = mysql_fetch_array($fromqry);
                                    /* if ((avcheck($_SESSION['users'], $mno) - $amount) <= $minaccount) {
                                      echo '<span class="red" >Sorry Amount too big for The Member to transfer </span></br>';
                                      } else { */
                                    mysql_query("BEGIN") or die(mysql_error());
                                    $reqry = mysql_query('insert into paymentin values("' . base64_encode($tacc) . '","' . base64_encode($tid) . '",
                                            "' . base64_encode($newamount) . '","' . base64_encode("adjustments") . '","' . base64_encode($apby) . '",
                                                "' . base64_encode($status) . '","' . base64_encode(getMembername(base64_encode($mno))) . '"
                                                    ,"' . base64_encode($mno) . '","' . base64_encode($comments) . '",
                                                    "' . base64_encode($date) . '","","","")') or die(mysql_error());

                                    if ($reqry) {
                                        $conqry = mysql_query('insert into paymentin values("' . base64_encode($tacc) . '","' . base64_encode($tid) . '",
                                            "' . base64_encode($newamount) . '","' . base64_encode("share transfer") . '","' . base64_encode($apby) . '",
                                                "' . base64_encode($status) . '","' . base64_encode(getMembername(base64_encode($mno))) . '"
                                                    ,"' . base64_encode($mno) . '","' . base64_encode($comments) . '",
                                                    "' . base64_encode($date) . '","","","")') or die(mysql_error());
                                        //deduct the transfer fee          
                                        $sainc = mysql_query('insert into paymentin (transname,transid,amount,paymentype,status,payeeid,date,bnkid) values ("' . getDefaultTransfeeAccount() . '","' . base64_encode($tid) . '",  "' . base64_encode($chargefee) . '","' . base64_encode("income") . '","' . base64_encode($status) . '" ,"' . base64_encode($mno) . '","' . base64_encode($date) . '","' . getdefaultbank() . '")');

                                        if ($conqry) {
                                            mysql_query("COMMIT") or die(mysql_error());
                                            $users = new Users();
                                            $activity = "added share transfer to sacco from  " . getMembername(base64_encode($mno)) . ' amounting to ' . $amount;
                                            $users->audittrail($user, $activity, $user);
                                            echo '<span class="green" >Shares Transfer was successful</span></br>';
                                        } else {
                                            mysql_query("ROLLBACK");
                                            echo '<span class="red" >Sorry Shares Transfare from ' . $from . 'Failed</spam></br>';
                                        }
                                    } else {
                                        mysql_query("ROLLBACK");
                                        echo '<span class="red" >Sorry Shares Transfare from ' . $from . ' Failed</spam></br>';
                                    }
                                    //}
                                }
                            }
                        } else {
                            echo '<span class="red" >Amount ' . $amount . ' is not valid</span></br>';
                        }
                    }
                } else {
                    echo '<span class="red" >Sorry ' . $apby . ' name is not valid</span></br>';
                }
            } else {
                echo '<span class="red" >Sorry From Member Number ' . $from . ' was not found</span></br>';
            }
        }
    }

    public function communication($user, $number, $subject, $body) {
        $this->_user = $user;

        $inqry = mysql_query('insert into communication values("' . base64_encode($number) . '","' . base64_encode($subject) . '","' . base64_encode($body) . '","' . base64_encode(date('d-M-Y')) . '","")') or die(mysql_error());

        if ($inqry) {
            $users = new Users();
            $activity = "sent feedback  " . $subject . ' to ' . $number;
            $users->audittrail($user, $activity, $user);
            $alertyes = '<script type="text/javascript">alert("Feedback saved successfully!");</script>';
            echo $alertyes;
        } else {

            $aler = '<script type="text/javascript">alert("Feedback failed to process, Try Again!");</script>';
            echo $aler;
        }
    }

    public function accountop($user, $min, $loanappfee, $loaninsurance, $bene) {
        if (floatvalidation($min)) {
            if (floatvalidation($loanappfee)) {
                if (floatvalidation($loaninsurance)) {
                    $qry = mysql_query('update acset set loanappfee="' . base64_encode($loanappfee) . '", loaninsurance="' . base64_encode($loaninsurance) . '",minimumacbl="' . base64_encode($min) . '", benevolent="' . base64_encode($bene) . '" where id="1"') or die(mysql_error());
                    if ($qry) {
                        $users = new Users();
                        $activity = "updated accounts " . $loanappfee . ' ' . $loaninsurance . ' ' . $bene;
                        $users->audittrail($user, $activity, $user);
                        $aler = '<script type="text/javascript">alert("Accounts updated successfully!");</script>';
                        echo $aler;
                    } else {
                        $alert = '<script type="text/javascript">alert("Sorry Accounts update failed!");</script>';
                        echo $alert;
                    }
                } else {
                    echo '<span class="red" >Sorry Long Term Loan Percentage value is not valid</span></br>';
                }
            } else {
                echo '<span class="red" >Sorry Emergency Loan Percentage value is not valid</span></br>';
            }
        } else {
            echo '<span class="red" >Sorry Minimum Account balance is not valid</span></br>';
        }
    }

    public function saccoincome($user, $tid, $tname, $amount, $ptype, $apby, $status, $payee, $payeeid, $comments, $dates, $submit, $session, $bnkid) {
        $date = date("d-M-Y", strtotime($dates));
        $this->_user = $user;
        if ($payee == "") {
            echo '<span class="red" >Please fill in payee name</span></br>';
        } else {
            if ($payeeid == "") {
                echo '<span class="red" >Please fill in payee-id</span></br>';
            } else {
                if (floatvalidation($payeeid)) {
                    if (namevalidation($apby)) {
                        if ($status == "") {
                            echo '<span class="red" >please fill in the income status</span></br>';
                        } else {
                            if ($tname == "") {
                                echo '<span class="red" >Please select an account name</span></br>';
                            } else {
                                if ($ptype == "") {
                                    echo '<span class="red" >Please select payment type</span></br>';
                                } else {
                                    if (floatvalidation($amount)) {
                                        $chtqry = mysql_query('select * from paymentin where date="' . base64_encode($date) . '" and transname="' . base64_encode($tname) . '" and payeeid="' . base64_encode($payeeid) . '" or transid="' . base64_encode($tid) . '"') or die(mysql_error());
                                        if (mysql_num_rows($chtqry) == 1) {
                                            echo '<span class="red" >Sorry that transaction has been processed</span>';
                                        } else {

                                            $inqry = mysql_query('insert into paymentin values("' . base64_encode($tname) . '","' . base64_encode($tid) . '","' . base64_encode($amount) . '"
                ,"' . base64_encode($ptype) . '","' . base64_encode($apby) . '","' . base64_encode($status) . '","' . base64_encode($payee) . '",
                    "' . base64_encode($payeeid) . '","' . base64_encode($comments) . '","' . base64_encode($date) . '","' . base64_encode($bnkid) . '","","' . $session . '")') or die(mysql_error());


                                            if ($inqry) {
                                                $users = new Users();
                                                $activity = "added income " . $tname . ' amounting to ' . $amount;
                                                $users->audittrail($user, $activity, $user);
                                                $alertyes = '<script type="text/javascript">alert("Income saved successfully!");</script>';
                                                echo $alertyes;
                                                if ($submit == "2") {
                                                    incomereceipt($this->_user, $tid, $tname, $amount, $ptype, $apby, $payee, $payeeid, $comments, $session, $date);
                                                }
                                            } else {
                                                $alertyes = '<script type="text/javascript">alert("Income failed to process!");</script>';
                                                echo $alertyes;
                                            }
                                        }
                                    } else {
                                        echo '<span class="red" >Amount is not valid</span></br>';
                                    }
                                }
                            }
                        }
                    } else {
                        echo '<span class="red" >Approving Official name is not valid</span></br>';
                    }
                } else {
                    echo '<span class="red" >Sorry Payee Id is not valid</span></br>';
                }
            }
        }
    }

    public function assetscategory($user, $ccode, $cname, $fagl, $pldep, $pldis, $bsdep) {

        $chqry = mysql_query('select * from fixedassetscategory where catcode="' . base64_encode(($ccode)) . '" and catdesc="' . base64_encode($cname) . '"') or die(mysql_error());
        if (mysql_num_rows($chqry) >= 1) {
            $_SESSION['error'] = 'Sorry The Fixed Asset Category ' . $cname . ' exists';
        } else {
            $inqry = mysql_query('insert into fixedassetscategory values("' . base64_encode($user) . '","' . base64_encode(($ccode)) . '","' . base64_encode(($cname)) . '"
                ,"' . base64_encode(($fagl)) . '", "' . base64_encode($pldep) . '", "' . base64_encode($pldis) . '", "' . base64_encode($bsdep) . '", "' . base64_encode(date("d-M-Y")) . '", "")') or die(mysql_error());
            if ($inqry) {

                $users = new Users();
                $activity = "add acount " . $acname . " of type " . $actype;
                $users->audittrail($user, $activity, $user);
                /*

                  $_SESSION['success'] = 'Fixed Asset Category added successfuly';
                  } else {
                  $_SESSION['error'] = 'Fixed Asset Category failed to be saved';
                  }
                  }
                  }

                  public function assetslocation($user, $lcode, $lname, $contact, $address, $town, $pcode, $phone, $email, $status) {

                  $chqry = mysql_query('select * from fixedassetslocation where lcode="' . base64_encode(($lcode)) . '" and lname="' . base64_encode($lname) . '"') or die(mysql_error());
                  if (mysql_num_rows($chqry) >= 1) {
                  $_SESSION['error'] = 'Sorry The Fixed Asset Location ' . $lname . ' exists';
                  } else {
                  $inqry = mysql_query('insert into fixedassetslocation values("' . base64_encode($user) . '","' . base64_encode(($lcode)) . '","' . base64_encode(($lname)) . '"
                  ,"' . base64_encode(($contact)) . '", "' . base64_encode($address) . '", "' . base64_encode($town) . '", "' . base64_encode($pcode) . '"
                  , "' . base64_encode($phone) . '", "' . base64_encode($email) . '", "' . base64_encode($status) . '", "' . base64_encode(date("d-M-Y")) . '", "")') or die(mysql_error());
                  if ($inqry) {
                  /*
                  $users = new Users();
                  $activity = "add acount " . $acname . " of type " . $actype;
                  $users->audittrail($user, $activity);
                 *
                 */
                $alertyes = '<script type="text/javascript">alert("Fixed Asset Location added successfuly!");</script>';
                $alert = '<script type="text/javascript">alert("Fixed Asset Location failed to be saved!");</script>';
                $_SESSION['success'] = alertyes;
            } else {
                $_SESSION['error'] = $alert;
            }
        }
    }

    public function debtorsadd($user, $tid, $tname, $amount, $ptype, $apby, $status, $payee, $payeeid, $comments, $dates, $submit, $session) {
        $date = date("d-M-Y", strtotime($dates));
        $this->_user = $user;
        if ($payee == "") {
            echo '<span class="red" >Please fill in payee name</span></br>';
        } else {
            /*
              if ($payeeid == "") {
              echo '<span class="red" >Please fill in payee-id</span></br>';
              } else {
              if (floatvalidation($payeeid)) {

              if (namevalidation($apby)) {
             */
            if ($status == "") {
                echo '<span class="red" >please fill in the income status</span></br>';
            } else {
                if ($tname == "") {
                    echo '<span class="red" >Please select an account name</span></br>';
                } else {
                    if ($ptype == "") {
                        echo '<span class="red" >Please select payment type</span></br>';
                    } else {
                        if (floatvalidation($amount)) {
                            $chtqry = mysql_query('select * from paymentin where date="' . base64_encode($date) . '" and transname="' . base64_encode($tname) . '" and payeeid="' . base64_encode($payeeid) . '" or transid="' . base64_encode($tid) . '"') or die(mysql_error());
                            if (mysql_num_rows($chtqry) == 1) {
                                echo '<span class="red" >Sorry that transaction has been processed</span>';
                            } else {
                                $inqry = mysql_query('insert into paymentin values("' . base64_encode($tname) . '","' . base64_encode($tid) . '","' . base64_encode($amount) . '"
                ,"' . base64_encode($ptype) . '","' . base64_encode($apby) . '","' . base64_encode($status) . '","' . base64_encode($payee) . '",
                    "' . base64_encode($payeeid) . '","' . base64_encode($comments) . '","' . base64_encode($date) . '","","","' . $session . '")') or die(mysql_error());
                                if ($inqry) {
                                    $users = new Users();
                                    $activity = "added debtors account ";
                                    $users->audittrail($user, $activity, $user);

                                    $alertyes = '<script type="text/javascript">alert("Debtors Account saved successfully!");</script>';

                                    echo $alertyes;
                                    if ($submit == "2") {
                                        incomereceipt($this->_user, $tid, $tname, $amount, $ptype, $apby, $payee, $payeeid, $comments, $session);
                                    }
                                } else {
                                    $alert = '<script type="text/javascript">alert("Debtors Account failed to process!");</script>';
                                    echo $alert;
                                }
                            }
                        } else {
                            echo '<span class="red" >Amount is not valid</span></br>';
                        }
                    }
                }
            }
            /*
              } else {
              echo '<span class="red" >Approving Official name is not valid</span></br>';
              }

              } else {
              echo '<span class="red" >Sorry Payee Id is not valid</span></br>';
              }
              }
             *
             */
        }
    }

    function updateasset($user, $id, $name, $glaccount, $date, $value, $salvage, $life, $type, $rate, $period, $tag, $dep_glaccount) {
        $updateasset = mysql_query('UPDATE fixed_assets SET asset_name="' . base64_encode($name) . '", glaccount="' . base64_encode($glaccount) . '", purchase_date="' . base64_encode($date) . '", asset_value="' . base64_encode($value) . '", salvage_value="' . base64_encode($salvage) . '", useful_life="' . base64_encode($life) . '", dep_type="' . base64_encode($type) . '", dep_rate="' . base64_encode($rate) . '", dep_period="' . base64_encode($period) . '", asset_tag="' . base64_encode($tag) . '", dep_glaccount="' . base64_encode($dep_glaccount) . '" where id="' . $id . '"') or die(mysql_error());
        if ($updateasset) {
            $users = new Users();
            $activity = "updated Fixed asset " . $name;
            $users->audittrail($user, $activity, $user);
            $alertupdate = '<script type="text/javascript">alert("Asset updated"); document.location.href ="fixed_assetedit.php";</script>';
            echo $alertupdate;
        } else {
            $alertfailed = '<script type="text/javascript">alert("Sorry Asset update failed!");</script>';
            echo $alertfailed;
        }
    }

    public function fixedassets($user, $name, $glaccount, $purchasedate, $value, $salvage, $life, $type, $rate, $period, $tag, $dep_glaccount) {
//check exists
        $checkasset = mysql_query('SELECT * FROM fixed_assets WHERE asset_name="' . base64_encode($name) . '" ') or die(mysql_error());
        if (mysql_num_rows($checkasset) == 1) {
            echo '<span class="red" >Sorry that asset is already recorded</span>';
        } else {
            $date = time();
            $status = 'Active';
            $inqry = mysql_query('INSERT INTO fixed_assets VALUES("", "' . base64_encode($name) . '","' . base64_encode($glaccount) . '", "' . base64_encode($purchasedate) . '","' . base64_encode($value) . '", "' . base64_encode($salvage) . '","' . base64_encode($life) . '", "' . base64_encode($type) . '", "' . base64_encode($rate) . '","' . base64_encode($period) . '", "' . base64_encode($tag) . '", "' . base64_encode($dep_glaccount) . '", "' . base64_encode($date) . '", "' . base64_encode($status) . '")') or die(mysql_error());
            if ($inqry) {
                $users = new Users();
                $activity = "Added a fixed asset  " . ($name);
                $users->audittrail($user, $activity, $user);
                $success = '<script type="text/javascript">alert("Asset saved successfully!"); </script>';
                echo $success;
            } else {
                $fail = '<script type="text/javascript">alert("Failed to save Asset");</script>';
                echo $fail;
            }
        }
    }

    public function saccoexpense($user, $tid, $tname, $amount, $ptype, $cheque, $apby, $date, $status, $reason, $recvr, $recvrid, $comments, $session, $submit, $bnkid) {

        $this->_user = $user;
        if (namevalidation($recvr)) {
//if (floatvalidation($recvrid)) {
            if (namevalidation($apby)) {
                if ($status == "") {
                    echo '<span class="red" >Please fill in the payment status</span></br>';
                } else {
                    if ($tname == "") {
                        echo '<span class="red" >Please select the acount name</span></br>';
                    } else {
                        if ($ptype == "") {
                            echo '<span class="red" >Please select the payment type</span></br>';
                        } else {

//if (floatvalidate($amount)) {

                            $chtqry = mysql_query('select * from paymentout where transid="' . base64_encode($tid) . '" and transname="' . base64_encode($tname) . '" and chequeno="' . base64_encode($cheque) . '" and approvedby="' . base64_encode($apby) . '" and reasons="' . base64_encode($reason) . '" and comments="' . base64_encode($comments) . '" and date="' . base64_encode($date) . '" and receiver="' . base64_encode($recvr) . '" and  receiverid="' . base64_encode($recvrid) . '"') or die(mysql_error());
                            if (mysql_num_rows($chtqry) == 1) {
                                echo '<span class="red" >Sorry that transaction has been processed</span>';
                            } else {
                                //check if amount in imprest is enough for transaction
                                $imprestAmount = base64_decode(getImprestAmounta());
                                //if($amount<=$imprestAmount){
                                //$bal=$imprestAmount-$amount;
                                //mysql_query("UPDATE   expenses  SET 	bal='".base64_encode($bal)."'  WHERE  id=1");

                                $inqry = mysql_query('insert into paymentout values("' . base64_encode($tname) . '","' . base64_encode($tid) . '",
                "' . base64_encode($amount) . '"
                ,"' . base64_encode($ptype) . '","' . base64_encode($cheque) . '","' . base64_encode($apby) . '","' . base64_encode($status) . '",
                    "' . base64_encode($recvr) . '",
                    "' . base64_encode($recvrid) . '","' . base64_encode($reason) . '",
                        "' . base64_encode($comments) . '","' . base64_encode($date) . '","' . base64_encode($bnkid) . '","","' . $session . '")') or die(mysql_error());

                                if ($inqry) {

                                    $users = new Users();
                                    $activity = "Added Expense  " . ($tid) . ' received by ' . $recvr . ' amounting to ' . $amount;
                                    $users->audittrail($user, $activity, $user);

                                    $alert = '<script type="text/javascript">alert("Expense saved successfully!");</script>';
                                    echo $alert;


                                    if ($submit == "2") {
                                        expensereceipt($user, $tid, $tname, $amount, $ptype, $cheque, $apby, $recvr, $recvrid, $session, $date);
                                    }
                                } else {
                                    $alertyes = '<script type="text/javascript">alert("Expense failed"' . $amount . '"to process!");</script>';
                                    echo $alertyes;
                                }
                                /* }else{
                                  $al = '<script type="text/javascript">alert("Imprest Amount Is Below amount You Requested '.'\r\n'.
                                  'Amount Balace Is ' .$imprestAmount .'\r\n'.' And Amount You Requsted Is '. $amount.'");</script>';
                                  echo $al;

                                  } */
                            }
                        }
                    }
                }
            } else {
                echo '<span class="red" >Sorry Approved by name is not valid</span></br>';
            }
            /* } else {
              echo '<span class="red" >Sorry Payee Id is not valid</span></br>';
              } */
        } else {
            echo '<span class="red" >Receiver Name is not valid</span></br>';
        }
    }

    public function saccopettyexpense($user, $tid, $tname, $amount, $ptype, $cheque, $apby, $date, $status, $reason, $recvr, $recvrid, $comments, $session, $submit, $id) {


//$one = 3.65;
//$amount = $amt / $one;

        $this->_user = $user;
        if (namevalidation($recvr)) {
            if (floatvalidation($recvrid)) {
                if (namevalidation($apby)) {
                    if ($status == "") {
                        echo '<span class="red" >Please fill in the payment status</span></br>';
                    } else {
                        if ($tname == "") {
                            echo '<span class="red" >Please select the acount name</span></br>';
                        } else {
                            if ($ptype == "") {
                                echo '<span class="red" >Please select the payment type</span></br>';
                            } else {

//if (floatvalidate($amount)) {

                                $chtqry = mysql_query('select * from paymentout where transid="' . base64_encode($tid) . '" and transname="' . base64_encode($tname) . '" and chequeno="' . base64_encode($cheque) . '" and approvedby="' . base64_encode($apby) . '" and reasons="' . base64_encode($reason) . '" and comments="' . base64_encode($comments) . '" and date="' . base64_encode($date) . '" and receiver="' . base64_encode($recvr) . '" and  receiverid="' . base64_encode($recvrid) . '"') or die(mysql_error());
                                if (mysql_num_rows($chtqry) == 1) {
                                    echo '<span class="red" >Sorry that transaction has been processed</span>';
                                } else {
                                    $inqry = mysql_query('insert into paymentout values("' . base64_encode($tname) . '","' . base64_encode($tid) . '",
                "' . base64_encode($amount) . '"
                ,"' . base64_encode($ptype) . '","' . base64_encode($cheque) . '","' . base64_encode($apby) . '","' . base64_encode($status) . '",
                    "' . base64_encode($recvr) . '",
                    "' . base64_encode($recvrid) . '","' . base64_encode($reason) . '",
                        "' . base64_encode($comments) . '","' . base64_encode(date("d-M-Y")) . '","' . base64_encode($id) . '","","' . $session . '")') or die(mysql_error());
                                    if ($inqry) {
                                        if ($ptype == 4) {

                                            //$null = NULL;
                                            $sth = mysql_query("SELECT * FROM  banking WHERE audituser='" . base64_encode(getusername($user)) . "' AND bankname='" . base64_encode($name) . "' AND branch='" . base64_encode($branch) . "' AND 	accno='" . base64_encode($accno) . "' AND  amount='" . base64_encode($amount) . "' AND  mode='" . base64_encode('withdraw') . "' AND 	ptype='" . base64_encode($ptype) . "' AND	approvedby='" . base64_encode($apby) . "' AND	status='" . base64_encode('active') . "' AND	comments='" . base64_encode($recvr) . "' AND	transid='" . base64_encode($tid) . "' AND	date='" . base64_encode($date) . "' ");
                                            if (mysql_num_rows($sth) == 0) {
                                                $query = mysql_query('insert into banking values("' . base64_encode(getusername($user)) . '", "' . base64_encode(getbankname($id)) . '","' . base64_encode(getbankbranch($id)) . '","' . base64_encode(getbankaccount($id)) . '", "' . base64_encode($amount) . '", "' . base64_encode("withdraw") . '", "' . base64_encode($ptype) . '", "' . base64_encode($apby) . '", "' . base64_encode('active') . '", "' . base64_encode($recvr) . '", "' . base64_encode($tid) . '","' . base64_encode($date) . '","' . base64_encode("Not Reconciled") . '","")') or die(mysql_error());
                                            }
                                        }
                                        $users = new Users();
                                        $activity = "Added Petty Cash Expense  " . ($tid);
                                        $users->audittrail($user, $activity, $user);
                                        $alert = '<script type="text/javascript">alert("Petty Cash Expense saved successfully!");</script>';
                                        echo $alert;
                                        if ($submit == "2") {
                                            expensereceipt($user, $tid, $tname, $amount, $ptype, $cheque, $apby, $recvr, $recvrid, $session);
                                        }
                                    } else {
                                        $alertyes = '<script type="text/javascript">alert("Expense failed to process!");</script>';
                                        echo $alertyes;
                                    }
                                }
                                /*   } else {
                                  echo '<span class="red" >Enter a valid amount</span></br>';
                                  }
                                 * 
                                 */
                            }
                        }
                    }
                } else {
                    echo '<span class="red" >Sorry Approved by name is not valid</span></br>';
                }
            } else {
                echo '<span class="red" >Sorry Payee Id is not valid</span></br>';
            }
        } else {
            echo '<span class="red" >Receiver Name is not valid</span></br>';
        }
    }

    public function applyloan($user, $mno, $ltype, $purpose, $ins, $tid, $amount, $appdate, $gperiod, $mode, $refNo) {
        $this->_user = $user;
        $this->_mno = $mno;

        if (floatvalidat($amount, $ltype)) {

            mysql_query('BEGIN') or die(mysql_error());

            $balance = querytotal($mno);

            $factor = getloanfactor($ltype);

            $tamout = $amount / $factor;

            if ($tamout > $balance) {

                echo '<script type="text/javascript">alert("Sorry you have exceeded the Maximum Amount Factor your Saving can offer you!");</script>';
            } else {

                if ($amount > getmax($ltype)) {
                    echo '<span class="red" >Sorry you have exceeded the Maximum amount limit of the ' . getloaname($ltype) . ' which is ' . getsymbol() . '.' . number_format(getmax($ltype), 2) . '</span></br>';
                } else {

                    $chqry = mysql_query('select * from loanapplication where transactionid="' . base64_encode($tid) . '" and membernumber="' . base64_encode($this->_mno) . '"') or die(mysql_error());
                    if (mysql_num_rows($chqry) >= 1) {
                        echo '<span class="red" >Sorry you have applied for the loan already</span></br>';
                    } else {
                        $qrr = mysql_query('select * from loanapplication where membernumber="' . base64_encode($this->_mno) . '" and loantype="' . base64_encode($ltype) . '"') or die(mysql_error());
                        $one = mysql_fetch_array($qrr);

                        if (base64_decode($one['status']) == "inactive" || base64_decode($one['status']) == "active" || base64_decode($one['status']) == "not disbursed") {

                            echo base64_decode($one['loantype']);
                            echo '<span class="red" >Sorry you have a pending ' . getloaname($ltype) . '</span></br>';
                        } else {
                            $chmqry = mysql_query('select * from newmember where membernumber="' . base64_encode($mno) . '"') or die(mysql_error());
                            if (mysql_num_rows($chmqry) >= 1) {
                                if (intvalidation($ins)) {
                                    $qry = mysql_query('insert into loanapplication values("","' . base64_encode($this->_mno) . '","' . base64_encode($ltype) . '","' . base64_encode($refNo) . '","' . base64_encode($purpose) . '","' . base64_encode($ins) . '","' . base64_encode(date("d-M-Y")) . '","' . base64_encode($appdate) . '","' . base64_encode($gperiod) . '","' . base64_encode($mode) . '","' . base64_encode($tid) . '","' . base64_encode($amount) . '  "  ,"' . ("aW5hY3RpdmU=") . '" ,"","")') or die(mysql_error());
                                    if ($qry) {
                                        $state = base64_encode('Active');
                                        if (checksend_sms() == $state) {
                                            $mem = getMembername(base64_encode($mno));
                                            $sms = 'Dear ' . $mem . ', your ' . loanname(base64_encode($tid)) . ' of ' . getsymbol() . ' ' . $amount . ' has been Applied successfuly ';
                                            echo "<script type=\"text/javascript\">
        window.open('http://sms.truehost.org/sms/send_sms.php?res=" . (phonenumber($mno)) . "&mess=" . $sms . "', '_blank')
    </script>";
                                        }
                                        $users = new Users();
                                        $activity = "added loan for " . getMembername(base64_encode($mno)) . ' amounting to ' . $amount;
                                        $users->audittrail($_SESSION['users'], $activity, $user);
                                        $alertyes = '<script type="text/javascript">alert("Loan application was successful!");</script>';
                                        echo $alertyes;
//selfguarantor($mno, $amount, $balance, $tid);
                                        mysql_query('COMMIT') or die(mysql_error());
                                    } else {
                                        mysql_query('ROLLBACK') or die(mysql_error());
                                        $alert = '<script type="text/javascript">alert("Loan application failed!");</script>';
                                        echo $alert;
                                    }
                                } else {
                                    echo '<span class="red" >Sorry Number of months is not correct</span></br>';
                                }
                            } else {
                                echo '<span class="red" >Sorry member number was not found</span></br>';
                            }
                        }
                    }
                }
                //}
            }
        } else {
            echo '<span class="red" >Sorry the Minimum Loan that can be disbursed is ' . getsymbol() . '.' . number_format(getmin($ltype), 2) . '</span>';
        }
    }

    public function addguarantors($user, $gno, $gtype, $gamount, $collateral, $comment, $tid, $mno, $date, $name) {

        if ($gtype == '1') {

            $maxguarantors = maxnoguarantors(getloanid(loanname(base64_encode($tid))));

            $grqry = mysql_query('select * from guarantors where transactionid="' . base64_encode($tid) . '" and status="' . base64_encode("granted") . '"') or die(mysql_error());

            if (mysql_num_rows($grqry) >= $maxguarantors) {

                echo '<span class="red">Sorry, The Maximum Guarantors Limit For ' . loanname(base64_encode($tid)) . ' is ' . $maxguarantors . ' member(s)</span></br>';
                $alertt2 = '<script type="text/javascript">alert("Sorry, The Maximum Guarantors Limit For ' . loanname(base64_encode($tid)) . ' is ' . $maxguarantors . ' member(s)");</script>';
                echo $alertt2;
            } else {
                $amount = $gamount;

                $balance = querytotal($gno);

                if ($amount > $balance) {

                    echo '<span class="red" >Sorry the Maximum amount your Guarantor can Offer you is ' . getsymbol() . ' ' . $balance . '</span></br>';
                    $alertt3 = '<script type="text/javascript">alert("Sorry the Maximum amount your Guarantor can Offer you is ' . getsymbol() . ' ' . $balance . '");</script>';
                    echo $alertt3;
                } else {

                    mysql_query('BEGIN') or die(mysql_error());

                    $chqry = mysql_query('select * from guarantors where memberno="' . base64_encode($mno) . '" and guarantorno="' . base64_encode($gno) . '" and transactionid="' . base64_encode($tid) . '"  AND name="' . base64_encode($name) . '" ') or die(mysql_error());
                    if (mysql_num_rows($chqry) >= 1) {
                        echo '<span class="red">Guarantor details have been captured already</span>';
                        $alertt4 = '<script type="text/javascript">alert("Guarantor details have been captured already");</script>';
                        echo $alertt4;
                    } else {


                        if (floatvalidat($amount)) {
                            $gqry = mysql_query('insert into guarantors values("' . base64_encode($mno) . '","' . base64_encode($gno) . '",
                "' . base64_encode($amount) . '","' . base64_encode($date) . '","' . base64_encode($comment) . '",
                    "","' . base64_encode($tid) . '","' . base64_encode("granted") . '","' . base64_encode($name) . '" )') or die(mysql_error());
                            if ($gqry) {
                                mysql_query('COMMIT') or die(mysql_error());
                                $users = new Users();
                                $activity = "added guarantor" . getMembername(base64_encode($gno)) . " for loan applicant " . getMembername(base64_encode($mno));
                                $state = base64_encode('Active');
                                if (checksend_sms() == $state) {
                                    $mem = getMembername(base64_encode($mno));
                                    $gn = getMembername(base64_encode($gno));
                                    $sms = 'Dear ' . $gn . ', you have successfully guaranteed ' . $mem . ' with ' . getsymbol() . ' ' . $amount . ' ';
                                    echo "<script type=\"text/javascript\">
        window.open('http://sms.truehost.org/sms/send_sms.php?res=" . (phonenumber($mno)) . "&mess=" . $sms . "', '_blank')
    </script>";
                                }
                                $alertt = '<script type="text/javascript">alert("Guarantors Amount captured successful!");</script>';

                                echo $alertt;
                            } else {
                                mysql_query('ROLLBACK') or die(mysql_error());
                                $alert = '<script type="text/javascript">alert("Guarantors details failed to add!");</script>';
                                echo $alert;
                            }
                        } else {
                            echo '<span class="red">Sorry amount is not valid</span></br>';
                        }
                    }
                }
            }
        } else {

            $bal = getvaluecollateral($collateral);

            $chqry = mysql_query('select * from guarantors where memberno="' . base64_encode($mno) . '" and guarantorno="' . base64_encode($gno) . '" and transactionid="' . base64_encode($tid) . '"') or die(mysql_error());
            if (mysql_num_rows($chqry) >= 1) {
                echo '<span class="red">Guarantor details have been captured already</span>';
            } else {
                $chqqry = mysql_query('select * from newmember where membernumber="' . base64_encode($gno) . '"') or die(mysql_error());
                if (mysql_num_rows($chqqry) >= 1) {

                    if (floatvalidat($bal)) {
                        $gqry = mysql_query('insert into guarantors values("' . base64_encode($mno) . '","' . base64_encode($gno) . '",
                "' . base64_encode($bal) . '","' . base64_encode(date("d-M-Y")) . '","' . base64_encode($comment) . '",
                    "","' . base64_encode($tid) . '","' . base64_encode("granted") . '","' . base64_encode($name) . '")') or die(mysql_error());
                        if ($gqry) {
                            mysql_query('COMMIT') or die(mysql_error());
                            $users = new Users();
                            $activity = "added collateral as guarantor " . ($gno) . " for loan applicant " . getMembername(base64_encode($mno));
                            $users->audittrail($user, $activity, $mno);
                            $alertr = '<script type="text/javascript">alert("Guarantors Collateral captured successful!");</script>';
                            echo $alertr;
                        } else {
                            mysql_query('ROLLBACK') or die(mysql_error());
                            $alertr = '<script type="text/javascript">alert("Guarantors Collateral failed to add!");</script>';
                            echo $alertr;
                        }
                    } else {
                        echo '<span class="red">Sorry amount is not valid</span></br>';
                    }
                } else {
                    echo '<span class="red">Sorry Guarantors Collateral was not found</span></br>';
                }
            }
        }
    }

    public function accounts($user, $acname, $actype, $status, $comments) {
        $this->_user = $user;
        $chqry = mysql_query('select * from accounts where acname="' . base64_encode(strtolower($acname)) . '"') or die(mysql_error());
        if (mysql_num_rows($chqry) >= 1) {
            echo '<span class="red" >Sorry account name ' . $acname . ' exists</span>';
        } else {
            $inqry = mysql_query('insert into accounts values("","' . base64_encode(strtolower($acname)) . '","' . base64_encode($actype) . '",
                "' . base64_encode($comments) . '","' . base64_encode($status) . '","' . base64_encode(date("d-M-Y")) . '")') or die(mysql_error());
            if ($inqry) {
                $aler = '<script type="text/javascript">alert("Account added successfuly!");</script>';
                echo $aler;
            } else {
                $alertr = '<script type="text/javascript">alert("Account failed to be saved!");</script>';
                echo $alertr;
            }
        }
    }

    public function glaccounts($user, $acname, $actype, $accgrp, $status) {
        $this->_user = $user;
        $chqry = mysql_query('select * from glaccounts where acname="' . base64_encode($acname) . '"') or die(mysql_error());
        if (mysql_num_rows($chqry) >= 1) {
            echo '<span class="red" >Sorry the GL Account name ' . $acname . ' exists</span>';
        } else {
            $inqry = mysql_query('insert into glaccounts values("","' . base64_encode($acname) . '","' . base64_encode($actype) . '",
                "' . base64_encode($accgrp) . '","' . ($status) . '","' . base64_encode(date("d-M-Y")) . '")') or die(mysql_error());
            if ($inqry) {
                $users = new Users();
                $activity = "added GL account " . $acname;
                $users->audittrail($user, $activity, $user);
                $alert = '<script type="text/javascript">alert("GL Account Sucessfuly To Be Saved!");</script>';

                echo $alert;
            } else {
                $alertr = '<script type="text/javascript">alert("GL Account Failed To Be Saved!");</script>';
                echo $alertr;
            }
        }
    }

    public function liabilitys($user, $lname, $lamount, $status, $comments, $acc) {
        $this->_user = $user;
        $chqry = mysql_query('select * from liabilities where lname="' . base64_encode(strtolower($lname)) . '"') or die(mysql_error());
        if (mysql_num_rows($chqry) >= 1) {
            echo '<span class="red" >Sorry liability ' . $lname . ' exists</span>';
        } else {
            $inqry = mysql_query('insert into liabilities values("","' . base64_encode($acc) . '","' . base64_encode(strtolower($lname)) . '","' . base64_encode($lamount) . '",
                "' . base64_encode($comments) . '","' . base64_encode($status) . '","' . base64_encode(date("d-M-Y")) . '")') or die(mysql_error());
            if ($inqry) {
                $alert = '<script type="text/javascript">alert("Liability added successfuly!");</script>';
                echo $alert;
            } else {
                $alertd = '<script type="text/javascript">alert("Liability failed to be saved!");</script>';
                echo $alertd;
            }
        }
    }

    public function assetss($user, $asname, $asvalue, $status, $comments, $acc) {
        $this->_user = $user;
        $chqry = mysql_query('select * from assets where asname="' . base64_encode(strtolower($asname)) . '"') or die(mysql_error());
        if (mysql_num_rows($chqry) >= 1) {
            echo '<span class="red" >Sorry asset ' . $asname . ' exists</span>';
        } else {
            $inqry = mysql_query('insert into assets values("","' . base64_encode($acc) . '","' . base64_encode(strtolower($asname)) . '","' . base64_encode($asvalue) . '",
                "' . base64_encode($comments) . '","' . base64_encode($status) . '","' . base64_encode(date("d-M-Y")) . '")') or die(mysql_error());
            if ($inqry) {
                $users = new Users();
                $activity = "added asset " . $asname;
                $users->audittrail($user, $activity, $user);
                $alertd = '<script type="text/javascript">alert("Asset added successfuly!");</script>';
                echo $alertd;
            } else {
                $alert = '<script type="text/javascript">alert("Asset failed to be saved!");</script>';
                echo $alert;
            }
        }
    }

    public function addassets($user, $sasset, $lasset, $asvalue, $assetcat, $assetloc, $barcode, $serial, $deptype, $deprate) {

        $chqry = mysql_query('select * from fixedassets where sassets="' . base64_encode(($sasset)) . '" and lassets="' . base64_encode($lasset) . '"') or die(mysql_error());
        if (mysql_num_rows($chqry) >= 1) {
            $_SESSION['error'] = 'Sorry The Fixed Asset ' . $sasset . ' exists';
        } else {
            $inqry = mysql_query('insert into fixedassets values("' . base64_encode($user) . '","' . base64_encode(($sasset)) . '","' . base64_encode(($lasset)) . '"
            ,"' . base64_encode(($asvalue)) . '","' . base64_encode(($assetcat)) . '", "' . base64_encode($assetloc) . '", "' . base64_encode($barcode) . '"
                , "' . base64_encode($serial) . '", "' . base64_encode($deptype) . '", "' . base64_encode($deprate) . '", "' . base64_encode(date("d-M-Y")) . '", "")') or die(mysql_error());
            if ($inqry) {

                $users = new Users();
                $activity = "add acount " . $acname . " of type " . $actype;
                $users->audittrail($user, $activity, $user);
                $alertyes = '<script type="text/javascript">alert("Fixed Asset added successfuly!");</script>';
                $_SESSION['success'] = $alertyes;
            } else {
                $alert = '<script type="text/javascript">alert("Fixed Asset failed to be saved!");</script>';
                $_SESSION['error'] = $alert;
            }
        }
    }

    public function banking($user, $name, $branch, $acc, $amt, $mode, $app, $comm, $trans, $dates, $ptype, $status, $accFrom) {
        $date = date("d-M-Y", strtotime($dates));
        //$bnkid=$name;
        if (floatvalidation($acc)) {
            if (floatvalidation($amt)) {
                if (namevalidation($mode)) {
                    /* if (namevalidation($app)) {  */
                    //if (namevalidation($status)) {
                    $chqry = mysql_query('select * from banking where transid="' . base64_encode($trans) . '"') or die(mysql_error());
                    if (mysql_num_rows($chqry) >= 1) {
                        echo '<span class="red" >Sorry The Transaction already exists</span>';
                    } else {

                        //                                                          accno,amount,                                                           mode,ptype,approvedby,status,comments,transid,date,state,primarykey
                        $inqry = mysql_query('insert into banking values("' . base64_encode(getusername($user)) . '", "' . base64_encode($name) . '","' . base64_encode($branch) . '","' . base64_encode($acc) . '", "' . base64_encode($amt) . '", "' . base64_encode($ptype) . '", "' . base64_encode($mode) . '", "' . base64_encode($app) . '", "' . base64_encode($status) . '", "' . base64_encode($comm) . '", "' . base64_encode($trans) . '", "' . base64_encode($date) . '", "", "' . base64_encode("Not Reconciled") . '","' . base64_encode($name) . '","' . base64_encode($accFrom) . '","" )') or die(mysql_error());

                        //adjustment
                        mysql_query('insert into paymentin values("' . base64_encode($mode) . '","' . base64_encode($trans) . '",
                                            "' . base64_encode($amt) . '","' . base64_encode("adjustments") . '","' . base64_encode($apby) . '",
                        "' . base64_encode($status) . '","' . base64_encode() . '"
                                                    ,"' . base64_encode() . '","' . base64_encode($ptype) . '",
                                                    "' . base64_encode($date) . '","' . base64_encode($accFrom) . '","", "NULL")') or die(mysql_error());

                        ///
                        if ($inqry) {
                            $users = new Users();
                            $activity = "Added banking transaction " . base64_decode($trans) . ' to the ' . base64_decode($name) . ' bank';
                            $users->audittrail($user, $activity, $user);
                            $alertyes = '<script type="text/javascript">alert("Bank Transaction saved!");</script>';
                            echo $alertyes;
                        } else {
                            $alert = '<script type="text/javascript">alert("failed to save!");</script>';
                            echo $alert;
                        }
                    }
                    /* } else {
                      echo 'Select a Valid Status';
                      }
                      } else {
                      echo 'Invalid Approving ';
                      } */
                } else {
                    echo 'Select a Valid Account Type';
                }
            } else {
                echo 'Invalid Amount';
            }
        } else {
            echo 'Invalid Account Number';
        }
    }

    public function addbank($user, $name, $branch, $acc) {
        if (namevalidation($name)) {
            if (floatvalidation($acc)) {

                $chqry = mysql_query('select * from addbank where bankname="' . base64_encode($name) . '" and branch="' . base64_encode($branch) . '"') or die(mysql_error());
                if (mysql_num_rows($chqry) >= 1) {
                    echo '<span class="red">Sorry The Bank & Account already exists</span>';
                } else {

                    $inqry = mysql_query('insert into addbank values("' . base64_encode(($user)) . '", "' . base64_encode($name) . '","' . base64_encode($branch) . '","' . base64_encode($acc) . '", "' . base64_encode('Active') . '","' . base64_encode(date('d-M-Y')) . '","")') or die(mysql_error());

                    if ($inqry) {
                        $users = new Users();
                        $activity = "added new bank " . $name . ' ,branch ' . $branch . ' and account ' . $acc;
                        $users->audittrail("Admin", $activity, "Admin");
                        $alertyes = '<script type="text/javascript">alert("' . $name . ' saved successfully!");</script>';
                        echo $alertyes;

                        $accode = '12120' . mysql_insert_id();
                        $user = new User();
                        $user->glaccounts($user, $accode, $name, '1', base64_encode('Active'));
                    } else {
                        $alert = '<script type="text/javascript">alert("Bank Creation failed to process, Try Again!");</script>';
                        echo $alert;
                    }
                }
            } else {
                echo 'Invalid Account Number';
            }
        } else {
            echo 'Bank name is Invalid';
        }
    }

    public function settingsupdate($user, $days, $aed, $usd, $bank, $date, $definsurance, $deflegal, $accruedInter, $currency, $defsav, $defsavbal, $defshare, $defsharebal, $defprocessing, $maxloan, $system_url, $dashboard_url) {



        $defaultsavings = getgliddefaultsaving($defsavbal) . '' . $defsav;
        $defaultshares = getglcodedefaultshares($defsharebal) . '' . $defshare;
        if (floatvalidation($days)) {

            if (floatvalidation($aed)) {
                if (floatvalidation($usd)) {
                    if (floatvalidation($bank)) {
                        $qry = mysql_query('update settings set days="' . base64_encode($days) . '", legalfees="", aed="' . base64_encode($aed) . '", usd="' . base64_encode($usd) . '", defaultbank="' . base64_encode($bank) . '",financial_year="' . base64_encode($date) . '", defaultcurrency="' . base64_encode($currency) . '", defaultsavingacc="' . base64_encode($defaultsavings) . '", minsavingbal="' . base64_encode($defsavbal) . '", defaultshareacc="' . base64_encode($defaultshares) . '", minsharebal="' . base64_encode($defsharebal) . '",def_insurance_fee ="' . base64_encode($definsurance) . '", def_legal_fee="' . base64_encode($deflegal) . '", def_processing_fee ="' . base64_encode($defprocessing) . '",maxloan ="' . base64_encode($maxloan) . '",accruedincome="' . base64_encode($accruedInter) . '",system_url ="' . base64_encode($system_url) . '",dashboard_url ="' . base64_encode($dashboard_url) . '" where id="1"') or die(mysql_error());
                        if ($qry) {
                            $users = new Users();
                            $activity = "updated settings ";
                            $users->audittrail("Admin", $activity, "Admin");
                            $alert = '<script type="text/javascript">alert("Settings updated successfully!");</script>';
                            echo $alert;
                        } else {
                            $alertd = '<script type="text/javascript">alert("Sorry Settings update failed!");</script>';
                            echo $alertd;
                        }
                    } else {
                        echo '<span class="red" >Sorry Default Bank is not valid</span></br>';
                    }
                } else {
                    echo '<span class="red" >Sorry USD to KSH rate is not valid</span></br>';
                }
            } else {
                echo '<span class="red" >Sorry AED to KSH rate is not valid</span></br>';
            }
        } else {
            echo '<span class="red" >Sorry Number of Days Entered is not valid</span></br>';
        }
    }

    public function receiptfooter($user, $message) {

        $test = mysql_query('select * from receipt_footer where message="' . base64_encode($message) . '"') or die(mysql_error());
        if (mysql_num_rows($test) >= '1') {

            $alerta = '<script type="text/javascript">alert("Sorry, This Receipt Footer Message Already Exists.");</script>';
            echo $alerta;
        } else {

            $inqry = 'UPDATE receipt_footer SET status="' . base64_encode('Inactive') . '"';
            $result = mysql_query($inqry);
            mysql_query($result);

            $date = time();
            $savefooter = mysql_query('INSERT INTO receipt_footer VALUES ("","' . base64_encode($message) . '","' . base64_encode('Active') . '","' . base64_encode($date) . '")') or die(mysql_error());
            if ($savefooter) {
                $users = new Users();
                $activity = "added new receipt footer message " . $message;
                $users->audittrail("Admin", $activity, "Admin");
                $alert = '<script type="text/javascript">alert("receipt footer added successfully!");</script>';
                echo $alert;
            } else {
                $alertd = '<script type="text/javascript">alert(" failed to add receipt footer!");</script>';
                echo $alertd;
            }
        }
    }

    public function details($user, $name, $phaddress, $poaddress, $branchno, $telno, $email, $mobile, $website, $slogan, $photo) {
        $this->_user = $user;
        if (floatvalidate($photo)) {
            $inqry = 'UPDATE saccodetails SET compname="' . base64_encode($name) . '", postaladdress="' . base64_encode($poaddress) . '", phyaddress="' . base64_encode($phaddress) . '", branchnumber="' . base64_encode($branchno) . '", telnumber="' . base64_encode($telno) . '", emailaddress="' . base64_encode($email) . '", mobileno="' . base64_encode($mobile) . '", website="' . base64_encode($website) . '", slogan="' . base64_encode($slogan) . '" where id="1"';
        } else {
            $dlqry = mysql_query('select * from saccodetails where id="1"') or die(mysql_error());
            $reslt = mysql_fetch_array($dlqry);
            unlink("photos/" . base64_decode($reslt['logo']));
            $inqry = 'UPDATE saccodetails SET logo="' . base64_encode($photo) . '",compname="' . base64_encode($name) . '", postaladdress="' . base64_encode($poaddress) . '", phyaddress="' . base64_encode($phaddress) . '", branchnumber="' . base64_encode($branchno) . '", telnumber="' . base64_encode($telno) . '", emailaddress="' . base64_encode($email) . '", mobileno="' . base64_encode($mobile) . '", website="' . base64_encode($website) . '", slogan="' . base64_encode($slogan) . '" where id="1"';
        }
        $result = mysql_query($inqry);
        mysql_query($result);
        if ($inqry) {
            $users = new Users();
            $activity = "updated sacco details: name:" . $name . ' phone: ' . $telno . ' ' . 'email:' . $email;
            $users->audittrail("Admin", $activity, "Admin");
            echo '<span class="green" >Details Updated successfully</span>';
        } else {
            echo '<span class="red" >Details failed to be saved</span>';
        }
    }

    public function borrowedloan($user, $transactionid, $amounta, $mtpy, $intrst, $install, $date) {

        $chloan = mysql_query('select * from loans where transid="' . base64_encode($transactionid) . '"') or die(mysql_error());
        if (mysql_num_rows($chloan) >= 1) {
            echo '<span class="red" >Sorry loan has already been processed</span></br>';
        } else {

            $gdqry = mysql_query('select * from loanapplication where transactionid="' . base64_encode($transactionid) . '"') or die(mysql_error());
            $gdrslt = mysql_fetch_array($gdqry);
            $loanid = (base64_decode($gdrslt['loantype']));

            //insurance fee
            if (getinsfee($loanid) == 'Formulae') {

                $insuarancerate = round(((5.03 * $install) + 3.03) * $amounta / 6000);
                $deduct1 = $insuarancerate;
            } else {

                $insuarancerate = getinsfee($loanid);
                $deduct1 = ($insuarancerate / 100) * $amounta;
            }


            //check if the loan has the range
            if (processingLoanId($loanid) == $loanid) {

//get processing fee table details
                foreach (getProcessingfee($loanid) as $processfee) {


                    if (($amounta >= base64_decode($processfee['amountfrom'])) && ($amounta <= base64_decode($processfee['amountto']))) {
                        $deductProcessingFee = base64_decode($processfee['amount']);
                    }
                }
            } else {

                //use the rate in loan setings as processing fee
                $processingfee = getlafee($loanid);
                $deductProcessingFee = ($processingfee / 100) * $amounta;
            }

            //legal fees
            $legalFees = getlegalfees();

            $totaldeds = $deduct1 + $deductProcessingFee + $legalFees;
            $amount = $amounta - $totaldeds;
//}

            $adloan = mysql_query('insert into loans values("","' . $gdrslt['membernumber'] . '","' . base64_encode($amounta) . '","' . base64_encode($mtpy) . '","' . base64_encode($date) . '","' . base64_encode("active") . '","' . base64_encode($transactionid) . '", "")') or die(mysql_error());
            $adloan99 = mysql_query('insert into loandisburse values("","' . $gdrslt['membernumber'] . '","' . base64_encode($amount) . '","' . base64_encode($mtpy) . '","' . base64_encode($date) . '","' . base64_encode("active") . '","' . base64_encode($transactionid) . '", "")') or die(mysql_error());

            if ($adloan) {

                if ($deductProcessingFee > 0) {

                    $inqry = mysql_query('insert into extracash (efee,membernumber,loantype,amount,transactionid,auditdate,audituser,status) values("' . base64_encode($deductProcessingFee) . '","' . $gdrslt['membernumber'] . '","' . base64_encode($loanid) . '", "' . base64_encode($amount) . '","' . (base64_encode($transactionid)) . '","' . base64_encode(getappdate(base64_encode($transactionid))) . '", "' . base64_encode($user) . '", "' . base64_encode('active') . '")') or die(mysql_error());

                    mysql_query('insert into paymentin values("' . defaultProcessingFee() . '","' . base64_encode($transactionid) . '","' . base64_encode($deductProcessingFee) . '"
                      ,"' . base64_encode('loan fees') . '","' . base64_encode('sacco officials') . '","' . base64_encode('null') . '","' . base64_encode(getMembername($gdrslt['membernumber'])) . '",
                      "' . ($gdrslt['membernumber']) . '","' . base64_encode('ok') . '","' . base64_encode($date) . '","' . getdefaultbank() . '","","' . $session . '")') or die(mysql_error());
                    //mysql_query("INSERT INTO   loaninsurance (mno,date,tid,amount )  VALUES('" . $gdrslt['membernumber'] . "','" . base64_encode($date) . "','" . base64_encode($transactionid) . "','" . base64_encode($deductProcessingFee) . "')");
                    //}
                }

                if ($deduct1 > 0) {
                    mysql_query('insert into paymentin values("' . defaultInsuranceFee() . '","' . base64_encode($transactionid) . '","' . base64_encode($deduct1) . '"
                      ,"' . base64_encode('loan fees') . '","' . base64_encode('sacco officials') . '","' . base64_encode('null') . '","' . base64_encode(getMembername($gdrslt['membernumber'])) . '",
                      "' . ($gdrslt['membernumber']) . '","' . base64_encode('ok') . '","' . base64_encode($date) . '","' . getdefaultbank() . '","","' . $session . '")') or die(mysql_error());
                    mysql_query("INSERT INTO   loaninsurance (mno,date,tid,amount )  VALUES('" . $gdrslt['membernumber'] . "','" . base64_encode($date) . "','" . base64_encode($transactionid) . "','" . base64_encode($deduct1) . "')");
                }

                if (getlegalfees() > 0) {
                    $ssnqry2 = mysql_query('insert into paymentin values("' . defaultLegalFee() . '","' . base64_encode($transactionid) . '","' . base64_encode(getlegalfees()) . '"
                      ,"' . base64_encode('loan fees') . '","' . base64_encode('sacco officials') . '","' . base64_encode('null') . '","' . base64_encode(getMembername($gdrslt['membernumber'])) . '",
                      "' . ($gdrslt['membernumber']) . '","' . base64_encode('ok') . '","' . base64_encode($date) . '","' . getdefaultbank() . '","","' . $session . '")') or die(mysql_error());
                }

                $chinqry = mysql_query('select * from loanintrests where transid="' . base64_encode($transactionid) . '"') or die(mysql_error());
                if (mysql_num_rows($chinqry) >= 1) {

                    $alertyes = '<script type="text/javascript">alert("Sorry Loan Processing failed!");</script>';
                    echo $alertyes;
                    mysql_query('ROLLBACK') or die(mysql_error());
                } else {
                    $inqry = mysql_query('insert into loanintrests values("","' . $gdrslt['membernumber'] . '","' . base64_encode($intrst) . '","' . base64_encode("active") . '","' . base64_encode($date) . '","' . base64_encode($transactionid) . '")') or die(mysql_error());
                    if ($inqry) {
                        mysql_query('COMMIT') or die(mysql_error());
                    } else {
                        mysql_query('ROLLBACK') or die(mysql_error());
                        $alerty = '<script type="text/javascript">alert("Sorry Loan Processing failed!");</script>';
                        echo $alerty;
                    }
                }
            } else {

                mysql_query('ROLLBACK') or die(mysql_error());

                $alert = '<script type="text/javascript">alert("Sorry Loan Processing failed!");</script>';
                echo $alert;
            }


            if ($adloan /* || $adloana || $adloanb */) {

                left($gdrslt['membernumber'], base64_encode($transactionid));
                mysql_query('COMMIT') or die(mysql_error());
                $newuser = new Users();
                $activity = "Processed a " . loanname(base64_encode($transactionid)) . " for Member Number " . base64_decode($gdrslt['membernumber']);
                $newuser->audittrail($user, $activity, $user);

                unset($_SESSION['lmid']);
                $gname = getloangl(getloaname($loanid));
                $ona = 'two';
                $user = new User();
                $loan = 'loan';
                $user->memberaccounts($user, base64_decode($gdrslt['membernumber']), $gname, $ona, $loan);

                $alertmi = '<script type="text/javascript">alert("' . loanname($transactionid) . '" for Member Number "' . base64_decode($gdrslt['membernumber']) . '" Loan application was successful");</script>';
                echo $alertmi;
            }
        }
    }

    public function addcrew($user, $name, $id, $mobile, $edate, $status, $residence, $occ, $email, $image) {

        $njum = mysql_query('select * from crew where agid="' . base64_encode($user) . '" and name="' . base64_encode($name) . '" and idno="' . base64_encode($id) . 'and phone="' . base64_encode($mobile) . '" and datereg"' . base64_encode($edate) . '" status="' . base64_encode($status) . '" and residence="' . base64_encode($residence) . '"and career="' . base64_encode($occ) . '" and email="' . base64_encode($email) . '" and picture="' . base64_encode($image) . '"');
        if (mysql_num_rows($njum)) {
            echo '<span class="red" >The Crew Member by the name "' . $name . '" already exists.</span>';
        } else {

            $cru = mysql_query('select * from crew where name="' . base64_encode($name) . '"');
            if (mysql_num_rows($cru)) {
                echo '<span class="red" >A Crew Member by the name "' . $name . '" already exists.</span>';
            } else {

                $cru = mysql_query('select * from crew where idno="' . base64_encode($id) . '"');
                if (mysql_num_rows($cru)) {
                    echo '<span class="red" >A Crew Member by the id "' . $id . '" already exists.</span>';
                } else {

                    $cru = mysql_query('select * from crew where phone="' . base64_encode($mobile) . '"');
                    if (mysql_num_rows($cru)) {
                        echo '<span class="red" >A Crew Member with the phone number "' . $mobile . '" already exists.</span>';
                    } else {

                        $fry = mysql_query('insert into crew values("", "' . base64_encode($user) . '", "' . base64_encode($name) . '", "' . base64_encode($id) . '", "' . base64_encode($mobile) . '", "' . base64_encode($edate) . '", "' . base64_encode($occ) . '", "' . base64_encode($status) . '", "' . base64_encode($email) . '", "' . base64_encode($residence) . '", "' . base64_encode($image) . '")');

                        if ($fry) {
                            $users = new Users();
                            $activity = "added a crew member " . $name;
                            $users->audittrail($user, $activity, $user);
                            $alert = '<script type="text/javascript">alert("Crew Member was successfuly saved!");
                                  document.location.href = "viewcrew.php"; </script>';
                            echo $alert;
                        }
                    }
                }
            }
        }
    }

    public function addividend($user, $yeary, $amt, $comments, $date) {

        $ytime = strtotime($yeary);
        $year = date("Y", $ytime);

        $with = mysql_query('select * from dividends where year="' . base64_encode($year) . '"') or die(mysql_error());
        if (mysql_num_rows($with) >= 1) {
            echo '<span class="red" >Sorry it seems you have already saved the dividend for the year ' . $year . '</span></br>';
        } else {
            $draw = mysql_query('insert into dividends values("' . base64_encode($user) . '","' . base64_encode($year) . '","' . base64_encode($amt) . '"
    ,"' . base64_encode($comments) . '", "' . base64_encode($date) . '","")') or die(mysql_error());
            if ($draw) {
                dividends($year, $amt);
                $alertyes = '<script type="text/javascript">alert("You Have Successfully Saved a Dividend Sum for the Year ' . $year . '!");</script>';
                echo $alertyes;
            } else {
                $aler = '<script type="text/javascript">alert("You Have Failed To Save a Dividend Sum for the Year ' . $year . '!");</script>';
                echo $aler;
            }
        }
    }

    public function checkoff($users, $mno, $date, $amounta, $amountb, $amountc, $amountd, $amounte, $amountf) {

        $amount1 = str_replace(',', '', $amounta);
        $amount2 = str_replace(',', '', $amountb);
        $amount3 = str_replace(',', '', $amountc);
        $amount4 = str_replace(',', '', $amountd);
        $amount5 = str_replace(',', '', $amounte);
        $amount6 = str_replace(',', '', $amountf);

        $reqry = 'UPDATE checkoff SET contr="' . base64_encode($amount1) . '", xmas="' . base64_encode($amount2) . '", shares="' . base64_encode($amount3) . '", entrance="' . base64_encode($amount4) . '", principle="' . base64_encode($amount5) . '", interest="' . base64_encode($amount6) . '" WHERE mno="' . ($mno) . '" and date="' . base64_encode($date) . '"';



        $result = mysql_query($reqry);
        mysql_query($result);

        if ($reqry) {

            echo '<span class="green" >The Check off for the month of ' . $date . ' has been successfully recorded</span></br>';

            mysql_query("COMMIT") or die(mysql_error());
            $users = new Users();
            $activity = "Monthly Check-off for ' . $date . ' has been successfully saved";
            $users->audittrail($users, $activity, $mno);
        } else {

            echo '<span class="red" >Sorry The Check off for the month of ' . $date . ' has already been recorded</span></br>';
        }
    }

    public function psvtomemb($user, $tid, $apby, $status, $facc, $tacc, $comments, $amount, $mno) {
        $minaccount = getminsavingsbal();

        $checktid = mysql_query('select * from paymentin where transid="' . base64_encode($tid) . '" and payeeid="' . base64_encode($mno) . '"') or die(mysql_error());
        if (mysql_num_rows($checktid) == 1) {
            echo '<span class="red">Sorry Transaction has already been recorded</span></br>';
        } else {
            $fromqry = mysql_query('select * from newmember where membernumber="' . base64_encode($mno) . '"') or die(mysql_error());
            if (mysql_num_rows($fromqry) == 1) {
                if (namevalidation($apby)) {
                    if ($facc == "") {
                        echo '<span class="red">Please Fill in From Account</span></br>';
                    } else {
                        if (floatvalidation($amount)) {
                            if ($facc == $tacc) {
                                echo '<span class="red">Account To and From Should not be the same</span></br>';
                            } else {
                                $fromrslt = mysql_fetch_array($fromqry);
                                if ($amount >= (avcheck($_SESSION['users'], $mno))) {
                                    echo '<span class="red">Sorry Amount too big for The Member to transfer </span></br>';
                                } else {
                                    mysql_query("BEGIN") or die(mysql_error());
                                    $reqry = mysql_query('insert into paymentin values("' . base64_encode($tacc) . '","' . base64_encode($tid) . '",
                                            "' . base64_encode($amount) . '","' . base64_encode("adjustments") . '","' . base64_encode($apby) . '",
                                                "' . base64_encode($status) . '","' . base64_encode(getMembername(base64_encode($mno))) . '"
                                                    ,"' . base64_encode($mno) . '","' . base64_encode($comments) . '",
                                                    "' . base64_encode(date("d-M-Y")) . '","","","")') or die(mysql_error());
                                    if ($reqry) {
                                        $conqry = mysql_query('insert into membercontribution values("' . base64_encode("Standing Order(Credit)") . '","' . base64_encode($mno) . '",
                                                "' . base64_encode(getMembername(base64_encode($mno))) . '","' . base64_encode($mno) . '",
                                                    "' . base64_encode($tacc) . '","' . base64_encode($amount) . '","' . base64_encode("none") . '","' . base64_encode("none") . '",
                                                        "' . base64_encode("none") . '","' . base64_encode(date("d-M-Y")) . '","","","","")');

                                        if ($conqry) {
                                            active($mno);
                                            psvactive($mno);

                                            mysql_query("COMMIT") or die(mysql_error());
                                            $users = new Users();
                                            $activity = "Share transfer by " . getMembername(base64_encode($mno)) . " from account " . $facc . ' to account ' . $tacc;
                                            $users->audittrail($user, $activity, $mno);
                                            $alertyes = '<script type="text/javascript">alert("Accounts Transfer was successful!");</script>';
                                            echo $alertyes;
                                        } else {
                                            mysql_query("ROLLBACK");
                                            $alert = '<script type="text/javascript">alert("Sorry Accounts Transfer from ' . $mno . 'Failed!");</script>';
                                            echo $alert;
                                        }
                                    } else {
                                        mysql_query("ROLLBACK");
                                        $alertd = '<script type="text/javascript">alert("Sorry Accounts Transfare from ' . $mno . ' Failed!");</script>';
                                        echo $alertd;
                                    }
                                }
                            }
                        } else {
                            echo '<span class="red">Amount' . $amount . ' is not valid</span></br>';
                        }
                    }
                } else {
                    echo '<span class="red">Sorry ' . $apby . ' name is not valid</span></br>';
                }
            } else {
                echo '<span class="red">Sorry From Member Number ' . $mno . ' was not found</span></br>';
            }
        }
    }

    public function addebtors($user, $dname, $address, $dcont, $demail, $kra, $terms, $creditstatus) {

        $hqry = mysql_query('select * from addebtor where dname="' . base64_encode($dname) . '"') or die(mysql_error());

        if (mysql_num_rows($hqry) >= 1) {
            echo '<span class="red">' . $dname . ' already exists as a Debtor</span></br>';
        } else {

            $cchqry = mysql_query('insert into addebtor values ("", "' . base64_encode($dname) . '", "' . base64_encode($address) . '", "' . base64_encode($dcont) . '", "' . base64_encode($demail) . '", "' . base64_encode($kra) . '", "' . base64_encode($terms) . '", "' . base64_encode($creditstatus) . '", "' . base64_encode('Active') . '", "' . base64_encode($user) . '", "' . base64_encode(date('d-M-Y')) . '")') or die(mysql_error());

            if ($cchqry) {
                $users = new Users();
                $activity = "created new debtor " . $dname;
                $users->audittrail($user, $activity, $user);
                $alertyes = '<script type="text/javascript">alert("' . $dname . ' has successfully been created as a Debtor!");</script>';
                echo $alertyes;
            }
        }
    }

    public function addcreditors($user, $dname, $address, $dcont, $demail, $kra, $terms) {

        $hqry = mysql_query('select * from addcreditor where dname="' . base64_encode($dname) . '"') or die(mysql_error());

        if (mysql_num_rows($hqry) >= 1) {
            echo '<span class="red">' . $dname . ' already exists as a Creditor</span></br>';
        } else {

            $cchqry = mysql_query('insert into addcreditor values ("", "' . base64_encode($dname) . '", "' . base64_encode($address) . '", "' . base64_encode($dcont) . '", "' . base64_encode($demail) . '", "' . base64_encode($kra) . '", "' . base64_encode($terms) . '", "' . base64_encode('Active') . '", "' . base64_encode($user) . '", "' . base64_encode(date('d-M-Y')) . '")') or die(mysql_error());

            if ($cchqry) {
                $users = new Users();
                $activity = "created new creditor " . $dname;
                $users->audittrail($user, $activity, $user);
                $alertt = '<script type="text/javascript">alert("' . $dname . ' has successfully been created as a Creditor!");</script>';
                echo $alertt;
            }
        }
    }

    public function addissuedinvoice($user, $dname, $date, $glacc, $amt, $invno, $duedate, $desc, $status) {
        $date1 = date("d-M-Y", strtotime($date));
        $date2 = date("d-M-Y", strtotime($duedate));

        $hqry = mysql_query('select * from issueinvoice where invno="' . base64_encode($invno) . '"') or die(mysql_error());

        if (mysql_num_rows($hqry) >= 1) {
            echo '<span class="red">Invoice Number ' . $invno . ' already exists</span></br>';
        } else {

            $cchqry = mysql_query('insert into issueinvoice values ("", "' . base64_encode($dname) . '", "' . base64_encode($date1) . '", "' . base64_encode($glacc) . '", "' . base64_encode($amt) . '", "' . base64_encode($invno) . '", "' . base64_encode($date2) . '", "' . base64_encode($desc) . '", "' . base64_encode($status) . '", "' . base64_encode($user) . '", "' . base64_encode(date('d-M-Y')) . '")') or die(mysql_error());

            if ($cchqry) {
                $users = new Users();
                $activity = "created new invoice number " . $invno;
                $users->audittrail($user, $activity, $user);
                $alertyes = '<script type="text/javascript">alert("Invoice Number ' . $invno . ' has been successfully Issued!");</script>';
                echo $alertyes;
                echo '<form action="issueinvoice.php"><div class="two"><button class="btn green">Go Back to Invoices.</button></div></form>';
                $one = mysql_insert_id();
                invoicereceipt($user, $one, $dname, $date1, $glacc, $amt, $invno, $date2, $desc, $status);
            }
        }
    }

    public function addreceivedinvoice($user, $cname, $date, $glacc, $amt, $invno, $duedate, $desc, $status) {
        $date1 = date("d-M-Y", strtotime($date));
        $date2 = date("d-M-Y", strtotime($duedate));

        $hqry = mysql_query('select * from receiveinvoice where invno="' . base64_encode($invno) . '"') or die(mysql_error());

        if (mysql_num_rows($hqry) >= 1) {
            echo '<span class="red">Invoice Number ' . $invno . ' already exists</span></br>';
        } else {

            $cchqry = mysql_query('insert into receiveinvoice values ("", "' . base64_encode($cname) . '", "' . base64_encode($date1) . '", "' . base64_encode($glacc) . '", "' . base64_encode($amt) . '", "' . base64_encode($invno) . '", "' . base64_encode($date2) . '", "' . base64_encode($desc) . '", "' . base64_encode($status) . '", "' . base64_encode($user) . '", "' . base64_encode(date('d-M-Y')) . '")') or die(mysql_error());

            if ($cchqry) {
                $users = new Users();
                $activity = "created new invoice number " . $invno;
                $users->audittrail($user, $activity, $user);
                $alertfail = '<script type="text/javascript">alert("Invoice Number ' . $invno . ' has been successfully Received!");</script>';
                echo $alertfail;
            }
        }
    }

    public function interbank($user, $account_from, $account_to, $transfer_officer, $approved_by, $purpose, $date, $payment_mode, $slip_code, $amount) {

        $quey = mysql_query("INSERT INTO interbank (account_from,account_to,transfer_officer,approved_by,purpose,date,payment_mode,slip_code,amount)VALUES('$account_from','$account_to','$transfer_officer','$approved_by','$purpose','$date','$payment_mode','$slip_code','$amount' )    ");
        if ($quey) {
            $users = new Users();
            $activity = "created new interbank transaction ";
            $users->audittrail($user, $activity, $user);
            $alertfail = '<script type="text/javascript">alert("trasaction added successfully!");</script>';
            echo $alertfail;
        }
    }

    public function addothrsrc($other_cash, $invoice_no, $account, $purpose, $date, $payee, $payment_mode, $receipt_no, $amount, $cdate) {

        $query = mysql_query("INSERT INTO  othercash(other_cash,invoice_no,account,purpose,date,payee,payment_mode,receipt_no,amount,cdate )VALUES('$other_cash','$invoice_no','$account','$purpose','$date','$payee','$payment_mode','$receipt_no','$amount','$cdate')");

        if ($query) {
            $users = new Users();
            $activity = "Added Other Cash From  Other Source";
            $users->audittrail($user, $activity);

            $alertfail = '<script type="text/javascript">alert("trasaction added successfully!");</script>';
            echo $alertyes;
        }
    }

    public function addmode($user, $mode, $status) {
        $sth = mysql_query("SELECT * FROM  paymentmode  WHERE mode='$mode'   ");
        if ((mysql_num_rows($sth)) >= 1) {
            $alert = '<script type="text/javascript">alert("Payment Mode Already Exist!");</script>';
            echo $alert;
        } else {
            $mod = mysql_query("INSERT INTO paymentmode (mode,status)VALUES('$mode','$status')");
            if ($mod) {
                $users = new Users();
                $activity = "Added Mode";
                $users->audittrail($user, $activity, $user);

                $alertfail = '<script type="text/javascript">alert("Mode added successfully!");</script>';
                echo $alertfail;
            }
        }
    }

    public function addcollateral($user, $mno, $descr, $idno, $value, $status, $comment, $image) {

        $hqry = mysql_query('select * from collateral where name="' . base64_encode($descr) . '" and mno="' . base64_encode($mno) . '"') or die(mysql_error());

        if (mysql_num_rows($hqry) >= 1) {
            echo '<span class="red">The Collateral ' . $descr . ' already exists</span></br>';
        } else {

            $cchqry = mysql_query('insert into collateral values ("", "' . base64_encode($image) . '", "' . base64_encode($descr) . '", "' . base64_encode($mno) . '", "' . base64_encode($idno) . '", "' . base64_encode($value) . '", "' . base64_encode($status) . '", "' . base64_encode($comment) . '", "' . base64_encode($user) . '", "' . base64_encode(date('d-M-Y')) . '")') or die(mysql_error());

            if ($cchqry) {
                $users = new Users();
                $activity = "created Collateral " . $descr;
                $users->audittrail($user, $activity, $mno);
                $alertyes = '<script type="text/javascript">alert("Collateral Added successfully  !");</script>';
                echo $alertyes;
            }
        }
    }

    public function addloandis($user, $mno, $glid, $date, $amount, $comment, $tid, $bnkid, $pid, $ref, $bnkAccfrom, $indbank) {
        
        //*********check date of disbursement***************
        $chekdisdate = mysql_query("SELECT * FROM  loanapplication   WHERE transactionid='$tid'   ");
        if (mysql_num_rows($chekdisdate) == 1) {
            $rowd = mysql_fetch_array($chekdisdate);
            $appd = base64_decode($rowd['appdate']);
            $loanapprove = base64_decode($rowd['status']);
        }
        $date2 = strtotime(base64_decode($date)); //convert the date captured from the form to a string to be used in comparison
        $disamt = base64_decode($amount);
        //check wheather loan amount coincides with disbursed amount
        $ccc = mysql_query("SELECT * FROM loanapplication  WHERE  transactionid='$tid'  ");
        $ammm = mysql_fetch_array($ccc);

        //add the total loan disbursed,then minus from the loan applied to get the amount to disburse
        //used when disbursement is done in installments
        $allowabledisamt = base64_decode($ammm['amount']) - addloandisbursed($tid);
        
        $sth = mysql_query("SELECT * FROM loandisbursment  WHERE  tid=$tid ");
        if (mysql_num_rows($sth) >= 1) {
            $alertmi = '<script type="text/javascript">alert("The Disbursement Already Exists For ' . getMembername(($mno)) . ' ' . getloaname(base64_decode($glid)) . ' ");</script>';
            echo $alertmi;
        }
        //check whether the loan has been approved
        elseif ($loanapprove =='inactive' ) {

            $alertapprove = '<script type="text/javascript">alert("The loan has not been approved ");</script>';
            echo $alertapprove;
        }
        //check whether disbursement date is earlier than the application date
        elseif ($appd > $date2) {

            $alertdat = '<script type="text/javascript">alert("The Disbursement date cannot be before the date of application ");</script>';
            echo $alertdat;
        } elseif (mysql_num_rows($ccc) == 0) {
            $alertmi = '<script type="text/javascript">alert("The loan does not exist! ' . $tid . ' ");</script>';
            echo $alertmi;
        }
        //check whether the loan has been fully disbursed
        elseif ($allowabledisamt <= 0) {

            $alertfully = '<script type="text/javascript">alert("The loan has been fully disbursed");</script>';
            echo $alertfully;
        }
        //check whether the amount to be disbursed is greater than the amout applied for
        elseif ((int) $disamt > (int) $allowabledisamt) {

            $alertmi = '<script type="text/javascript">alert("The amount entered  ' . $disamt . ' is greater than the available amount for disbursement' . $allowabledisamt . '");</script>';
            echo $alertmi;
        } elseif ($ammm['status'] == 'Y29tcGxldGVk') {
            $alertmi = '<script type="text/javascript">alert("Payment for this Loan is already complete!");</script>';
            echo $alertmi;
        } else {

            $query = mysql_query("INSERT INTO loandisbursment(mno, glid, date, comments, amount,tid, bnkid, pid, ref,bnkAccfrom,indvAcc)  VALUES ('$mno','$glid','$date','$comment','$amount','$tid','$bnkid', '$pid', '$ref','$bnkAccfrom','$indbank')");
            if ($query) {

                //insert into member contribution
                $paying = base64_encode('loan disbursement');
                mysql_query("INSERT INTO membercontribution(memberno,payee,payeeid, transaction,amount, date) VALUES ('$mno', '            $paying', '$tid','$indbank', '$amount', '$date')");


                mysql_query("UPDATE loanapplication  SET status='" . base64_encode('active') . "'  WHERE   transactionid='$tid'  ");
                //($mno),$tid;$glid;

                mysql_query("UPDATE   memberaccs  SET   status='" . base64_encode('active') . "'  WHERE mno='$mno'  AND glaccid='$glid'  ");
                
                //send an sms alert
                 $state = base64_encode('Active');
                                        if (checksend_sms() == $state) {
                                            $mem = getMembername($mno);
                                            $sms = 'Dear ' . $mem . ',' . getsymbol() . ' ' . base64_decode($amount) . ' has been disbursed into your '. getGlname(base64_decode($indbank)). ' account for the loan '. loanname($tid) ;
                                            echo "<script type=\"text/javascript\">
        window.open('http://sms.truehost.org/sms/send_sms.php?res=" . (phonenumber(base64_decode($mno))) . "&mess=" . $sms . "', '_blank')
    </script>";
                                        }   
                $users = new Users();
                $activity = "Processed Loan " . loanname($tid) . " disbursment for Member number " . base64_decode($mno);
                $users->audittrail($user, $activity, $mno);

                $alert = '<script type="text/javascript">alert("The ' . loanname($tid) . ' was successfully disbursed to ' . getMembername(($mno)) . '.");</script>';
                echo $alert;
            } else {
                $alertf = '<script type="text/javascript">alert("Sorry The ' . loanname($tid) . ' Loan Failed to disburse to ' . getMembername(($mno)) . '.");</script>';
                echo $alertf;
            }
        }
    }

    public function addloanrep($user, $mno, $loanid, $tid, $date, $payno, $start_bal, $interest_payment, $principal_payment, $end_bal, $cumulative_interest, $cumulative_payment) {

        mysql_query("INSERT INTO  loanrepaydates(mno,loanid,tid,dates,payno,start_bal,interest_payment,principal_payment,end_bal,cumulative_interest,cumulative_payment)  VALUES ('$mno','$loanid','$tid','$date','$payno','$start_bal','$interest_payment','$principal_payment','$end_bal','$cumulative_interest','$cumulative_payment')  ");
    }

    public function checkbudget($user, $id, $account, $jay) {

        $reqry = mysql_query('insert into budget values("","' . base64_encode($id) . '","","","")') or die(mysql_error());


        if ($reqry) {

            header('Location:budgetted.php?&no=' . $jay . '&id=' . $id);
        }

        mysql_query("COMMIT") or die(mysql_error());
        $users = new Users();
        $activity = "Budget Check-off for ' . $account . ' has been successfully saved";
        $users->audittrail($users, $activity);
    }

    public function addedbudget($user, $account, $datefrom, $dateto, $amount, $jay) {
        //how many row to be updated
        //
                                 $stmt = mysql_query(" INSERT INTO  budget (account,datefrom,dateto,amount) VALUES ('$account' , '" . base64_encode($datefrom) . "' ,'" . base64_encode($dateto) . "', '" . base64_encode($amount) . "')    ");
        if ($stmt) {
            $users = new Users();
            $activity = "added budget for accunt" . $account;
            $users->audittrail($user, $activity);
            $alert = '<script type="text/javascript">alert("Budget Added!");</script>';
            echo $alert;
            $sth = mysql_query("DELETE     FROM   budget  WHERE  datefrom='" . NULL . "' AND    dateto='" . NULL . "'    AND  	amount='" . NULL . "'     ");
        } else {
            $alertfaill = '<script type="text/javascript">alert("Budget Failed!");</script>';
            echo $alertfaill;
        }
    }

//juma lsk
//
//
//
    //
    public function addappfee($users, $tid, $mno, $amount, $id) {

        $stmt = mysql_query("INSERT INTO  paymentin   ()VALUES( '" . base64_encode(122) . "', '" . base64_encode($tid) . "', '" . base64_encode($amount) . "', '', '', '" . base64_encode(Active) . "', '" . base64_encode($mno) . "', '" . base64_encode($mno) . "', '" . base64_encode(OK) . "', '" . base64_encode(date('d-M-Y')) . "', '" . base64_encode($id) . "','','')           ");
        if ($stmt) {
            $users = new Users();
            $activity = "added loan applicaton fee " . $amount;
            $users->audittrail($users, $activity);
            $alert = '<script type="text/javascript">alert("Loan Application Fee Added!");</script>';
            echo $alert;
        } else {
            $alertfaill = '<script type="text/javascript">alert("Loan Application Fee failed!");</script>';
            echo $alertfaill;
        }
    }

    public function addlegalfee($users, $tid, $mno, $amount, $id) {

        $stmt = mysql_query("INSERT INTO  paymentin  VALUES ( '" . base64_encode(142) . "', '" . base64_encode($tid) . "', '" . base64_encode($amount) . "', '', '', '" . base64_encode(Active) . "', '" . base64_encode($mno) . "', '" . base64_encode($mno) . "', '" . base64_encode(OK) . "', '" . base64_encode(date('d-M-Y')) . "','" . base64_encode($id) . "' ,'','')           ");
        if ($stmt) {
            $users = new Users();
            $activity = "Added legal fee " . $amount;
            $users->audittrail($users, $activity);
            $alert = '<script type="text/javascript">alert("Loan Legal Fee Added!");</script>';
            echo $alert;
        } else {
            $alertfaill = '<script type="text/javascript">alert("Loan Legal Fee failed!");</script>';
            echo $alertfaill;
        }
    }

    public function insertIntoCheck($mno, $org, $mnth, $tid, $amount, $date) {
        if ((base64_decode($amount)) > 0) {


            $sth = mysql_query("INSERT INTO check_off(mno,org,mnth,tid,amount,date,status ) VALUES ('$mno','$org','$mnth','$tid','$amount','$date' ,'" . base64_encode(update) . "')     ");
            if ($sth) {
                $users = new Users();
                $activity = "processed check off for " . $date;
                $users->audittrail($users, $activity);
                $alertr = '<script type="text/javascript">alert(" Check Off Added Successfully!");</script>';
                echo $alertr;
            } else {
                $alert = '<script type="text/javascript">alert(" Check Off Failled To Save!");</script>';
                echo $alert;
            }
        }
    }

    public function createInvoice($glacc, $acc, $amount) {

        $sth = mysql_query("SELECT * FROM   vehicleaccount  WHERE  glacc='$glacc' AND 	account='$acc' AND	amount='$amount'   ");
        $qry = mysql_query("SELECT * FROM   vehicleaccount   ORDER BY id DESC");
        while ($row = mysql_fetch_array($qry)) {

            $id = $row['id'];
        }
        if ($id == null)
            echo $idd = 1;
        else
            echo $idd = $id + 1;


        $accountno = base64_decode($glacc) . '000' . $idd;

        if (mysql_num_rows($sth) >= 1) {
            $alertr = '<script type="text/javascript">alert(" Transaction Already Exist!");</script>';
            echo $alertr;
        } else {
            $stmt = mysql_query("INSERT INTO  vehicleaccount(glacc,accountno,account,amount  ) VALUES('$glacc','" . base64_encode($accountno) . "','$acc','$amount')   ");
            if ($stmt) {
                $alert = '<script type="text/javascript">alert(" Account saved Sucessfully!");</script>';
                echo $alert;
            } else {
                $alertf = '<script type="text/javascript">alert("Account failed to save!");</script>';
                echo $alertf;
            }
        }
    }

    public function invoiceVehicle($vid, $acc, $date, $amount) {

        $sth = mysql_query("SELECT * FROM    vehicleinvoice  WHERE  vid='$vid'  AND  acc='$acc'  AND 	amount='$amount'   AND 	status='" . base64_encode('active') . "'   AND date='$date'  ");
        if (mysql_num_rows($sth) >= 1) {
            $alertr = '<script type="text/javascript">alert(" Transaction Already Exist!");</script>';
            echo $alertr;
        } else {
            $stmt = mysql_query("INSERT INTO  vehicleinvoice(vid,acc,date,amount,status) VALUES('$vid','$acc','$date','$amount','" . base64_encode('active') . "')   ");
            if ($stmt) {
                // $user=new Registermember();
                //$user->  memberaccounts ($user, base64_decode(vehicleOwner(base64_decode($vid))), getMainGl(base64_decode($acc)) )  ;
                $alert = '<script type="text/javascript">alert("Invoice saved Sucessfully!");</script>';
                echo $alert;
            } else {
                $alertf = '<script type="text/javascript">alert("Invoice failed to save!");</script>';
                echo $alertf;
            }
        }
    }

    public function insertInvoicePayment($acc, $vid, $mno, $payee, $amount, $date) {

        $sth = mysql_query("SELECT * FROM    vehicleinvoicepayment  WHERE  vid='$vid'  AND  acc='$acc'  AND 	amount='$amount'   AND 	mno='$mno'   ");
        if (mysql_num_rows($sth) >= 1) {
            $alertr = '<script type="text/javascript">alert(" Transaction Already Exist!");</script>';
            echo $alertr;
        } else {

            $amount2 = amountToPayInvo($acc, $vid);
            $amtInvPaid = amountInvPaid($acc, $vid);
            $bal = $amount2 - $amtInvPaid;
            if ($amount > $bal) {
                $stmt = mysql_query("UPDATE vehicleinvoice SET status='" . base64_encode('completed') . "'   WHERE  acc='$acc'  AND vid='$vid' ORDER BY id LIMIT 1 ");
                mysql_query("INSERT INTO  vehicleinvoicepayment(acc,mno,payee,vid,amount,date) VALUES('$acc','$mno','$payee','$vid','$bal','$date')  ");

                if ($stmt) {
                    $st = mysql_query("UPDATE   vehicleinvoice SET status='" . base64_encode('completed') . "'   WHERE  acc='$acc'   AND vid='$vid' ");

                    $ale = '<script type="text/javascript">alert("Invoice saved Sucessfully!");</script>';
                    echo $ale;
                    receipt($this->_user, base64_decode($mno), vehicleName(base64_decode($vid)), '$tid', base64_decode($mno), getMembername($mno), base64_decode($acc), 'cash', base64_decode($amount), base64_decode($date), base64_decode($date), $_SESSION['session'], base64_decode($date));
                } else {
                    $alertf = '<script type="text/javascript">alert("Invoice failed to save!");</script>';
                    echo $alertf;
                }
            } else {

                $stl = mysql_query("INSERT INTO  vehicleinvoicepayment(acc,mno,payee,vid,amount,date) VALUES('$acc','$mno','$payee','$vid','$amount','$date')  ");
                if ($stl) {
                    receipt($this->_user, base64_decode($mno), vehicleName(base64_decode($vid)), '$tid', base64_decode($mno), getMembername($mno), base64_decode($acc), 'cash', base64_decode($amount), base64_decode($date), base64_decode($date), $_SESSION['session'], base64_decode($date));
                    $alert = '<script type="text/javascript">alert("Invoice saved Sucessfully!");</script>';
                    echo $alert;
                } else {
                    $alertf = '<script type="text/javascript">alert("Invoice failed to save!");</script>';
                    echo $alertf;
                }
            }
        }
    }

    public function insertOrganisation($org, $status) {
        $sth = mysql_query("SELECT *  FROM  organisation   WHERE organisation='$org' ");
        if (mysql_num_rows($sth) >= 1) {
            $alertr = '<script type="text/javascript">alert(" Organisation Already Exist!");</script>';
            echo $alertr;
        } else {
            $stl = mysql_query("INSERT  INTO  organisation (organisation,status) VALUES('$org','$status') ");
            if ($stl) {
                $users = new Users();
                $activity = "added new organization " . base64_decode($org);
                $users->audittrail("Admin", $activity, "Admin");
                $alert = '<script type="text/javascript">alert("Organisation Added Sucessfully!");</script>';
                echo $alert;
            } else {
                $alertf = '<script type="text/javascript">alert("Organisation failed To save!");</script>';
                echo $alertf;
            }
        }
    }

    public function insertAddressBook($mobileno, $mno, $name) {
        $sth = mysql_query("SELECT *  FROM  addressbooks   WHERE name='$name'  AND mno='$mno'  AND  contact='$mobileno'  ");
        if (mysql_num_rows($sth) >= 1) {
            $alertr = '<script type="text/javascript">alert(" AddressBook  Already Exist!");</script>';
            echo $alertr;
        } else {
            $stl = mysql_query("INSERT  INTO  addressbooks (name,client,mno,contact) VALUES('$name','$client','$mno','$mobileno') ");
            if ($stl) {
                $users = new Users();
                $activity = "added address book details for member " . $mno;
                $users->audittrail($user, $activity);
                $alert = '<script type="text/javascript">alert("Addressbooks Added Sucessfully!");</script>';
                echo $alert;
            } else {
                $alertf = '<script type="text/javascript">alert("Addressbooks Failed To save!");</script>';
                echo $alertf;
            }
        }
    }

    public function addMemberCategory($prefix, $name) {

        $sth = mysql_query("SELECT *  FROM  member_category   WHERE prefix='$prefix' and category_name='$name' ");
        if (mysql_num_rows($sth) >= 1) {
            $alertr = '<script type="text/javascript">alert($name."  Already Exist!");</script>';
            echo $alertr;
        } else {
            $stl = mysql_query("INSERT  INTO  member_category (prefix,category_name,status) VALUES('$prefix','$name','" . base64_encode('active') . "') ");
            if ($stl) {

                $alert = '<script type="text/javascript">alert("Member Category Added Sucessfully!");</script>';
                echo $alert;
            } else {
                $alertf = '<script type="text/javascript">alert("Member Category failed to save!");</script>';
                echo $alertf;
            }
        }
    }

    //add bank branches
    public function addbankDetails($bnkid, $branch) {

        $sth = mysql_query("SELECT *  FROM  memberbank_branches   WHERE bank_id='" . $bnkid . "' and branch_name='" . $branch . "' ");
        if (mysql_num_rows($sth) >= 1) {
            $alertr = '<script type="text/javascript">alert("Branch  Already Exist!");</script>';
            echo $alertr;
        } else {
            $stl = mysql_query("INSERT  INTO  memberbank_branches (bank_id,branch_name,status) VALUES('$bnkid','$branch','" . base64_encode('active') . "') ");
            if ($stl) {

                $alert = '<script type="text/javascript">alert("Branch Added Sucessfully!");</script>';
                echo $alert;
            } else {
                $alertf = '<script type="text/javascript">alert("Branch failed to save!");</script>';
                echo $alertf;
            }
        }
    }

    //add member banks
    public function addMemberbank($bnkname) {

        $sthb = mysql_query("SELECT *  FROM  member_banks   WHERE bank_name='" . $bnkname . "' ");
        if (mysql_num_rows($sthb) >= 1) {
            $alertr = '<script type="text/javascript">alert("Already Exist!");</script>';
            echo $alertr;
        } else {
            $stl = mysql_query("INSERT  INTO  member_banks (bank_name,status) VALUES('$bnkname','" . base64_encode('active') . "') ");
            if ($stl) {
                $users = new Users();
                $activity = "added bank brach" . $bnkname;
                $users->audittrail($user, $activity);
                $alert = '<script type="text/javascript">alert("Bank Added Sucessfully!");</script>';
                echo $alert;
            } else {
                $alertf = '<script type="text/javascript">alert("Bank details failed to save!");</script>';
                echo $alertf;
            }
        }
    }

    public function addMemberTitle($title) {

        $sth = mysql_query("SELECT *  FROM  memebr_title   WHERE title='$title' ");
        if (mysql_num_rows($sth) >= 1) {
            $alertr = '<script type="text/javascript">alert($title."  Already Exist!");</script>';
            echo $alertr;
        } else {
            $stl = mysql_query("INSERT  INTO  memebr_title (title,status) VALUES('$title','" . base64_encode('active') . "') ");
            if ($stl) {

                $alert = '<script type="text/javascript">alert("Ttile Added Sucessfully!");</script>';
                echo $alert;
            } else {
                $alertf = '<script type="text/javascript">alert("Title failed to save!");</script>';
                echo $alertf;
            }
        }
    }

    public function agentsRegistration($user, $fname, $mname, $lname, $idno, $email, $contact) {
        $sth = mysql_query("SELECT  *  FROM  registeragents   WHERE idno='$idno'  ");
        $no = mysql_num_rows($sth);
        if ($no == 0) {
            $sth = mysql_query("INSERT INTO   registeragents (fname,mname,lname,idno,email,contact)VALUES('$fname','$mname','$lname','$idno','$email','$contact') ");
            if ($sth) {
                $users = new Users();
                $activity = "added new agent " . $fname . ' ' . $mname . ' ' . $lname;
                $users->audittrail($user, $activity, $user);
                $alert = '<script type="text/javascript">alert("Agent Added Sucessfully!");</script>';
                echo $alert;
            } else {
                $alertf = '<script type="text/javascript">alert("Agent failed to save!");</script>';
                echo $alertf;
            }
        } else {
            $al = '<script type="text/javascript">alert("agents already exist!");</script>';
            echo $al;
        }
    }

//calculate and insert accumulated interest for members
    public function accruedInterest() {
        $dated = date('d-m-Y');
        list($day, $themonth, $yearh) = explode('-', $dated);
        $lastday = cal_days_in_month(CAL_GREGORIAN, $themonth, $yearh);


        $result = mysql_query("SHOW TABLE STATUS LIKE 'membercontribution'");
        $row = mysql_fetch_array($result);
        $nextId = $row['Auto_increment']; //mcr000

        $qryv = mysql_query('SELECT * FROM interest_saving_setting  ');
        while ($rowv = mysql_fetch_array($qryv)) {

            if (base64_decode($rowv['accrual_period']) == getPeriodId('daily')) {

                $myacs = mysql_query("select * from memberaccs where glaccid='" . $rowv['gl_account'] . "' AND status='" . base64_encode('active') . "' ");
                while ($rowx = mysql_fetch_array($myacs)) {


                    $dateran = date('d-M-Y');

                    //check number of days in the current year

                    $rate = (base64_decode($rowv['interest_rate']) / getPeriodDay(base64_decode($rowv['accrual_period'])));
                    $accumeInte = GainedInterest($rowx['mno'], $dateran, $rowv['gl_account']);

                    $gainedInterest = (($accumeInte * $rate) / 100);


                    if ($gainedInterest > 0.01) {
                        $dated = date('d-M-Y');
                        $fme = mysql_query('select * from membercontribution where memberno="' . $rowx['mno'] . '" and transaction="' . $rowv['default_accrued_account'] . '" and payeeid="' . $rowv['gl_account'] . '" AND date="' . base64_encode($dateran) . '"  ') or die(mysql_error());
                        if (mysql_num_rows($fme) >= 1) {
                            //member has already contributed for this month
                            echo "Umetoa leo";
                        } else {

                            $updater = mysql_query('insert into membercontribution (memberno,payeeid,transaction,amount,date,transid,bnkid) values("' . $rowx['mno'] . '","' . $rowv['gl_account'] . '","' . $rowv['default_accrued_account'] . '","' . base64_encode(round($gainedInterest, 2)) . '","' . base64_encode($dateran) . '","' . base64_encode('mcr000' . $nextId) . '", "' . getdefaultbank() . '")') or die(mysql_error());
                        }
                    } else {
                        //no interest inserted
                        echo "no interest";
                    }
                }
            }
//when frequency is one week
            else if ((base64_decode($rowv['accrual_period']) == getPeriodId('weekly')) && base64_decode($rowv['cron_jobs']) == '6') {

                $myacc = mysql_query("select * from memberaccs where glaccid='" . $rowd['gl_account'] . "' AND status='" . base64_encode('active') . "' ");
                while ($rowx = mysql_fetch_array($myacc)) {
                    //get last seven days date
                    $lastseven = date('d-M-Y', strtotime('-7 days'));
                    $leo = date('d-M-Y');
                    $start = new DateTime($lastseven);
                    $end = new DateTime($leo);
                    $end->modify('+1 day');
                    $interval = new DateInterval('P1D');
                    $daterange = new DatePeriod($start, $interval, $end);
//get number of days in an year

                    $rate = (base64_decode($rowv['interest_rate']) / getPeriodDay(base64_decode($rowv['accrual_period'])));
                    $interest = GainedInterest($rowx['mno'], $daterange, $rowv['gl_account']);

                    $accumeInte = ($interest * $rate / 100);


                    if ($gainedInterest > 0) {
                        $fme = mysql_query('select * from membercontribution where memberno="' . $rowx['mno'] . '" and transaction="' . $rowv['default_accrued_account'] . '" and payeeid="' . $rowv['gl_account'] . '" AND date="' . base64_encode($leo) . '"  ') or die(mysql_error());
                        if (mysql_num_rows($fme) >= 1) {
                            //member has already contributed for this month
                            echo "Umetoa leo";
                        } else {

                            $updater = mysql_query('insert into membercontribution (memberno,payeeid,transaction,amount,date,transid,bnkid) values("' . $rowx['mno'] . '","' . $rowv['gl_account'] . '","' . $rowv['default_accrued_account'] . '","' . base64_encode(round($gainedInterest, 2)) . '","' . base64_encode($leo) . '","' . base64_encode('mcr000' . $nextId) . '", "' . getdefaultbank() . '")') or die(mysql_error());
                        }
                    } else {
                        //no interest inserted
                        echo "no interest";
                    }
                }
                //reset the counter

                mysql_query("UPDATE interest_saving_setting SET cron_jobs='" . base64_encode(0) . "' WHERE gl_account='" . $rowv['gl_account'] . "' ");
            }
//when frequency is montly
            else if ((base64_decode($rowv['accrual_period']) == getPeriodId('monthly')) && base64_decode($rowv['cron_jobs']) == $lastday) {

                $myacc = mysql_query("select * from memberaccs where glaccid='" . $rowd['gl_account'] . "' AND status='" . base64_encode('active') . "' ");
                while ($roww = mysql_fetch_array($myacc)) {
                    $dated = date('d-m-Y');
//$dated = date('31-08-2015');
                    list($day, $themonth, $yearh) = explode('-', $dated);
                    $lastday = cal_days_in_month(CAL_GREGORIAN, $themonth, $yearh);
                    $datefrom = $yearh . "-" . date('M') . "-" . "01";
                    $dateto = $yearh . "-" . date('M') . "-" . $lastday;
                    $start = new DateTime($datefrom);
                    $end = new DateTime($dateto);
                    $end->modify('+1 day');
                    $interval = new DateInterval('P1D');
                    $daterange = new DatePeriod($start, $interval, $end);

                    $rate = (base64_decode($rowv['interest_rate']) / getPeriodDay(base64_decode($rowv['accrual_period'])));
                    $interest = GainedInterest($rowx['mno'], $daterange, $rowv['gl_account']);

                    $accumeInte = ($interest * $rate / 100);


                    if ($accumeInte > 0.01) {
                        $fme = mysql_query('select * from membercontribution where memberno="' . $rowx['mno'] . '" and transaction="' . $rowv['default_accrued_account'] . '" and payeeid="' . $rowv['gl_account'] . '" AND date="' . base64_encode($leo) . '"  ') or die(mysql_error());
                        if (mysql_num_rows($fme) >= 1) {
                            //member has already contributed for this month
                            echo "Umetoa leo";
                        } else {

                            $updater = mysql_query('insert into membercontribution (memberno,payeeid,transaction,amount,date,transid,bnkid) values("' . $rowx['mno'] . '","' . $rowv['gl_account'] . '","' . $rowv['default_accrued_account'] . '","' . base64_encode(round($accumeInte, 2)) . '","' . base64_encode($leo) . '","' . base64_encode('mcr000' . $nextId) . '", "' . getdefaultbank() . '")') or die(mysql_error());
                        }
                    } else {
                        //no interest inserted
                        //  echo "no interest";
                    }
                }

                //reset the counter    
                mysql_query("UPDATE interest_saving_setting SET cron_jobs='" . base64_encode(0) . "' WHERE gl_account='" . $rowv['gl_account'] . "' ");
            } else {
                //increment the count untill it conforms to the settings
                $addday = (base64_decode($rowv['cron_jobs'])) + 1;
                echo "Update" . $addday;
                mysql_query("UPDATE interest_saving_setting SET cron_jobs='" . base64_encode($addday) . "' WHERE gl_account='" . $rowv['gl_account'] . "' ");
            }
        }
    }

    //post accrued interest to members accounts 
    public function postAccruedInterest() {
        $dated = date('d-m-Y');
        list($day, $themonth, $yearh) = explode('-', $dated);
        $lastday = cal_days_in_month(CAL_GREGORIAN, $themonth, $yearh);


        $result = mysql_query("SHOW TABLE STATUS LIKE 'membercontribution'");
        $row = mysql_fetch_array($result);
        $nextId = $row['Auto_increment']; //mcr000

        $qryps = mysql_query('SELECT * FROM interest_saving_setting  ');
        while ($rowps = mysql_fetch_array($qryps)) {

            if (base64_decode($rowps['accrual_period']) == getPeriodId('daily')) {

                $myap = mysql_query("select * from memberaccs where glaccid='" . $rowps['gl_account'] . "' AND status='" . base64_encode('active') . "' ");
                while ($rowp = mysql_fetch_array($myap)) {

                    //get last seven days date
                    $datefrom = date('d-M-Y', strtotime('-0 days'));
                    $dateto = date('d-M-Y');

                    $depositIinte = savingsPosting($rowp['mno'], $rowps['default_accrued_account'], $datefrom, $dateto);

                    if ($depositIinte > 0.01) {

                        $totalinterest = ($depositIinte / 2); //jmc customization
                        //$totalinterest= $depositIinte;
                        $dated = date('d-M-Y');
                        $fme = mysql_query('select * from membercontribution where memberno="' . $rowp['mno'] . '" and transaction="' . $rowps['default_expense_account'] . '" AND amount="' . base64_encode(round($totalinterest, 2)) . '" AND date="' . base64_encode($dated) . '" ') or die(mysql_error());
                        if (mysql_num_rows($fme) >= 1) {
                            //member has already contributed today
                            echo "already posted";
                        } else {

                            $qrystr = mysql_query('INSERT INTO membercontribution (memberno,transaction,amount,date,transid,bnkid) VALUES ("' . $rowp['mno'] . '", "' . $rowps['default_expense_account'] . '", "' . base64_encode(round($totalinterest, 2)) . '", "' . base64_encode($dated) . '","' . base64_encode('mcr000' . $nextId) . '","' . getdefaultbank() . '")');
                            //jmc customization
                            $sacointe = mysql_query('insert into  paymentin(transname,amount,paymentype,paidby,payeeid,date,bnkid) values("' . base64_encode(getdefaultaccrued()) . '","' . base64_encode(round($totalinterest, 2)) . '","' . base64_encode('accrued interest') . '","' . $rowd['membernumber'] . '","' . $rowp['mno'] . '","' . base64_encode($dated) . '","' . getdefaultbank() . '")') or die(mysql_error());
                        }
                    } else {
                        //no interest inserted
                        echo "no cash";
                    }
                }
            }
//if the choosen period is one week
//when frequency is one week
            else if ((base64_decode($rowps['accrual_period']) == getPeriodId('weekly')) && base64_decode($rowps['cron_jobs']) == '6') {

                $myap = mysql_query("select * from memberaccs where glaccid='" . $rowps['gl_account'] . "' AND status='" . base64_encode('active') . "' ");
                while ($rowp = mysql_fetch_array($myap)) {
                    //get last seven days date
                    $datefrom = date('d-M-Y', strtotime('-7 days'));
                    $dateto = date('d-M-Y');

                    $depositIinte = savingsPosting($rowp['mno'], $rowps['default_accrued_account'], $datefrom, $dateto);

                    if ($depositIinte > 0.01) {
                        $totalinterest = ($depositIinte / 2); //jmc customization
                        //$totalinterest= $depositIinte;
                        $dated = date('d-M-Y');

                        $fme = mysql_query('select * from membercontribution where memberno="' . $rowp['mno'] . '" and transaction="' . $rowps['default_expense_account'] . '" AND amount="' . base64_encode(round($totalinterest, 2)) . '" AND date="' . base64_encode($dated) . '" ') or die(mysql_error());
                        if (mysql_num_rows($fme) >= 1) {
                            //member has already contributed today
                            echo "already posted";
                        } else {

                            $qrystr = mysql_query('INSERT INTO membercontribution (memberno,transaction,amount,date,transid,bnkid) VALUES ("' . $rowp['mno'] . '", "' . $rowps['default_expense_account'] . '", "' . base64_encode(round($totalinterest, 2)) . '", "' . base64_encode($dated) . '","' . base64_encode('mcr000' . $nextId) . '","' . getdefaultbank() . '")');
                            //jmc customization
                            $sacointe = mysql_query('insert into  paymentin(transname,amount,paymentype,paidby,payeeid,date,bnkid) values("' . base64_encode(getdefaultaccrued()) . '","' . base64_encode(round($totalinterest, 2)) . '","' . base64_encode('accrued interest') . '","' . $rowd['membernumber'] . '","' . $rowp['mno'] . '","' . base64_encode($dated) . '","' . getdefaultbank() . '")') or die(mysql_error());
                        }
                    } else {
                        //no interest inserted
                        echo "no cash";
                    }
                }
                //reset the counter

                mysql_query("UPDATE interest_saving_setting SET posting_count='" . base64_encode(0) . "' WHERE gl_account='" . $rowps['gl_account'] . "' ");
            }
//if the choosen period is motnly
            else if ((base64_decode($rowps['accrual_period']) == getPeriodId('montly')) && base64_decode($rowps['cron_jobs']) == $lastday) {
                $myap = mysql_query("select * from memberaccs where glaccid='" . $rowps['gl_account'] . "' AND status='" . base64_encode('active') . "' ");
                while ($rowp = mysql_fetch_array($myap)) {
                    //get last days date of the month
                    if ($lastday == 28) {
                        $datefrom = date('d-M-Y', strtotime('-28 days'));
                    } else if ($lastday == 29) {
                        $datefrom = date('d-M-Y', strtotime('-29 days'));
                    } else if ($lastday == 30) {
                        $datefrom = date('d-M-Y', strtotime('-30 days'));
                    } else {
                        $datefrom = date('d-M-Y', strtotime('-31 days'));
                    }

                    $dateto = date('d-M-Y');
                    $depositIinte = savingsPosting($rowp['mno'], $rowsp['default_accrued_account'], $datefrom, $dateto);

                    if ($depositIinte > 0) {
                        $totalinterest = ($depositIinte / 2); //jmc customization
                        //$totalinterest= $depositIinte
                        $dated = date('d-M-Y');
                        $fme = mysql_query('select * from membercontribution where memberno="' . $rowp['mno'] . '" and transaction="' . $rowps['default_expense_account'] . '" AND amount="' . base64_encode(round($totalinterest, 2)) . '" AND date="' . base64_encode($dated) . '" ') or die(mysql_error());
                        if (mysql_num_rows($fme) >= 1) {
                            //member has already contributed today
                            echo "already posted";
                        } else {

                            $qrystr = mysql_query('INSERT INTO membercontribution (memberno,transaction,amount,date,transid,bnkid) VALUES ("' . $rowp['mno'] . '", "' . $rowps['default_expense_account'] . '", "' . base64_encode(round($totalinterest, 2)) . '", "' . base64_encode($dated) . '","' . base64_encode('mcr000' . $nextId) . '","' . getdefaultbank() . '")');

                            //jmc customization
                            $sacointe = mysql_query('insert into  paymentin(transname,amount,paymentype,paidby,payeeid,date,bnkid) values("' . base64_encode(getdefaultaccrued()) . '","' . base64_encode(round($totalinterest, 2)) . '","' . base64_encode('accrued interest') . '","' . $rowd['membernumber'] . '","' . $rowp['mno'] . '","' . base64_encode($dated) . '","' . getdefaultbank() . '")') or die(mysql_error());
                        }
                    } else {
                        //no interest inserted
                        echo "no cash";
                    }
                }
                mysql_query("UPDATE interest_saving_setting SET posting_count='" . base64_encode(0) . "' WHERE gl_account='" . $rowps['gl_account'] . "' ");
            } else {
                //increment the count untill it conforms to the settings
                $addday = base64_decode($rowps['cron_jobs']) + 1;
                echo "count" . $addday;
                mysql_query("UPDATE interest_saving_setting SET posting_count='" . base64_encode($addday) . "' WHERE gl_account='" . $rowps['gl_account'] . "' ");
            }
        }
    }

    public function addextracash($user, $mno, $tid, $loanid, $efee, $amount) {
        $this->_user = $user;

        $chqry = mysql_query('select * from extracash where transactionid="' . ($tid) . '" and efee="' . base64_encode($efee) . '" and auditdate="' . base64_encode(date('d-M-Y')) . '"') or die(mysql_error());
        if (mysql_num_rows($chqry) >= 1) {
            echo '<span class="red">Sorry You Have Already Saved This Transaction</span>';
        } else {

            $inqry = mysql_query('insert into extracash values("","' . base64_encode($efee) . '","' . base64_encode($mno) . '","' . base64_encode($loanid) . '",
        "' . base64_encode($amount) . '","' . ($tid) . '","' . base64_encode(date("d-M-Y")) . '", "' . base64_encode($user) . '", "' . base64_encode('active') . '")') or die(mysql_error());
            if ($inqry) {
                $users = new Users();
                $activity = "Added " . getglacc($efee) . " on loan " . base64_decode($tid) . " for member " . getMembername($mno);
                $users->audittrail($user, $activity, $user);
                $aler = '<script type="text/javascript">alert("' . getglacc($efee) . ' added successfuly!");</script>';
                echo $aler;
            } else {
                $alertr = '<script type="text/javascript">alert("' . getglacc($efee) . ' failed to be saved!");</script>';
                echo $alertr;
            }
        }
    }

    public function laddextracash($user, $mno, $tid, $loanid, $efee, $amount, $date) {
        $this->_user = $user;

        $chqry = mysql_query('select * from extracash where transactionid="' . base64_encode($tid) . '" and efee="' . base64_encode($efee) . '"') or die(mysql_error());
        if (mysql_num_rows($chqry) >= 1) {
            echo '<span class="red">Sorry You Have Already Saved This Transaction</span>';
        } else {

            $inqry = mysql_query('insert into extracash values("","' . base64_encode($efee) . '","' . base64_encode($mno) . '","' . base64_encode($loanid) . '",
        "' . base64_encode($amount) . '","' . base64_encode($tid) . '","' . base64_encode($date) . '", "' . base64_encode($user) . '", "' . base64_encode('active') . '")') or die(mysql_error());
            if ($inqry) {
                $users = new Users();
                $activity = "Added " . getglacc($efee) . " on loan " . base64_decode($tid) . " for member " . getMembername($mno);
                $users->audittrail($users, $activity, $users);
                $aler = '<script type="text/javascript">alert("' . getglacc($efee) . ' added successfuly!");</script>';
                echo $aler;
            } else {
                $alertr = '<script type="text/javascript">alert("' . getglacc($efee) . ' failed to be saved!");</script>';
                echo $alertr;
            }
        }
    }

    public function addinterestfreeze($user, $tid, $mno) {
        $this->_user = $user;
        $loanid = getloanid(loanname($tid));

        $chqry = mysql_query('select * from interestfreeze where transactionid="' . ($tid) . '"') or die(mysql_error());
        if (mysql_num_rows($chqry) >= 1) {
            echo '<span class="red" >Sorry Loan Interest for this Loan has already been Freezed.</span>';
        } else {

            $inqry = mysql_query('insert into interestfreeze values("","' . ($mno) . '","' . base64_encode($loanid) . '",
            "' . ($tid) . '","' . base64_encode(date("d-M-Y")) . '", "' . base64_encode($user) . '", "' . base64_encode('active') . '")') or die(mysql_error());
            if ($inqry) {

                $users = new Users();
                $activity = "Freezed Interest on loan " . base64_decode($tid) . " for member " . getMembername($mno);
                $users->audittrail($user, $activity, $user);
                $aler = '<script type="text/javascript">alert("Interest Freeze Processed successfully!");</script>';
                echo $aler;
            } else {
                $alertr = '<script type="text/javascript">alert("Interest Freeze failed to be Processed!");</script>';
                echo $alertr;
            }
        }
    }

    public function removeinterestfreeze($user, $tid, $mno) {
        $this->_user = $user;

        $inqry = mysql_query('DELETE FROM interestfreeze WHERE transactionid="' . $tid . '"') or die(mysql_error());

        if ($inqry) {
            $users = new Users();
            $activity = "Un-Freezed Interest on loan " . base64_decode($tid) . " for member " . getMembername($mno);
            $users->audittrail($users, $activity, $users);
            $aler = '<script type="text/javascript">alert("Interest Was Un-Freezed successfully!");</script>';
            echo $aler;
        } else {
            $alertr = '<script type="text/javascript">alert("Interest Un-Freeze failed to be Processed!");</script>';
            echo $alertr;
        }
    }

    public function addloanwriteoff($user, $tid, $mno) {
        $this->_user = $user;
        $loanid = getloanid(loanname($tid));

        $chqry = mysql_query('select * from loanwriteoff where transactionid="' . ($tid) . '"') or die(mysql_error());
        if (mysql_num_rows($chqry) >= 1) {
            echo '<span class="red" >Sorry This Loan has already been Written-Off.</span>';
        } else {

            $inqry = mysql_query('insert into loanwriteoff values("","' . ($mno) . '","' . base64_encode($loanid) . '",
            "' . ($tid) . '","' . base64_encode(date("d-M-Y")) . '", "' . base64_encode($user) . '", "' . base64_encode('active') . '")') or die(mysql_error());
            if ($inqry) {

                $users = new Users();
                $activity = "Loan Write-Off for the Loan Number " . base64_decode($tid) . " for member " . getMembername($mno);
                $users->audittrail($user, $activity, $user);
                $aler = '<script type="text/javascript">alert("Loan Write-Off Processed successfully!");</script>';
                echo $aler;
            } else {
                $alertr = '<script type="text/javascript">alert("Loan Write-Off failed to be Processed!");</script>';
                echo $alertr;
            }
        }
    }

    public function removeloanwriteoff($user, $tid, $mno) {
        $this->_user = $user;

        $inqry = mysql_query('DELETE FROM loanwriteoff WHERE transactionid="' . $tid . '"') or die(mysql_error());

        if ($inqry) {
            $users = new Users();
            $activity = "Loan Write-Off removed for Loan number " . base64_decode($tid) . " for member " . getMembername($mno);
            $users->audittrail($users, $activity, $users);
            $aler = '<script type="text/javascript">alert("Loan Write-Off Has Been Cancelled!");</script>';
            echo $aler;
        } else {
            $alertr = '<script type="text/javascript">alert("Loan Write-Off failed to Cancel!");</script>';
            echo $alertr;
        }
    }

    public function addloanrepo($user, $tid, $mno) {
        $this->_user = $user;
        $loanid = getloanid(loanname($tid));

        $chqry = mysql_query('select * from interestfreeze where transactionid="' . ($tid) . '"') or die(mysql_error());
        if (mysql_num_rows($chqry) >= 1) {
            echo '<span class="red" >Sorry Loan Interest for this Loan has already been Freezed.</span>';
        } else {

            $inqry = mysql_query('insert into interestfreeze values("","' . ($mno) . '","' . base64_encode($loanid) . '",
            "' . ($tid) . '","' . base64_encode(date("d-M-Y")) . '", "' . base64_encode($user) . '", "' . base64_encode('active') . '")') or die(mysql_error());
        }

        $chqry2 = mysql_query('select * from loanrepo where transactionid="' . ($tid) . '"') or die(mysql_error());
        if (mysql_num_rows($chqry2) >= 1) {
            echo '<span class="red" >Sorry Loan Repossession for this Loan has already been Transacted.</span>';
        } else {

            $inqry = mysql_query('insert into loanrepo values("","' . ($mno) . '","' . base64_encode($loanid) . '",
            "' . ($tid) . '", "","' . base64_encode(date("d-M-Y")) . '", "' . base64_encode($user) . '", "' . base64_encode('active') . '")') or die(mysql_error());
            if ($inqry) {
                $users = new Users();
                $activity = "processed loan repossession from" . getMembername($mno);
                $users->audittrail($user, $activity);
                $aler = '<script type="text/javascript">alert("Loan Repossession Processed successfully!");</script>';
                echo $aler;
            } else {
                $alertr = '<script type="text/javascript">alert("Loan Repossession failed to be Processed!");</script>';
                echo $alertr;
            }
        }
    }

    public function withdrawal($user, $mnumber, $amount, $cheque, $fees, $approvedby, $comments) {
        $this->_user = $user;
        $this->_mno = $mnumber;

        $withcheck1 = mysql_query('select * from loanapplication where membernumber="' . base64_encode($this->_mno) . '" and status="' . base64_encode('pending') . '" ') or die(mysql_error());
        if (mysql_num_rows($withcheck1) >= 1) {
            echo '<span class="red" >Sorry You Still Have a Pending Loan. You can not Withdraw at this point.</span></br>';
        } else {

            $withcheck2 = mysql_query('select * from guarantors where guarantorno="' . base64_encode($this->_mno) . '" and status="' . base64_encode('granted') . '" ') or die(mysql_error());
            if (mysql_num_rows($withcheck2) >= 1) {
                echo '<span class="red" >Sorry You Are Still a Guarantor to a Pending Loan. You can not Withdraw at this point.</span></br>';
            } else {

                $with = mysql_query('select * from withdrawals where membernumber="' . base64_encode($this->_mno) . '" and amount="' . base64_encode($amount) . '" and cheque="' . base64_encode($cheque) . '" and fees="' . base64_encode($fees) . '" and approvedby="' . base64_encode($approvedby) . '" and comments="' . base64_encode($comments) . '"') or die(mysql_error());
                if (mysql_num_rows($with) >= 1) {
                    echo '<span class="red" >Sorry it seems you have just processed a similar transaction</span></br>';
                } else {
                    $draw = mysql_query('insert into withdrawals (membernumber,amount,cheque,fees,approvedby,comments,date) values("' . base64_encode($this->_mno) . '",
            "' . base64_encode($amount) . '","' . base64_encode($cheque) . '","' . base64_encode($fees) . '","' . base64_encode($approvedby) . '",
                "' . base64_encode($comments) . '","' . base64_encode(date("d-M-Y")) . '")') or die(mysql_error());
                    if ($draw) {
                        $alertyes = '<script type="text/javascript">alert("Member Withdrawal was successful!");</script>';
                        echo $alertyes;

                        $rrr = "update newmember set status='" . base64_encode("WITHDRAWN") . "' where membernumber='" . base64_encode($this->_mno) . "'";

                        $result = mysql_query($rrr);
                        mysql_query($result);
                        $compname = compname();
                        $dates = date('dmyghis');
                        $leo = date('d-M-Y');

                        $newuser = new User();
                        $newuser->saccoexpense($_SESSION['users'], $dates, '116', $fees, '1', $cheque, $approvedby, $leo, 'withdrawal fee', 'withdrawal fee', $compname, '0000', 'withdrawal fee', $dates, $submit, '1');
                    } else {
                        $alert = '<script type="text/javascript">alert("Member Withdrawal failed!");</script>';
                        echo $alert;
                    }
                }
            }
        }
    }

    //update fixed deposit details
    public function fixedDepositCreate($users, $actname, $regfee, $closefee, $managefee, $manage_freq, $interestRate, $minbalance, $maxbalance, $penalty, $fre_accrual, $fre_posting, $accountfeeGl, $interestGl, $manageGl, $postglaccount) {

        $check = mysql_query(" SELECT * FROM glaccounts where acname='" . base64_encode($actname) . "' and accgroup='" . base64_encode('2') . "' ");
        if (mysql_num_rows($check) >= 1) {

            $alertd = '<script type="text/javascript">alert("Sorry account exists !");document.location.href="fixed_deposit_setting.php";</script>';
            echo $alertd;
        } else {

            $random = mt_rand(1000, 9999);
            $dated = date('d-M-Y');

            $qrygl = mysql_query('insert into glaccounts (accode,acname,accgroup,status,date) values("' . base64_encode($random) . '","' . base64_encode($actname) . '","' . base64_encode('2') . '","' . base64_encode('Active') . '","' . base64_encode($dated) . '")');
            $glId = mysql_insert_id();

            if ($qrygl) {
                $qry = mysql_query('INSERT INTO fixed_deposit_setting(gl_account,account_name,entry_fee,closing_fee,management_fee,management_fee_glacc,accountfee_gl_id,interest_glacc,interest_postaccount,Frequecny_management_fee,interest_rate,min_account_balance,max_account_balance,penalty_rate, frequency_accrual,frequency_posting) VALUES("' . base64_encode($glId) . '","' . base64_encode($actname) . '","' . base64_encode($regfee) . '","' . base64_encode($closefee) . '","' . base64_encode($managefee) . '","' . base64_encode($manageGl) . '"   ,"' . base64_encode($accountfeeGl) . '"  ,"' . base64_encode($interestGl) . '" , "' . base64_encode($postglaccount) . '" ,"' . base64_encode($manage_freq) . '", "' . base64_encode($interestRate) . '", "' . base64_encode($minbalance) . '", "' . base64_encode($maxbalance) . '", "' . base64_encode($penalty) . '", "' . base64_encode($fre_accrual) . '","' . base64_encode($fre_posting) . '"  )');
                if ($qry) {
                    $alertd = '<script type="text/javascript">alert("Account Created successfuly");document.location.href="fixed_deposit_setting.php";</script>';
                    echo $alertd;
                }
            }
        }
    }

    //update fixed deposit settings
    public function fixedDepositUpdate($IDs, $glids, $actname, $regfee, $closefee, $managefee, $manage_freq, $interestRate, $minbalance, $maxbalance, $penalty, $fre_accrual, $fre_posting, $accountfeeGl, $interestGl, $manageGl, $postglaccount) {

        $updt = mysql_query('UPDATE fixed_deposit_setting SET account_name="' . base64_encode($actname) . '", entry_fee="' . base64_encode($regfee) . '", closing_fee="' . base64_encode($closefee) . '", management_fee="' . base64_encode($managefee) . '",management_fee_glacc="' . base64_encode($manageGl) . '", accountfee_gl_id="' . base64_encode($accountfeeGl) . '"  ,interest_glacc="' . base64_encode($interestGl) . '" ,interest_postaccount= "' . base64_encode($postglaccount) . '" ,Frequecny_management_fee="' . base64_encode($manage_freq) . '" ,interest_rate="' . base64_encode($interestRate) . '",min_account_balance="' . base64_encode($minbalance) . '" ,max_account_balance="' . base64_encode($maxbalance) . '",penalty_rate="' . base64_encode($penalty) . '" , frequency_accrual="' . base64_encode($fre_accrual) . '",frequency_posting="' . base64_encode($fre_posting) . '"   WHERE id="' . $IDs . '" ');

        $upt1 = mysql_query('UPDATE glaccounts SET acname="' . base64_encode($actname) . '" where id="' . $glids . '" ');

        if ($updt) {
            $alertd = '<script type="text/javascript">alert("Account Updated successfuly");document.location.href="fixed_deposit_setting.php";</script>';
            echo $alertd;
        }
    }

    //fixed deposit account function 
    public function FixedDepoInterestAccrual() {

        $dated = date('d-m-Y');
//$dated = date('31-08-2015');
        list($day, $themonth, $yearh) = explode('-', $dated);
        $lastday = cal_days_in_month(CAL_GREGORIAN, $themonth, $yearh);

        $result = mysql_query("SHOW TABLE STATUS LIKE 'membercontribution'");
        $row = mysql_fetch_array($result);
        $nextId = $row['Auto_increment']; //mcr000


        $qry = mysql_query('SELECT * FROM fixed_deposit_setting  ');
        while ($rowd = mysql_fetch_array($qry)) {


            if (base64_decode($rowd['frequency_accrual']) == getPeriodId('daily')) {
                $myacc = mysql_query("select * from memberaccs where glaccid='" . $rowd['gl_account'] . "' AND status='" . base64_encode('active') . "' ");
                while ($roww = mysql_fetch_array($myacc)) {
                    //get last seven days date

                    $dateran = date('d-M-Y');

                    //check number of days in the current year

                    $rate = (base64_decode($rowd['interest_rate']) / getPeriodDay(base64_decode($rowd['frequency_accrual'])));
                    $interest = GainedInterest($roww['mno'], $dateran, $rowd['gl_account']);

                    $accumeInte = ($interest * $rate / 100);

                    if ($accumeInte > 0.01) {

                        $fme = mysql_query('select * from membercontribution where memberno="' . $roww['mno'] . '" and transaction="' . $rowd['interest_glacc'] . '" and payeeid="' . $rowd['gl_account'] . '" AND date="' . base64_encode($dateran) . '"  ') or die(mysql_error());
                        if (mysql_num_rows($fme) >= 1) {
                            //member has already contributed for this month
                            echo "Umetoa leo";
                        } else {

                            $updater = mysql_query('insert into membercontribution (memberno,payeeid,transaction,amount,date,transid,bnkid) values("' . $roww['mno'] . '","' . $rowd['gl_account'] . '","' . $rowd['interest_glacc'] . '","' . base64_encode(number_format($accumeInte, 2)) . '","' . base64_encode($dateran) . '","' . base64_encode('mcr000' . $nextId) . '", "' . getdefaultbank() . '")') or die(mysql_error());
                        }
                    } else {
                        //no interest inserted
                        //  echo "no interest";
                    }
                }
            }

//when frequency is one week
            else if ((base64_decode($rowd['frequency_accrual']) == getPeriodId('weekly')) && base64_decode($rowd['cron_jobs']) == '6') {

                $no = 0;
                $myacc = mysql_query("select * from memberaccs where glaccid='" . $rowd['gl_account'] . "' AND status='" . base64_encode('active') . "' ");
                while ($roww = mysql_fetch_array($myacc)) {
                    //get last seven days date
                    $lastseven = date('d-M-Y', strtotime('-7 days'));
                    $leo = date('d-M-Y');
                    $start = new DateTime($lastseven);
                    $end = new DateTime($leo);
                    $end->modify('+1 day');
                    $interval = new DateInterval('P1D');
                    $daterange = new DatePeriod($start, $interval, $end);
//get number of days in an year

                    $rate = (base64_decode($rowd['interest_rate']) / getPeriodDay(base64_decode($rowd['frequency_accrual'])));
                    $interest = GainedInterest($roww['mno'], $daterange, $roww['glaccid']);

                    $accumeInte = ($interest * $rate / 100);

                    if ($accumeInte > 0.01) {

                        $fme = mysql_query('select * from membercontribution where memberno="' . $roww['mno'] . '" and transaction="' . $rowd['interest_glacc'] . '" and payeeid="' . $rowd['gl_account'] . '" AND date="' . base64_encode($leo) . '"  ') or die(mysql_error());
                        if (mysql_num_rows($fme) >= 1) {
                            //member has already contributed for this month
                            echo "Umetoa leo";
                        } else {

                            $updater = mysql_query('insert into membercontribution (memberno,payeeid,transaction,amount,date,transid,bnkid) values("' . $roww['mno'] . '","' . $rowd['gl_account'] . '","' . $rowd['interest_glacc'] . '","' . base64_encode(number_format($accumeInte, 2)) . '","' . base64_encode($leo) . '","' . base64_encode('mcr000' . $nextId) . '", "' . getdefaultbank() . '")') or die(mysql_error());
                        }
                    } else {
                        //no interest inserted
                        //  echo "no interest";
                    }
                }

                //reset the counter    
                mysql_query("UPDATE fixed_deposit_setting SET cron_jobs='" . base64_encode(0) . "' WHERE gl_account='" . $rowd['gl_account'] . "' ");
            }
//when frequency is montly
            else if ((base64_decode($rowd['frequency_accrual']) == getPeriodId('monthly')) && getCron_count() == $lastday) {

                $myacc = mysql_query("select * from memberaccs where glaccid='" . $rowd['gl_account'] . "' AND status='" . base64_encode('active') . "' ");
                while ($roww = mysql_fetch_array($myacc)) {
                    $dated = date('d-m-Y');
//$dated = date('31-08-2015');
                    list($day, $themonth, $yearh) = explode('-', $dated);
                    $lastday = cal_days_in_month(CAL_GREGORIAN, $themonth, $yearh);
                    $datefrom = $yearh . "-" . date('M') . "-" . "01";
                    $dateto = $yearh . "-" . date('M') . "-" . $lastday;
                    $start = new DateTime($datefrom);
                    $end = new DateTime($dateto);
                    $end->modify('+1 day');
                    $interval = new DateInterval('P1D');
                    $daterange = new DatePeriod($start, $interval, $end);

                    $rate = (base64_decode($rowd['interest_rate']) / getPeriodDay(base64_decode($rowd['frequency_accrual'])));
                    $interest = GainedInterest($roww['mno'], $daterange, $roww['glaccid']);

                    $leo = date('d-M-Y');
                    $accumeInte = ($interest * $rate / 100);

                    if ($accumeInte > 0.01) {

                        $fme = mysql_query('select * from membercontribution where memberno="' . $roww['mno'] . '" and transaction="' . $rowd['interest_glacc'] . '" and payeeid="' . $rowd['gl_account'] . '" AND date="' . base64_encode($leo) . '"  ') or die(mysql_error());
                        if (mysql_num_rows($fme) >= 1) {
                            //member has already contributed for this month
                            echo "Umetoa leo";
                        } else {

                            $updater = mysql_query('insert into membercontribution (memberno,payeeid,transaction,amount,date,transid,bnkid) values("' . $roww['mno'] . '","' . $rowd['gl_account'] . '","' . $rowd['interest_glacc'] . '","' . base64_encode(number_format($accumeInte, 2)) . '","' . base64_encode($leo) . '","' . base64_encode('mcr000' . $nextId) . '", "' . getdefaultbank() . '")') or die(mysql_error());
                        }
                    } else {
                        //no interest inserted
                        //  echo "no interest";
                    }
                }

                //reset the counter    
                mysql_query("UPDATE fixed_deposit_setting SET cron_jobs='" . base64_encode(0) . "' WHERE gl_account='" . $rowd['gl_account'] . "' ");
            } else {
                //increment the count untill it conforms to the settings
                $addday = (base64_decode($rowd['cron_jobs'])) + 1;
                echo "Update" . $addday;
                mysql_query("UPDATE fixed_deposit_setting SET cron_jobs='" . base64_encode($addday) . "' WHERE gl_account='" . $rowd['gl_account'] . "' ");
            }
        }
    }

    //post fixed deposit interest to members after accrue

    public function postFixed_depoAccruedInterest() {
        $dated = date('d-m-Y');
        list($day, $themonth, $yearh) = explode('-', $dated);
        $lastday = cal_days_in_month(CAL_GREGORIAN, $themonth, $yearh);


        $result = mysql_query("SHOW TABLE STATUS LIKE 'membercontribution'");
        $row = mysql_fetch_array($result);
        $nextId = $row['Auto_increment']; //mcr000

        $qry = mysql_query('SELECT * FROM fixed_deposit_setting  ');
        while ($rowd = mysql_fetch_array($qry)) {

            if (base64_decode($rowd['frequency_posting']) == getPeriodId('daily')) {

                $myacc = mysql_query("select * from memberaccs where glaccid='" . $rowd['gl_account'] . "' AND status='" . base64_encode('active') . "' ");
                while ($roww = mysql_fetch_array($myacc)) {

                    //get dates
                    $datefrom = date('d-M-Y', strtotime('-0 days'));
                    $dateto = date('d-M-Y');

                    $depositIinte = savingsPosting($roww['mno'], $rowd['interest_glacc'], $datefrom, $dateto);

                    if ($depositIinte > 0.01) {
                        $dated = date('d-M-Y');
                        $fme = mysql_query('select * from membercontribution where memberno="' . $rowd['membernumber'] . '" and payeeid="' . $rowd['gl_account'] . '" and transaction="' . $rowd['interest_postaccount'] . '" AND amount="' . base64_encode(round($depositIinte, 2)) . '" AND date="' . base64_encode($dated) . '"  ') or die(mysql_error());
                        if (mysql_num_rows($fme) >= 1) {
                            //member has already contributed today
                            echo "already posted";
                        } else {

                            $qrystr = mysql_query('INSERT INTO membercontribution (memberno,payeeid,transaction,amount,date,transid,bnkid) VALUES ("' . $roww['mno'] . '","' . $rowd['gl_account'] . '", "' . $rowd['interest_postaccount'] . '", "' . base64_encode(number_format($depositIinte, 2)) . '", "' . base64_encode($dated) . '","' . base64_encode('mcr000' . $nextId) . '","' . getdefaultbank() . '")');
                        }
                    } else {
                        //no interest inserted
                        echo "no cash";
                    }
                }
            }
//if the choosen period is one week
            else if ((base64_decode($rowd['frequency_posting']) == getPeriodId('weekly')) && base64_decode($rowd['cron_jobs']) == '6') {

                $myacc = mysql_query("select * from memberaccs where glaccid='" . $rowd['gl_account'] . "' AND status='" . base64_encode('active') . "' ");
                while ($roww = mysql_fetch_array($myacc)) {
                    //get last seven days date
                    $datefrom = date('d-M-Y', strtotime('-7 days'));
                    $dateto = date('d-M-Y');
                    $depositIinte = savingsPosting($roww['mno'], $rowd['interest_glacc'], $datefrom, $dateto);

                    if ($depositIinte > 0.01) {
                        $dated = date('d-M-Y');
                        $fme = mysql_query('select * from membercontribution where memberno="' . $rowd['membernumber'] . '" and payeeid="' . $rowd['gl_account'] . '" and transaction="' . $rowd['interest_postaccount'] . '" AND amount="' . base64_encode(round($depositIinte, 2)) . '" AND date="' . base64_encode($dated) . '"  ') or die(mysql_error());
                        if (mysql_num_rows($fme) >= 1) {
                            //member has already contributed today
                            echo "already posted";
                        } else {

                            $qrystr = mysql_query('INSERT INTO membercontribution (memberno,payeeid,transaction,amount,date,transid,bnkid) VALUES ("' . $roww['mno'] . '","' . $rowd['gl_account'] . '", "' . $rowd['interest_postaccount'] . '", "' . base64_encode(number_format($depositIinte, 2)) . '", "' . base64_encode($dated) . '","' . base64_encode('mcr000' . $nextId) . '","' . getdefaultbank() . '")');
                        }
                    } else {
                        //no interest inserted
                        echo "no cash";
                    }
                }
                //reset the counter

                mysql_query("UPDATE fixed_deposit_setting SET posting_count='" . base64_encode(0) . "' WHERE gl_account='" . $rowd['gl_account'] . "' ");
            }
//if the choosen period is motnly
            else if ((base64_decode($rowd['frequency_accrual']) == getPeriodId('monthly')) && base64_decode($rowd['cron_jobs']) == $lastday) {

                $myacc = mysql_query("select * from memberaccs where glaccid='" . $rowd['gl_account'] . "' AND status='" . base64_encode('active') . "' ");
                while ($roww = mysql_fetch_array($myacc)) {
                    //get last days date of the month
                    if ($lastday == 28) {
                        $datefrom = date('d-M-Y', strtotime('-28 days'));
                    } else if ($lastday == 29) {
                        $datefrom = date('d-M-Y', strtotime('-29 days'));
                    } else if ($lastday == 30) {
                        $datefrom = date('d-M-Y', strtotime('-30 days'));
                    } else {
                        $datefrom = date('d-M-Y', strtotime('-31 days'));
                    }

                    $dateto = date('d-M-Y');
                    $depositIinte = savingsPosting($roww['mno'], $rowd['interest_glacc'], $datefrom, $dateto);

                    if ($depositIinte > 0.01) {
                        $dated = date('d-M-Y');
                        $fme = mysql_query('select * from membercontribution where memberno="' . $rowd['membernumber'] . '" and payeeid="' . $rowd['gl_account'] . '" and transaction="' . $rowd['interest_postaccount'] . '" AND amount="' . base64_encode(round($depositIinte, 2)) . '" AND date="' . base64_encode($dated) . '"  ') or die(mysql_error());
                        if (mysql_num_rows($fme) >= 1) {
                            //member has already contributed today
                            echo "already posted";
                        } else {

                            $qrystr = mysql_query('INSERT INTO membercontribution (memberno,payeeid,transaction,amount,date,transid,bnkid) VALUES ("' . $roww['mno'] . '","' . $rowd['gl_account'] . '", "' . $rowd['interest_postaccount'] . '", "' . base64_encode(number_format($depositIinte, 2)) . '", "' . base64_encode($dated) . '","' . base64_encode('mcr000' . $nextId) . '","' . getdefaultbank() . '")');
                        }
                    } else {
                        //no interest inserted
                        echo "no cash";
                    }
                }
                mysql_query("UPDATE fixed_deposit_setting SET posting_count='" . base64_encode(0) . "' WHERE gl_account='" . $rowd['gl_account'] . "' ");
            } else {
                //increment the count untill it conforms to the settings
                $addday = (base64_decode($rowd['cron_jobs'])) + 1;
                echo "count" . $addday;
                mysql_query("UPDATE fixed_deposit_setting SET posting_count='" . base64_encode($addday) . "' WHERE gl_account='" . $rowd['gl_account'] . "' ");
            }
        }
    }

    //fixed depoait account management fee
    public function FixedDepoManagementFee() {

        $dated = date('d-m-Y');
//$dated = date('31-08-2015');
        list($day, $themonth, $yearh) = explode('-', $dated);
        $lastday = cal_days_in_month(CAL_GREGORIAN, $themonth, $yearh);

        $qry = mysql_query('SELECT * FROM fixed_deposit_setting  ');
        while ($rowd = mysql_fetch_array($qry)) {

            if (base64_decode($rowd['Frequecny_management_fee']) == getPeriodId('daily')) {

                $myacc = mysql_query("select * from memberaccs where glaccid='" . $rowd['gl_account'] . "' AND status='" . base64_encode('active') . "' ");
                while ($roww = mysql_fetch_array($myacc)) {
                    $dated = date('d-M-Y');

                    $fme = mysql_query('select * from paymentin where payeeid="' . $roww['mno'] . '" and transname="' . $rowd['gl_account'] . '" AND date="' . base64_encode($dated) . '" ') or die(mysql_error());
                    if (mysql_num_rows($fme) >= 1) {
                        //member has already contributed for this month
                        echo "deducted";
                    } else {

                        $lipa = mysql_query('insert into paymentin (transname,amount,paymentype,status,paidby,payeeid,date,bnkid) values("' . $rowd['management_fee_glacc'] . '","' . $rowd['management_fee'] . '","' . base64_encode($ptype) . '","' . base64_encode('active') . '","' . base64_encode(getMembername($roww['mno'])) . '", "' . $roww['mno'] . '","' . base64_encode($dated) . '", "' . getdefaultbank() . '")') or die(mysql_error());
                    }
                }
            }
//when frequency is one week
            else if ((base64_decode($rowd['Frequecny_management_fee']) == getPeriodId('weekly')) && base64_decode($rowd['man_fee_cron']) == '6') {


                $myacc = mysql_query("select * from memberaccs where glaccid='" . $rowd['gl_account'] . "' AND status='" . base64_encode('active') . "' ");
                while ($roww = mysql_fetch_array($myacc)) {
                    $dated = date('d-M-Y');

                    $fme = mysql_query('select * from paymentin where payeeid="' . $roww['mno'] . '" and transname="' . $rowd['gl_account'] . '" AND date="' . base64_encode($dated) . '" ') or die(mysql_error());
                    if (mysql_num_rows($fme) >= 1) {
                        //member has already contributed for this month
                        echo "deducted";
                    } else {

                        $lipa = mysql_query('insert into paymentin (transname,amount,paymentype,status,paidby,payeeid,date,bnkid) values("' . $rowd['management_fee_glacc'] . '","' . $rowd['management_fee'] . '","' . base64_encode($ptype) . '","' . base64_encode('active') . '","' . base64_encode(getMembername($roww['mno'])) . '", "' . $roww['mno'] . '","' . base64_encode($dated) . '", "' . getdefaultbank() . '")') or die(mysql_error());
                    }
                }


                //reset the counter

                mysql_query("UPDATE fixed_deposit_setting SET man_fee_cron='" . base64_encode(0) . "' where gl_account='" . $rowd['gl_account'] . "' ");
            }
//when frequency is montly
            else if ((base64_decode($rowd['Frequecny_management_fee']) == getPeriodId('monthly')) && base64_decode($rowd['man_fee_cron']) == $lastday) {

                $myacc = mysql_query("select * from memberaccs where glaccid='" . $rowd['gl_account'] . "' AND status='" . base64_encode('active') . "' ");
                while ($roww = mysql_fetch_array($myacc)) {
                    $dated = date('d-M-Y');

                    $fme = mysql_query('select * from paymentin where payeeid="' . $roww['mno'] . '" and transname="' . $rowd['gl_account'] . '" AND date="' . base64_encode($dated) . '" ') or die(mysql_error());
                    if (mysql_num_rows($fme) >= 1) {
                        //member has already contributed for this month
                        echo "deducted";
                    } else {

                        $lipa = mysql_query('insert into paymentin (transname,amount,paymentype,status,paidby,payeeid,date,bnkid) values("' . $rowd['management_fee_glacc'] . '","' . $rowd['management_fee'] . '","' . base64_encode($ptype) . '","' . base64_encode('active') . '","' . base64_encode(getMembername($roww['mno'])) . '", "' . $roww['mno'] . '","' . base64_encode($dated) . '", "' . getdefaultbank() . '")') or die(mysql_error());
                    }
                }


                //reset the counter

                mysql_query("UPDATE fixed_deposit_setting SET man_fee_cron='" . base64_encode(0) . "' where gl_account='" . $rowd['gl_account'] . "' ");
            } else {
                //increment the count untill it conforms to the settings
                $addday = base64_decode($rowd['man_fee_cron']) + 1;
                echo "manage" . $addday;
                mysql_query("UPDATE fixed_deposit_setting SET man_fee_cron='" . base64_encode($addday) . "' WHERE gl_account='" . $rowd['gl_account'] . "' ");
            }
        }
    }

}

class VehicleRegistration {

    private $_user, $_member_number, $_vehiclereg, $_logbook;

    public function registervehicle($mno, $vrgno, $logbk, $value, $pdate, $vtyp, $routes, $capacity, $com, $fleet, $nname, $did, $cid) {
        $this->_member_number = $mno;
        $this->_vehiclereg = $vrgno;
        $this->_logbook = $logbk;
        $meqry = mysql_query('select * from newmember where membernumber="' . base64_encode($this->_member_number) . '"') or die(mysql_error());
        if (mysql_num_rows($meqry) >= 1) {
            if ($mno == "") {
                echo '<span class="red" >Sorry Member Number cannot be blank</span>';
            } else {
                if ($vrgno == "") {
                    echo '<span class="red" >Vehicle Registration Number cannot be blank</span>';
                } else {
                    if ($vtyp == "") {
                        echo '<span class="red" >Sorry Vehicle type cannot be blank</span>';
                    } else {
                        if ($logbk == "") {
                            echo '<span class="red" >Sorry Log Book Number cannot be blank</span>';
                        } else {
                            $cvehicle = mysql_query('select * from newvehicle where vehicleregno like "' . base64_encode($this->_vehiclereg) . '%"');
                            if (mysql_num_rows($cvehicle) >= 1) {

                                $al = '<script type="text/javascript">alert("Sorry A vehicle with a similar registration number exists");</script>';
                                echo $al;
                            } else {
                                $vqry = mysql_query('insert into newvehicle values("' . base64_encode($this->_member_number) . '","' . base64_encode($this->_vehiclereg) . '"
            ,"' . base64_encode($this->_logbook) . '","' . base64_encode($value) . '","' . base64_encode($pdate) . '","' . base64_encode($vtyp) . '","' . base64_encode($routes) . '"
                ,"' . base64_encode($capacity) . '","' . base64_encode($com) . '","' . base64_encode("active") . '","' . base64_encode($date) . '", "' . base64_encode($fleet) . '", "' . base64_encode($nname) . '", "' . base64_encode($did) . '", "' . base64_encode($cid) . '","")') or die(mysql_error());
                                if ($vqry) {

                                    $alt = '<script type="text/javascript">alert("Vehicle registration is successful");</script>';
                                    echo $alt;
                                } else {

                                    $alert = '<script type="text/javascript">alert(" Vehicle registration failed");</script>';
                                    echo $alert;
                                }
                            }
                        }
                    }
                }
            }
        } else {
            $alertd = '<script type="text/javascript">alert(" Sorry Member does not exist");</script>';
            echo $alertd;
        }
    }

    public function regeditvehicle($user, $id, $mno, $vrgno, $logbk, $value, $pdate, $vtyp, $routes, $capacity, $com, $fleet, $status, $nname, $did, $cid) {
        $this->_user = $user;
        $this->_member_number = $mno;
        $this->_vehiclereg = $vrgno;
        $this->_logbook = $logbk;
        $meqry = mysql_query('select * from newmember where membernumber="' . base64_encode($this->_member_number) . '"') or die(mysql_error());
        if (mysql_num_rows($meqry) == 1) {

            if ($mno == "") {
                $tdt = '<script type="text/javascript">alert("Sorry Member Number cannot be blank!!");</script>';
                echo $tdt;
            } else {
                if ($vrgno == "") {
                    $tdr = '<script type="text/javascript">alert("Vehicle Registration Number cannot be blank!!");</script>';
                    echo $tdr;
                } else {
                    if ($vtyp == "") {
                        $td = '<script type="text/javascript">alert("Sorry Vehicle type cannot be blank!!");</script>';
                        echo $td;
                    } else {
                        if ($logbk == "") {
                            $t = '<script type="text/javascript">alert("Sorry Log Book Number cannot be blank!!");</script>';
                            echo $t;
                        } else {
                            $mry = "UPDATE newvehicle SET memberno='" . base64_encode($this->_member_number) . "', vehicleregno='" . base64_encode($this->_vehiclereg) . "', logbookno='" . base64_encode($this->_logbook) . "', evalue='" . base64_encode($value) . "', purchasedate='" . base64_encode($pdate) . "', vehicletype='" . base64_encode($vtyp) . "', operationroute='" . base64_encode($routes) . "', capacity='" . base64_encode($capacity) . "', comments='" . base64_encode($com) . "', status='" . base64_encode($status) . "', fleet='" . base64_encode($fleet) . "', nickname='" . base64_encode($nname) . "', did='" . base64_encode($did) . "', cid='" . base64_encode($cid) . "' WHERE primarykey='$id'";

                            $result = mysql_query($mry);
                            mysql_query($result);


                            if ($mry) {

                                $alert = '<script type="text/javascript">alert("Changes to Vehicle Reg ' . $vrgno . ' have been Saved!!");</script>';
                                echo $alert;
                            } else {
                                $alertfail = '<script type="text/javascript">alert("Changes to Vehicle Reg ' . $vrgno . ' Failed!!");</script>';
                                echo $alertfail;
                            }
                        }
                    }
                }
            }
        } else {
            echo '<span class="red" >Sorry Member does not exist</span></br>';
        }
    }

}

class VehicleInspection extends VehicleRegistration {

    public function vehicleinspectiondetails($user, $inpectedby, $vregno, $ispdate, $bworks, $tyres, $status, $findings, $recom, $comm, $ins, $exp, $cert, $tlb) {
        $this->_vehiclereg = $vregno;
        $vcqry = mysql_query('select * from vehicleinspection where vehicleregno like "' . base64_encode($this->_vehiclereg) . '%"') or die(mysql_error());
        if (mysql_num_rows($vcqry) >= 1) {
            echo '<span class="red" >Sorry vehicle inspection details are already available</span></br>';
        } else {
            if ($inpectedby == "") {
                echo '<span class="red" >Sorry inspector name cannot be blank</span></br>';
            } else {
                if (namevalidation($inpectedby)) {
                    if ($vregno == "") {
                        echo '<span class="red" >Sorry vehicle registration cannot be blank</span></br>';
                    } else {
                        if ($bworks == "") {
                            echo '<span class="red" >Sorry bodyworks cannot be blank</span></br>';
                        } else {
                            $vrqry = mysql_query('select * from newvehicle where vehicleregno="' . base64_encode($vregno) . '"') or die(mysql_error());
                            if (mysql_num_rows($vrqry) >= 1) {
                                $inqry = mysql_query('insert into vehicleinspection values("' . base64_encode($inpectedby) . '","' . base64_encode($this->_vehiclereg) . '"
                ,"' . base64_encode($ispdate) . '","' . base64_encode($bworks) . '","' . base64_encode($tyres) . '","' . base64_encode($status) . '"
                    ,"' . base64_encode($findings) . '","' . base64_encode($recom) . '","' . base64_encode($comm) . '", "' . base64_encode($ins) . '", "' . base64_encode($exp) . '", "' . base64_encode($cert) . '", "' . base64_encode($tlb) . '","")') or die(mysql_error());
                                if ($inqry) {
                                    $users = new Users();
                                    $activity = "added vehicle inspection details";
                                    $users->audittrail($user, $activity);
                                    echo '<span class="green" >Vehicle inspection details has been recorded successfully</span></br>';
                                } else {
                                    echo '<span class="red" >Sorry vehicle inspection details failed to save</span></br>';
                                }
                            } else {
                                echo '<span class="red" >Sorry vehicle has not been registered yet</span></br>';
                            }
                        }
                    }
                } else {
                    echo '<span class="red" >Inspector name is not valid</span></br>';
                }
            }
        }
    }

}

class Admin {

    private $uname, $password, $session = "superadmin";

    public function addgroup($guser, $status, $commnets) {
        $chusr = mysql_query('select * from usergroups where user="' . strtolower(base64_encode($guser)) . '"') or die(mysql_error());
        if (mysql_num_rows($chusr) == 1) {
            echo '<span class="red" >Sorry User Group Exists</span></br>';
        } else {
            $inqry = mysql_query('insert into usergroups values("","' . base64_encode(strtolower($guser)) . '","' . base64_encode($status) . '",
                "' . base64_encode($commnets) . '","' . base64_encode(date("d-M-Y")) . '")') or die(mysql_error());
            if ($inqry) {
                $_SESSION['ugroup'] = strtolower($guser);
                $users = new Users();
                $activity = "added user group " . $guser . ' status ' . $status;
                $users->audittrail("Admin", $activity, "Admin");
                echo '<span class="green" ></span></br>';
                $alertfai = '<script type="text/javascript">alert("User Group Created Successfully!");</script>';
                echo $alertfai;
            } else {
                echo '<span class="red" ></span></br>';
                $alertfail = '<script type="text/javascript">alert("User Group Failed to create!");</script>';
                echo $alertfail;
            }
        }
    }

    //*******function to save periodicty details to the database*********//
    public function addperiod($period, $days) {
        $checkexist = mysql_query('select * from periodictyrecord where periodname="' . (base64_encode($period)) . '"') or die(mysql_error());
        if (mysql_num_rows($checkexist) >= 1) {
            echo '<span class="red" >Sorry period name already exists</span></br>';
        } else {
            $insertqry = mysql_query('insert into periodictyrecord values("","' . base64_encode(strtolower($period)) . '","' . base64_encode(strtolower($days)) . '")') or die(mysql_error());
            if ($insertqry) {
                $users = new Users();
                $activity = "added period name " . $period;
                $users->audittrail("Admin", $activity, "Admin");
                echo '<span class="green" ></span></br>';
                $alertsuccess = '<script type="text/javascript">alert("Period name Created Successfully!");</script>';
                echo $alertsuccess;
            } else {
                echo '<span class="red" ></span></br>';
                $alertfail = '<script type="text/javascript">alert("Period name Failed to create!");</script>';
                echo $alertfail;
            }
        }
    }

    //************end of function*********************************////

    public function updateuser($user, $id, $fname, $mname, $lname, $idno, $username, $password, $email, $mobile, $userlevel, $status, $picture, $comments) {
        if (floatvalidate($picture)) {
            $upd = mysql_query('update users set fname="' . base64_encode($fname) . '", mname="' . base64_encode($mname) . '", lname="' . base64_encode($lname) . '", idno="' . base64_encode($idno) . '", username="' . base64_encode($username) . '", password="' . base64_encode($password) . '", email="' . base64_encode($email) . '", phone="' . base64_encode($mobile) . '", userlevel="' . base64_encode(usergroupid($userlevel)) . '", status="' . base64_encode($status) . '", comments="' . base64_encode($comments) . '" where id="' . $id . '"') or die(mysql_error());
        } else {
            $delqry = mysql_query('select * from users where id="' . $id . '" and picture!=""') or die(mysql_error());
            if (mysql_num_rows($delqry) == 1) {
                $derslt = mysql_fetch_array($delqry);
                unlink("photos/" . base64_decode($derslt['picture']));
            }
            $upd = mysql_query('update users set fname="' . base64_encode($fname) . '", mname="' . base64_encode($mname) . '", lname="' . base64_encode($lname) . '", idno="' . base64_encode($idno) . '", username="' . base64_encode($username) . '", password="' . base64_encode($password) . '", email="' . base64_encode($email) . '", phone="' . base64_encode($mobile) . '", picture="' . base64_encode($picture) . '", userlevel="' . base64_encode(usergroupid($userlevel)) . '", status="' . base64_encode($status) . '", comments="' . base64_encode($comments) . '" where id="' . $id . '"') or die(mysql_error());
        }


        $result = mysql_query($upd);
        mysql_query($result);

        if ($upd) {
            $users = new Users();
            $activity = "updated user" . $fname . ' ' . $mname . ' ' . $lname . ' details';
            $users->audittrail("Admin", $activity, "Admin");
            $alertfail = '<script type="text/javascript">alert("User Profile Saved!!");</script>';
            echo $alertfail;
        } else {
            $alertyes = '<script type="text/javascript">alert("User Profile has failed!!");</script>';
            echo $alertyes;
        }
    }

    public function addcashbank($cash_in_hand, $totalrev, $first_total, $other_source, $invoice_no, $account, $transfer_purpose, $date, $payee, $mode_of_payment, $receipt_no, $amount, $total_cash, $account_deposit) {
        $query = mysql_query("INSERT INTO cashbank (cash_in_hand,totalrev,first_total,other_source,invoice_no,account,transfer_purpose,date,payee,mode_of_payment,receipt_no,amount,total_cash,account_deposit)VALUES('$cash_in_hand','$totalrev','$first_total','$other_source','$invoice_no','$account','$transfer_purpose','$date','$payee','$mode_of_payment','$receipt_no','$amount','$total_cash','$account_deposit') ");

        if ($query) {
            $users = new Users();
            $activity = "created new cashbank transaction ";
            $users->audittrail($_SESSION['users'], $activity, $user);
            $alertyes = '<script type="text/javascript">alert("trasaction added successfully!!");</script>';
            echo $alertyes;
        }
    }

}

class Users extends Admin {

    private $idno, $mobile, $email, $uname, $password;

    public function loansett($user, $lname, $ltype, $status, $ratetype, $rate, $appfee, $fee, $insfee, $insfee2, $min, $max, $comments, $maxg, $fyn, $maxloansave, $duration, $interesttype, $legalfee) {

        $with = mysql_query('select * from loansettings where lname="' . base64_encode($lname) . '" and rate="' . base64_encode($rate) . '" and min="' . base64_encode($min) . '" and max="' . base64_encode($max) . '" and status="' . base64_encode($status) . '" and comments="' . base64_encode($comments) . '"  and  legalfees="' . $legalfee . '" ') or die(mysql_error());
        if (mysql_num_rows($with) >= 1) {
            echo '<span class="red" >Sorry it seems you have already created a similar loan type</span></br>';
            $alert = '<script type="text/javascript">alert("Sorry it seems you have already created a similar loan type");</script>';
            echo $alert;
        } else {

            if ($fee == '1') {

                $draw = mysql_query('insert into loansettings values("' . base64_encode($lname) . '", "' . base64_encode($ltype) . '",
            "' . base64_encode($status) . '", "' . base64_encode($ratetype) . '", "' . base64_encode($rate) . '", "' . base64_encode($appfee) . '",
            "' . base64_encode($insfee) . '", "' . base64_encode($min) . '", "' . base64_encode($max) . '", "' . base64_encode($comments) . '", "' . base64_encode($maxg) . '","' . base64_encode($fyn) . '"
                  ,"' . base64_encode($maxloansave) . '","' . base64_encode($duration) . '","' . base64_encode($interesttype) . '","' . base64_encode($legalfee) . '","")') or die(mysql_error());
            } else {

                $draw = mysql_query('insert into loansettings values("' . base64_encode($lname) . '", "' . base64_encode($ltype) . '",
            "' . base64_encode($status) . '", "' . base64_encode($ratetype) . '", "' . base64_encode($rate) . '", "' . base64_encode($appfee) . '",
            "' . base64_encode($insfee2) . '", "' . base64_encode($min) . '", "' . base64_encode($max) . '", "' . base64_encode($comments) . '", "' . base64_encode($maxg) . '","' . base64_encode($fyn) . '"
                  ,"' . base64_encode($maxloansave) . '","' . base64_encode($duration) . '","' . base64_encode($interesttype) . '","' . base64_encode($legalfee) . '","")') or die(mysql_error());
            }
            if ($draw) {
                $users = new Users();
                $activity = "created a loan type " . $lname;
                $users->audittrail($user, $activity, $user);

                $alert = '<script type="text/javascript">alert("You Have Successfully Created ' . $lname . ' as a Loan.");</script>';
                echo $alert;
                $newid = mysql_insert_id();
                $accode = '111101' . $newid;
                $inqry = mysql_query('insert into glaccounts values("", "' . base64_encode(($accode)) . '", "' . base64_encode($lname) . '","' . base64_encode('1') . '", "' . base64_encode('Active') . '","' . base64_encode(date('d-M-Y')) . '")') or die(mysql_error());
            } else {

                $alertd = '<script type="text/javascript">alert("Loan Settings Creation Failed.");</script>';
                echo $alertd;
            }
        }
    }

    public function addcurrencyset($user, $currencyname, $code, $symbol) {

        $sth = mysql_query("INSERT INTO  currency(name,currencycode,symbol)   VALUES ('$currencyname','$code','$symbol')  ");
        if ($sth) {
            $users = new Users();
            $activity = "you have added  " . base64_decode($currencyname);
            $users->audittrail($user, $activity, $user);

            $alerd = '<script type="text/javascript">alert("You Have Successfully Created ' . base64_decode($currencyname) . ' as a currency!");</script>';
            echo $alerd;
        } else {

            $alertd = '<script type="text/javascript">alert("You Have Not Successfully Created ' . base64_decode($currencyname) . ' as a currency!");</script>';
            echo $alertd;
        }

//}
    }

    public function addpermission($user, $ugroup, $status, $permission) {
        $adperm = mysql_query('insert into groupperm values("","' . usergroupid($ugroup) . '","' . base64_encode($permission) . '","' . base64_encode($status) . '")') or die(mysql_error());
        if ($adperm) {
            $users = new Users();
            $activity = "added group permissions to " . $ugroup;
            $users->audittrail("Admin", $activity, "Admin");
            echo '<span class="green" >Permission ' . $permission . ' added successfully</span></br>';
        }
    }

    public function adduser($user, $fname, $mname, $lname, $idno, $mobile, $email, $uname, $password, $ulevel, $status, $image, $comments) {
        $this->idno = $idno;
        $this->mobile = $mobile;
        $this->email = $email;
        $this->uname = $uname;
        $this->password = $password;
        $cheqry = mysql_query('select * from users where idno="' . base64_encode($this->idno) . '"') or die(mysql_error());
        if (mysql_num_rows($cheqry) == 1) {
            echo '<span class="red" >Sorry user exists</span></br>';
        } else {
            $cheuser = mysql_query('select * from users where username="' . base64_encode($uname) . '"') or die(mysql_error());
            if (mysql_num_rows($cheqry) == 1) {
                echo '<span class="red" >Sorry a username already exists</span></br>';
            } else {
                $cheqradmin = mysql_query('select * from admin where uname="' . base64_encode($uname) . '"') or die(mysql_error());
                if (mysql_num_rows($cheqradmin) == 1) {
                    echo '<span class="red" >Sorry a username already exists</span></br>';
                } else {
                    $adqry = mysql_query('insert into users values("","' . base64_encode($fname) . '","' . base64_encode($mname) . '","' . base64_encode($lname) . '",
                "' . base64_encode($this->idno) . '","' . base64_encode($this->uname) . '","' . base64_encode($this->password) . '","' . base64_encode($this->email) . '",
                    "' . base64_encode($this->mobile) . '","' . base64_encode($image) . '","' . base64_encode(usergroupid($ulevel)) . '",
                        "' . base64_encode($status) . '","' . base64_encode(date("d-M-Y")) . '","' . base64_encode($comments) . '")') or die(mysql_error());
                    if ($adqry) {
                        $users = new Users();
                        $activity = "created new user " . $fname . ' ' . $mname . ' ' . $lname;
                        $users->audittrail("Admin", $activity, "Admin");
                        $alertfail = '<script type="text/javascript">alert("User registered successfully!!");</script>';
                        echo $alertfail;
                    } else {
                        $alert = '<script type="text/javascript">alert("User registration failed!!");</script>';
                        echo $alert;
                    }
                }
            }
        }
    }

    public function getBrowser() {
        
    }

    public function login($username, $password) {
        $cheadmin = mysql_query('select * from admin where uname="' . mysql_real_escape_string(base64_encode($username)) . '" and password="' . mysql_real_escape_string(base64_encode($password)) . '"') or die(mysql_error());
        if (mysql_num_rows($cheadmin) == 1) {
            $_SESSION['superadmin'] = "superadmin";
            header('location:admin_dashboard.php');
        } else {
            $checkuser = mysql_query('select * from users where username="' . base64_encode($username) . '" and password="' . base64_encode($password) . '" and status="' . base64_encode("Active") . '"') or die(mysql_error());
            if (mysql_num_rows($checkuser) == 1) {
                //get ip address
                $u_agent = $_SERVER['HTTP_USER_AGENT'];
                $bname = 'Unknown';
                $platform = 'Unknown';
                $version = "";

                //First get the platform?
                if (preg_match('/linux/i', $u_agent)) {
                    $platform = 'linux';
                } elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
                    $platform = 'mac';
                } elseif (preg_match('/windows|win32/i', $u_agent)) {
                    $platform = 'windows';
                }

                // Next get the name of the useragent yes seperately and for good reason
                if (preg_match('/MSIE/i', $u_agent) && !preg_match('/Opera/i', $u_agent)) {
                    $bname = 'Internet Explorer';
                    $ub = "MSIE";
                } elseif (preg_match('/Firefox/i', $u_agent)) {
                    $bname = 'Mozilla Firefox';
                    $ub = "Firefox";
                } elseif (preg_match('/Chrome/i', $u_agent)) {
                    $bname = 'Google Chrome';
                    $ub = "Chrome";
                } elseif (preg_match('/Safari/i', $u_agent)) {
                    $bname = 'Apple Safari';
                    $ub = "Safari";
                } elseif (preg_match('/Opera/i', $u_agent)) {
                    $bname = 'Opera';
                    $ub = "Opera";
                } elseif (preg_match('/Netscape/i', $u_agent)) {
                    $bname = 'Netscape';
                    $ub = "Netscape";
                }

                // finally get the correct version number
                $known = array('Version', $ub, 'other');
                $pattern = '#(?<browser>' . join('|', $known) .
                        ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
                if (!preg_match_all($pattern, $u_agent, $matches)) {
                    // we have no matching number just continue
                }

                // see how many we have
                $i = count($matches['browser']);
                if ($i != 1) {
                    //we will have two since we are not using 'other' argument yet
                    //see if version is before or after the name
                    if (strripos($u_agent, "Version") < strripos($u_agent, $ub)) {
                        $version = $matches['version'][0];
                    } else {
                        $version = $matches['version'][1];
                    }
                } else {
                    $version = $matches['version'][0];
                }

                // check if we have a number
                if ($version == null || $version == "") {
                    $version = "?";
                }

                $ua = array(
                    'userAgent' => $u_agent,
                    'name' => $bname,
                    'version' => $version,
                    'platform' => $platform,
                    'pattern' => $pattern
                );
                //
                $original_ip = gethostbyname(trim(`hostname`));
                $computer = gethostname();
                $checkuserrslt = mysql_fetch_array($checkuser);
                session_regenerate_id();
                $_SESSION['id'] = crypt(session_id());
                if ($_SERVER['REMOTE_ADDR'] == '::1') {
                    $remote_ip = '127.0.0.1';
                } else {
                    $remote_ip = $_SERVER['REMOTE_ADDR'];
                }
                // now try it

                $browser = ($ua['name']);
                $browser_version = ($ua['version']);
                $os = ($ua['platform']);
                $user_agent = ($ua['userAgent']);
                //$us = base64_encode($checkuserrslt['id']);
                $start_time = time();
                //$terminate = mysql_query('UPDATE session SET valid = MA== WHERE user = "' . $us . '"');
                $sess = mysql_query('INSERT INTO session (user, original_ip, server_ip, computer, browser, user_agent, browser_version, os, start_timestamp, valid, session_id) VALUES("' . $us . '", "' . base64_encode($original_ip) . '", "' . base64_encode($remote_ip) . '", "' . base64_encode($computer) . '", "' . base64_encode($browser) . '", "' . base64_encode($user_agent) . '", "' . base64_encode($browser_version) . '", "' . base64_encode($os) . '", "' . base64_encode($start_time) . '", "' . true . '", "' . $_SESSION['id'] . '")');
                $_SESSION['users'] = $checkuserrslt['id'];
                
                 $sms = mysql_query("SELECT * FROM sms_settings WHERE status = 'QWN0aXZl'");
                $smsrow = mysql_fetch_array($sms);
                $sms_username = ($smsrow['username']);
                $sms_password = md5(base64_decode($smsrow['password']));

                if (mysql_num_rows($sms) > 0) {
                    $_SESSION['sms'] = $smsrow['id'];
                    header("LOCATION: http://sms.truehost.org/sms/check_login.php?gp=$sms_password&sd=$sms_username");
                }
                header('location:index');
               
                
            } else {
                print'<div class="alert alert-danger" "col-md-6">
                        <strong>Sorry! Wrong password or username</strong></div>';
            }
        }
    }

    public function updateuserprofile($user, $uname, $pass) {
        if (inputvalidation($uname)) {
            if (inputvalidation($pass)) {
                $qry = mysql_query('update users set username="' . base64_encode($uname) . '",password="' . base64_encode($pass) . '" where id="' . $user . '"') or die(mysql_error());
                if ($qry) {
                    $alertfail = '<script type="text/javascript">alert("Profile updated successfully!");</script>';
                    echo $alertfail;
                } else {
                    $alert = '<script type="text/javascript">alert("Profile update failed!");</script>';
                    echo $alert;
                }
            } else {
                echo '<span class="red" >Sorry Password must be atleast 6 characters</span></br>';
            }
        } else {
            echo '<span class="red" >Sorry Username must be atleast 6 characters</span></br>';
        }
    }

    public function updateadmiinprofile($user, $uname, $pass) {

        if (inputvalidation($uname)) {
            if (inputvalidation($pass)) {
                $qry = mysql_query('update admin set uname="' . mysql_real_escape_string(base64_encode($uname)) . '",password="' . mysql_real_escape_string(base64_encode($pass)) . '"  ') or die(mysql_error());
                if ($qry) {
                    $users = new Users();
                    $activity = "updated admin profile";
                    $users->audittrail("Admin", $activity);
                    $alert = '<script type="text/javascript">alert("Profile updated successfully!");</script>';
                    echo $alert;
                } else {
                    $alertd = '<script type="text/javascript">alert("Profile update failed!");</script>';
                    echo $alertd;
                }
            } else {
                echo '<span class="red" >Sorry Password must be atleast 6 characters</span></br>';
            }
        } else {
            echo '<span class="red" >Sorry Username must be atleast 6 characters</span></br>';
        }
    }

    public function checkuserlogin($session) {
        $qry = mysql_query('select * from users where id="' . $session . '" and status="' . base64_encode("Active") . '"') or die(mysql_error());
        if (mysql_num_rows($qry) == 0) {
            header('location:logout.php');
        } else {
            $rslt = mysql_fetch_array($qry);
            return base64_decode($rslt['fname']) . ' ' . base64_decode($rslt['lname']);
        }
    }

    public function checkadminlogin($session) {
        if (!$session == "superadmin") {
            header('location:logout.php');
        } else {
            return "Administator";
        }
    }

    public function permissions($session, $page) {
        /*$qry = mysql_query('select * from users where id="' . $session . '"') or die(mysql_error());
        $rslt = mysql_fetch_array($qry);
        $perqry = mysql_query('select * from groupperm where groupid="' . base64_decode($rslt['userlevel']) . '" and permission="' . base64_encode($permission) . '" and status="' . base64_encode("Active") . '"') or die(mysql_error());
        if (mysql_num_rows($perqry) == 1) {
            return "true";
        }*/
        $pid = get_page_id($page);
        $page_id = base64_encode($pid);
        $us = $_SESSION['users'];
        $userd = base64_encode($us);
        $qry = mysql_query('select * from permission where user="' . base64_encode($session) . '" and page="' . $page_id . '"') or die(mysql_error());
        while ($row = mysql_fetch_array($qry)) {
            $rd = base64_decode($row['page_read']);
            $wr = base64_decode($row['page_write']);
        }
        if($rd == 1 | $wr == 1){
            $ret = 1;
            return $ret;
        }
        else{
            $ret = 0;
            return $ret;
        }
    }

    public function audittrail($user, $activity, $mno) {
        mysql_query('insert into audit values("","' . base64_encode($user) . '","' . base64_encode($mno) . '","' . base64_encode($activity) . '","' . base64_encode(date("d-M-Y")) . '","' . base64_encode(date("l dS \of F Y h:i:s A")) . '")') or die(mysql_error());
    }

    public function insertIntoPro($lid, $amtfrom, $amtto, $amount) {
        //check if loan range exists
        $check = mysql_query('SELECT * FROM loanprocessingfees WHERE loanid="' . base64_encode($lid) . '" AND amountfrom="' . base64_encode($amtfrom) . '" AND amountto="' . base64_encode($amtto) . '" AND amount="' . base64_encode($amount) . '"');
        if (mysql_num_rows($check) >= 1) {
            $alert = '<script type="text/javascript">alert("Error! Range for that loan exists");</script>';
            echo $alert;
        } else {
            $sth = mysql_query("INSERT INTO  loanprocessingfees(loanid,amountfrom,amountto,amount)  VALUES('" . base64_encode($lid) . "','" . base64_encode($amtfrom) . "','" . base64_encode($amtto) . "','" . base64_encode($amount) . "')");

            echo mysql_num_rows($sth);
            if ($sth) {
                $alert = '<script type="text/javascript">alert("Amount Added !");</script>';
                echo $alert;
            } else {
                $alertd = '<script type="text/javascript">alert("Amount  failed To save!");</script>';
            } echo $alertd;
        }
    }

    /*
      //with fee setting
      public function insertIntoPro($lid, $amtfrom, $amtto, $amount) {
      //check if loan range exists
      $check = mysql_query('SELECT * FROM loanprocessingfees WHERE loanid="' . base64_encode($lid) . '" AND amountfrom="' . base64_encode($amtfrom) . '" AND amountto="' . base64_encode($amtto) . '" AND amount="' . base64_encode($amount) . '"');
      if (mysql_num_rows($check) >= 1) {
      $alert = '<script type="text/javascript">alert("Error! Range for that loan exists");</script>';
      echo $alert;
      } else {
      $sth = mysql_query("INSERT INTO  loanprocessingfees(loanid,amountfrom,amountto,amount)  VALUES('" . base64_encode($lid) . "','" . base64_encode($amtfrom) . "','" . base64_encode($amtto) . "','" . base64_encode($amount) . "')");

      echo mysql_num_rows($sth);
      if ($sth) {
      $alert = '<script type="text/javascript">alert("Amount Added !");</script>';
      echo $alert;
      } else {
      $alertd = '<script type="text/javascript">alert("Amount  failed To save!");</script>';
      } echo $alertd;
      }
      }
     */

    //transfer fee insert
    public function insert_transferFee($actfrom, $glacctto, $amount, $chargeGl) {

        $checkexist = mysql_query('select * from fee_transfer_setting where account_from="' . base64_encode($actfrom) . '" && account_to="' . base64_encode($glacctto) . '" amount_charged="' . base64_encode($amount) . '" ') or die(mysql_error());
        if (mysql_num_rows($checkexist) >= 1) {
            print'<div class="alert alert-danger">
                        <strong>Sorry!</strong> Such a relation ' . $actfrom . ' ' . $glacctto . ' already exists. </div>';
        } else {
            $inwf = mysql_query('insert into fee_transfer_setting (account_from,account_to,amount_charged) values("' . base64_encode($actfrom) . '","' . base64_encode($glacctto) . '","' . base64_encode($amount) . '")') or die(mysql_error());
            $upd = mysql_query('update settings SET transfer_fee_glaccount="' . base64_encode($chargeGl) . '" where id="1" ');
            echo mysql_num_rows($inwf);
            if ($inwf) {

                $users = new Users();
                $activity = "added transfer fee  from account " . getGlname($actfrom) . ' to account ' . getGlname($glacctto);
                $users->audittrail("Admin", $activity, "Admin");
                print'<div class="alert alert-success">
                        <strong>Success!</strong> successfully registered withdrawal fee
                     </div>';
            } else {
                print'<div class="alert alert-danger">
                        <strong>Sorry!</strong> No amount has been added. </div>';
            }
        }
    }

    //withdraw fee 
    public function insert_withdrawfee($amtfrom, $amountto, $charge, $glaccout, $chargeGl) {

        $checker = mysql_query('select * from withdrawalfee where glaccount="' . base64_encode($glaccout) . '" and amountfrom="' . base64_encode($amtfrom) . '" && amount_to="' . base64_encode($amountto) . '" && amount="' . base64_encode($amount) . '" ') or die(mysql_error());
        if (mysql_num_rows($checker) >= 1) {
            print'<div class="alert alert-danger">
                        <strong>Sorry!</strong> Such a relation for ' . getGlname($glaccout) . ' already exists. </div>';
        } else {
            $inwf = mysql_query('insert into withdrawalfee (glaccount,amountfrom,amount_to,amount) values("' . base64_encode($glaccout) . '","' . base64_encode($amtfrom) . '","' . base64_encode($amountto) . '","' . base64_encode($charge) . '")') or die(mysql_error());
            $upd = mysql_query('update settings SET withdrawfee_glaccount="' . base64_encode($chargeGl) . '" where id="1" ');
            echo mysql_num_rows($inwf);
            if ($inwf) {

                $users = new Users();
                $activity = "added withdraw fee  for  " . getGlname($glaccout);
                $users->audittrail("Admin", $activity, "Admin");
            } else {
                print'<div class="alert alert-danger">
                        <strong>Sorry!</strong> No amount has been added. </div>';
            }
        }
        print'<div class="alert alert-success">
                        <strong>Success!</strong> successfully registered withdrawal fee
                     </div>';
    }

    public function accountClosingFee($amout) {

        //check if withdrawal fee is registered.if true update
        $checkexist = mysql_query('select * from withdrawalfee where withdraw_fee="' . base64_encode($amout) . '" && id="1"') or die(mysql_error());
        if (mysql_num_rows($checkexist) >= 1) {
            $updater = mysql_query('UPDATE withdrawalfee SET withdraw_fee="' . base64_encode($amout) . '" WHERE id="1"');
            if ($updater) {
                $alert = '<script type="text/javascript">alert("successfully registered withdrawal fee");document.location.href = "account_closing.php";</script>';
                echo $alert;
            }
        } else {
            $qryins = mysql_query('UPDATE withdrawalfee SET withdraw_fee="' . base64_encode($amout) . '" WHERE id="1"');
            if ($qryins) {

                $alert = '<script type="text/javascript">alert("successfully registered withdrawal fee");document.location.href = "account_closing.php";</script>';
                echo $alert;
            }
        }
    }

//interest on savings
    public function interest_saving_setting($saving_acc, $accrue_period, $post_period, $interest_rate, $interestGl, $interestmember) {
        //check if settings exists.if true update
        $check = mysql_query(" SELECT * FROM glaccounts where acname='" . base64_encode($saving_acc) . "' and accgroup='" . base64_encode('2') . "' ");
        if (mysql_num_rows($check) >= 1) {

            $alertd = '<script type="text/javascript">alert("Sorry account exists !");</script>';
            echo $alertd;
        } else {

            $random = mt_rand(1000, 9999);
            $dated = date('d-M-Y');

            $qrygl = mysql_query('insert into glaccounts (accode,acname,accgroup,status,date) values("' . base64_encode($random) . '","' . base64_encode($saving_acc) . '","' . base64_encode('2') . '","' . base64_encode('Active') . '","' . base64_encode($dated) . '")');
            $glId = mysql_insert_id();

            if ($qrygl) {
                $qryw = mysql_query('INSERT INTO interest_saving_setting (gl_account,accrual_period,posting_period,default_accrued_account,default_expense_account,interest_rate) VALUES ("' . base64_encode($glId) . '","' . base64_encode($accrue_period) . '","' . base64_encode($post_period) . '","' . base64_encode($interestGl) . '","' . base64_encode($interestmember) . '","' . base64_encode($interest_rate) . '") ');
                if ($qryw) {
                    $alert = '<script type="text/javascript">alert("Settings successfully registered");document.location.href = "interest_save_setting.php";</script>';
                    echo $alert;
                }
            }
        }
    }

    //UPDATE SAVINGS INTEREST SETTINGS
    public function update_saving_setting($IDS, $gLID, $acc_name, $accrue_period, $post_period, $interest_rate, $interestGl, $interestmember) {
        $upter = mysql_query('UPDATE interest_saving_setting SET accrual_period="' . base64_encode($accrue_period) . '" ,posting_period="' . base64_encode($post_period) . '" ,default_accrued_account="' . base64_encode($interestGl) . '" ,default_expense_account="' . base64_encode($interestmember) . '" ,interest_rate="' . base64_encode($interest_rate) . '"  WHERE id="' . $IDS . '" ');

        $uptr = mysql_query('UPDATE glaccounts SET acname="' . base64_encode($acc_name) . '" WHERE id="' . $gLID . '"  ');

        if ($upter) {
            $alert = '<script type="text/javascript">alert("Settings updated successfully");document.location.href = "interest_save_setting.php";</script>';
            echo $alert;
        }
    }

}
