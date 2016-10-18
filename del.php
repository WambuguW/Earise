
<?php
if (isset($_REQUEST['groupdel'])) {

    $id = $_REQUEST['groupdel'];

    $grpqry = mysql_query('DELETE FROM groups WHERE id="' . $id . '"') or die(mysql_error());
    //$qry=mysql_query('DELETE FROM memberaccs where memberno=' . getMembername($Row['memberno']) . ' and ' . getglacc(base64_decode($row["glaccid"])) . ' ')

    if ($grpqry) {  
        
        $users = new Users();
        $activity = "unsubscribed member. " . $id;
        $users->audittrail($_SESSION['users'], $activity,$users);
        $alertyes = '<script type="text/javascript">alert("You have unsubscribed the member from this group");</script>';
        echo $alertyes;
    } else {

        echo '<form action="viewgroups.php"><div class="two"><button class="btn green">Back to view groups.</button></div></form>';
    }
}
if (isset($_REQUEST['dispose'])) {
    $id = $_REQUEST['dispose'];
    $status="Disposed";
    $dispose = mysql_query("UPDATE fixed_assets SET  status='" . base64_encode($status) . "' WHERE  id='$id'");
    
    if ($dispose) {  
        
        $users = new Users();
        $activity = "Disposed asset . " . getfixedasset($id);
        $users->audittrail($_SESSION['users'], $activity,$users);
        $alertyes = '<script type="text/javascript">alert("You have disposed the asset"); document.location.href ="fixed_assetedit.php";</script>';
        echo $alertyes;
    } else {

        echo '<form action="fixed_assetedit.php"><div class="two"><button class="btn green">Back to Assets.</button></div></form>';
    }
}
if (isset($_REQUEST['deactivate'])) {

$status2="Active";
$deactivate2 = mysql_query("UPDATE receipt_footer SET  status='" . base64_encode($status2) . "'");

    $id = $_REQUEST['deactivate'];
    $status="Inactive";
    $deactivate = mysql_query("UPDATE receipt_footer SET  status='" . base64_encode($status) . "' WHERE  id='$id'");
    

    if ($deactivate) {  
        
        $users = new Users();
        $activity = "Deactivated Message . " . $id;
        $users->audittrail("Admin", $activity,$users);
        $alertyes = '<script type="text/javascript">alert("You have deactivated the message"); document.location.href ="edit_receipt_footer.php";;</script>';
        echo $alertyes;
    } else {

        echo '<form action="edit_receipt_footer.php"><div class="two"><button class="btn green">Back to view messages.</button></div></form>';
    }
}
if (isset($_REQUEST['activate'])) {
    $status2="Inactive";

    $deactivate2 = mysql_query("UPDATE receipt_footer SET  status='" . base64_encode($status2) . "'");

    $id = $_REQUEST['activate'];
    $status="Active";
    $deactivate = mysql_query("UPDATE receipt_footer SET  status='" . base64_encode($status) . "' WHERE  id='$id'");
    //$qry=mysql_query('DELETE FROM memberaccs where memberno=' . getMembername($Row['memberno']) . ' and ' . getglacc(base64_decode($row["glaccid"])) . ' ')

    if ($deactivate) {  
        
        $users = new Users();
        $activity = "Activated Message. " . $id;
        $users->audittrail("Admin", $activity,$users);
        $alertyes = '<script type="text/javascript">alert("You have activated the message"); document.location.href ="edit_receipt_footer.php";;</script>';
        echo $alertyes;
    } else {

        echo '<form action="edit_receipt_footer.php"><div class="two"><button class="btn green">Back to view messages.</button></div></form>';
    }
}
if (isset($_REQUEST['gdel'])) {

  $id = $_REQUEST['gdel'];

   $sql = mysql_query('DELETE FROM cgroup WHERE id="' . $id . '"') or die(mysql_error());

    if ($sql) {

        $users = new Users();
        $activity = "deleted member group no. " . $id;
        $users->audittrail($$_SESSION['users'], $activity,$users);
        $alertyes = '<script type="text/javascript">alert("You have Deleted Member Group ");document.location.href = "groups.php";</script>';
        echo $alertyes;
    }
    else {
        $alertfail = '<script type="text/javascript">alert("Group deletion Failed!!");</script>';
        echo $alertfail;
    }
   
}

if (isset($_REQUEST['issdel'])) {

    $id = $_REQUEST['issdel'];

    $sql = mysql_query('DELETE FROM issueinvoice WHERE id="' . $id . '"') or die(mysql_error());
    // if successfully updated.
    if ($sql) {

        $users = new Users();
        $activity = "deleted issued invoice no. " . $id;
        $users->audittrail($$_SESSION['users'], $activity,$users);
        $alertyes = '<script type="text/javascript">alert("You have Deleted The Issued Invoice Number");</script>';
        echo $alertyes;
    } else {

        echo '<form action="issueinvoice.php"><div class="two"><button class="btn green">Go Back to Issued Invoices.</button></div></form>';
    }
}

if(isset($_REQUEST['currencydel'])){
    
    $sql=  mysql_query("DELETE  FROM currency   WHERE  id='".$_REQUEST['currencydel']."'  ");
      if ($sql) {

        $users = new Users();
        $activity = "deleted currency no. " . $id;
        $users->audittrail($_SESSION['users'], $activity,$users);
        $alertyes = '<script type="text/javascript">alert("You have Deleted The Currency");</script>';
        echo $alertyes;
    } else {

        echo '<form action="currecysettings.php"><div class="two"><button class="btn green">Go Back to Currecy Page.</button></div></form>';
    }
    
}


if (isset($_REQUEST['recel'])) {

    $id = $_REQUEST['recel'];

    $sql = mysql_query('DELETE FROM receiveinvoice WHERE id="' . $id . '"') or die(mysql_error());

    if ($sql) {
        $alertyes = '<script type="text/javascript">alert("You have Deleted The Issued Invoice Number");</script>';
        echo $alertyes;
        $users = new Users();
        $activity = "deleted received invoice no. " . $id;
        $users->audittrail($_SESSION['users'], $activity,$users);
        $alertyes = '<script type="text/javascript">alert("You have Deleted The Received Invoice Number");</script>';
        echo $alertyes;
    } else {

        echo '<form action="receiveinvoice.php"><div class="two"><button class="btn green">Go Back to Received Invoices.</button></div></form>';
    }
}


if (isset($_REQUEST['bankdel'])) {

    $id = $_REQUEST['bankdel'];

    $sql = mysql_query('DELETE FROM addbank WHERE primarykey="' . $id . '"') or die(mysql_error());

    // if successfully updated.
    if ($sql) {

        $users = new Users();
        $activity = "deleted bank " . getbankname($id);
        $users->audittrail($$_SESSION['users'], $activity,$users);
        $alertyes = '<script type="text/javascript">alert("You have Deleted Details for ' . getbankname($id) . '");</script>';
        echo $alertyes;
    }
}

if (isset($_REQUEST['coldel'])) {

     $sql = mysql_query('DELETE FROM collateral WHERE id="' . $_REQUEST['coldel'] . '"') or die(mysql_error());
    if ($sql) {

        $users = new Users();
        $activity = "deleted collateral no. " . getcollateral($id);
        $users->audittrail($_SESSION['users'], $activity,$users);
        $alertyes = '<script type="text/javascript">alert("You have Deleted Collateral ' . getcollateral($id) . '");
         document.location.href = "viewcollateral.php";</script>';
        echo $alertyes;
    }
}

if (isset($_REQUEST['credel'])) {

    $id = $_REQUEST['credel'];

    $sql = mysql_query('DELETE FROM addcreditor WHERE id="' . $id . '"') or die(mysql_error());
    if ($sql) {

        $users = new Users();
        $activity = "deleted creditor no. " . $id;
        $users->audittrail($_SESSION['users'], $activity,$users);
        $alertyes = '<script type="text/javascript">alert("You have Deleted ' . creditorname($id) . ' as a Creditor");</script>';
        echo $alertyes;
    } else {

        echo '<form action="addcreditors.php"><div class="two"><button class="btn green">Go Back to Creditors.</button></div></form>';
    }
}

if (isset($_REQUEST['debdel'])) {

    $id = $_REQUEST['debdel'];

    $sql = mysql_query('DELETE FROM addebtor WHERE id="' . $id . '"') or die(mysql_error());

    if ($sql) {

        $users = new Users();
        $activity = "deleted debtor no. " . $id;
        $users->audittrail($_SESSION['users'], $activity,$users);
        $alertyes = '<script type="text/javascript">alert("You have Deleted ' . debtorname($id) . ' as a Debtor");</script>';
        echo $alertyes;
    } else {

        echo '<form action="addebtors.php"><div class="two"><button class="btn green">Go Back to Debtors.</button></div></form>';
    }
}


if (isset($_REQUEST['vvdel'])) {

    $id = $_REQUEST['vvdel'];

    $sql = mysql_query('UPDATE nextofkin SET status = "'.base64_encode('inactive').'" WHERE id="' . $id . '"') or die(mysql_error());

    if ($sql) {

        $users = new Users();
        $activity = "dropped next of kin no. " . $id;
        $users->audittrail($_SESSION['users'], $activity,$users);
        
        $alertyes = '<script type="text/javascript">alert("You have Dropped Next of Kin ' . ($id) . '");'
                . 'document.location.href = "memberregistration.php";</script>';
        echo $alertyes;
    }
}

if (isset($_REQUEST['ldel'])) {

    $id = $_REQUEST['ldel'];

    $sql = mysql_query('DELETE FROM loansettings WHERE id="' . $id . '"') or die(mysql_error());

    if ($sql) {

        $users = new Users();
        $activity = "deleted loan settings for " . $id;
        $users->audittrail("Admin", $activity,"Admin");

        $alertyes = '<script type="text/javascript">alert("You have Deleted Loan Setting Entry no.' . $id . '");</script>';
        echo $alertyes;
    }
}

if (isset($_REQUEST['del'])) {

    $id = $_REQUEST['del'];

    $sql = mysql_query('DELETE FROM liabilities WHERE id="' . $id . '"') or die(mysql_error());

    if ($sql) {

        $users = new Users();
        $activity = "deleted liabilities for " . $id;
        $users->audittrail($_SESSION['users'], $activity,$user);

        $alertyes = '<script type="text/javascript">alert("You have Deleted Entry no.' . $id . '");</script>';
        echo $alertyes;
    }
}
if (isset($_REQUEST['adel'])) {

    $id = $_REQUEST['adel'];

    $sql = mysql_query('DELETE FROM assets WHERE id="' . $id . '"') or die(mysql_error());

    if ($sql) {

        $users = new Users();
        $activity = "deleted asset for " . $id;
        $users->audittrail($_SESSION['users'], $activity,$user);

        $alertyes = '<script type="text/javascript">alert("You have Deleted Entry no.' . $id . '");</script>';
        echo $alertyes;
    }
}

if (isset($_REQUEST['acdel'])) {

    $id = $_REQUEST['acdel'];

    $sql = mysql_query('DELETE FROM accounts WHERE id="' . $id . '"') or die(mysql_error());
    
    if ($sql) {

        $users = new Users();
        $activity = "deleted account for " . $id;
        $users->audittrail($_SESSION['users'], $activity,$user);
        $alertyes = '<script type="text/javascript">alert("You have Deleted Entry no.' . $id . '");</script>';
        echo $alertyes;
    }
}

if (isset($_REQUEST['gacdel'])) {

    $id = $_REQUEST['gacdel'];

    $sql = mysql_query('DELETE FROM glaccounts WHERE id="' . $id . '"') or die(mysql_error());

    if ($sql) {

        $users = new Users();
        $activity = "deleted GL account for " . $id;
        $users->audittrail($_SESSION['users'], $activity,$user);
        
        $alertyes = '<script type="text/javascript">alert("You have Deleted Gl account no.' . $id . '");
        document.location.href = "accountsettings.php";</script>';
        echo $alertyes;
    }
}

if (isset($_REQUEST['vdel'])) {

    $id = $_REQUEST['vdel'];

    $sql = mysql_query('DELETE FROM newvehicle WHERE primarykey="' . $id . '"') or die(mysql_error());

    if ($sql) {

        $users = new Users();
        $activity = "deleted vehicle no " . $id;
        $users->audittrail($user, $activity,$user);
       
        $alertyes = '<script type="text/javascript">alert("You have Deleted Entry no.' . $id . '");</script>';
        echo $alertyes;
    }
}

if (isset($_REQUEST['sdel'])) {

    $id = $_REQUEST['sdel'];

    $sql = mysql_query('DELETE FROM sharesbf WHERE id="' . $id . '"') or die(mysql_error());

    if ($sql) {

        $users = new Users();
        $activity = "deleted payment for " . $id;
        $users->audittrail($_SESSION['users'], $activity,$user);
       
        $alertyes = '<script type="text/javascript">alert("You have Deleted Entry no.' . $id . '");</script>';
        echo $alertyes;
    }
}

if (isset($_REQUEST['cdel'])) {

    $id = $_REQUEST['cdel'];

    $query = mysql_query("SELECT * FROM membercontribution WHERE primarykey ='$id'") or die(mysql_error());
    while ($row = mysql_fetch_array($query)) {

        $tid = ($row['transid']);
        $session = ($row['session']);
        $date = base64_decode($row['date']);
        deleteloanpayment($id, $tid, $session, $date);
    }


    $sql = mysql_query('DELETE FROM membercontribution WHERE primarykey="' . $id . '"') or die(mysql_error());

    if ($sql) {

        $users = new Users();
        $activity = "deleted contribution for " . $id;
        $users->audittrail($_SESSION['users'], $activity, $user);

        $alertyes = '<script type="text/javascript">alert("You have Deleted Entry no.' . $id . '");
           document.location.href = "contributionedit.php";</script>';
           
        echo $alertyes;
    }
}


if (isset($_REQUEST['idel'])) {

    
        $id = $_REQUEST['idel'];

    $query = mysql_query("SELECT * FROM paymentin WHERE primarykey ='$id'") or die(mysql_error());
    while ($row = mysql_fetch_array($query)) {

        $tid = ($row['transid']);
        $session = ($row['session']);
        $date = base64_decode($row['date']);

        deleteloanpayment($id, $tid, $session, $date);
    }

    $sql = mysql_query('DELETE FROM paymentin WHERE primarykey="' . $id . '"') or die(mysql_error());

    if ($sql) {

        $users = new Users();
        $activity = "deleted payment for " . $id;
        $users->audittrail($_SESSION['users'], $activity,$user);
        
        $alertyes = '<script type="text/javascript">alert("You have Deleted Entry no.' . $id . '");</script>';
        echo $alertyes;
    }
}

if (isset($_REQUEST['edel'])) {

    $id = $_REQUEST['edel'];

    $sql = mysql_query('DELETE FROM paymentout WHERE primarykey="' . $id . '"') or die(mysql_error());

    if ($sql) {

        $users = new Users();
        $activity = "deleted payment for " . $id;
        $users->audittrail($$_SESSION['users'], $activity,$user);
        
        $alertyes = '<script type="text/javascript">alert("You have Deleted Entry no.' . $id . '");window.location.replace("'.$_SERVER['HTTP_REFERER'].'");</script>';
        echo $alertyes;
    }
}



if (isset($_REQUEST['accddel'])) {

    $sql = mysql_query('DELETE FROM   memberaccs WHERE id="' . $_REQUEST['accddel'] . '"') or die(mysql_error());

    if ($sql) {

        $users = new Users();
        $activity = "deleted Member Account no. " . $id;
        $users->audittrail($users, $activity,$users);
       
        $alertyes = '<script type="text/javascript">alert("You have Deleted The Member Account Number");</script>';
        echo $alertyes;
    } else {

        echo '<form action="viewAccount.php"><div class="two"><button class="btn green">Go Back to Member Account.</button></div></form>';
    }
}

if (isset($_REQUEST['buddel'])) {

       $sql = mysql_query('DELETE FROM budget WHERE id="' . $_REQUEST['buddel'] . '"') or die(mysql_error());

    if ($sql) {

        $users = new Users();
        $activity = "deleted  budget no. " . $_REQUEST['buddel'];
        $users->audittrail($users, $activity,$users);
        $alertyes = '<script type="text/javascript">alert("You have Deleted The Budget");</script>';
        echo $alertyes;
    } else {

        echo '<form action="viewbuget.php"><div class="two"><button class="btn green">Go Back To Budget</button></div></form>';
    }
}

if(isset($_REQUEST['admd'])){
        $sql = mysql_query('DELETE FROM usergroups WHERE id="' . $_REQUEST['admd'] . '"') or die(mysql_error());

    if ($sql) {

        $users = new Users();
        $activity = "deleted  usergroups no. " . $_REQUEST['admd'];
        $users->audittrail($users, $activity,$user);
        $alertyes = '<script type="text/javascript">alert("You have Deleted User Group");</script>';
        echo $alertyes;
    } else {

        echo '<form action="admingroupsedit.php"><div class="two"><button class="btn green">Go Back To User Group</button></div></form>';
    }
    
}
//************delete periodic details*************
if(isset($_REQUEST['pdel'])){
        $sql = mysql_query('DELETE FROM periodictyrecord WHERE id="' . $_REQUEST['pdel'] . '"') or die(mysql_error());

    if ($sql) {

        $users = new Users();
        $activity = "deleted  periodicity no. " . $_REQUEST['pdel'];
        $users->audittrail($users, $activity,$user);
        $alertyes = '<script type="text/javascript">alert("You have Deleted peridicity details");</script>';
        echo $alertyes;
    } else {

        echo '<form action="Editperiodicitypay.php"><div class="two"><button class="btn green">Go Back To Periodic detailsp</button></div></form>';
    }
    
}
//**********end deletion

if(isset($_REQUEST['adppd'])){
        $sql = mysql_query('DELETE FROM groupperm WHERE id="'.$_REQUEST['adppd']. '"') or die(mysql_error());

    if ($sql) {

        $users = new Users();
        $activity = "deleted  usergroups no. " . $_REQUEST['adppd'];
        $users->audittrail($users, $activity,$user);
        $alertyes = '<script type="text/javascript">alert("You have Permission for the group");</script>';
        echo $alertyes;
    } else {

        echo '<form action="adminpermissionsedit.php"><div class="two"><button class="btn green">Go Back To User Permission</button></div></form>';
    }
    
}
if (isset($_REQUEST['deelid'])) {

    $id = $_REQUEST['deelid'];

    $sql = mysql_query('DELETE FROM extracash WHERE id="' . $id . '"') or die(mysql_error());
    // if successfully updated.
    if ($sql) {

        $users = new Users();
        $activity = "deleted Extra Cash no. " . $id;
        $users->audittrail($_SESSION['users'], $activity, $users);
        $alertyes = '<script type="text/javascript">alert("You have Deleted The Extra Cash");</script>';
        echo $alertyes;
        echo '<form action="extracash.php"><div class="two"><button class="btn green">Go Back to Extra Cash Module.</button></div></form>';
    } else {

        echo '<form action="extracash.php"><div class="two"><button class="btn green">Go Back to Extra Cash Module.</button></div></form>';
    }
}

if (isset($_REQUEST['vdel'])) {

    $id = $_REQUEST['vdel'];

    $sql = mysql_query('DELETE FROM  newvehicle  WHERE primarykey="' . $id . '"') or die(mysql_error());
    // if successfully updated.
    if ($sql) {

        $users = new Users();
        $activity = "deleted vehicle . " . $id;
        $users->audittrail($_SESSION['users'], $activity, $users);
        $alertyes = '<script type="text/javascript">alert("You have deleted vehicle  "' . $id.'");</script>';
        echo $alertyes;
        
    } else {

        //echo '<form action="extracash.php"><div class="two"><button class="btn green">Go Back to Extra Cash Module.</button></div></form>';
    }
}

if (isset($_REQUEST['invdel'])) {

    $id = $_REQUEST['invdel'];

    $sql = mysql_query('DELETE FROM   vehicleinvoicepayment  WHERE id="' . $id . '"') or die(mysql_error());
    // if successfully updated.
    if ($sql) {

        $users = new Users();
        $activity = "deleted vehicle Invoice Payment . " . $id;
        $users->audittrail($_SESSION['users'], $activity, $users);
       $alertyes = '<script type="text/javascript">alert("You have Deleted vehicle invoice payment");
        document.location.href = "invoiceVhPaymentEdit.php";</script>';
        echo $alertyes;
        
    } else {

        //echo '<form action="extracash.php"><div class="two"><button class="btn green">Go Back to Extra Cash Module.</button></div></form>';
    }
}

if (isset($_REQUEST['vadel'])) {

    $id = $_REQUEST['vadel'];

    $sql = mysql_query('DELETE FROM    vehicleaccount  WHERE id="' . $id . '"') or die(mysql_error());
    // if successfully updated.
    if ($sql) {

        $users = new Users();
        $activity = "deleted vehicle Invoice Payment . " . $id;
        $users->audittrail($_SESSION['users'], $activity, $users);
       $alertyes = '<script type="text/javascript">alert("You have Deleted vehicle Invoice Payment.");
        document.location.href = "createInvoiceAcc.php";</script>';
        echo $alertyes;
        
    } else {

        //echo '<form action="extracash.php"><div class="two"><button class="btn green">Go Back to Extra Cash Module.</button></div></form>';
    }
}

if (isset($_REQUEST['vehinvdel'])) {

    $id = $_REQUEST['vehinvdel'];

    $sql = mysql_query('DELETE FROM     vehicleinvoice  WHERE id="' . $id . '"') or die(mysql_error());
    // if successfully updated.
    if ($sql) {

        $users = new Users();
        $activity = "deleted vehicle Invoice . " . $id;
        $users->audittrail($_SESSION['users'], $activity, $users);
       $alertyes = '<script type="text/javascript">alert("You have Deleted vehicle Invoice .' . $id . '");
        document.location.href = "invoiceVehicle.php";</script>';
        echo $alertyes;
        
    } else {

        //echo '<form action="extracash.php"><div class="two"><button class="btn green">Go Back to Extra Cash Module.</button></div></form>';
    }
}

if (isset($_REQUEST['orgdel'])) {

    $id = $_REQUEST['orgdel'];

    $sql = mysql_query('DELETE FROM      organisation  WHERE id="' . $id . '"') or die(mysql_error());
    // if successfully updated.
    if ($sql) {

        $users = new Users();
        $activity = "deleted Organisation . " . $id;
        $users->audittrail($_SESSION['users'], $activity, $users);
       $alertyes = '<script type="text/javascript">alert("You have Deleted Organisation .' . $id . '");
        document.location.href = "addorg.php";</script>';
        echo $alertyes;
        
    } else {

        //echo '<form action="extracash.php"><div class="two"><button class="btn green">Go Back to Extra Cash Module.</button></div></form>';
    }
}

if (isset($_REQUEST['model'])) {

    $id = $_REQUEST['model'];

    $sql = mysql_query('DELETE FROM     paymentmode WHERE id="' . $id . '"') or die(mysql_error());
    // if successfully updated.
    if ($sql) {

        $users = new Users();
        $activity = "deleted mode of payment . " . $id;
        $users->audittrail($_SESSION['users'], $activity, $users);
       $alertyes = '<script type="text/javascript">alert("You have Deleted Modeof payment .' . $id . '");
        document.location.href = "paymode.php";</script>';
        echo $alertyes;
        
    } else {

        //echo '<form action="extracash.php"><div class="two"><button class="btn green">Go Back to Extra Cash Module.</button></div></form>';
    }
}