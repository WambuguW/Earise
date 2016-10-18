<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

date_default_timezone_set("Africa/Nairobi");

function bankupdate($user, $id, $bankname, $branch, $accno, $status) {
// update data in mysql database

    $sql = "UPDATE addbank SET bankname='" . base64_encode($bankname) . "', branch='" . base64_encode($branch) . "', accno='" . base64_encode($accno) . "', status='" . base64_encode($status) . "' WHERE primarykey='" . $id . "'";
//$stmt=mysql_query("      ");
    $result = mysql_query($sql);
    mysql_query($result);

// if successfully updated. AND  ($stmt)
    if (($result)) {

        $users = new Users();
        $activity = "updated bank details for bank " . getbankname($id);
        $users->audittrail("Admin", $activity, "Admin");
        $alertyes = '<script type="text/javascript">alert("Editing was Successful!");</script>';
        $alertfail = '<script type="text/javascript">alert("Editing Failed!!");</script>';
        echo $alertyes;
        echo '<form action="banknew.php"><div class="two"><button class="btn green">Go Back to Banks.</button></div></form>';
    } else {
        echo $alertfail;
    }
}

function getvaluecollateral($gname) {

    $jazz = mysql_query('select * from collateral where id="' . ($gname) . '"');
    $result = mysql_fetch_array($jazz);
    return base64_decode($result['value']);
}

function loanminbalance($user, $memberno) {
    echo '<table  class="table table-striped  table-bordered table-hover sorting_asc_disabled"  id="sample_2">
    <tr>
    <thead>
    <th>Member Number</th>
    <th>Member Name</th>
    <th>ID Number</th>
    <th>Loan Type</th>
    <th>Principle</th>
    <th>Interest</th>
    <th>Last Amount Paid</th>
    <th>Last Transaction</th>
    <th>Loan Status</th>
    <th>Principle Balance</th>
</thead>    
</tr>';
    $sum = 0;
    $tsum = 0;

    $mno = base64_encode($memberno);

    $qry = mysql_query('select * from loanapplication where membernumber="' . ($mno) . '" and status="' . base64_encode('pending') . '"') or die(mysql_error());
    while ($row = mysql_fetch_array($qry)) {
        echo '<tr><td>' . base64_decode($mno) . '</td>';
        echo '<td>' . getMembername($mno) . '</td>';
        echo '<td>' . getidno($mno) . '</td>';
        echo '<td>' . (loanname($row['transactionid'])) . '</td>';
        echo '<td>' . number_format(amountpaid($row['transactionid']), 2) . '</td>';
        echo '<td>' . number_format(lastintr($row['membernumber'], ($row['transactionid'])), 2) . '</td>';
        echo '<td>' . number_format(totalpaid($row['transactionid'], $mno, base64_decode($row['loantype'])), 2) . '</td>';
        echo '<td>' . slastdates($mno, loanname($row['transactionid'])) . '</td>';
        echo '<td>' . base64_decode($row['status']) . '</td>';
        echo '<td>' . number_format(principlepaid($row['transactionid']), 2) . '</td></tr>';
        $sum1+=addloanamoutpaid($row['transactionid']);
        $sum2+=amountpaid($row['transactionid']);
        $sum5+=lastintr($mno, ($row['transactionid']));
        $sum6+=lastpaya($mno, base64_decode($row['loantype']));
        $sum7+=principlepaid($row['transactionid']);
        $sum99+=remainingloan($row['transactionid']);
        $lastt = $sum5 + $sum6;

        left($mno, $row['transactionid']);
    }

    echo '<tr><td colspan="3"></td><th>Total</th><th>' . number_format($sum2, 2) . '</th>
        <th>' . number_format($sum5, 2) . '</th>
        <th>' . number_format($lastt, 2) . '</th><td></td><td></td>
        <th>' . number_format($sum7, 2) . '</th></tr></table>';

    echo '<br/><div class="two">NB, any error in this statement should be advised within 21 days of receipt. Otherwise the account will be presumed to be in order...</div>';
    echo '<br/><div class = "two">Prepared By ........................................... <br/>&nbsp;&nbsp;&nbsp; </div><div class = "two"> Checked By ...........................................</div></br>';
    echo '<div class="two"><div class="noprint"><button class="btn green" value="Print this page" onClick="return printResults()">Print</button></div></div>';
}

function supamount($mno) {
    $query = mysql_query(" SELECT * FROM   membercontribution   WHERE memberno='" . base64_encode($mno) . "'          ");
    while ($row = mysql_fetch_array($query)) {
        $amount +=base64_decode($row['amount']);
    }
    return $amount;
}

function getloanfactor($tid) {
    $qry = mysql_query('select * from loansettings where id="' . $tid . '"') or die(mysql_error());
    while ($rslt = mysql_fetch_array($qry)) {
        return base64_decode($rslt['maxloansave']);
    }
}

function getdebtor($mno) {

    if (isset($mno)) {
        $sql = mysql_query('SELECT * FROM addebtor WHERE id = "' . $mno . '"') or die(mysql_error());

        if (mysql_num_rows($sql) == 0) {
            return "No Debtor";
        } else {
            $Row = mysql_fetch_array($sql);

            return ucwords(strtolower(base64_decode($Row['dname'])));
        }
    }
}

function getGlname($invo) {

    $huh = mysql_query("SELECT * FROM glaccounts where id ='" . $invo . "'");

    while ($chu = mysql_fetch_array($huh)) {

        return ucwords(strtolower(base64_decode($chu['acname'])));
    }
}

function getcreditor($mno) {

    if (isset($mno)) {
        $sql = mysql_query('SELECT * FROM addcreditor WHERE id = "' . $mno . '"') or die(mysql_error());

        if (mysql_num_rows($sql) == 0) {
            return "No Creditor";
        } else {
            $Row = mysql_fetch_array($sql);

            return ucwords(strtolower(base64_decode($Row['dname'])));
        }
    }
}

function getglacc($id) {

    if (isset($id)) {
        $sql = mysql_query('SELECT * FROM glaccounts WHERE id = "' . $id . '"') or die(mysql_error());

        if (mysql_num_rows($sql) == 0) {
            return "No GL Account";
        } else {
            $Row = mysql_fetch_array($sql);

            return ((base64_decode($Row['acname'])));
        }
    }
}

function getglcombi($id) {

    if (isset($id)) {
        $sql = mysql_query('SELECT * FROM glaccounts WHERE id = "' . $id . '"') or die(mysql_error());

        if (mysql_num_rows($sql) == 0) {
            return "No GL Account";
        } else {
            $Row = mysql_fetch_array($sql);

            return (base64_decode($Row['accgroup']));
        }
    }
}

function getglcode($id) {

    if (isset($id)) {
        $sql = mysql_query('SELECT * FROM glaccounts WHERE id = "' . $id . '"') or die(mysql_error());

        if (mysql_num_rows($sql) == 0) {
            return "No GL Account";
        } else {
            $Row = mysql_fetch_array($sql);

            return base64_decode($Row['accode']);
        }
    }
}

function getglidaccountfrom($id) {

    if (isset($actfrom)) {
        $sql = mysql_query('SELECT * FROM glaccounts WHERE id = "' . $id . '"') or die(mysql_error());

        if (mysql_num_rows($sql) == 0) {
            return "No GL Account";
        } else {
            $Row2 = mysql_fetch_array($sql);

            return ($Row2['id']);
        }
    }
}

function getglidaccountto($id) {

    if (isset($actto)) {
        $sql = mysql_query('SELECT * FROM glaccounts WHERE id = "' . $id . '"') or die(mysql_error());

        if (mysql_num_rows($sql) == 0) {
            return "No GL Account";
        } else {
            $Row3 = mysql_fetch_array($sql);

            return($Row3['id']);
        }
    }
}

function getgliddefaultsaving($id) {
    if (isset($defsave)) {
        $sql = mysql_query('SELECT * FROM glaccounts WHERE id = "' . $id . '"') or die(mysql_error());

        if (mysql_num_rows($sql) == 0) {
            return "No GL Account";
        } else {
            $Rowdefs = mysql_fetch_array($sql);

            return($Rowdefs['id']);
        }
    }
}

function getglcodedefaultshares($id) {

    if (isset($defshare)) {
        $sql = mysql_query('SELECT * FROM glaccounts WHERE id = "' . $id . '"') or die(mysql_error());

        if (mysql_num_rows($sql) == 0) {
            return "No GL Account";
        } else {
            $Rowshare = mysql_fetch_array($sql);

            return ($Rowshare['id']);
        }
    }
}

function getglid($id) {

    if (isset($id)) {
        $sql = mysql_query('SELECT * FROM glaccounts WHERE acname = "' . base64_encode($id) . '"') or die(mysql_error());

        if (mysql_num_rows($sql) == 0) {
            return "No GL Account";
        } else {
            $Row = mysql_fetch_array($sql);

            return ($Row['id']);
        }
    }
}

function getbankname($gname) {

    $jazz = mysql_query('select * from addbank where primarykey="' . ($gname) . '"');
    $result = mysql_fetch_array($jazz);
    return base64_decode($result['bankname']);
}

function creditorname($gname) {

    $jazz = mysql_query('select * from addcreditor where id="' . ($gname) . '"');
    $result = mysql_fetch_array($jazz);
    return base64_decode($result['dname']);
}

function debtorname($gname) {

    $jazz = mysql_query('select * from addebtor where id="' . ($gname) . '"');
    $result = mysql_fetch_array($jazz);
    return base64_decode($result['dname']);
}

function getcollateral($gname) {

    $jazz = mysql_query('select * from collateral where id="' . ($gname) . '"');
    $result = mysql_fetch_array($jazz);
    return base64_decode($result['name']);
}

function debtorupdate($user, $id, $dname, $address, $dcont, $demail, $kra, $terms, $creditstatus, $status) {

// update data in mysql database
    $sql = "UPDATE addebtor SET dname='" . base64_encode($dname) . "', address='" . base64_encode($address) . "', dcont='" . base64_encode($dcont) . "', demail='" . base64_encode($demail) . "', kra='" . base64_encode($kra) . "', terms='" . base64_encode($terms) . "', creditstatus='" . base64_encode($creditstatus) . "', status='" . base64_encode($status) . "', audituser='" . base64_encode($user) . "', auditdate='" . base64_encode(date('d-M-Y')) . "' WHERE id='" . $id . "'";

    $result = mysql_query($sql);
    mysql_query($result);
// if successfully updated.
    if ($result) {
        $users = new Users();
        $activity = "updated debtor details for " . $dname;
        $users->audittrail($user, $activity, $user);
        $alertyes = '<script type="text/javascript">alert("Editing was Successful!");</script>';
        $alertfail = '<script type="text/javascript">alert("Editing Failed!!");</script>';
        echo $alertyes;
        echo '<form action="addebtors.php"><div class="two"><button class="btn green">Go Back to Debtors.</button></div></form>';
    } else {
        echo $alertfail;
    }
}

function creditorupdate($user, $id, $dname, $address, $dcont, $demail, $kra, $terms, $status) {

// update data in mysql database
    $sql = "UPDATE addcreditor SET dname='" . base64_encode($dname) . "', address='" . base64_encode($address) . "', dcont='" . base64_encode($dcont) . "', demail='" . base64_encode($demail) . "', kra='" . base64_encode($kra) . "', terms='" . base64_encode($terms) . "', status='" . base64_encode($status) . "', audituser='" . base64_encode($user) . "', auditdate='" . base64_encode(date('d-M-Y')) . "' WHERE id='" . $id . "'";

    $result = mysql_query($sql);
    mysql_query($result);
// if successfully updated.
    if ($result) {
        $users = new Users();
        $activity = "updated creditor details for " . $dname;
        $users->audittrail($user, $activity, $user);
        $alertyes = '<script type="text/javascript">alert("Editing was Successful!");</script>';
        $alertfail = '<script type="text/javascript">alert("Editing Failed!!");</script>';
        echo $alertyes;
        echo '<form action="addcreditors.php"><div class="two"><button class="btn green">Go Back to Creditors.</button></div></form>';
    } else {
        echo $alertfail;
    }
}

function issinvoiceupdate($user, $id, $dname, $date, $glacc, $amt, $invno, $duedate, $desc, $status) {
    $date1 = date("d-M-Y", strtotime($date));
    $date2 = date("d-M-Y", strtotime($duedate));
// update data in mysql database
    $sql = "UPDATE issueinvoice SET debtorid='" . base64_encode($dname) . "', invdate='" . base64_encode($date1) . "', glacc='" . base64_encode($glacc) . "', amount='" . base64_encode($amt) . "', invno='" . base64_encode($invno) . "', duedate='" . base64_encode($date2) . "', description='" . base64_encode($desc) . "', status='" . base64_encode($status) . "', audituser='" . base64_encode($user) . "', auditdate='" . base64_encode(date('d-M-Y')) . "' WHERE id='" . $id . "'";

    $result = mysql_query($sql);
    mysql_query($result);
// if successfully updated.
    if ($result) {
        $users = new Users();
        $activity = "updated issued invoice details for invoice number" . $invno;
        $users->audittrail($user, $activity, $user);
        $alertyes = '<script type="text/javascript">alert("Editing was Successful!");</script>';
        $alertfail = '<script type="text/javascript">alert("Editing Failed!!");</script>';
        echo $alertyes;
        echo '<form action="issueinvoice.php"><div class="two"><button class="btn green">Go Back to Issued Invoices.</button></div></form>';
    } else {
        echo $alertfail;
    }
}

function recinvoiceupdate($user, $id, $cname, $date, $glacc, $amt, $invno, $duedate, $desc, $status) {
    $date1 = date("d-M-Y", strtotime($date));
    $date2 = date("d-M-Y", strtotime($duedate));
// update data in mysql database
    $sql = "UPDATE receiveinvoice SET creditorid='" . base64_encode($cname) . "', invdate='" . base64_encode($date1) . "', glacc='" . base64_encode($glacc) . "', amount='" . base64_encode($amt) . "', invno='" . base64_encode($invno) . "', duedate='" . base64_encode($date2) . "', description='" . base64_encode($desc) . "', status='" . base64_encode($status) . "', audituser='" . base64_encode($user) . "', auditdate='" . base64_encode(date('d-M-Y')) . "' WHERE id='" . $id . "'";

    $result = mysql_query($sql);
    mysql_query($result);
// if successfully updated.
    if ($result) {
        $users = new Users();
        $activity = "updated received invoice details for invoice number" . $invno;
        $users->audittrail($user, $activity, $user);
        $alertyes = '<script type="text/javascript">alert("Editing was Successful!");</script>';
        $alertfail = '<script type="text/javascript">alert("Editing Failed!!");</script>';
        echo $alertyes;
        echo '<form action="receiveinvoice.php"><div class="two"><button class="btn green">Go Back to Received Invoices.</button></div></form>';
    } else {
        echo $alertfail;
    }
}

function expupdate($user, $id, $payee, $pid, $apby, $dates, $reason, $tname, $ptype, $cheque, $amount, $comments, $tid, $session, $idd) {
    $date = date("d-M-Y", strtotime($dates));
// update data in mysql database
    $sql = "UPDATE paymentout SET transname='" . base64_encode($tname) . "', transid='" . base64_encode($tid) . "', amount='" . base64_encode($amount) . "', paymentype='" . base64_encode($ptype) . "', chequeno='" . base64_encode($cheque) . "', approvedby='" . base64_encode($apby) . "', receiver='" . base64_encode($payee) . "', receiverid='" . base64_encode($pid) . "', reasons='" . base64_encode($reason) . "', comments='" . base64_encode($comments) . "', date='" . base64_encode($date) . "',bnkid='" . base64_encode($idd) . "', session='" . ($session) . "' WHERE primarykey='" . $id . "'";
    $sth = mysql_query("UPDATE  banking SET	audituser='" . base64_encode($user) . "' , 	bankname='" . base64_encode(getbankname($idd)) . "' , 	branch='" . base64_encode(getbankbranch($idd)) . "' , 	accno='" . base64_encode(getbankaccount($idd)) . "'  , 	amount='" . base64_encode($amount) . "', mode='" . base64_encode($ptype) . "',	transid='" . base64_encode($tname) . "',	date='" . base64_encode($date) . "', '" . base64_encode("Not Reconciled") . "'    WHERE  amount='" . base64_encode($amount) . "'   AND   date='" . base64_encode($date) . "'    ");
    $result = mysql_query($sql);
    mysql_query($result);

    // if successfully updated.
    if ($result) {

        $users = new Users();
        $activity = "updated expenses account " . $id;
        $users->audittrail($user, $activity, $user);
        $alertyes = '<script type="text/javascript">alert("Editing was Successful!");</script>';
        $alertfail = '<script type="text/javascript">alert("Editing Failed!!");</script>';
        echo $alertyes;
    } else {
        echo $alertfail;
    }
}

function pettyexpupdate($user, $id, $payee, $pid, $apby, $dates, $reason, $tname, $ptype, $cheque, $amount, $comments, $tid, $session, $idd) {

//$one = 3.65;
//$amount = $amt / $one;

    $date = date("d-M-Y", strtotime($dates));
// update data in mysql database
    $sql = "UPDATE paymentout SET transname='" . base64_encode($tname) . "', transid='" . base64_encode($tid) . "', amount='" . base64_encode($amount) . "', paymentype='" . base64_encode($ptype) . "', chequeno='" . base64_encode($cheque) . "', approvedby='" . base64_encode($apby) . "', receiver='" . base64_encode($payee) . "', receiverid='" . base64_encode($pid) . "', reasons='" . base64_encode($reason) . "', comments='" . base64_encode($comments) . "', date='" . base64_encode($date) . "','" . base64_encode($idd) . "', session='" . ($session) . "' WHERE primarykey='" . $id . "'";
    $sth = mysql_query("UPDATE  banking SET	audituser='" . base64_encode($user) . "' , 	bankname='" . base64_encode(getbankname($idd)) . "' , 	branch='" . base64_encode(getbankbranch($idd)) . "' , 	accno='" . base64_encode(getbankaccount($idd)) . "'  , 	amount='" . base64_encode($amount) . "', mode='" . base64_encode($ptype) . "',	transid='" . base64_encode($tname) . "',	date='" . base64_encode($date) . "'  ,'" . base64_encode("Not Reconciled") . "'    WHERE  amount='" . base64_encode($amount) . "'   AND   date='" . base64_encode($date) . "'    ");
    $result = mysql_query($sql);
    mysql_query($result);

// if successfully updated.
    if (($result) || ( $sth)) {

        $users = new Users();
        $activity = "updated expenses account " . $id;
        $users->audittrail($user, $activity, $user);
        $alertyes = '<script type="text/javascript">alert("Editing was Successful!");</script>';
        $alertfail = '<script type="text/javascript">alert("Editing Failed!!");</script>';
        echo $alertyes;
    } else {
        echo $alertfail;
    }
}

function contiupdate($user, $id, $mno, $payeeid, $payee, $datefrom, $bankid, $dateto, $ptype, $amount, $dates, $session) {
    $date = date("d-M-Y", strtotime($dates));

// update data in mysql database
    $sql = "UPDATE membercontribution SET paymenttype='" . base64_encode($ptype) . "', payee='" . base64_encode($payee) . "', payeeid='" . base64_encode($payeeid) . "' ,  amount='" . base64_encode($amount) . "' , datefrom='" . base64_encode($datefrom) . "', dateto='" . base64_encode($dateto) . "' , date='" . base64_encode($date) . "', session='" . ($session) . "',bnkid='" . base64_encode($bankid) . "' WHERE primarykey='" . $id . "'";
    $sth = mysql_query("UPDATE  banking SET	audituser='" . base64_encode($user) . "' , 	bankname='" . base64_encode(getbankname($bankid)) . "' , branch='" . base64_encode(getbankbranch($bankid)) . "' , 	accno='" . base64_encode(getbankaccount($bankid)) . "'  , 	amount='" . base64_encode($amount) . "', mode='" . base64_encode($ptype) . "',	date='" . base64_encode($date) . "','" . base64_encode("Not Reconciled") . "'    WHERE  amount='" . base64_encode($amount) . "'   AND   date='" . base64_encode($date) . "'    ");
    $result = mysql_query($sql);
    mysql_query($result);

// if successfully updated.
    if (($result) || ( $sth)) {
        //$from=  earlieramt($id,$mno);
        $users = new Users();
        $activity = 'updated member ' . getMembername(base64_encode($mno)) . ' contributions to ' . $amount;
        $users->audittrail($user, $activity, $mno);
        $alertyes = '<script type="text/javascript">alert("Editing was Successful!");
                document.location.href = "contributionedit.php";</script>';
        $alertfail = '<script type="text/javascript">alert("Editing Failed!!");
                </script>';
        echo $alertyes;
    } else {
        echo $alertfail;
    }
}

function incomeupdate($user, $id, $payee, $pid, $apby, $comments, $tname, $ptype, $amount, $dates, $tid, $session, $bankname) {
    $date = date("d-M-Y", strtotime($dates));
// update data in mysql database
    $sql = "UPDATE paymentin SET transname='" . base64_encode($tname) . "',bnkid='" . base64_encode($bankname) . "', transid='" . base64_encode($tid) . "', amount='" . base64_encode($amount) . "', paymentype='" . base64_encode($ptype) . "' , approvedby='" . base64_encode($apby) . "', paidby='" . base64_encode($payee) . "', payeeid='" . base64_encode($pid) . "' , comments='" . base64_encode($comments) . "', date='" . base64_encode($date) . "', session='" . ($session) . "' WHERE primarykey='" . $id . "'";

    $result = mysql_query($sql);

    mysql_query($result);

// if successfully updated.
    if ($result) {

        $users = new Users();
        $activity = "updated income account " . $id;
        $users->audittrail($user, $activity, $user);

        $alertyes = '<script type="text/javascript">alert("Editing was Successful!");
                document.location.href = "incomeedit.php";</script>';

        echo $alertyes;
    } else {
        $alertfail = '<script type="text/javascript">alert("Editing Failed!!");document.location.href = "incomeedit.php";</script>';
        echo $alertfail;
    }
}

function sharesupdate($user, $id, $balbf, $loanbf, $comments, $date) {

// update data in mysql database
    $sql = "UPDATE sharesbf SET sharesbf='" . base64_encode($balbf) . "', loanbf='" . base64_encode($loanbf) . "', status='" . base64_encode(active) . "' , 	date='" . base64_encode($date) . "', comments='" . base64_encode($comments) . "' WHERE id='" . $id . "'";

    $result = mysql_query($sql);
    mysql_query($result);
// if successfully updated.
    if ($result) {
        $users = new Users();
        $activity = "updated shares b/f account " . $id;
        $users->audittrail($user, $activity, $user);
        $alertyes = '<script type="text/javascript">alert("Editing was Successful!");</script>';
        $alertfail = '<script type="text/javascript">alert("Editing Failed!!");</script>';
        echo $alertyes;
    } else {
        echo $alertfail;
    }
}

function logo() {

    $Rows = mysql_query('SELECT * FROM saccodetails');

    $Row = mysql_fetch_array($Rows);

    return base64_decode($Row['logo']);
}

function compname() {

    $Rows = mysql_query('SELECT * FROM saccodetails');

    $Row = mysql_fetch_array($Rows);

    return base64_decode($Row['compname']);
}

function getusername($id) {

    $Rows = mysql_query('SELECT * FROM users where id="' . $id . '"');

    $Row = mysql_fetch_array($Rows);

    return base64_decode($Row['fname']) . '   ' . base64_decode($Row['mname']) . '   ' . base64_decode($Row['lname']);
}

function slogan() {
    $Rows = mysql_query('SELECT * FROM saccodetails');

    $Row = mysql_fetch_array($Rows);

    return base64_decode($Row['slogan']);
}

function mobile() {
    $Rows = mysql_query('SELECT * FROM saccodetails');

    $Row = mysql_fetch_array($Rows);

    return base64_decode($Row['mobileno']);
}

function address() {
    $Rows = mysql_query('SELECT * FROM saccodetails');

    $Row = mysql_fetch_array($Rows);

    return 'P.O.BOX ' . base64_decode($Row['postaladdress']);
}

function email() {
    $Rows = mysql_query('SELECT * FROM saccodetails');

    $Row = mysql_fetch_array($Rows);

    return 'Email: ' . base64_decode($Row['emailaddress']);
}

function loanname($tid) {
    $qry = mysql_query('select * from loanapplication where transactionid="' . ($tid) . '"') or die(mysql_error());
    $rslt = mysql_fetch_array($qry);
    return getloaname(base64_decode($rslt['loantype']));
}

function getloanRate($loanname) {
    $qry = mysql_query('select * from loansettings WHERE lname="' . (base64_encode($loanname)) . '"') or die(mysql_error());
    $rslt = mysql_fetch_array($qry);
    return (base64_decode($rslt['rate']));
}

function getcheque($mno, $tid) {
    $qry = mysql_query('select * from loanapplication where membernumber="' . ($mno) . '" and transactionid="' . ($tid) . '"') or die(mysql_error());
    $rslt = mysql_fetch_array($qry);
    return (base64_decode($rslt['accno']));
}

function loantype($tid) {
    $qry = mysql_query('select * from loanapplication where transactionid="' . base64_encode($tid) . '"') or die(mysql_error());
    $rslt = mysql_fetch_array($qry);
    return (base64_decode($rslt['loantype']));
}

function loantyper($tid) {
    $qry = mysql_query('select * from loanapplication where transactionid="' . base64_encode($tid) . '"') or die(mysql_error());
    $rslt = mysql_fetch_array($qry);
    return loanratetype(base64_decode($rslt['loantype']));
}

function loanratetype($id) {
    $qry = mysql_query('select * from loansettings where id="' . ($id) . '"') or die(mysql_error());
    $rslt = mysql_fetch_array($qry);
    return (base64_decode($rslt['ratetype']));
}

function loanrates($tid) {
    $qry = mysql_query('select * from loanapplication where transactionid="' . ($tid) . '"') or die(mysql_error());
    $rslt = mysql_fetch_array($qry);
    return loanrate(base64_decode($rslt['loantype']));
}

function loanrate($id) {
    $qry = mysql_query('select * from loansettings where id="' . $id . '"') or die(mysql_error());
    $rslt = mysql_fetch_array($qry);
    return base64_decode($rslt['rate']);
}

function loanfinerate($id) {
    $qry = mysql_query('select * from loansettings where id="' . $id . '"') or die(mysql_error());
    $rslt = mysql_fetch_array($qry);
    return base64_decode($rslt['fines']);
}

function mrate($tid) {
    $qry = mysql_query('select * from loanintrests where membernumber="' . $_SESSION['lrmno'] . '" and transid="' . $tid . '"') or die(mysql_error());
    $rslt = mysql_fetch_array($qry);
    return base64_decode($rslt['interest']);
}

function minacbal() {
    $iqry = mysql_query('select * from acset') or die(mysql_error());
    $irslt = mysql_fetch_array($iqry);
    return base64_decode($irslt['minimumacbl']);
}

function benev() {

    $iqry = mysql_query('select * from acset') or die(mysql_error());
    $irslt = mysql_fetch_array($iqry);
    return base64_decode($irslt['benevolent']);
}

function minloan() {
    $iqry = mysql_query('select * from acset') or die(mysql_error());
    $irslt = mysql_fetch_array($iqry);
    return base64_decode($irslt['minimumloan']);
}

function servedby($user) {
    $qry = mysql_query('select * from users where id="' . $user . '" and status="' . base64_encode("Active") . '"') or die(mysql_error());
    $rslt = mysql_fetch_array($qry);
    return base64_decode($rslt['fname']) . ' ' . base64_decode($rslt['mname']) . ' ' . base64_decode($rslt['lname']);
}

function SendSMS($host, $port, $username, $password, $phoneNoRecip, $msgText) {
    /* Parameters:
      $host � IP address or host name of the NowSMS server
      $port � "Port number for the web interface" of the NowSMS Server
      $username � <span class="notranslate">"SMS Users"</span> account on the NowSMS server
      $password � Password defined for the <span class="notranslate">"SMS Users"</span> account on the NowSMS Server
      $phoneNoRecip � One or more phone numbers (comma delimited) to receive the text message
      $msgText � Text of the message
     */
    $fp = fsockopen($host, $port, $errno, $errstr);
    if (!$fp) {
        echo "errno: $errno \n";
        echo "errstr: $errstr\n";
        //return $result;
    }

    fwrite($fp, "GET /?Phone=" . rawurlencode($phoneNoRecip) . "&Text=" . rawurlencode($msgText) . " HTTP/1.0\n");
    if ($username != "") {
        $auth = $username . ":" . $password;
        $auth = base64_encode($auth);
        fwrite($fp, "Authorization: Basic " . $auth . "\n");
    }
    fwrite($fp, "\n");

    $res = "";

    while (!feof($fp)) {
        $res .= fread($fp, 1);
    }
    fclose($fp);


    return $res;
}

/* if (isset($_REQUEST['phone'])) {
  if (isset($_REQUEST['text'])) {
  $x = SendSMS("127.0.0.1","8800","gyegyee","letmein",$_REQUEST['phone'], $_REQUEST['text']);
  echo $x;
  }
  else {
  echo "ERROR : Message not sent � Text parameter is missing!\r\n";
  }
  }
  else {
  echo "ERROR : Message not sent � Phone parameter is missing!\r\n";
  } */

function phonenumber($mno) {
    $qry = mysql_query('select * from newmember where membernumber="' . base64_encode($mno) . '" and status="' . base64_encode("active") . '"') or die(mysql_error());
    $rslt = mysql_fetch_array($qry);
    //$number = substr_replace(base64_decode($rslt['mobileno']), 254, 0, 1);
    return base64_decode($rslt['mobileno']);
}

function membersexport($user, $to) {
    if ($to == "word") {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=All Members.doc");
        viewmembers();
        $users = new Users();
        $activity = "Exported members list to " . $to;
        $users->audittrail($user, $activity);
    }
    if ($to == "excel") {
        $filename = "All Members " . date('Y-m-d') . ".xls";
        header("Content-Disposition: attachment; filename=\"$filename\"");
        header("Content-Type: application/vnd.ms-excel");

        viewmembers();
        $users = new Users();
        $activity = "Exported members list to " . $to;
        $users->audittrail($user, $activity);
    }
    if ($to == "pdf") {
//include_once './tcp/examples/example_003.php';
//$txt.=viewmembers();
//header('location:./tcp/examples/example_006.php');
        $users = new Users();
        $activity = "Exported members list to " . $to;
        $users->audittrail($user, $activity);
    }
}

function activemembersexport($user, $to) {
    if ($to == "wordactivemem") {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=Active Members.doc");
        viewactivemembers();
        $users = new Users();
        $activity = "Exported members list to " . $to;
        $users->audittrail($user, $activity);
    }
    if ($to == "excelactivemem") {
        $filename = "Active Members " . date('Y-m-d') . ".xls";
        header("Content-Disposition: attachment; filename=\"$filename\"");
        header("Content-Type: application/vnd.ms-excel");

        viewactivemembers();
        $users = new Users();
        $activity = "Exported members list to " . $to;
        $users->audittrail($user, $activity);
    }
    if ($to == "pdf") {
//include_once './tcp/examples/example_003.php';
//$txt.=viewmembers();
//header('location:./tcp/examples/example_006.php');
        $users = new Users();
        $activity = "Exported members list to " . $to;
        $users->audittrail($user, $activity);
    }
}

function inactivemembersexport($user, $to) {
    if ($to == "word") {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=Inactive Members.doc");
        viewinactivemembers();
        $users = new Users();
        $activity = "Exported members list to " . $to;
        $users->audittrail($user, $activity);
    }
    if ($to == "excel") {
        $filename = "Inactive Members " . date('Y-m-d') . ".xls";
        header("Content-Disposition: attachment; filename=\"$filename\"");
        header("Content-Type: application/vnd.ms-excel");

        viewinactivemembers();
        $users = new Users();
        $activity = "Exported members list to " . $to;
        $users->audittrail($user, $activity);
    }
    if ($to == "pdf") {
//include_once './tcp/examples/example_003.php';
//$txt.=viewmembers();
//header('location:./tcp/examples/example_006.php');
        $users = new Users();
        $activity = "Exported members list to " . $to;
        $users->audittrail($user, $activity);
    }
}

function sumstmtexport($user, $to) {
    if ($to == "word") {
        header("Content-type: application/x-ms-download");
        header("Content-Disposition: attachment;Filename=Summarized Account statement.doc");
        minisummary($_SESSION['users'], $_REQUEST['mno'], $_REQUEST['datefrom'], $_REQUEST['dateto']);
    }
    if ($to == "excel") {
        $filename = "Summarized Account statement " . date('Y-m-d') . ".xls";
        header("Content-Disposition: attachment; filename=\"$filename\"");
        header("Content-Type: application/vnd.ms-excel");

        viewinactivemembers();
    }
    if ($to == "pdf") {
//include_once './tcp/examples/example_003.php';
//$txt.=viewmembers();
//header('location:./tcp/examples/example_006.php');
        $users = new Users();
        $activity = "Exported members list to " . $to;
        $users->audittrail($user, $activity);
    }
}

function stmtexport($user, $to) {
    if ($to == "word") {
        header("Content-type: application/x-ms-download");
        header("Content-Disposition: attachment;Filename=Account statement.doc");
        ministatementa($user, $mno, '', $datefrom, $dateto);
        $users = new Users();
        $activity = "Exported statements to " . $to;
        $users->audittrail($user, $activity);
    }
    if ($to == "excel") {
        $filename = "Inactive Members " . date('Y-m-d') . ".xls";
        header("Content-Disposition: attachment; filename=\"$filename\"");
        header("Content-Type: application/vnd.ms-excel");

        viewinactivemembers();
        $users = new Users();
        $activity = "Exported statements to " . $to;
        $users->audittrail($user, $activity);
    }
    if ($to == "pdf") {
//include_once './tcp/examples/example_003.php';
//$txt.=viewmembers();
//header('location:./tcp/examples/example_006.php');
        $users = new Users();
        $activity = "Exported members list to " . $to;
        $users->audittrail($user, $activity);
    }
}

function withdrawnmembersexport($user, $to) {
    if ($to == "word") {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=Withdrawn Members.doc");
        viewwithdrawnmember();
        $users = new Users();
        $activity = "Exported members list to " . $to;
        $users->audittrail($user, $activity);
    }
    if ($to == "excel") {
        $filename = "Withdrawn Members " . date('Y-m-d') . ".xls";
        header("Content-Disposition: attachment; filename=\"$filename\"");
        header("Content-Type: application/vnd.ms-excel");

        viewwithdrawnmember();
        $users = new Users();
        $activity = "Exported members list to " . $to;
        $users->audittrail($user, $activity);
    }
    if ($to == "pdf") {
//include_once './tcp/examples/example_003.php';
//$txt.=viewmembers();
//header('location:./tcp/examples/example_006.php');
        $users = new Users();
        $activity = "Exported members list to " . $to;
        $users->audittrail($user, $activity);
    }
}

function accountexport($user, $to) {
    if ($to == "word") {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=All Members Accounts.doc");
        viewinaccounts();
        $users = new Users();
        $activity = "Exported members list to " . $to;
        $users->audittrail($user, $activity);
    }
    if ($to == "excel") {
        $filename = "All Members Accounts " . date('Y-m-d') . ".xls";
        header("Content-Disposition: attachment; filename=\"$filename\"");
        header("Content-Type: application/vnd.ms-excel");

        viewinaccounts();
        $users = new Users();
        $activity = "Exported members list to " . $to;
        $users->audittrail($user, $activity);
    }
    if ($to == "pdf") {
//include_once './tcp/examples/example_003.php';
//$txt.=viewmembers();
//header('location:./tcp/examples/example_006.php');
        $users = new Users();
        $activity = "Exported members list to " . $to;
        $users->audittrail($user, $activity);
    }
}

function incomexport($user, $to) {
    if ($to == "word") {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=Income.doc");
        viewincome();
        $users = new Users();
        $activity = "Exported members list to " . $to;
        $users->audittrail($user, $activity);
    }
    if ($to == "excel") {
        $filename = "Income " . date('Y-m-d') . ".xls";
        header("Content-Disposition: attachment; filename=\"$filename\"");
        header("Content-Type: application/vnd.ms-excel");

        viewincome();
        $users = new Users();
        $activity = "Exported members list to " . $to;
        $users->audittrail($user, $activity);
    }
    if ($to == "pdf") {
//include_once './tcp/examples/example_003.php';
//$txt.=viewmembers();
//header('location:./tcp/examples/example_006.php');
        $users = new Users();
        $activity = "Exported members list to " . $to;
        $users->audittrail($user, $activity);
    }
}

function feedxport($user, $to) {
    if ($to == "word") {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=document_name.doc");
        viewfeedback();
        $users = new Users();
        $activity = "Exported feed back details to " . $to;
        $users->audittrail($user, $activity);
    }
    if ($to == "excel") {
        header("Content-type: application/vnd.ms-excel");
        header("Content-Disposition: attachment;Filename=document_name.xls");
        viewfeedback();
        $users = new Users();
        $activity = "Exported feed back details to " . $to;
        $users->audittrail($user, $activity);
    }
    if ($to == "pdf") {
//include_once './tcp/examples/example_003.php';
//$txt.=viewmembers();
//header('location:./tcp/examples/example_006.php');
        $users = new Users();
        $activity = "Exported feed back details to " . $to;
        $users->audittrail($user, $activity);
    }
}

function sharetotaout($user, $mno, $datefrom, $dateto) {
    $total = sumstatementadju($user, $mno, $datefrom, $dateto) + sumstatementous($user, $mno, $datefrom, $dateto);
    return $total;
}

function usergroupid($gname) {
    $chqry = mysql_query('select * from usergroups where user="' . base64_encode($gname) . '" and status="' . base64_encode("Active") . '"') or die(mysql_error());
    $rslt = mysql_fetch_array($chqry);
    return $rslt['id'];
}

function usergroupname($gid) {
    $chqry = mysql_query('select * from usergroups where id="' . $gid . '" and status="' . base64_encode("Active") . '"') or die(mysql_error());
    $rslt = mysql_fetch_array($chqry);
    return $rslt['user'];
}

function accountsupdate($user, $id, $acname, $actype, $status, $comments) {

// update data in mysql database
    $sql = "UPDATE accounts SET acname='" . base64_encode($acname) . "', actype='" . base64_encode($actype) . "', status='" . base64_encode($status) . "' ,comments='" . base64_encode($comments) . "' WHERE id='" . $id . "'";

    $result = mysql_query($sql);
    mysql_query($result);
// if successfully updated.
    if ($result) {
        $users = new Users();
        $activity = "updated account settings for " . $acname;
        $users->audittrail($user, $activity, $user);
        $alertyes = '<script type="text/javascript">alert("Editing was Successful!");</script>';
        $alertfail = '<script type="text/javascript">alert("Editing Failed!!");</script>';
        echo $alertyes;
    } else {
        echo $alertfail;
    }
}

function glaccountsupdate($user, $id, $accode, $acname, $accgrp, $status) {

// update data in mysql database
    $sql = "UPDATE glaccounts SET accode='" . base64_encode($accode) . "', acname='" . base64_encode($acname) . "', accgroup='" . base64_encode($accgrp) . "', status='" . base64_encode($status) . "' WHERE id='" . $id . "'";

    $result = mysql_query($sql);
    mysql_query($result);
// if successfully updated.
    if ($result) {
        $users = new Users();
        $activity = "updated GL account settings for " . $acname;
        $users->audittrail($user, $activity, $user);
        $alertyes = '<script type="text/javascript">alert("Editing was Successful!");</script>';
        $alertfail = '<script type="text/javascript">alert("Editing Failed!!");</script>';
        echo $alertyes;
    } else {
        echo $alertfail;
    }
}

function assetsupdate($user, $id, $asname, $asvalue, $status, $comments, $acc) {

// update data in mysql database
    $sql = "UPDATE assets SET accountid='" . base64_encode($acc) . "',asname='" . base64_encode($asname) . "', asvalue='" . base64_encode($asvalue) . "', status='" . base64_encode($status) . "' ,comments='" . base64_encode($comments) . "' WHERE id='" . $id . "'";

    $result = mysql_query($sql);
    mysql_query($result);
// if successfully updated.
    if ($result) {
        $users = new Users();
        $activity = "updated asset " . $asname;
        $users->audittrail($user, $activity, $user);
        $alertyes = '<script type="text/javascript">alert("Editing was Successful!");</script>';
        $alertfail = '<script type="text/javascript">alert("Editing Failed!!");</script>';
        echo $alertyes;
    } else {
        echo $alertfail;
    }
}

function liabsupdate($user, $id, $lname, $lamount, $status, $comments, $acc) {

// update data in mysql database
    $sql = "UPDATE liabilities SET accountid='" . base64_encode($acc) . "', lname='" . base64_encode($lname) . "', lamount='" . base64_encode($lamount) . "', status='" . base64_encode($status) . "' ,lcomments='" . base64_encode($comments) . "' WHERE id='" . $id . "'";

    $result = mysql_query($sql);
    mysql_query($result);
// if successfully updated.
    if ($result) {
        $users = new Users();
        $activity = "updated liability " . $lname;
        $users->audittrail($user, $activity, $user);
        $alertyes = '<script type="text/javascript">alert("Editing was Successful!");</script>';
        $alertfail = '<script type="text/javascript">alert("Editing Failed!!");</script>';
        echo $alertyes;
    } else {
        echo $alertfail;
    }
}

function vehicleregedit($m) {
    $chqry = mysql_query('select * from newvehicle where primarykey="' . $m . '"') or die(mysql_error());
    if (mysql_num_rows($chqry) >= 1) {
        $row = mysql_fetch_array($chqry);
        editvehicleregistration("user", $row['primarykey'], $row['memberno'], $row['vehicleregno'], $row['logbookno']
                , $row['evalue'], $row['purchasedate'], $row['vehicletype'], $row['operationroute'], $row['capacity'], $row['comments'], $row['fleet'], $row['nickname']);
    } else {
        $users = new Users();
        $activity = "updated vehicle " . $row['vehicleregno'];
        $users->audittrail($_SESSION['users'], $activity);
        echo '<span class="green" >Editing was Successful</span></br>';
        echo '<span class="red" >Sorry member number did not match..proceed and complete member number</span>';
        include_once './loading.html';
    }
}

function loanamout($tid) {
    $total = 0;
    $qry = mysql_query('select * from guarantors where transactionid="' . $tid . '"') or die(mysql_error());
    while ($row = mysql_fetch_array($qry)) {
        $total+=base64_decode($row['sharesoffered']);
    }
    $total = $total + totalloanint($tid);
    return $total;
}

function amountpaid($tid) {
    $sum = 0;
    $qry = mysql_query('select * from loans where transid="' . $tid . '"') or die(mysql_error());
    while ($row = mysql_fetch_array($qry)) {
        $sum+=base64_decode($row['amount']);
    }

//$amt=$sum + $sum1;
    return $sum;
}

function amountopay($tid) {
    $sum = 0;
    $qry = mysql_query('select * from loans where transid="' . $tid . '"') or die(mysql_error());
    while ($row = mysql_fetch_array($qry)) {
        $sum+=base64_decode($row['monthlypayment']);
    }
    return $sum;
}




function principlepaid($tid) {

    $sum = amountpaid($tid) - addloanamoutpaid($tid);

    return $sum;
}

function principletopay($tid) {

    $sum = amountopay($tid);

    return $sum;
}

function loananmout($tid) {
    $total = 0;
    $qry = mysql_query('select * from loans where transid="' . $tid . '"') or die(mysql_error());
    while ($row = mysql_fetch_array($qry)) {
        $total+=base64_decode($row['amount']);
    }
    $totals = $total + totalloanint($tid);
    return $totals;
}

function loanamt($tid) {
    $total = 0;
    $qry = mysql_query('select * from loans where transid="' . $tid . '"') or die(mysql_error());
    while ($row = mysql_fetch_array($qry)) {
        $total+=base64_decode($row['amount']);
    }
    return $total;
}

function nguarantors($user, $tid, $mno) {
    if (isset($tid)) {
        $gqry = mysql_query('select count(primarykey) from guarantors where transactionid="' . base64_encode($tid) . '" and memberno="' . base64_encode($mno) . '"') or die(mysql_error());
        $grslt = mysql_fetch_array($gqry);
        if ($grslt['count(primarykey)'] == 0) {
            return 0;
        } else {
            return 'Number of Guarantors: <span class="green" >' . $grslt['count(primarykey)'] . '</span></br>';
        }
    } else {
        return '<span class="green" >Apply for a loan first</span></br>';
    }
}

function amountguaranteed($user, $tid, $mno) {
    if (isset($tid)) {
        $qry = mysql_query('select * from guarantors where transactionid="' . base64_encode($tid) . '" and memberno="' . base64_encode($mno) . '"') or die(mysql_error());
        while ($row = mysql_fetch_array($qry)) {
            $a+=base64_decode($row['sharesoffered']);
        }
        return 'Amount offered: <span class="green" >' . getsymbol() . ' ' . number_format($a, 2) . '</span></br>';
    } else {
        return '<span class="green" >Apply for a loan first</span></br>';
    }
}

function targetguaranteed($tid, $amt) {
    if (isset($tid)) {

        return 'Amount Required: <span class="red" >' . getsymbol() . ' ' . number_format($amt, 2) . '</span></br>';
    } else {
        return '<span class="green" >Apply for a loan first</span></br>';
    }
}

function amountremaining($user, $tid, $mno, $amt) {
    if (isset($tid)) {
        $qry = mysql_query('select * from guarantors where transactionid="' . base64_encode($tid) . '" and memberno="' . base64_encode($mno) . '"') or die(mysql_error());
        while ($row = mysql_fetch_array($qry)) {
            $a+=base64_decode($row['sharesoffered']);
        }

        $bal = $amt - $a;
        return 'Amount remaining: <span class="green" >' . getsymbol() . ' ' . number_format($bal, 2) . '</span></br>';
    } else {
        return '<span class="green" >Apply for a loan first</span></br>';
    }
}

function loanfud($user, $tid, $mno) {
    if (isset($tid)) {
        $qry = mysql_query('select * from loanapplication where transactionid="' . base64_encode($tid) . '" and membernumber="' . base64_encode($mno) . '"') or die(mysql_error());
        while ($row = mysql_fetch_array($qry)) {
            $a+=base64_decode($row['sharesoffered']);
        }
        return $a;
    } else {
        return 0;
    }
}

/*
  function loanfu($user, $tid, $mno) {
  if (isset($tid)) {
  $qry = mysql_query('select * from guarantors where transactionid="' . base64_encode($tid) . '" and memberno="' . base64_encode($mno) . '"') or die(mysql_error());
  while ($row = mysql_fetch_array($qry)) {
  $a+=base64_decode($row['sharesoffered']);
  }
  return $a;
  } else {
  return 0;
  }
  }
 */

function nmonths($user, $tid, $mno) {
    if (isset($tid)) {
        $qry = mysql_query('select * from loanapplication where transactionid="' . base64_encode($tid) . '" and membernumber="' . base64_encode($mno) . '"') or die(mysql_errno());
        if (mysql_num_rows($qry) == 0) {
            return 0;
        } else {
            $rslt = mysql_fetch_array($qry);
            return base64_decode($rslt['installments']);
        }
    }
}

function getMembername($mno) {

    if (isset($mno)) {
        $sql = mysql_query('SELECT * FROM newmember WHERE membernumber = "' . $mno . '"') or die(mysql_error());

        if (mysql_num_rows($sql) == 0) {
            return "Member";
        } else {
            $Row = mysql_fetch_array($sql);

            return ucwords(strtolower(base64_decode($Row['firstname']))) . '   ' . ucwords(strtolower(base64_decode($Row['middlename']))) . '   ' . ucwords(strtolower(base64_decode($Row['lastname'])));
        }
    }
}

function incomejournaltotal($user, $datefrom, $dateto) {

    $s = strtotime($datefrom);
//$e=mktime(0,0,0,$em, $ed, $ey);
    $t = strtotime($dateto);
    if ($t < $s) {
        echo '<span class="red" >Sorry Please enter search dates correctly</span></br>';
    } else {
        while ($s <= $t) {
//echo date("d-M-Y", $s).'</br>';
            $expqry = mysql_query('select * from paymentin where paymentype!="' . base64_encode('adjustments') . '" and date="' . base64_encode(date("d-M-Y", $s)) . '"') or die(mysql_error());
            while ($exprslt = mysql_fetch_array($expqry)) {
                $total+=base64_decode($exprslt['amount']);
            }
////
            $s = $s + 86400; //increment date by 86400 seconds(1 day)
        }
    }
    return $total;
}

function expensejournaltotal($user, $datefrom, $dateto) {

    $s = strtotime($datefrom);

    $t = strtotime($dateto);
    if ($t < $s) {
        echo '<span class="red" >Sorry Please enter search dates correctly</span></br>';
    } else {
        while ($s <= $t) {
            $expqry = mysql_query('select * from paymentout where date="' . base64_encode(date("d-M-Y", $s)) . '"') or die(mysql_error());
            while ($exprslt = mysql_fetch_array($expqry)) {
                $total+=base64_decode($exprslt['amount']);
            }

            $s = $s + 86400;
        }
        return $total;
    }
}

function profitandlossnetprofit($user, $datefrom, $dateto) {
    return incomejournaltotal($user, $datefrom, $dateto) - expensejournaltotal($user, $datefrom, $dateto);
}

function total($user, $datefrom, $dateto, $cname) {
//$datefrom = $dfrom . '-' . $mfrom . '-' . $yfrom;
//$dateto = $dto . '-' . $mto . '-' . $yto;
    $expqry = mysql_query('select * from paymentin where paymentype!="' . base64_encode('adjustments') . '" and date between "' . base64_encode($datefrom) . '" and "' . base64_encode($dateto) . '"  and transname="' . $cname . '"') or die(mysql_error());
    while ($exprslt = mysql_fetch_array($expqry)) {
        $total+=base64_decode($exprslt['amount']);
    }
    if ($total == 0) {
        $expqry1 = mysql_query('select * from paymentout where date between "' . base64_encode($datefrom) . '" and "' . base64_encode($dateto) . '"  and transname="' . $cname . '"') or die(mysql_error());
        while ($exprslt1 = mysql_fetch_array($expqry1)) {
            $total+=base64_decode($exprslt1['amount']);
        }
        return $total;
    } else {
        return $total;
    }
}

function acname($user, $datefrom, $dateto) {
    $qry = mysql_query('select * from accounts') or die(mysql_error());
    while ($row = mysql_fetch_array($qry)) {
        echo '<tr><td>' . base64_decode($row['acname']) . '</td><td>' . getsymbol() . ' ' . number_format(total($user, $datefrom, $dateto, $row['acname']), 2) . '</td>';
        if (base64_decode($row['actype']) == "Income" || base64_decode($row['actype']) == "Capital" || base64_decode($row['actype']) == "Liability") {
            echo '<td></td><td><input type="checkbox" name="check[]" checked="checked" disabled="disabled"/></td></tr>';
        } else {
            echo '<td><input type="checkbox" name="check[]" checked="checked" disabled="disabled"/></td><td></td></tr>';
        }
    }
}

function trialtotal($user, $xxo, $xxo1, $cname) {

    $expqry = mysql_query('select * from paymentin where transname="' . $cname . '"') or die(mysql_error());
    while ($exprslt = mysql_fetch_array($expqry)) {
        $total+=base64_decode($exprslt['amount']);
    }

    $expqry1 = mysql_query('select * from paymentout where transname="' . $cname . '"') or die(mysql_error());
    while ($exrslt = mysql_fetch_array($expqry1)) {
        $total+=base64_decode($exrslt['amount']);
    }

    $expqry2 = mysql_query('select * from membercontribution where transaction="' . $cname . '"') or die(mysql_error());
    while ($exr = mysql_fetch_array($expqry2)) {
        $total+=base64_decode($exr['amount']);
    }

    return $total;
}

function trialacname($user, $datefrom, $dateto) {

    $qry = mysql_query('select * from accounts') or die(mysql_error());
    while ($row = mysql_fetch_array($qry)) {
        echo '<tr><td>' . base64_decode($row['acname']) . '</td>';
        if (base64_decode($row['actype']) == "Income" || base64_decode($row['actype']) == "Capital" || base64_decode($row['actype']) == "Liability") {
            echo '<td>' . getsymbol() . ' 0.00</td><td>' . getsymbol() . ' ' . number_format(trialtotal($user, $xxo, $xxo1, $row['acname']), 2) . '</td></tr>';
        } else {
            echo '<td>' . getsymbol() . ' ' . number_format(trialtotal($user, $xxo, $xxo1, $row['acname']), 2) . '</td><td>' . getsymbol() . ' 0.00</td></tr>';
        }
    }
}

function trialtotaldebit($user, $datefrom, $dateto) {
//$datefrom = $dfrom . '-' . $mfrom . '-' . $yfrom;
//$dateto = $dto . '-' . $mto . '-' . $yto;

    $actypeqry = mysql_query('select * from accounts where actype="' . base64_encode('Expense') . '"') or die(mysql_error());
    while ($cname = mysql_fetch_array($actypeqry)) {

        $expqry1 = mysql_query('select * from paymentout where transname="' . $cname['acname'] . '"') or die(mysql_error());
        while ($exrslt = mysql_fetch_array($expqry1)) {
            $total+=base64_decode($exrslt['amount']);
        }
    }

    return $total;
}

function trialtotalcredit($user, $datefrom, $dateto) {

    $actypeqry = mysql_query('select * from accounts where actype="' . base64_encode('Income') . '" or  actype="' . base64_encode('Capital') . '"') or die(mysql_error());
    while ($cname = mysql_fetch_array($actypeqry)) {

        $expqry1 = mysql_query('select * from paymentin where transname="' . $cname['acname'] . '"') or die(mysql_error());
        while ($exrslt = mysql_fetch_array($expqry1)) {
            $total+=base64_decode($exrslt['amount']);
        }

        $expqry2 = mysql_query('select * from membercontribution where transaction="' . $cname['acname'] . '"') or die(mysql_error());
        while ($exrslt = mysql_fetch_array($expqry2)) {
            $total+=base64_decode($exrslt['amount']);
        }
    }

    return $total;
}

function assetssum($user, $datefrom, $dateto) {
    $asqry = mysql_query('select * from assets') or die(mysql_error());
    while ($row = mysql_fetch_array($asqry)) {
        $total+=base64_decode($row['asvalue']);
    }
    return $total;
}

function membersvehiclesum($user, $datefrom, $dateto) {
//$datefrom = $dfrom . '-' . $mfrom . '-' . $yfrom;
//$dateto = $dto . '-' . $mto . '-' . $yto;
    $mqry = mysql_query('select * from newvehicle where date between "' . base64_encode($datefrom) . '" and "' . base64_encode($dateto) . '"') or die(mysql_error());
    while ($mrslt = mysql_fetch_array($mqry)) {
        $total+=base64_decode($mrslt['evalue']);
    }
    return $total;
}

function liabilitysum() {
    $lqry = mysql_query('select * from liabilities') or die(mysql_error());
    while ($lrslt = mysql_fetch_array($lqry)) {
        $total+=base64_decode($lrslt['lamount']);
    }
    return $total;
}

function liabilities() {
    $liqry = mysql_query('select * from liabilities') or die(mysql_error());
    while ($lirslt = mysql_fetch_array($liqry)) {
        echo '<tr><td>' . base64_decode($lirslt['lname']) . '</td><td>' . getsymbol() . ' ' . number_format(base64_decode($lirslt['lamount']), 2) . '</td><td></td><td><input type="checkbox" name="check[]" checked="checked" disabled="disabled"/></td></tr>';
    }
}

function liabilitiesbalance() {
    $liqry = mysql_query('select * from liabilities') or die(mysql_error());
    while ($lirslt = mysql_fetch_array($liqry)) {
        echo '<tr><td>' . base64_decode($lirslt['lname']) . '</td><td>' . getsymbol() . ' ' . number_format(base64_decode($lirslt['lamount']), 2) . '</td><td></td></tr>';
    }
}

function mvehicles($user, $dfrom, $mfrom, $yfrom, $dto, $mto, $yto) {
    echo '<tr><td>Members Vehicles</td><td>' . getsymbol() . ' ' . number_format(membersvehiclesum($user, $dfrom, $mfrom, $yfrom, $dto, $mto, $yto), 2) . '</td><td></td><td><input type="checkbox" name="check[]" checked="checked" disabled="disabled"/></td></tr>';
}

function saccoassets() {
    $asqry = mysql_query('select * from assets') or die(mysql_error());
    while ($asrslt = mysql_fetch_array($asqry)) {
        echo '<tr><td>' . base64_decode($asrslt['asname']) . '</td><td>' . getsymbol() . ' ' . number_format(base64_decode($asrslt['asvalue']), 2) . '</td><td><input type="checkbox" name="check[]" checked="checked" disabled="disabled"/></td><td></td></tr>';
    }
}

function saccoassetsbalance() {
    $asqry = mysql_query('select * from assets') or die(mysql_error());
    while ($asrslt = mysql_fetch_array($asqry)) {
        echo '<tr><td>' . base64_decode($asrslt['asname']) . '</td><td>' . getsymbol() . ' ' . number_format(base64_decode($asrslt['asvalue']), 2) . '</td><td></td></tr>';
    }
}

function trialmvehicles($user, $dfrom, $mfrom, $yfrom, $dto, $mto, $yto) {
    echo '<tr><td>Members Vehicles</td><td></td><td>' . getsymbol() . '  ' . number_format(membersvehiclesum($user, $dfrom, $mfrom, $yfrom, $dto, $mto, $yto), 2) . '</td></tr>';
}

function trialsaccoassets() {
    $asqry = mysql_query('select * from assets') or die(mysql_error());
    while ($asrslt = mysql_fetch_array($asqry)) {
        echo '<tr><td>' . base64_decode($asrslt['asname']) . '</td><td>' . getsymbol() . ' ' . base64_decode($asrslt['asvalue']) . '</td><td>' . getsymbol() . '.0.00</td></tr>';
    }
}

function trialliabilities() {
    $liqry = mysql_query('select * from liabilities') or die(mysql_error());
    while ($lirslt = mysql_fetch_array($liqry)) {
        echo '<tr><td>' . base64_decode($lirslt['lname']) . '</td><td>' . getsymbol() . ' 0.00</td><td>' . getsymbol() . '  ' . number_format(base64_decode($lirslt['lamount']), 2) . '</td></tr>';
    }
}

function captotal($user, $datefrom, $dateto, $acname) {
//$datefrom = $dfrom . '-' . $mfrom . '-' . $yfrom;
//$dateto = $dto . '-' . $mto . '-' . $yto;
    $expqry = mysql_query('select * from paymentin where paymentype!="' . base64_encode('adjustments') . '" and date between "' . base64_encode($datefrom) . '" and "' . base64_encode($dateto) . '"  and transname="' . $acname . '"') or die(mysql_error());
    while ($exprslt = mysql_fetch_array($expqry)) {
        $total+=base64_decode($exprslt['amount']);
    }
    if ($total == 0) {
        $expqry1 = mysql_query('select * from paymentout where date between "' . base64_encode($datefrom) . '" and "' . base64_encode($dateto) . '"  and transname="' . $acname . '"') or die(mysql_error());
        while ($exprslt1 = mysql_fetch_array($expqry1)) {
            $total+=base64_decode($exprslt1['amount']);
        }
        return $total;
    } else {
        return $total;
    }
}

function capitalbalance($user, $datefrom, $dateto) {

    $acqry = mysql_query('select * from accounts where actype="' . base64_encode("Capital") . '"') or die(mysql_error());
    while ($acrslt = mysql_fetch_array($acqry)) {
        echo '<tr><td>' . base64_decode($acrslt['acname']) . '</td><td>' . getsymbol() . ' ' . number_format(captotal($user, $datefrom, $dateto, $row['acname']), 2) . '</td><td></td></tr>';
    }
}

function capitalbalancesheet($user, $datefrom, $dateto) {
//$datefrom = $dfrom . '-' . $mfrom . '-' . $yfrom;
//$dateto = $dto . '-' . $mto . '-' . $yto;
    $oqry2 = mysql_query('select * from accounts where actype="' . base64_encode("Capital") . '"') or die(mysql_error());
    while ($row2 = mysql_fetch_array($oqry2)) {
        $expqry = mysql_query('select * from paymentin where date between "' . base64_encode($datefrom) . '" and "' . base64_encode($dateto) . '"  and transname="' . $row2['acname'] . '"') or die(mysql_error());
        while ($exprslt = mysql_fetch_array($expqry)) {
            $total+=base64_decode($exprslt['amount']);
        }
    }
    return $total;
}

function emailvalidation($email) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "true";
    }
}

function namevalidation($name) {
    if (!is_numeric($name)) {
        if (mb_strlen($name) > 2) {
            if (!$name == "") {
                return "true";
            }
        }
    }
}

function memberactive($memberno){
    $stat = mysql_query('select status from newmember where membernumber="' . base64_encode($memberno) . '"') or die(mysql_error());
    $status = base64_encode('WITHDRAWN');
    if($status != $stat['status']){
        $tr = 1;
        return $tr;
    }
}

function inputvalidation($input) {
    if (mb_strlen($input) > 5) {
        if (!$input == "") {
            return "true";
        }
    }
}

function floatvalidation($float) {
    if ($float != "") {
        if ($float >= 0) {
            if (filter_var($float, FILTER_VALIDATE_FLOAT)) {

                return "true";
            } elseif ($float >= 0) {
                return "true";
            }
        }
    }
}

function floatvalidat($float, $ltype) {
    if ($float != "") {
        if ($float >= getmin($ltype)) {
            if (filter_var($float, FILTER_VALIDATE_FLOAT)) {

                return "true";
            } elseif ($float > minloan()) {
                return "true";
            }
        }
    }
}

function floatvalidate($float) {
    if ($float != 0) {
        if ($float >= 0) {
            if (filter_var($float, FILTER_VALIDATE_FLOAT)) {

                return "true";
            }
        }
    }
}

function intvalidation($int) {
    if ($int != "") {
        if ($int >= 0) {
            if (filter_var($int, FILTER_VALIDATE_INT)) {
                return "true";
            }
        }
    }
}

function phonevalidation($phone) {
    if ($phone != "") {
        if (mb_strlen($phone) == 10) {
            if (filter_var($phone, FILTER_VALIDATE_FLOAT)) {

                return "true";
            }
        }
    }
}

function addloanamoutpaid($tid) {
    $suml = mysql_query('select * from loanpayment where transid="' . $tid . '"') or die(mysql_error());
    $su = 0;
    while ($sumlrslt = mysql_fetch_array($suml)) {
        $su+=base64_decode($sumlrslt['amount']);
    }
    if ($su == 0) {
        return 0;
    } else {
        return $su;
    }
}

//*****function to to add total loan disbursed**********//
function addloandisbursed($tid) {
    $checkdisamt = mysql_query('select * from loandisbursment where tid="' . $tid . '"') or die(mysql_error());
    $amt = 0;
    while ($sumlrslt = mysql_fetch_array($checkdisamt)) {
        $amt+=base64_decode($sumlrslt['amount']);
    }
    if ($amt == 0) {
        return 0;
    } else {
        return $amt;
    }
}

//****end of function*************************//

function addfulloanamoutpaid($tid) {
    $suml = mysql_query('select * from loanpayment where transid="' . $tid . '"') or die(mysql_error());
    $su = 0;
    while ($sumlrslt = mysql_fetch_array($suml)) {
        $su+=base64_decode($sumlrslt['amount']);
    }

    $suma = mysql_query('select * from paymentin where transid="' . $tid . '" and transname="' . base64_encode('125') . '"') or die(mysql_error());
    $sua = 0;
    while ($sum2 = mysql_fetch_array($suma)) {
        $su+=base64_decode($sum2['amount']);
    }

    if ($su == 0) {
        return 0;
    } else {
        return round($su) + addextrafeepaid($tid);
    }
}

function totalloaninterests($tid) {
    $qry = mysql_query('select * from loanintrests where transid="' . $tid . '"') or die(mysql_error());
    $rslt = mysql_fetch_array($qry);
    return base64_decode($rslt['interest']);
}

function totalloanint($tid) {
    $tot = 0;
    if (loantyper(base64_decode($tid)) == '2') {

        $qry1 = mysql_query('select * from chargedinterest where transid="' . $tid . '"') or die(mysql_error());
        while ($rslt1 = mysql_fetch_array($qry1)) {
            $tot+=(base64_decode($rslt1['amount']));
        }
        return ($tot);
    } else {

        $qry = mysql_query('select * from loanintrests where  status!="' . base64_encode('waived') . '" and transid="' . $tid . '"') or die(mysql_error());
        $rslt = mysql_fetch_array($qry);
        $tot = (base64_decode($rslt['interest']));

        return round($tot);
    }
}

function remailingloan($tid) {
    $rem = totalloantaken($tid) - addloanamoutpaid($tid);
    return $rem;
}

function totalloantaken($tid) {
    $loanqry = mysql_query('select * from loans where membernumber="' . $_SESSION['lrmno'] . '"  and transid="' . $tid . '"') or die(mysql_error());
    $loanrslt = mysql_fetch_array($loanqry);
    $amount = base64_decode($loanrslt['amount']) + totalloanint($tid);
    return $amount;
}

function remainingloan($tid) {
    $rem = totaloantakn($tid) - addloanamoutpaid($tid);
    return $rem;
}

function fullremainingloan($tid) {
    $rem = totaloantakn($tid) - addfulloanamoutpaid($tid);
    return $rem;
}

function totaloantakn($tid) {
    $loanqry = mysql_query('select * from loans where transid="' . $tid . '"') or die(mysql_error());
    while ($loanrslt = mysql_fetch_array($loanqry)) {
        $amount = base64_decode($loanrslt['amount']); //+ totalloanintr($tid);
        return $amount;
    }
}

function totalloanintr($tid) {
    $qry = mysql_query('select * from loanintrests where transid="' . $tid . '"') or die(mysql_error());
    while ($rslt = mysql_fetch_array($qry)) {
        return round(base64_decode($rslt['interest']));
    }
}

function loanrepaymentdetails($tid) {
    $det = mysql_query('select * from loanpayment where transid="' . $tid . '" and mno="' . $_SESSION['lrmno'] . '"') or die(mysql_error());
    while ($row = mysql_fetch_array($det)) {
        echo '<tr><td>' . base64_decode($row['payeeid']) . '</td><td colspan="2">' . base64_decode($row['payee']) . '</td>
            <td>' . getsymbol() . ' ' . number_format(base64_decode($row['amount']), 2) . '</td>
            <td>' . date('d-M-Y', ($row['date'])) . '</td>
            </tr>';
    }
}

function guaralntorsdetails($tid) {
    $mqry = mysql_query('select * from newmember where membernumber="' . $_SESSION['lrmno'] . '"') or die(mysql_error());
    $mrslt = mysql_fetch_array($mqry);
    echo '
        <table  class="table table-striped  table-bordered table-hover sorting_asc_disabled"  id="sample_2">
        <tr><th>Member Number</th><th colspan="2">Member Name</th><th>Phone</th><th></th></tr>
        <tr><td>' . base64_decode($mrslt['membernumber']) . '</td>
            <td colspan="2">' . base64_decode($mrslt['firstname']) . ' ' . base64_decode($mrslt['middlename']) . ' ' . base64_decode($mrslt['lastname']) . '</td>
            <td>' . base64_decode($mrslt['mobileno']) . '</td><td></td></tr>
        ';
    $loanqry = mysql_query('select * from loans where membernumber="' . $_SESSION['lrmno'] . '" and transid="' . $tid . '"') or die(mysql_error());
    $loanrslt = mysql_fetch_array($loanqry);
    echo '
        <tr><th>Loan Amount</th><th>Monthly Pay</th><th>Amount Paid</th><th>Amount Remaining</th><th>Status</th></tr>
        <tr><td>' . getsymbol() . ' ' . number_format(base64_decode($loanrslt['amount']), 2) . '</td>
            <td>' . getsymbol() . ' ' . round(base64_decode($loanrslt['monthlypayment'])) . '.00</td>
                <td>' . getsymbol() . ' ' . number_format(addloanamoutpaid($tid), 2) . '</td>
                <td>' . getsymbol() . ' ' . number_format(principlepaid($tid), 2) . '</td>
                <td>' . base64_decode($loanrslt['status']) . '</td>
                </tr>
        <tr></tr>
        <tr><th colspan="5"><center>Guarantors Details</center></th></tr>
        <tr><th>Guarantor Number</th><th>Name</th><th>Amount Offered</th><th>Comment</th><th>Date</th></tr>';
    $gqry = mysql_query('select * from guarantors where memberno="' . $_SESSION['lrmno'] . '" and transactionid="' . $tid . '"') or die(mysql_error());
    while ($row = mysql_fetch_array($gqry)) {
        echo '<tr>
            <td>' . base64_decode($row['guarantorno']) . '</td>
            <td>' . guarantorname($row['guarantorno']) . '</td>
            <td>' . getsymbol() . ' ' . number_format(base64_decode($row['sharesoffered']), 2) . '</td>
            <td>' . base64_decode($row['comments']) . '</td>
                <td>' . base64_decode($row['date']) . '</td>
                    </tr>';
    }
    echo '</table>';
    echo '<div class="col-md-2"><div class="noprint"><button class="btn green" value="Print this page" onclick="print()">Print</button></div></div>';
}

function guarantorname($gno) {
    $qry = mysql_query('select * from newmember where membernumber="' . $gno . '"') or die(mysql_error());
    while ($row = mysql_fetch_array($qry)) {
        return base64_decode($row['firstname']) . ' ' . base64_decode($row['middlename']) . ' ' . base64_decode($row['lastname']);
    }
}

function loanrepaymentdetail($user, $tid) {

    $mqry = mysql_query('select * from newmember where membernumber="' . $_SESSION['lrmno'] . '"') or die(mysql_error());
    $mrslt = mysql_fetch_array($mqry);
    echo '<div id="mt">
        <table  class="table table-striped  table-bordered table-hover sorting_asc_disabled"  id="sample_2">
        <tr><th colspan="5"> <h3 align="center"><b> Loan Repayment Details  </b></h3> </th></tr>
<tr><th>Member Number</th><th colspan="2">Member Name</th><th>Phone</th><th></th></tr>
        <tr><td>' . base64_decode($mrslt['membernumber']) . '</td>
            <td colspan="2">' . base64_decode($mrslt['firstname']) . ' ' . base64_decode($mrslt['middlename']) . ' ' . base64_decode($mrslt['lastname']) . '</td>
            <td>' . base64_decode($mrslt['mobileno']) . '</td><td></td></tr>
        ';
    $loanqry = mysql_query('select * from loans where membernumber="' . $_SESSION['lrmno'] . '" and transid="' . $tid . '"') or die(mysql_error());
    $loanrslt = mysql_fetch_array($loanqry);

    function mpay($m) {
        if (base64_decode($m) == 0) {
            return 0;
        } else {
            return base64_decode($m);
        }
    }

    echo '
        <tr><th>Loan Amount</th><th>Monthly Pay</th><th>Amount Paid</th><th>Amount Remaining</th><th>Status</th></tr>
        <tr><td>' . getsymbol() . '.' . number_format(base64_decode($loanrslt['amount']), 2) . '</td>
            <td>' . getsymbol() . '.' . round(mpay($loanrslt['monthlypayment'])) . '.00</td>
                <td>' . getsymbol() . '' . number_format(round(addloanamoutpaid($tid)), 2) . '</td>
                <td>' . getsymbol() . '.' . number_format(round(principlepaid($tid)), 2) . '</td>
                <td>' . base64_decode($loanrslt['status']) . '</td>
                </tr>
        <tr></tr>

        <tr><th colspan="5"><center>Payments Details</center></th></tr>
        <tr><th>Receipt Number</th><th colspan="2">Payee Details</th><th>Amount</th><th>Date</th></tr>';
    loanrepaymentdetails($tid);
    echo '</table></div>';
    echo '<div class="col-md-2"><div class="noprint"><button class="btn green" value="Print this page" onClick="return printResults()">Print</button></div></div>';
}


function loanpayupdate($mno, $tid, $tname) {


    
    $acnaqr = mysql_query('select * from loansettings where lname="' . base64_encode(getloaname($tname)) . '" and status="' . base64_encode("Active") . '"') or die(mysql_error());
    
    while ($lrslt = mysql_fetch_array($acnaqr)) {

        /* $sth=mysql_query("SELECT * FROM  loanapplication where membernumber='" . base64_encode($mno) . "' AND loantype='".$lrslt['id']."'  AND status='".  base64_encode('pending')."'  ");
          if(mysql_num_rows($sth >=1 )){ */
        if ($lrslt['ratetype'] == base64_encode('4')) {
            $loqry = mysql_query('select * from loans where membernumber="' . base64_encode($mno) . '" and transid="' . $tid . '"') or die(mysql_error());
        
            if (mysql_num_rows($loqry) >= 1) {

                $loanrslt = mysql_fetch_array($loqry);
                $loanamout = base64_decode($loanrslt['amount']) ;
               echo loanRepaymentPrincipal($tid);
                if (loanRepaymentPrincipal($tid) >= $loanamout) {
                    mysql_query('BEGIN') or die(mysql_error());


                    $updlapp = mysql_query('update loanapplication set status="' . base64_encode("completed") . '" where transactionid="' . $tid . '"') or die(mysql_error());
                    $updgua = mysql_query('update guarantors set status="' . base64_encode("completed") . '" where transactionid="' . $tid . '"') or die(mysql_error());
                    $updloan = mysql_query('update loans set status="' . base64_encode("completed") . '" where transid="' . $tid . '"') or die(mysql_error());
                    $updin = mysql_query('update loanintrests set status="' . base64_encode("completed") . '" where transid="' . $tid . '"') or die(mysql_error());
                    $updgua2 = mysql_query('update loanrepaydates set status="' . base64_encode("completed") . '" where tid="' . $tid . '"') or die(mysql_error());
                    $updin3 = mysql_query('update loandisburse set status="' . base64_encode("completed") . '" where transid="' . $tid . '"') or die(mysql_error());

                    $deleteacc = mysql_query("DELETE FROM memberaccs WHERE glaccid='" . base64_encode(getglid(getloaname($tname))) . "' and mno='" . base64_encode($mno) . "'");

                    if ($updlapp) {
                        mysql_query('COMMIT') or die(mysql_error());

                        $alertyes = '<script type="text/javascript">alert("Loan payment completed!");</script>';

                        echo $alertyes;

                        /* $sms = 'Dear ' . getMembername(base64_encode($mno)) . ', you have finished paying your loan for' . getsymbol() . '' . number_format($loanamout) . ' . Western Shuttle Sacco Ltd. Thank You.';
                          $ms = SendSMS("127.0.0.1", "8800", "esacco", "esacco", ph))number($mno), $sms); */
                    } else {
                        mysql_query('ROLLBACK') or die(mysql_error());
                        $alertfail = '<script type="text/javascript">alert("Sorry Loan status update failed!");</script>';
                        echo $alertfail;
                    }
                } else {

                    /*
                      $alertfail = '<script type="text/javascript">alert("Sorry Loan completion failed!");</script>';
                      echo $alertfail;

                      $sms = 'Dear ' . getMembername(base64_encode($mno)) . ', you have paid ' . getsymbol() . ' ' . number_format(addloanamoutpaid($tid)) . ' Loan balance is ' . getsymbol() . '' . number_format(remailingloan($tid)) . ' . Western Shuttle Sacco Ltd. Thank You.';
                      $ms = SendSMS("127.0.0.1", "8800", "esacco", "esacco", ph))number($mno), $sms);
                     */
                }
            }
            
            
        } else {
            $loqry = mysql_query('select * from loans where membernumber="' . base64_encode($mno) . '" and transid="' . $tid . '"') or die(mysql_error());
        
            if (mysql_num_rows($loqry) >= 1) {

                $loanrslt = mysql_fetch_array($loqry);
                $loanamout = base64_decode($loanrslt['amount']) + totalloanint($tid) + getextrafee($tid);
                if (addfulloanamoutpaid($tid) >= $loanamout) {
                    mysql_query('BEGIN') or die(mysql_error());


                    $updlapp = mysql_query('update loanapplication set status="' . base64_encode("completed") . '" where transactionid="' . $tid . '"') or die(mysql_error());
                    $updgua = mysql_query('update guarantors set status="' . base64_encode("completed") . '" where transactionid="' . $tid . '"') or die(mysql_error());
                    $updloan = mysql_query('update loans set status="' . base64_encode("completed") . '" where transid="' . $tid . '"') or die(mysql_error());
                    $updin = mysql_query('update loanintrests set status="' . base64_encode("completed") . '" where transid="' . $tid . '"') or die(mysql_error());
                    $updgua2 = mysql_query('update loanrepaydates set status="' . base64_encode("completed") . '" where tid="' . $tid . '"') or die(mysql_error());
                    $updin3 = mysql_query('update loandisburse set status="' . base64_encode("completed") . '" where transid="' . $tid . '"') or die(mysql_error());

                    $deleteacc = mysql_query("DELETE FROM memberaccs WHERE glaccid='" . base64_encode(getglid(getloaname($tname))) . "' and mno='" . base64_encode($mno) . "'");

                    if ($updlapp) {
                        mysql_query('COMMIT') or die(mysql_error());

                        $alertyes = '<script type="text/javascript">alert("Loan payment completed!");</script>';

                        echo $alertyes;

                        /* $sms = 'Dear ' . getMembername(base64_encode($mno)) . ', you have finished paying your loan for' . getsymbol() . '' . number_format($loanamout) . ' . Western Shuttle Sacco Ltd. Thank You.';
                          $ms = SendSMS("127.0.0.1", "8800", "esacco", "esacco", ph))number($mno), $sms); */
                    } else {
                        mysql_query('ROLLBACK') or die(mysql_error());
                        $alertfail = '<script type="text/javascript">alert("Sorry Loan status update failed!");</script>';
                        echo $alertfail;
                    }
                } else {

                    /*
                      $alertfail = '<script type="text/javascript">alert("Sorry Loan completion failed!");</script>';
                      echo $alertfail;

                      $sms = 'Dear ' . getMembername(base64_encode($mno)) . ', you have paid ' . getsymbol() . ' ' . number_format(addloanamoutpaid($tid)) . ' Loan balance is ' . getsymbol() . '' . number_format(remailingloan($tid)) . ' . Western Shuttle Sacco Ltd. Thank You.';
                      $ms = SendSMS("127.0.0.1", "8800", "esacco", "esacco", ph))number($mno), $sms);
                     */
                }
            }
        }
    }
}




function loanupdate($mno, $tid, $tname) {


    
    $acnaqr = mysql_query('select * from loansettings where lname="' . base64_encode(getglacc($tname)) . '" and status="' . base64_encode("Active") . '"') or die(mysql_error());
    
    while ($lrslt = mysql_fetch_array($acnaqr)) {

        /* $sth=mysql_query("SELECT * FROM  loanapplication where membernumber='" . base64_encode($mno) . "' AND loantype='".$lrslt['id']."'  AND status='".  base64_encode('pending')."'  ");
          if(mysql_num_rows($sth >=1 )){ */
        if ($lrslt['ratetype'] == base64_encode('4')) {
            $loqry = mysql_query('select * from loans where membernumber="' . base64_encode($mno) . '" and transid="' . $tid . '"') or die(mysql_error());
        
            if (mysql_num_rows($loqry) >= 1) {

                $loanrslt = mysql_fetch_array($loqry);
                $loanamout = base64_decode($loanrslt['amount']) ;
               echo loanRepaymentPrincipal($tid);
                if (loanRepaymentPrincipal($tid) >= $loanamout) {
                    mysql_query('BEGIN') or die(mysql_error());


                    $updlapp = mysql_query('update loanapplication set status="' . base64_encode("completed") . '" where transactionid="' . $tid . '"') or die(mysql_error());
                    $updgua = mysql_query('update guarantors set status="' . base64_encode("completed") . '" where transactionid="' . $tid . '"') or die(mysql_error());
                    $updloan = mysql_query('update loans set status="' . base64_encode("completed") . '" where transid="' . $tid . '"') or die(mysql_error());
                    $updin = mysql_query('update loanintrests set status="' . base64_encode("completed") . '" where transid="' . $tid . '"') or die(mysql_error());
                    $updgua2 = mysql_query('update loanrepaydates set status="' . base64_encode("completed") . '" where tid="' . $tid . '"') or die(mysql_error());
                    $updin3 = mysql_query('update loandisburse set status="' . base64_encode("completed") . '" where transid="' . $tid . '"') or die(mysql_error());

                    $deleteacc = mysql_query("DELETE FROM memberaccs WHERE glaccid='" . base64_encode($tname) . "' and mno='" . base64_encode($mno) . "'");

                    if ($updlapp) {
                        mysql_query('COMMIT') or die(mysql_error());

                        $alertyes = '<script type="text/javascript">alert("Loan payment completed!");</script>';

                        echo $alertyes;

                        /* $sms = 'Dear ' . getMembername(base64_encode($mno)) . ', you have finished paying your loan for' . getsymbol() . '' . number_format($loanamout) . ' . Western Shuttle Sacco Ltd. Thank You.';
                          $ms = SendSMS("127.0.0.1", "8800", "esacco", "esacco", ph))number($mno), $sms); */
                    } else {
                        mysql_query('ROLLBACK') or die(mysql_error());
                        $alertfail = '<script type="text/javascript">alert("Sorry Loan status update failed!");</script>';
                        echo $alertfail;
                    }
                } else {

                    /*
                      $alertfail = '<script type="text/javascript">alert("Sorry Loan completion failed!");</script>';
                      echo $alertfail;

                      $sms = 'Dear ' . getMembername(base64_encode($mno)) . ', you have paid ' . getsymbol() . ' ' . number_format(addloanamoutpaid($tid)) . ' Loan balance is ' . getsymbol() . '' . number_format(remailingloan($tid)) . ' . Western Shuttle Sacco Ltd. Thank You.';
                      $ms = SendSMS("127.0.0.1", "8800", "esacco", "esacco", ph))number($mno), $sms);
                     */
                }
            }
            
            
        } else {
            $loqry = mysql_query('select * from loans where membernumber="' . base64_encode($mno) . '" and transid="' . $tid . '"') or die(mysql_error());
        
            if (mysql_num_rows($loqry) >= 1) {

                $loanrslt = mysql_fetch_array($loqry);
                $loanamout = base64_decode($loanrslt['amount']) + totalloanint($tid) + getextrafee($tid);
                if (addfulloanamoutpaid($tid) >= $loanamout) {
                    mysql_query('BEGIN') or die(mysql_error());


                    $updlapp = mysql_query('update loanapplication set status="' . base64_encode("completed") . '" where transactionid="' . $tid . '"') or die(mysql_error());
                    $updgua = mysql_query('update guarantors set status="' . base64_encode("completed") . '" where transactionid="' . $tid . '"') or die(mysql_error());
                    $updloan = mysql_query('update loans set status="' . base64_encode("completed") . '" where transid="' . $tid . '"') or die(mysql_error());
                    $updin = mysql_query('update loanintrests set status="' . base64_encode("completed") . '" where transid="' . $tid . '"') or die(mysql_error());
                    $updgua2 = mysql_query('update loanrepaydates set status="' . base64_encode("completed") . '" where tid="' . $tid . '"') or die(mysql_error());
                    $updin3 = mysql_query('update loandisburse set status="' . base64_encode("completed") . '" where transid="' . $tid . '"') or die(mysql_error());

                    $deleteacc = mysql_query("DELETE FROM memberaccs WHERE glaccid='" . base64_encode($tname) . "' and mno='" . base64_encode($mno) . "'");

                    if ($updlapp) {
                        mysql_query('COMMIT') or die(mysql_error());

                        $alertyes = '<script type="text/javascript">alert("Loan payment completed!");</script>';

                        echo $alertyes;

                        /* $sms = 'Dear ' . getMembername(base64_encode($mno)) . ', you have finished paying your loan for' . getsymbol() . '' . number_format($loanamout) . ' . Western Shuttle Sacco Ltd. Thank You.';
                          $ms = SendSMS("127.0.0.1", "8800", "esacco", "esacco", ph))number($mno), $sms); */
                    } else {
                        mysql_query('ROLLBACK') or die(mysql_error());
                        $alertfail = '<script type="text/javascript">alert("Sorry Loan status update failed!");</script>';
                        echo $alertfail;
                    }
                } else {

                    /*
                      $alertfail = '<script type="text/javascript">alert("Sorry Loan completion failed!");</script>';
                      echo $alertfail;

                      $sms = 'Dear ' . getMembername(base64_encode($mno)) . ', you have paid ' . getsymbol() . ' ' . number_format(addloanamoutpaid($tid)) . ' Loan balance is ' . getsymbol() . '' . number_format(remailingloan($tid)) . ' . Western Shuttle Sacco Ltd. Thank You.';
                      $ms = SendSMS("127.0.0.1", "8800", "esacco", "esacco", ph))number($mno), $sms);
                     */
                }
            }
        }
    }
}

function loanamortizationreport($user, $rate, $tid) {
    $monthlyqry = mysql_query('select * from loanapplication where transactionid="' . $tid . '"') or die(mysql_error());
    $monthlyrslt = mysql_fetch_array($monthlyqry);
    $years = (base64_decode($monthlyrslt['installments']));
    $lamqry = mysql_query('select * from loans where transid="' . $tid . '"') or die(mysql_error());
    $lamrslt = mysql_fetch_array($lamqry);
    $amount = base64_decode($lamrslt['amount']);
    $_SESSION['ltid'] = base64_decode($tid);
    $am = new amort($amount, $rate, $years); //make an instance of amort and set the numbers
//$am->showForm();                       //show the form to get the numbers
    if ($amount * $rate * $years <> 0) { //if any one is zero, don't show the table
        $am->showTable(true);
// echo '<div class="col-md-2"><button class="btn green"value="Print this page" onClick="return printResults()">Print</button></div></div>';
    }
}

function guranteed($user, $tid) {
    $guqry = mysql_query('select * from guarantors where guarantorno="' . $_SESSION['lrmno'] . '"') or die(mysql_error());
    if (mysql_num_rows($guqry) >= 1) {
        echo '<div id="mt2"><div class="tab-pane active" id="tab_5_2"><table  class="table table-striped  table-bordered table-hover sorting_asc_disabled"  id="sample_2">
     <tr><th colspan="5"><h3 align="center"><b> Guranteed </b></h3></th></tr>   
     <tr><th>Guaranteed</th><th>Amount</th><th>Comment</th><th>Status</th><th>Date</th></tr>';
        if (mysql_num_rows($guqry) >= 1) {
            while ($row = mysql_fetch_array($guqry)) {
                $mqry = mysql_query('select * from newmember where membernumber="' . $row['memberno'] . '"') or die(mysql_error());
                $mrslt = mysql_fetch_array($mqry);
                echo '<tr><td>' . base64_decode($mrslt['firstname']) . ' ' . base64_decode($mrslt['middlename']) . '
            ' . base64_decode($mrslt['lastname']) . '</td>
                <td>' . getsymbol() . ' ' . number_format(base64_decode($row['sharesoffered']), 2) . '</td>
                    <td>' . base64_decode($row['comment']) . '</td>
                        <td>' . base64_decode($row['status']) . '</td>
                            <td>' . base64_decode($row['date']) . '</td></tr>';
            }
        }
    } else {
        echo '<span class="red" >You have not guaranteed anyone</span></br>';
    }
    echo '</table><div>';
}

function vehileexport($user, $to) {
    if ($to == "word") {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=document_name.doc");
        viewvehicles();
    }
    if ($to == "excel") {
        header("Content-type: application/vnd.ms-excel");
        header("Content-Disposition: attachment;Filename=document_name.xls");
        viewvehicles();
    }
    if ($to == "pdf") {
//include_once './tcp/examples/example_003.php';
//$txt.=viewmembers();
//header('location:./tcp/examples/example_006.php');
    }
}

function contriutionexport($user, $to) {
    if ($to == "word") {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=document_name.doc");
        viewcontributions();
    }
    if ($to == "excel") {
        header("Content-type: application/vnd.ms-excel");
        header("Content-Disposition: attachment;Filename=document_name.xls");
        viewcontributions();
    }
    if ($to == "pdf") {
//include_once './tcp/examples/example_003.php';
//$txt.=viewmembers();
//header('location:./tcp/examples/example_006.php');
    }
}

function loanexport($user, $to) {
    if ($to == "word") {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=Loan.doc");
        viewloans();
        $users = new Users();
        $activity = "Exported members list to " . $to;
        $users->audittrail($user, $activity);
    }
    if ($to == "excel") {
        $filename = "Loan " . date('Y-m-d') . ".xls";
        header("Content-Disposition: attachment; filename=\"$filename\"");
        header("Content-Type: application/vnd.ms-excel");

        viewloans();
        $users = new Users();
        $activity = "Exported members list to " . $to;
        $users->audittrail($user, $activity);
    }
    if ($to == "pdf") {
//include_once './tcp/examples/example_003.php';
//$txt.=viewmembers();
//header('location:./tcp/examples/example_006.php');
        $users = new Users();
        $activity = "Exported members list to " . $to;
        $users->audittrail($user, $activity);
    }
}

function expexport($user, $to) {
    if ($to == "word") {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=Expenses.doc");
        viewexpenses($mno);
        $users = new Users();
        $activity = "Exported members list to " . $to;
        $users->audittrail($user, $activity);
    }
    if ($to == "excel") {
        $filename = "Expenses " . date('Y-m-d') . ".xls";
        header("Content-Disposition: attachment; filename=\"$filename\"");
        header("Content-Type: application/vnd.ms-excel");

        viewexpenses($mno);
        $users = new Users();
        $activity = "Exported members list to " . $to;
        $users->audittrail($user, $activity);
    }
    if ($to == "pdf") {
//include_once './tcp/examples/example_003.php';
//$txt.=viewmembers();
//header('location:./tcp/examples/example_006.php');
        $users = new Users();
        $activity = "Exported members list to " . $to;
        $users->audittrail($user, $activity);
    }
}

function inspectxport($user, $to) {
    if ($to == "word") {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=document_name.doc");
        viewinspection();
    }
    if ($to == "excel") {
        header("Content-type: application/vnd.ms-excel");
        header("Content-Disposition: attachment;Filename=document_name.xls");
        viewinspection();
    }
    if ($to == "pdf") {
//include_once './tcp/examples/example_003.php';
//$txt.=viewmembers();
//header('location:./tcp/examples/example_006.php');
    }
}

function loanexpo($user, $to, $tid) {
    if ($to == "word") {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=document_name.doc");
        loanrepaymentdetail($user, $tid);
    }
    if ($to == "excel") {
        header("Content-type: application/vnd.ms-excel");
        header("Content-Disposition: attachment;Filename=document_name.xls");
        loanrepaymentdetail($user, $tid);
    }
    if ($to == "pdf") {
//include_once './tcp/examples/example_003.php';
//$txt.=viewmembers();
//header('location:./tcp/examples/example_006.php');
    }
}

function guraexpo($user, $to, $tid) {
    if ($to == "word") {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=document_name.doc");
        guaralntorsdetails($tid);
    }
    if ($to == "excel") {
        header("Content-type: application/vnd.ms-excel");
        header("Content-Disposition: attachment;Filename=document_name.xls");
        guaralntorsdetails($tid);
    }
    if ($to == "pdf") {
//include_once './tcp/examples/example_003.php';
//$txt.=viewmembers();
//header('location:./tcp/examples/example_006.php');
    }
}

function amortexport($user, $to, $tid) {
    if ($to == "word") {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=document_name.doc");
        loanamortizationreport($user, loanrate($tid), $tid);
    }
    if ($to == "excel") {
        header("Content-type: application/vnd.ms-excel");
        header("Content-Disposition: attachment;Filename=document_name.xls");
        loanamortizationreport($user, loanrate($tid), $tid);
    }
    if ($to == "pdf") {
//include_once './tcp/examples/example_003.php';
//$txt.=viewmembers();
//header('location:./tcp/examples/example_006.php');
    }
}

function dynexxp($datefrom, $dateto, $to) {
    if ($to == "word") {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=document_name.doc");
        dynapetti($user, $acc, $datefrom, $dateto);
    }
    if ($to == "excel") {
        header("Content-type: application/vnd.ms-excel");
        header("Content-Disposition: attachment;Filename=document_name.xls");
        dynapetti($user, $acc, $datefrom, $dateto);
    }
    if ($to == "pdf") {
//include_once './tcp/examples/example_003.php';
//$txt.=viewmembers();
//header('location:./tcp/examples/example_006.php');
    }
}

function guexport($user, $to, $tid) {
    if ($to == "word") {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=document_name.doc");
        guranteed($user, $tid);
    }
    if ($to == "excel") {
        header("Content-type: application/vnd.ms-excel");
        header("Content-Disposition: attachment;Filename=document_name.xls");
        guranteed($user, $tid);
    }
    if ($to == "pdf") {
//include_once './tcp/examples/example_003.php';
//$txt.=viewmembers();
//header('location:./tcp/examples/example_006.php');
    }
}

function divvexpo($user, $to, $mno, $datefrom, $dateto) {
    if ($to == "word") {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=document_name.doc");
        dailystatments($user, $datefrom, $dateto);
    }
    if ($to == "excel") {
        header("Content-type: application/vnd.ms-excel");
        header("Content-Disposition: attachment;Filename=document_name.xls");
        dailystatments($user, $datefrom, $dateto);
    }
    if ($to == "pdf") {
//include_once './tcp/examples/example_003.php';
//$txt.=viewmembers();
//header('location:./tcp/examples/example_006.php');
    }
}

function summportex() {
    if ($to == "word") {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=document_name.doc");
        summport();
    }
    if ($to == "excel") {
        header("Content-type: application/vnd.ms-excel");
        header("Content-Disposition: attachment;Filename=document_name.xls");
        summport();
    }
    if ($to == "pdf") {
//include_once './tcp/examples/example_003.php';
//$txt.=viewmembers();
//header('location:./tcp/examples/example_006.php');
    }
}

function benevexpo($user, $to, $mno, $datefrom, $dateto) {
    if ($to == "word") {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=document_name.doc");
        benevstatements($user, $datefrom, $dateto);
    }
    if ($to == "excel") {
        header("Content-type: application/vnd.ms-excel");
        header("Content-Disposition: attachment;Filename=document_name.xls");
        benevstatements($user, $datefrom, $dateto);
    }
    if ($to == "pdf") {
//include_once './tcp/examples/example_003.php';
//$txt.=viewmembers();
//header('location:./tcp/examples/example_006.php');
    }
}

function accstexpo($user, $to, $mno, $datefrom, $dateto) {

    if ($to == "word") {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=account_statement.doc");
        ministatementa($user, $mno, '', $datefrom, $dateto);
    }
    if ($to == "excel") {
        header("Content-type: application/vnd.ms-excel");
        header("Content-Disposition: attachment;Filename=account_statement.xls");
        ministatementa($user, $mno, '', $datefrom, $dateto);
    }
    if ($to == "pdf") {
//include_once './tcp/examples/example_003.php';
//$txt.=viewmembers();
//header('location:./tcp/examples/example_006.php');
    }
}

function statementgen($user, $to, $mno, $datefrom, $dateto) {
    if ($to == "word") {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=account_statement.doc");
        generalstatemntreport($user, $mno, '', $datefrom, $dateto);
    }
    if ($to == "excel") {
        header("Content-type: application/vnd.ms-excel");
        header("Content-Disposition: attachment;Filename=account_statement.xls");
        generalstatemntreport($user, $mno, '', $datefrom, $dateto);
    }
    if ($to == "pdf") {
//include_once './tcp/examples/example_003.php';
//$txt.=viewmembers();
//header('location:./tcp/examples/example_006.php');
    }
}

function dynaexpo($user, $to, $mno, $datefrom, $dateto) {
    if ($to == "word") {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=document_name.doc");
        accsdyna($user, $mno, $acc, $datefrom, $dateto);
    }
    if ($to == "excel") {
        header("Content-type: application/vnd.ms-excel");
        header("Content-Disposition: attachment;Filename=document_name.xls");
        accsdyna($user, $mno, $acc, $datefrom, $dateto);
    }
    if ($to == "pdf") {
//include_once './tcp/examples/example_003.php';
//$txt.=viewmembers();
//header('location:./tcp/examples/example_006.php');
    }
}

function eccouexpo($user, $to, $mno, $datefrom, $dateto) {
    if ($to == "word") {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=document_name.doc");
        minisummary($user, $mno, $datefrom, $dateto);
    }
    if ($to == "excel") {
        header("Content-type: application/vnd.ms-excel");
        header("Content-Disposition: attachment;Filename=document_name.xls");
        minisummary($user, $mno, $datefrom, $dateto);
    }
    if ($to == "pdf") {
//include_once './tcp/examples/example_003.php';
//$txt.=viewmembers();
//header('location:./tcp/examples/example_006.php');
    }
}

function divirport($user, $to, $yfrom) {
    if ($to == "word") {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=document_name.doc");
        diviport($user, $yfrom);
    }
    /* if ($to == "excel") {
      header("Content-type: application/vnd.ms-excel");
      header("Content-Disposition: attachment;Filename=document_name.xls");
      ministatement($user, $mno, $datefrom, $dateto);
      }
      if ($to == "pdf") {
      //include_once './tcp/examples/example_003.php';
      //$txt.=viewmembers();
      //header('location:./tcp/examples/example_006.php');
      } */
}

function bankingep($user, $to) {
    if ($to == "word") {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=document_name.doc");
        viewbanking();
    }
    if ($to == "excel") {
        header("Content-type: application/vnd.ms-excel");
        header("Content-Disposition: attachment;Filename=document_name.xls");
        viewbanking();
    }
    if ($to == "pdf") {
//include_once './tcp/examples/example_003.php';
//$txt.=viewmembers();
//header('location:./tcp/examples/example_006.php');
    }
}

function balanceexport($user, $bkex) {
    if ($bkex == "word") {
        header("Content-Disposition: attachment;Filename=Balance sheet.doc");
        header("Content-type: application/vnd.ms-word");
//bookcash($_SESSION['users'], $_REQUEST['dfrom'], $_REQUEST['mfrom'], $_REQUEST['yfrom'], $_REQUEST['dto'], $_REQUEST['mto'], $_REQUEST['yto']);

        balancesheetform($_SESSION['users'], $_REQUEST['datefrom'], $_REQUEST['dateto']);
    }
    if ($bkex == "excel") {
        header("Content-type: application/vnd.ms-excel");
        header("Content-Disposition: attachment;Filename=Balance sheet.xls");
        balancesheetform($_SESSION['users'], $_REQUEST['datefrom'], $_REQUEST['dateto']);
    }
    if ($to == "pdf") {
//include_once './tcp/examples/example_003.php';
//$txt.=viewmembers();
//header('location:./tcp/examples/example_006.php');
    }
}

function trialexport($user, $bkex) {
    if ($bkex == "word") {
        header("Content-Disposition: attachment;Filename=Trial balance.doc");
        header("Content-type: application/vnd.ms-word");
//bookcash($_SESSION['users'], $_REQUEST['dfrom'], $_REQUEST['mfrom'], $_REQUEST['yfrom'], $_REQUEST['dto'], $_REQUEST['mto'], $_REQUEST['yto']);

        baltbal($_SESSION['user'], $_REQUEST['datefrom'], $_REQUEST['dateto']);
    }
    if ($bkex == "excel") {
        header("Content-type: application/vnd.ms-excel");
        header("Content-Disposition: attachment;Filename=Trial Balance.xls");
        baltbal($_SESSION['user'], $_REQUEST['datefrom'], $_REQUEST['dateto']);
    }
    if ($to == "pdf") {
//include_once './tcp/examples/example_003.php';
//$txt.=viewmembers();
//header('location:./tcp/examples/example_006.php');
    }
}

function bookcashexp($user, $bkex) {
    if ($bkex == "word") {
        header("Content-Disposition: attachment;Filename=Cash book.doc");
        header("Content-type: application/vnd.ms-word");
//bookcash($_SESSION['users'], $_REQUEST['dfrom'], $_REQUEST['mfrom'], $_REQUEST['yfrom'], $_REQUEST['dto'], $_REQUEST['mto'], $_REQUEST['yto']);

        bookcash($_SESSION['users'], $_POST['datefrom'], $_POST['dateto']);
    }
    if ($bkex == "excel") {
        header("Content-type: application/vnd.ms-excel");
        header("Content-Disposition: attachment;Filename=document_name.xls");
        bookcash($_SESSION['users'], $_REQUEST['datefrom'], $_REQUEST['dateto']);
    }
    if ($to == "pdf") {
//include_once './tcp/examples/example_003.php';
//$txt.=viewmembers();
//header('location:./tcp/examples/example_006.php');
    }
}

function viewwithdr($user, $to) {
    if ($to == "word") {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=document_name.doc");
        withdrawalsview();
    }
    if ($to == "excel") {
        header("Content-type: application/vnd.ms-excel");
        header("Content-Disposition: attachment;Filename=document_name.xls");
        withdrawalsview();
    }
    if ($to == "pdf") {
//include_once './tcp/examples/example_003.php';
//$txt.=viewmembers();
//header('location:./tcp/examples/example_006.php');
    }
}

function aexp($user, $to) {
    if ($to == "word") {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=document_name.doc");
        audtitrail();
    }
    if ($to == "excel") {
        header("Content-type: application/vnd.ms-excel");
        header("Content-Disposition: attachment;Filename=document_name.xls");
        audtitrail();
    }
    if ($to == "pdf") {
//include_once './tcp/examples/example_003.php';
//$txt.=viewmembers();
//header('location:./tcp/examples/example_006.php');
    }
}

function expjour($user, $to, $mno, $dfrom, $mfrom, $yfrom, $dto, $mto, $yto) {
    if ($to == "word") {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=Expenses journal.doc");
        expensejournal($_SESSION['users'], $_SESSION['datefrom'], $_SESSION['dateto']);
    }
    if ($to == "excel") {
        header("Content-type: application/vnd.ms-excel");
        header("Content-Disposition: attachment;Filename=document_name.xls");
        expensejournal($user, $dfrom, $mfrom, $yfrom, $dto, $mto, $yto);
    }
    if ($to == "pdf") {
//include_once './tcp/examples/example_003.php';
//$txt.=viewmembers();
//header('location:./tcp/examples/example_006.php');
    }
}

function injour($user, $to, $mno, $datefrom, $dateto) {
    if ($to == "word") {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=Income journal.doc");
        incomejournal($_SESSION['users'], $_SESSION['datefrom'], $_SESSION['dateto']);
    }
    if ($to == "excel") {
        header("Content-type: application/vnd.ms-excel");
        header("Content-Disposition: attachment;Filename=document_name.xls");
        incomejournal($user, $datefrom, $dateto);
    }
    if ($to == "pdf") {
//include_once './tcp/examples/example_003.php';
//$txt.=viewmembers();
//header('location:./tcp/examples/example_006.php');
    }
}

function pandlexpo($user, $to, $datefrom, $dateto) {
    if ($to == "word") {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=document_name.doc");
        profitlossincomeform($user, $datefrom, $dateto);
        profitandlosexpenseform($user, $datefrom, $dateto);
    }
}

function dailyx($user, $to, $d, $m, $y, $dto, $mto, $yto) {
    if ($to == "word") {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=document_name.doc");
        dailystatments($user, $d, $m, $y, $dto, $mto, $yto);
    }
    if ($to == "excel") {
        header("Content-type: application/vnd.ms-excel");
        header("Content-Disposition: attachment;Filename=document_name.xls");
        dailystatments($user, $d, $m, $y, $dto, $mto, $yto);
    }
    if ($to == "pdf") {
//include_once './tcp/examples/example_003.php';
//$txt.=viewmembers();
//header('location:./tcp/examples/example_006.php');
    }
}

function pagination($query, $per_page = 6, $page = 1, $url = '?') {
    $query = "SELECT COUNT(*) as `num` FROM {$query}";
    $row = mysql_fetch_array(mysql_query($query));
    $total = $row['num'];
    $adjacents = "2";

    $page = ($page == 0 ? 1 : $page);
    $start = ($page - 1) * $per_page;

    $prev = $page - 1;
    $next = $page + 1;
    $lastpage = ceil($total / $per_page);
    $lpm1 = $lastpage - 1;

    $pagination = "";
    if ($lastpage > 1) {
        $pagination .= "<ul class='pagination'>";
        $pagination .= "<li class='details'>Page $page of $lastpage</li>";
        if ($lastpage < 7 + ($adjacents * 2)) {
            for ($counter = 1; $counter <= $lastpage; $counter++) {
                if ($counter == $page)
                    $pagination.= "<li><a class='current'>$counter</a></li>";
                else
                    $pagination.= "<li><a href='{$url}page=$counter'>$counter</a></li>";
            }
        }
        elseif ($lastpage > 5 + ($adjacents * 2)) {
            if ($page < 1 + ($adjacents * 2)) {
                for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++) {
                    if ($counter == $page)
                        $pagination.= "<li><a class='current'>$counter</a></li>";
                    else
                        $pagination.= "<li><a href='{$url}page=$counter'>$counter</a></li>";
                }
                $pagination.= "<li class='dot'>...</li>";
                $pagination.= "<li><a href='{$url}page=$lpm1'>$lpm1</a></li>";
                $pagination.= "<li><a href='{$url}page=$lastpage'>$lastpage</a></li>";
            }
            elseif ($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2)) {
                $pagination.= "<li><a href='{$url}page=1'>1</a></li>";
                $pagination.= "<li><a href='{$url}page=2'>2</a></li>";
                $pagination.= "<li class='dot'>...</li>";
                for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++) {
                    if ($counter == $page)
                        $pagination.= "<li><a class='current'>$counter</a></li>";
                    else
                        $pagination.= "<li><a href='{$url}page=$counter'>$counter</a></li>";
                }
                $pagination.= "<li class='dot'>..</li>";
                $pagination.= "<li><a href='{$url}page=$lpm1'>$lpm1</a></li>";
                $pagination.= "<li><a href='{$url}page=$lastpage'>$lastpage</a></li>";
            }
            else {
                $pagination.= "<li><a href='{$url}page=1'>1</a></li>";
                $pagination.= "<li><a href='{$url}page=2'>2</a></li>";
                $pagination.= "<li class='dot'>..</li>";
                for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++) {
                    if ($counter == $page)
                        $pagination.= "<li><a class='current'>$counter</a></li>";
                    else
                        $pagination.= "<li><a href='{$url}page=$counter'>$counter</a></li>";
                }
            }
        }

        if ($page < $counter - 1) {
            $pagination.= "<li><a href='{$url}page=$next'>Next</a></li>";
            $pagination.= "<li><a href='{$url}page=$lastpage'>Last</a></li>";
        } else {
            $pagination.= "<li><a class='current'>Next</a></li>";
            $pagination.= "<li><a class='current'>Last</a></li>";
        }
        $pagination.= "</ul>\n";
    }


    return $pagination;
}

function loantid($mno, $ltype) {
    $qry = mysql_query('select * from loanapplication where membernumber="' . base64_encode($mno) . '" and loantype="' . base64_encode($ltype) . '" order by id desc limit 0,1') or die(mysql_error());
    $row = mysql_fetch_array($qry);
    return $row['transactionid'];
}

function addphoto($user, $photo) {
// get the original filename
    $image = $_FILES['photos'][$photo];

// image storing folder, make sure you indicate the right path
    $folder = "photos/";

// image checking if exist or the input field is not empty
    if ($image) {
// creating a filename
        $filename = $folder . $image;

// uploading image file to specified folder
        $copied = copy($_FILES['photos']['tmp_name'], "../" . $filename);

// checking if upload succesfull
        if (!$copied) {
            echo "no image";
        } else {
            
        }
    }
}

function addition($one, $two) {
    $addition = base64_decode($one) + base64_decode($two);
    if ($addition == 0) {
        return 0;
    } else {
        return $addition;
    }
}

function statementout($date, $mno) {
    $acnaqry = mysql_query('select * from accounts where actype="' . base64_encode("Fines") . '"') or die(mysql_error());
    while ($row1 = mysql_fetch_array($acnaqry)) {
        $qry = mysql_query('select * from paymentin where transname="' . $row1['acname'] . '" and payeeid="' . base64_encode($mno) . '" and date="' . base64_encode($date) . '"') or die(mysql_error());
        while ($row = mysql_fetch_array($qry)) {
            echo '<tr><td><center>' . base64_decode($row['date']) . '</center></td><td>' . base64_decode($row['transname']) . '</td><td>' . getsymbol() . '.' . number_format(amount($row['amount']), 2) . '</td><td>' . getsymbol() . '.0.00</td></tr>';
        }
    }
    $adqry = mysql_query('select * from paymentin where  paymentype="' . base64_encode("adjustments") . '" and payeeid="' . base64_encode($mno) . '" and date="' . base64_encode($date) . '"') or die(mysql_error());
    while ($row2 = mysql_fetch_array($adqry)) {
        echo '<tr><td><center>' . base64_decode($row2['date']) . '</center></td><td>' . base64_decode($row2['transname']) . '</td><td>' . getsymbol() . '.' . number_format(amount($row2['amount']), 2) . '</td><td>' . getsymbol() . '.0.00</td></tr>';
    }

    $acnaqr = mysql_query('select * from accounts where actype="' . base64_encode("Loan Repayment") . '"') or die(mysql_error());
    while ($lrslt = mysql_fetch_array($acnaqr)) {
        $qry = mysql_query('select * from membercontribution where memberno="' . base64_encode($mno) . '" and transaction="' . $lrslt['acname'] . '" and date="' . base64_encode($date) . '"') or die(mysql_error());
        if (mysql_num_rows($qry) >= 1) {
            while ($row = mysql_fetch_array($qry)) {
                echo '<tr><td><center>' . base64_decode($row['date']) . '</center></td><td>' . base64_decode($row['transaction']) . '</td><td>' . getsymbol() . '.' . number_format(amount($row['amount']), 2) . '</td><td>' . getsymbol() . '.0.00</td></tr>';
            }
        }
    }

    $qac = mysql_query('select * from loansettings where status="' . base64_encode("Active") . '"') or die(mysql_error());
    while ($lrslt = mysql_fetch_array($qac)) {
        $qry = mysql_query('select * from membercontribution where memberno="' . base64_encode($mno) . '" and transaction="' . $lrslt['lname'] . '" and date="' . base64_encode($date) . '"') or die(mysql_error());
        if (mysql_num_rows($qry) >= 1) {
            while ($row = mysql_fetch_array($qry)) {
                echo '<tr><td><center>' . base64_decode($row['date']) . '</center></td><td>' . base64_decode($row['transaction']) . '</td><td>' . getsymbol() . '.' . number_format(amount($row['amount']), 2) . '</td><td>' . getsymbol() . '.0.00</td></tr>';
            }
        }
    }
}

function balancestatement($user, $mno, $datefrom, $dateto) {
    $balance = sumstatementin($user, $mno, $datefrom, $dateto) - sharetotaout($user, $mno, $datefrom, $dateto);
    return $balance;
}

function amount($amount) {
    if (base64_decode($amount) == 0) {
        return 0;
    } else {
        return base64_decode($amount);
    }
}

function difference($one, $two) {
    $difference = base64_decode($one) - base64_decode($two);
    if ($difference == 0) {
        return 0;
    } else {
        return $difference;
    }
}

function statementin($date, $mno) {
    $qry = mysql_query('select * from membercontribution where memberno="' . base64_encode($mno) . '" and date="' . base64_encode($date) . '"') or die(mysql_error());
    if (mysql_num_rows($qry) >= 1) {
        while ($row = mysql_fetch_array($qry)) {
            echo '<tr><td><center>' . base64_decode($row['date']) . '</center></td><td>' . base64_decode($row['transaction']) . '</td><td>' . getsymbol() . '.0.00</td><td>' . getsymbol() . '.' . number_format(amount($row['amount']), 2) . '</td></tr>';
        }
    }
}

function sumstatementin($user, $mno, $datefrom, $dateto) {

    $s = strtotime($datefrom);

    $t = strtotime($dateto);
    $sum = 0;
    while ($s <= $t) {
//echo date("d-M-Y", $s).'</br>';
        $qry = mysql_query('select * from membercontribution where memberno="' . base64_encode($mno) . '" and date="' . base64_encode(date("d-M-Y", $s)) . '"') or die(mysql_error());

        while ($row = mysql_fetch_array($qry)) {
            $sum+=base64_decode($row['amount']);
        }


        $s = $s + 86400; //increment date by 86400 seconds(1 day)
    }
    return $sum + shareinbf($user, $mno);
}

function shareinbf($user, $mno) {
    $qry = mysql_query('select * from sharesbf where memberno="' . base64_encode($mno) . '" and status="' . base64_encode("active") . '"') or die(mysql_error());
    $rslt = mysql_fetch_array($qry);
    return base64_decode($rslt['sharesbf']);
}

function sumstatementous($user, $mno, $datefrom, $dateto) {
//$datefrom = $dfrom . '-' . $mfrom . '-' . $yfrom;
//$dateto = $dto . '-' . $mto . '-' . $yto;
//start date 2001-02-23
    /* $sm = date("m", strtotime($mfrom));
      $sd = $dfrom;
      $sy = $yfrom;

      //end date 2001-03-14
      //
      //$tm = date("m", strtotime($mto));
      $tm = date("m", strtotime($mto));
      //$td = $dto;
      $td = $dto;
      //$ty = $yto;
      $ty = $yto;
     */
//utc of start and end dates
    $s = strtotime($datefrom);
//$e=mktime(0,0,0,$em, $ed, $ey);
    $t = strtotime($dateto);
    $sum = 0;
    while ($s <= $t) {
        $acnaqry = mysql_query('select * from accounts where actype="' . base64_encode("Fines") . '"') or die(mysql_error());
        while ($row1 = mysql_fetch_array($acnaqry)) {
            $qry = mysql_query('select * from paymentin where transname="' . $row1['acname'] . '" and payeeid="' . base64_encode($mno) . '" and date="' . base64_encode(date("d-M-Y", $s)) . '"') or die(mysql_error());

            while ($row = mysql_fetch_array($qry)) {
                $sum+=base64_decode($row['amount']);
            }
        }
        $acnaqr = mysql_query('select * from accounts where actype="' . base64_encode("Loan Repayment") . '"') or die(mysql_error());
        while ($lrslt = mysql_fetch_array($acnaqr)) {
            $qry = mysql_query('select * from membercontribution where memberno="' . base64_encode($mno) . '" and transaction="' . $lrslt['acname'] . '" and date="' . base64_encode(date("d-M-Y", $s)) . '"') or die(mysql_error());
            if (mysql_num_rows($qry) >= 1) {
                while ($row = mysql_fetch_array($qry)) {
                    $sum+=base64_decode($row['amount']);
                }
            }
        }

        $cnaqr = mysql_query('select * from accounts where actype="' . base64_encode("Withdrawn shares") . '"') or die(mysql_error());
        while ($lrlt = mysql_fetch_array($cnaqr)) {
            $qry = mysql_query('select * from membercontribution where memberno="' . base64_encode($mno) . '" and transaction="' . $lrslt['acname'] . '" and date="' . base64_encode(date("d-M-Y", $s)) . '"') or die(mysql_error());
            if (mysql_num_rows($qry) >= 1) {
                while ($ro1w = mysql_fetch_array($qry)) {
                    $sum+=base64_decode($ro1w['amount']);
                }
            }
        }

        $acnaqr = mysql_query('select * from loansettings where status="' . base64_encode("Active") . '"') or die(mysql_error());
        while ($lrslt = mysql_fetch_array($acnaqr)) {
            $qry = mysql_query('select * from membercontribution where memberno="' . base64_encode($mno) . '" and transaction="' . $lrslt['lname'] . '" and date="' . base64_encode(date("d-M-Y", $s)) . '"') or die(mysql_error());
            if (mysql_num_rows($qry) >= 1) {
                while ($row = mysql_fetch_array($qry)) {
                    $sum+=base64_decode($row['amount']);
                }
            }
        }

        $s = $s + 86400; //increment date by 86400 seconds(1 day)
    }
    return $sum;
}

function sumstatementadju($user, $mno, $datefrom, $dateto) {

    $s = strtotime($datefrom);
//$e=mktime(0,0,0,$em, $ed, $ey);
    $t = strtotime($dateto);
    $sum = 0;
    while ($s <= $t) {
        $qry = mysql_query('select * from paymentin where paymentype="' . base64_encode("adjustments") . '" and payeeid="' . base64_encode($mno) . '" and date="' . base64_encode(date("d-M-Y", $s)) . '"') or die(mysql_error());

        while ($row = mysql_fetch_array($qry)) {
            $sum+=base64_decode($row['amount']);
        }

        $s = $s + 86400; //increment date by 86400 seconds(1 day)
    }
    return $sum;
}

function sumin($user, $mno) {

    $sm = 5;
    $sd = 5;
    $sy = 2013;

//end date 2001-03-14
//
//$tm = date("m", strtotime($mto));
    $tm = date("m");
//$td = $dto;
    $td = date("d");
//$ty = $yto;
    $ty = date("Y");

//utc of start and end dates
    $s = mktime(0, 0, 0, $sm, $sd, $sy);
//$e=mktime(0,0,0,$em, $ed, $ey);
    $t = mktime(0, 0, 0, $tm, $td, $ty);
    $sum = 0;
    while ($s <= $t) {
//echo date("d-M-Y", $s).'</br>';
        $qry = mysql_query('select * from membercontribution where memberno="' . base64_encode($mno) . '" and date="' . base64_encode(date("d-M-Y", $s)) . '"') or die(mysql_error());

        while ($row = mysql_fetch_array($qry)) {
            $sum+=base64_decode($row['amount']);
        }


        $s = $s + 86400; //increment date by 86400 seconds(1 day)
    }
    return $sum;
}

function sharesum($user, $mno) {
//$datefrom = $dfrom . '-' . $mfrom . '-' . $yfrom;
//$dateto = $dto . '-' . $mto . '-' . $yto;
//start date 2001-02-23
    $sm = 01;
    $sd = 01;
    $sy = 2010;

//end date 2001-03-14
//
//$tm = date("m", strtotime($mto));
    $tm = date("m");
//$td = $dto;
    $td = date("d");
//$ty = $yto;
    $ty = date("Y");

//utc of start and end dates
    $s = mktime(0, 0, 0, $sm, $sd, $sy);
//$e=mktime(0,0,0,$em, $ed, $ey);
    $t = mktime(0, 0, 0, $tm, $td, $ty);
    $sum = 0;
    while ($s <= $t) {
//echo date("d-M-Y", $s).'</br>';
        $qry = mysql_query('select * from membercontribution where memberno="' . base64_encode($mno) . '" and date="' . base64_encode(date("d-M-Y", $s)) . '"') or die(mysql_error());

        while ($row = mysql_fetch_array($qry)) {
            $sum+=base64_decode($row['amount']);
        }


        $s = $s + 86400; //increment date by 86400 seconds(1 day)
    }
    return $sum;
}

function sumout($user, $mno) {
//$datefrom = $dfrom . '-' . $mfrom . '-' . $yfrom;
//$dateto = $dto . '-' . $mto . '-' . $yto;
//start date 2001-02-23
    $sm = 5;
    $sd = 5;
    $sy = 2013;

//end date 2001-03-14
//
//$tm = date("m", strtotime($mto));
    $tm = date("M");
//$td = $dto;
    $td = date("d");
//$ty = $yto;
    $ty = date("Y");

//utc of start and end dates
    $s = mktime(0, 0, 0, $sm, $sd, $sy);
//$e=mktime(0,0,0,$em, $ed, $ey);
    $t = mktime(0, 0, 0, $tm, $td, $ty);
    $sum = 0;
    while ($s <= $t) {
        $acnaqry = mysql_query('select * from accounts where actype="' . base64_encode("Fines") . '"') or die(mysql_error());
        while ($row1 = mysql_fetch_array($acnaqry)) {
            $qry = mysql_query('select * from paymentin where transname="' . $row1['acname'] . '" and payeeid="' . base64_encode($mno) . '" and date="' . base64_encode(date("d-M-Y", $s)) . '"') or die(mysql_error());

            while ($row = mysql_fetch_array($qry)) {
                $sum+=base64_decode($row['amount']);
            }
        }
        $s = $s + 86400; //increment date by 86400 seconds(1 day)
    }
    return $sum;
}

function balancebf($user, $mno) {
    $$qry = mysql_query('select * from membercontribution where memberno="' . base64_encode($mno) . '" and date="' . base64_encode(date("d-M-Y", $s)) . '"') or die(mysql_error());

    while ($row = mysql_fetch_array($qry)) {
        $sum+=base64_decode($row['amount']);
    }

    $balance = sumstatementin($user, $mno, $dfrom, $mfrom, $yfrom, $dto, $mto, $yto) - sharetotaout($user, $mno, $dfrom, $mfrom, $yfrom, $dto, $mto, $yto);
// }
    return $balance;
}

function bbf($user, $mno, $dfrom, $mfrom, $yfrom) {
//date("m", strtotime($mfrom));
    $mmfrom = 1;
    $ddfrom = 1;
    $yyfrom = 2011;
//echo 'date to:'.$dto.'-'.$mto.'-'.$yto;
//end date 2001-03-14
//
    $dto = $dfrom;
    $mto = date("m", strtotime($mfrom));
    $yto = $yfrom;
    $balance = 0;
//utc of start and end dates
    $s = mktime(0, 0, 0, $sm, $sd, $sy);
//$e=mktime(0,0,0,$em, $ed, $ey);
// $t = mktime(0, 0, 0, $tm, $td, $ty);
// while ($s <= $t) {
    $balance = sumstatementin($user, $mno, $ddfrom, $mmfrom, $yyfrom, $dto, $mto, $yto) - sharetotaout($user, $mno, $ddfrom, $mmfrom, $yyfrom, $dto, $mto, $yto);
// }
    return $balance;
}

function statementtotalbalance($user, $mno, $dfrom, $mfrom, $yfrom, $dto, $mto, $yto) {
    $balance = (balancebf($user, $mno)) + (balancestatement($user, $mno, $dfrom, $mfrom, $yfrom, $dto, $mto, $yto));
    return $balance;
}

function ministatement($user, $mno, $datefrom, $dateto) {
    $mqry = mysql_query('select * from newmember where membernumber="' . base64_encode($mno) . '" and status="' . base64_encode("active") . '"') or die(mysql_error());
    if (mysql_num_rows($mqry) == 1) {

        $s = strtotime($datefrom);
//$e=mktime(0,0,0,$em, $ed, $ey);
        $t = strtotime($dateto);
        if ($t < $s) {
            echo '<span class="red">Sorry Please enter search dates correctly</span></br>';
        } else {
            echo '<table  class="table table-striped  table-bordered table-hover sorting_asc_disabled"  id="sample_2">
                <tr><th colspan="4">' . compname() . '</th></tr>
                   <tr><th>Date</th><th>Member Number</th><th>Member Name</th><th>Total</th></tr>
        <tr><td>' . $datefrom . ' to ' . $dateto . '</td><td>' . $mno . '</td><td>' . getMembername(base64_encode($mno)) . '</td><td>' . getsymbol() . '.' . number_format(balancestatement($user, $mno, $datefrom, $dateto), 2) . '</td></tr>

</tr>
        <tr><th colspan="4">STATEMENT OF ACCOUNT</th></tr>
        <tr><th>Date</th><th>Transaction</th><th>Money out</th><th>Money in</th></th>
        <tr><th>' . $dateto . '</th><td></td><td>Balance BF</td><td>' . getsymbol() . '.' . number_format(bbf($user, $mno, $dateto), 2) . '</td></tr>';
            while ($s <= $t) {
//echo date("d-M-Y", $s).'</br>';
                statementin(date("d-M-Y", $s), $mno);
                statementout(date("d-M-Y", $s), $mno);

                $s = $s + 86400; //increment date by 86400 seconds(1 day) 
            }
            echo '<tr><th>Total</th><td></td><td>' . getsymbol() . '.' . number_format(sharetotaout($user, $mno, $datefrom, $dateto), 2) . '</td>
        <td>' . getsymbol() . '.' . number_format(sumstatementin($_SESSION['users'], $mno, $datefrom, $dateto), 2) . '</td></tr>
            <tr><th>Balance</th><td></td><td colspan="2"><center>' . getsymbol() . '.' . number_format(balancestatement($user, $mno, $datefrom, $dateto), 2) . '</center></td></tr>

        </table>';
//<tr><th>Net Balance</th><td></td><td colspan="2"><center>' . getsymbol() . '.' . number_format(netstatementbl($user, $mno, $dfrom, $mfrom, $yfrom, $dto, $mto, $yto), 2) . '</center></td></tr>
        }
    } else {
        echo '<span class="red">Sorry Member not found</span></br>';
    }
    echo '<div class="col-md-2"><div class="noprint"><button class="btn green"value="Print this page" onclick="print()">Print</button></div></div>';
}

function ministatementa($user, $mno, $traid, $datefrom, $dateto) {

    $tid = getdefaultsavingsaccount();
    $mqry = mysql_query('select * from newmember where membernumber="' . base64_encode($mno) . '" and status="' . base64_encode("active") . '"') or die(mysql_error());
    if (mysql_num_rows($mqry) == 1) {
        $accum_interest = 0;
        $s = strtotime($datefrom);
//$e=mktime(0,0,0,$em, $ed, $ey);
        $t = strtotime($dateto);
        $accum_interest = sumaccrued_interest(base64_encode($mno), $datefrom, $dateto);
        if ($t < $s) {
            echo '<span class="red" >Sorry Please enter search dates correctly</span></br>';
        } else {


            echo '<div id="mt"><table  class="table table-striped  table-bordered table-hover sorting_asc_disabled"  id="sample_2">
<thead>
 <tr><th colspan="4"><center>Account Statements</center></th></tr>               
<tr><th colspan="4"><center>' . compname() . '</center></th></tr>
                   <tr><th>Date Range</th><th>Member Number</th><th>Member Name</th><th></th></tr>
        <tr><td>' . $datefrom . ' to ' . $dateto . '</td><td>' . $mno . '</td><td>' . getMembername(base64_encode($mno)) . '</td><td></td></tr>

</tr>
        <tr><th colspan="4"><center>STATEMENT OF ACCOUNT</center></th></tr>
        <tr><th>Date</th><th>Transaction</th><th>Money Out</th><th>Money In</th></th></tr></thead>';

            while ($s <= $t) {

                $qry = mysql_query('select * from membercontribution where memberno="' . base64_encode($mno) . '" and date="' . base64_encode(date("d-M-Y", $s)) . '" and transaction="' . base64_encode($traid) . '"  AND  paymenttype !="' . base64_encode("adjustments") . '"   ') or die(mysql_error());
                if (mysql_num_rows($qry) >= 1) {
                    while ($row = mysql_fetch_array($qry)) {
                        $sumin = $row['amount'];
                        $sss+=base64_decode($sumin);

                        echo '<tr><td>' . base64_decode($row['date']) . '</td><td>' . getglacc(base64_decode($row['transaction'])) . '</td><td>' . getsymbol() . ' 0.00</td><td>' . getsymbol() . ' ' . number_format(base64_decode($sumin), 2) . '</td></tr>';
                    }
                }


//function get adjustments
                $adqry = mysql_query('select * from paymentin where  paymentype="' . base64_encode("adjustments") . '" and payeeid="' . base64_encode($mno) . '" and transname="' . base64_encode($traid) . '" and date="' . base64_encode(date("d-M-Y", $s)) . '"') or die(mysql_error());
                while ($row2 = mysql_fetch_array($adqry)) {

                    $adj = $row2['amount'];
                    $adjj+=base64_decode($adj);
                    echo '<tr><td>' . base64_decode($row2['date']) . '</td>';
                    if (is_numeric((base64_decode($row2['transname'])))) {
                        echo'<td>' . getGlname(base64_decode($row2['transname'])) . '</td>';
                    } else {
                        echo'<td>' . base64_decode($row2['transname']) . '</td>';
                    }
                    echo'<td>' . getsymbol() . ' ' . number_format(base64_decode($adj), 2) . '</td><td>' . getsymbol() . ' 0.00</td></tr>';
                }

//function get fixed deposit account opening fee
                $adqryq = mysql_query('select * from paymentin where  transname="' . base64_encode(getFixedAccReg()) . '" and payeeid="' . base64_encode($mno) . '" and date="' . base64_encode(date("d-M-Y", $s)) . '"') or die(mysql_error());
                while ($rowa2 = mysql_fetch_array($adqryq)) {

                    $reg = base64_decode($rowa2['amount']);


                    echo '<tr><td>' . base64_decode($rowa2['date']) . '</td>';

                    echo'<td>' . getRegFeeGlName(base64_decode($rowa2['transname'])) . '</td>';

                    echo'<td>' . getsymbol() . ' ' . number_format(base64_decode($rowa2['amount']), 2) . '</td><td>' . getsymbol() . ' 0.00</td></tr>';
                }
//function get fixed deposit account magement fee
                $qryq = mysql_query('select * from paymentin where  transname="' . base64_encode(getManagementGlAccount()) . '" and payeeid="' . base64_encode($mno) . '" and date="' . base64_encode(date("d-M-Y", $s)) . '"') or die(mysql_error());
                while ($rowa3 = mysql_fetch_array($qryq)) {

                    $manFee = base64_decode($rowa3['amount']);


                    echo '<tr><td>' . base64_decode($rowa3['date']) . '</td>';

                    echo'<td>' . getMana_GlAcc_name(base64_decode($rowa3['transname'])) . '</td>';

                    echo'<td>' . getsymbol() . ' ' . number_format(base64_decode($rowa3['amount']), 2) . '</td><td>' . getsymbol() . ' 0.00</td></tr>';
                }


                $sumout = $manFee + $reg + $adjj;
                $sin = $sss;

                $s = $s + 86400; //increment date by 86400 seconds(1 day)

                $bal = ($sin - $sumout);
            }
            echo '<tr><th>Total</th><td></td><td>' . getsymbol() . ' ' . number_format($sumout, 2) . '</td>
        <td>' . getsymbol() . ' ' . number_format($sin, 2) . '</td></tr>
            <tr><th>Balance</th><td></td><td colspan="2"><center>' . getsymbol() . ' ' . number_format($bal, 2) . '</center></td></tr>
                </table></div>';
        }
    } else {
        echo '<span class="red" >Sorry Member not found</span></br>';
    }
    echo '<button class="btn green"value="Print this page" onClick="return printResults()">Print</button>';
}

function getmemberaccounts($mno){
    $accts = mysql_query('select * from memberaccs where mno="' . base64_encode($mno) . '"') or die(mysql_error());
    while($accs = mysql_fetch_array($accts)){
        $tid = base64_decode($accs['glaccid']);
        $name = getGlname($tid);
        echo '<tr><td>' . date("d-M-Y") . '</td><th>' . $name . '</th><td colspan="2"><center>' .getsymbol() . ' ' . number_format(accountstatement($mno, $tid, $datefrom, $dateto), 2) . '<center></td></tr>';
    }
}

function accountstatement($mno, $tid, $datefrom, $dateto) {
    $s = strtotime($datefrom);
    $t = strtotime($dateto);
    if($t < $t){
        echo '<span class="red">Sorry Please enter search dates correctly</span></br>';
    }
    else{
        $sum = 0;
        while($s <= $t){
            $qry = mysql_query('select * from membercontribution where memberno="' . base64_encode($mno) . '" and transaction="' . base64_encode($tid) . '"') or die(mysql_errno());
            while($row = mysql_fetch_array($qry)){
                $sum+=base64_decode($row['amount']);
            }
            $s = $s + 86400; //increment date by 86400 seconds(1 day)
            //$datefrom = strtotime("+1 day", strotime($datefrom));
        }
        
        return $sum;
    }
}

function ministate($user, $mno, $tname) {
    $mqry = mysql_query('select * from newmember where membernumber="' . base64_encode($mno) . '" and status="' . base64_encode("active") . '"') or die(mysql_error());
    if (mysql_num_rows($mqry) == 1) {


        echo '<div id="mt"><table  class="table table-striped  table-bordered table-hover sorting_asc_disabled"  id="sample_2">
                 <tr><th colspan="4"><center>' . compname() . '</center></th></tr>
                   <tr><th></th><th>Member Number</th><th>Member Name</th><th></th></tr>
        <tr><td></td><td>' . $mno . '</td><td>' . getMembername(base64_encode($mno)) . '</td><td></td></tr>

</tr>
        <tr><th colspan="4"><center>MINI-STATEMENT</center></th></tr>
        <tr><th>Date</th><th>Transaction</th><th>Money out</th><th>Money in</th></th>';


        $qry = mysql_query('select * from membercontribution where transaction="' . base64_encode($tname) . '" and memberno="' . base64_encode($mno) . '"  AND  paymenttype !="' . base64_encode("adjustments") . '"   order by primarykey ') or die(mysql_error());
        if (mysql_num_rows($qry) >= 1) {
            while ($row = mysql_fetch_array($qry)) {
                $sumin = $row['amount'];
                $sss+=base64_decode($sumin);

                echo '<tr><td><center>' . base64_decode($row['date']) . '</center></td><td>' . getglacc(base64_decode($row['transaction'])) . '</td><td>' . getsymbol() . ' 0.00</td><td>' . getsymbol() . ' ' . number_format(base64_decode($sumin), 2) . '</td></tr>';
            }
        }



//statementout(date("d-M-Y", $s), $mno);

        $acnaqry = mysql_query("select * from glaccounts where accgroup='4'");
        while ($row1 = mysql_fetch_array($acnaqry)) {
            $qry = mysql_query('select * from paymentin where transname="' . getglacc(($row1['id'])) . '" and payeeid="' . base64_encode($mno) . '" order by primarykey ') or die(mysql_error());
            while ($row = mysql_fetch_array($qry)) {

                $fine = $row['amount'];
                $finee+=base64_decode($fine);

                echo '<tr><td><center>' . base64_decode($row['date']) . '</center></td><td>' . (base64_decode($row['transname'])) . '</td><td>' . getsymbol() . ' ' . number_format(base64_decode($fine), 2) . '</td><td>' . getsymbol() . ' 0.00</td></tr>';
            }
        }
        $adqry = mysql_query('select * from paymentin where  paymentype="' . base64_encode("adjustments") . '" and payeeid="' . base64_encode($mno) . '" order by primarykey desc ') or die(mysql_error());
        while ($row2 = mysql_fetch_array($adqry)) {

            $adj = $row2['amount'];
            $adjj+=base64_decode($adj);

            echo '<tr><td><center>' . base64_decode($row2['date']) . '</center></td><td>' . getglacc(base64_decode($row2['transname'])) . '</td><td>' . getsymbol() . ' ' . number_format(base64_decode($adj), 2) . '</td><td>' . getsymbol() . ' 0.00</td></tr>';
        }

        $sadqry = mysql_query('select * from paymentin where  paymentype="' . base64_encode("Standing Order") . '" and payeeid="' . base64_encode($mno) . '" order by primarykey desc ') or die(mysql_error());
        while ($row3 = mysql_fetch_array($sadqry)) {

            $sto = $row3['amount'];
            $stoo+=base64_decode($sto);

            echo '<tr><td><center>' . base64_decode($row3['date']) . '</center></td><td>' . base64_decode($row3['transname']) . '</td><td>' . getsymbol() . ' ' . number_format(base64_decode($sto), 2) . '</td><td>' . getsymbol() . ' 0.00</td></tr>';
        }

        $acnaqr = mysql_query('select * from accounts where actype="' . base64_encode("Loan Repayment") . '"') or die(mysql_error());
        while ($lrslt = mysql_fetch_array($acnaqr)) {
            $qry = mysql_query('select * from membercontribution where memberno="' . base64_encode($mno) . '" and transaction="' . $lrslt['acname'] . '" order by primarykey desc ') or die(mysql_error());
            if (mysql_num_rows($qry) >= 1) {
                while ($row = mysql_fetch_array($qry)) {

                    $lop = $row['amount'];
                    $lopp+=base64_decode($lop);

                    echo '<tr><td><center>' . base64_decode($row['date']) . '</center></td><td>' . base64_decode($row['transaction']) . '</td><td>' . getsymbol() . ' ' . number_format(base64_decode($lop), 2) . '</td><td>' . getsymbol() . ' 0.00</td></tr>';
                }
            }
        }

        $cac = mysql_query('select * from loansettings where status="' . base64_encode("Active") . '"') or die(mysql_error());
        while ($lrslt = mysql_fetch_array($cac)) {
            $qryc = mysql_query('select * from membercontribution where memberno="' . base64_encode($mno) . '" and transaction="' . $lrslt['lname'] . '" order by primarykey desc ') or die(mysql_error());
            if (mysql_num_rows($qryc) >= 1) {
                while ($row = mysql_fetch_array($qryc)) {

                    $loa = $row['amount'];
                    $loaa+=base64_decode($loa);
                    echo '<tr><td><center>' . base64_decode($row['date']) . '</center></td><td>' . base64_decode($row['transaction']) . '</td><td>' . getsymbol() . ' 0.00</td><td>' . getsymbol() . ' ' . number_format(base64_decode($loa), 2) . '</td></tr>';
                }
            }
        }

        $qac = mysql_query('select * from loansettings where status="' . base64_encode("Active") . '"') or die(mysql_error());
        while ($lrslt = mysql_fetch_array($qac)) {
            $qry = mysql_query('select * from membercontribution where memberno="' . base64_encode($mno) . '" and transaction="' . $lrslt['lname'] . '" order by primarykey desc ') or die(mysql_error());
            if (mysql_num_rows($qry) >= 1) {
                while ($row = mysql_fetch_array($qry)) {

                    $los = $row['amount'];
                    $loss+=base64_decode($los);
                    echo '<tr><td><center>' . base64_decode($row['date']) . '</center></td><td>' . base64_decode($row['transaction']) . '</td><td>' . getsymbol() . ' ' . number_format(base64_decode($los), 2) . '</td><td>' . getsymbol() . ' 0.00</td></tr>';
                }
            }
        }
        $sumout = $loss + $lopp + $stoo + $adjj + $finee;

        $sin = $sss + $loaa;

        $s = $s + 86400; //increment date by 86400 seconds(1 day)

        $bal = $sin - $sumout;

//}
        echo '<tr><th>Total</th><td></td><td>' . getsymbol() . '.' . number_format($sumout, 2) . '</td>
        <td>' . getsymbol() . ' ' . number_format($sin, 2) . '</td></tr>
            <tr><th>Balance</th><td></td><td colspan="2"><center>' . getsymbol() . '.' . number_format($bal, 2) . '</center></td></tr>
                </table></div>';
//<tr><th>Net Balance</th><td></td><td colspan="2"><center>' . getsymbol() . '.' . number_format(netstatementbl($user, $mno, $dfrom, $mfrom, $yfrom, $dto, $mto, $yto), 2) . '</center></td></tr>
//}
    } else {
        echo '<span class="red" >Sorry Member not found</span></br>';
    }
}

function netstatementbl($user, $mno, $datefrom, $dateto) {
    $netbal = balancestatement($user, $mno, $datefrom, $dateto) + bbf($user, $mno, $datefrom);
    return $netbal;
}

function totall() {

    $jem = mysql_query('select * from membercontribution') or die(mysql_error());
    $gtr = 0;

    while ($qww = mysql_fetch_array($jem)) {

        $pname = base64_decode($qww['memberno']);
        echo '
		<table  class="table table-striped  table-bordered table-hover sorting_asc_disabled"  id="sample_2">';
        $yuy = base64_decode($qww['amount']);
        $gtr+=$yuy;
//$ruy = base64_decode($qww['amount']);
        echo '<td>' . $pname . '</td>';

        echo '<td>' . $yuy . '</td>';
    }

    echo '<tr>
		   	<td colspan="6">TOTAL </td><td>' . number_format($gtr, 2) . '</td>
			</tr>
        </table>';
}

function jumazz($mno) {
    $bal = 0;
    $dre = mysql_query('select * from balances where membernumber="' . base64_encode($mno) . '"') or die(mysql_error());
    while ($snoop = mysql_fetch_array($dre)) {
        $bal = base64_decode($snoop['bal']);
    }
    return $bal;
}

function dateOfDbrs($tid) {

    $dre = mysql_query('select * from  loandisbursment   where  	tid="' . $tid . '"') or die(mysql_error());
    ($snoop = mysql_fetch_array($dre));
    return base64_decode($snoop['date']);
}

function dateOfDbrse($mno) {

    $chekdisdate = mysql_query("SELECT * FROM  loanapplication   WHERE  membernumber='" . base64_encode($mno) . "'  AND   status='" . base64_encode('pending') . "'");
    ($snoop = mysql_fetch_array($chekdisdate));
    return base64_decode($snoop['appdate']);
}

function loanbalance() {
    echo '<div class="portlet box green">
                <div class="portlet-title">
                        <div class="caption">
                                <i class="fa fa-globe"></i>Loan Balances
                        </div>
                        <div class="actions">
                                <div class="btn-group">
                                        <a class="btn default" href="#" data-toggle="dropdown">
                                                 Columns <i class="fa fa-angle-down"></i>
                                        </a>
                                        <div id="sample_2_column_toggler" class="dropdown-menu hold-on-click dropdown-checkboxes pull-right">
                                            <label><input type="checkbox" checked data-column="0">Member No</label>
                                            <label><input type="checkbox" checked data-column="1">Member Name</label>
                                            <label><input type="checkbox" checked data-column="2">ID No</label>
                                            <label><input type="checkbox" checked data-column="3">Phone No.</label>
                                            <label><input type="checkbox" checked data-column="4">Loan Type</label>
                                            <label><input type="checkbox" checked data-column="5">Date of Application</label>
                                            <label><input type="checkbox" checked data-column="6">Date of Disbursement</label>
                                            <label><input type="checkbox" checked data-column="7">Expected Date of Last Repayment</label>
                                            <label><input type="checkbox" checked data-column="8">Principle</label>
                                            <label><input type="checkbox" checked data-column="9">Principle Paid</label>
                                            <label><input type="checkbox" checked data-column="10">Prinicple Bal</label>
                                            <label><input type="checkbox" data-column="11">Extra Fee Amount</label>
                                            <label><input type="checkbox" data-column="12">Extra Fee Paid</label>
                                            <label><input type="checkbox" data-column="13">Extra Fee Bal</label>
                                            <label><input type="checkbox" checked data-column="14">Loan Interest Amount</label>
                                            <label><input type="checkbox" checked data-column="15">Loan Interest Paid</label>
                                            <label><input type="checkbox" checked data-column="16">Loan Interest Balance</label>
                                            <label><input type="checkbox" checked data-column="17">Loan Amount</label>
                                            <label><input type="checkbox" checked data-column="18">Loan Amount Paid</label>
                                            <label><input type="checkbox" checked data-column="19">Loan Balance</label>
                                        </div>
                                </div>
                        </div>
                </div>
                <div class="portlet-body">
                <div class="portlet-body dark_green" style="color:#000000">
                                    <div class="well dark_green">
                                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                        <table class="table table-striped table-bordered table-hover table-full-width" id="sample_2">
                        <thead>
                        <tr>
                            <th>Member No</th>
                            <th>Member Name</th>
                            <th>ID No</th>
                            <th>Phone No.</th>
                            <th>Loan Type</th>
                            <th>Date of Application</th>
                            <th>Date of Disbursement</th>
                            <th>Expected Date of Last Repayment</th>
                            <th>Principle</th>
                            <th>Principle Paid</th>
                            <th>Prinicple Bal</th>
                            <th>Extra Fee Amount</th>
                            <th>Extra Fee Paid</th>
                            <th>Extra Fee Bal</th>
                            <th>Loan Interest Amount</th>
                            <th>Loan Interest Paid</th>
                            <th>Loan Interest Balance</th>
                            <th>Loan Amount</th>
                            <th>Loan Amount Paid</th>
                            <th>Loan Balance</th>
                        </tr>
                        </thead>
                        <tbody>';
    $sum = 0;
    $tsum = 0;
    $mqry = mysql_query('select * from newmember where status="' . base64_encode('active') . '"') or die(mysql_error());
    while ($ger = mysql_fetch_array($mqry)) {

        $qry = mysql_query('select * from loanapplication where membernumber="' . ($ger['membernumber']) . '" and status="' . base64_encode('active') . '"') or die(mysql_error());
        while ($row = mysql_fetch_array($qry)) {
            $lastDatePayment = lastDateOfPayment($row['transactionid']);
            echo '<tr><td>' . base64_decode($row['membernumber']) . '</td>
            <td>' . getMembername($row['membernumber']) . '</td>
            <td>' . base64_decode($ger['idnumber']) . '</td>
                <td>' . base64_decode($ger['mobileno']) . '</td>
            <td>' . (loanname($row['transactionid'])) . '</td>
                <td>' . date('d-M-Y', base64_decode($row['appdate'])) . '</td>
                <td>' . dateOfDbrs($row['transactionid']) . '</td><td>' . date('d-M-Y', ($lastDatePayment)) . '</td>
           <td>' . getsymbol() . ' ' . number_format(round(amountpaid($row['transactionid']))) . '</td>
           <td>' . getsymbol() . ' ' . number_format(round(addloanamoutpaid($row['transactionid']))) . '</td>
           <td>' . getsymbol() . ' ' . number_format(round(principlepaid($row['transactionid']))) . '</td>
           <td>' . getsymbol() . ' ' . number_format(round(getextrafee($row['transactionid']))) . '</td>
           <td>' . getsymbol() . ' ' . number_format(round(addextrafeepaid($row['transactionid']))) . '</td>
           <td>' . getsymbol() . ' ' . number_format(round(extrafeebalance($row['transactionid']))) . '</td>
           <td>' . getsymbol() . ' ' . number_format(round(totalloanint($row['transactionid']))) . '</td>
           <td>' . getsymbol() . ' ' . number_format(round(addinterestpaid($row['transactionid']))) . '</td>
           <td>' . getsymbol() . ' ' . number_format(round(interestbalance($row['transactionid']))) . '</td>
           <td>' . getsymbol() . ' ' . number_format(round(totalloantakens($row['transactionid']))) . '</td>
       <td>' . getsymbol() . ' ' . number_format(round(addfulloanamoutpaid($row['transactionid']))) . '</td>
     <td>' . getsymbol() . ' ' . number_format(round(fullremainingloanreport($row['transactionid']))) . '</td>';

            $sum2+=amountpaid($row['transactionid']);
            $sum3+=totalloanint($row['transactionid']);
            $sum33+=addinterestpaid($row['transactionid']);
            $sum333+=interestbalance($row['transactionid']);
            $sumcc1+=getextrafee($row['transactionid']);
            $sumdd1+=addextrafeepaid($row['transactionid']);
            $sumee1+=extrafeebalance($row['transactionid']);
            $sum4+=totalloantakens($row['transactionid']);
            $sum5+=fullremainingloanreport($row['transactionid']);
            $sum6+=addloanamoutpaid($row['transactionid']);
            $sum9+=addfulloanamoutpaid($row['transactionid']);
            $sum7+=principlepaid($row['transactionid']);
            // $lastt+=lastpaya($row['membernumber'], $row['transactionid'], base64_decode($row['loantype']));

            left($row['membernumber'], $row['transactionid']);
        }
    }
    echo '</tbody><tfoot><tr><td></td><td></td><td></td><td></td><td></td><td></td><td colspan=""></td><td>Total</td><td>' . getsymbol() . ' ' . number_format(round($sum2)) . '</td>
        <td>' . getsymbol() . ' ' . number_format(round($sum6)) . '</td>'
    . '<td>' . getsymbol() . ' ' . number_format(round($sum7)) . '</td>'
    . '<td>' . getsymbol() . ' ' . number_format(round($sumcc1)) . '</td>'
    . '<td>' . getsymbol() . ' ' . number_format(round($sumdd1)) . '</td>'
    . '<td>' . getsymbol() . ' ' . number_format(round($sumee1)) . '</td>'
    . '<td>' . getsymbol() . ' ' . number_format(round($sum3)) . '</td>'
    . '<td>' . getsymbol() . ' ' . number_format(round($sum33)) . '</td>'
    . '<td>' . getsymbol() . ' ' . number_format(round($sum333)) . '</td>'
    . '<td>' . getsymbol() . ' ' . number_format(round($sum4)) . '</td>
        <td>' . getsymbol() . ' ' . number_format(round($sum9)) . '</td>
        <td>' . getsymbol() . ' ' . number_format(round($sum5)) . '</td></tr></tfoot></table>';

    echo '';
}

function interestbalance($tid) {

    $intr = totalloanint($tid) - addinterestpaid($tid);

    return $intr;
}

function lastdates($mno) {

    $kir = mysql_query("select * from membercontribution where memberno='" . ($mno) . "' and transaction='" . base64_encode('Normal Loan') . "' order by primarykey desc ") or die(mysql_error());
    while ($rip = mysql_fetch_array($kir)) {

        $cuz = base64_decode($rip['date']);
    }

    return $cuz;
}

function slastdates($mno, $loan) {

    $kir = mysql_query("select * from membercontribution where memberno='" . ($mno) . "' and transaction='" . base64_encode(getloangl($loan)) . "' order by primarykey desc limit 1") or die(mysql_error());
    while ($rip = mysql_fetch_array($kir)) {

        $cuz = base64_decode($rip['date']);
    }

    return $cuz;
}

function lastpaya($mno, $loan) {

    $kir = mysql_query("select * from membercontribution where memberno='" . ($mno) . "' and transaction='" . base64_encode(getloangl($loan)) . "' order by primarykey desc limit 1") or die(mysql_error());
    while ($rip = mysql_fetch_array($kir)) {

        $cuz = base64_decode($rip['amount']);
    }

    return $cuz;
}

function lastpay($mno) {

    $kir = mysql_query("select * from membercontribution where memberno='" . ($mno) . "' and transaction='" . base64_encode('member shares') . "' order by primarykey desc limit 1") or die(mysql_error());
    while ($rip = mysql_fetch_array($kir)) {

        $cuz = base64_decode($rip['amount']);
    }

    return $cuz;
}

function lastdate($mno) {

    $kir = mysql_query("select * from membercontribution where memberno='" . ($mno) . "' and transaction='" . base64_encode('member shares') . "' order by primarykey desc limit 1") or die(mysql_error());
    while ($rip = mysql_fetch_array($kir)) {

        $cuz = base64_decode($rip['date']);
    }

    return $cuz;
}

function left($mno, $tid) {
    $jzz = mysql_query('select * from loanbal where mno="' . $mno . '"');
    $result = mysql_fetch_array($jzz);
    if ($result) {
        $ins = mysql_query('update loanbal set bal="' . base64_encode(remainingloan($tid)) . '" where id="' . $result['id'] . '"');
    } else {
        $sidung = mysql_query('insert into loanbal values ("", "' . $mno . '", "' . $tid . '","' . base64_encode(remainingloan($tid)) . '")') or die(mysql_error());
    }
}

function available() {

    echo '<div id="mt"> <table class="table table-striped table-bordered table-hover table-full-width" id="sample_2">
   
    <thead>
   <tr><th colspan="4"><h3 align="center"><b> All Member Balance Statement   </b></h3></th></tr> 
 <tr>
    <th>Member Number</th>
    <th>Member Name</th>
    <th>Actual Balance</th>
    <th>Available Balance</th>
    </tr>
</thead><tbody>';
    $sum = 0;
    $mqry = mysql_query('select * from newmember where status="' . base64_encode("active") . '"') or die(mysql_error());
    while ($row = mysql_fetch_array($mqry)) {

        echo '<tr><td>' . base64_decode($row['membernumber']) . '</td>';
        echo '<td>' . getMembername($row['membernumber']) . '</td>';
        echo '<td>' . getsymbol() . ' ' . number_format(sumtotalforamember(base64_decode($row['membernumber'])), 2) . '</td>';
        echo '<td>' . getsymbol() . ' ' . number_format(sumbalforamember(base64_decode($row['membernumber'])), 2) . '</td></tr>';
        $sum+=sumtotalforamember(base64_decode($row['membernumber']));
        $psum+=sumbalforamember(base64_decode($row['membernumber']));
    }

    echo '</tbody><tfoot><tr><td colspan="1"></td><td>Total</td><td>' . getsymbol() . ' ' . number_format($sum, 2) . '</td><td>' . getsymbol() . ' ' . number_format($psum, 2) . '</td></tr></tfoot></table></div>';

    save($sum, $psum);

    echo '<div class="col-md-4"><button class="btn green"value="Print this page" onClick="return printResults()">Print</button></div>';
}

function paymentinadjust($mno) {
    $adqry = mysql_query('select * from paymentin where  paymentype="' . base64_encode("adjustments") . '" and payeeid="' . base64_encode($mno) . '"') or die(mysql_error());
    while ($row2 = mysql_fetch_array($adqry)) {

        $adj = $row2['amount'];
        $adjj+=base64_decode($adj);
    }
    return $adjj;
}

function paymentinadjusts($mno, $datefrom, $dateto) {
    $start = new DateTime($datefrom);
    $end = new DateTime($dateto);
    $end->modify('+1 day');
    $interval = new DateInterval('P1D');
    $daterange = new DatePeriod($start, $interval, $end);


    $adqry = mysql_query('select * from paymentin where  paymentype="' . base64_encode("adjustments") . '" and payeeid="' . base64_encode($mno) . '"') or die(mysql_error());
    while ($row2 = mysql_fetch_array($adqry)) {
        foreach ($daterange as $date) {
            $dates = $date->format('d-M-Y');
            if ($row['date'] == base64_encode($dates)) {
                $adj = $row2['amount'];
                $adjj+=base64_decode($adj);
            }
        }
    }
    return $adjj;
}

function summports($datefrom, $dateto) {

    echo '<div id="mt"><table  class="table table-striped  table-bordered table-hover"  id="sample_2">
    
    <thead>
    <tr><th colspan="11"><h3 align="center"><b> Summary Statement   </b></h3></th></tr>
    <tr>
    <th>Member No</th>
    <th>Name</th>
    
   <th>' . getGlname(getdefaultsavingsaccount()) . '</th>
    <th>' . getGlname(getdefaultsharesaccount()) . '</th>';
    $mqryc = mysql_query('select * from loansettings where status="' . base64_encode("Active") . '"') or die(mysql_error());
    while ($rrr = mysql_fetch_array($mqryc)) {

        echo '<th>' . base64_decode($rrr['lname']) . '</th>';
    }

    echo'</tr>
</thead><tbody>';
    $sum = 0;
    $mqry = mysql_query('select * from newmember where status="' . base64_encode("active") . '" order by primarykey') or die(mysql_error());
    while ($row = mysql_fetch_array($mqry)) {

        echo '<tr><td>' . base64_decode($row['membernumber']) . '</td>';
        echo '<td>' . getMembername($row['membernumber']) . '</td>';
///  compshare  comsaving
        echo '<td>' . number_format(comsavings(base64_decode($row['membernumber']), $datefrom, $dateto) - paymentinadjusts(base64_decode($row['membernumber']), $datefrom, $dateto), 2) . '</td>';
        echo '<td>' . number_format(compshare(base64_decode($row['membernumber'])), 2) . '</td>';

        $mqryd = mysql_query('select * from loansettings where status="' . base64_encode("Active") . '"') or die(mysql_error());
        while ($ccc = mysql_fetch_array($mqryd)) {

            echo '<td>' . number_format(loanalls(base64_decode($row['membernumber']), $ccc['id'], $datefrom, $dateto), 2) . '</td>';
        }
    }
    echo'</tbody></table></div>';
}

function summport() {
    echo '<div class="portlet box green">
                <div class="portlet-title">
                        <div class="caption">
                                <i class="fa fa-globe"></i>Summary Statement
                        </div>
                        <div class="actions">
                                <div class="btn-group">
                                        <a class="btn default" href="#" data-toggle="dropdown">
                                                 Columns <i class="fa fa-angle-down"></i>
                                        </a>
                                        <div id="sample_2_column_toggler" class="dropdown-menu hold-on-click dropdown-checkboxes pull-right">
                                                <label><input type="checkbox" checked data-column="0">Member No</label>
                                                <label><input type="checkbox" checked data-column="1">Name</label>
                                                <label><input type="checkbox" checked data-column="2">' . getGlname(getdefaultsavingsaccount()) . '</label>
                                                <label><input type="checkbox" checked data-column="3">' . getGlname(getdefaultsharesaccount()) . '</label>';
                                                 $mqryc = mysql_query('select * from loansettings where status="' . base64_encode("Active") . '"') or die(mysql_error());
                                                $i = 4;
                                                 while ($rrr = mysql_fetch_array($mqryc)) {

                                                    echo '<label><input type="checkbox" checked data-column="'.$i.'">' . base64_decode($rrr['lname']) . '</label>';
                                                    $i += 1;
                                                }
                                                echo '</div>
                                </div>
                        </div>
                </div>
                <div class="portlet-body">
                <div class="portlet-body dark_green" style="color:#000000">
                                    <div class="well dark_green">
                                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                        <table class="table table-striped table-bordered table-hover table-full-width" id="sample_2">
                        <thead>
                        <tr>
                                <th>
                                         Member No
                                </th>
                                <th>
                                         Name
                                </th>
                                <th class="hidden-xs">
                                         ' . getGlname(getdefaultsavingsaccount()) . '
                                </th>
                                <th class="hidden-xs">
                                         ' . getGlname(getdefaultsharesaccount()) . '
                                </th>';
                                $mqryc = mysql_query('select * from loansettings where status="' . base64_encode("Active") . '"') or die(mysql_error());
                                $i = 4;
                                 while ($rrr = mysql_fetch_array($mqryc)) {

                                    echo '<th class="hidden-xs">' . base64_decode($rrr['lname']) . '</th>';
                                    $i += 1;
                                }
                                echo '</tr>
                        </thead>
                        <tbody>';
    $sum = 0;
    $mqry = mysql_query('select * from newmember where status="' . base64_encode("active") . '" order by primarykey') or die(mysql_error());
    while ($row = mysql_fetch_array($mqry)) {

        echo '<tr><td>' . base64_decode($row['membernumber']) . '</td>';
        echo '<td>' . getMembername($row['membernumber']) . '</td>';
///  compshare  comsaving
        echo '<td>' . number_format(comsaving(base64_decode($row['membernumber'])) - paymentinadjust(base64_decode($row['membernumber'])), 2) . '</td>';
        echo '<td>' . number_format(compshare(base64_decode($row['membernumber'])), 2) . '</td>';

        $mqryd = mysql_query('select * from loansettings where status="' . base64_encode("Active") . '"') or die(mysql_error());
        while ($ccc = mysql_fetch_array($mqryd)) {

            echo '<td>' . number_format(loanall(base64_decode($row['membernumber']), $ccc['id']), 2) . '</td>';
        }
    }
echo'</tbody>
                    </table>';
}

function loanall($membernumber, $lid) {
    $sum = 0;
    $qry = mysql_query('select * from loanapplication where membernumber="' . base64_encode($membernumber) . '" and loantype="' . base64_encode($lid) . '" and status="' . base64_encode('active') . '"') or die(mysql_error());
    while ($row = mysql_fetch_array($qry)) {
        $sum = fullremainingloanreport($row['transactionid']);
    }
    return $sum;
}

function loanalls($membernumber, $lid, $datefrom, $dateto) {
    $start = new DateTime($datefrom);
    $end = new DateTime($dateto);
    $end->modify('+1 day');
    $interval = new DateInterval('P1D');
    $daterange = new DatePeriod($start, $interval, $end);
    $sum = 0;


    $qry = mysql_query('select * from loanapplication where membernumber="' . base64_encode($membernumber) . '" and loantype="' . base64_encode($lid) . '" and status="' . base64_encode('pending') . '"') or die(mysql_error());
    while ($row = mysql_fetch_array($qry)) {
        foreach ($daterange as $date) {
            $dates = $date->format('d-M-Y');
            if ($row['date'] == base64_encode($dates)) {
                $sum = fullremainingloanreport($row['transactionid']);
            }
        }
    }
    return $sum;
}

function extracash($tid) {
    $one = 0;
    $qry = mysql_query('select * from extracash where transactionid="' . $tid . '"') or die(mysql_error());
    while ($rslt = mysql_fetch_array($qry)) {
        $one+=base64_decode($rslt['amount']);
    }
    return round($one);
}

function fullremainingloanreport($tid) {
    $rem = totalloantakens($tid) - addfulloanamoutpaid($tid);
    return $rem;
}

function totalloantakens($tid) {
    $loanqry = mysql_query('select * from loans where transid="' . $tid . '"') or die(mysql_error());
    $loanrslt = mysql_fetch_array($loanqry);
    $amount = base64_decode($loanrslt['amount']) + totalloanint($tid) + extracash($tid);
    return round($amount);
}

function dabodabo($mno) {
    $dabo = mysql_query('select * from loanbal where mno="' . base64_encode($mno) . '"') or die(mysql_error());
    while ($res = mysql_fetch_array($dabo)) {
        $bal = base64_decode($res['bal']);
    }
    $trabo = mysql_query('select * from guarantors where guarantorno="' . base64_encode($mno) . '" and status="' . base64_encode("granted") . '" and guarantorno!=memberno') or die(mysql_error());
    while ($ses = mysql_fetch_array($trabo)) {
        $bal+= base64_decode($ses['sharesoffered']);
    }

    $qry = mysql_query('select * from paymentin where payeeid="' . base64_encode($mno) . '" and paymentype="' . base64_encode("share transfer") . '"') or die(mysql_error());
    while ($ro1w = mysql_fetch_array($qry)) {
        $bal = base64_decode($ro1w['amount']);
    }
    /*
      $newby = mysql_query('select * from sharesbf where memberno="' . base64_encode($mno) . '" and status="' . base64_encode("active") . '"') or die(mysql_error());
      while ($aes = mysql_fetch_array($newby)) {
      $bal= base64_decode($aes['loanbf']);
      }
     */

    return $bal;
}

function sumbalforamember($membernumber) {

    $bal1 = sumtotalforamember($membernumber) - (benev() + minacbal());

    $trabo = mysql_query('select * from guarantors where guarantorno="' . base64_encode($membernumber) . '" and status="' . base64_encode("granted") . '" and guarantorno!=memberno') or die(mysql_error());
    while ($ses = mysql_fetch_array($trabo)) {
        $minus+= base64_decode($ses['sharesoffered']);
    }

    $bal = $bal1 - $minus;

    return $bal;
}

function sumtotalforamember($membernumber) {
    $sum = 0;

    $qry = mysql_query('select * from membercontribution where memberno="' . base64_encode($membernumber) . '" and transaction="' . base64_encode(getdefaultsavingsaccount()) . '"    ') or die(mysql_errno());
    while ($row = mysql_fetch_array($qry)) {
        $sum+=base64_decode($row['amount']);
    }


    $share = mysql_query('select * from sharesbf where memberno="' . base64_encode($membernumber) . '" and status="' . base64_encode("active") . '"  ') or die(mysql_error());
    while ($find = mysql_fetch_array($share)) {
        $sum+= base64_decode($find['sharesbf']);
    }


    return $sum;
}

function juma($membernumber) {

    $jzz = mysql_query('select * from balances where membernumber="' . base64_encode($membernumber) . '"');
    $result = mysql_fetch_array($jzz);
    if ($result) {
        $ins = mysql_query('update balances set actual="' . base64_encode(sumtotalforamember($membernumber)) . '", available="' . base64_encode(sumbalforamember($membernumber)) . '" where primarykey="' . $result['primarykey'] . '"');
    } else {
        $ins = mysql_query('insert into balances values ("", "' . base64_encode($membernumber) . '", "' . base64_encode(sumtotalforamember($membernumber)) . '", "' . base64_encode(sumbalforamember($membernumber)) . '", "' . base64_encode(date("d-M-Y")) . '")') or die(mysql(error()));
    }
}

function active($membernumber) {

    $jzz = mysql_query('select * from balances where membernumber="' . base64_encode($membernumber) . '"');
    $result = mysql_fetch_array($jzz);
    if ($result) {
        $ins = mysql_query('update balances set actual="' . base64_encode(sumtotalforamember($membernumber)) . '", available="' . base64_encode(sumbalforamember($membernumber)) . '", realdate="' . base64_encode(date("d-M-Y")) . '" where primarykey="' . $result['primarykey'] . '"');
    } else {
        $ins = mysql_query('insert into balances values ("", "' . base64_encode($membernumber) . '", "' . base64_encode(sumtotalforamember($membernumber)) . '", "' . base64_encode(sumbalforamember($membernumber)) . '", "' . base64_encode(date("d-M-Y")) . '")') or die(mysql(error()));
    }
}

function save($sum, $psum) {

    $save = mysql_query('insert into totals values ("", "' . base64_encode($psum) . '", "' . base64_encode($sum) . '", "' . base64_encode(date("d-M-Y")) . '", "' . base64_encode(date("H:i:s")) . '")') or die(mysql_error());
}

function querytotal($membernumber) {
    $sum = 0;
    $qry = mysql_query('select * from membercontribution where memberno="' . base64_encode($membernumber) . '"  AND  transaction="' . base64_encode(getdefaultsavingsaccount()) . '"  ') or die(mysql_errno());
    while ($row = mysql_fetch_array($qry)) {
        $sum+= base64_decode($row['amount']);
    }

    $qmy = mysql_query('select * from guarantors where guarantorno="' . base64_encode($membernumber) . '"') or die(mysql_errno());
    while ($row = mysql_fetch_array($qmy)) {
        $sim+=base64_decode($row['sharesoffered']);
    }

    return $sum - $sim;
}

function selfguarantor($mno, $amount, $balance, $tid) {

    if ($amount <= $balance) {
        $chqry = mysql_query('select * from guarantors where memberno="' . base64_encode($mno) . '" and guarantorno="' . base64_encode($mno) . '" and transactionid="' . base64_encode($tid) . '"') or die(mysql_error());
        if (mysql_num_rows($chqry) >= 1) {
            echo '<span class="red" >Guarantor details have been captured already</span>';
        } else {

            $gur = mysql_query('insert into guarantors values("' . base64_encode($mno) . '","' . base64_encode($mno) . '",
                "' . base64_encode($amount) . '","' . base64_encode(date("d-M-Y")) . '","' . base64_encode("self guarantor") . '",
                    "","' . base64_encode($tid) . '","' . base64_encode("granted") . '")') or die(mysql_error());
        }
    } else {

        $chery = mysql_query('select * from guarantors where memberno="' . base64_encode($mno) . '" and guarantorno="' . base64_encode($mno) . '" and transactionid="' . base64_encode($tid) . '"') or die(mysql_error());
        if (mysql_num_rows($chqry) >= 1) {
            echo '<span class="red" >Guarantor details have been captured already</span>';
        } else {

            $qqq = mysql_query('insert into guarantors values("' . base64_encode($mno) . '","' . base64_encode($mno) . '",
                "' . base64_encode($balance) . '","' . base64_encode(date("d-M-Y")) . '","' . base64_encode("self guarantor") . '",
                    "","' . base64_encode($tid) . '","' . base64_encode("granted") . '")') or die(mysql_error());
        }
    }

    if ($chqry) {
        echo '<span class="green" >Proceed to complete Loan.</span></br>';
    }
    if ($chery) {
        echo '<span class="green" >Proceed to add Guarantors</span></br>';
    }
}

function vehiclestatement($user, $regno, $datefrom, $dateto) {
    $oqry = mysql_query('select * from newvehicle where vehicleregno="' . base64_encode($regno) . '"') or die(mysql_error());
    if (mysql_num_rows($oqry) == 1) {
        $bubu = mysql_fetch_array($oqry);
        $mno = base64_decode($bubu['memberno']);
//$datefrom = $dfrom . '-' . $mfrom . '-' . $yfrom;
//$dateto = $dto . '-' . $mto . '-' . $yto;
//start date 2001-02-23
        /* $sm = date("m", strtotime($mfrom));
          $sd = $dfrom;
          $sy = $yfrom;
          //
          //$tm = date("m", strtotime($mto));
          $tm = date("m", strtotime($mto));
          //$td = $dto;
          $td = $dto;
          //$ty = $yto;
          $ty = $yto;

          $stt = mktime(0, 0, 0, $tm, $dto, $yto);
          $ddto = date("d", $stt);
          $mmto = date("M", $stt);
          $yyto = date("Y", $stt);
         */
//utc of start and end dates
        $s = strtotime($datefrom);
//$e=mktime(0,0,0,$em, $ed, $ey);
        $t = strtotime($dateto);
        if ($t < $s) {
            echo '<span class="red" >Sorry Please enter search dates correctly</span></br>';
        } else {
            echo '<table  class="table table-striped  table-bordered table-hover sorting_asc_disabled"  id="sample_2">
                <tr><th colspan="5">' . compname() . '</th></tr>
                   <tr><th>Date</th><th>Registration Number</th><th>Member Number</th><th>Member Name</th><th>Total Member Contribution</th></tr>
        <tr><td>' . $datefrom . ' to ' . $dateto . '</td><td>' . $regno . '</td><td>' . $mno . '</td><td>' . getMembername(base64_encode($mno)) . '</td><td>' . getsymbol() . '.' . number_format(balancestatement($user, $mno, $dfrom, $mfrom, $yfrom, $dto, $mto, $yto), 2) . '</td></tr>

</tr>
        <tr><th colspan="5">STATEMENT OF ACCOUNT</th></tr>
        <tr><th>Date</th><th>Date From - Date To</th><th>Transaction</th><th>Money out</th><th>Money in</th></th>
        <tr><th>' . $dateto . '</th><td></td><td>Balance BF</td><td></td><td>' . getsymbol() . '.' . number_format(vehbbf($user, $regno, $mno, $dateto), 2) . '</td></tr>';
            while ($s <= $t) {
//echo date("d-M-Y", $s).'</br>';
                vehstatementin(date("d-M-Y", $s), $regno);
                vehstatementout(date("d-M-Y", $s), $regno);

                $s = $s + 86400; //increment date by 86400 seconds(1 day)
            }
            echo '<tr><th>Single Vehicle Total</th><td></td><td></td><td>' . getsymbol() . '.' . number_format(vehsharetotaout($user, $regno, $mno, $datefrom, $dateto), 2) . '</td>
        <td>' . getsymbol() . '.' . number_format(vehsumstatementin($_SESSION['users'], $regno, $mno, $datefrom, $dateto), 2) . '</td></tr>
            <tr><th>Single Vehicle Balance</th><td></td><td></td><td colspan="2"><center>' . getsymbol() . '.' . number_format(vehbalancestatement($user, $regno, $mno, $datefrom, $dateto), 2) . '</center></td></tr>

        </table>';
//<tr><th>Net Balance</th><td></td><td colspan="2"><center>' . getsymbol() . '.' . number_format(netstatementbl($user, $mno, $dfrom, $mfrom, $yfrom, $dto, $mto, $yto), 2) . '</center></td></tr>
        }
    } else {
        echo '<span class="red" >Sorry Vehicle not found</span></br>';
    }
    echo '<div class="col-md-2"><div class="noprint"><button class="btn green"value="Print this page" onclick="print()">Print</button></div></div>';
}

function vehiclestate($user, $regno, $dfrom, $mfrom, $yfrom, $dto, $mto, $yto) {
    $mqry = mysql_query('select * from newvehicle where vehicleregno="' . base64_encode($regno) . '"') or die(mysql_error());
    if (mysql_num_rows($mqry) == 1) {
        $ddd = mysql_fetch_array($mqry);
        $mno = base64_decode($ddd['memberno']);
        $t = mktime(0, 0, 0, date("m"), date("d"), date("Y"));
        $s = mktime(0, 0, 0, date("m"), date("d"), date("Y"));
        $st = mktime(0, 0, 0, date("m"), date("d"), date("Y"));
        $stt = mktime(0, 0, 0, date("m"), date("d"), date("Y"));
        $ddto = date("d", $stt);
        $mmto = date("M", $stt);
        $yyto = date("Y", $stt);
        $dfrom = date("d", $st);
        $mfrom = date("M", $st);
        $yfrom = date("Y", $st);
        $dto = date("d");
        $mto = date("M");
        $yto = date("Y");
        if ($t < $s) {
            echo '<span class="red" >Sorry Please enter search dates correctly</span></br>';
        } else {
            echo '<table  class="table table-striped  table-bordered table-hover sorting_asc_disabled"  id="sample_2">
                 <tr><th colspan="4">' . compname() . '</th></tr>
                   <tr><th>Date</th><th>Member Number</th><th>Member Name</th><th>Total</th></tr>
        <tr><td>' . $dfrom . '-' . $mfrom . '-' . $yfrom . ' to ' . $dto . '-' . $mto . '-' . $yto . '</td><td>' . $mno . '</td><td>' . getMembername(base64_encode($mno)) . '</td><td>' . getsymbol() . '.' . number_format(balancestatement($user, $mno, $dfrom, $mfrom, $yfrom, $dto, $mto, $yto), 2) . '</td></tr>

</tr>
        <tr><th colspan="4">STATEMENT OF ACCOUNT</th></tr>
        <tr><th>Date</th><th>Transaction</th><th>Money out</th><th>Money in</th></th>
        <tr><th>' . $ddto . '-' . $mmto . '-' . $yyto . '</th><td>Balance BF</td><td></td><td>' . getsymbol() . '.' . number_format(vehbbf($user, $regno, $mno, $ddto, $mto, $yto), 2) . '</td></tr>';
            while ($s <= $t) {
                vehstatementin(date("d-M-Y", $s), $regno);
                vehstatementout(date("d-M-Y", $s), $regno);

                $s = $s + 86400; //increment date by 86400 seconds(1 day)
            }
            echo '<tr><th>Total</th><td></td><td>' . getsymbol() . '.' . number_format(vehsharetotaout($user, $regno, $mno, $dfrom, $mfrom, $yfrom, $dto, $mto, $yto), 2) . '</td>
        <td>' . getsymbol() . '.' . number_format(vehsumstatementin($user, $regno, $mno, $dfrom, $mfrom, $yfrom, $dto, $mto, $yto), 2) . '</td></tr>
            <tr><th>Balance</th><td></td><td colspan="2"><center>' . getsymbol() . '.' . number_format(vehbalancestatement($user, $regno, $mno, $dfrom, $mfrom, $yfrom, $dto, $mto, $yto), 2) . '</center></td></tr>

        </table>';
//<tr><th>Net Balance</th><td></td><td colspan="2"><center>' . getsymbol() . '.' . number_format(netstatementbl($user, $mno, $dfrom, $mfrom, $yfrom, $dto, $mto, $yto), 2) . '</center></td></tr>
        }
    } else {
        echo '<span class="red" >Sorry Vehicle not found</span></br>';
    }
}

function vehstatementin($date, $regno) {
    $qry = mysql_query('select * from membercontribution where vehicleregno="' . base64_encode($regno) . '" and date="' . base64_encode($date) . '"') or die(mysql_error());
    if (mysql_num_rows($qry) >= 1) {
        while ($row = mysql_fetch_array($qry)) {
            echo '<tr><td><center>' . base64_decode($row['date']) . '</center></td><td>' . base64_decode($row['datefrom']) . ' TO ' . base64_decode($row['dateto']) . '</td><td>' . base64_decode($row['transaction']) . '</td><td>' . getsymbol() . '.0.00</td><td>' . getsymbol() . '.' . number_format(amount($row['amount']), 2) . '</td></tr>';
        }
    }
}

function vehstatementout($date, $regno) {
    $acnaqry = mysql_query('select * from accounts where actype="' . base64_encode("Fines") . '"') or die(mysql_error());
    while ($row1 = mysql_fetch_array($acnaqry)) {
        $qry = mysql_query('select * from paymentin where transname="' . $row1['acname'] . '" and payeeid="' . base64_encode($mno) . '" and date="' . base64_encode($date) . '"') or die(mysql_error());
        while ($row = mysql_fetch_array($qry)) {
            echo '<tr><td><center>' . base64_decode($row['date']) . '</center></td><td></td><td></td><td>' . base64_decode($row['transname']) . '</td><td>' . getsymbol() . '.' . number_format(amount($row['amount']), 2) . '</td><td>' . getsymbol() . '.0.00</td></tr>';
        }
    }
    $adqry = mysql_query('select * from paymentin where  paymentype="' . base64_encode("adjustments") . '" and payeeid="' . base64_encode($mno) . '" and date="' . base64_encode($date) . '"') or die(mysql_error());
    while ($row2 = mysql_fetch_array($adqry)) {
        echo '<tr><td><center>' . base64_decode($row2['date']) . '</center></td><td></td><td></td><td>' . base64_decode($row2['transname']) . '</td><td>' . getsymbol() . '.' . number_format(amount($row2['amount']), 2) . '</td><td>' . getsymbol() . '.0.00</td></tr>';
    }

    $acnaqr = mysql_query('select * from accounts where actype="' . base64_encode("Loan Repayment") . '"') or die(mysql_error());
    while ($lrslt = mysql_fetch_array($acnaqr)) {
        $qry = mysql_query('select * from membercontribution where vehicleregno="' . base64_encode($regno) . '" and transaction="' . $lrslt['acname'] . '" and date="' . base64_encode($date) . '"') or die(mysql_error());
        if (mysql_num_rows($qry) >= 1) {
            while ($row = mysql_fetch_array($qry)) {
                echo '<tr><td><center>' . base64_decode($row['date']) . '</center></td><td>' . base64_decode($row['datefrom']) . ' TO ' . base64_decode($row['dateto']) . '</td><td>' . base64_decode($row['transaction']) . '</td><td>' . getsymbol() . '.' . number_format(amount($row['amount']), 2) . '</td><td>' . getsymbol() . '.0.00</td></tr>';
            }
        }
    }
}

function vehsharetotaout($user, $regno, $mno, $datefrom, $dateto) {
    $total = vehsumstatementadju($user, $regno, $mno, $datefrom, $dateto) + vehsumstatementous($user, $regno, $mno, $datefrom, $dateto);
    return $total;
}

function vehsumstatementadju($user, $regno, $mno, $datefrom, $dateto) {

    $s = strtotime($datefrom);
//$e=mktime(0,0,0,$em, $ed, $ey);
    $t = strtotime($dateto);
    $sum = 0;
    while ($s <= $t) {
        $qry = mysql_query('select * from paymentin where   paymentype="' . base64_encode("adjustments") . '" and payeeid="' . base64_encode($mno) . '" and date="' . base64_encode(date("d-M-Y", $s)) . '"') or die(mysql_error());

        while ($row = mysql_fetch_array($qry)) {
            $sum+=base64_decode($row['amount']);
        }

        $s = $s + 86400; //increment date by 86400 seconds(1 day)
    }
    return $sum;
}

function vehsumstatementous($user, $regno, $mno, $datefrom, $dateto) {

    $s = strtotime($datefrom);
//$e=mktime(0,0,0,$em, $ed, $ey);
    $t = strtotime($dateto);
    $sum = 0;
    while ($s <= $t) {
        $acnaqry = mysql_query('select * from accounts where actype="' . base64_encode("Fines") . '"') or die(mysql_error());
        while ($row1 = mysql_fetch_array($acnaqry)) {
            $qry = mysql_query('select * from paymentin where transname="' . $row1['acname'] . '" and payeeid="' . base64_encode($mno) . '" and date="' . base64_encode(date("d-M-Y", $s)) . '"') or die(mysql_error());

            while ($row = mysql_fetch_array($qry)) {
                $sum+=base64_decode($row['amount']);
            }
        }
        $acnaqr = mysql_query('select * from accounts where actype="' . base64_encode("Loan Repayment") . '"') or die(mysql_error());
        while ($lrslt = mysql_fetch_array($acnaqr)) {
            $qry = mysql_query('select * from membercontribution where vehicleregno="' . base64_encode($regno) . '" and transaction="' . $lrslt['acname'] . '" and date="' . base64_encode(date("d-M-Y", $s)) . '"') or die(mysql_error());
            if (mysql_num_rows($qry) >= 1) {
                while ($row = mysql_fetch_array($qry)) {
                    $sum+=base64_decode($row['amount']);
                }
            }
        }

        $s = $s + 86400; //increment date by 86400 seconds(1 day)
    }
    return $sum;
}

function vehsumstatementin($user, $regno, $mno, $datefrom, $dateto) {

    $s = strtotime($datefrom);

    $t = strtotime($dateto);
    $sum = 0;
    while ($s <= $t) {
//echo date("d-M-Y", $s).'</br>';
        $qry = mysql_query('select * from membercontribution where vehicleregno="' . base64_encode($regno) . '" and date="' . base64_encode(date("d-M-Y", $s)) . '"') or die(mysql_error());

        while ($row = mysql_fetch_array($qry)) {
            $sum+=base64_decode($row['amount']);
        }


        $s = $s + 86400; //increment date by 86400 seconds(1 day)
    }
    return $sum + vehshareinbf($user, $mno);
}

function vehbalancestatement($user, $regno, $mno, $datefrom, $dateto) {
    $balance = vehsumstatementin($user, $regno, $mno, $datefrom, $dateto) - vehsharetotaout($user, $regno, $mno, $datefrom, $dateto);
    return $balance;
}

function vehbbf($user, $regno, $dfrom, $mfrom, $yfrom) {
//date("m", strtotime($mfrom));
    $mmfrom = 1;
    $ddfrom = 1;
    $yyfrom = 2011;
//echo 'date to:'.$dto.'-'.$mto.'-'.$yto;
//end date 2001-03-14
//
    $dto = $dfrom;
    $mto = date("m", strtotime($mfrom));
    $yto = $yfrom;
    $balance = 0;
//utc of start and end dates
    $s = mktime(0, 0, 0, $sm, $sd, $sy);
//$e=mktime(0,0,0,$em, $ed, $ey);
// $t = mktime(0, 0, 0, $tm, $td, $ty);
// while ($s <= $t) {
    $balance = vehsumstatementin($user, $regno, $mno, $ddfrom, $mmfrom, $yyfrom, $dto, $mto, $yto) - vehsharetotaout($user, $regno, $mno, $ddfrom, $mmfrom, $yyfrom, $dto, $mto, $yto);
// }
    return $balance;
}

function vehshareinbf($user, $mno) {
    $qry = mysql_query('select * from sharesbf where memberno="' . base64_encode($mno) . '" and status="' . base64_encode("active") . '"') or die(mysql_error());
    $rslt = mysql_fetch_array($qry);
    return base64_decode($rslt['sharesbf']);
}

function vsumtotalforamember($veh) {
    $sum = 0;
    $qry = mysql_query('select * from membercontribution where vehicleregno LIKE "%' . base64_encode($veh) . '%" and transaction="' . base64_encode("member deposits") . '"') or die(mysql_errno());
    while ($row = mysql_fetch_array($qry)) {
        $sum+=base64_decode($row['amount']);
    }
    return $sum;
}

function vdeff() {

    echo '<table  class="table table-striped  table-bordered table-hover sorting_asc_disabled"  id="sample_2">
    <tr>
    <thead>
    <th>Member Number</th>
    <th>Member Name</th>
    <th>Number Plate</th>
    <th>Total Contribution</th>
</thead>
</tr>';
    $sum = 0;
    $mqry = mysql_query('select * from newvehicle where status="' . base64_encode("active") . '" order by memberno asc') or die(mysql_error());
    while ($row = mysql_fetch_array($mqry)) {

        echo '<tr><td>' . base64_decode($row['memberno']) . '</td>';
        echo '<td>' . getMembername($row['memberno']) . '</td>';
        echo '<td>' . base64_decode($row['vehicleregno']) . '</td>';
        echo '<td>' . getsymbol() . '.' . number_format(vsumtotalforamember(base64_decode($row['vehicleregno'])), 2) . '</td>';
        $sum+=vsumtotalforamember(base64_decode($row['vehicleregno']));
    }

    echo '<tr><td colspan="1"></td><td></td><td>Total</td><td>' . getsymbol() . '.' . number_format($sum, 2) . '</td></tr></table>';

    echo '<div class="col-md-2"><button class="btn green"value="Print this page" onclick="print()">Print</button></div>';
}

function avcheck($user, $mno) {

    $kir = mysql_query("select * from balances where membernumber='" . base64_encode($mno) . "'") or die(mysql_error());
    while ($rip = mysql_fetch_array($kir)) {

        $cuz = base64_decode($rip['available']);
    }

    return $cuz;
}

function loansupdate($user, $id, $lname, $ltype, $status, $ratetype, $rate, $appfee, $insfee, $min, $max, $comments, $maxg, $fyn, $maxloansave, $duration, $intersttype, $legalfee) {

// update data in mysql database
    $sql = "UPDATE loansettings SET lname='" . base64_encode($lname) . "', ltype='" . base64_encode($ltype) . "', status='" . base64_encode($status) . "' , ratetype='" . base64_encode($ratetype) . "', rate='" . base64_encode($rate) . "', loanappfee='" . base64_encode($appfee) . "', loaninsurance='" . base64_encode($insfee) . "', min='" . base64_encode($min) . "', max='" . base64_encode($max) . "', comments='" . base64_encode($comments) . "', maxgurantor='" . base64_encode($maxg) . "', fines='" . base64_encode($fyn) . "',maxloansave='" . base64_encode($maxloansave) . "', duration='" . base64_encode($duration) . "', interesttype='" . base64_encode($intersttype) . "',legalfees='" . base64_encode($legalfee) . "'   WHERE id='" . $id . "'";

    $result = mysql_query($sql);
    mysql_query($result);
// if successfully updated.
    if ($result) {
        $users = new Users();
        $activity = "updated loan settings for " . $lname;
        $users->audittrail($user, $activity, $user);


        $alertyes = '<script type="text/javascript">alert("Editing was Successful!");document.location.href="loansett.php";</script>';
        echo $alertyes;
    } else {
        $alert = '<script type="text/javascript">alert("Editing Failed!");document.location.href="loansett.php";</script>';
        echo $alert;
    }
}

function getratetype($id) {

    if ($id == "1") {

        return "Straight Line";
    } elseif ($id == "2") {

        return "Reducing Balance";
    } elseif ($id == "3") {
        return "Micro Finance ";
    } else {
        return "MFI";
    }
}

function getloaname($id) {

    $chmqry = mysql_query('select * from loansettings where id="' . ($id) . '"') or die(mysql_error());
    while ($looan = mysql_fetch_array($chmqry)) {

        return ((base64_decode($looan['lname'])));
    }
}

function getloangl($acname) {

    $chmqry = mysql_query('select * from glaccounts where acname="' . base64_encode($acname) . '"') or die(mysql_error());
    while ($looan = mysql_fetch_array($chmqry)) {

        return ($looan['id']);
    }
}

function getloanid($id) {

    $chmqry = mysql_query('select * from loansettings where lname="' . base64_encode($id) . '"') or die(mysql_error());
    while ($looan = mysql_fetch_array($chmqry)) {

        return ($looan['id']);
    }
}

function maxnoguarantors($id) {

    $chmqry = mysql_query('select * from loansettings where id="' . ($id) . '"') or die(mysql_error());
    while ($looan = mysql_fetch_array($chmqry)) {

        return base64_decode($looan['maxgurantor']);
    }
}

function getmax($id) {

    $chmqry = mysql_query('select * from loansettings where id="' . ($id) . '"') or die(mysql_error());
    while ($looan = mysql_fetch_array($chmqry)) {

        return base64_decode($looan['max']);
    }
}

function getmin($id) {

    $chmqry = mysql_query('select * from loansettings where id="' . ($id) . '"') or die(mysql_error());
    while ($looan = mysql_fetch_array($chmqry)) {

        return base64_decode($looan['min']);
    }
}

function getlafee($loanid) {

    $chmqry = mysql_query('select * from loansettings where id="' . $loanid . '"') or die(mysql_error());
    while ($looan = mysql_fetch_array($chmqry)) {

        return base64_decode($looan['loanappfee']);
    }
}

function getinsfee($loanid) {

    $chmqry = mysql_query('select * from loansettings where id="' . $loanid . '"') or die(mysql_error());
    while ($looan = mysql_fetch_array($chmqry)) {

        return base64_decode($looan['loaninsurance']);
    }
}

function getlegalfees() {

    $chmqry = mysql_query('select * from settings where id="1"') or die(mysql_error());
    while ($looan = mysql_fetch_array($chmqry)) {

        return base64_decode($looan['legalfees']);
    }
}

function sumtotalforpsv($membernumber) {
    $sum = 0;
    $qry = mysql_query('select * from membercontribution where memberno="' . base64_encode($membernumber) . '" and transaction="' . base64_encode("Xmas Savings") . '"') or die(mysql_errno());
    while ($row = mysql_fetch_array($qry)) {
        $sum+=base64_decode($row['amount']);
    }

    return $sum;
}

function psvjuma($membernumber) {

    $jzz = mysql_query('select * from psvbalances where membernumber="' . base64_encode($membernumber) . '"');
    $result = mysql_fetch_array($jzz);
    if ($result) {
        $ins = mysql_query('update psvbalances set psvbalance="' . base64_encode(sumtotalforpsv($membernumber)) . '", realdate="' . base64_encode(date("d-M-Y")) . '" where id="' . $result['id'] . '"');
    } else {
        $ins = mysql_query('insert into psvbalances values ("", "' . base64_encode($membernumber) . '", "' . base64_encode(sumtotalforpsv($membernumber)) . '", "' . base64_encode(date("d-M-Y")) . '")') or die(mysql(error()));
    }
}

function groupname($gname) {

    $jazz = mysql_query('select * from cgroup where id="' . ($gname) . '"');
    $result = mysql_fetch_array($jazz);
    return base64_decode($result['gname']);
}

function admingroup_name($id) {

    $adming = mysql_query('select * from usergroups where id="' . ($id) . '"');
    $result = mysql_fetch_array($adming);
    return base64_decode($result['user']);
}

function getaccname($id) {

    $joz = mysql_query('select * from accounts where id="' . ($id) . '"');
    $result = mysql_fetch_array($joz);
    return base64_decode($result['acname']);
}

function getaccgroup($acname) {

    $joz = mysql_query('select * from glaccounts where acname="' . base64_encode($acname) . '"');
    $result = mysql_fetch_array($joz);
    return base64_decode($result['accgroup']);
}

function getactype($id) {

    $joz = mysql_query('select * from accounts where id="' . base64_decode($id) . '"');
    $result = mysql_fetch_array($joz);
    return base64_decode($result['actype']);
}

function getaed() {

    $joz = mysql_query('select * from settings');
    $result = mysql_fetch_array($joz);
    return base64_decode($result['aed']);
}

function getusd() {

    $joz = mysql_query('select * from settings');
    $result = mysql_fetch_array($joz);
    return base64_decode($result['usd']);
}

function minidyna($user, $mno, $acc, $datefrom, $dateto) {
    $mqry = mysql_query('select * from newmember where membernumber="' . base64_encode($mno) . '" and status="' . base64_encode("active") . '"') or die(mysql_error());
    if (mysql_num_rows($mqry) == 1) {

        $s = strtotime($datefrom);
//$e=mktime(0,0,0,$em, $ed, $ey);
        $t = strtotimetime($dateto);
        if ($t < $s) {
            echo '<span class="red" >Sorry Please enter search dates correctly</span></br>';
        } else {


            echo '<table  class="table table-striped  table-bordered table-hover sorting_asc_disabled"  id="sample_2">
                <tr><th colspan="3">' . compname() . '</th></tr>
                   <tr><th></th><th>Member Number</th><th>Member Name</th></tr>
        <tr><td>' . $datefrom . ' to ' . $dateto . '</td><td>' . $mno . '</td><td>' . getMembername(base64_encode($mno)) . '</td></tr>

</tr>
        <tr><th colspan="3">STATEMENT OF ACCOUNT FOR ' . getaccname($acc) . ' GROUP</th></tr>
        <tr><th>Date</th><th>Transaction</th><th>Money in</th>';
            while ($s <= $t) {

//echo date("d-M-Y", $s).'</br>';
//statementin(date("d-M-Y", $s), $mno);
                $acry = mysql_query('select * from accounts where id="' . ($acc) . '"') or die(mysql_error());
                while ($row1 = mysql_fetch_array($acry)) {
                    $qry = mysql_query('select * from membercontribution where memberno="' . base64_encode($mno) . '" and date="' . base64_encode(date("d-M-Y", $s)) . '" and transaction="' . $row1['acname'] . '"') or die(mysql_error());
                    if (mysql_num_rows($qry) >= 1) {
                        while ($row = mysql_fetch_array($qry)) {
                            $sumin = $row['amount'];
                            $sss+=base64_decode($sumin);

                            echo '<tr><td><center>' . base64_decode($row['date']) . '</center></td><td>' . base64_decode($row['transaction']) . '</td><td>' . getsymbol() . '.' . number_format(base64_decode($sumin), 2) . '</td></tr>';
                        }
                    }
                }



                $s = $s + 86400; //increment date by 86400 seconds(1 day)
//$bal = $sss - $sumout;
            }
            echo '<tr><th>Total</th><td></td>
        <td>' . getsymbol() . '.' . number_format($sss, 2) . '</td></tr>
                            </table>';
//<tr><th>Net Balance</th><td></td><td colspan="2"><center>' . getsymbol() . '.' . number_format(netstatementbl($user, $mno, $dfrom, $mfrom, $yfrom, $dto, $mto, $yto), 2) . '</center></td></tr>
        }
    } else {
        echo '<span class="red" >Sorry Member not found</span></br>';
    }
    echo '<div class="col-md-2"><button class="btn green"value="Print this page" onClick="return printResults()" >Print</button></div>';
}

function expenceBalanceBF($acc, $dateto) {
    $date2 = strtotime($dateto) - 86400;  //we deduct one day b4 the from you chosed for the date range

    $mtotal = 0;

    $datefrom = date('31-12-2010');  //start of calculation 

    $s = strtotime($datefrom);

    $t = $date2;
    if ($t < $s) {
        
    } else {
        while ($s <= $t) {
            $stl = mysql_query('select * from paymentout WHERE    transname="' . base64_encode($acc) . '"') or die(mysql_error());
            while ($row = mysql_fetch_array($stl)) {
                $mtotal +=base64_decode($row['amount']);
            }


            $s = $s + 86400; //increment date by 86400 seconds(1 day) 
        }
    }

    return $mtotal;
}

function incomeBalanceBF($acc, $dateto) {
    $date2 = strtotime($dateto) - 86400;  //we deduct one day b4 the from you chosed for the date range

    $mtotal = 0;

    $datefrom = date('31-12-2010');  //start of calculation 

    $s = strtotime($datefrom);

    $t = $date2;
    if ($t < $s) {
        
    } else {
        while ($s <= $t) {
            $stl = mysql_query('select * from paymentin WHERE    transname="' . base64_encode($acc) . '"') or die(mysql_error());
            while ($row = mysql_fetch_array($stl)) {
                $mtotal +=base64_decode($row['amount']);
            }


            $s = $s + 86400; //increment date by 86400 seconds(1 day) 
        }
    }

    return $mtotal;
}

function accountBalanceBF($mno, $acc, $dateto) {
    $date2 = strtotime($dateto) - 86400;  //we deduct one day b4 the from you chosed for the date range

    $mtotal = 0;
    $dedeuct = 0;
    $datefrom = date('31-12-2010');  //start of calculation 

    $s = strtotime($datefrom);

    $t = $date2;
    if ($t < $s) {
        
    } else {
        while ($s <= $t) {
            $stl = mysql_query('select * from membercontribution where   paymenttype!="YWRqdXN0bWVudHM="   AND memberno="' . base64_encode($mno) . '" and date="' . base64_encode(date("d-M-Y", $s)) . '" and transaction="' . base64_encode($acc) . '"') or die(mysql_error());
            while ($row = mysql_fetch_array($stl)) {
                $mtotal +=base64_decode($row['amount']);
            }
            $stll = mysql_query('select * from membercontribution where   paymenttype="YWRqdXN0bWVudHM="   AND memberno="' . base64_encode($mno) . '" and date="' . base64_encode(date("d-M-Y", $s)) . '" and transaction="' . base64_encode($acc) . '"') or die(mysql_error());
            while ($rq = mysql_fetch_array($stll)) {
                $dedeuct +=base64_decode($rq['amount']);
            }

            $s = $s + 86400; //increment date by 86400 seconds(1 day) 
        }
    }
    $bal = $mtotal - $dedeuct;
    return $bal;
}

function accsdyna($user, $mno, $acc, $datefrom, $dateto) {

    $mtotal = 0;
    $balBF = accountBalanceBF($mno, $acc, $datefrom);
    $s = strtotime($datefrom);
    $t = strtotime($dateto);
    if ($t < $s) {
        
    } else {
        while ($s <= $t) {


            $muqry = mysql_query('select * from membercontribution where memberno="' . base64_encode($mno) . '" and date="' . base64_encode(date("d-M-Y", $s)) . '" and transaction="' . base64_encode($acc) . '"') or die(mysql_error());
            while ($row = mysql_fetch_array($muqry)) {
                $mtotal +=base64_decode($row['amount']);
            }

            $s = $s + 86400; //increment date by 86400 seconds(1 day)
        }
    }

    echo '<div id="mt"><table  class="table table-striped  table-bordered table-hover sorting_asc_disabled"  id="sample">
   <tr><th align="center"><h3 align="center"> <b>  Dynamic Contribution Statements</b></h3></th></tr>             
<tr><th colspan="3" ><h4 align="center"> <b>' . getglacc($acc) . ' Dynamic Statements</h4></th></tr></table>
                <table  class="table table-striped  table-bordered table-hover sorting_asc_disabled"  id="sample_2">
                <tr><th>Date</th><th>Account</th><th>Total</th></tr>
                <tr><td>Balance Brought Forward As At ' . $datefrom . '</td><td>' . getglacc($acc) . ' </td><td>' . getsymbol() . '.' . number_format($balBF, 2) . '</td></tr>
        <tr><td>' . $datefrom . ' to ' . $dateto . '</td><td>' . getglacc($acc) . ' </td><td>' . getsymbol() . '.' . number_format($mtotal, 2) . '</td></tr>
        <tr><th>Member Name</th><th></th><th>Member Number</th></tr>
        <tr><td>' . getMembername(base64_encode($mno)) . '</td><td></td><td>' . $mno . '</td></tr>
         </table>
         <table  class="table table-striped  table-bordered table-hover sorting_asc_disabled"  id="samp">
            <tr><th>Payee</th><th>Payment Type</th><th>Member Name</th><th>Account</th><th>Date</th><th>Amount</th></tr>';


    $s = strtotime($datefrom);

    $t = strtotime($dateto);
    if ($t < $s) {
        
    } else {
        while ($s <= $t) {

            $miqry = mysql_query('select * from membercontribution where memberno="' . base64_encode($mno) . '" and date="' . base64_encode(date("d-M-Y", $s)) . '" and transaction="' . base64_encode($acc) . '"') or die(mysql_error());
            while ($row = mysql_fetch_array($miqry)) {
                echo '<tr><td>' . base64_decode($row['payee']) . '</td><td>' . paytype(base64_decode($row['paymenttype'])) . '</td><td>' . getMembername($row['memberno']) . '</td><td>' . getglacc(base64_decode($row['transaction'])) . '</td><td>' . base64_decode($row['date']) . '</td><td>' . getsymbol() . '.' . number_format(base64_decode($row['amount']), 2) . '</td></tr>';
            }

            $s = $s + 86400;
        }
        $total = $balBF + $mtotal;
        echo '<tr><td colspan="4"></td><td>TOTAL</td><td>' . getsymbol() . '.' . number_format($total, 2) . '</td></tr>';
    }

    echo '</table></div>';
    echo '<div class="col-md-2"><button class="btn green"value="Print this page" onClick="return printResults()">Print</button></div>';
}

function groupupdate($user, $id, $gname, $status, $comments) {

// update data in mysql database
    $sql = "UPDATE cgroup SET gname='" . base64_encode($gname) . "', status='" . base64_encode($status) . "', comment='" . base64_encode($comments) . "', audituser='" . base64_encode($user) . "', auditdate='" . base64_encode(date('d-M-Y')) . "' WHERE id='" . $id . "'";

    $result = mysql_query($sql);
    mysql_query($result);
// if successfully updated.
    if ($result) {
        $users = new Users();
        $activity = "updated member contribution group " . $gname;
        $users->audittrail($user, $activity, $user);
        $alertyes = '<script type="text/javascript">alert(" Editing was Successful!");
                document.location.href = "groups.php";</script>';
        echo $alertyes;
    } else {
        $alertfail = '<script type="text/javascript">alert("Editing Failed!!");</script>';
        echo $alertfail;
    }
}

function shares($membernumber) {
    $sum = 0;
    $qry = mysql_query('select * from membercontribution where memberno="' . base64_encode($membernumber) . '" and transaction="' . base64_encode(getdefaultsavingsaccount()) . '"') or die(mysql_errno());
    while ($row = mysql_fetch_array($qry)) {
        $sum+=base64_decode($row['amount']);
    }

    return $sum;
}

function regfee($membernumber) {
    $sum = 0;
    $qry = mysql_query('select * from paymentin where payeeid="' . base64_encode($membernumber) . '" and transname="' . base64_encode("142") . '"') or die(mysql_errno());
    while ($row = mysql_fetch_array($qry)) {
        $sum+=base64_decode($row['amount']);
    }

    return $sum;
}

function compshare($membernumber, $tid, $datefrom, $dateto) {
    $start = new DateTime($datefrom);
    $end = new DateTime($dateto);
    $end->modify('+1 day');
    $interval = new DateInterval('P1D');
    $daterange = new DatePeriod($start, $interval, $end);
    $sum = 0;


    $qry = mysql_query('select * from membercontribution where memberno="' . base64_encode($membernumber) . '" AND paymenttype !="' . base64_encode("adjustments") . '"      and transaction="' . base64_encode(getdefaultsharesaccount()) . '"') or die(mysql_errno());
    while ($row = mysql_fetch_array($qry)) {
        foreach ($daterange as $date) {
            $dates = $date->format('d-M-Y');
            if ($row['date'] == base64_encode($dates)) {
                $sum+=base64_decode($row['amount']);
            }
        }
    }
    return $sum;
}

function compshares($membernumber) {
    $sum = 0;
    $qry = mysql_query('select * from membercontribution where memberno="' . base64_encode($membernumber) . '" and transaction="' . base64_encode(getdefaultsharesaccount()) . '"') or die(mysql_errno());
    while ($row = mysql_fetch_array($qry)) {
        $sum+=base64_decode($row['amount']);
    }

    return $sum;
}

function comsaving($membernumber) {
    $sum = 0;
    $adj = 0;
    $qry = mysql_query('select * from membercontribution where memberno="' . base64_encode($membernumber) . '"  AND paymenttype !="' . base64_encode("adjustments") . '"   and transaction="' . base64_encode(getdefaultsavingsaccount()) . '"') or die(mysql_errno());
    while ($row = mysql_fetch_array($qry)) {
        $sum+=base64_decode($row['amount']);
    }

    $adqry = mysql_query('select * from paymentin where  paymentype="' . base64_encode("adjustments") . '"  and transname="' . base64_encode(getdefaultsavingsaccount()) . '" ') or die(mysql_error());
    while ($row2 = mysql_fetch_array($adqry)) {

        $adj += base64_decode($row2['amount']);
    }
    $bal = $sum - $adj;
    return $bal;
}

function comsavings($membernumber, $datefrom, $dateto) {
    $start = new DateTime($datefrom);
    $end = new DateTime($dateto);
    $end->modify('+1 day');
    $interval = new DateInterval('P1D');
    $daterange = new DatePeriod($start, $interval, $end);
    $sum = 0;
    foreach ($daterange as $date) {

        $dates = $date->format('d-M-Y');
        $qry = mysql_query('select * from membercontribution where memberno="' . base64_encode($membernumber) . '" and date="' . base64_encode($dates) . '" and transaction="' . base64_encode(getdefaultsavingsaccount()) . '"') or die(mysql_error());
        while ($row = mysql_fetch_array($qry)) {
            $sum+=base64_decode($row['amount']);
        }
    }
    if ($sum != 0) {
        return $sum;
    }
}

function loan1($membernumber) {
    $sum = 0;
    $qry = mysql_query('select * from loanapplication where membernumber="' . base64_encode($membernumber) . '" and loantype="' . base64_encode('1') . '" and status="' . base64_encode('pending') . '"') or die(mysql_error());
    while ($row = mysql_fetch_array($qry)) {
        $sum = principlepaid($row['transactionid']);
    }
    return $sum;
}

function loan2($membernumber) {
    $sum = 0;
    $qry = mysql_query('select * from loanapplication where membernumber="' . base64_encode($membernumber) . '" and loantype="' . base64_encode('2') . '" and status="' . base64_encode('pending') . '"') or die(mysql_error());
    while ($row = mysql_fetch_array($qry)) {
        $sum = principlepaid($row['transactionid']);
    }
    return $sum;
}

function loan3($membernumber) {
    $sum = 0;
    $qry = mysql_query('select * from loanapplication where membernumber="' . base64_encode($membernumber) . '" and loantype="' . base64_encode('3') . '" and status="' . base64_encode('pending') . '"') or die(mysql_error());
    while ($row = mysql_fetch_array($qry)) {
        $sum = principlepaid($row['transactionid']);
    }
    return $sum;
}

function loan4($membernumber) {
    $sum = 0;
    $qry = mysql_query('select * from loanapplication where membernumber="' . base64_encode($membernumber) . '" and loantype="' . base64_encode('4') . '" and status="' . base64_encode('pending') . '"') or die(mysql_error());
    while ($row = mysql_fetch_array($qry)) {
        $sum = principlepaid($row['transactionid']);
    }
    return $sum;
}

function loan5($membernumber) {
    $sum = 0;
    $qry = mysql_query('select * from loanapplication where membernumber="' . base64_encode($membernumber) . '" and loantype="' . base64_encode('5') . '" and status="' . base64_encode('pending') . '"') or die(mysql_error());
    while ($row = mysql_fetch_array($qry)) {
        $sum = principlepaid($row['transactionid']);
    }
    return $sum;
}

function loan6($membernumber) {
    $sum = 0;
    $qry = mysql_query('select * from loanapplication where membernumber="' . base64_encode($membernumber) . '" and loantype="' . base64_encode('6') . '" and status="' . base64_encode('pending') . '"') or die(mysql_error());
    while ($row = mysql_fetch_array($qry)) {
        $sum = principlepaid($row['transactionid']);
    }
    return $sum;
}

function loan7($membernumber) {
    $sum = 0;
    $qry = mysql_query('select * from loanapplication where membernumber="' . base64_encode($membernumber) . '" and loantype="' . base64_encode('7') . '" and status="' . base64_encode('pending') . '"') or die(mysql_error());
    while ($row = mysql_fetch_array($qry)) {
        $sum = principlepaid($row['transactionid']);
    }
    return $sum;
}

function loan11($membernumber, $date) {
    $sum = 0;
    $qry = mysql_query('select * from loanapplication where membernumber="' . base64_encode($membernumber) . '" and loantype="' . base64_encode('1') . '" and status="' . base64_encode('pending') . '" and date="' . base64_encode($date) . '"') or die(mysql_error());
    while ($row = mysql_fetch_array($qry)) {
        $sum = principlepaid($row['transactionid']);
    }
    return $sum;
}

function loan22($membernumber, $date) {
    $sum = 0;
    $qry = mysql_query('select * from loanapplication where membernumber="' . base64_encode($membernumber) . '" and loantype="' . base64_encode('2') . '" and status="' . base64_encode('pending') . '" and date="' . base64_encode($date) . '"') or die(mysql_error());
    while ($row = mysql_fetch_array($qry)) {
        $sum = principlepaid($row['transactionid']);
    }
    return $sum;
}

function loan33($membernumber, $date) {
    $sum = 0;
    $qry = mysql_query('select * from loanapplication where membernumber="' . base64_encode($membernumber) . '" and loantype="' . base64_encode('3') . '" and status="' . base64_encode('pending') . '" and date="' . base64_encode($date) . '"') or die(mysql_error());
    while ($row = mysql_fetch_array($qry)) {
        $sum = principlepaid($row['transactionid']);
    }
    return $sum;
}

function loan44($membernumber, $date) {
    $sum = 0;
    $qry = mysql_query('select * from loanapplication where membernumber="' . base64_encode($membernumber) . '" and loantype="' . base64_encode('4') . '" and status="' . base64_encode('pending') . '" and date="' . base64_encode($date) . '"') or die(mysql_error());
    while ($row = mysql_fetch_array($qry)) {
        $sum = principlepaid($row['transactionid']);
    }
    return $sum;
}

function loan55($membernumber, $date) {
    $sum = 0;
    $qry = mysql_query('select * from loanapplication where membernumber="' . base64_encode($membernumber) . '" and loantype="' . base64_encode('5') . '" and status="' . base64_encode('pending') . '" and date="' . base64_encode($date) . '"') or die(mysql_error());
    while ($row = mysql_fetch_array($qry)) {
        $sum = principlepaid($row['transactionid']);
    }
    return $sum;
}

function loan66($membernumber, $date) {
    $sum = 0;
    $qry = mysql_query('select * from loanapplication where membernumber="' . base64_encode($membernumber) . '" and loantype="' . base64_encode('6') . '" and status="' . base64_encode('pending') . '" and date="' . base64_encode($date) . '"') or die(mysql_error());
    while ($row = mysql_fetch_array($qry)) {
        $sum = principlepaid($row['transactionid']);
    }
    return $sum;
}

function loan77($membernumber, $date) {
    $sum = 0;
    $qry = mysql_query('select * from loanapplication where membernumber="' . base64_encode($membernumber) . '" and loantype="' . base64_encode('7') . '" and status="' . base64_encode('pending') . '" and date="' . base64_encode($date) . '"') or die(mysql_error());
    while ($row = mysql_fetch_array($qry)) {
        $sum = principlepaid($row['transactionid']);
    }
    return $sum;
}

function loan1a($membernumber) {
    $sum = 0;
    $qry = mysql_query('select * from loanapplication where membernumber="' . base64_encode($membernumber) . '" and loantype="' . base64_encode('1') . '" and status="' . base64_encode('pending') . '"') or die(mysql_error());
    while ($row = mysql_fetch_array($qry)) {
        $sum = principletopay($row['transactionid']);
    }
    return $sum;
}

function loan2a($membernumber) {
    $sum = 0;
    $qry = mysql_query('select * from loanapplication where membernumber="' . base64_encode($membernumber) . '" and loantype="' . base64_encode('2') . '" and status="' . base64_encode('pending') . '"') or die(mysql_error());
    while ($row = mysql_fetch_array($qry)) {
        $sum = principletopay($row['transactionid']);
    }
    return $sum;
}

function loan3a($membernumber) {
    $sum = 0;
    $qry = mysql_query('select * from loanapplication where membernumber="' . base64_encode($membernumber) . '" and loantype="' . base64_encode('3') . '" and status="' . base64_encode('pending') . '"') or die(mysql_error());
    while ($row = mysql_fetch_array($qry)) {
        $sum = principletopay($row['transactionid']);
    }
    return $sum;
}

function loan4a($membernumber) {
    $sum = 0;
    $qry = mysql_query('select * from loanapplication where membernumber="' . base64_encode($membernumber) . '" and loantype="' . base64_encode('4') . '" and status="' . base64_encode('pending') . '"') or die(mysql_error());
    while ($row = mysql_fetch_array($qry)) {
        $sum = principletopay($row['transactionid']);
    }
    return $sum;
}

function loan5a($membernumber) {
    $sum = 0;
    $qry = mysql_query('select * from loanapplication where membernumber="' . base64_encode($membernumber) . '" and loantype="' . base64_encode('5') . '" and status="' . base64_encode('pending') . '"') or die(mysql_error());
    while ($row = mysql_fetch_array($qry)) {
        $sum = principletopay($row['transactionid']);
    }
    return $sum;
}

function loan6a($membernumber) {
    $sum = 0;
    $qry = mysql_query('select * from loanapplication where membernumber="' . base64_encode($membernumber) . '" and loantype="' . base64_encode('6') . '" and status="' . base64_encode('pending') . '"') or die(mysql_error());
    while ($row = mysql_fetch_array($qry)) {
        $sum = principletopay($row['transactionid']);
    }
    return $sum;
}

function loan7a($membernumber) {
    $sum = 0;
    $qry = mysql_query('select * from loanapplication where membernumber="' . base64_encode($membernumber) . '" and loantype="' . base64_encode('7') . '" and status="' . base64_encode('pending') . '"') or die(mysql_error());
    while ($row = mysql_fetch_array($qry)) {
        $sum = principletopay($row['transactionid']);
    }
    return $sum;
}

function cashbook($id, $datefrom, $dateto) {

    $mqry = mysql_query('select * from users where id="' . ($id) . '" and status="' . base64_encode("Active") . '"') or die(mysql_error());
    if (mysql_num_rows($mqry) == 1) {
        $s = strtotime($datefrom);

        $t = strtotime($dateto);
        if ($t < $s) {
            echo '<span class="red" >Sorry Please enter search dates correctly</span></br>';
        } else {

            echo '<table  class="table table-striped  table-bordered table-hover sorting_asc_disabled"  id="sample_2">
    <tr>
    <thead>
    <th>Item</th> <th>January</th><th>February</th><th>March</th><th>April</th><th>May</th><th>June</th><th>July</th>
    <th>August</th>
    <th>September</th>
    <th>October</th>
    <th>November</th>
    <th>December</th>
    <th>TOTAL</th>
      </thead>
    </tr>';

            while ($s <= $t) {

                $sum = 0;

                echo '<tr><th>Cash Received</th><td colspan="13"></td></tr>';

                $vzyx = mysql_query('select * from accounts where actype="' . base64_encode('Capital') . '" and status="' . base64_encode("Active") . '"') or die(mysql_error());
                while ($vow = mysql_fetch_array($vzyx)) {

                    echo '<tr><td>' . base64_decode($vow["acname"]) . '</td><td>' . number_format(onetq($vow["acname"], date("d-M-Y", $s)), 2) . '</td>
                    <td>' . number_format(onet($vow["acname"], Aug), 2) . '</td><td>' . number_format(onet($vow["acname"], Aug), 2) . '</td>
                        <td>' . number_format(onet($vow["acname"], Aug), 2) . '</td><td>' . number_format(onet($vow["acname"], Aug), 2) . '</td>
                            <td>' . number_format(onet($vow["acname"], Aug), 2) . '</td><td>' . number_format(onet($vow["acname"], Aug), 2) . '</td>
                                <td>' . number_format(onet($vow["acname"], Aug), 2) . '</td><td>' . number_format(onet($vow["acname"], Aug), 2) . '</td>
                                    <td>' . number_format(onet($vow["acname"], Aug), 2) . '</td><td>' . number_format(onet($vow["acname"], Aug), 2) . '</td>
                                        <td>' . number_format(onet($vow["acname"], Aug), 2) . '</td><td>' . number_format(onet($vow["acname"], Aug), 2) . '</td>
                            </tr>';

                    $sumcapital+=onet($vow["acname"], Aug);
                }

                $rko = mysql_query('select * from loansettings where status="' . base64_encode("Active") . '"') or die(mysql_error());
                while ($low = mysql_fetch_array($rko)) {
                    $svzyx = mysql_query('select * from membercontribution where transaction="' . $low['lname'] . '"') or die(mysql_error());
                    while ($vow = mysql_fetch_array($svzyx)) {

                        echo '<tr><td>' . base64_decode($vow["transaction"]) . ' Repayment</td><td>' . number_format(base64_decode($vow["amount"]), 2) . '</td>
                    <td>' . number_format(base64_decode($vow["amount"]), 2) . '</td><td>' . number_format(base64_decode($vow["amount"]), 2) . '</td>
                        <td>' . number_format(base64_decode($vow["amount"]), 2) . '</td><td>' . number_format(base64_decode($vow["amount"]), 2) . '</td>
                            <td>' . number_format(base64_decode($vow["amount"]), 2) . '</td><td>' . number_format(base64_decode($vow["amount"]), 2) . '</td>
                                <td>' . number_format(base64_decode($vow["amount"]), 2) . '</td><td>' . number_format(base64_decode($vow["amount"]), 2) . '</td>
                                    <td>' . number_format(base64_decode($vow["amount"]), 2) . '</td><td>' . number_format(base64_decode($vow["amount"]), 2) . '</td>
                                        <td>' . number_format(base64_decode($vow["amount"]), 2) . '</td><td>' . number_format(base64_decode($vow["amount"]), 2) . '</td>
                            </tr>';

                        $sumloan+= base64_decode($vow["amount"]);
                    }
                }

                $cyx = mysql_query('select * from accounts where actype="' . base64_encode('Income') . '" and status="' . base64_encode('Active') . '"') or die(mysql_error());
                while ($vow = mysql_fetch_array($cyx)) {

                    echo '<tr><td>' . base64_decode($vow["acname"]) . '</td><td>' . number_format(incomecb($vow["acname"]), 2) . '</td>
                    <td>' . number_format(incomecb($vow["acname"]), 2) . '</td><td>' . number_format(incomecb($vow["acname"]), 2) . '</td>
                        <td>' . number_format(incomecb($vow["acname"]), 2) . '</td><td>' . number_format(incomecb($vow["acname"]), 2) . '</td>
                            <td>' . number_format(incomecb($vow["acname"]), 2) . '</td><td>' . number_format(incomecb($vow["acname"]), 2) . '</td>
                                <td>' . number_format(incomecb($vow["acname"]), 2) . '</td><td>' . number_format(incomecb($vow["acname"]), 2) . '</td>
                                    <td>' . number_format(incomecb($vow["acname"]), 2) . '</td><td>' . number_format(incomecb($vow["acname"]), 2) . '</td>
                                        <td>' . number_format(incomecb($vow["acname"]), 2) . '</td><td>' . number_format(incomecb($vow["acname"]), 2) . '</td>
                            </tr>';

                    $sumincome+= incomecb($vow["acname"]);
                }

                $sumrec = $sumcapital + $sumincome + $sumloan;

                echo '<tr><th>Total Cash Received</th><th>' . number_format($sumrec, 2) . '</th><th>' . number_format($sumrec, 2) . '</th>
                <th>' . number_format($sumrec, 2) . '</th><th>' . number_format($sumrec, 2) . '</th><th>' . number_format($sumrec, 2) . '</th>
                  <th>' . number_format($sumrec, 2) . '</th><th>' . number_format($sumrec, 2) . '</th><th>' . number_format($sumrec, 2) . '</th>
                      <th>' . number_format($sumrec, 2) . '</th><th>' . number_format($sumrec, 2) . '</th><th>' . number_format($sumrec, 2) . '</th>
                          <th>' . number_format($sumrec, 2) . '</th><th>' . number_format($sumrec, 2) . '</th></tr>';

                echo '<tr><th>Cash Disbursed</th><td colspan="13"></td></tr>';

                $zyx = mysql_query('select * from accounts where actype="' . base64_encode('Expense') . '" and status="' . base64_encode("Active") . '"') or die(mysql_error());
                while ($vow = mysql_fetch_array($zyx)) {

                    echo '<tr><td>' . base64_decode($vow["acname"]) . '</td><td>' . number_format(expensecb($vow["acname"]), 2) . '</td>
                    <td>' . number_format(expensecb($vow["acname"]), 2) . '</td><td>' . number_format(expensecb($vow["acname"]), 2) . '</td>
                        <td>' . number_format(expensecb($vow["acname"]), 2) . '</td><td>' . number_format(expensecb($vow["acname"]), 2) . '</td>
                            <td>' . number_format(expensecb($vow["acname"]), 2) . '</td><td>' . number_format(expensecb($vow["acname"]), 2) . '</td>
                                <td>' . number_format(expensecb($vow["acname"]), 2) . '</td><td>' . number_format(expensecb($vow["acname"]), 2) . '</td>
                                    <td>' . number_format(expensecb($vow["acname"]), 2) . '</td><td>' . number_format(expensecb($vow["acname"]), 2) . '</td>
                                        <td>' . number_format(expensecb($vow["acname"]), 2) . '</td><td>' . number_format(expensecb($vow["acname"]), 2) . '</td>
                            </tr>';

                    $sumexpense+= expensecb($vow["acname"]);
                }

                echo '<tr><td>Issued Loans</td>';

                $zrko = mysql_query('select * from loans where status="' . base64_encode("active") . '"') or die(mysql_error());
//while
                $vow = mysql_fetch_array($zrko);
//{
                $loan+= base64_decode($vow["amount"]);

                echo '<td>' . number_format(($loan), 2) . '</td>
                    <td>' . number_format(($loan), 2) . '</td><td>' . number_format(($loan), 2) . '</td>
                        <td>' . number_format(($loan), 2) . '</td><td>' . number_format(($loan), 2) . '</td>
                            <td>' . number_format(($loan), 2) . '</td><td>' . number_format(($loan), 2) . '</td>
                                <td>' . number_format(($loan), 2) . '</td><td>' . number_format(($loan), 2) . '</td>
                                    <td>' . number_format(($loan), 2) . '</td><td>' . number_format(($loan), 2) . '</td>
                                        <td>' . number_format(($loan), 2) . '</td><td>' . number_format(($loan), 2) . '</td>';

                $sumissued+=($loan);
//}
                echo '</tr><tr><th colspan="14"></th></tr>';
            }

            $sumdis = $sumexpense + $sumissued;

            echo '<tr><th>Total Cash Disbursed</th><th>' . number_format($sumdis, 2) . '</th><th>' . number_format($sumdis, 2) . '</th>
                <th>' . number_format($sumdis, 2) . '</th><th>' . number_format($sumdis, 2) . '</th><th>' . number_format($sumdis, 2) . '</th>
                  <th>' . number_format($sumdis, 2) . '</th><th>' . number_format($sumdis, 2) . '</th><th>' . number_format($sumdis, 2) . '</th>
                      <th>' . number_format($sumdis, 2) . '</th><th>' . number_format($sumdis, 2) . '</th><th>' . number_format($sumdis, 2) . '</th>
                          <th>' . number_format($sumdis, 2) . '</th><th>' . number_format($sumdis, 2) . '</th></tr>';

            $sumnet = $sumrec - $sumdis;

            echo '<tr><th>Net Cash Flow</th><th>' . number_format($sumnet, 2) . '</th><th>' . number_format($sumnet, 2) . '</th>
                <th>' . number_format($sumnet, 2) . '</th><th>' . number_format($sumnet, 2) . '</th><th>' . number_format($sumnet, 2) . '</th>
                  <th>' . number_format($sumnet, 2) . '</th><th>' . number_format($sumnet, 2) . '</th><th>' . number_format($sumnet, 2) . '</th>
                      <th>' . number_format($sumnet, 2) . '</th><th>' . number_format($sumnet, 2) . '</th><th>' . number_format($sumnet, 2) . '</th>
                          <th>' . number_format($sumnet, 2) . '</th><th>' . number_format($sumnet, 2) . '</th></tr>';

            echo '<tr><th>Beginning Cash</th><th>' . number_format(expensecb($vow["acname"]), 2) . '</th><th>' . number_format(expensecb($vow["acname"]), 2) . '</th>
                <th>' . number_format(expensecb($vow["acname"]), 2) . '</th><th>' . number_format(expensecb($vow["acname"]), 2) . '</th><th>' . number_format(expensecb($vow["acname"]), 2) . '</th>
                  <th>' . number_format(expensecb($vow["acname"]), 2) . '</th><th>' . number_format(expensecb($vow["acname"]), 2) . '</th><th>' . number_format(expensecb($vow["acname"]), 2) . '</th>
                      <th>' . number_format(expensecb($vow["acname"]), 2) . '</th><th>' . number_format(expensecb($vow["acname"]), 2) . '</th><th>' . number_format(expensecb($vow["acname"]), 2) . '</th>
                          <th>' . number_format(expensecb($vow["acname"]), 2) . '</th><th>' . number_format(expensecb($vow["acname"]), 2) . '</th></tr>';

            echo '<tr><th>Ending Balance</th><th>' . number_format(expensecb($vow["acname"]), 2) . '</th><th>' . number_format(expensecb($vow["acname"]), 2) . '</th>
                <th>' . number_format(expensecb($vow["acname"]), 2) . '</th><th>' . number_format(expensecb($vow["acname"]), 2) . '</th><th>' . number_format(expensecb($vow["acname"]), 2) . '</th>
                  <th>' . number_format(expensecb($vow["acname"]), 2) . '</th><th>' . number_format(expensecb($vow["acname"]), 2) . '</th><th>' . number_format(expensecb($vow["acname"]), 2) . '</th>
                      <th>' . number_format(expensecb($vow["acname"]), 2) . '</th><th>' . number_format(expensecb($vow["acname"]), 2) . '</th><th>' . number_format(expensecb($vow["acname"]), 2) . '</th>
                          <th>' . number_format(expensecb($vow["acname"]), 2) . '</th><th>' . number_format(expensecb($vow["acname"]), 2) . '</th></tr>';

            echo '</tr></table>';
        }
    } else {
        echo '<span class="red" >Sorry You are not authorized to view this page.</span></br>';
    }
    echo '<div class="col-md-2"><div class="noprint"><button class="btn green"value="Print this page" onclick="print()">Print</button></div></div>';
}

function capitalcb($acname) {
    $sum = 0;
    $mqry = mysql_query('select * from membercontribution where transaction="' . $acname . '"') or die(mysql_error());
    while ($row = mysql_fetch_array($mqry)) {

        $sum+=(base64_decode($row['amount']));
    }

    return $sum;
}

function incomecb($acname) {
    $sum = 0;
    $mqry = mysql_query('select * from paymentin where transname="' . $acname . '"') or die(mysql_error());
    while ($row = mysql_fetch_array($mqry)) {

        $sum+=(base64_decode($row['amount']));
    }

    return $sum;
}

function totalincomecb($acname) {
    $sum = 0;
    $mqry = mysql_query('select * from paymentin where transname="' . $acname . '"') or die(mysql_error());
    while ($row = mysql_fetch_array($mqry)) {

        $sum+=(base64_decode($row['amount']));
    }

    return $sum + bftotal();
}

//$sumincomecb+= incomecb($arow["acname"]) + bftotal(date("d-M-Y", $s));


function expensecb($acname) {
    $sum = 0;
    $mqry = mysql_query('select * from paymentout where transname="' . $acname . '"') or die(mysql_error());
    while ($row = mysql_fetch_array($mqry)) {

        $sum+=(base64_decode($row['amount']));
    }

    return $sum;
}

function onet($acname, $aug) {
    $sum = 0;
    $mqry = mysql_query('select * from membercontribution where transaction="' . ($acname) . '"') or die(mysql_error());
    while ($row = mysql_fetch_array($mqry)) {

        $sum+=(base64_decode($row['amount']));
    }

    return $sum;
}

function onetq($acname, $aug) {
    $sum = 0;
    $mqry = mysql_query('select * from membercontribution where transaction="' . ($acname) . '" and date="' . base64_encode($aug) . '"') or die(mysql_error());
    while ($row = mysql_fetch_array($mqry)) {

        $sum+=(base64_decode($row['amount']));
    }

    return $sum;
}

function bftotal($date) {

    $sum = 0;

    $qary = mysql_query('select * from sharesbf where status="' . base64_encode("active") . '"') or die(mysql_error());
    while ($rslt = mysql_fetch_array($qary)) {
        $sum+=base64_decode($rslt['sharesbf']);
    }

    return $sum;
}

function bankbal($date) {

    $sum = 0;

    $qary = mysql_query('select * from assets where asname="' . base64_encode("current account balance") . '" and date="' . base64_encode($date) . '"') or die(mysql_error());
    while ($rslt = mysql_fetch_array($qary)) {
        $sum+=base64_decode($rslt['asvalue']);
    }

    return $sum;
}

function loantot($membernumber) {
    $sum = 0;
    $qry = mysql_query('select * from loanapplication where membernumber="' . base64_encode($membernumber) . '" and loantype="' . base64_encode('1') . '"') or die(mysql_error());
    while ($row = mysql_fetch_array($qry)) {
        $sum = remainingloan($row['transactionid']);
    }
    return $sum;
}

function cashbuk($id, $datefrom, $dateto) {

    $mqry = mysql_query('select * from users where id="' . ($id) . '" and status="' . base64_encode("Active") . '"') or die(mysql_error());
    if (mysql_num_rows($mqry) == 1) {
//$datefrom = $dfrom . '-' . $mfrom . '-' . $yfrom;
//$dateto = $dto . '-' . $mto . '-' . $yto;
//start date 2001-02-23
        /* $sm = date("m", strtotime($mfrom));
          $sd = $dfrom;
          $sy = $yfrom;
          //
          //$tm = date("m", strtotime($mto));
          $tm = date("m", strtotime($mto));
          //$td = $dto;
          $td = $dto;
          //$ty = $yto;
          $ty = $yto;

          $stt = mktime(0, 0, 0, $tm, $dto, $yto);
          $ddto = date("d", $stt);
          $mmto = date("M", $stt);
          $yyto = date("Y", $stt);
         */
//utc of start and end dates
        $s = strtotime($datefrom);
//$e=mktime(0,0,0,$em, $ed, $ey);
        $t = strtotime($dateto);
        if ($t < $s) {

            echo '<span class="red" >Sorry Please enter search dates correctly</span></br>';
        } else {

            $coo = mysql_query('SELECT Count(id) FROM accounts WHERE actype= "' . base64_encode('Income') . '"') or die(mysql_error());
            while ($row = mysql_fetch_array($coo)) {
                $sdumin = $row['Count(id)'] + 1;
            }

            $doo = mysql_query('SELECT Count(id) FROM accounts WHERE actype= "' . base64_encode('Expense') . '"') or die(mysql_error());
            while ($bow = mysql_fetch_array($doo)) {
                $sdmin = $bow['Count(id)'];
            }

            echo '<table  class="table table-striped  table-bordered table-hover sorting_asc_disabled"  id="sample_2">
    <tr>
    <thead>
    <th colspan="2">Details</th>
    <th colspan="' . $sdumin . '">Income</th>
    <th colspan="2">Cost of Goods Sold</th>
    <th colspan="' . $sdmin . '">Expenses</th>
    <th rowspan="2">Bank Balance</th>
    </thead>
    </tr>
    <tr>
    <thead>
    <th>Date</th>
    <th>Description</th>
    <th>Capital</th>';

            $zyx = mysql_query('select * from accounts where actype="' . base64_encode('Income') . '" and status="' . base64_encode("Active") . '"') or die(mysql_error());
            while ($row = mysql_fetch_array($zyx)) {

                echo '<th>' . base64_decode($row["acname"]) . '</th>';
            }

            echo '<th>Total</th>';

            $xzyx = mysql_query('select * from accounts where actype="' . base64_encode('Expense') . '" and status="' . base64_encode("Active") . '"') or die(mysql_error());
            while ($xow = mysql_fetch_array($xzyx)) {

                echo '<th>' . base64_decode($xow["acname"]) . '</th>';
            }

            echo '<th>Total</th>
    <th>Bank Balance</th>
    </thead>
    </tr>';

            $sum = 0;
//$mqry = mysql_query('select * from income where status="' . base64_encode("active") . '"') or die(mysql_error());
//while ($row = mysql_fetch_array($mqry)) {
//$mqry = mysql_query('select * from sharesbf where date="' . base64_encode(date("d-M-Y", $s)) . '"') or die(mysql_error());
//while ($row = mysql_fetch_array($mqry)) {

            echo '<tr><td>' . date('d-M-Y') . '</td><td>Starting Balance</td><td>' . number_format(bftotal(date("d-M-Y", $s)), 2) . '</td>';


            $azyx = mysql_query('select * from accounts where actype="' . base64_encode('Income') . '" and status="' . base64_encode("Active") . '"') or die(mysql_error());
            while ($arow = mysql_fetch_array($azyx)) {

                echo '<td>' . number_format(incomecb($arow["acname"]), 2) . '</td>';

                $sincomecb+= incomecb($arow["acname"]);
                $sumincome = $sincomecb + bftotal(date("d-M-Y", $s));
            }
            echo '<td>' . number_format($sumincome) . '</td>';

            $vzyx = mysql_query('select * from accounts where actype="' . base64_encode('Expense') . '" and status="' . base64_encode("Active") . '"') or die(mysql_error());
            while ($vow = mysql_fetch_array($vzyx)) {

                echo '<td>' . number_format(expensecb($vow["acname"]), 2) . '</td>';

                $sumexpensecb+= expensecb($vow["acname"]);
            }

            $totalcb = $sumincome - $sumexpensecb;

            echo '<td>' . number_format($sumexpensecb, 2) . '</td><td>' . number_format($totalcb, 2) . '</td>';

            echo '</tr></table>';
        }
    } else {
        echo '<span class="red" >Sorry You are not authorized to view this page.</span></br>';
    }
    echo '<div class="col-md-2"><div class="noprint"><button class="btn green"value="Print this page" onclick="print()">Print</button></div></div>';
}

function trialbalance($user, $datefrom, $dateto) {
    $mqry = mysql_query('select * from users where id="' . ($user) . '" and status="' . base64_encode("Active") . '"') or die(mysql_error());
    if (mysql_num_rows($mqry) == 1) {

        $s = strtotime($datefrom);
//$e=mktime(0,0,0,$em, $ed, $ey);
        $t = strtotime($dateto);
        if ($t < $s) {
            echo '<span class="red" >Sorry Please enter search dates correctly</span></br>';
        } else {
            while ($s <= $t) {

                echo '<table  class="table table-striped  table-bordered table-hover sorting_asc_disabled"  id="sample_2">
                <tr><th colspan="3">' . compname() . '</th></tr>
        <tr><td colspan="3">' . $datefrom . ' to ' . $dateto . '</td></tr>

</tr>
        <tr><th colspan="3">TRIAL BALANCE</th></tr>
        <tr><tr><th>Account</th><th>Debit</th><th>Credit</th></tr></th>';
//while ($s <= $t) {

                $yoy = mysql_query('select * from accounts where actype="' . base64_encode("Capital") . '"') or die(mysql_error());
                while ($wow = mysql_fetch_array($yoy)) {

                    $accs+= twende($wow['acname']);
                    $aqs = twende($wow['acname']);
                    echo '<tr>
      <td>' . base64_decode($wow['acname']) . '</td>
      <td>' . getsymbol() . '. 0.00</td>
      <td>' . getsymbol() . '.' . number_format($aqs, 2) . '</td>
      </tr>';
                }

                $zoy = mysql_query('select * from accounts where actype="' . base64_encode("Income") . '"') or die(mysql_error());
                while ($xow = mysql_fetch_array($zoy)) {

                    $inccs+= incbalance($xow['acname']);
                    $inqs = incbalance($xow['acname']);
                    echo '<tr>
      <td>' . base64_decode($xow['acname']) . '</td>
      <td>' . getsymbol() . '. 0.00</td>
      <td>' . getsymbol() . '.' . number_format($inqs, 2) . '</td>
      </tr>';
                }

                $voy = mysql_query('select * from accounts where actype="' . base64_encode("Expense") . '"') or die(mysql_error());
                while ($bow = mysql_fetch_array($voy)) {

                    $expps+= expbalance($bow['acname']);
                    $exqs = expbalance($bow['acname']);
                    echo '<tr>
      <td>' . base64_decode($bow['acname']) . '</td>
      <td>' . getsymbol() . '.' . number_format($exqs, 2) . '</td>
      <td>' . getsymbol() . '. 0.00</td>
      </tr>';
                }

                $aoy = mysql_query('select * from assets') or die(mysql_error());
                while ($sow = mysql_fetch_array($aoy)) {

                    $asss+= base64_decode($sow['asvalue']);
                    $aqs = $sow['asvalue'];
                    echo '<tr>
      <td>' . base64_decode($sow['asname']) . '</td>
      <td>' . number_format(base64_decode($aqs), 2) . '</td>
      <td>' . getsymbol() . '. 0.00</td>
      </tr>';
                }

                $doy = mysql_query('select * from liabilities') or die(mysql_error());
                while ($fow = mysql_fetch_array($doy)) {

                    $lias+= base64_decode($fow['lamount']);
                    $liqs = $fow['lamount'];
                    echo '<tr>
      <td>' . base64_decode($fow['lname']) . '</td>
      <td>' . getsymbol() . '. 0.00</td>
      <td>' . number_format(base64_decode($liqs), 2) . '</td>
      </tr>';
                }

                $loa = loanbalss();
                echo '<tr>
      <td>Issued Loans</td>
      <td>' . number_format($loa, 2) . '</td>
      <td>' . getsymbol() . '. 0.00</td>
      </tr>';

                $sumout = $asss + $loa + $expps;
                $sumin = $lias + $inccs + $accs;

                echo '<tr><th>Total</th><td>' . getsymbol() . '.' . number_format($sumout, 2) . '</td>
        <td>' . getsymbol() . '.' . number_format($sumin, 2) . '</td></tr>
                </table>';

                echo '</table>';
//<tr><th>Net Balance</th><td></td><td colspan="2"><center>' . getsymbol() . '.' . number_format(netstatementbl($user, $mno, $dfrom, $mfrom, $yfrom, $dto, $mto, $yto), 2) . '</center></td></tr>
            }
        }
    } else {
        echo '<span class="red" >Sorry Member not found</span></br>';
    }
    echo '<div class="col-md-2"><div class="noprint"><button class="btn green"value="Print this page" onclick="print()">Print</button></div></div>';
}

function tbalance($user, $datefrom, $dateto) {
//$date = $day . '-' . $month . '-' . $year;
//$date=date("d-M-Y");
    $mtotal = 0;
    $intotal = 0;
    $extotal = 0;
    /* $sm = date("m", strtotime($mfrom));
      $sd = $dfrom;
      $sy = $yfrom;
      //
      //$tm = date("m", strtotime($mto));
      $tm = date("m", strtotime($mto));
      //$td = $dto;
      $td = $dto;
      //$ty = $yto;
      $ty = $yto;
     */
//utc of start and end dates
    $s = strtotime($datefrom);
//$e=mktime(0,0,0,$em, $ed, $ey);
    $t = strtotime($dateto);
    if ($t < $s) {
        echo '<span class="red" >Sorry Please enter search dates correctly</span></br>';
    } else {
        while ($s <= $t) {

            $s = $s + 86400; //increment date by 86400 seconds(1 day)
        }
    }

    echo '<div class = "art-postcontent art-postcontent-0 clearfix">
<div class = "art-content-layout">
<form action = "" method = "get" autocomplete = "off">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 100%" >
<table  class="table table-striped  table-bordered table-hover sorting_asc_disabled"  id="sample_2">
<tr><th colspan = "3">' . compname() . '</th></tr></table>
<table class = "tables">
<tr><td>' . $datefrom . ' to ' . $dateto . '</td><th>TRIAL BALANCE</th><th>Date Generated : ' . date('d-M-Y') . '</th></tr>
</table>
</div>
<div class = "art-layout-cell" style = "width: 50%" >

</div>
</div>
<div class = "art-postcontent art-postcontent-0 clearfix">
<div class = "art-content-layout">
<form action = "" method = "get" autocomplete = "off">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 100%" >
<table  class="table table-striped  table-bordered table-hover sorting_asc_disabled"  id="sample_2">
<tr><th>Account</th><th>Debit</th><th>Credit</th></tr>';


//utc of start and end dates
    $s = strtotime($datefrom);
//$e=mktime(0,0,0,$em, $ed, $ey);
    $t = strtotime($dateto);
    if ($t < $s) {
        
    } else {

        while ($s <= $t) {

            $yoy = mysql_query('select * from accounts where actype="' . base64_encode("Capital") . '"') or die(mysql_error());
            while ($wow = mysql_fetch_array($yoy)) {
                echo '<tr><td>' . base64_decode($wow['acname']) . '</td>';

                $accs+= twende1($wow['acname'], base64_encode(date("d-M-Y", $s)));
                $aqs = twende1($wow['acname'], base64_encode(date("d-M-Y", $s)));

                echo '<td>' . getsymbol() . '. 0.00</td><td>' . getsymbol() . '.' . number_format($aqs, 2) . '</td></tr>';
            }

            $sumout = $asss + $loa + $expps;
            $sumin = $lias + $inccs + $accs;

            $s = $s + 86400;
        }

        echo '<tr><th>Total</th><td>' . getsymbol() . '.' . number_format($sumout, 2) . '</td>
        <td>' . getsymbol() . '.' . number_format($sumin, 2) . '</td></tr>';
    }

    echo '</table>
</div>
</div>
</form></div>';
    echo '<div class = "two"><button class="btn green"value = "Print this page" onclick = "print()">Print</button></div>';
}

function balcapital($acname, $date) {


    $sum = 0;
    $qry = mysql_query('select * from membercontribution where transaction="' . ($acname) . '" and date="' . base64_encode($date) . '"') or die(mysql_errno());
    while ($row = mysql_fetch_array($qry)) {
        $sum+=base64_decode($row['amount']);
    }

    /*
      $share = mysql_query('select * from sharesbf where status="' . base64_encode("active") . '"') or die(mysql_error());
      while ($find = mysql_fetch_array($share)) {
      $sum+= base64_decode($find['sharesbf']);
      }
     */

    return $sum;
}

function sumtotalforcapital1($acname, $date) {
    $sum = 0;
    $qry = mysql_query('select * from membercontribution where transaction="' . ($acname) . '" and date="' . base64_encode($date) . '"') or die(mysql_errno());
    while ($row = mysql_fetch_array($qry)) {
        $sum+=base64_decode($row['amount']);
    }
    $share = mysql_query('select * from sharesbf where status="' . base64_encode("active") . '"') or die(mysql_error());
    while ($find = mysql_fetch_array($share)) {
        $sum+= base64_decode($find['sharesbf']);
    }

    return $sum;
}

function sumtotalforcapital2($acname, $date) {
    $sum = 0;
    $qry = mysql_query('select * from membercontribution where transaction="' . ($acname) . '" and date="' . base64_encode($date) . '"') or die(mysql_errno());
    while ($row = mysql_fetch_array($qry)) {
        $sum+=base64_decode($row['amount']);
    }

    return $sum;
}

function sumtotalforcapital3($acname, $date) {
    $sum = 0;
    $qry = mysql_query('select * from membercontribution where transaction="' . ($acname) . '" and date="' . base64_encode($date) . '"') or die(mysql_errno());
    while ($row = mysql_fetch_array($qry)) {
        $sum+=base64_decode($row['amount']);
    }

    return $sum;
}

function incbalance($acname) {
    $sum = 0;
    $qry = mysql_query('select * from paymentin where transname="' . ($acname) . '" and paymentype="' . base64_encode('Others') . '"') or die(mysql_errno());
    while ($row = mysql_fetch_array($qry)) {
        $sum+=base64_decode($row['amount']);
        /*
          if($acname == 'loan interest') {
          $qry = mysql_query('select * from paymentin where transname="' . ($acname) . '" and paymentype="' . base64_encode('Others') . '"') or die(mysql_errno());
          while ($row = mysql_fetch_array($qry)) {
          $sum+=base64_decode($row['amount']);
          }
          }
         *
         */
    }
    return $sum;
}

function expbalance($acname) {
    $sum = 0;
    $qry = mysql_query('select * from paymentout where transname="' . ($acname) . '"') or die(mysql_errno());
    while ($row = mysql_fetch_array($qry)) {
        $sum+=base64_decode($row['amount']);
    }

    return $sum;
}

function twende($acname) {
    $sum = 0;
    $qry = mysql_query('select * from membercontribution where transaction="' . ($acname) . '"') or die(mysql_errno());
    while ($row = mysql_fetch_array($qry)) {
        $sum+=base64_decode($row['amount']);
    }

    if (base64_decode($acname) == 'member deposits') {

        $qary = mysql_query('select * from sharesbf where status="' . base64_encode("active") . '"') or die(mysql_error());
        while ($rslt = mysql_fetch_array($qary)) {
            $sum+=base64_decode($rslt['sharesbf']);
        }
    }

    return $sum;
}

function twendes($acname, $date) {
    $sum = 0;
    $qry = mysql_query('select * from membercontribution where transaction="' . ($acname) . '" and date="' . base64_encode($date) . '"') or die(mysql_errno());
    while ($row = mysql_fetch_array($qry)) {
        $sum+=base64_decode($row['amount']);
    }

    if (base64_decode($acname) == 'member deposits') {

        $qary = mysql_query('select * from sharesbf where status="' . base64_encode("active") . '" and date="' . base64_encode($date) . '"') or die(mysql_error());
        while ($rslt = mysql_fetch_array($qary)) {
            $sum+=base64_decode($rslt['sharesbf']);
        }
    }

    return $sum;
}

function incbalance1($acname, $date) {
    $sum = 0;
    $qry = mysql_query('select * from paymentin where transname="' . ($acname) . '" and paymentype="' . base64_encode('Others') . '" and date="' . $date . '"') or die(mysql_errno());
    while ($row = mysql_fetch_array($qry)) {
        $sum+=base64_decode($row['amount']);
    }
    return $sum;
}

function expbalance1($acname, $date) {
    $sum = 0;
    $qry = mysql_query('select * from paymentout where transname="' . ($acname) . '" and date="' . $date . '"') or die(mysql_errno());
    while ($row = mysql_fetch_array($qry)) {
        $sum+=base64_decode($row['amount']);
    }

    return $sum;
}

function twende1($acname, $date) {
    $sum = 0;
    $qry = mysql_query('select * from membercontribution where transaction="' . ($acname) . '" and date="' . $date . '"') or die(mysql_errno());
    while ($row = mysql_fetch_array($qry)) {
        $sum+=base64_decode($row['amount']);
    }

    if (base64_decode($acname) == 'member deposits') {

        $qary = mysql_query('select * from sharesbf where status="' . base64_encode("active") . '" and date="' . $date . '"') or die(mysql_error());
        while ($rslt = mysql_fetch_array($qary)) {
            $sum+=base64_decode($rslt['sharesbf']);
        }
    }

    return $sum;
}

function loanbalss1($date) {

    $sumtot = 0;
    $mqry = mysql_query('select * from newmember where status="' . base64_encode("active") . '"') or die(mysql_error());
    while ($row = mysql_fetch_array($mqry)) {

        $sum4+=loan11(base64_decode($row['membernumber']), $date);
        $sum5+=loan22(base64_decode($row['membernumber']), $date);
        $sum6+=loan33(base64_decode($row['membernumber']), $date);
        $sum7+=loan44(base64_decode($row['membernumber']), $date);
        $sum8+=loan55(base64_decode($row['membernumber']), $date);
        $sum9+=loan66(base64_decode($row['membernumber']), $date);
        $suma+=loan77(base64_decode($row['membernumber']), $date);
        $sumtot = $sum4 + $sum5 + $sum6 + $sum7 + $sum8 + $sum9 + $suma;
    }

    return $sumtot;
}

function loanbalss() {

    $sumtot = 0;
    $mqry = mysql_query('select * from newmember where status="' . base64_encode("active") . '"') or die(mysql_error());
    while ($row = mysql_fetch_array($mqry)) {

        $sum4+=loan1(base64_decode($row['membernumber']));
        $sum5+=loan2(base64_decode($row['membernumber']));
        $sum6+=loan3(base64_decode($row['membernumber']));
        $sum7+=loan4(base64_decode($row['membernumber']));
        $sum8+=loan5(base64_decode($row['membernumber']));
        $sum9+=loan6(base64_decode($row['membernumber']));
        $suma+=loan7(base64_decode($row['membernumber']));
        $sumtot = $sum4 + $sum5 + $sum6 + $sum7 + $sum8 + $sum9 + $suma;
    }

    return $sumtot;
}

function loansum($membernumber) {
    $sum = 0;
    $qry = mysql_query('select * from loans where membernumber="' . ($membernumber) . '" and status="' . base64_encode('pending') . '"') or die(mysql_error());
    while ($row = mysql_fetch_array($qry)) {
        $sum+= base64_decode($row['amount']);
    }
    return $sum;
}

function loanratee($membernumber) {

    $qry = mysql_query('select * from loans where membernumber="' . ($membernumber) . '" and status="' . base64_encode('pending') . '"') or die(mysql_error());
    while ($row = mysql_fetch_array($qry)) {
        $rate = loanrates($row['transid']);
    }
    return $rate;
}

function loanpaid($membernumber) {
    $sum = 0;
    $aqry = mysql_query('select * from loans where membernumber="' . ($membernumber) . '" and status="' . base64_encode('pending') . '"') or die(mysql_error());
    while ($low = mysql_fetch_array($aqry)) {
        $qry = mysql_query('select * from loanpayment where mno="' . ($membernumber) . '" and transid="' . ($low['transid']) . '"') or die(mysql_error());
        while ($row = mysql_fetch_array($qry)) {
            $sum+= base64_decode($row['amount']);
        }
    }
    return $sum;
}

function loanbaki($membernumber) {

    $sum = (loansum($membernumber));

    return $sum;
}

function loanbakisha($membernumber) {

    $sum = (loansum($membernumber)) - loanpaid($membernumber);

    return $sum;
}

function loanreduced($membernumber) {

    $acnaqr = mysql_query('select * from loans where membernumber="' . $membernumber . '" and status="' . base64_encode('active') . '"') or die(mysql_error());
    while ($lrslt = mysql_fetch_array($acnaqr)) {
        $loanamt+= loanbakisha($membernumber);
        $rate+= (loanratee($membernumber) / 100) / 12;
        $intrst = $rate * $loanamt;
    }
    return $intrst;
}

function loanprireduced($membernumber) {
    $tcum = 0;

    $xqry = mysql_query('select * from loans where membernumber="' . $membernumber . '" and status="' . base64_encode('active') . '"') or die(mysql_error());
    while ($low = mysql_fetch_array($xqry)) {
        $tcum+=base64_decode($low['monthlypayment']);
        $sthree = $tcum - loanreduced($membernumber);
    }
    return $sthree;
}

function loanreverse($tid, $mno) {

    $check = mysql_query('select * from loanapplication where transactionid="' . ($tid) . '"') or die(mysql_error());

    if (mysql_num_rows($check) >= 1) {

        $inv = mysql_query('DELETE FROM loanapplication where transactionid="' . ($tid) . '"') or die(mysql_error());
        $inv1 = mysql_query('DELETE FROM loans where transid="' . ($tid) . '"') or die(mysql_error());
        $inv10 = mysql_query('DELETE FROM loandisburse where transid="' . ($tid) . '"') or die(mysql_error());
        $inv2 = mysql_query('DELETE FROM loanpayment where transid="' . ($tid) . '"') or die(mysql_error());
        $inv3 = mysql_query('DELETE FROM loanintrests where transid="' . ($tid) . '"') or die(mysql_error());
        $inv5 = mysql_query('DELETE FROM loanbal where mno="' . ($mno) . '"') or die(mysql_error());
        $inv6 = mysql_query('DELETE FROM paymentin where transid="' . ($tid) . '"') or die(mysql_error());
        $inv4 = mysql_query('DELETE FROM guarantors where transactionid="' . ($tid) . '"') or die(mysql_error());
        $inv16 = mysql_query('DELETE FROM membercontribution where   transid="' . ($tid) . '"') or die(mysql_error());
        $inv14 = mysql_query('DELETE FROM loanrepaydates  WHERE tid= "' . ($tid) . '"   ') or die(mysql_error());
        $inv15 = mysql_query('DELETE FROM fines WHERE tid= "' . ($tid) . '" ') or die(mysql_error());
        $sth = mysql_query('DELETE FROM  loaninsurance WHERE tid= "' . ($tid) . '" ') or die(mysql_error());
        $stll = mysql_query('DELETE   FROM  loandisbursment WHERE tid= "' . ($tid) . '" ');
        $acno = getloangl(loanname($tid));
        $stl = mysql_query("DELETE FROM memberaccs WHERE glaccid='" . base64_encode($acno) . "'    ");
    } else {
        $alertno = '<script type="text/javascript">alert("loan revesal failed!");
                document.location.href = "loandel.php";</script>';
        echo $alertno;
    }

    if ($inv || $inv1 || $inv10 || $inv2 || $inv3 || $inv5 || $inv6 || $inv4 || $inv16 || $inv14 || $inv15 || $sth || $stll || $stl) {

        $alertyes = '<script type="text/javascript">alert("Loan Transaction ' . base64_decode($tid) . ' for ' . getMembername($mno) . ' has been successfully Reversed");
                document.location.href = "loandel.php";</script>';
        echo $alertyes;
    }
}

function dividends($year, $amt) {
    $mqry = mysql_query('select * from newmember where status="' . base64_encode("active") . '"') or die(mysql_error());
    while ($row = mysql_fetch_array($mqry)) {

        $one = sumtotalforamember(base64_decode($row['membernumber']));
        $two = shares(base64_decode($row['membernumber']));
        $three+= sumtotalforamember(base64_decode($row['membernumber']));
        $four+= shares(base64_decode($row['membernumber']));

        $five = $one + $two;
        $six = $three + $four;

        $seven = $five / $six;
        $eight = $amt * $seven;

        if ($eight) {
            $draw = mysql_query('insert into divimembers values("' . base64_encode($_SESSION['users']) . '","' . base64_encode($year) . '","' . base64_encode($amt) . '"
    ,"' . ($row['membernumber']) . '", "' . base64_encode($eight) . '", "' . base64_encode(date('d-M-Y')) . '","")') or die(mysql_error());
        }

//if ($draw) {
//echo '<span class="green" >Loan Transaction has been successfully saved.</span></br>';
//}
    }
}

function minisummary($user, $mno, $datefrom, $dateto) {
    $mqry = mysql_query('select * from newmember where membernumber="' . base64_encode($mno) . '" and status="' . base64_encode("active") . '"') or die(mysql_error());
    if (mysql_num_rows($mqry) == 1) {



        //$balBF = accountBalanceBF($mno, $acc, $datefrom);
        $s = strtotime($datefrom);
        $t = strtotime($dateto);
        if ($t < $s) {
            echo '<span class="red">Sorry Please enter search dates correctly</span></br>';
        } else {


            echo '<div id="mt" style=" width:80%;  "><table  class="table table-striped  table-bordered table-hover sorting_asc_disabled"  id="sample_2">  
                <tr><th colspan="4"><h3 align="center"><b>Summarized Account Statements</b></h3></th></tr>
                     <tr><th colspan="4"><h4 align="center"><b>' . compname() . '</b></h4></th></tr>
                   <tr><th>Date Range</th><th>Member Number</th><th colspan="2">Member Name</th></tr>
        <tr><td><center>' . $datefrom . ' to ' . $dateto . '</center></td><td><center>' . $mno . '</center></td><td colspan="2"><center>' . getMembername(base64_encode($mno)) . '</center></td></tr>

</tr>
        <tr><th colspan="4">ACCOUNT SUMMARY</th></tr>
        <tr><th>Date</th><th>Transaction</th><th colspan="2">Balances</th></th>';
            //echo '<tr><td></td><th>Compulsory Shares</th><td colspan="2"><center>' . getsymbol() . ' ' . number_format(compshare($mno, $datefrom, $dateto), 2) . '<center></td></tr>';
            //echo '<tr><td></td><th>Compulsory Savings</th><td colspan="2"><center>' . getsymbol() . ' ' . number_format(comsaving($mno, $datefrom, $dateto), 2) . '<center></td></tr>';
            getmemberaccounts($mno);
            while ($s <= $t) {

                $vvqry = mysql_query('select * from loans where membernumber="' . base64_encode($mno) . '" and date="' . base64_encode(date("d-M-Y", $s)) . '" and status="' . base64_encode("active") . '"') or die(mysql_error());
                while ($rgw = mysql_fetch_array($vvqry)) {
                    $tid = ($rgw['transid']);
                    $summ+=principlepaid($tid);

                    echo '<tr><td>' . date("d-M-Y") . '</td><th>' . loanname($rgw['transid']) . '</td><td colspan="2"><center>' . getsymbol() . ' ' . number_format(principlepaid($rgw['transid']), 2) . '</center></td></tr>';
                }

                $zxxqry = mysql_query('select * from sharesbf where memberno="' . base64_encode($mno) . '" and date="' . base64_encode(date("d-M-Y", $s)) . '"') or die(mysql_error());
                if (mysql_num_rows($zxxqry) >= 1) {
                    while ($vow = mysql_fetch_array($zxxqry)) {
                        $bals = $vow['sharesbf'];
                        echo '<tr><td><center>' . base64_decode($vow['date']) . '</center></td><th>Balances B/f</td><td colspan="2"><center>' . getsymbol() . ' ' . number_format(base64_decode($bals), 2) . '</center></td></tr>';
                    }
                }


                $s = $s + 86400; //increment date by 86400 seconds(1 day) 
            }

            echo '<tr><td></td><th>Total Loan</td><td colspan="2"><center>' . getsymbol() . ' ' . number_format($summ, 2) . '</center></td></tr>';

            echo '</table></div>';
        }
    } else {
        echo '<span class="red">Sorry Member not found</span></br>';
    }
    echo '<div class="col-md-4"><button  class="btn green"value="Print this page" onClick="return printResults()">Print</button></div>';
}



function ccc($user, $mno, $datefrom, $dateto) {
    $mqry = mysql_query('select * from newmember where membernumber="' . base64_encode($mno) . '" and status="' . base64_encode("active") . '"') or die(mysql_error());
    if (mysql_num_rows($mqry) == 1) {

//utc of start and end dates
        $s = strtotime($datefrom);
//$e=mktime(0,0,0,$em, $ed, $ey);
        $t = strtotime($dateto);
        if ($t < $s) {
            echo '<span class="red" >Sorry Please enter search dates correctly</span></br>';
        } else {


            echo '<table  class="table table-striped  table-bordered table-hover sorting_asc_disabled"  id="sample_2">
    <tr>
    <thead>
    <th>Item</th>
    <th>January</th>
    <th>February</th>
    <th>March</th>
    <th>April</th>
    <th>May</th>
    <th>June</th>
    <th>July</th>
    <th>August</th>
    <th>September</th>
    <th>October</th>
    <th>November</th>
    <th>December</th>
    <th>TOTAL</th>
      </thead>
    </tr>';
            while ($s <= $t) {

//echo date("d-M-Y", $s).'</br>';
//statementin(date("d-M-Y", $s), $mno);

                $vvqry = mysql_query('select * from loans where membernumber="' . base64_encode($mno) . '" and date="' . base64_encode(date("d-M-Y", $s)) . '"') or die(mysql_error());
                while ($rgw = mysql_fetch_array($vvqry)) {
                    $scb = ($rgw['amount']);
//$scbb+= base64_decode($rgw['amount']);

                    echo '<tr><td></td><th>' . loanname($rgw['transid']) . '</td><td colspan="2"><center>' . getsymbol() . '.' . number_format(principlepaid($rgw['transid']), 2) . '</center></td></tr>';
                }

                $zxxqry = mysql_query('select * from sharesbf where memberno="' . base64_encode($mno) . '" and date="' . base64_encode(date("d-M-Y", $s)) . '"') or die(mysql_error());
                if (mysql_num_rows($zxxqry) >= 1) {
                    while ($vow = mysql_fetch_array($zxxqry)) {
                        $bals = $vow['sharesbf'];
                        $bbb+=base64_decode($bals);

                        echo '<tr><td><center>' . base64_decode($vow['date']) . '</center></td><th>Balances B/f</td><td>' . getsymbol() . '.0.00</th><td>' . getsymbol() . '.' . number_format(base64_decode($bals), 2) . '</td></tr>';
                    }
                }

                $qry = mysql_query('select * from membercontribution where memberno="' . base64_encode($mno) . '" and date="' . base64_encode(date("d-M-Y", $s)) . '" and transaction="' . base64_encode("member deposits") . '"') or die(mysql_error());
                if (mysql_num_rows($qry) >= 1) {
                    while ($row = mysql_fetch_array($qry)) {
                        $sumin = $row['amount'];
                        $sss+=base64_decode($sumin);

                        echo '<tr><td><center>' . base64_decode($row['date']) . '</center></td><td>' . base64_decode($row['transaction']) . '</td><td>' . getsymbol() . '.0.00</td><td>' . getsymbol() . '.' . number_format(base64_decode($sumin), 2) . '</td></tr>';
                    }
                }

//statementout(date("d-M-Y", $s), $mno);

                $acnaqry = mysql_query('select * from accounts where actype="' . base64_encode("Fines") . '"') or die(mysql_error());
                while ($row1 = mysql_fetch_array($acnaqry)) {
                    $qry = mysql_query('select * from paymentin where transname="' . $row1['acname'] . '" and payeeid="' . base64_encode($mno) . '" and date="' . base64_encode(date("d-M-Y", $s)) . '"') or die(mysql_error());
                    while ($row = mysql_fetch_array($qry)) {

                        $fine = $row['amount'];
                        $finee+=base64_decode($fine);

                        echo '<tr><td><center>' . base64_decode($row['date']) . '</center></td><td>' . base64_decode($row['transname']) . '</td><td>' . getsymbol() . '.' . number_format(base64_decode($fine), 2) . '</td><td>' . getsymbol() . '.0.00</td></tr>';
                    }
                }
                $adqry = mysql_query('select * from paymentin where  paymentype="' . base64_encode("adjustments") . '" and payeeid="' . base64_encode($mno) . '" and date="' . base64_encode(date("d-M-Y", $s)) . '"') or die(mysql_error());
                while ($row2 = mysql_fetch_array($adqry)) {

                    $adj = $row2['amount'];
                    $adjj+=base64_decode($adj);

                    echo '<tr><td><center>' . base64_decode($row2['date']) . '</center></td><td>' . base64_decode($row2['transname']) . '</td><td>' . getsymbol() . '.' . number_format(base64_decode($adj), 2) . '</td><td>' . getsymbol() . '.0.00</td></tr>';
                }

                $cac = mysql_query('select * from loansettings where status="' . base64_encode("Active") . '"') or die(mysql_error());
                while ($lrslt = mysql_fetch_array($cac)) {
                    $qryc = mysql_query('select * from membercontribution where memberno="' . base64_encode($mno) . '" and transaction="' . $lrslt['lname'] . '" and date="' . base64_encode(date("d-M-Y", $s)) . '"') or die(mysql_error());
                    if (mysql_num_rows($qryc) >= 1) {
                        while ($row = mysql_fetch_array($qryc)) {

                            $loa = $row['amount'];
                            $loaa+=base64_decode($loa);
                            echo '<tr><td><center>' . base64_decode($row['date']) . '</center></td><td>' . base64_decode($row['transaction']) . '</td><td>' . getsymbol() . '.0.00</td><td>' . getsymbol() . '.' . number_format(base64_decode($loa), 2) . '</td></tr>';
                        }
                    }
                }


                $qac = mysql_query('select * from loansettings where status="' . base64_encode("Active") . '"') or die(mysql_error());
                while ($lrslt = mysql_fetch_array($qac)) {
                    $qry = mysql_query('select * from membercontribution where memberno="' . base64_encode($mno) . '" and transaction="' . $lrslt['lname'] . '" and date="' . base64_encode(date("d-M-Y", $s)) . '"') or die(mysql_error());
                    if (mysql_num_rows($qry) >= 1) {
                        while ($row = mysql_fetch_array($qry)) {

                            $los = $row['amount'];
                            $loss+=base64_decode($los);
                            echo '<tr><td><center>' . base64_decode($row['date']) . '</center></td><td>' . base64_decode($row['transaction']) . '</td><td>' . getsymbol() . '.' . number_format(base64_decode($los), 2) . '</td><td>' . getsymbol() . '.0.00</td></tr>';
                        }
                    }
                }

                $sumout = $loss + $lopp + $stoo + $adjj + $finee;
                $sin = $bbb + $sss + $loaa;

                $s = $s + 86400; //increment date by 86400 seconds(1 day)

                $bal = $sin - $sumout;
            }
            echo '<tr><th>Total</th><td></td><td>' . getsymbol() . '.' . number_format($sumout, 2) . '</td>
        <td>' . getsymbol() . '.' . number_format($sin, 2) . '</td></tr>
            <tr><th>Balance</th><td></td><td colspan="2"><center>' . getsymbol() . '.' . number_format($bal, 2) . '</center></td></tr>
                </table>';

//<tr><th>Net Balance</th><td></td><td colspan="2"><center>' . getsymbol() . '.' . number_format(netstatementbl($user, $mno, $dfrom, $mfrom, $yfrom, $dto, $mto, $yto), 2) . '</center></td></tr>
        }
    } else {
        echo '<span class="red" >Sorry Member not found</span></br>';
    }
    echo '<div class="col-md-2"><div class="noprint"><button class="btn green"value="Print this page" onclick="print()">Print</button></div></div>';
}

function newcashbk($user, $datefrom, $dateto) {
    $mqry = mysql_query('select * from users where id="' . ($user) . '" and status="' . base64_encode("Active") . '"') or die(mysql_error());
    if (mysql_num_rows($mqry) == 1) {

        $s = strtotime($datefrom);
//$e=mktime(0,0,0,$em, $ed, $ey);
        $t = strtotime($dateto);
        if ($t < $s) {
            echo '<span class="red" >Sorry Please enter search dates correctly</span></br>';
        } else {

            $coo = mysql_query('SELECT Count(id) FROM accounts WHERE actype= "' . base64_encode('Income') . '"') or die(mysql_error());
            while ($row = mysql_fetch_array($coo)) {
                $sdumin = $row['Count(id)'] + 2;
            }

            $doo = mysql_query('SELECT Count(id) FROM accounts WHERE actype= "' . base64_encode('Expense') . '"') or die(mysql_error());
            while ($bow = mysql_fetch_array($doo)) {
                $sdmin = $bow['Count(id)'] + 1;
            }

            echo '<table  class="table table-striped  table-bordered table-hover sorting_asc_disabled"  id="sample_2">
    <tr>
    <thead>
    <th colspan="2">Details</th>
    <th colspan="' . $sdumin . '">Income</th>
    <th colspan="' . $sdmin . '">Expenses</th>
    <th colspan="1">Bank Balance</th>
    </thead>
    </tr>
        <tr>
    <thead>
    <th>Date</th>
    <th>Description</th>
    <th>Capital</th>';

            $zyx = mysql_query('select * from accounts where actype="' . base64_encode('Income') . '" and status="' . base64_encode("Active") . '"') or die(mysql_error());
            while ($row = mysql_fetch_array($zyx)) {

                echo '<th>' . base64_decode($row["acname"]) . '</th>';
            }

            echo '<th>Total</th>';

            $xzyx = mysql_query('select * from accounts where actype="' . base64_encode('Expense') . '" and status="' . base64_encode("Active") . '"') or die(mysql_error());
            while ($xow = mysql_fetch_array($xzyx)) {

                echo '<th>' . base64_decode($xow["acname"]) . '</th>';
            }

            echo '<th>Total</th>
    <th>Bank Balance</th>
    </thead>
    </tr>';


            while ($s <= $t) {

                $qcry = mysql_query('select * from membercontribution where date="' . base64_encode(date("d-M-Y", $s)) . '"') or die(mysql_errno());
//where date="' . base64_encode($date) . '"
                while ($row = mysql_fetch_array($qcry)) {
                    $suma+=base64_decode($row['amount']);
//}

                    $qary = mysql_query('select * from sharesbf where status="' . base64_encode("active") . '" and date="' . base64_encode(date("d-M-Y", $s)) . '"') or die(mysql_error());
                    while ($rslt = mysql_fetch_array($qary)) {
                        $sumb+=base64_decode($rslt['sharesbf']);
                    }

                    $sum = $suma;
//+ $sumb;

                    echo '<td>' . date('d-M-Y') . '</td><td>Starting Balance</td><td>' . number_format($sum, 2) . '</td>';
                }
                echo '<tr>';

                $adqry = mysql_query('select * from paymentin') or die(mysql_error());
                while ($row2 = mysql_fetch_array($adqry)) {

                    $adj = $row2['amount'];
                    $adjj+=base64_decode($adj);

                    echo '<td>' . getsymbol() . '.' . number_format(base64_decode($adj), 2) . '</td>';
                }

                echo '</tr>';

                $s = $s + 86400; //increment date by 86400 seconds(1 day)
            }

            echo '<tr><th>Total</th><td></td><td>' . getsymbol() . '.' . number_format($sumout, 2) . '</td>
        <td>' . getsymbol() . '.' . number_format($sin, 2) . '</td><td colspan="' . $sdumin . '"></td><td colspan="' . $sdmin . '"></td></tr>
            <tr><th>Balance</th><td></td><td colspan="2"><center>' . getsymbol() . '.' . number_format($bal, 2) . '</center></td><td colspan="' . $sdumin . '"></td><td colspan="' . $sdmin . '"></td></tr>
                </table>';

//<tr><th>Net Balance</th><td></td><td colspan="2"><center>' . getsymbol() . '.' . number_format(netstatementbl($user, $mno, $dfrom, $mfrom, $yfrom, $dto, $mto, $yto), 2) . '</center></td></tr>
        }
    } else {
        echo '<span class="red" >Sorry You are not Permitted to view this page.</span></br>';
    }
    echo '<div class="col-md-2"><div class="noprint"><button class="btn green"value="Print this page" onclick="print()">Print</button></div></div>';
}

function cashbk($id, $datefrom, $dateto) {

    $mqry = mysql_query('select * from users where id="' . ($id) . '" and status="' . base64_encode("Active") . '"') or die(mysql_error());
    if (mysql_num_rows($mqry) == 1) {

        $s = strtotime($datefrom);
//$e=mktime(0,0,0,$em, $ed, $ey);
        $t = strtotime($dateto);
        if ($t < $s) {

            echo '<span class="red" >Sorry Please enter search dates correctly</span></br>';
        } else {

            $eoo = mysql_query('SELECT Count(id) FROM accounts WHERE actype= "' . base64_encode('Capital') . '"') or die(mysql_error());
            while ($row = mysql_fetch_array($eoo)) {
                $sdymin = $row['Count(id)'];
            }

            $coo = mysql_query('SELECT Count(id) FROM accounts WHERE actype= "' . base64_encode('Income') . '"') or die(mysql_error());
            while ($row = mysql_fetch_array($coo)) {
                $sdumin = $row['Count(id)'];
            }

            $doo = mysql_query('SELECT Count(id) FROM accounts WHERE actype= "' . base64_encode('Expense') . '"') or die(mysql_error());
            while ($bow = mysql_fetch_array($doo)) {
                $sdmin = $bow['Count(id)'] + 1;
            }
            $sss = $sdumin + $sdymin;

            echo '<table  class="table table-striped  table-bordered table-hover sorting_asc_disabled"  id="sample_2">
    <tr>
    <thead>
    <th colspan="2">Details</th>
    <th colspan="' . $sss . '">Income</th>
    <th colspan="' . $sdmin . '">Expenses</th>
    <th>Bank Balance</th>
    </thead>
    </tr>
    <tr>
    <thead>
    <th>Date</th>
    <th>Description</th>';

            $zvyx = mysql_query('select * from accounts where actype="' . base64_encode('Capital') . '" and status="' . base64_encode("Active") . '"') or die(mysql_error());
            while ($row = mysql_fetch_array($zvyx)) {

                echo '<th>' . base64_decode($row["acname"]) . '</th>';
            }

            $zyx = mysql_query('select * from accounts where actype="' . base64_encode('Income') . '" and status="' . base64_encode("Active") . '"') or die(mysql_error());
            while ($row = mysql_fetch_array($zyx)) {

                echo '<th>' . base64_decode($row["acname"]) . '</th>';
            }

            echo '<th>Total</th>';

            $xzyx = mysql_query('select * from accounts where actype="' . base64_encode('Expense') . '" and status="' . base64_encode("Active") . '"') or die(mysql_error());
            while ($xow = mysql_fetch_array($xzyx)) {

                echo '<th>' . base64_decode($xow["acname"]) . '</th>';
            }

            echo '<th>Total</th>
    <th>Bank Balance</th>
    </thead>
    </tr>';

            while ($s <= $t) {

                $sum = 0;
//$mqry = mysql_query('select * from income where status="' . base64_encode("active") . '"') or die(mysql_error());
//while ($row = mysql_fetch_array($mqry)) {
//$mqry = mysql_query('select * from sharesbf where date="' . base64_encode(date("d-M-Y", $s)) . '"') or die(mysql_error());
//while ($row = mysql_fetch_array($mqry)) {

                echo '<tr><td>' . date('d-M-Y') . '</td><td>Starting Balance</td><td colspan="' . $sdmin . '"></td><td colspan="' . $sss . '"></td><td>' . number_format(bankbal(date("d-M-Y", $s)), 2) . '</td></tr>';

                echo '<tr><td colspan="2"></td>';

                $czyx = mysql_query('select * from accounts where actype="' . base64_encode('Capital') . '" and status="' . base64_encode("Active") . '"') or die(mysql_error());
                while ($arow = mysql_fetch_array($czyx)) {

                    echo '<td>' . number_format(capitalcb($arow["acname"]), 2) . '</td>';

                    $scapitalcb+= capitalcb($arow["acname"]);
                }

                $azyx = mysql_query('select * from accounts where actype="' . base64_encode('Income') . '" and status="' . base64_encode("Active") . '"') or die(mysql_error());
                while ($arow = mysql_fetch_array($azyx)) {

                    echo '<td>' . number_format(incomecb($arow["acname"]), 2) . '</td>';

                    $sincomecb+= incomecb($arow["acname"]);
                    $sumincome = $scapitalcb + $sincomecb;
                }
                echo '<td>' . number_format($sumincome) . '</td>';

                echo '<td colspan="' . $sss . '"></td></tr><tr><td colspan="2"></td><td colspan="' . $sss . '"></td>';

                $vzyx = mysql_query('select * from accounts where actype="' . base64_encode('Expense') . '" and status="' . base64_encode("Active") . '"') or die(mysql_error());
                while ($vow = mysql_fetch_array($vzyx)) {

                    echo '<td>' . number_format(expensecb($vow["acname"]), 2) . '</td>';

                    $sumexpensecb+= expensecb($vow["acname"]);
                }

                $totalcb = $sumincome - $sumexpensecb;

                echo '<td>' . number_format($sumexpensecb, 2) . '</td><td></td></tr>
                <tr><td>' . date('d-M-Y') . '</td><td>Closing Balance</td><td colspan="' . $sss . '"></td><td colspan="' . $sdmin . '"></td><td>' . number_format($totalcb, 2) . '</td>';

                $s = $s + 86400; //increment date by 86400 seconds(1 day)
            }

            echo '</tr></table></div>';
        }
    } else {
        echo '<span class="red" >Sorry You are not authorized to view this page.</span></br>';
    }
    echo '<div class="col-md-4"><button class="btn green"value="Print this page" onClick="return printResults()">Print</button></div>';
}

function setnextdate($old, $sum2, $sum3a) {

    $two = date("d-M-Y", strtotime($old));

    $newmonth = date("d-M-Y", strtotime("$two +1 month"));

    $chqqry = mysql_query('select * from finbalances where startdate="' . base64_encode($newmonth) . '"') or die(mysql_error());
    if (mysql_num_rows($chqqry) >= 1) {
        
    } else {

        $gqry = mysql_query('insert into finbalances values("","' . base64_encode($newmonth) . '","' . base64_encode($sum3a) . '","' . base64_encode($sum2) . '","' . base64_encode(date("d-M-Y")) . '")') or die(mysql_error());
    }
}

function balt($user, $datefrom, $dateto) {
    $mqry = mysql_query('select * from users where id="' . ($user) . '"') or die(mysql_error());
    if (mysql_num_rows($mqry) == 1) {

        $s = strtotime($datefrom);
        $t = strtotime($dateto);
        if ($t < $s) {
            echo '<span class="red" >Sorry Please enter search dates correctly</span></br>';
        } else {

            echo '<table  class="table table-striped  table-bordered table-hover sorting_asc_disabled"  id="sample_2">
        <tr>
        <tr><th colspan="4">' . compname() . '</th></tr>
        <tr><th>Date Range</th><th>TRIAL BALANCE</th><th>Date Generated</th></tr>
        <tr><td><center>' . $datefrom . ' to ' . $dateto . '</center></td><td></td><td colspan="2"><center>' . (date('d-M-Y')) . '</center></td></tr>
        </tr>
        <tr><th>Account</th><th>Debit</th><th>Credit</th></tr>';

            while ($s <= $t) {

                $yoy = mysql_query('select * from accounts where actype="' . base64_encode("Capital") . '"') or die(mysql_error());
                while ($wow = mysql_fetch_array($yoy)) {

                    $vvqry = mysql_query('select * from membercontribution where transaction="' . $wow['acname'] . '" and date="' . base64_encode(date("d-M-Y", $s)) . '"') or die(mysql_error());
                    while ($rgw = mysql_fetch_array($vvqry)) {

                        $scb+= base64_decode($rgw['amount']);

//$scbb+= base64_decode($rgw['amount']);
                    }
                }
                echo '<tr><th>Capital</td><td><center>' . getsymbol() . '. 0.00 </center></td><td><center>' . getsymbol() . '.' . number_format($scb, 2) . '</center></td></tr>';


                $s = $s + 86400; //increment date by 86400 seconds(1 day)

                $bal = $sin - $sumout;
            }

            echo '<tr><th>Total Loans</td><td><center>' . getsymbol() . '.' . number_format($summ, 2) . '</center></td><td><center>' . getsymbol() . '.' . number_format($summ, 2) . '</center></td></tr>';

            echo '</table>';
        }
    } else {
        echo '<span class="red" >Sorry User Rights not found</span></br>';
    }
    echo '<div class="col-md-2"><div class="noprint"><button class="btn green"value="Print this page" onClick="return printResults()">Print</button></div></div>';
}

function debtacc($user, $acc, $datefrom, $dateto) {
    $mqry = mysql_query('select * from users where id="' . $user . '" and status="' . base64_encode("Active") . '"') or die(mysql_error());
    if (mysql_num_rows($mqry) == 1) {

        $s = strtotime($datefrom);
//$e=mktime(0,0,0,$em, $ed, $ey);
        $t = strtotime($dateto);
        if ($t < $s) {
            echo '<span class="red" >Sorry Please enter search dates correctly</span></br>';
        } else {


            echo '<table  class="table table-striped  table-bordered table-hover sorting_asc_disabled"  id="sample_2">
                <tr><th colspan="4">' . compname() . '</th></tr>
                 </tr>
        <tr><th colspan="4">DEBTORS ACCOUNT</th></tr>
        <tr><th>Date</th><th>Transaction</th><th>Money out</th><th>Money in</th></th>';

            $vvqry = mysql_query('select * from checkoff') or die(mysql_error());
            while ($rgw = mysql_fetch_array($vvqry)) {
                $abc+= base64_decode($rgw['contr']);
                $def+= base64_decode($rgw['xmas']);
                $ghi+= base64_decode($rgw['shares']);
                $jkl+= base64_decode($rgw['entrance']);
                $mno+= base64_decode($rgw['principle']);
                $pqr+= base64_decode($rgw['interest']);

                $newamt = $abc + $def + $ghi + $jkl + $mno + $pqr;
                $amt = $newamt;
//$scbb+= base64_decode($rgw['amount']);
                $date = base64_decode($rgw['date']);
            }
            echo '<tr><td></td><th>' . $date . '</td><td>' . getsymbol() . '.' . number_format(($amt), 2) . '</td><td>' . getsymbol() . '.0.00</td></tr>';

            $qry = mysql_query('select * from membercontribution where transaction="' . base64_encode(getaccname($acc)) . '"') or die(mysql_error());
            if (mysql_num_rows($qry) >= 1) {
                while ($row = mysql_fetch_array($qry)) {
                    $sumin = $row['amount'];
                    $sss+=base64_decode($sumin);
                    $date = base64_decode($row['date']);
                }
                echo '<tr><td></td><th>' . $date . '</th><td>' . getsymbol() . '.0.00</td><td>' . getsymbol() . '.' . number_format(base64_decode($sumin), 2) . '</td></tr>';
            }

            while ($s <= $t) {


                $sumout = $newamt;
//$loss + $lopp + $stoo + $adjj + $finee;
                $sin = $sss;
//$bbb + $sss + $loaa;

                $s = $s + 86400; //increment date by 86400 seconds(1 day)

                $bal = $sin - $sumout;
            }
            echo '<tr><th>Total</th><td></td><td>' . getsymbol() . ' ' . number_format($sumout, 2) . '</td>
        <td>' . getsymbol() . ' ' . number_format($sin, 2) . '</td></tr>
            <tr><th>Balance</th><td></td><td colspan="2"><center>' . getsymbol() . ' ' . number_format($bal, 2) . '</center></td></tr>
                </table>';

//<tr><th>Net Balance</th><td></td><td colspan="2"><center>' . getsymbol() . '.' . number_format(netstatementbl($user, $mno, $dfrom, $mfrom, $yfrom, $dto, $mto, $yto), 2) . '</center></td></tr>
        }
    } else {
        echo '<span class="red" >Sorry Member not found</span></br>';
    }
    echo '<div class="col-md-2"><div class="noprint"><button class="btn green"value="Print this page" onClick="return printResults()">Print</button></div></div>';
}

function getaccid($id) {

    $joz = mysql_query('select * from accounts where acname="' . base64_encode($id) . '"');
    $result = mysql_fetch_array($joz);
    return $result['id'];
}

function calcRev() {

    $dfrom = date("d");
    $mfrom = date("M");
    $yfrom = date("Y");

    $dto = date("d");
    $mto = date("M");
    $yto = date("Y");
//$date = $day . '-' . $month . '-' . $year;
//$date=date("d-M-Y");
    $mtotal = 0;
    $intotal = 0;
    $extotal = 0;
    $sm = date("m", strtotime($mfrom));
    $sd = $dfrom;
    $sy = $yfrom;
//
//$tm = date("m", strtotime($mto));
    $tm = date("m", strtotime($mto));
//$td = $dto;
    $td = $dto;
//$ty = $yto;
    $ty = $yto;

//utc of start and end dates
    $s = mktime(0, 0, 0, $sm, $sd, $sy);
//$e=mktime(0,0,0,$em, $ed, $ey);
    $t = mktime(0, 0, 0, $tm, $td, $ty);
    if ($t < $s) {
        
    } else {
        while ($s <= $t) {
//echo date("d-M-Y", $s).'</br>';


            $acry = mysql_query('select * from glaccounts where accgroup = "' . getaccid("CAPITAL") . '"') or die(mysql_error());
            while ($row1 = mysql_fetch_array($acry)) {
                $mqry = mysql_query('select * from membercontribution where date = "' . base64_encode(date("d-M-Y", $s)) . '" and transaction = "' . base64_encode($row1['id']) . '"') or die(mysql_error());
                while ($row = mysql_fetch_array($mqry)) {
                    $mtotal+=base64_decode($row['amount']);
                }
            }

            $sth = mysql_query('select * from glaccounts where accgroup = "' . getaccid("INCOME") . '"') or die(mysql_error());
            while ($row4 = mysql_fetch_array($sth)) {
                $inqry = mysql_query('select * from paymentin where transname="' . base64_encode($row4['id']) . '" and date = "' . base64_encode(date("d-M-Y", $s)) . '"') or die(mysql_error());
                while ($row3 = mysql_fetch_array($inqry)) {
                    $intotal+=base64_decode($row3['amount']);
                }
            }

            $s = $s + 86400; //increment date by 86400 seconds(1 day)

            return $mtotal + $intotal;
        }
    }
}

function viewm($user, $to) {
    if ($to == "word") {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=document_name.doc");
        viewfeedback();
        $users = new Users();
        $activity = "Exported feed back details to " . $to;
        $users->audittrail($user, $activity);
    }
    if ($to == "excel") {
        header("Content-type: application/vnd.ms-excel");
        header("Content-Disposition: attachment;Filename=document_name.xls");
        viewfeedback();
        $users = new Users();
        $activity = "Exported feed back details to " . $to;
        $users->audittrail($user, $activity);
    }
    if ($to == "pdf") {
//include_once './tcp/examples/example_003.php';
//$txt.=viewmembers();
//header('location:./tcp/examples/example_006.php');
        $users = new Users();
        $activity = "Exported feed back details to " . $to;
        $users->audittrail($user, $activity);
    }
}

function credittotal() {
    $total = 0;

    $Rows = mysql_query("SELECT  credit FROM  forbank  ");

    while ($row = mysql_fetch_array($Rows)) {
        $total+=base64_decode($row ['credit']);
    }

    return $total;
}

function debittotal() {
    $total = 0;

    $Rows = mysql_query("SELECT  debit FROM  forbank  ");

    while ($row = mysql_fetch_array($Rows)) {
        $r = base64_decode($row['debit']);
        $total+=$r;
    }

    return $total;
}

function collateralupdate($user, $id, $mno, $descr, $idno, $value, $status, $comment, $image) {

// update data in mysql database
    $sql = "UPDATE collateral SET image='" . base64_encode($image) . "', name='" . base64_encode($descr) . "', mno='" . base64_encode($mno) . "', idno='" . base64_encode($idno) . "', value='" . base64_encode($value) . "', status='" . base64_encode($status) . "', comment='" . base64_encode($comment) . "' WHERE id='" . $id . "'";
    $result = mysql_query($sql);
    mysql_query($result);

// if successfully updated.
    if ($result) {

        $users = new Users();
        $activity = "updated collateral no " . getcollateral($id);
        $users->audittrail($user, $activity, $mno);
        $alertyes = '<script type="text/javascript">alert("Editing was Successful!");
                       document.location.href = "viewcollateral.php";</script>';
        $alertfail = '<script type="text/javascript">alert("Editing Failed!!");</script>';
        echo $alertyes;
    } else {
        echo $alertfail;
    }
}

function caldbcammount($accode) {
    $sth = mysql_query(" select * from   assets where accountid='$accode'  ");  //
    while ($row11 = mysql_fetch_array($sth)) {
        $total = base64_decode($row11['asvalue']);
        return $total;
    } {
        $total = '0.00';
        return $total;
    }
}

function calcrcammount($accode) {
    $sth = mysql_query(" select * from   liabilities where accountid='$accode'  ");  //
    while ($row11 = mysql_fetch_array($sth)) {
        $total = base64_decode($row11['lamount']);
        return $total;
    } {
        $total = '0.00';
        return $total;
    }
}

function messages() {
    $message = '';
    if ($_SESSION['success'] != '') {
        $message = '<div class="alert alert-success">' . $_SESSION['success'] . '</div>';
        $_SESSION['success'] = '';
    }
    if ($_SESSION['error'] != '') {
        $message = '<div class="alert alert-danger">' . $_SESSION['error'] . '</div>';
        $_SESSION['error'] = '';
    }
    echo "$message";
}

function assetcatupdate($user, $id, $ccode, $cname, $fagl, $pldep, $pldis, $bsdep) {

// update data in mysql database
    $sql = "UPDATE fixedassetscategory SET catcode='" . base64_encode($ccode) . "', catdesc='" . base64_encode($cname) . "', facglcode='" . base64_encode($fagl) . "', pldeglcode='" . base64_encode($pldep) . "', pldiglcode='" . base64_encode($pldis) . "', bsdglcode='" . base64_encode($bsdep) . "' WHERE id='" . $id . "'";

    $result = mysql_query($sql);
    mysql_query($result);
// if successfully updated.
    if ($result) {
        $users = new Users();
        $activity = "updated account settings for " . $acname;
        $users->audittrail($user, $activity, $user);
        $alertyes = '<script type="text/javascript">alert("Editing was Successful!");</script>';
        $alertfail = '<script type="text/javascript">alert("Editing Failed!!");</script>';
        $_SESSION['success'] = $alertyes;
    } else {
        $_SESSION['error'] = $alertfail;
    }
}

function loannym($id) {
    $qry = mysql_query("select * from loansettings  WHERE id='$id' ") or die(mysql_error());
    $row = mysql_fetch_array($qry);
    return base64_decode($row['lname']);
}

function trialIncome($gid, $accgroup, $datefrom, $dateto) {
    $totalrow1 = 0;
    $debit = 0;
    $credit = 0;

    $s = strtotime($datefrom);

    $t = strtotime($dateto);
    if ($t < $s) {
        
    } else {
        while ($s <= $t) {

            $sth1 = mysql_query("SELECT * FROM  paymentin  WHERE    transname='" . base64_encode($gid) . "'   AND     date = '" . base64_encode(date("d-M-Y", $s)) . "'  ");
            while ($row11 = mysql_fetch_array($sth1)) {

                $totalrow1 +=base64_decode($row11['amount']);
            }
            $sth = mysql_query("SELECT *FROM  banking    WHERE   bnkid='" . base64_encode($gid) . "'  AND mode='ZGVwb3NpdA=='   AND   date='" . base64_encode(date('d-M-Y', $s)) . "'  ");
            while ($row = mysql_fetch_array($sth)) {
                $debit +=base64_decode($row['amount']);
            }

            $stl = mysql_query("SELECT *FROM  banking    WHERE bnkid='" . base64_encode($gid) . "' AND mode='d2l0aGRyYXc='  AND   date='" . base64_encode(date('d-M-Y', $s)) . "' ");
            while ($row1 = mysql_fetch_array($stl)) {
                $credit +=base64_decode($row1['amount']);
            }
            $fxd = mysql_query("SELECT *FROM  membercontribution    WHERE transaction='" . base64_encode($gid) . "' AND  date='" . base64_encode(date('d-M-Y', $s)) . "' ");
            while ($rowfx = mysql_fetch_array($fxd)) {
                $fxinte +=base64_decode($rowfx['amount']);
            }
            $s = $s + 86400;
            $bal = $debit - $credit;
            $total = $totalrow1 + $bal + $fxinte;
        }
    }
    return $total;
}

function getMem($mno) {

    if (isset($mno)) {
        $sql = mysql_query('SELECT * FROM newmember WHERE membernumber = "' . $mno . '"') or die(mysql_error());

        if (mysql_num_rows($sql) == 0) {
            return "Member";
        } else {
            $Row = mysql_fetch_array($sql);

            return $Row;
        }
    }
}

function balancesheetform($user, $datefrom, $dateto) {
    $liabilitiesd = 0;
    $sharesd = 0;

    echo '<div id="mt"><table  class="table table-striped  table-bordered table-hover sorting_asc_disabled"  id="sample_2">
<thead>
<tr><th colspan="3"><h3 align="center"><b> BALANCE SHEET  AS AT ' . $datefrom . '  TO  ' . $dateto . '   </b></h3></th></tr>
<tr><th><center>Account Code</center></th><th><center>Account Name</center></th><th><center>AMOUNT</center></th></tr></tr></thead>
<tr> <th colspan="3"><center> <b>Assets Account </b></center></th></tr><tbody>';

    $sth1 = mysql_query("SELECT * FROM  glaccounts  ");
    while ($row1 = mysql_fetch_array($sth1)) {

        if (base64_decode($row1['accgroup']) == 1) {

            $company_Assets = company_Assets($row1['id']);

            if ($company_Assets != null) {

                echo'<tr><td>' . base64_decode($row1['accode']) . '</td><td>' . base64_decode($row1['acname']) . '</td>  <td>' . getsymbol() . ' ' . number_format($company_Assets, 2) . '</td><td></td> </tr>';

                $companyAssets +=$company_Assets;
            }///assets depreciation
        }
    }

    $xsth = mysql_query("SELECT * FROM  loansettings where status='" . base64_encode('Active') . "'");
    while ($rqow = mysql_fetch_array($xsth)) {

        $asetsd = loansbal($rqow['id'], $datefrom, $dateto);
        $assa+= $asetsd;
        if ($asetsd != null) {
            echo'<tr><td>' . getloanglacc(base64_decode($rqow['lname'])) . '</td><td>' . base64_decode($rqow['lname']) . '</td><td>' . getsymbol() . ' ' . number_format($asetsd, 2) . '</td></tr>';
        }
    }

    $stl = mysql_query("SELECT * FROM  addbank where status='QWN0aXZl'");
    while ($rq = mysql_fetch_array($stl)) {

        $bnk = bankAmount($rq['primarykey'], $datefrom, $dateto);
        if ($bnk != null) {
            echo'<tr><td>' . getloanglacc(base64_decode($rq['bankname'])) . '</td><td>' . base64_decode($rq['bankname']) . '</td><td>' . getsymbol() . ' ' . number_format($bnk, 2) . '</td></tr>';
        }
        $bankAmount+=$bnk;
    }

    $totalasert = $assa + $bankAmount + $companyAssets;
    echo'<tr> <th colspan="2"> Total </th> <th>' . getsymbol() . ' ' . number_format($totalasert, 2) . '</th>    </tr>
          
<tr> <th colspan="3"> <center><b>Liabilities Account</b> </center></th>  </tr>';
    $sth11 = mysql_query("SELECT * FROM  glaccounts  ");
    while ($row1 = mysql_fetch_array($sth11)) {

        if (base64_decode($row1['accgroup']) == 1) {

            $dreciation_Assets = dreciation_Assets($row1['id']);
            if ($dreciation_Assets != null) {
                $dreciationAssets +=$dreciation_Assets;
                echo'<tr><td>' . base64_decode($row1['accode']) . '</td><td>Depreciation For ' . base64_decode($row1['acname']) . '</td> <td>' . getsymbol() . ' ' . number_format($dreciation_Assets, 2) . '</td> </tr>';
            }
        }
    }

    $sth = mysql_query("SELECT  *  FROM     glaccounts  WHERE  accgroup='" . base64_encode(2) . "'  ORDER BY id");
    while ($row33 = mysql_fetch_array($sth)) {

        $bankAmountFromm = bankAmountFrom($row33['id']);
        if ($bankAmountFromm != null) {
            $bankAmountFrom +=$bankAmountFromm;

            echo'<tr><td>' . ($row33['id']) . '</td><td>' . base64_decode($row33['acname']) . '</td><td>' . getsymbol() . ' ' . number_format($bankAmountFromm, 2) . '</td></tr>';
        }

        $lia = company_Liabilities($row33['id'], $datefrom, $dateto);
        if ($lia != null) {
            $liab +=$lia;

            echo'<tr><td>' . ($row33['id']) . '</td><td>' . base64_decode($row33['acname']) . '</td><td>' . getsymbol() . ' ' . number_format($lia, 2) . '</td></tr>';
        }

        $liabilities = calLiaAsetShare($row33['id'], $row33['accgroup'], $datefrom, $dateto);
        if ($liabilities != null) {
            echo'<tr><td>' . base64_decode($row33['accode']) . '</td><td>' . base64_decode($row33['acname']) . '</td><td>' . getsymbol() . ' ' . number_format($liabilities, 2) . '</td></tr>';
            $liabilitiesd +=$liabilities;
        }
    }
    echo'<tr> <td colspan="2"> Total </td> <td>' . getsymbol() . ' ' . number_format($liabilitiesd, 2) . '</td>    </tr>
          <tr> <td colspan="3"> Shares Account </td>  </tr>';
    $query = mysql_query("SELECT  *  FROM     glaccounts  WHERE  accgroup='" . base64_encode(3) . "'  ORDER BY id");
    while ($row55 = mysql_fetch_array($query)) {

        $shares = calLiaAsetShare($row55['id'], $row55['accgroup'], $datefrom, $dateto);
        if ($shares != null) {
            echo'<tr><td>' . base64_decode($row55['accode']) . '</td><td>' . base64_decode($row55['acname']) . '</td><td>' . getsymbol() . ' ' . number_format($shares, 2) . '</td></tr>';
            $sharesd +=$shares;
        }
    }
    //income/exp
    $sth4 = mysql_query("SELECT * FROM  glaccounts WHERE  accgroup='" . base64_encode(4) . "'  or accgroup='" . base64_encode(5) . "' ");
    while ($roww = mysql_fetch_array($sth4)) {
        $income = incomeandexpenses($roww['id'], base64_encode(4), $datefrom, $dateto);
        $expenses = incomeandexpenses($roww['id'], base64_encode(5), $datefrom, $dateto);
        $b = (int) $income - (int) $expenses;
        if ($b != 0) {
            if (base64_decode($roww['accgroup']) == 4) {

                // echo'<tr><td>' . base64_decode($row['accode']) . '</td><td>' . base64_decode($row['acname']) . '</td><td>' . getsymbol() . ' ' . number_format($income, 2) . '</td><td></td><td>' . getsymbol() . ' ' . number_format($income, 2) . ' </td></tr>';
                $inc +=$income;
            } else {

                // echo'<tr><td>' . base64_decode($row['accode']) . '</td><td>' . base64_decode($row['acname']) . '</td><td></td><td>' . getsymbol() . ' ' . number_format($expenses, 2) . '</td><td>' . getsymbol() . ' ' . number_format($expenses, 2) . '</td></tr>';
                $exp += $expenses;
            }
        }
    }
    $nnet = $inc - $exp;



    echo'<tr><td>' . getloanglacc(getGlname('114')) . '</td><td>' . getGlname('114') . '</td><td>' . getsymbol() . ' ' . number_format($nnet, 2) . '</td><td</tr>';

    $ttotal = $sharesd + $liabilitiesd + $nnet + $dreciationAssets + $liab + $bankAmountFrom;

    echo'<tr> <td colspan="2"> Total </td> <td>' . getsymbol() . ' ' . number_format($sharesd, 2) . '</td>    </tr>
          <tr> <th colspan="2"> Total Shares And Liabilities </th><th>' . getsymbol() . ' ' . number_format($ttotal, 2) . '</th>  </tr>';
    echo'</tbody></table></div>';
}

function deincomed($user, $acc, $datefrom, $dateto) {

    $mttotal = 0;

    $s = strtotime($datefrom);

    $t = strtotime($dateto);
    if ($t < $s) {
        
    } else {
        while ($s <= $t) {
            $mqry = mysql_query('select * from paymentin where date = "' . base64_encode(date("d-M-Y", $s)) . '" and transname = "' . ($acc) . '"    ') or die(mysql_error());
            while ($row = mysql_fetch_array($mqry)) {

                $mttotal +=base64_decode($row['amount']);
            }

            $s = $s + 86400;
        }

        return $mttotal;
    }
}

function getloanglacc($acname) {

    $chmqry = mysql_query('select * from glaccounts where acname="' . base64_encode($acname) . '"') or die(mysql_error());
    while ($looan = mysql_fetch_array($chmqry)) {

        return base64_decode($looan['accode']);
    }
}

function deloans($user, $tid, $datefrom, $dateto) {

    $mtotal = 0;
    $intotal = 0;
    $extotal = 0;

    $s = strtotime($datefrom);

    $t = strtotime($dateto);
    if ($t < $s) {
        
    } else {
        while ($s <= $t) {
            $mqry = mysql_query('select * from loans where date = "' . base64_encode(date("d-M-Y", $s)) . '" and transid= "' . ($tid) . '"') or die(mysql_error());
            while ($row = mysql_fetch_array($mqry)) {
                $mtotal +=base64_decode($row['amount']);
            }
            $s = $s + 86400;
        }
        return $mtotal;
    }
}

function getbankinoff($id) {
    if (($id == "sacco official") || ($id == NULL)) {
        return "Bank Officer";
    } else {
        $query = mysql_query("SELECT * FROM  bankingofficer WHERE id='$id'      ");
        while ($row = mysql_fetch_array($query)) {
            return ucwords(base64_decode($row['officer']));
        }
    }
}

function getpp($id) {

    $query = mysql_query("SELECT * FROM  trasferpurpose WHERE id='$id'      ");
    while ($row = mysql_fetch_array($query)) {
        $name = base64_decode($row['purpose']);
    }
    return $name;
}

function getmode($id) {

    $query = mysql_query("SELECT * FROM   paymentmode WHERE id='$id'      ");
    while ($row = mysql_fetch_array($query)) {
        $name = base64_decode($row['mode']);
    }
    return $name;
}

function getappby($id) {

    $query = mysql_query("SELECT * FROM   approvalauthority WHERE id='$id'      ");
    while ($row = mysql_fetch_array($query)) {
        $name = base64_decode($row['authority']);
    }
    return $name;
}

function getbankingofficer($id) {

    $query = mysql_query("SELECT * FROM   bankingofficer WHERE id='$id'      ");
    while ($row = mysql_fetch_array($query)) {
        $name = base64_decode($row['officer']);
    }
    return ucwords(strtolower($name));
}

function firstrepaydate($transid, $mnno, $amoutought2bpaid) {

    $query = mysql_query("SELECT * FROM loanrepaydates   WHERE tid= '$transid'  AND    mno='$mnno' AND cumulative_payment='" . base64_encode($amoutought2bpaid) . "'  ORDER BY id ASC LIMIT 1 ");
    while ($row = mysql_fetch_array($query)) {
        $firstrepaydate = ($row['dates']);
    }

    return $firstrepaydate;
}

function amoutought2bpaid($transid, $mnno) {
    $amoutought2bpaid = 0;
    $query = mysql_query("SELECT * FROM loanrepaydates   WHERE tid= '$transid'  AND    mno='$mnno'  ORDER BY id ASC LIMIT 1 ");
    while ($row = mysql_fetch_array($query)) {
        $amoutought2bpaid = base64_decode($row['cumulative_payment']);
    }
    return $amoutought2bpaid;
}

function firstamountpaid($transid, $mnno, $firstrepaydate) {

    $firstamountpaid = 0;
    $query = mysql_query("SELECT * FROM  loanpayment   WHERE 	transid = '$transid'  AND    mno='$mnno'   AND date='" . ($firstrepaydate) . "'  ");
    while ($row = mysql_fetch_array($query)) {
        $firstamountpaid = base64_decode($row['amount']);
    }
    return $firstamountpaid;
}

function amountought2paidtodate($transid, $mnno) {

    $amountought2paidtodate = 0;
    $query = mysql_query("SELECT * FROM loanrepaydates   WHERE tid= '$transid'  AND    mno='$mnno'  AND dates < '" . strtotime(date('d-M-Y')) . "' ORDER BY id  DESC LIMIT 1 ");
    while ($row = mysql_fetch_array($query)) {
        $amountought2paidtodate = base64_decode($row['cumulative_payment']);
    }
    return $amountought2paidtodate;
}

function nextpaydate($transid, $mnno, $amountought2paidtodate) {

    $nextpaydate = 0;
    $query = mysql_query("SELECT * FROM loanrepaydates   WHERE tid= '$transid'  AND    mno='$mnno'  AND  cumulative_payment='" . base64_encode($amountought2paidtodate) . "' ORDER BY id  DESC LIMIT 1 ");
    while ($row = mysql_fetch_array($query)) {
        $nextpaydate = ($row['dates']);
    }
    return $nextpaydate;
}

function amountpaid2date($transid, $mnno, $firstrepaydate) {

    $amountpaid2date = 0;
    $query = mysql_query("SELECT * FROM  loanpayment   WHERE  transid= '$transid'  AND    mno='$mnno'  AND   date BETWEEN '$firstrepaydate'  AND  '" . (strtotime(date('d-M-Y'))) . "'  ");
    while ($row = mysql_fetch_array($query)) {
        $amountpaid2date += base64_decode($row['amount']);
    }
    return $amountpaid2date;
}

function fineddate($mnno, $transid, $amountought2paidtodate) {
    $qy = mysql_query(" SELECT * FROM loanrepaydates WHERE mno='$mnno' AND tid='$transid' AND cumulative_payment='" . base64_encode($amountought2paidtodate) . "'   ");
    while ($row = mysql_fetch_array($qy)) {
        $fineddate = ($row['dates']);
    }
    return $fineddate;
}

function addfiness($fines, $status, $mnno, $loanid, $transid, $fineddate, $firstrepaydate) {

    $updateme = mysql_query("UPDATE   loanrepaydates    SET status='$status'    WHERE tid='$transid'   AND mno='$mnno' AND   status='" . base64_encode('notpaid') . "' AND dates <'" . strtotime(date('d-M-Y')) . "'  ORDER BY id DESC LIMIT 1 ");

    $sth = mysql_query("SELECT * FROM fines WHERE    tid='$transid' AND   loanid ='$loanid'  AND mno='$mnno' AND amount='$fines' AND date='$fineddate' ");
    if (mysql_num_rows($sth) == 0) {
        $sth = mysql_query("INSERT INTO fines (tid,loanid,mno,amount,date) VALUES ('$transid','$loanid','$mnno','$fines','$fineddate')    ");
        if ($sth) {
            $users = new Users();
            $activity = "created  fines for " . base64_decode($mno) . ' amount ' . base64_decode($fines);
            $users->audittrail($_SESSION['users'], $activity, $mnno);
//  echo '<span class="green">' .'successfully been created as Collateral for ' . getMembername(base64_encode($mno)) . '.</span></br>';
        }
    }
}

function getfinies($loanid) {

    $query = mysql_query("SELECT * FROM loansettings    WHERE id='" . base64_decode($loanid) . "'        ");
    while ($row = mysql_fetch_array($query)) {
        $finerate = base64_decode($row['fines']);
    }
    return $finerate;
}

function paiddate($tid) {

    $query = mysql_query("SELECT * FROM loansettings    WHERE id='" . base64_decode($loanid) . "'        ");
    while ($row = mysql_fetch_array($query)) {
        $finerate = base64_decode($row['fines']);
    }
    return $finerate;
}

function dateoughttopay($ttid) {

    $amountought2paidtodate = 0;
    $query = mysql_query("SELECT * FROM loanrepaydates   WHERE tid= '$ttid' AND dates < '" . strtotime(date('d-M-Y')) . "' ORDER BY id  DESC LIMIT 1 ");
    while ($row = mysql_fetch_array($query)) {
        $dates = base64_decode($row['dates']);
    }
    return $dates;
}

function intresti($rate) {
    if ($rate = 'dGltZWJhc2VkaW50cmVzdA==') {
        $rrate = 12;
        return $rrate;
    } else {
        $rrate = 12;
        return $rrate;
    }
}

function totalwthbnk($bankid, $tname) {

    $query = mysql_query("SELECT * FROM  banking  WHERE bankname='" . $bankid . "' and  mode='" . base64_encode($tname) . "'     ");
    while ($row = mysql_fetch_array($query)) {
        $totalwthbnk += base64_decode($row['amount']);
    }
    return $totalwthbnk;
}

function totaldepositbnk($bankid, $tname, $datefrom, $dateto) {
    $totaldepositbnk = 0;
    $s = strtotime($datefrom);

    $t = strtotime($dateto);
    if ($t < $s) {
        
    } else {
        while ($s <= $t) {
            $query = mysql_query("SELECT * FROM  banking WHERE bankname='" . $bankid . "' and mode='" . base64_encode($tname) . "'  AND date = '" . base64_encode(date("d-M-Y", $s)) . "'    ");
            while ($row = mysql_fetch_array($query)) {
                $totaldepositbnk += base64_decode($row['amount']);
            }
            $s = $s + 86400;
        }
    }
    return $totaldepositbnk;
}

function getaccode($acc) {
    $query = mysql_query("SELECT * FROM  glaccounts   WHERE  id='" . $acc . "'     ");
    while ($row = mysql_fetch_array($query)) {
        return base64_decode($row['accgroup']);
    }
}

function calculatetotalamount($acc, $acci) {
    $str = str_split($acc);

    if ($str[0] == "4") {

        $sth = mysql_query("SELECT * FROM paymentin	 WHERE  transname='$acci ' ");
        while ($row = mysql_fetch_array($sth)) {
            $income +=base64_decode($row['amount']);
        }
        if ($income == NULL) {
            return "0.00";
        } else {
            return $income;
        }
    } elseif ($str[0] == "5") {

        $stmt = mysql_query("SELECT * FROM paymentout	 WHERE  transname='$acci ' ");
        while ($roww = mysql_fetch_array($stmt)) {
            $exp +=base64_decode($roww['amount']);
        }
        if ($exp == NULL) {
            return "0.00";
        } else {
            return $exp;
        }
    } else {
        return "0.00";
    }
}

function getglcodde($id) {
    $query = mysql_query("SELECT * FROM  glaccounts   WHERE  id='" . ($id) . "'     ");
    while ($row = mysql_fetch_array($query)) {
        return base64_decode($row['accode']);
    }
}

function getsymbol() {

    $query = mysql_query(" SELECT * FROM    settings    ");
    while ($row = mysql_fetch_array($query)) {
        $id = base64_decode($row['defaultcurrency']);
    }
    $sth = mysql_query("SELECT * FROM currency    WHERE id='$id' ");
    while ($row = mysql_fetch_array($sth)) {
        $symbol = base64_decode($row['symbol']);
    }
    return $symbol;
}

function withdrawalfee($actfrm, $actto) {
    $withdfee = mysql_query("SELECT * FROM withdrawalfee WHERE accountfrom='" . $actfrm . "' AND accountto='" . $actto . "' ")or die(mysql_error());
    while ($result = mysql_fetch_array($withdfee)) {
        return ((base64_decode($result['amount'])));
    }
}

//This function has been used to get the default savings account as set in the system settings
function getdefaultsavingsaccount() {
    $defaultacc = mysql_query("SELECT * FROM  settings") or die(mysql_error());
    while ($rowdefacc = mysql_fetch_array($defaultacc)) {
        return ((base64_decode($rowdefacc['defaultsavingacc'])));
    }
}

//This function has been used to get the default shares account as set in the system settings
function getdefaultsharesaccount() {

    $defshacc = mysql_query("SELECT * FROM  settings") or die(mysql_error());
    while ($rowshareacct = mysql_fetch_array($defshacc)) {
        return ((base64_decode($rowshareacct['defaultshareacc'])));
    }
}

function getminsavingsbal() {
    $minsavbal = mysql_query("SELECT * FROM  settings")or die(mysql_error());
    while ($rowsavbal = mysql_fetch_array($minsavbal)) {
        return ((base64_decode($rowsavbal['minsavingbal'])));
    }
}

function getminsharesbal() {
    $minsharebal = mysql_query("SELECT * FROM  settings") or die(mysql_error());
    while ($rowshabal = mysql_fetch_array($minsharebal)) {
        return ((base64_decode($rowshabal['minsharebal'])));
    }
}

function get_receipt_footer() {
    //$status= base64_encode('Active');
    $receipt = mysql_query("SELECT * FROM  receipt_footer WHERE status='QWN0aXZl' LIMIT 1 ") or die(mysql_error());
    while ($rowfooter = mysql_fetch_array($receipt)) {
        return ((base64_decode($rowfooter['message'])));
    }
}

//function to get the maximum number a member can guarantee a loan
function get_maxloanguarantee() {
    $maxloan = mysql_query("SELECT * FROM  settings") or die(mysql_error());
    while ($rowmax = mysql_fetch_array($maxloan)) {
        return ((base64_decode($rowmax['maxloan'])));
    }
}

//end of function
function getloan($id) {

    $query = mysql_query("SELECT * FROM  loansettings  WHERE  id='$id'  ");
    while ($row = mysql_fetch_array($query)) {
        return ((base64_decode($row['lname'])));
    }
}

function getpaytype($id) {
    $query = mysql_query("SELECT * FROM paymentmode WHERE id='$id'   ");
    while ($row = mysql_fetch_array($query)) {
        $paytype = ucwords(base64_decode($row['mode']));
    }
    return $paytype;
}

function getbankbranch($gname) {

    $jane = mysql_query('select * from addbank where primarykey="' . ($gname) . '"');
    $result = mysql_fetch_array($jane);
    return base64_decode($result['branch']);
}

function getbankaccount($gname) {

    $jazz = mysql_query('select * from addbank where primarykey="' . ($gname) . '"');
    $result = mysql_fetch_array($jazz);
    return base64_decode($result['accno']);
}

function checksend_sms() {
    $counts = mysql_query("SELECT * FROM sms_settings");
    $c = mysql_fetch_array($counts);
    return ($c['status']);
}

function repaymentdetails($tid) {
    echo'<div id="mtt"><table  class="table table-striped  table-bordered table-hover sorting_asc_disabled"  id="sample_2"><thead>
        
        <tr><th colspan="2"><h4 align="center"><b>' . getMembername(getmno($tid)) . '</b></th><th colspan="3"><h4 align="center"><b>Loan Payment Details For ' . ucwords(strtolower(loanname($tid))) . '</b></h4></th>  <th> Transaction Date  </th></tr>
    <tr><th>  Payee Id</th> <th>  Payee </th> <th>Loan  Amount Paid</th><th>Interest Paid </th><th>Total Amount Paid </th><th>  Date </th>           </tr></thead>';
    $det = mysql_query('select * from membercontribution where transid="' . $tid . '"  ') or die(mysql_error());
    while ($row = mysql_fetch_array($det)) {
        echo "date=" . ($row['date']);
        $intPaid = intrestpaid($row['transid'], ($row['date']));
        $principal = base64_decode($row['amount']) - $intPaid;
        $totalAmountPaid = $principal + intrestpaid($row['transid'], ($row['date']));
        echo '<tr><td>' . base64_decode($row['payeeid']) . '</td> <td>' . ucwords(strtolower(base64_decode($row['payee']))) . '</td>
            <td>' . getsymbol() . ' ' . number_format($principal, 2) . '</td><td>' . getsymbol() . ' ' . number_format(round($intPaid), 2) . '</td>
             <td>' . getsymbol() . ' ' . number_format($totalAmountPaid, 2) . '</td> <td>' . base64_decode($row['date']) . '</td> </tr>';
        $loanAmountPaid +=round(base64_decode($row['amount']));
        $intrstPaid += round($intPaid);
        $totalsAmountPaid+= round($totalAmountPaid); //total for all amount in total paid
        $principAlamount = round(principalamount($row['transid']));   //amount bollowed
        $intToBpaid = round(intresttobpaid($row['transid']));
    }
    $intrstBal = $intToBpaid - $intrstPaid;
    $totalLoanPlusInt = $principAlamount + $intToBpaid;  //total loan plus intrest
    $totalLoanBal = $principAlamount - $principal;

    $totalPlusIntBal = $totalLoanPlusInt - $totalsAmountPaid;

    echo'<tr> <td colspan="6"> <h4>  </h4></td></tr>
        <td> Amount Applied  </td> <td>' . getsymbol() . ' ' . number_format($principAlamount, 2) . '</td><td colspan="4"> </td></tr>
            <td> Amount Plus Interest  </td> <td>' . getsymbol() . ' ' . number_format($totalLoanPlusInt, 2) . '</td><td colspan="4"> </td></tr>
        <tr>  <th colspan="2"><h4 align="center"><b>Interest </b>  </h3>    </th>  <th colspan="2"><h4 align="center"><b>Total Principal</b>  </h3>    </th>  <th colspan="2"><h4 align="center"><b>Total Amount </b>  </h3>    </th>   </tr>
    <tr>  <th><h4 align="center"><b>Interest Paid </b>  </h3>    <th><h4 align="center"><b>Interest Bal</b>  </h3><th><h4 align="center"><b>Total Principal Paid </b>  </h3><th><h4 align="center"><b>Total Principal Bal </b>  </h3><th><h4 align="center"><b>Total Amount Paid </b>  </h3><th><h4 align="center"><b>Total Amount Bal </b>  </h3>   </tr>
    <tr>  <td>' . getsymbol() . ' ' . number_format(round($intrstPaid), 2) . '</td> <td>' . getsymbol() . ' ' . number_format(round($intrstBal), 2) . '</td><td>' . getsymbol() . ' ' . number_format(round($principal), 2) . '</td><td>' . getsymbol() . ' ' . number_format(round($totalLoanBal), 2) . '</td> <td>' . getsymbol() . ' ' . number_format($totalsAmountPaid, 2) . '</td> <td>' . getsymbol() . ' ' . number_format(round($totalPlusIntBal), 2) . '</td>     </tr>       
</tbody></table></div><button  class="btn green"value="Print this page" onClick="return printResultsf()">Print</button>';
}

function intrestpaid($tid, $mno) {
    $query = mysql_query(" SELECT * FROM  paymentin WHERE  transid='$tid' AND date='$mno'");
    //$no=  mysql_num_rows($query);
    while($results = mysql_fetch_array($query)){
    
        return base64_decode($results['amount']);
    }
}

function totalamountpaid($tid, $date) {
    $query = mysql_query(" SELECT * FROM    membercontribution WHERE   	transid='$tid'  AND date='$date'   ");
    while ($row = mysql_fetch_array($query)) {
        return base64_decode($row['amount']);
    }
}

function totalamountpaids($tid) {
    $amount = 0;
    $query = mysql_query(" SELECT * FROM    membercontribution WHERE   	transid='$tid'     ");
    while ($row = mysql_fetch_array($query)) {
        $amount +=base64_decode($row['amount']);
    }
    return $amount;
}

function getmemberno($tid) {
    $query = mysql_query(" SELECT * FROM    loanapplication WHERE   	transactionid='$tid' ORDER BY id DESC ");
    while ($row = mysql_fetch_array($query)) {
        return base64_decode($row['membernumber']);
    }
}



function interestpaid($tid, $date) {
    $amount = 0;
    $query = mysql_query(" SELECT * FROM   paymentin WHERE  transid='$tid'  AND  date='$date'    ");
    while ($row = mysql_fetch_array($query)) {
        $amount += base64_decode($row['amount']);
    }
    return $amount;
}

function totalinterestpaid($tid) {
    $amount = 0;
    $query = mysql_query(" SELECT * FROM   paymentin WHERE  transid='$tid'   ");
    while ($row = mysql_fetch_array($query)) {
        $amount += base64_decode($row['amount']);
    }
    return $amount;
}

function principalamount($tid) {

    $query = mysql_query(" SELECT * FROM    loans  WHERE  transid='$tid'   ");
    while ($row = mysql_fetch_array($query)) {
        $amount = base64_decode($row['amount']);
    }
    return $amount;
}

function intresttobpaid($tid) {


    $query = mysql_query(" SELECT * FROM    loanintrests  WHERE  transid='$tid'   ");
    while ($row = mysql_fetch_array($query)) {
        $interest = base64_decode($row['interest']);
    }
    return $interest;
}

function loanidapp($tid) {

    $query = mysql_query(" SELECT * FROM    loanapplication WHERE  	transactionid ='$tid'   ");
    while ($row = mysql_fetch_array($query)) {
        return $loanid = $row['id'];
    }
}

function gettotalloanpaid($payeeid) {
    $query = mysql_query(" SELECT * FROM   membercontribution  WHERE  	payeeid='$payeeid' ");
    while ($row = mysql_fetch_array($query)) {
        return base64_decode($row['amount']);
    }
}

function changemi() {
    return "Loan Fees";
}

function updatebudget($id, $datefrom, $dateto, $amount) {

    $sth = mysql_query(" UPDATE  budget  Set datefrom='" . base64_encode($datefrom) . "' ,dateto='" . base64_encode($dateto) . "',amount='" . base64_encode($amount) . "'         WHERE  id='$id'    ");

    if ($sth) {
        $alertyes = '<script type="text/javascript">alert("Budget Updated!");</script>';
        echo $alertyes;
    } else {
        $alertfail = '<script type="text/javascript">alert("Budget Failed!!");</script>';
        echo $alertfail;
    }
}

function updatebankingrecocile($id) {
    $getbankid = mysql_query("SELECT * FROM banking WHERE primarykey = '$id'");
    while ($row = mysql_fetch_array($getbankid)) {
        ;
        $bnkid = base64_decode($row[bnkid]);
    }
    $sth = mysql_query("UPDATE banking SET state='" . base64_encode("Reconciled") . "'  WHERE  primarykey='$id'");
    if ($sth) {
        $alert = "<script>alert('You Have Reconciled " . getbankname($bnkid) . " ')</script>";

        echo $alert;
        echo"<script>window.open('viewbanking','_self')</script>";
    } else {
        $alertyes = '<script type="text/javascript">alert("You Have Not Sucessfuly Reconciled !"' . getbankname($bnkid) . ');</script>';
        echo $alertyes;
    }
}

function approveLoan($id) {

    $sth = mysql_query(" UPDATE   loanapplication  Set status='" . base64_encode("not disbursed") . "' ,approvalDate='" . base64_encode(date('d-M-Y')) . "' WHERE  id='$id'    ");
    if ($sth) {

        $Rowa = mysql_query("SELECT * FROM  loanapplication   WHERE   id='" . $id . "'");
        $Row = mysql_fetch_assoc($Rowa);
        $name = getMembername($Row['membernumber']);
        $res = phonenumber(base64_decode($Row['membernumber']));
        $amnt = getsymbol() . '.' . number_format(base64_decode($Row['amount']), 2);
        $state = base64_encode('Active');
        if (checksend_sms() == $state) {
            $sms = 'Dear ' . $name . ', your ' . loanname(($Row['transactionid'])) . ' of ' . $amnt . ' has been approved';
            echo "<script type=\"text/javascript\">
        window.open('http://sms.truehost.org/sms/send_sms.php?res=" . $res . "&mess=" . $sms . "', '_blank')
    </script>";
        }
        $alert = '<script type="text/javascript">alert("You Have Successfully Approved The ' . loanname(($Row['transactionid'])) . ' for ' . $name . '.");
              </script>';//document.location.href ="loandisbursment.php?loanId=' . $id . '";
        echo $alert;
    } else {
        $alertyes = '<script type="text/javascript">alert("Loan Approval was Not Approved!");</script>';
        echo $alertyes;
    }
}

//receive data from modal
if (isset($_REQUEST['btnreject'])) {
    include_once 'conf.php';
    $id = $_REQUEST['rejectid'];
    $comm = $_REQUEST['comment'];
    $dated = date('d-M-Y');
    $sth = mysql_query(" UPDATE  loanapplication  SET status='" . base64_encode("rejected") . "', reason='" . base64_encode($comm) . "', approvalDate='" . base64_encode($dated) . "'  WHERE  id='$id'    ");
    if ($sth) {
        $alert = '<script type="text/javascript">alert("You Have Rejected "' . loannym($id) . ');
                 document.location.href = "rejectedLoan.php";</script>';
        echo $alert;
    } else {
        $alertyes = '<script type="text/javascript">alert("You Have Rejected "' . loannym($id) . ' For The Reasons, ' . $comm . ');
            </script>';
        echo' document.location.href = "loanApproval.php"';
        echo $alertyes;
    }
}

function reconcilereport() {

    echo'<div id="mt"><table  class="table table-striped  table-bordered table-hover sorting_asc_disabled"  id="sample_2">
    <thead><tr><th colspan="5"> <h3 align="center"><b>Bank Reconciliation  </b></h3></th></tr>
    <tr><th> Date</th><th>	Details	</th><th>Money In	</th><th>Money Out</th><th>	Balance   </th> </tr></thead><tbody>';
    $query = mysql_query("  SELECT * FROM banking WHERE  	state='" . base64_encode("Reconciled") . "' ");
    while ($row = mysql_fetch_array($query)) {
        echo '<tr><td>' . base64_decode($row['date']) . '</td><td>' . ucwords(strtolower(base64_decode($row['comments']))) . '</td>';

        if (base64_decode($row['mode']) == "deposit") {
            $debit = base64_decode($row['amount']);
            echo '<td>' . getsymbol() . ' ' . number_format($debit, 2) . '</td><td>' . getsymbol() . ' 0.00</td><td>' . getsymbol() . ' ' . number_format(($debit), 2) . '</td>';
            $alldebit +=$debit;
        } else if (base64_decode($row['mode']) == "withdraw") {

            $credit = base64_decode($row['amount']);
            echo '<td>' . getsymbol() . ' 0.00</td><td>' . getsymbol() . ' ' . number_format($credit, 2) . '</td><td>' . getsymbol() . ' ' . number_format(($credit), 2) . '</td>';
            $allcredit +=$credit;
        } else {
            
        }
    }
    $allbal = $alldebit - $allcredit;
    echo'<tr></td><td colspan="2" align="right"><b>Total Amount</b> </td><td>' . getsymbol() . ' ' . number_format($alldebit, 2) . '</td><td> ' . getsymbol() . ' ' . number_format($allcredit, 2) . '</td><td>' . getsymbol() . ' ' . number_format($allbal, 2) . '</td>  </tr>
           <tr><td colspan="4"> <h4 align="right"><b>Bank Balance   </b></h4> </td><td><h4><b>' . getsymbol() . ' ' . number_format($allbal, 2) . ' </b></h4></td> </tr>          
           <tr><td colspan="5"> <h5 align="right"><b>Printed On ' . date('d-M-Y') . '<br />' . date("h:i:sa") . '</b></h5> </td>  </tr>
            </tbody></table></div>';
}

function incomeandexpenses($gid, $accgroup, $datefrom, $dateto) {
    $totalrow1 = 0;
    $totalrow2 = 0;


    $s = strtotime($datefrom);

    $t = strtotime($dateto);
    if ($t < $s) {
        
    } else {
        while ($s <= $t) {
            if (base64_decode($accgroup) == 4) {
                $sth1 = mysql_query("SELECT * FROM  paymentin  WHERE    transname='" . base64_encode($gid) . "'   AND  paymentype !='" . base64_encode(adjustments) . "'  AND   date = '" . base64_encode(date("d-M-Y", $s)) . "'  ");
                while ($row11 = mysql_fetch_array($sth1)) {

                    $totalrow1 +=base64_decode($row11['amount']);
                }
            } else {
                $stmt = mysql_query("SELECT * FROM paymentout   WHERE    transname='" . base64_encode($gid) . "'   AND  paymentype !='" . base64_encode(adjustments) . "' AND  date = '" . base64_encode(date("d-M-Y", $s)) . "'  ");
                while ($row = mysql_fetch_array($stmt)) {

                    $totalrow2 +=base64_decode($row['amount']);
                }
            }
            $s = $s + 86400;
        }
        if (base64_decode($accgroup) == 4) {
            return $totalrow1;
        } else {
            return $totalrow2;
        }
    }
}

function getmno($tid) {

    $query = mysql_query("SELECT * FROM loanapplication  WHERE  transactionid='$tid' ORDER BY id  ASC  LIMIT 1 ");
    while ($row = mysql_fetch_array($query)) {
        return $row['membernumber'];
    }
}

function getPaymentInstal($tid) {

    $query = mysql_query("SELECT * FROM loanapplication  WHERE  transactionid='$tid' ORDER BY id  ASC  LIMIT 1 ");
    while ($row = mysql_fetch_array($query)) {
        return base64_decode($row['installments']);
    }
}

//get monthly repaymanet amount
function getMontlypayments($tid) {

    $query = mysql_query("SELECT * FROM loans  WHERE  transid='$tid'  ");
    while ($row = mysql_fetch_array($query)) {
        return base64_decode($row['monthlypayment']);
    }
}

//get loan disbursment date
function getLoanStartdate($tid) {

    $query = mysql_query("SELECT * FROM loandisbursment  WHERE  tid='$tid'  ");
    while ($row = mysql_fetch_array($query)) {
        return base64_decode($row['date']);
    }
}

function ammountsupposedtubpaid($tid, $month) {
    $amount = 0;
    $query = mysql_query("SELECT * FROM  loanrepaydates WHERE  tid='$tid'   AND  dates <='" . strtotime('31' . $month . date('Y')) . "' ORDER BY ID DESC LIMIT 1   ");
    while ($row = mysql_fetch_array($query)) {
        $amount += base64_decode($row['cumulative_payment']);
    }
    return $amount;
}

function amountpaidtudate($tid, $month) {
    $amount = 0;
    $query = mysql_query("SELECT * FROM  loanpayment  WHERE  transid='$tid'   AND  date <='" . strtotime('31' . $month . date('Y')) . "'   ");
    while ($row = mysql_fetch_array($query)) {
        $amount += base64_decode($row['amount']);
    }
    return $amount;
}

function loansbal($id, $datefrom, $dateto) {
    $s = strtotime($datefrom);
    $t = strtotime($dateto);
    if ($t < $s) {
        
    } else {
        while ($s <= $t) {

            $qxry = mysql_query('select * from  loanapplication WHERE loantype="' . base64_encode($id) . '"') or die(mysql_error());
            while ($rox = mysql_fetch_array($qxry)) {

                $query = mysql_query('select * from  loandisbursment   WHERE  date="' . base64_encode(date('d-M-Y', $s)) . '" and tid="' . $rox['transactionid'] . '"  ') or die(mysql_error());
                while ($roww = mysql_fetch_array($query)) {
                    $bolld += base64_decode($roww['amount']);
                }
                $sth = mysql_query('select * from    loanpayment   WHERE  date="' . base64_encode(date('d-M-Y', $s)) . '"  and transid="' . $rox['transactionid'] . '"') or die(mysql_error());
                while ($row = mysql_fetch_array($sth)) {
                    $paid += base64_decode($row['amount']);
                }
                $bal = $bolld - $paid;
            }

            $s = $s + 86400;
        }
    }

    return $bal;
}

function paytype($ptype) {
    $query = mysql_query("SELECT * FROM  paymentmode  WHERE   id='$ptype' ");
    while ($row = mysql_fetch_array($query)) {
        return base64_decode($row['mode']);
    }
}

function updateUsersGroup($id, $user, $status, $comment, $date, $oldname) {

    $query = mysql_query("UPDATE usergroups SET  user='" . base64_encode($user) . "',	status='" . base64_encode($status) . "',	comments='" . base64_encode($comment) . "',	date='" . base64_encode($date) . "'     WHERE  id='$id'");

    if ($query) {

        $_SESSION['ugroup'] = strtolower($user);
        $users = new Users();
        $activity = "edited user group name from " . $oldname . " to " . $user . "";
        $users->audittrail("Admin", $activity, "Admin");
        $alert = '<script type="text/javascript">alert("Group Updated!"); document.location.href ="admingroupsedit.php";</script>';
        echo $alert;
    } else {
        $alertfail = '<script type="text/javascript">alert("Update Failed!!");</script>';
        echo $alertfail;
    }
}

function updatereceipt_footer($id, $message) {

    $query = mysql_query("UPDATE receipt_footer SET  message='" . base64_encode($message) . "' WHERE  id='$id'");

    if ($query) {
        $users = new Users();
        $activity = "edited receipt footer message " . $id;
        $users->audittrail("Admin", $activity, "Admin");
        $alert = '<script type="text/javascript">alert("Message updated!"); document.location.href ="edit_receipt_footer.php";</script>';
        echo $alert;
    } else {
        $alertfail = '<script type="text/javascript">alert("Update Failed!!");</script>';
        echo $alertfail;
    }
}

//************update periodic details**************
function updateperiod($id, $period, $days, $oldname, $oldperiod) {

    $query = mysql_query("UPDATE periodictyrecord SET  periodname='" . base64_encode($period) . "', numberdays='" . base64_encode($days) . "'     WHERE  id='$id'");

    if ($query) {
        $users = new Users();
        $activity = "updated periodiodicty of payment name from " . $oldname . ' ' . 'to ' . $period . '. And number days from ' . $oldperiod . ' to ' . $days;
        $users->audittrail("Admin", $activity, "Admin");
        $alert = '<script type="text/javascript">alert("Period updated !!");document.location.href ="Editperiodicitypay.php";</script>';
        echo $alert;
    } else {
        $alertfail = '<script type="text/javascript">alert("Update Failed!!");</script>';
        echo $alertfail;
    }
}

//**********end of function *************

function updatePermission($id, $grp, $perm, $status, $oldstatus) {
    echo $id, $status;
    $query = mysql_query("UPDATE  groupperm SET  groupid='" . usergroupid($grp) . "', permission='" . base64_encode($perm) . "' ,status='" . base64_encode($status) . "' WHERE  id='$id'");
    if ($query) {
        $users = new Users();
        $activity = "edited group " . $grp . ' ' . 'status from' . ' ' . $oldstatus . ' ' . 'to' . $status;
        $users->audittrail("Admin", $activity, "Admin");
        $alert = '<script type="text/javascript">alert("Group permission updated !!");document.location.href ="adminpermissionsedit.php";</script>';
        echo $alert;
    } else {
        $alertfail = '<script type="text/javascript">alert("Update Failed!!");</script>';
        echo $alertfail;
    }
}

function getloanamount($tid) {
    $query = mysql_query("SELECT * FROM  loans  WHERE  transid='$tid' ");
    while ($row = mysql_fetch_array($query)) {
        return base64_decode($row['amount']);
    }
}

function getfixedasset($id) {
    $query = mysql_query("SELECT * FROM  fixed_assets  WHERE  id='$id' ");
    while ($row = mysql_fetch_array($query)) {
        return base64_decode($row['asset_name']);
    }
}

function calLoans($gid, $accgroup, $datefrom, $dateto) {
    $amount = 0;
    $amount2 = 0;
    $amount22 = 0;
    $s = strtotime($datefrom);

    $t = strtotime($dateto);
    if ($t < $s) {
        
    } else {
        while ($s <= $t) {
            $mqry = mysql_query('select * from newmember where status="' . base64_encode('active') . '"') or die(mysql_error());
            while ($ger = mysql_fetch_array($mqry)) {

                $qry = mysql_query('select * from loanapplication where membernumber="' . ($ger['membernumber']) . '" and status="' . base64_encode('pending') . '"') or die(mysql_error());
                while ($row = mysql_fetch_array($qry)) {
                    $amount+= fullremainingloan($row['transactionid']);
                }
            }

            $s = $s + 86400;
        }
    }
    $totalloanbolowed = $amount22 + $amount2;
    $bal = $totalloanbolowed - $amount;
    return $amount;
}

function calLiabilities($gid, $accgroup, $datefrom, $dateto) {
    $amount = 0;
    $s = strtotime($datefrom);

    $t = strtotime($dateto);
    if ($t < $s) {
        
    } else {
        while ($s <= $t) {
            $mqry = mysql_query("SELECT* FROM  membercontribution WHERE  transaction='" . base64_encode($gid) . "'  AND   date='" . base64_encode(date('d-M-Y', $s)) . "'   ") or die(mysql_error());
            while ($ger = mysql_fetch_array($mqry)) {

                $amount +=base64_decode($row['amount']);
            }

            $s = $s + 86400;
        }
    }
    return $amount;
}

function calShare($gid, $accgroup, $datefrom, $dateto) {
    $amount = 0;
    $debit = 0;
    $credit = 0;
    $s = strtotime($datefrom);

    $t = strtotime($dateto);
    if ($t < $s) {
        
    } else {
        while ($s <= $t) {
            $mqry = mysql_query("SELECT* FROM  membercontribution WHERE  transaction='" . base64_encode($gid) . "'  AND   date='" . base64_encode(date('d-M-Y', $s)) . "'   ") or die(mysql_error());
            while ($ger = mysql_fetch_array($mqry)) {

                $amount +=base64_decode($ger['amount']);
            }
            $sth = mysql_query("SELECT *FROM  banking    WHERE   bnkid='" . base64_encode($id) . "'  AND mode='ZGVwb3NpdA=='   AND   date='" . base64_encode(date('d-M-Y', $s)) . "'  ");
            while ($row = mysql_fetch_array($sth)) {
                $debit +=base64_decode($row['amount']);
            }

            $stl = mysql_query("SELECT *FROM  banking    WHERE bnkid='" . base64_encode($id) . "' AND mode='d2l0aGRyYXc='  AND   date='" . base64_encode(date('d-M-Y', $s)) . "' ");
            while ($row1 = mysql_fetch_array($stl)) {
                $credit +=base64_decode($row1['amount']);
            }

            $s = $s + 86400;
            $bal = $debit - $credit;
            $total = $amount + $bal;
        }
    }
    return $total;
}

function calcluteAmount11($date, $bnkid) {

    $query4 = mysql_query("SELECT * FROM membercontribution  WHERE  date='$date'  AND bnkid='$bnkid'       ");
    while ($r = mysql_fetch_array($query4)) {
        return base64_decode($r['amount']);
    }
}

function calcluteAmount45($date, $bnkid) {

    $query4 = mysql_query("SELECT * FROM banking  WHERE   date='$date'  AND bnkid='$bnkid'  AND mode='ZGVwb3NpdA=='  ");
    while ($r = mysql_fetch_array($query4)) {
        return base64_decode($r['amount']);
    }
}

function calcluteAmount456($date, $bnkid) {

    $query4 = mysql_query("SELECT * FROM banking  WHERE  date='$date'  AND bnkid='$bnkid'  AND mode='d2l0aGRyYXc='     ");
    while ($r = mysql_fetch_array($query4)) {
        return base64_decode($r['amount']);
    }
}

function calcluteAmount10($date, $bnkid) {

    $query4 = mysql_query("SELECT * FROM loandisbursment  WHERE  date='$date'  AND bnkid='$bnkid'     ");
    while ($r = mysql_fetch_array($query4)) {
        return base64_decode($r['amount']);
    }
}

function calcluteAmount($date, $bnkid) {

    $query4 = mysql_query("SELECT * FROM paymentin  WHERE  date='$date'  AND bnkid='$bnkid'       ");
    while ($r = mysql_fetch_array($query4)) {
        return base64_decode($r['amount']);
    }
}

function calcluteAmount2($date, $bnkid) {

    $query4 = mysql_query("SELECT * FROM paymentout  WHERE  date='$date' AND bnkid='$bnkid'     ");
    while ($r = mysql_fetch_array($query4)) {
        return base64_decode($r['amount']);
    }
}

function amountIs($date, $bnkid) {

    $query4 = mysql_query("SELECT * FROM paymentin  WHERE  date='$date'  AND bnkid='$bnkid'       ");
    while ($r = mysql_fetch_array($query4)) {
        return base64_decode($r['bnkid']);
    }
}

function amountIs34($date, $bnkid) {
//     AND 
    $query4 = mysql_query("SELECT * FROM banking  WHERE mode='ZGVwb3NpdA=='  AND date='$date' AND bnkid='$bnkid' ");
    while ($r = mysql_fetch_array($query4)) {
        return base64_decode($r['bnkid']);
    }
}

function amountIs344($date, $bnkid) {
//     AND 
    $query4 = mysql_query("SELECT * FROM banking  WHERE mode='d2l0aGRyYXc='  AND date='$date' AND bnkid='$bnkid' ");
    while ($r = mysql_fetch_array($query4)) {
        return base64_decode($r['bnkid']);
    }
}

function amountIs10($date, $bnkid) {
//     AND 
    $query4 = mysql_query("SELECT * FROM loandisbursment  WHERE date='$date' AND bnkid='$bnkid' ");
    while ($r = mysql_fetch_array($query4)) {
        return base64_decode($r['bnkid']);
    }
}

function amountIs22($date, $bnkid) {

    $query4 = mysql_query("SELECT * FROM membercontribution  WHERE  date='$date'  AND bnkid='$bnkid'       ");
    while ($r = mysql_fetch_array($query4)) {
        return base64_decode($r['bnkid']);
    }
}

function amountIsf($date, $bnkid) {

    $query4 = mysql_query("SELECT * FROM paymentout  WHERE  date='$date'  AND bnkid='$bnkid'       ");
    while ($r = mysql_fetch_array($query4)) {
        return base64_decode($r['bnkid']);
    }
}

function totalMonthlyCont() {
    $amount = 0;
    $date1 = date('01-M-Y');
    $mth = date('M');
    $yr = date('Y');
    $daysinmth = cal_days_in_month(CAL_GREGORIAN, $mth, $yr);
    if ($daysinmth == 28) {
        $date2 = date('28-M-Y');
    } elseif ($daysinmth == 29) {
        $date2 = date('29-M-Y');
    } elseif ($daysinmth == 30) {
        $date2 = date('30-M-Y');
    } else {
        $date2 = date('31-M-Y');
    }

    $s = strtotime($date1);

    $t = strtotime($date2);
    if ($t < $s) {
        
    } else {
        while ($s <= $t) {

            $query4 = mysql_query("SELECT * FROM  membercontribution   WHERE  date='" . base64_encode(date('d-M-Y', $s)) . "'  AND transaction='" . base64_encode(getdefaultsavingsaccount()) . "'   ");
            while ($r = mysql_fetch_array($query4)) {
                $amount += (base64_decode($r['amount']));
            }
            $s = $s + 86400;
        }
    }
    return number_format($amount, 2);
}

function totalincome() {
    $amount = 0;
    $date1 = date('01-M-Y');
    $mth = date('M');
    $yr = date('Y');
    $daysinmth = cal_days_in_month(CAL_GREGORIAN, $mth, $yr);
    if ($daysinmth == 28) {
        $date2 = date('28-M-Y');
    } elseif ($daysinmth == 29) {
        $date2 = date('29-M-Y');
    } elseif ($daysinmth == 30) {
        $date2 = date('30-M-Y');
    } else {
        $date2 = date('31-M-Y');
    }

    $s = strtotime($date1);

    $t = strtotime($date2);
    if ($t < $s) {
        
    } else {
        while ($s <= $t) {
            $query4 = mysql_query("SELECT * FROM   paymentin  WHERE   date='" . base64_encode(date('d-M-Y', $s)) . "'   ");
            while ($r = mysql_fetch_array($query4)) {
                $amount += (base64_decode($r['amount']));
            }
            $s = $s + 86400;
        }
    }
    return number_format($amount, 2);
}

function totalLoanBalance() {
    $mqry = mysql_query('select * from newmember where status="' . base64_encode('active') . '"') or die(mysql_error());
    while ($ger = mysql_fetch_array($mqry)) {

        $qry = mysql_query('select * from loanapplication where membernumber="' . ($ger['membernumber']) . '" and status="' . base64_encode('pending') . '"') or die(mysql_error());
        while ($row = mysql_fetch_array($qry)) {
            $bal+=fullremainingloanreport($row['transactionid']);
        }
    }
    return number_format($bal, 2);
}

function totalMonthlyPricBal() {
    $mqry = mysql_query('select * from newmember where status="' . base64_encode('active') . '"') or die(mysql_error());
    while ($ger = mysql_fetch_array($mqry)) {

        $qry = mysql_query('select * from loanapplication where membernumber="' . ($ger['membernumber']) . '" and status="' . base64_encode('pending') . '"') or die(mysql_error());
        while ($row = mysql_fetch_array($qry)) {
            $bal+=principlepaid($row['transactionid']);
        }
    }
    return number_format($bal, 2);
}

function totalincurredexp() {
    $amount = 0;
    $date1 = date('01-M-Y');
    $mth = date('M');
    $yr = date('Y');
    $daysinmth = cal_days_in_month(CAL_GREGORIAN, $mth, $yr);
    if ($daysinmth == 28) {
        $date2 = date('28-M-Y');
    } elseif ($daysinmth == 29) {
        $date2 = date('29-M-Y');
    } elseif ($daysinmth == 30) {
        $date2 = date('30-M-Y');
    } else {
        $date2 = date('31-M-Y');
    }

    $s = strtotime($date1);

    $t = strtotime($date2);
    if ($t < $s) {
        
    } else {
        while ($s <= $t) {
            $query4 = mysql_query("SELECT * FROM   paymentout   WHERE   date='" . base64_encode(date('d-M-Y', $s)) . "' ");
            while ($r = mysql_fetch_array($query4)) {
                $amount += (base64_decode($r['amount']));
            }
            $s = $s + 86400;
        }
    }
    return number_format($amount, 2);
}

function topMemberSavings() {

    $query4 = mysql_query("SELECT *   FROM   membercontribution  WHERE transaction='" . base64_encode(getdefaultsavingsaccount()) . "'  GROUP BY transaction ORDER BY primarykey ASC   ");
    echo'<table class="table table-striped table-hover table-bordered">
       <thead><tr><th align="center" colspan="3"> Top Seven Members ' . getGlname(getdefaultsavingsaccount()) . ' </th>   </tr>
      <tr> <th>Member No  </th><th>Member Name  </th><th> Amount  </th>  </thead><tbody>';
    while ($row = mysql_fetch_array($query4)) {


        echo'<tr><td>' . base64_decode($row['memberno']) . '</td><td> ' . getMembername(($row['memberno'])) . ' </td><td> ' . getsymbol() . ' ' . number_format(base64_decode($row['amount']), 2) . ' </td></tr>';
    }
    echo'</tbody></table>';
}

function unApprovedLoans() {
    echo'<table id=""  aria-describedby="sample_2_info" class="table table-striped table-bordered table-hover table-full-width dataTable" >
<thead  class="style">
<tr> <th colspan="6"> <h3 align="center"> <b> Loan Approval</b></h3></th>   </tr>
<tr>
<th>Member No.</th>   <th>Member Name</th> <th>Loan Type</th> <th> Amount</th> <th> Date </th> </tr>
</thead>';

    $status = "inactive";    //
    $Rows = mysql_query("SELECT * FROM loanapplication WHERE   status='" . base64_encode($status) . "'   ");
    while ($Row = mysql_fetch_array($Rows)) {
        echo'<tr>
<td>' . base64_decode($Row['membernumber']) . '</td>
<td>' . getMembername($Row['membernumber']) . '</td>
<td>' . loanname(($Row['transid'])) . '</td>
<td>' . getsymbol() . '.' . number_format(base64_decode($Row['amount']), 2) . '</td>
<td>' . (base64_decode($Row['date'])) . '</td> </tr>';
    }
    echo '</table>';
}

function mostBorredLoan() {

    echo'<table class="table table-striped table-hover table-bordered">
         <thead><tr><th align="center" colspan="3"> Top Borrowed Loans </th>   </tr>
       <thead><th>Loan Name  </th><th> Number Times Borrowed  </th>  </thead><tbody>';

    $stmt = mysql_query("SELECT loantype,COUNT(loantype) FROM   loanapplication     GROUP BY loantype ORDER BY  COUNT(loantype) DESC");
    while ($row = mysql_fetch_array($stmt)) {
        echo'<tr><td>' . getloaname(base64_decode($row['loantype'])) . '</td><td>' . $row['COUNT(loantype)'] . '</td></tr>';
    }


    echo'</tbody></table>';
}

function getinterest($tid) {

    $qry = mysql_query('select * from loanintrests where transid="' . ($tid) . '"') or die(mysql_error());
    while ($row = mysql_fetch_array($qry)) {
        $total+=base64_decode($row['interest']); // + newinterest($tid);
    }
    return $total;
}

function addinterestpaid($tid) {
    $suml = mysql_query('select * from paymentin where transid="' . $tid . '" and transname="' . base64_encode('125') . '"') or die(mysql_error());
    $su = 0;
    while ($sumlrslt = mysql_fetch_array($suml)) {
        $su+=base64_decode($sumlrslt['amount']);
    }
    if ($su == 0) {
        return 0;
    } else {
        return $su;
    }
}

function deleteloanpayment($id, $tid, $session, $date) {
    mysql_query("DELETE FROM banking WHERE    session ='$session'  ");
    mysql_query('DELETE FROM paymentin WHERE session="' . $session . '"') or die(mysql_error());
    mysql_query('DELETE FROM membercontribution WHERE session="' . $session . '"') or die(mysql_error());
    mysql_query('DELETE FROM loanpayment WHERE session="' . $session . '"') or die(mysql_error());
}

function insertReceipt($receiptid, $src, $date, $receipt) {
    $sth = mysql_query("INSERT INTO receipt(receiptid,src,date,receipt)VALUES ('$receiptid','$src','$date','$receipt')   ");
    if ($sth) {
        $aler = '<script type="text/javascript">alert("inserted");</script>';
        echo $aler;
    } else {
        $alert = '<script type="text/javascript">alert("not inserted");  </script>';
        echo $alert;
    }
}

function contibutionreceipt($user, $mno) {
    echo'<table  class="table table-striped  table-bordered table-hover sorting_asc_disabled"  id="sample_2">
<thead>
<tr>
<th colspan="8"><h3 align="center">Contribution For ' . $mno . ' ' . getMembername(base64_encode($mno)) . '  </h3></th>
</tr><tr><th class="style">Receipt No.</th>
<th class="style">Transaction</th>

<th class="style">Amount</th>
<th class="style">Date</th>
<th>Select  </th>
</tr>

</thead>';
    $Rows = mysql_query("SELECT * FROM membercontribution  WHERE  memberno='" . base64_encode($mno) . "'   ");

    while ($Row = mysql_fetch_array($Rows)) {

        echo' <tr>
<td class="style">' . base64_decode($Row['payeeid']) . '</td>
<td class="style">' . getglacc(base64_decode($Row['transaction'])) . '</td>

<td class="style">' . getsymbol() . ' ' . number_format(base64_decode($Row['amount']), 2) . '</td>
<td class="style">' . base64_decode($Row['date']) . '</td>';
        $print = "return confirm('Are you sure you want to select this Item?');";
        echo '<td class="style"><form action="" method="POST"><input type="hidden" name="print" value="' . $Row['primarykey'] . '" /> <button class="btn green" onClick="' . $print . '" name="btnprint" >Select</button></form></td>';
    }
    echo '</table>';
}

function expenprintreceipt() {
    echo '
<table  class="table table-striped  table-bordered table-hover sorting_asc_disabled"  id="sample_2">
<thead class = "style">
<tr>
<th class = "style">Date</th>
<th class = "style">Receiver</th>

<th class = "style">Transaction</th>

<th class = "style">Amount</th>
<th class = "style">Select</th>

</tr>

</thead>';
    $Rows = mysql_query('SELECT * FROM paymentout');

    while ($Row = mysql_fetch_array($Rows)) {
        echo' <tr>
<td class = "style">' . base64_decode($Row['date']) . '</td>
<td class = "style">' . base64_decode($Row['receiver']) . '</td>

<td class = "style">' . getglacc(base64_decode($Row['transname'])) . '</td>';

        echo'<td class = "style">' . getsymbol() . ' ' . number_format(base64_decode($Row['amount']), 2) . '</td>';
        $print = "return confirm('Are you sure you want select this?');";

        echo'<td> <a onClick="' . $print . '"  href="expensesreprint.php?print=' . $Row['primarykey'] . '">Select</a></td></tr>';
    }
    echo '</table>';
}

function loandisbursmentRpt($datefrom, $dateto) {
    $s = strtotime($datefrom);
    $amount = 0;
    $t = strtotime($dateto);
    echo'<div id="mt"><table class="table table-striped table-hover table-bordered" id="sample_2">
         <thead>
       <tr><th colspan="10"><h3 align="center">' . compname() . '</h3></th></tr>  
       <tr><th  colspan="10"><h5 align="center"> Loan Disbursement From ' . $datefrom . ' To ' . $dateto . ' <h5></th>   </tr>
        <thead><th>Member Name  </th><th>Member No.</th><th> Loan Type  </th><th>Payment Mode</th><th>Ref. No.</th><th> Date Of Application</th><th> Date Of Disbursement  </th><th> Account </th> <th> Amount Applied</th><th> Amount Disbursed</th> </thead><tbody>';
    if ($t < $s) {
        
    } else {
        while ($s <= $t) {
            $stmt = mysql_query("SELECT * FROM   loandisbursment  WHERE    date='" . base64_encode(date('d-M-Y', $s)) . "'  ");
            while ($row = mysql_fetch_array($stmt)) {
                $loan = mysql_query("SELECT * FROM   loanapplication  WHERE    transactionid='" . $row['tid'] . "'  ");
                $loan_det = mysql_fetch_array($loan);
                $loans = mysql_query("SELECT * FROM   loans WHERE    transid='" . $row['tid'] . "'  ");
                $loans_det = mysql_fetch_array($loans);
                $amount +=base64_decode($row['amount']);
                $amounts +=base64_decode($loans_det['amount']);
                echo'<tr><td>' . getMembername($row['mno']) . '</td><td>' . base64_decode($row['mno']) . '</td><td>' . loanname($row['tid']) . '</td><td>' . getpaytype(base64_decode($row['pid'])) . '</td><td>' . (base64_decode($row['ref'])) . '</td><td>' . date('d-M-Y', (base64_decode($loan_det['appdate']))) . '</td><td>' . base64_decode($row['date']) . '</td><td>' . getbankname(base64_decode($row['bnkid'])) . '</td><td>' . getsymbol() . ' ' . number_format(base64_decode($loans_det['amount']), 2) . '</td><td>' . getsymbol() . ' ' . number_format(base64_decode($row['amount']), 2) . '</td></tr>';
            }

            $s = $s + 86400;
        }
    }
    echo'<tr><td colspan="8">Total   </td><td>' . getsymbol() . ' ' . number_format($amounts, 2) . '</td>  <td>' . getsymbol() . ' ' . number_format($amount, 2) . '</td>  </tr></tbody></table></div>';
}

function loandefaultersContact() {

    echo'<div id="mt"><table id="testTable" aria-describedby="sample_2_info" class="table table-striped table-bordered table-hover table-full-width dataTable" >
    <thead><tr><th> Guarantor Number</th><th>Phone Number</th><th> Guarantor Name</th><th>Bal Amount</th></tr><tbody>';

    $query = mysql_query("SELECT * FROM  loans");

    while ($row = mysql_fetch_array($query)) {

        $bal = ammountsupposedtubpaid($row['transid']) - amountpaidtudate($row['transid']); //Get balance


        if ((ammountsupposedtubpaid($row['transid']) ) > (amountpaidtudate($row['transid']))) {

            $nameandnumber = mysql_query("SELECT * FROM newmember WHERE membernumber = '" . $row['membernumber'] . "'");
            while ($row2 = mysql_fetch_array($nameandnumber)) {
                $phone_number = base64_decode($row2['mobileno']);
                $mno = base64_decode($row2['membernumber']);
            }


            $guarantors = mysql_query("SELECT * FROM  guarantors WHERE transactionid = '" . $row['transid'] . "'");
            while ($defaultersguarantors = mysql_fetch_array($guarantors)) {

                echo'<tr><td><input name="chkbx[]" id="chkbx" class="chkbx" type="checkbox" value="' . $phone_number . '" checked="true">' . base64_decode($defaultersguarantors['guarantorno']) . '</td><td>' . $phone_number . '</td><td>' . getMembername($row['membernumber']) . '</td><td>' . number_format(base64_decode($defaultersguarantors['sharesoffered']), 2) . '</td></tr>';
            }
        }
    }
}

function sendMessageFromAddressBook() {
    echo'<form action="" method="post">
<select name="users"  onchange="showUser(this.value)" class="input-medium form-control">
<option>Select Address Book</option>';

    $client = base64_encode($_SESSION['user']);
    $addressbooks = mysql_query("SELECT* FROM addressbooks   GROUP BY name");
    while ($row = mysql_fetch_array($addressbooks)) {
        $addressBookName = base64_decode($row['name']);
        echo" <option value='$addressBookName'>$addressBookName</option> ";
    }
    echo'</select>
</form>';
}

function getContact($q) {
    echo'<table class="table table-striped table-hover table-bordered"><thead>
        <tr><th>Member Name</th><th>Phone Number</th></tr>
        
        </thead><tbody>';

    $result = mysql_query("SELECT * FROM addressbooks WHERE name = '" . base64_encode($q) . "' ");

    while ($row = mysql_fetch_array($result)) {

        echo '<tr>
<td> <input id="contact_count" class="chkbx" type="checkbox" value="' . base64_decode($row['contact']) . '" checked="true"> '
        . getMembername($row['mno']) . '</td><td>' . base64_decode($row['contact']) . ' </td></tr>';
    }

    echo'</tbody></table> ';
}

function completeCheckoff($org, $mnth) {


    echo' <form action="" method="post" autocomplete="off" id="frm1">
        <div class="table-scrollable" id="nt">
        <table id="sample_2"  class="table table-striped table-bordered table-hover table-full-width dataTable" >
          <input type="hidden" name="org" value="' . $org . '" />
          <input type="hidden" name="mnth" value="' . $mnth . '" />
                           
<tr><th>Check All <input type="checkbox" name="check[]" value = "check all" title = "Select Member" onclick="checkedAll(frm1);"/>
</th><th colspan="5"><h3 align="center">  Members  Account Available For Check Off  </h3></th></tr> ';



    $qyy = mysql_query('select * from newmember where org_name="' . base64_encode($org) . '" AND status="' . base64_encode(active) . '" ') or die(mysql_error());
    while ($roiw = mysql_fetch_array($qyy)) {

        echo'<tr><td><input type="hidden" name="mno[]" value="' . base64_decode($roiw['membernumber']) . '"><label class="label-control"> ' . (getMembername($roiw['membernumber'])) . '</label></td>
                                                            
      <td><div class="mc"><input type = "checkbox" class="checkall" name = "check[]" value = "' . base64_decode($roiw['membernumber']) . '" title = "Select Member"/></td>';
        $sth = mysql_query("SELECT * FROM   memberaccs    WHERE mno='" . $roiw['membernumber'] . "'  GROUP BY  	glaccid");
        $stmt = mysql_query("SELECT * FROM    loans  WHERE membernumber='" . $roiw['membernumber'] . "' AND status='" . base64_encode(active) . "'  ");

        while ($row = mysql_fetch_array($sth)) {

            if (getglcombi(base64_decode($row['glaccid'])) != 1) {

                if ((base64_decode($row['glaccid'])) == getdefaultsavingsaccount()) {

                    echo'<td><label class="label-control">' . getGlname(base64_decode($row['glaccid'])) . '</label><input  name="' . base64_decode($roiw['membernumber']) . '[]" class="form-control input-medium" readonly type="hidden" value="' . base64_decode($row['glaccid']) . '" title="Commitment Fees">
                                            
                   <input  class="form-control input-medium" type="number" name="' . base64_decode($roiw['membernumber']) . base64_decode($row['glaccid']) . '[]" min="' . getCommitmentFees($roiw['membernumber']) . '" value="' . getCommitmentFees($roiw['membernumber']) . '" title="Commitment Fees"></td>';
                } else {

                    echo'<td><label class="label-control">' . getGlname(base64_decode($row['glaccid'])) . '</label><input name="' . base64_decode($roiw['membernumber']) . '[]" class="form-control input-medium" type="hidden" value="' . base64_decode($row['glaccid']) . '" title="Commitment Fees">
                                            <input class="form-control input-medium" type="number" name="' . base64_decode($roiw['membernumber']) . base64_decode($row['glaccid']) . '[]" min="0" value="0" placeholder="Enter Amount " title="Enter Amount "></td>';
                }
            }
        }

        while ($row2 = mysql_fetch_array($stmt)) {

            $sst = mysql_query("SELECT * FROM loanapplication  WHERE   transactionid='" . $row2['transid'] . "' ");
            while ($row3 = mysql_fetch_array($sst)) {

                echo'<td><label class="label-control">' . loannym(base64_decode($row3['loantype'])) . '</label><input name="' . base64_decode($roiw['membernumber']) . '[]" class="form-control input-medium" readonly type="hidden" value="' . base64_decode($row2['transid']) . '" title="Loan Type">
                                            <input class="form-control  input-medium" type="number" step="0.0001" name="' . base64_decode($roiw['membernumber']) . base64_decode($row2['transid']) . '[]"  value="' . round(base64_decode($row2['monthlypayment'])) . '" title="Monthly Loan Payment"></td>';
            }
        }
    }
    echo '</tr><tr><td> <button type="submit" name="finish" class="btn green">Complete</button>    </td></tr></table></div></form>';
}

function checkOff() {
    echo'<form action="" name="" class="form-horizontal"  method="post">
       <div class="form-body"> 
<div class="form-group">
<label class="control-label col-md-3">Select Organisation</label>


<select type="text" name="org"  placeholder="Select Organisation" title="Select Organisation"  class="input-medium form-control">
<option>   </option>';
    $sth = mysql_query("SELECT * FROM   newmember   WHERE org_name!=''  GROUP BY org_name ORDER BY  	primarykey ");
    while ($row = mysql_fetch_array($sth)) {
        echo'<option value="' . base64_decode($row['org_name']) . '">' . (base64_decode($row['org_name'])) . '</option>';
    }
    echo'</select>

</div>
<div class="form-group">
<label class="control-label col-md-3">Months And Year</label>

<input  class="form-control input-medium date-picker"  data-date-format="M-yyyy"   required type="text"  name="mnth" required placeholder="Enter Check Off Month" title="Enter Check Off Month"/>

</div>
<div class="col-md-offset-3">
<button type="submit" name="check" class="btn green" >Check</button>
</div>
</div>

    </form>';
}

function getCommitmentFees($mno) {
    $sth = mysql_query("SELECT * FROM  newmember  WHERE  membernumber='$mno' ");
    while ($row = mysql_fetch_array($sth)) {


        if ($row['commfee'] == null) {
            return 0;
        } else {
            return base64_decode($row['commfee']);
        }
    }
}

function updateMi($amount) {
    mysql_query("  UPDATE   check_off  SET  status='" . base64_encode(updated) . "' ");
}

function upCheckOff($amount, $id) {

    $sth = mysql_query("UPDATE   check_off  SET   	amount='" . base64_encode($amount) . "' WHERE id='$id'  ");
    if ($sth) {
        $alert = '<script type="text/javascript">alert("You Have Approved !");
             document.location.href ="editcheckoff.php"; </script>';
        echo $alert;
    }
}

function getLoanAmountB($tid) {
    $sth = mysql_query("SELECT * FROM   loans  WHERE  	transid='$tid' ");

    while ($row = mysql_fetch_array($sth)) {
        return base64_decode($row['amount']);
    }
}

function dateOfRP($tid) {
    $sth = mysql_query("SELECT * FROM    loanrepaydates  WHERE  	tid='$tid' ORDER BY id ASC");

    while ($row = mysql_fetch_array($sth)) {
        return ($row['dates']);
    }
}

function firstAmountP($tid) {
    $sth = mysql_query("SELECT * FROM   loanpayment WHERE  	transid='$tid' ORDER BY id ASC");

    while ($row = mysql_fetch_array($sth)) {
        return base64_decode($row['amount']);
    }
}

function toAmountP($tid) {
    $toto = 0;
    $sth = mysql_query("SELECT * FROM   loanpayment WHERE  transid='$tid' ");

    while ($row = mysql_fetch_array($sth)) {
        $toto+= base64_decode($row['amount']);
    }
    return $toto;
}

function getStatus($tid) {
    $sth = mysql_query("SELECT * FROM   loans WHERE  	transid='$tid'  ");

    while ($row = mysql_fetch_array($sth)) {
        return base64_decode($row['status']);
    }
}

function viewcrew() {

    echo '<div id="mt"><table id="testTable" class="table table-striped table-bordered table-hover"> 
                                                        <thead>
                                                            <tr class="style">
                                                                <th class="style">Name</th>   
                                                                <th class="style">ID Number</th>   
                                                                <th class="style">Phone No.</th>   
                                                                <th class="style">Date of Registration</th>   
                                                                <th class="style">Occupation</th>
                                                                <th class="style">Vehicle Assigned</th>
                                                                <th class="style">Email</th>   
                                                                <th class="style">Residence</th>
                                                                <th class="style">Status</th> 
                                                         </tr>
                                                        </thead>';
    $Rows = mysql_query('SELECT * FROM crew');
//echo mysql_num_rows($Rows);
    while ($Row = mysql_fetch_array($Rows)) {


        echo'	<tr class="style">
                                <td class="style">' . base64_decode($Row['name']) . '</td>
                                <td class="style">' . base64_decode($Row['idno']) . '</td>
                                <td class="style">' . base64_decode($Row['phone']) . '</td>
                                <td class="style">' . base64_decode($Row['datereg']) . '</td>
                                <td class="style">' . base64_decode($Row['career']) . '</td>
                                <td class="style">' . getdc($Row['id']) . '</td> 
                                <td class="style">' . base64_decode($Row['email']) . '</td>
                                <td class="style">' . base64_decode($Row['residence']) . '</td>                                    
                                <td class="style">' . base64_decode($Row['status']) . '</td>
                         </tr>';
    }
    echo '</table></div>';
}

function getdc($id) {

    $rer = mysql_query('select * from newvehicle where did="' . base64_encode($id) . '" or cid="' . base64_encode($id) . '"');
    while ($rim = mysql_fetch_array($rer)) {

        return base64_decode($rim['vehicleregno']);
    }
}

function getreceipt() {
    $sth = mysql_query('select * from  saccodetails ');
    while ($row = mysql_fetch_array($sth)) {
        $name = strtolower(base64_decode($row['compname']));
        $result = substr($name, 0, 5);
    }
    return $result;
}

function balance($user, $mno, $tname) {
    $amount = 0;
    $sth = mysql_query("SELECT  * FROM  membercontribution  WHERE memberno='" . base64_encode($mno) . "'  AND   transaction='" . base64_encode($tname) . "' ");
    while ($row = mysql_fetch_array($sth)) {
        $amount +=base64_decode($row['amount']);
    } return $amount;
}

function getInvoivedAmount($acc) {

    $sth = mysql_query("SELECT  * FROM  vehicleaccount   WHERE id='$acc' ");
    while ($row = mysql_fetch_array($sth)) {

        return base64_decode($row['amount']);
    }
}

function vehicleName($id) {
    $sth = mysql_query("SELECT  * FROM  newvehicle   WHERE primarykey='$id' ");
    while ($row = mysql_fetch_array($sth)) {

        return strtoupper(base64_decode($row['vehicleregno']));
    }
}

function vehicleOwner($id) {
    $sth = mysql_query("SELECT  * FROM  newvehicle   WHERE primarykey='$id' ");
    while ($row = mysql_fetch_array($sth)) {

        return (($row['memberno']));
    }
}

function getInvoAcc($id) {
    $sth = mysql_query("SELECT  * FROM  vehicleaccount  WHERE id='$id' ");
    while ($row = mysql_fetch_array($sth)) {

        return base64_decode(($row['account']));
    }
}

function amountToPayInvo($acc, $vid) {
    $sth = mysql_query("SELECT  * FROM   vehicleinvoice  WHERE vid='$vid'  AND 	acc='$acc'  ");
    while ($row = mysql_fetch_array($sth)) {

        return base64_decode(($row['amount']));
    }
}

function amountInvPaid($acc, $vid) {
    $amount = 0;
    $sth = mysql_query("SELECT  * FROM   vehicleinvoicepayment  WHERE vid='$vid'  AND 	acc='$acc'  ");
    while ($row = mysql_fetch_array($sth)) {

        $amount +=base64_decode(($row['amount']));
    }
    return $amount;
}

function returnGlName($name) {

    $sth = mysql_query("SELECT  * FROM  vehicleaccount  WHERE account ='$name' ");
    while ($row = mysql_fetch_array($sth)) {

        return (base64_decode($row['glacc']));
    }
}

function returnAmount($name) {

    $sth = mysql_query("SELECT  * FROM  vehicleaccount  WHERE account ='$name' ");
    while ($row = mysql_fetch_array($sth)) {

        return (base64_decode($row['amount']));
    }
}

function getVehicleAcc($id) {
    $sth = mysql_query("SELECT  * FROM  vehicleaccount  WHERE id ='$id' ");
    while ($row = mysql_fetch_array($sth)) {

        return (base64_decode($row['account']));
    }
}

function vehicleInvoicePaid($tname) {
    $amount = 0;
    $sth = mysql_query("SELECT  * FROM   WHERE transname ='$tname' ");
    while ($row = mysql_fetch_array($sth)) {

        $amount +=(base64_decode($row['amount']));
    }
    return $amount;
}

function giveAcc($name) {

    $sth = mysql_query("SELECT  * FROM  vehicleaccount  WHERE account ='$name' ");
    while ($row = mysql_fetch_array($sth)) {

        return (base64_decode($row['id']));
    }
}

function getMainGl($id) {
    $sth = mysql_query("SELECT  * FROM  vehicleaccount  WHERE id ='$id' ");
    while ($row = mysql_fetch_array($sth)) {

        return (base64_decode($row['glacc']));
    }
}

function formInvoicePaymentVehicle($id) {
    $sth = mysql_query("SELECT *  FROM  vehicleinvoicepayment  WHERE  id='$id'");
    while ($row = mysql_fetch_array($sth)) {
        echo'<form method="post"  action=""   class="form-horizontal"  >
     <input type="hidden" value="' . $id . '"  name="id">
        <div class="form-body">
        <div class="form-group">
 <label class="control-label">Payee Name </label>
 <input type="text" name="payee" placeholder="Enter Payee Name"  title="Enter Payee Name"  value="' . base64_decode($row['payee']) . '"  class="input-medium form-control" required >
 </div>
         <div class="form-group">
        <label class="control-label">Select Account  </label>
        <select  class="input-medium form-control" name="acc" value="' . base64_decode($row['acc']) . '" required placeholder="Select Account" title="Select Account" >
        <option> </option>';
        $stmt = mysql_query("SELECT * FROM  vehicleaccount  ");
        while ($row1 = mysql_fetch_array($stmt)) {
            echo' <option value="' . $row1['id'] . '">' . base64_decode($row1['account']) . ' </option>';
        }
        echo'</select>
</div>

        <div class="form-group">
        <label class="control-label">Select Vehicle  </label>
        <select  class="input-medium form-control" required name="vid" value="' . base64_decode($row['vid']) . '" placeholder="Select Vehicle" title="Select Vehicle" >
        <option> </option>'; //WHERE status='" . base64_encode('active') . "'
        $stl = mysql_query("SELECT * FROM   vehicleinvoice   GROUP BY vid ");
        while ($row2 = mysql_fetch_array($stl)) {
            echo' <option value="' . base64_decode($row2['vid']) . '">' . vehicleName(base64_decode($row2['vid'])) . ' </option>';
        }
        echo'</select>
</div>

<div class="form-group">
 <label class="control-label">Date  </label>
 <input type="text" name="date" placeholder="Enter Date" required value="' . base64_decode($row['date']) . '"  title="Enter Date"  class="date-picker input-medium form-control" data-date-format="dd-M-yyyy" >
 </div>
 <div class="form-group">
 <label class="control-label">Amount  </label>
 <input type="number" name="amount" placeholder="Enter Amount"  title="Enter Amount" value="' . base64_decode($row['amount']) . '"  class="input-medium form-control" required >
 </div>

  
<input type="submit" name="payinvoice" value="Complete Account" class="btn green">
</div></form>';
    }
}

function updateVehiclePaymentInvo($id, $acc, $vid, $mno, $payee, $amount, $date) {


    $sth = mysql_query("UPDATE    vehicleinvoicepayment  SET  	acc ='$acc'	,mno ='$mno'	,payee='$payee' ,	vid='$vid' ,	amount='$amount' ,	date='$date'   WHERE  id='$id' ");
    if ($sth) {
        $alert = '<script type="text/javascript">alert("Editing Sucessful!!");</script>';
        echo $alert;
    } else {
        $alertfail = '<script type="text/javascript">alert("Editing Failed!!");</script>';
        echo $alertfail;
    }
}

function formInvoiceAccount($id) {

    $stmt = mysql_query("SELECT * FROM vehicleaccount  WHERE id='$id' ");
    while ($row = mysql_fetch_array($stmt)) {

        echo'<form method="post"  action=""   class="form-horizontal"  >
        <div class="form-body">
        
        <div class="form-group">
        <input type="hidden"  value="' . $id . '"  name="id" >
        <label class="control-label">Select Gl Account  </label>
        <select  class="input-medium form-control" required name="glacc" value="' . base64_decode($row['glacc']) . '" placeholder="Select Gl Account" title="Select Gl Account" >
        <option> </option>';
        $sth = mysql_query("SELECT * FROM glaccounts    WHERE   accgroup='" . base64_encode(2) . "'");
        while ($row1 = mysql_fetch_array($sth)) {
            echo' <option value="' . $row1['id'] . '">' . base64_decode($row1['acname']) . ' </option>';
        }
        echo'</select>
</div>

<div class="form-group">
<label class="label-control"> Name </label>
<input type="text" class="form-control input-medium" value="' . base64_decode($row['account']) . '" required placeholder="Enter Package Name"   title="Enter Package Name" name="acc" >
  </div>
 
<div class="form-group">  
<label class="label-control">Amount </label>
<input type="number" value="' . base64_decode($row['amount']) . '" class="form-control input-medium" required  placeholder="Enter Amount"   title="Enter Amount" name="amount" >
  </div>
  
<input type="submit" name="update" value="Update Account" class="btn green">

</div></form>';
    }
}

function updateAccountVehicle($id, $glacc, $acc, $amount) {

    $sth = mysql_query("UPDATE  vehicleaccount  SET  glacc='$glacc', account='$acc' , amount='$amount'  WHERE  id='$id'  ");

    if ($sth) {
        $alert = '<script type="text/javascript">alert("Editing Sucessful!!' . $id . '");</script>';
        echo $alert;
    } else {
        $alertfail = '<script type="text/javascript">alert("Editing Failed  ' . $id . '!!");</script>';
        echo $alertfail;
    }
}

function viewInvoicedVehicle($datefrom, $dateto) {
    $s = strtotime($datefrom);

    $t = strtotime($dateto);
    echo'<table id="sample_2" aria-describedby="sample_1_info" class="table table-striped table-bordered table-hover dataTable" >
<thead><tr></tr>
<tr><th>Vehicle Name </th><th>Vehicle Owner </th><th>Transname</th><th>Amount </th><th>Date  </th> <th>Status  </th> </tr>
<thead><tbody>';
    if ($t < $s) {
        echo '<span class="red" >Sorry Please enter search dates correctly</span></br>';
    } else {
        while ($s <= $t) {

            // 	vid 	acc 	date 	amount 	status
            $stmt = mysql_query("SELECT * FROM     vehicleinvoice    WHERE  date='" . base64_encode(date('d-M-Y', $s)) . "'    ");  //  WHERE date='".base64_encode(date('d-M-Y',$s))."'

            while ($row = mysql_fetch_array($stmt)) {
                //$total +=base64_decode($row['amount']);
                echo'<tr><td>' . vehicleName(base64_decode($row['vid'])) . ' </td><td>' . getMembername(vehicleOwner(base64_decode($row['vid']))) . '</td> <td>' . getInvoAcc(base64_decode($row['acc'])) . ' </td>   <td>' . getsymbol() . ' ' . number_format(base64_decode($row['amount']), 2) . ' </td><td>' . (base64_decode($row['date'])) . ' </td><td>' . base64_decode($row['status']) . '</td></tr>';
            }
            $s = $s + 86400; //increment date by 86400 seconds(1 day)
        }
    }//<tr><td colspan="3">Total  </td><td>' . getsymbol() . ' ' .number_format($total,2).' </td><td colspan="3"></td> </tr>
    echo'</tbody>
</table>';
}

function editViewInvoicedVehicle() {
    echo'<table id="sample_2" aria-describedby="sample_1_info" class="table table-striped table-bordered table-hover dataTable" >
<thead><tr></tr>
<tr><th>Account  </th><th>Vehicle Name </th><th>Amount </th><th>Date  </th><th>Edit  </th> <th>Delete  </th> </tr>
<thead><tbody>';
    // 	vid 	acc 	date 	amount 	status
    $stmt = mysql_query("SELECT * FROM    vehicleinvoice        ");  //  WHERE date='".base64_encode(date('d-M-Y',$s))."'

    while ($row = mysql_fetch_array($stmt)) {
        echo'<tr><td>' . getInvoAcc(base64_decode($row['acc'])) . ' </td> <td>' . vehicleName(base64_decode($row['vid'])) . ' </td> <td>' . base64_decode($row['date']) . '</td>  <td>' . getsymbol() . ' ' . number_format(base64_decode($row['amount']), 2) . ' </td>';
        $confirmdedit = "return confirm('Are you sure you want to Edit?');";
        $confirmdelete = "return confirm('Are you sure you want to Delete?');";
        echo'<td> <a onClick="' . $confirmdedit . '"  href = "invoiceVehicle.php?vehinvin=' . $row['id'] . '"><img src = "images/edit.png"></a></td>';
        echo'<td> <a onClick="' . $confirmdelete . '"  href = "invoiceVehicle.php?vehinvdel=' . $row['id'] . '"><img src = "images/delete.png"></a></td></tr>';
    }
    echo'</tbody>
</table>';
}

function invoicedVehicleForm($id) {
    $stl = mysql_query("SELECT *  FROM  vehicleinvoice WHERE  id='$id'");
    while ($row4 = mysql_fetch_array($stl)) {
        echo'<form method="post"  action=""   class="form-horizontal"  >
        <div class="form-body">
         <div class="form-group">
        <label class="control-label">Select Account  </label>
        <input type="hidden"  name="id"  value="' . $id . '"/>
        <select  class="input-medium form-control" name="acc" placeholder="Select Account" title="Select Account" >
        <option> </option>';
        $stmt = mysql_query("SELECT * FROM  vehicleaccount  ");
        while ($row = mysql_fetch_array($stmt)) {
            echo' <option value="' . $row['id'] . '">' . base64_decode($row['account']) . ' </option>';
        }
        echo'</select>
</div>

        <div class="form-group">
        <label class="control-label">Select Vehicle  </label>
        <select  class="input-medium form-control" name="vid" placeholder="Select Vehicle" title="Select Vehicle" >
        <option> </option>';
        $sth = mysql_query("SELECT * FROM    newvehicle    ");
        while ($row1 = mysql_fetch_array($sth)) {
            echo' <option value="' . ($row1['primarykey']) . '">' . (base64_decode($row1['vehicleregno'])) . ' ' . (getMembername($row1['memberno'])) . '</option>';
        }
        echo'</select>
</div>
 <div class="form-group">
 <label class="control-label">Date  </label>
 <input type="text" name="date" placeholder="Enter Date" value="' . base64_decode($row4['date']) . '" title="Enter Date"  class="date-picker input-medium form-control" data-date-format="dd-M-yyyy" >
 </div>
 
<input type="submit" name="update" value="Update Invoice" class="btn green">
</div></form>';
    }
}

function updateVehicleInvoice($id, $acc, $vid, $date, $amount) {
    $stl = mysql_query("UPDATE   vehicleinvoice  SET vid='$vid', 	acc='$acc', 	date='$date' ,	amount='$amount' WHERE id='$id'");
    if ($stl) {
        $alert = '<script type="text/javascript">alert("update was Successful!");
    document.location.href = "invoiceVehicle.php";</script>';
        echo $alert;
    } else {
        $al = '<script type="text/javascript">alert("Update Failled!");</script>';
        echo $al;
    }
}

function lastDateOfPayment($tid) {
    $sth = mysql_query("SELECT *  FROM loanrepaydates   WHERE   tid='$tid'  ORDER BY id DESC  LIMIT 1 ");
    while ($row = mysql_fetch_array($sth)) {
        return($row['dates']);
    }
}

function insurancePaid($tid) {

    $sth = mysql_query("SELECT *  FROM loanrepaydates   WHERE   tid='$tid'  ORDER BY id DESC  LIMIT 1 ");
    while ($row = mysql_fetch_array($sth)) {
        return($row['dates']);
    }
}

function totalAmtPaid($tid) {
    $amount = 0;
    $sth = mysql_query("SELECT *  FROM  membercontribution  WHERE   transid='$tid'   ");
    while ($row = mysql_fetch_array($sth)) {
        $amount+=base64_decode($row['amount']);
    }
    return $amount;
}

function interestPaidTotal($tid) {
    $amount = 0;
    $sth = mysql_query("SELECT *  FROM  paymentin WHERE transname='" . base64_encode('125') . "' and transid='$tid' ");
    while ($row = mysql_fetch_array($sth)) {
        $amount+=base64_decode($row['amount']);
    }
    return $amount;
}

function interestChanged($tid) {
    $amount = 0;
    $sth = mysql_query("SELECT * FROM loanintrests WHERE transid='$tid'   ");
    while ($row = mysql_fetch_array($sth)) {
        $amount+=base64_decode($row['interest']);
    }
    return $amount;
}

function updateOrgasation($org, $status, $id, $oldname, $oldstatus) {

    $stl = mysql_query("UPDATE   organisation SET  organisation='$org' ,	status='$status'     WHERE id='$id'  ");
    if ($stl) {
        $users = new Users();
        $activity = "updated organization name from " . base64_decode($oldname) . ' to ' . base64_decode($org) . ' And status from ' . base64_decode($oldstatus) . ' to ' . base64_decode($status);
        $users->audittrail("Admin", $activity, "Admin");
        $alert = '<script type="text/javascript">alert("update was Successful!");
    document.location.href = "addorg.php";</script>';
        echo $alert;
    } else {
        $al = '<script type="text/javascript">alert("Update Failled!");</script>';
        echo $al;
    }
}

function updatePaymentMode($mode, $status, $id) {
    $stl = mysql_query("UPDATE    paymentmode SET  mode='$mode' ,	status='$status'     WHERE id='$id'  ");
    if ($stl) {
        $alert = '<script type="text/javascript">alert("update was Successful!");
    document.location.href = "paymode.php";</script>';
        echo $alert;
    } else {
        $al = '<script type="text/javascript">alert("Update Failled!");</script>';
        echo $al;
    }
}

function updatePages($id, $url, $name, $menu, $status) {

    $stl = mysql_query("UPDATE   pages  SET  url='$url' ,	name='$name' ,menu='$menu' ,status='$status'    WHERE id='$id'  ");
    if ($stl) {
        $alert = '<script type="text/javascript">alert("update was Successful!");
    document.location.href = "pages.php";</script>';
        echo $alert;
    } else {
        $al = '<script type="text/javascript">alert("Update Failled!");</script>';
        echo $al;
    }
}

function updatecurrency($id, $currencyname, $code, $symbol) {

    $query = mysql_query("UPDATE  currency SET  name='" . base64_encode($currencyname) . "' ,	currencycode='" . base64_encode($code) . "' ,	symbol='" . base64_encode($symbol) . "'    WHERE  id='$id'  ");
    if ($query) {
        $ad = '<script type="text/javascript">alert("Updates  saved sucessfully!");
        document.location.href ="viewcurrency.php";</script>';
        $users = new Users();
        $activity = "updated currency settings for " . $currencyname;
        $users->audittrail($user, $activity, $user);
        echo $ad;
    } else {
        $add = '<script type="text/javascript">alert("Failed to update!");</script>';
        echo $add;
    }
}

function getOrg($id) {
    $stl = mysql_query("SELECT * FROM  organisation  WHERE   id='$id'");
    while ($row = mysql_fetch_assoc($stl)) {
        return base64_decode($row['organisation']);
    }
}

function bankAmount($bnkid, $datefrom, $dateto) {
    $bnkbal = 0;
    $s = strtotime($datefrom);

    $t = strtotime($dateto);

    if ($t < $s) {
        
    } else {
        while ($s <= $t) {


            $mqryy = mysql_query('select * from  membercontribution  WHERE  date="' . base64_encode(date('d-M-Y', $s)) . '"   AND bnkid="' . base64_encode($bnkid) . '"   ') or die(mysql_error());
            while ($row1 = mysql_fetch_array($mqryy)) {

                $bnkrep = bankRepaid($row1['transid'], $row1['bnkid'], $datefrom, $dateto);
                $amount1 +=base64_decode($row1['amount']);
                // echo "tsa=".base64_decode($row1['transid'])."amt".$bnkrep;
            }

            $sth = mysql_query('select * from  paymentin  WHERE   	date="' . base64_encode(date('d-M-Y', $s)) . '"   AND bnkid="' . base64_encode($bnkid) . '"  ') or die(mysql_error());
            while ($row2 = mysql_fetch_array($sth)) {

                $amounted +=base64_decode($row2['amount']);
                $amount2 = $amounted;
            }

            $stmt = mysql_query('select * from  paymentout  WHERE   	date="' . base64_encode(date('d-M-Y', $s)) . '"   AND bnkid="' . base64_encode($bnkid) . '" ') or die(mysql_error());
            while ($row3 = mysql_fetch_array($stmt)) {

                $amount3 = base64_decode($row3['amount']);
            }

            $stl = mysql_query('select * from   banking  WHERE   	date="' . base64_encode(date('d-M-Y', $s)) . '"   AND  	bnkid="' . base64_encode($bnkid) . '"   ') or die(mysql_error());
            while ($row4 = mysql_fetch_array($stl)) {  //withdraw
                $amount20 +=base64_decode($row4['amount']);
            }

            $sm = mysql_query('select * from    loandisbursment  WHERE   	date="' . base64_encode(date('d-M-Y', $s)) . '"   AND  	bnkid="' . base64_encode($bnkid) . '"  ') or die(mysql_error());
            while ($rowt = mysql_fetch_array($sm)) {  //deposit
                $amount56 +=base64_decode($rowt['amount']);
            }
            $s = $s + 86400;

            $depo = ($amount1 + $amount2 + $amount20 + $bnkrep );
            $with = ($amount3 + $amount56 );
            $bnkbal = ( ($depo) - ($with));
        }
    }

    return $bnkbal;
}

function bankRepaid($tranid, $bnk, $datefrom, $dateto) {
    $bnkbal = 0;
    $s = strtotime($datefrom);

    $t = strtotime($dateto);

    if ($t < $s) {
        
    } else {
        while ($s <= $t) {
            $lnryy = mysql_query('select * from  loanpayment  WHERE transid="' . $tranid . '"  and date="' . base64_encode(date('d-M-Y', $s)) . '" and bnkid="' . $bnk . '" ') or die(mysql_error());
            while ($row11 = mysql_fetch_array($lnryy)) {

                $lonapay += base64_decode($row11['amount']);
            }

            $s = $s + 86400;
        }
    }

    return $lonapay;
}

function getImprestAmounta() {
    $stl = mysql_query("SELECT * FROM expenses  ");
    $row = mysql_fetch_array($stl);
    if (($row['bal']) == null)
        return base64_encode(0);
    else
        return ($row['bal']);
}

function sms($message, $contacts) {
    $token = '1';
    echo "<script type=\"text/javascript\">
        window.open('http://sms.truehost.org/sms/send_sms.php??res=" . $contacts . "&mess=" . $message . "', '_blank')
    </script>";
}

function notDisbursedLoans() {
    echo '<div id="mt">
<table id="sample_2"  aria-describedby="sample_2_info" class="table table-striped table-bordered table-hover table-full-width dataTable" >
<thead>
<tr> <th colspan="6"> <h3 align="center"> <b>Not Disbursed Loans</b></h3></th>   </tr>
 <tr><th colspan="5"><center>' . compname() . '</center></th></tr>
<tr><th>Member No.</th>   <th>Member Name</th> <th>Loan Type</th> <th> Amount</th> <th> Date </th> </tr>
</thead>';


    $status = "not disbursed";
    $Rows = mysql_query("SELECT * FROM  loans    WHERE    status='" . base64_encode($status) . "'   ");
    while ($Row = mysql_fetch_array($Rows)) {
        echo'<tr>
<td>' . base64_decode($Row['membernumber']) . '</td>
<td>' . getMembername($Row['membernumber']) . '</td>
<td>' . loanname(($Row['transid'])) . '</td>
<td>' . getsymbol() . ' ' . number_format(base64_decode($Row['amount']), 2) . '</td>
<td>' . (base64_decode($Row['date'])) . '</td> 
</tr>';
    }
    echo '</table></div>';
}

function addressBook($q) {
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

function loanDefaultesGurantors() {
    echo'<table id="sample_2" aria-describedby="sample_2_info" class="table table-striped table-bordered table-hover table-full-width dataTable" >
    <thead><tr><th>Phone No</th><th> Member Number</th><th> Member Name</th><th>Loan Name</th><th>Disbursed Amount</th><th>Bal Amount</th><th>Expected Payment Date</th></tr></thead><tbody>';
    $query = mysql_query("SELECT * FROM  loans    WHERE  status='YWN0aXZl' ");
    while ($row = mysql_fetch_array($query)) {
        $lastDatePayment = lastDateOfPayment($row['transid']);  // getloangl(getloaname($loanid));

        $date = strtotime(date('d-M-Y'));
        if (($date > $lastDatePayment) AND ( base64_decode($row['amount']) != 0) AND ( loanname($row['transid']) != null)) {
            $totalPaid = totalAmtPaid($row['transid']) + interestPaidTotal($row['transid']);
            $amountBollowed = base64_decode($row['amount']) + interestChanged($row['transid']);
            $rem = $amountBollowed - $totalPaid;
            // $bal = ((0.01 * $rem) + $rem);
            $mno = getMobileNo($row['membernumber']);
            $sth = mysql_query("SELECT * From   guarantors  WHERE  memberno='" . $row['membernumber'] . "'  ");
            while ($rw = mysql_fetch_array($sth)) {
                echo'<tr><td><input name="chkbx[]" id="chkbx" class="chkbx" type="checkbox" value="' . base64_decode($mno['mobileno']) . '" checked="true">' . base64_decode($mno['mobileno']) . '</td><td>' . base64_decode($rw['memberno']) . '</td><td>' . getMembername($rw['memberno']) . '</td><td>' . loanname($row['transid']) . '</td><td>' . getSymbol() . ' ' . number_format(base64_decode($row['amount']), 2) . '</td><td>' . getSymbol() . ' ' . number_format(($rem), 2) . '</td> <td>' . date('d-M-Y', $lastDatePayment) . '</td></tr>';
            }
        }
    }

    echo'</tbody></table>';
}

function memberNo($mno) {
    $sth = mysql_query("SELECT  *  FROM   newmember   WHERE  mobileno='$mno' ");
    while ($row = mysql_fetch_array($sth)) {
        return ($row['membernumber']);
    }
}

function get_addressBook($q) {

    echo'<table class="table table-striped table-hover table-bordered">
     <thead><tr> <th>Name</th><th>Contact</th> </tr></thead><tbody>';
    $sql = mysql_query("SELECT * FROM addressbooks WHERE name = '$q' ");
    while ($row = mysql_fetch_array($sql)) {
        $contact = base64_decode($row['contact']);
        $name = getMembername($row['mno']);
        echo '<tr>
            <td> <input id="contact_count" class="chkbx" type="checkbox" value="' . $contact . '" checked="true"> ' . $name . '</td>
            <td>' . $contact . ' </td></tr>';
    }

    echo'</tbody></table>';
}

function casbookDebit($bnkid, $datefrom, $dateto) {


    $contri = 0;
    $payin = 0;
    $banking = 0;
    $s = strtotime($datefrom);
    $t = strtotime($dateto);
    if ($t < $s) {
        
    } else {
        while ($s <= $t) {
            $sth1 = mysql_query('select * from  paymentin where date="' . base64_encode(date('d-M-Y', $s)) . '"    AND bnkid = "' . $bnkid . '"  ') or die(mysql_error());
            while ($row = mysql_fetch_array($sth1)) {
                $payin +=base64_decode($row['amount']);
            }
            $stmt = mysql_query('select * from  membercontribution where date="' . base64_encode(date('d-M-Y', $s)) . '"    AND bnkid = "' . $bnkid . '" ') or die(mysql_error());
            while ($row1 = mysql_fetch_array($stmt)) {
                $contri +=base64_decode($row1['amount']);
            }
            $st = mysql_query('select * from  banking where date="' . base64_encode(date('d-M-Y', $s)) . '"    AND bnkid != "' . null . '"   AND   mode="ZGVwb3NpdA=="') or die(mysql_error());
            while ($row2 = mysql_fetch_array($st)) {
                $banking +=base64_decode($row2['amount']);
            }
            $total = $banking + $payin + $contri;
            $s = $s + 86400;
        }
    }

    return $total;
}

function casbookCredit($bnkid, $datefrom, $dateto) {


    $disb = 0;
    $paymntout = 0;
    $banking = 0;
    $s = strtotime($datefrom);
    $t = strtotime($dateto);
    if ($t < $s) {
        
    } else {
        while ($s <= $t) {
            $sth1 = mysql_query('select * from  loandisbursment where date="' . base64_encode(date('d-M-Y', $s)) . '"    AND bnkid = "' . $bnkid . '"  ') or die(mysql_error());
            while ($row = mysql_fetch_array($sth1)) {
                $disb +=base64_decode($row['amount']);
            }
            $stmt = mysql_query('select * from   paymentout where date="' . base64_encode(date('d-M-Y', $s)) . '"  AND bnkid = "' . $bnkid . '" ') or die(mysql_error());
            while ($row1 = mysql_fetch_array($stmt)) {
                $paymntout +=base64_decode($row1['amount']);
            }
            $st = mysql_query('select * from  banking where date="' . base64_encode(date('d-M-Y', $s)) . '"    AND bnkid= "' . $bnkid . '"   AND   mode="d2l0aGRyYXc="') or die(mysql_error());
            while ($row2 = mysql_fetch_array($st)) {
                $banking +=base64_decode($row2['amount']);
            }
            $total = $banking + $paymntout + $disb;
            $s = $s + 86400;
        }
    }

    return $total;
}

function dynamicTotal($acc, $datefrom) {
    $sth = mysql_query("SELECT  * FROM     membercontribution  WHERE transname ='" . base64_encode($acc) . "'   AND date<'" . base64_encode($datefrom) . "'        ");
    while ($row = mysql_fetch_array($sth)) {
        $balbf +=base64_decode($row['amount']);
    }

    return $balbf;
}

function totalAmoutPaid($tid, $date) {
    $amount = 0;
    $sth = mysql_query("SELECT  * FROM     membercontribution  WHERE transid ='$tid'   AND date ='$date'        ");
    while ($row = mysql_fetch_array($sth)) {
        $amount +=base64_decode($row['amount']);
    }
    return $amount;
}

function defaultProcessingFee() {

    $sth = mysql_query("SELECT  * FROM     settings     ");
    while ($row = mysql_fetch_array($sth)) {
        return ($row['def_processing_fee']);
    }
}

function defaultLegalFee() {

    $sth = mysql_query("SELECT  * FROM     settings     ");
    while ($row = mysql_fetch_array($sth)) {
        return ($row['def_legal_fee']);
    }
}

function defaultInsuranceFee() {

    $sth = mysql_query("SELECT  * FROM     settings     ");
    while ($row = mysql_fetch_array($sth)) {
        return ($row['def_insurance_fee']);
    }
}

function getMemberPrefix($id) {
    $sth = mysql_query("SELECT  * FROM     member_category  WHERE id ='" . $id . "' and status='" . base64_encode('active') . "' ");
    while ($row = mysql_fetch_array($sth)) {
        return base64_decode($row['prefix']);
    }
}

function updateAgents($id, $fname, $mname, $lname, $idno, $email, $contact) {
    $sth = mysql_query("UPDATE  RegisterAgents  SET  fname='$fname',mname='$mname',lname='$lname',idno='$idno',email='$email', contact='$contact' WHERE  id='$id'   ");

    if ($sth) {
        $al = '<script type="text/javascript">alert("Updated Agent' . $id . '!");</script>';
        echo $al;
    } else {
        $al = '<script type="text/javascript">alert("failed to Updatet!");</script>';
        echo $al;
    }
}

//get accrued montly interest
function monthlyInterest($membNo) {
    $sum = 0;
    $montlyint = 0;

    $dated = date('d-m-Y');
//$dated = date('31-08-2015');
    list($day, $themonth, $yearh) = explode('-', $dated);
    $lastday = cal_days_in_month(CAL_GREGORIAN, $themonth, $yearh);
    $datefrom = $yearh . "-" . date('m') . "-" . "01";
    $dateto = $yearh . "-" . date('m') . "-" . $lastday;

    if ($day == $lastday) {

        $allcont = comsavings($membNo, $datefrom, $dateto);
        $montlyint = (($allcont * 20) / 100);
    }
    return $montlyint;
}

//get members who have contributed in the given period
function ContributedMemberNo($memberNo, $datefrom, $dateto) {
    $begin = new DateTime($datefrom);
    $end = new DateTime($dateto);

    $interval = DateInterval::createFromDateString('1 day');
    $daterange = new DatePeriod($begin, $interval, $end);


    foreach ($daterange as $date) {//
        $dates = $date->format('d-M-Y');
        $qryNO = mysql_query('select * from membercontribution WHERE memberno="' . $memberNo . '" and  date="' . base64_encode($dates) . '" and transaction="' . base64_encode(getdefaultaccrued()) . '" ') or die(mysql_error());
        while ($rowME = mysql_fetch_array($qryNO)) {
            $mebreNo = $rowME['memberno'];
        }
    }
    return $mebreNo;
}

//get the interest accrued per month on contributions
function sumaccrued_interest($membernumber, $datefrom, $dateto) {
    $begin = new DateTime($datefrom);
    $end = new DateTime($dateto);

    $interval = DateInterval::createFromDateString('1 day');
    $daterange = new DatePeriod($begin, $interval, $end);


    foreach ($daterange as $date) {//
        $dates = $date->format('d-M-Y');
        $qryd = mysql_query('select * from membercontribution where memberno="' . $membernumber . '" AND date="' . base64_encode($dates) . '"  AND transaction ="' . base64_encode(getdefaultaccrued()) . '" ') or die(mysql_errno());
        while ($rows = mysql_fetch_array($qryd)) {
            $sum += base64_decode($rows['amount']);
        }
    }
    if ($sum != 0) {
        return $sum;
    } else {
        return 0;
    }
}

//get the date accumulated interest was contributed
function dateInterestCont($membernumber) {

    $qryd = mysql_query('select * from membercontribution where memberno="' . $membernumber . '"   AND transaction ="' . base64_encode(getdefaultaccrued()) . '" limit 1 ') or die(mysql_errno());
    while ($rows = mysql_fetch_array($qryd)) {
        return base64_decode($rows['date']);
    }
}

//get the default gl account for interest
function getdefaultaccrued() {

    $defaultacc = mysql_query("SELECT * FROM  settings") or die(mysql_errno());
    while ($rowdefacc = mysql_fetch_array($defaultacc)) {

        return ((base64_decode($rowdefacc['accruedincome'])));
    }
}

//gets the default bank id
function getBankId() {
    $sth = mysql_query('SELECT * FROM addbank WHERE status="' . base64_encode('Active') . '" ');
    while ($row1 = mysql_fetch_array($sth)) {
        return $row1['primarykey'];
    }
}

//get members who have recently contributed
function MemberCont_Recentlty($MNO) {

    $mem = 0;
    $today = date('d-m-Y');
    $dated = strtotime($today . ' -1 months');
    $st = date('d-M-Y', $dated);
    $start = new DateTime($st);
    $end = new DateTime($today);
    $end->modify('+1 day');
    $interval = new DateInterval('P1D');
    $daterange = new DatePeriod($start, $interval, $end);
    foreach ($daterange as $date) {
        $dates = $date->format('d-M-Y');
        $wsyd = mysql_query("SELECT * FROM membercontribution where memberno='" . $MNO . "' AND  date ='" . base64_encode($dates) . "' order by primarykey  desc limit 1 ");
        while ($eow = mysql_fetch_array($wsyd)) {

            $mem = $eow['memberno'];
        }
    }
    return $mem;
}

//
function getRecentDateCont($MNO) {

    $qryd = mysql_query("SELECT * FROM membercontribution where memberno='" . $MNO . "' order by primarykey  desc limit 1 ");
    while ($eow = mysql_fetch_array($qryd)) {

        return $lastdate = $eow['date'];
    }
}

function getDefaultRefferal() {

    $defaultacc = mysql_query("SELECT * FROM  settings") or die(mysql_errno());
    while ($rowdefacc = mysql_fetch_array($defaultacc)) {

        return ((base64_decode($rowdefacc['defaultreferral'])));
    }
}

function referal_report($datefrom, $dateto) {


    echo'<table class="table table-striped table-hover table-bordered">
     <thead><tr> <th>Account</th><th>Receiver Name</th> </tr></thead><tbody>';
    $s = strtotime($datefrom);
    $t = strtotime($dateto);
    if ($t < $s) {
        
    } else {
        while ($s <= $t) {
            $sth = mysql_query("SELECT *  FROM  	membercontribution     ");
            while ($row = mysql_fetch_array($sth)) {  //WHERE   transaction='" . getDefaultRefferal() . "' AND  date='" . base64_encode(date('d-M-Y', $s)) . "'
                $amount += base64_decode($row['amount']);
                echo'<tr><td>' . base64_decode($row['transaction']) . '</td><td>' . base64_decode($row['memberno']) . '</td><td>' . base64_decode($row['memberno']) . '</td><td>' . base64_decode($row['memberno']) . '</td>    </tr>';
            }
            $s = $s + 86400;
        }
    }

    echo'<tr><tfoot><td></td><td></td><td>' . getsymbol() . ' ' . number_format($amount, 2) . '</td>  </tfoot></tr></tbody></table>';
}

function interestwaive($user, $tid, $mno) {

    $sql5 = "UPDATE loanintrests SET status='" . base64_encode('waived') . "' WHERE transid='" . $tid . "'";
    $result5 = mysql_query($sql5);
    mysql_query($result5);

    if ($sql5) {

        $aler = '<script type="text/javascript">alert("Interest Waiver was successfull!");</script>';
        echo $aler;

        $users = new Users();
        $activity = "waived loan interest for " . loanname($tid) . " loan for loan applicant " . base64_decode($mno);
        $users->audittrail($user, $activity, base64_decode($mno));
    }
}

function editaddextracash($user, $id, $mno, $efee, $tid, $amount) {

    $sql5 = "UPDATE extracash SET amount='" . base64_encode($amount) . "' WHERE id='" . $id . "'";
    $result5 = mysql_query($sql5);
    mysql_query($result5);

    if ($sql5) {

        $aler = '<script type="text/javascript">alert("' . getglacc($efee) . '" was successfully Edited for ' . getMembername($mno) . '");</script>';
        echo $aler;

        $users = new Users();
        $activity = "Edited Extra Cash for " . loanname($tid) . " loan for loan applicant " . base64_decode($mno);
        $users->audittrail($user, $activity, base64_decode($mno));
    }
}

function removeinterestwaive($user, $tid, $mno) {

    $sql5 = "UPDATE loanintrests SET status='" . base64_encode('active') . "' WHERE transid='" . $tid . "'";
    $result5 = mysql_query($sql5);
    mysql_query($result5);

    if ($sql5) {

        $aler = '<script type="text/javascript">alert("Interest Waiver was successfully Removed");</script>';
        echo $aler;

        $users = new Users();
        $activity = "Un-waived loan interest for " . loanname($tid) . " loan for loan applicant " . base64_decode($mno);
        $users->audittrail($user, $activity, base64_decode($mno));
    }
}

function clearepoloan($user, $id, $mno, $tid, $loanid, $efee, $amount) {

// update data in mysql database
    $sql = "UPDATE loanrepo SET repoamt='" . base64_encode($amount) . "', status='" . base64_encode('completed') . "' WHERE id='" . $id . "'";

    $result = mysql_query($sql);
    mysql_query($result);
// if successfully updated.
    if ($result) {
        $users = new Users();
        $activity = "Cleared a Loan Repossession for " . getMembername(base64_encode($mno));
        $users->audittrail($user, $activity, $user);

        loanrepoupdate($mno, $tid, $amount);

        $alertyes = '<script type="text/javascript">alert("Loan Repossession Clearing was Successful!");</script>';
        $alertfail = '<script type="text/javascript">alert("Loan Repossession Clearing Failed!!");</script>';
        echo $alertyes;
    } else {
        echo $alertfail;
    }
}

function loanrepoupdate($mno, $tid, $amt) {

    $loanamout = fullremainingloanreport($tid);
    if ($amt <= $loanamout) {

        $updlapp = mysql_query('update loanapplication set status="' . base64_encode("completed") . '" where transactionid="' . $tid . '"') or die(mysql_error());
        $updgua = mysql_query('update guarantors set status="' . base64_encode("completed") . '" where transactionid="' . $tid . '"') or die(mysql_error());
        $updloan = mysql_query('update loans set status="' . base64_encode("completed") . '" where transid="' . $tid . '"') or die(mysql_error());
        $updin = mysql_query('update loanintrests set status="' . base64_encode("completed") . '" where transid="' . $tid . '"') or die(mysql_error());
        $updlapp2 = mysql_query('update rollovers set status="' . base64_encode("completed") . '" where tid="' . $tid . '"') or die(mysql_error());
        $updgua2 = mysql_query('update loanrepaydates set status="' . base64_encode("completed") . '" where tid="' . $tid . '"') or die(mysql_error());
        $updin2 = mysql_query('update loandates set status="' . base64_encode("completed") . '" where tid="' . $tid . '"') or die(mysql_error());
        $updgua3 = mysql_query('update interestfreeze set status="' . base64_encode("completed") . '" where transactionid="' . $tid . '"') or die(mysql_error());
        $updloan3 = mysql_query('update extracash set status="' . base64_encode("completed") . '" where transactionid="' . $tid . '"') or die(mysql_error());
        $updin3 = mysql_query('update loandisburse set status="' . base64_encode("completed") . '" where transid="' . $tid . '"') or die(mysql_error());
    } else {

        $newamt = $amt - $loanamout;

        $updlapp = mysql_query('update loanapplication set status="' . base64_encode("completed") . '" where transactionid="' . $tid . '"') or die(mysql_error());
        $updgua = mysql_query('update guarantors set status="' . base64_encode("completed") . '" where transactionid="' . $tid . '"') or die(mysql_error());
        $updloan = mysql_query('update loans set status="' . base64_encode("completed") . '" where transid="' . $tid . '"') or die(mysql_error());
        $updin = mysql_query('update loanintrests set status="' . base64_encode("completed") . '" where transid="' . $tid . '"') or die(mysql_error());
        $updlapp2 = mysql_query('update rollovers set status="' . base64_encode("completed") . '" where tid="' . $tid . '"') or die(mysql_error());
        $updgua2 = mysql_query('update loanrepaydates set status="' . base64_encode("completed") . '" where tid="' . $tid . '"') or die(mysql_error());
        $updin2 = mysql_query('update loandates set status="' . base64_encode("completed") . '" where tid="' . $tid . '"') or die(mysql_error());
        $updgua3 = mysql_query('update interestfreeze set status="' . base64_encode("completed") . '" where transactionid="' . $tid . '"') or die(mysql_error());
        $updloan3 = mysql_query('update extracash set status="' . base64_encode("completed") . '" where transactionid="' . $tid . '"') or die(mysql_error());
        $updin3 = mysql_query('update loandisburse set status="' . base64_encode("completed") . '" where transid="' . $tid . '"') or die(mysql_error());

        $newuser = new User;
        $newuser->saccoincome($_SESSION['users'], base64_decode($tid), '111', $newamt, '4', 'Sacco Officials', 'active', 'Kounty Sacco', '0000', 'Loan Repossession Surplus', date('d-M-Y'), $submit, $session, '3');
    }
}

function viewloanwriteoff() {
    echo '<table class="table table-striped table-bordered table-hover table-full-width" id="sample_2">
    <thead>
    <tr>
    <th>Member Number</th>
    <th>Member Name</th>
    <th>Loan Type</th>
    <th>Transaction ID</th>
    <th>Amount</th>
    <th>Date</th>
    </tr>
    </thead>
    <tbody>';
    $sum = 0;
    $tsum = 0;
    $mqry = mysql_query('select * from loanwriteoff where status="' . base64_encode('active') . '"') or die(mysql_error());
    while ($row = mysql_fetch_array($mqry)) {

        echo '<tr><td>' . base64_decode($row['membernumber']) . '</td>';
        echo '<td>' . getMembername($row['membernumber']) . '</td>';
        echo '<td>' . (loanname($row['transactionid'])) . '</td>';
        echo '<td>' . (base64_decode($row['transactionid'])) . '</td>';
        echo '<td>' . getsymbol() . ' ' . number_format(round(fullremainingloanreport($row['transactionid']))) . '</td>';
        echo '<td>' . base64_decode($row['auditdate']) . '</td></tr>';

        $sum+= fullremainingloanreport($row['transactionid']);
    }

    echo '
          <tr>
          <td colspan="3"></td>
          <td>Total</td>
          <td>' . getsymbol() . ' ' . number_format(round($sum)) . '</td>
          <td></td>
          </tr></tbody>
          </table>';
    echo '<div class="col-md-2"><button class="btn green"value="Print this page" onClick="return printResults()">Print</button></div>';
}

function viewinterestwaive() {
    echo '<table class="table table-striped table-bordered table-hover table-full-width" id="sample_2">
    <thead>
    <tr>
    <th>Member Number</th>
    <th>Member Name</th>
    <th>Loan Type</th>
    <th>Transaction ID</th>
    <th>Amount</th>
    <th>Date</th>
    </tr>
    </thead>
    <tbody>';
    $sum = 0;
    $tsum = 0;
    $mqry = mysql_query('select * from loanintrests where status="' . base64_encode('waived') . '"') or die(mysql_error());
    while ($row = mysql_fetch_array($mqry)) {

        echo '<tr><td>' . base64_decode($row['membernumber']) . '</td>';
        echo '<td>' . getMembername($row['membernumber']) . '</td>';
        echo '<td>' . (loanname($row['transid'])) . '</td>';
        echo '<td>' . (base64_decode($row['transid'])) . '</td>';
        echo '<td>' . getsymbol() . ' ' . number_format(round(base64_decode($row['interest']))) . '</td>';
        echo '<td>' . base64_decode($row['date']) . '</td></tr>';

        $sum+= base64_decode($row['interest']);
    }

    echo '</tbody><tfoot>
          <tr>
          <td colspan="3"></td>
          <td>Total</td>
          <td>' . getsymbol() . ' ' . number_format(round($sum)) . '</td>
          <td></td>
          </tr></tfoot>
          </table>';

    echo '<div class="col-md-2"><button class="btn green"value="Print this page" onClick="return printResults()">Print</button></div>';
}

function viewinterestfreeze() {
    echo '<table class="table table-striped table-bordered table-hover table-full-width" id="sample_2">
    <thead>
    <tr>
    <th>Member Number</th>
    <th>Member Name</th>
    <th>Loan Type</th>
    <th>Transaction ID</th>
    <th>Date</th>
    </tr>
    </thead>
    <tbody>';
    $sum = 0;
    $tsum = 0;
    $mqry = mysql_query('select * from interestfreeze where status="' . base64_encode('active') . '"') or die(mysql_error());
    while ($row = mysql_fetch_array($mqry)) {

        echo '<tr><td>' . base64_decode($row['membernumber']) . '</td>';
        echo '<td>' . getMembername($row['membernumber']) . '</td>';
        echo '<td>' . (loanname($row['transactionid'])) . '</td>';
        echo '<td>' . (base64_decode($row['transactionid'])) . '</td>';
        echo '<td>' . base64_decode($row['auditdate']) . '</td></tr>';
    }

    echo '</tbody></table>';

    echo '<div class="col-md-2"><button class="btn green"value="Print this page" onClick="return printResults()">Print</button></div>';
}

function bankAmountFrom($id) {
    $amount20 = 0;
    $stl = mysql_query('select * from   banking   WHERE  accfrom="' . base64_encode($id) . '"  ') or die(mysql_error());
    while ($row4 = mysql_fetch_array($stl)) {  //withdraw
        $amount20 +=base64_decode($row4['amount']);
    }
    return $amount20;
}

function company_Assets($id) {

    $company_assets = 0;

    $sth = mysql_query('SELECT * FROM  fixed_assets WHERE glaccount="' . base64_encode($id) . '"    ');
    while ($row = mysql_fetch_array($sth)) {

        $stl = mysql_query("SELECT *   FROM depreciation  WHERE  asset_id='" . base64_encode($row['id']) . "' ");
        while ($rq = mysql_fetch_array($stl)) {
            $company_assets += base64_decode($rq['current_value']);
        }
    }
    return $company_assets;
}

function dreciation_Assets($id) {

    $depre_assets = 0;

    $sth = mysql_query('SELECT * FROM  fixed_assets WHERE glaccount="' . base64_encode($id) . '"    ');
    while ($row = mysql_fetch_array($sth)) {

        $stl = mysql_query("SELECT *   FROM depreciation  WHERE  asset_id='" . base64_encode($row['id']) . "' ");
        while ($rq = mysql_fetch_array($stl)) {
            $depre_assets += base64_decode($rq['depreciation']);
        }
    }
    return $depre_assets;
}

function company_Liabilities($id, $datefrom, $dateto) {
    $amount = 0;

    $s = strtotime($datefrom);

    $t = strtotime($dateto);
    if ($t < $s) {
        // 
    } else {
        while ($s <= $t) {

            $sth = mysql_query('SELECT * FROM  liabilities WHERE accountid="' . base64_encode($id) . '" AND date="' . base64_encode(date('d-M-Y', $s)) . '"  ');
            while ($row = mysql_fetch_array($sth)) {
                $amount +=base64_decode($row['lamount']);
            }
            $s = $s + 86400;
        }
        return $amount;
    }
}

function fixedreport() {

    echo '
         <form class="form-inline" action = "" method = "post" >
        <div class="form-group">
<label >Select Account</label>
<select name="account_gl" class="form-control input-medium select2me" required title="Select accrual period" ><option></option>';

    $qryu = mysql_query("select * from fixed_deposit_setting ");
    while ($rowin = mysql_fetch_array($qryu)) {
        echo '<option value="' . base64_decode($rowin['interest_postaccount']) . '">' . getGlname(base64_decode($rowin['interest_postaccount'])) . '</option>';
    }
    echo' </select>
				
										
									</div>
<div class="form-group">
         <label> Date Range </label>
         </div>
								<div class="form-group">
										
									<div class="input-group input-large date-picker input-daterange"  data-date="10-Nov-2012" data-date-format="dd-M-yyyy">
<input type="text" required Title="Enter Date From" placeholder="Enter Date From" class="form-control" name="datefrom">
<span class="input-group-addon">to

</span><input type="text" required placeholder="Enter Date To" Title="Enter Date To" class="form-control" name="dateto">

</div>
								</div>
								<div class="form-group">
								
								<button class = "btn green" name ="btnpreview">Generate</button>
                                                                </div>
							</form>';
    if (isset($_POST['btnpreview'])) {
        echo '<div id="mt"><table class="table table-striped table-bordered table-hover table-full-width" id="sample_2">
   <thead> <tr><th colspan="3"><h3 align="center"><b><b> ' . $_POST['datefrom'] . ' To ' . $_POST['dateto'] . ' ' . getGlname($_POST['account_gl']) . '  </b></h3></th></tr>
   <tr><th>Member Number</th><th>Member Name</th><th> Interest</th></thead></tr>';

        $sum = 0;
        $inter = 0;
        $datefrom = $_POST['datefrom'];
        $dateto = $_POST['dateto'];
        $start = new DateTime($datefrom);
        $end = new DateTime($dateto);
        $end->modify('+1 day');
        $interval = new DateInterval('P1D');
        $daterange = new DatePeriod($start, $interval, $end);
        $con_gld = base64_encode($_POST['account_gl']);

        $myacs = mysql_query("select * from memberaccs where glaccid='" . getFixedGlAcc($con_gld) . "' AND status='" . base64_encode('active') . "' ");
        while ($rowx = mysql_fetch_array($myacs)) {

            echo '    <tr>
                                                    <td>' . base64_decode($rowx['mno']) . '</td>
                                                    <td>' . getMembername($rowx['mno']) . '</td>';
            echo ' <td>KES.' . $accumeInte = GainedInterest($rowx['mno'], $daterange, $con_gld) . '</td>';
            echo '</tr>';

            $sum = $sum + $accumeInte;
        }


        echo '<tr><td colspan="1"></td><td>TOTAL</td><td>KES.' . number_format($sum, 2) . '</td></tr></table><div>';
        echo '<div class="col-md-4"><button  class="btn green"value="Print this page" onClick="return printResults()">Print</button></div>';
    }
}

function fixed_depo_contribution($mno) {
    $amoun = 0;
    $qtry = mysql_query('SELECT * FROM membercontribution WHERE memberno="' . $mno . '" and transaction="' . base64_encode('Fx' . getFixedDepoId()) . '"');
    while ($repo = mysql_fetch_array($qtry)) {
        $amoun += base64_decode($repo['amount']);
    }
    if ($amoun != 0) {
        return $amoun;
    }
}

function fixed_depo_interest($mn) {
    $amoun = 0;
    $qtry = mysql_query('SELECT * FROM membercontribution WHERE memberno="' . $mn . '" and transaction="' . base64_encode(getFixed_depo_interestGl()) . '"');
    while ($repo = mysql_fetch_array($qtry)) {
        $amoun += base64_decode($repo['amount']);
    }
    if ($amoun != 0) {
        return $amoun;
    }
}

function getFixedmin() {
    $qytpmn = mysql_query("SELECT * FROM fixed_deposit_setting ");
    while ($rowmin = mysql_fetch_array($qytpmn)) {
        return base64_decode($rowmin['min_account_balance']);
    }
}

function getFixedMax() {
    $qytmn = mysql_query("SELECT * FROM fixed_deposit_setting ");
    while ($rowmx = mysql_fetch_array($qytmn)) {
        return base64_decode($rowmx['max_account_balance']);
    }
}

function getFixedDepoName($id) {
    $qyt = mysql_query("SELECT * FROM fixed_deposit_setting WHERE id='" . $id . "'");
    while ($rowe = mysql_fetch_array($qyt)) {
        return base64_decode($rowe['account_name']);
    }
}

//get fixed account details
function getFixedDetail($gld) {
    include 'config2.php';
    $userd = base64_encode($_SESSION['users']);
    $stmt = $dbhs->prepare('SELECT * FROM fixed_deposit_setting WHERE gl_account = :1 ');
    $stmt->bindParam(':1', ($gld));
    $stmt->execute();
    $result = $stmt->fetch();
    return $result; //base64_decode
}

function getFixedDepoId() {
    $qyty = mysql_query("SELECT * FROM fixed_deposit_setting ");
    while ($rowd = mysql_fetch_array($qyty)) {
        return ($rowd['id']);
    }
}

function getFixedDepoEntryFee() {
    $qyty = mysql_query("SELECT * FROM fixed_deposit_setting ");
    while ($rowd = mysql_fetch_array($qyty)) {
        return base64_decode($rowd['entry_fee']);
    }
}

function getManagementFee() {
    $qytm = mysql_query("SELECT * FROM fixed_deposit_setting ");
    while ($rowm = mysql_fetch_array($qytm)) {
        return base64_decode($rowm['management_fee']);
    }
}

function getFreq_Accrual() {
    $qytf = mysql_query("SELECT * FROM fixed_deposit_setting ");
    while ($rowf = mysql_fetch_array($qytf)) {
        return base64_decode($rowf['frequency_accrual']);
    }
}

function getFreq_Posting() {
    $qytp = mysql_query("SELECT * FROM fixed_deposit_setting ");
    while ($rowp = mysql_fetch_array($qytp)) {
        return base64_decode($rowp['frequency_posting']);
    }
}

function getFreq_Management() {
    $qytm = mysql_query("SELECT * FROM fixed_deposit_setting ");
    while ($rowm = mysql_fetch_array($qytm)) {
        return base64_decode($rowm['Frequecny_management_fee']);
    }
}

function getCron_count() {
    $qytp = mysql_query("SELECT * FROM fixed_deposit_setting ");
    while ($rowp = mysql_fetch_array($qytp)) {
        return base64_decode($rowp['cron_jobs']);
    }
}

function getCronManageCount() {
    $qytp = mysql_query("SELECT * FROM fixed_deposit_setting ");
    while ($rowp = mysql_fetch_array($qytp)) {
        return base64_decode($rowp['man_fee_cron']);
    }
}

function getFixedRate() {
    $qytp = mysql_query("SELECT * FROM fixed_deposit_setting ");
    while ($rowp = mysql_fetch_array($qytp)) {
        return base64_decode($rowp['interest_rate']);
    }
}

function getPeriodId($id) {
    $qytpd = mysql_query("SELECT * FROM periodictyrecord where periodname='" . base64_encode($id) . "'");
    while ($rowpd = mysql_fetch_array($qytpd)) {
        return ($rowpd['id']);
    }
}

function getFixed_depo_interestGl() {
    $qytgl = mysql_query("SELECT * FROM  fixed_deposit_setting ");
    while ($rowgl = mysql_fetch_array($qytgl)) {
        return base64_decode($rowgl['interest_glacc']);
    }
}

function getPeriodDay($id) {
    $qytpd = mysql_query("SELECT * FROM periodictyrecord where id='$id'");
    while ($rowpd = mysql_fetch_array($qytpd)) {
        return (base64_decode($rowpd['numberdays']));
    }
}

function getFixedAccReg() {
    $qytgl = mysql_query("SELECT * FROM fixed_deposit_setting ");
    while ($rowgl = mysql_fetch_array($qytgl)) {
        return base64_decode($rowgl['accountfee_gl_id']);
    }
}

function getManagementGlAccount() {
    $qytgl = mysql_query("SELECT * FROM fixed_deposit_setting");
    while ($rowgl = mysql_fetch_array($qytgl)) {
        return base64_decode($rowgl['management_fee_glacc']);
    }
}

function getMana_GlAcc_name($id) {
    $qytgl = mysql_query("SELECT * FROM glaccounts where id='$id'");
    while ($rowgl = mysql_fetch_array($qytgl)) {
        return base64_decode($rowgl['acname']);
    }
}

function getRegFeeGlName($id) {
    $qytgl = mysql_query("SELECT * FROM glaccounts where id='$id'");
    while ($rowgl = mysql_fetch_array($qytgl)) {
        return base64_decode($rowgl['acname']);
    }
}

function GainedInterest($mno, $daterange, $glId) {
    $sum = 0;

    //check date to determine if its today
    if ($daterange == date('d-M-Y')) {

        $qry = mysql_query('select * from membercontribution where memberno="' . $mno . '" and date="' . base64_encode($daterange) . '" and transaction="' . $glId . '"') or die(mysql_error());
        while ($row = mysql_fetch_array($qry)) {
            $sum+=base64_decode($row['amount']);
        }
        if ($sum != 0) {
            return $sum;
        }
    } else {

        foreach ($daterange as $date) {

            $dates = $date->format('d-M-Y');
            $qry = mysql_query('select * from membercontribution where memberno="' . $mno . '" and date="' . base64_encode($dates) . '" and transaction="' . $glId . '"') or die(mysql_error());
            while ($row = mysql_fetch_array($qry)) {
                $sum+=base64_decode($row['amount']);
            }
        }
        if ($sum != 0) {
            return $sum;
        }
    }
}

function getdefaultbank() {
    $qrbnk = mysql_query('SELECT * FROM settings ');
    WHILE ($rwdf = mysql_fetch_array($qrbnk)) {
        return $rwdf['defaultbank'];
    }
}

function dateoughttopaycheck($tid, $date) {
    $sth = mysql_query("SELECT *   FROM   tid='$tid'    AND    dates='" . strtotime($date) . "' ORDER BY id DESC LIMIT 1 ");
    while ($row = mysql_fetch_array($sth)) {
        return base64_decode($row['dates']);
    }
}

function incomeBf($dateto) {
    $totalrow1 = 0;
    $debit2 = 0;
    $date2 = strtotime($dateto) - 86400;  //we deduct one day b4 the from you chosed for the date range

    $datefrom = date('31-12-2010');  //start of calculation 

    $s = strtotime($datefrom);

    $t = $date2;
    if ($t < $s) {
        
    } else {
        while ($s <= $t) {

            $sth1 = mysql_query("SELECT * FROM  paymentin  WHERE     date = '" . base64_encode(date("d-M-Y", $s)) . "'  ");
            while ($row11 = mysql_fetch_array($sth1)) {

                $totalrow1 +=base64_decode($row11['amount']);
            }


            $sth = mysql_query("SELECT *FROM  banking    WHERE    mode='ZGVwb3NpdA=='   AND   date='" . base64_encode(date('d-M-Y', $s)) . "'  ");
            while ($rq = mysql_fetch_array($sth)) {
                $debit2 +=base64_decode($rq['amount']);
            }


            $s = $s + 86400;
            $total = $totalrow1 + $debit2;
        }

        return $total;
    }
}

function expensesBf($dateto) {
    $totalrow2 = 0;
    $credit2 = 0;
    $date2 = strtotime($dateto) - 86400;  //we deduct one day b4 the from you chosed for the date range

    $datefrom = date('31-12-2010');  //start of calculation 

    $s = strtotime($datefrom);

    $t = $date2;
    if ($t < $s) {
        
    } else {
        while ($s <= $t) {

            $stmt = mysql_query("SELECT * FROM paymentout   WHERE    date = '" . base64_encode(date("d-M-Y", $s)) . "'  ");
            while ($row = mysql_fetch_array($stmt)) {

                $totalrow2 +=base64_decode($row['amount']);
            }


            $stl = mysql_query("SELECT *FROM  banking    WHERE  mode='d2l0aGRyYXc='  AND   date='" . base64_encode(date('d-M-Y', $s)) . "' ");
            while ($rq1 = mysql_fetch_array($stl)) {
                $credit2 +=base64_decode($rq1['amount']);
            }


            $total = $totalrow2 + $credit2;


            $s = $s + 86400;
        }
    }

    return $total;
}

function getMemberBankName($id) {
    $nbnm = mysql_query("select * from member_banks where id='$id'");
    while ($rew = mysql_fetch_array($nbnm)) {
        return base64_decode($rew['bank_name']);
    }
}

function viewextracash() {
    echo '<table class="table table-striped table-bordered table-hover table-full-width" id="sample_2">
    <thead>
    <tr>
    <th>Date</th>
    <th>Member Number</th>
    <th>Member Name</th>
    <th>Fee Type</th>
    <th>Loan Type</th>
    <th>Transaction ID</th>
    <th>Amount</th>
    </tr>
    </thead><tbody>';
    $sum = 0;
    $tsum = 0;
    $mqry = mysql_query('select * from extracash where status="' . base64_encode('active') . '"') or die(mysql_error());
    while ($row = mysql_fetch_array($mqry)) {

        echo '<tr><td>' . base64_decode($row['auditdate']) . '</td>';
        echo '<td>' . base64_decode($row['membernumber']) . '</td>';
        echo '<td>' . getMembername($row['membernumber']) . '</td>';
        echo '<td>' . getglacc(base64_decode($row['efee'])) . '</td>';
        echo '<td>' . (loanname($row['transactionid'])) . '</td>';
        echo '<td>' . (base64_decode($row['transactionid'])) . '</td>';
        echo '<td>' . getsymbol() . ' ' . number_format(round(base64_decode($row['amount']))) . '</td></tr>';

        $sum+= base64_decode($row['amount']);
    }

    echo '</tbody><tfoot><tr>
          <td colspan="5"></td>
          <td>Total</td>
          <td>' . getsymbol() . ' ' . number_format(round($sum)) . '</td>
          </tr></tfoot>
          </table>';

    echo '<div class="col-md-2"><button class="btn green"value="Print this page" onClick="return printResults()">Print</button></div>';
}

function timesinterestcheck($mno, $tid) {
    $qry = mysql_query('select * from paymentin where transid="' . $tid . '" and payeeid="' . base64_encode($mno) . '" and transname="' . base64_encode('125') . '"') or die(mysql_error());
    if (mysql_num_rows($qry) >= '3') {

        return 'false';
    } else {

        return 'true';
    }
}

function loandefaultcheck($tid) {
    $qry = mysql_query('select * from rollovers where tid="' . $tid . '"') or die(mysql_error());
    if (mysql_num_rows($qry) >= '1') {

        return 'false';
    } else {

        return 'true';
    }
}

function interestfreezecheck($tid) {
    $qry = mysql_query('select * from interestfreeze where transactionid="' . $tid . '"') or die(mysql_error());
    if (mysql_num_rows($qry) == '1') {

        return 'false';
    } else {

        return 'true';
    }
}

function interestwaivecheck($tid) {
    $qry = mysql_query('select * from loanintrests where transid="' . $tid . '" and status="' . base64_encode('waived') . '"') or die(mysql_error());
    if (mysql_num_rows($qry) == '1') {

        return 'true';
    } else {

        return 'false';
    }
}

function loanrepocheck($tid) {
    $qry = mysql_query('select * from loanrepo where transactionid="' . $tid . '"') or die(mysql_error());
    if (mysql_num_rows($qry) == '1') {

        return 'false';
    } else {

        return 'true';
    }
}

function loanwoffcheck($tid) {
    $qry = mysql_query('select * from loanwriteoff where transactionid="' . $tid . '"') or die(mysql_error());
    if (mysql_num_rows($qry) == '1') {

        return 'false';
    } else {

        return 'true';
    }
}

function reducingloanbalances() {

    $check = mysql_query('select * from loansettings where status="' . base64_encode('Active') . '" and ratetype="' . base64_encode('2') . '"') or die(mysql_error());

    while ($asd = mysql_fetch_array($check)) {

        $kech = mysql_query('select * from loanapplication where loantype="' . base64_encode($asd['id']) . '" and status="' . base64_encode('pending') . '"') or die(mysql_error());

        while ($das = mysql_fetch_array($kech)) {

            $sec = mysql_query('select * from paymentin where transid="' . $das['transactionid'] . '" and transname="' . base64_encode('125') . '"') or die(mysql_error());

            while ($sad = mysql_fetch_array($sec)) {

                $inqry = mysql_query('insert into chargedinterest values("","' . $sad['payeeid'] . '","' . $sad['amount'] . '","' . base64_encode("active") . '","' . $sad['date'] . '","' . $sad['transid'] . '")') or die(mysql_error());
            }
        }
    }
}

function interestautocharge() {

    $acnaqr = mysql_query('select * from loansettings where ratetype="' . base64_encode('2') . '" and status="' . base64_encode("Active") . '"') or die(mysql_error());
    while ($asd = mysql_fetch_array($acnaqr)) {

        $kech = mysql_query('select * from loanapplication where loantype="' . base64_encode($asd['id']) . '" and status="' . base64_encode('pending') . '"') or die(mysql_error());
        while ($das = mysql_fetch_array($kech)) {

            if (($asd['id']) == '10') {

                if (timesinterestcheck(base64_decode($das['membernumber']), $das['transactionid']) == 'true') {

                    $loanamt = principlepaid($das['transactionid']);

                    $rate = (loanrate($asd['id']) / 100) / 12;
                    $intrstx = $rate * $loanamt;

                    echo '<br/>';
                    echo getloaname($asd['id']);
                    echo getMembername($das['membernumber']);
                    echo $intrst = floor($intrstx);

                    $chinqry = mysql_query('select * from chargedinterest where transid="' . $das['transactionid'] . '" and amount="' . base64_encode($intrst) . '" and date="' . base64_encode(date('d-M-Y')) . '"') or die(mysql_error());
                    if (mysql_num_rows($chinqry) >= 1) {
                        
                    } else {

                        if ($intrst > 0) {
                            $inqry = mysql_query('insert into chargedinterest values("","' . $das['membernumber'] . '","' . base64_encode($intrst) . '","' . base64_encode("active") . '","' . base64_encode(date('d-M-Y')) . '","' . $das['transactionid'] . '")') or die(mysql_error());
                        }
                    }
                }
            } else {

                $loanamt = principlepaid($das['transactionid']);

                $rate = (loanrate($asd['id']) / 100) / 12;
                $intrstx = $rate * $loanamt;

                echo '<br/>';
                echo getloaname($asd['id']);
                echo getMembername($das['membernumber']);
                echo $intrst = floor($intrstx);

                $chinqry = mysql_query('select * from chargedinterest where transid="' . $das['transactionid'] . '" and amount="' . base64_encode($intrst) . '" and date="' . base64_encode(date('d-M-Y')) . '"') or die(mysql_error());
                if (mysql_num_rows($chinqry) >= 1) {
                    
                } else {

                    if ($intrst > 0) {
                        $inqry = mysql_query('insert into chargedinterest values("","' . $das['membernumber'] . '","' . base64_encode($intrst) . '","' . base64_encode("active") . '","' . base64_encode(date('d-M-Y')) . '","' . $das['transactionid'] . '")') or die(mysql_error());
                    }
                }
            }
        }
    }
}

function addchargedinterest($tid, $intrst, $mno, $duration) {

    $chinqry = mysql_query('select * from chargedinterest where transid="' . $tid . '" and amount="' . base64_encode($intrst) . '" and date="' . base64_encode($duration) . '"') or die(mysql_error());
    if (mysql_num_rows($chinqry) >= 1) {
        
    } else {

        if ($intrst > 0) {
            $inqry = mysql_query('insert into chargedinterest values("","' . base64_encode($mno) . '","' . base64_encode($intrst) . '","' . base64_encode("active") . '","' . base64_encode($duration) . '","' . $tid . '")') or die(mysql_error());
        }
    }
}

function addpersonalchargedinterest($mno, $tid, $duration) {

    $loanamt = principlepaid($tid);
    $rate = (loanrates($tid) / 100) / 12;
    $intrstx = $rate * $loanamt;
    $intrst = floor($intrstx);

    $chinqry = mysql_query('select * from chargedinterest where transid="' . $tid . '" and amount="' . base64_encode($intrst) . '" and date="' . base64_encode($duration) . '"') or die(mysql_error());
    if (mysql_num_rows($chinqry) >= 1) {

        $alertyfail = '<script type="text/javascript">alert("Manual Interest Charged of ' . loanname($tid) . ' for the Month of ' . $duration . ' for ' . getMembername($mno) . ' already Exists");</script>';
        echo $alertyfail;
    } else {

        if ($intrst > 0) {
            $inqry = mysql_query('insert into chargedinterest values("","' . ($mno) . '","' . base64_encode($intrst) . '","' . base64_encode("active") . '","' . base64_encode($duration) . '","' . $tid . '")') or die(mysql_error());
        }
    }

    if ($inqry) {

        $alertyes = '<script type="text/javascript">alert("Manual Interest Charged of ' . loanname($tid) . ' successfully created for ' . getMembername($mno) . '");</script>';
        echo $alertyes;
    }
}

function personalchargeinterest($tid, $mno) {

    echo '
        <form method="POST">
        <div class="form-body">
	<div class="form-group">
        <div class="col-md-4">
        <br/>
        <span class="red">Member Name :</span><span class="green"> ' . getMembername($mno) . '</span>
        <br/>    
        <span class="red">Member Number :</span><span class="green"> ' . base64_decode($mno) . '</span>
        <br/>
        <span class="red">Transaction ID :</span><span class="green"> ' . base64_decode($tid) . '</span>
        <br/>
        <span class="red">Loan Name :</span><span class="green"> ' . loanname($tid) . '</span>

</div>
</div>
</div>
<input type="hidden" value="' . ($mno) . '" name="mno">
<input type="hidden" value="' . ($tid) . '" name="tid">
<div class="form-body">
	<div class="form-group">
        <label class="col-md-3 control-label">Select Month</label>
        <div class="col-md-4">
 <select class="form-control input-medium" name="month" required placeholder="Please select a Month to invoice" title="Please select a Month to invoice">
<option value=""></option>    
<option value="01-Jan-' . date('Y') . '">JANUARY</option>    
<option value="01-Feb-' . date('Y') . '">FEBRUARY</option>    
<option value="01-Mar-' . date('Y') . '">MARCH</option>    
<option value="01-Apr-' . date('Y') . '">APRIL</option>    
<option value="01-May-' . date('Y') . '">MAY</option>    
<option value="01-Jun-' . date('Y') . '">JUNE</option>    
<option value="01-Jul-' . date('Y') . '">JULY</option>    
<option value="01-Aug-' . date('Y') . '">AUGUST</option>    
<option value="01-Sep-' . date('Y') . '">SEPTEMBER</option>    
<option value="01-Oct-' . date('Y') . '">OCTOBER</option>    
<option value="01-Nov-' . date('Y') . '">NOVEMBER</option>    
<option value="01-Dec-' . date('Y') . '">DECEMBER</option>    
</select>
</div>
</div>
</div>
<br/>
<div class="form-body">
	<div class="form-group">
        <div class="col-md-4">
        <button name="msubmit" class="btn green">Submit</button>
        </div>
</div>
</div>
</form>';
}

function getextrafee($tid) {
    $qry = mysql_query('select * from extracash where transactionid="' . $tid . '"') or die(mysql_error());
    while ($rslt = mysql_fetch_array($qry)) {
        $one+=base64_decode($rslt['amount']);
    }
    return round($one);
}

function getPeridocity($id) {
    $qytpd = mysql_query("SELECT * FROM periodictyrecord where id='$id'");
    while ($rowpd = mysql_fetch_array($qytpd)) {
        return (base64_decode($rowpd['periodname']));
    }
}

function addextrafeepaid($tid) {
    $suml = mysql_query('select * from paymentin where transid="' . $tid . '" and transname!="' . base64_encode('125') . '" and  transname!="' . base64_encode('96') . '"') or die(mysql_error());
    $su = 0;
    while ($sumlrslt = mysql_fetch_array($suml)) {
        $su+=base64_decode($sumlrslt['amount']);
    }
    if ($su == 0) {
        return 0;
    } else {
        return $su;
    }
}

function extrafeebalance($tid) {

    $extra = getextrafee($tid) - addextrafeepaid($tid);

    return $extra;
}

function loanwriteoffcheck($tid) {

    $one = mysql_query("select * from loanwriteoff where transactionid='" . ($tid) . "'") or die(mysql_error());
    if (mysql_num_rows($one) >= '1') {

        return 'true';
    } else {

        return 'false';
    }
}

function getrefno($tid) {
    $qry = mysql_query('select * from loanapplication where transactionid="' . ($tid) . '"') or die(mysql_error());
    $rslt = mysql_fetch_array($qry);
    return (base64_decode($rslt['reference_number']));
}

function getMemberSavings($mno) {
    $allsave = 0;
    $qryc = mysql_query('select * from membercontribution where memberno="' . ($mno) . '" and transaction="' . base64_encode(getdefaultsavingsaccount()) . '"') or die(mysql_error());
    while ($rslts = mysql_fetch_array($qryc)) {
        $allsave +=(base64_decode($rslts['amount']));
    }
    return $allsave;
}

function getWithdrawalFee() {
    $qrycc = mysql_query('select * from withdrawalfee where id="1" ') or die(mysql_error());
    while ($rsltsx = mysql_fetch_array($qrycc)) {
        return (base64_decode($rsltsx['withdraw_fee']));
    }
}

//post user permissions
if (isset($_POST['addpermision'])) {
    include 'config2.php';
    $meso = '';

    $theread = '0';
    $thewrite = '0';
    if(!empty($_POST['Read'])){
        $theread = $_POST['Read'];
    }
    if(!empty($_POST['Write'])){
        $thewrite = $_POST['Write'];
    }
    $user = $_POST['user'];
    if ($user == '---select user---') {
        $meso = "Error.please select a user";
    } else if ($_POST['page'] == '') {
        $meso = "Error.please select a page";
    } else {

        foreach ($_POST['page'] as $key => $page) {
            if ($theread[$key] == 'allow') {
                $read = '1';
            } else {
                $read = '0';
            }
            if ($thewrite[$key] == 'allow') {
                $write = '1';
            } else {
                $write = '0';
            }
            $Userd = base64_encode($user);
            $paged = base64_encode($page);
            $writen = base64_encode($write);
            $Readed = base64_encode($read);
            //$data = array( $user, $page, $read, $write);
            $check = $dbhs->prepare('SELECT * FROM permission WHERE page = :1 AND user = :2');
            $check->execute(array(':1' => $paged, ':2' => $Userd));
            if ($check->rowCount() > 0) {

                $stmt = $dbhs->prepare('UPDATE permission SET page_read = :1, page_write = :2 WHERE page = :3 AND user = :4');
                $stmt->execute(array(':1' => $Readed, ':2' => $writen, ':3' => $paged, ':4' => $Userd));
                if ($stmt) {
                    $meso = "Success permission updated";
                } else {
                    $meso = "Error.Permisions failed";
                }
            } else {

                $stmtd = $dbhs->prepare('INSERT INTO permission (user,page,page_read,page_write) VALUES(:1, :2, :3, :4)');
//$stmtd->execute(array(':1'=>$user, ':2'=>$page, ':3'=>$read, ':4'=>$write ));
                $stmtd->bindParam(':1', $Userd);
                $stmtd->bindParam(':2', $paged);
                $stmtd->bindParam(':3', $Readed);
                $stmtd->bindParam(':4', $writen);
                $stmtd->execute();
                if ($stmtd) {
                    $meso = "Success permission added";
                } else {
                    $meso = "Error.Permisions failed";
                }
            }
        }
        echo $meso;
    }
}
//deasign read  permisions per user
if (isset($_POST['btnRead'])) {
    include 'config2.php';
    
    $meso = '';
    $permed = $_POST['permID'];
    $theread = base64_encode('0');
    $thewrite = base64_encode('1');
    $check = $dbhs->prepare('SELECT * FROM permission WHERE id = :1 AND page_write = :2');
    $check->bindParam(':1', $permed);
    $check->bindParam(':2', $thewrite);
    $check->execute();
    $ret = $check->rowCount();
    if ($check->rowCount() > 0) {
        $stmt = $dbhs->prepare('UPDATE permission SET page_read = :1 WHERE id = :pid');
        $stmt->execute(array(':pid' => $permed, ':1' => $theread));
        if ($stmt) {
            $meso = '<script type="text/javascript">alert("read permissions have been de-assigned!");</script>';
            echo $meso;
        } else {
            $meso = '<script type="text/javascript">alert("Error.Permisions failed!");</script>';
            echo $meso;
        }
    } else {

        $stmt = $dbhs->prepare('DELETE FROM permission  WHERE id = :pid');
        $stmt->execute(array(':pid' => $permed));
        if ($stmt) {
            $meso = '<script type="text/javascript">alert("permissions have been de-assigned!");</script>';
            echo $meso;
        }
    }
}
if (isset($_POST['btnWrite'])) {
    include 'config2.php';
    
    $meso = '';
    $permed = $_POST['permID'];
    $theread = base64_encode('1');
    $thewrite = base64_encode('0');
    $check = $dbhs->prepare('SELECT * FROM permission WHERE id = :1 AND page_read = :2');
    $check->bindParam(':1', $permed);
    $check->bindParam(':2', $theread);
    $check->execute();
    $ret = $check->rowCount();
    if ($check->rowCount() > 0) {
        $stmt = $dbhs->prepare('UPDATE permission SET page_write = :1 WHERE id = :pid');
        $stmt->execute(array(':pid' => $permed, ':1' => $thewrite));
        if ($stmt) {
            $meso = '<script type="text/javascript">alert("write permissions have been de-assigned!");</script>';
            echo $meso;
        } else {
            $meso = '<script type="text/javascript">alert("Error.Permisions failed!");</script>';
            echo $meso;
        }
    } else {

        $stmt = $dbhs->prepare('DELETE FROM permission  WHERE id = :pid');
        $stmt->execute(array(':pid' => $permed));
        if ($stmt) {
            $meso = '<script type="text/javascript">alert("permissions have been de-assigned!");</script>';
            echo $meso;
        }
    }
}
if (isset($_POST['Both'])) {
    $meso = '';
    include 'config2.php';
    $perm = $_POST['permID'];

    $stmt = $dbhs->prepare('DELETE FROM permission  WHERE id = :pid');
    $stmt->execute(array(':pid' => $perm));
    if ($stmt) {
        $meso = '<script type="text/javascript">alert("permissions have been de-assigned!");</script>';
        echo $meso;
        ;
    } else {
        $meso = '<script type="text/javascript">alert("Erro! de-assigned failed!");</script>';
        echo $meso;
    }
}

//get permision given logined user and page ID
function getPagePermission($page) {
    include 'config2.php';
    $userd = base64_encode($_SESSION['users']);
    $stmt = $dbhs->prepare('SELECT * FROM 	permission WHERE page = :1 AND user = :2');
    $stmt->bindParam(':1', ($page));
    $stmt->bindParam(':2', ($userd));
    $stmt->execute();
    $name = $stmt->fetch();
//echo"hapa".$name;
    return $name; //base64_decode
}

function loanid($tid) {
    $qry = mysql_query('select * from loanapplication where transactionid="' . ($tid) . '"') or die(mysql_error());
    $rslt = mysql_fetch_array($qry);
    return (base64_decode($rslt['loantype']));
}

//get accrued interst at maturity period
function savingsPosting($membernumber, $defaultAccount, $datefrom, $dateto) {
    $start = new DateTime($datefrom);
    $end = new DateTime($dateto);
    $end->modify('+1 day');
    $interval = new DateInterval('P1D');
    $daterange = new DatePeriod($start, $interval, $end);
    $sum = 0;

    foreach ($daterange as $date) {

        $dates = $date->format('d-M-Y');
        $qry = mysql_query('select * from membercontribution where memberno="' . $membernumber . '" and date="' . base64_encode($dates) . '" and transaction="' . $defaultAccount . '" ') or die(mysql_error());
        while ($row = mysql_fetch_array($qry)) {
            $sum+=base64_decode($row['amount']);
        }
    }
    if ($sum != 0) {

        return $sum;
    }
}

//get memeber title given title title ids
function getTitle($ids) {
    $qryt = mysql_query('select * from memebr_title where id="' . $ids . '" and status="' . base64_encode('active') . '" ') or die(mysql_error());
    while ($rowt = mysql_fetch_array($qryt)) {
        return base64_decode($rowt['title']);
    }
}

//get member category given category id
function getMemberCategory($IDs) {
    $qryt = mysql_query('select * from member_category where id="' . $IDs . '" and status="' . base64_encode('active') . '" ') or die(mysql_error());
    while ($rowt = mysql_fetch_array($qryt)) {
        return base64_decode($rowt['category_name']);
    }
}

//get CRO given category id
function getCRO($IDs) {
    $qryt = mysql_query('select * from users where id="' . $IDs . '" and status="' . base64_encode('Active') . '" ') or die(mysql_error());
    while ($rq = mysql_fetch_array($qryt)) {
        return base64_decode($rq['fname']) . ' ' . base64_decode($rq['mname']) . ' ' . base64_decode($rq['lname']);
    }
}

//get recruiting agents given category id
function getAgents($IDs) {
    $qryt = mysql_query('select * from registeragents where id="' . $IDs . '"  ') or die(mysql_error());
    while ($agt = mysql_fetch_array($qryt)) {
        return base64_decode($agt['fname']) . ' ' . base64_decode($agt['mname']) . ' ' . base64_decode($agt['lname']);
    }
}

function default_setting() {
    $sth = mysql_query("SELECT * FROM settings");
    $row = mysql_fetch_array($sth);
    return $row;
}

function sacco_Details() {
    $sth = mysql_query("SELECT * FROM saccodetails");
    $row = mysql_fetch_array($sth);
    return $row;
}

//edit processing fee ranges  // 	
if (isset($_POST['editprocessingfee'])) {
    include 'conf.php';
    $theId = $_POST['FeeID'];
    $amutfrm = $_POST['amountfrom'];
    $amutto = $_POST['amounttp'];
    $pfee = $_POST['processingfee'];
    $stm = mysql_query("update loanprocessingfees SET amountfrom='" . base64_encode($amutfrm) . "', amountto='" . base64_encode($amutto) . "', amount='" . base64_encode($pfee) . "' where id='" . $theId . "'  ");
    if ($stm) {
        echo "Updated sucessfuly";
    } else {
        echo "Error!" . mysql_error();
    }
}
//edit withdraw fee ranges  //	
if (isset($_POST['editwithdrawfee'])) {
    include 'conf.php';
    $theId = $_POST['FeeID'];
    $amutfrm = $_POST['amountfrom'];
    $amutto = $_POST['amounttp'];
    $pfee = $_POST['processingfee'];
    $stm = mysql_query("update withdrawalfee SET amountfrom='" . base64_encode($amutfrm) . "', amount_to='" . base64_encode($amutto) . "', amount='" . base64_encode($pfee) . "' where id='" . $theId . "'  ");
    if ($stm) {
        echo "Updated sucessfuly";
    } else {
        echo "Error!" . mysql_error();
    }
}
//edit transfer fee ranges  //	
if (isset($_POST['editTransferfee'])) {
    include 'conf.php';
    $theId = $_POST['FeeID'];
    $pfee = $_POST['transferFee'];
    $stm = mysql_query("update fee_transfer_setting SET  amount_charged='" . base64_encode($pfee) . "' where id='" . $theId . "'  ");
    if ($stm) {
        echo "Updated sucessfuly";
    } else {
        echo "Error!" . mysql_error();
    }
}
//delete account transfer realtionship
if (isset($_POST['deleteRange'])) {
    include 'conf.php';
    $theId = $_POST['did'];
    $stm = mysql_query("Delete from fee_transfer_setting  where id='" . $theId . "'  ");
    if ($stm) {
        echo "Deleted sucessfuly";
    } else {
        echo "Error!" . mysql_error();
    }
}

//get processing fee table details
function getProcessingfee($lonId) {
    include 'config2.php';
    $stmt = $dbhs->prepare('SELECT * FROM loanprocessingfees where loanid="' . base64_encode($lonId) . '" ');
    $stmt->execute();
    $results = $stmt->fetchAll();
    return $results;
}

function processingLoanId($lonId) {
    $qryt = mysql_query('select * from loanprocessingfees where loanid="' . base64_encode($lonId) . '" ');
    while ($rwt = mysql_fetch_array($qryt)) {
        return base64_decode($rwt['loanid']);
    }
}

////transfer charges from one gl accoun to another
function getTransfercharge($accfrm, $accTo) {
    include 'config2.php';
    $stmt = $dbhs->prepare('SELECT * FROM fee_transfer_setting where account_from="' . base64_encode($accfrm) . '" AND account_to="' . base64_encode($accTo) . '" ');
    $stmt->execute();
    $results = $stmt->fetch();
    return $results;
}

//the default tranfer fee account in settings
function getDefaultTransfeeAccount() {
    $detransf = mysql_query("SELECT * FROM  settings") or die(mysql_error());
    while ($rowtrns = mysql_fetch_array($detransf)) {
        return ($rowtrns['transfer_fee_glaccount']);
    }
}

//the default withdraw fee account in settings
function getDefaultWithdrawAccount() {
    $detfwith = mysql_query("SELECT * FROM  settings") or die(mysql_error());
    while ($rowwdf = mysql_fetch_array($detfwith)) {
        return ($rowwdf['withdrawfee_glaccount']);
    }
}

//get withdraw fee ranges
function getWithdrawfee($gLId) {
    include 'config2.php';
    $stmt = $dbhs->prepare('SELECT * FROM withdrawalfee where glaccount="' . base64_encode($gLId) . '" ');
    $stmt->execute();
    $results = $stmt->fetchAll();
    return $results;
}


//


function totalcont($memno,$tid) {
    $sum = 0;
    $qry = mysql_query('select * from membercontribution WHERE memberno="' . base64_encode($memno) . '" AND transaction="' . $tid . '" ') or die(mysql_error());
    while ($row = mysql_fetch_array($qry)) {
        $sum+=base64_decode($row['amount']);
    }
    return $sum;
}


function totalcontribution() {
    $amount = 0;
    $query5 = mysql_query("SELECT * FROM   membercontribution   ");
    while ($r1 = mysql_fetch_array($query5)) {
        $amount += (base64_decode($r1['amount']));
    }
    return number_format($amount, 2);
}

//total income
function totalSaccoIncome() {


    $qry1 = mysql_query('select * from paymentin ') or die(mysql_error());
    while ($rowic = mysql_fetch_array($qry1)) {
        $bal+=base64_decode($rowic['amount']);
    }
    return number_format($bal, 2);
}

function datetopay($ttid) {

    $amountought2paidtodate = 0;
    $query = mysql_query("SELECT * FROM loanrepaydates WHERE tid= '$ttid' ORDER BY id  DESC LIMIT 1 ");
    while ($row = mysql_fetch_array($query)) {
        $dates = ($row['dates']);
    }
    return $dates;
}

function loaninterestratetype($id) {
    $qry = mysql_query('select * from loansettings where id="' . ($id) . '"') or die(mysql_error());
    $rslt = mysql_fetch_array($qry);
    return (base64_decode($rslt['interesttype']));
}

/* function intresttobpaid($tid) {

  if (loantyper(base64_decode($tid)) == '2') {

  $qry1 = mysql_query('select * from chargedinterest where transid="' . $tid . '"') or die(mysql_error());
  while ($rslt1 = mysql_fetch_array($qry1)) {
  $tot+=(base64_decode($rslt1['amount']));
  }
  return ($tot);
  } else {

  $qry = mysql_query('select * from loanintrests where status!="' . base64_encode('waived') . '" and transid="' . $tid . '"') or die(mysql_error());
  $rslt = mysql_fetch_array($qry);
  $tot = (base64_decode($rslt['interest']));

  return round($tot);
  }
  } */

function secDayPay($tid) {
    $query = mysql_query("SELECT * FROM   loanpayment  WHERE  transid= '$tid' ORDER BY id DESC LIMIT 1   ");
    $row = mysql_fetch_array($query);
  return date('d-M-Y', (base64_decode($row['date'])));
    //$date=date('28-09-Y');
    //return $date;
}

function numberOfRepay($tid) {
    $no = 0;
    $query = mysql_query("SELECT * FROM   loanpayment  WHERE  transid= '$tid'    ");
    $no += mysql_num_rows($query);
    return $no;
}


function loanRepaymentPrincipal($tid) {
    $amount=0;
    $query = mysql_query("SELECT * FROM   loanpayment  WHERE  transid= '$tid'   ");
    while($row = mysql_fetch_array($query)){
    $amount +=base64_decode($row['amount']);
    }
    return $amount;
}

function getGracePeriod($tid) {
    $query = mysql_query(" SELECT * FROM    loanapplication WHERE   	transactionid='$tid'  ");
    while ($row = mysql_fetch_array($query)) {
        return base64_decode($row['gperiod']);
    }
}

function contribute_to_loan($user, $mno, $vreg, $payeeid, $payee, $tname, $ptype, $amount, $dfrom, $dto, $dates, $session, $tid, $submit, $bnkid){
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