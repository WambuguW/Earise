<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
function headerinfos() {
    $Rows = mysql_query('SELECT * FROM saccodetails');

    $Row = mysql_fetch_array($Rows);
    $lqry = mysql_query('select * from saccodetails') or die(mysql_error());
    $rslt = mysql_fetch_array($lqry);
    $logo = 'photos/' . base64_decode($rslt['logo']);

    return $logo;
}
function heads() {
    $Rows = mysql_query('SELECT * FROM saccodetails');

    $Row = mysql_fetch_array($Rows);
    $lqry = mysql_query('select * from saccodetails') or die(mysql_error());
    $rslt = mysql_fetch_array($lqry);
    $logo = 'photos/' . base64_decode($rslt['logo']);

    return base64_decode($Row['slogan']) ;   
}
function username() {
    $users = new Users();
    echo '<div class="art-vmenublockcontent">
    <ul class="art-vmenu">
        <li>
            <a href="userprofile" class="active">Hello:' . $users->checkuserlogin($_SESSION['users']) . '</a>
</li>
        <ul class="active">

                                                    </ul>
    </ul>
</div>';
}

function admin() {
    $users = new Users();
    echo '<div class="art-vmenublockcontent">
    <ul class="art-vmenu">
        <li>
            <a href="adminprofile" class="active">Hello:' . $users->checkadminlogin($_SESSION['superadmin']) . '</a>
        </li>
    </ul>
</div>';
}

function sidemenu($page, $childpage) {
    echo '<div class="art-vmenublockcontent">
                                        <ul class="art-vmenu">
                                             <li>
                                        <a href="" ';
    if ($page == 'home') {
        echo 'class="active"';
    }
    echo ' >Statements</a>
										<ul class="active">
										      <li>
                                                        <a href="personalloanreports"';
    if ($childpage == 'loanrep') {
        echo 'class="active"';
    }
    echo ' ><img src="images/personal_loan.png" class="icons"/>Loans</a>
                                                    </li>
                                 	      <li>
                                              <a href="accountstatement"';
    if ($childpage == 'accstat') {
        echo 'class="active"';
    }
    echo '><img src="images/dollars.png" class="icons"/>Contributions</a>
                                              </li>
                                               <li>
                                              <a href="account"';
    if ($childpage == 'tata') {
        echo 'class="active"';
    }
    echo '><img src="images/news.png" class="icons"/>Mini Statement</a>
                                              </li>
                                              <li>
                                              <a href="loandel"';
    if ($childpage == 'loandel') {
        echo 'class="active"';
    }
    echo '><img src="images/bankwithdrawal.png" class="icons"/>Loan Reversal</a>
                                              </li>
                                               <li>
                                              <a href="accogrp"';
    if ($childpage == 'acco') {
        echo 'class="active"';
    }
    echo '><img src="images/news.png" class="icons"/>Contribution Groups</a>
                                              </li>
                                              	      <li>
                                              <a href="dynaind"';
    if ($childpage == 'xmas') {
        echo 'class="active"';
    }
    echo '><img src="images/bal.png" class="icons"/>Dynamic Contributions</a>
                                              </li>
                                                <li>
                                              <a href="accsa"';
    if ($childpage == 'summary') {
        echo 'class="active"';
    }
    echo '><img src="images/bankwithdrawal.png" class="icons"/>Summarized Statement</a>
                                              </li>
                                               <li>
                                              <a href="debtors"';
    if ($childpage == 'debt') {
        echo 'class="active"';
    }
    echo '><img src="images/bus.png" class="icons"/>Debtors Acc Statement</a>
                                              </li>

                                               </ul>
                                            </li>
											<li>
                                                <a href=""';
    if ($page == 'view') {
        echo 'class="active"';
    }
    echo '>View</a>
                                                <ul>
                                                    <li>
                                                        <a href="personalinformation"';
    if ($childpage == 'pinfo') {
        echo 'class="active"';
    }
    echo '><img src="images/user.png" class="icons"/>Personal Information</a>
                                                    </li>
                                                 	<li>
                                            <a href="personalcontributiions"';
    if ($childpage == 'pcontr') {
        echo 'class="active"';
    }
    echo '><img src="images/dollars.png" class="icons"/>Contributions</a>
													</li>

												   <li>
                                                        <a href="communication"';
    if ($childpage == 'comm') {
        echo 'class="active"';
    }
    echo '><img src="images/chat.png" class="icons"/>Responses</a>
                                                    </li>
                                                    <li>
                                                        <a href="withdrawal"';
    if ($childpage == 'with') {
        echo 'class="active"';
    }
    echo '><img src="images/bankwithdrawal.png" class="icons"/>Withdrawals</a>
                                                    </li>
													<li>
                                                        <a href="groups"';
    if ($childpage == 'groups') {
        echo 'class="active"';
    }
    echo '><img src="images/Groups-Meeting-Light-icon.png" class="icons"/>Create Groups</a>
                                                    </li>
                                                    	<li>
                                                        <a href="viewgroups"';
    if ($childpage == 'group') {
        echo 'class="active"';
    }
    echo '><img src="images/Groups-Meeting-Light-icon.png" class="icons"/>Contribution Groups</a>
                                                    </li>
        <li>
                                                        <a href="personalloan"';
    if ($childpage == 'loann') {
        echo 'class="active"';
    }
    echo '><img src="images/personal_loan.png" class="icons"/>Loans</a>
                                                    </li>
                                                    <li>
                                                        <a href="loans"';
    if ($childpage == 'snaol') {
        echo 'class="active"';
    }
    echo '><img src="images/personal_loan.png" class="icons"/>Successful Loans</a>
                                                    </li>
													  <li>
                                                        <a href="viewloans"';
    if ($childpage == 'vloans') {
        echo 'class="active"';
    }
    echo '><img src="images/personal_loan.png" class="icons"/>Loan Applications</a>
                                                    </li>


													<li>
                                                        <a href="loanchek"';
    if ($childpage == 'approve') {
        echo 'class="active"';
    }
    echo '><img src="images/personal_loan.png" class="icons"/>Loan Approvals</a>
                                                    </li>


														 <li>
                                                        <a href="viewmembers"';
    if ($childpage == 'vmember') {
        echo 'class="active"';
    }
    echo '><img src="images/people.png" class="icons"/>Members</a>
                                                    </li>

                                                    <li>
                                                        <a href="viewcontributions"';
    if ($childpage == 'vcontr') {
        echo 'class="active"';
    }
    echo '><img src="images/money_no_shadow.png" class="icons"/>Contributions</a>
                                                    </li>
 <li>
                                                        <a href="yeff"';
    if ($childpage == 'nextofkin') {
        echo 'class="active"';
    }
    echo '><img src="images/bal.png" class="icons"/> Next of Kin Reports </a>
                                                    </li>

                                                                                                      <li>
                                                        <a href="viewincome"';
    if ($childpage == 'vincome') {
        echo 'class="active"';
    }
    echo '><img src="images/cash_register.png" class="icons"/>Income</a>
                                                    </li>
                                                    <li>
                                                        <a href="viewexpenses"';
    if ($childpage == 'vexpe') {
        echo 'class="active"';
    }
    echo '><img src="images/dollars.png" class="icons"/>Expenses</a>
                                                    </li>
                                                      <li>
                                                        <a href="viewfeedback"';
    if ($childpage == 'fback') {
        echo 'class="active"';
    }
    echo '><img src="images/chat.png" class="icons"/>Feedback</a>
                                                    </li>
                                                    <li>
                                                        <a href="viewbanking"';
    if ($childpage == 'vbank') {
        echo 'class="active"';
    }
    echo '><img src="images/cash_register.png" class="icons"/>Banking</a>
                                                    </li>
                                                    <li>
                                                        <a href="withdrawalsview"';
    if ($childpage == 'vwith') {
        echo 'class="active"';
    }
    echo '><img src="images/bankwithdrawal.png" class="icons"/>Withdrawals</a>
                                                    </li>
													 <li>
                                                        <a href="viewbalancebf"';
    if ($childpage == 'vbalbf') {
        echo 'class="active"';
    }
    echo '><img src="images/bal.png" class="icons"/>Balance b/f</a>
                                                    </li>
											</ul>
                                            </li>
                                            <li>
                                                <a href=""';
    if ($page == 'finance') {
        echo 'class="active"';
    }
    echo '>Finance</a>
                                                <ul>
           					                        <li>
                                                     <a href="accountsettings"';
    if ($childpage == 'accsett') {
        echo 'class="active"';
    }
    echo '><img src="images/emblem_money.png" class="icons"/>Accounts Settings</a>
                                                 </li>
												 <li>
                                                        <a href="balancebf"';
    if ($childpage == 'balbf') {
        echo 'class="active"';
    }
    echo '><img src="images/bal.png" class="icons"/>Balance b/f</a>
                                                    </li>
                                                      <li>
                                                        <a href="banknew"';
    if ($childpage == 'banks') {
        echo 'class="active"';
    }
    echo '><img src="images/personal_loan.png" class="icons"/>Add Bank Account</a>
                                                    </li>
                                                      <li>
                                                        <a href="banking"';
    if ($childpage == 'banks') {
        echo 'class="active"';
    }
    echo '><img src="images/personal_loan.png" class="icons"/>Banking</a>
                                                    </li>
                                                              <li>
                                                        <a href="bookcash"';
    if ($childpage == 'divids') {
        echo 'class="active"';
    }
    echo '><img src="images/bus.png" class="icons"/>Cashbook</a>
                                                    </li>
				        	                       <li>
                                                     <a href="journals"';
    if ($childpage == 'jour') {
        echo 'class="active"';
    }
    echo '><img src="images/news.png" class="icons"/>Journals</a>
                                                </li>
					  	                            <li>
                                                   <a href="profitandloss"';
    if ($childpage == 'pandl') {
        echo 'class="active"';
    }
    echo '><img src="images/cash_register.png" class="icons"/>Profit and loss</a>
                                                   </li>
                                                    <li>
                                                        <a href="ledger"';
    if ($childpage == 'ledger') {
        echo 'class="active"';
    }
    echo '><img src="images/folder_home2.png" class="icons"/>General Ledger</a>
                                                    </li>
                                                    <li>
                                                        <a href="trialbalance"';
    if ($childpage == 'tbal') {
        echo 'class="active"';
    }
    echo '><img src="images/balance.png" class="icons"/>Trial Balance</a>
                                                    </li>
                                                    <li>
                                                        <a href="balancesheet"';
    if ($childpage == 'bsheet') {
        echo 'class="active"';
    }
    echo '><img src="images/pic_balance.png" class="icons"/>Balance Sheet</a>
                                                    </li>
                                                    <li>
                                                        <a href="divids"';
    if ($childpage == 'divids') {
        echo 'class="active"';
    }
    echo '><img src="images/Groups-Meeting-Light-icon.png" class="icons"/>Annual Dividends</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href=""';
    if ($page == 'reports') {
        echo 'class="active"';
    }
    echo '>Reports</a>
                                                <ul>
												    <li>
                                                        <a href="loanrep"';
    if ($childpage == 'summport') {
        echo 'class="active"';
    }
    echo '><img src="images/bal.png" class="icons"/>Summary Report</a>
                                                    </li>
													<li>
                                                        <a href="leff"';
    if ($childpage == 'loanbal') {
        echo 'class="active"';
    }
    echo '><img src="images/dollars.png" class="icons"/>Loan Balances</a>
                                                    </li>
                                                    	<li>
                                                        <a href="chekoff"';
    if ($childpage == 'chekoff') {
        echo 'class="active"';
    }
    echo '><img src="images/bal.png" class="icons"/>Checkoff Setup</a>
                                                    </li>
                                                    	<li>
                                                        <a href="offcheck"';
    if ($childpage == 'offchek') {
        echo 'class="active"';
    }
    echo '><img src="images/news.png" class="icons"/>Checkoff Statement</a>
                                                    </li>
												      <li>
                                                        <a href="deff"';
    if ($childpage == 'sharebal') {
        echo 'class="active"';
    }
    echo '><img src="images/dollars.png" class="icons"/>Deposits Balances</a>
                                                    </li>
												  <li>
                                                        <a href="avail"';
    if ($childpage == 'mbal') {
        echo 'class="active"';
    }
    echo '><img src="images/bankwithdrawal.png" class="icons"/>Member Balances</a>
                                                    </li>

										  <li>
										<a href="daypot"';
    if ($childpage == 'loantrans') {
        echo 'class="active"';
    }
    echo '><img src="images/news.png" class="icons"/>Loan Transactions</a>
										</li>

														<li>
										<a href="dailyreport"';
    if ($childpage == 'daily') {
        echo 'class="active"';
    }
    echo '><img src="images/bankwithdrawal.png" class="icons"/>Daily Transactions</a>
										</li>
										        <li>
                                                        <a href="bleff"';
    if ($childpage == 'availb') {
        echo 'class="active"';
    }
    echo '><img src="images/bal.png" class="icons"/>Available Balances</a>
                                                    </li>
												<li>
										<a href="statsdaily"';
    if ($childpage == 'statsd') {
        echo 'class="active"';
    }
    echo '><img src="images/dollars.png" class="icons"/>Income Transactions</a>
                                        </li>
										  <li>
										<a href="bankpot"';
    if ($childpage == 'bankt') {
        echo 'class="active"';
    }
    echo '><img src="images/cash_register.png" class="icons"/>Banking Transactions</a>
										</li>
										  <li>
										<a href="expport"';
    if ($childpage == 'expet') {
        echo 'class="active"';
    }
    echo '><img src="images/balance.png" class="icons"/>Expenses Transactions</a>
										</li>
                                                                                <li>
										<a href="withreport"';
    if ($childpage == 'withrep') {
        echo 'class="active"';
    }
    echo '><img src="images/money_no_shadow.png" class="icons"/>Withdrawal Transactions</a>
										</li>
										<li>
										<a href="dailport"';
    if ($childpage == 'contra') {
        echo 'class="active"';
    }
    echo '><img src="images/bal.png" class="icons"/>Contribution Transactions</a>
										</li>
										<li>
										<a href="sheport"';
    if ($childpage == 'savings') {
        echo 'class="active"';
    }
    echo '><img src="images/balance.png" class="icons"/>Compulsory Shares Transanctions</a>
										</li>
										<li>
										<a href="psveff"';
    if ($childpage == 'sbal') {
        echo 'class="active"';
    }
    echo '><img src="images/bal.png" class="icons"/>Compulsory Shares Balances</a>
										</li>
                                                                                	<li>
										<a href="cogroup"';
    if ($childpage == 'cogg') {
        echo 'class="active"';
    }
    echo '><img src="images/bankwithdrawal.png" class="icons"/>Dynamic Statements </a>
										</li>
                                       </ul>
                                            </li>
                                            <li>
                                                <a href=""';
    if ($page == 'stransfer') {
        echo 'class="active"';
    }
    echo '>Shares Management</a>
                                                <ul>
                                                <li>
                                                        <a href="sharesmanagement"';
    if ($childpage == 'smngmt') {
        echo 'class="active"';
    }
    echo '><img src="images/Groups-Meeting-Light-icon.png" class="icons"/>Shares Management</a>
                                                    </li>
                                                     </ul>
                                            </li>
                                             </ul>
                                    </div>';
}

function headermenu($page) {
    echo '<ul class="art-hmenu">
                    <li>
                        <a href="index.php"';
    if ($page == 'home') {
        echo 'class="active"';
    }
    echo ' ><img src="images/home_w.png" class="icons"/>Home</a>
                    </li>
                    <li>
                        <a href="contribution.php"';
    if ($page == 'contr') {
        echo 'class="active"';
    }
    echo '><img src="images/money_no_shadow.png" class="icons"/>Contribution</a>
                    </li>
                    <li>
                        <a href="income.php"';
    if ($page == 'income') {
        echo 'class="active"';
    }
    echo '><img src="images/cash_register.png" class="icons"/>Income</a>
                    </li>
                    <li>
                        <a href="expenses.php"';
    if ($page == 'expenses') {
        echo 'class="active"';
    }
    echo '><img src="images/dollars.png" class="icons"/>Expenses</a>
                    </li>
                    <li>
                        <a href="personalloan.php"';
    if ($page == 'loans') {
        echo 'class="active"';
    }
    echo '><img src="images/bal.png" class="icons"/>Loans</a>
                    </li>
                    <li>

                    <a href="memberregistration.php"';
    if ($page == 'register') {
        echo 'class="active"';
    }
    echo '><img src="images/people.png" class="icons"/>Register Member</a>
                    </li>';
    
  echo'<li class="mega-menu-dropdown mega-menu-full" >
                                    <a href="settings.php" >
                                        Settings</i>
					</a>
				</li>';
					
	echo'<li>
                        <a href="settings.php"';
    if ($page == 'settings') {
        echo 'class="active"';
    }
    echo '><img src="images/settings.png" class="icons"/>Settings</a>
                    </li>'; /* 				
					
					<li>
                      <a href="saccodetails.php"';
                    //</li>';
    if($page=='saccodetails'){
	
	echo 'class="active"';}
	
	echo'><img src="images/settings.png" class="icons"/>Sacco Details</a>';  */
                    
    echo'<li>   
                        <a href="logout.php"';
    if ($page == 'logout') {
        echo 'class="active"';
    }
    echo '><img src="images/logout.png" class="icons"/>Log Out</a>
                    </li>
                </ul> ';
}

function headerinfo3() {
      $Rows = mysql_query('SELECT * FROM saccodetails');

    $Row = mysql_fetch_array($Rows);
    $lqry = mysql_query('select * from saccodetails') or die(mysql_error());
    $rslt = mysql_fetch_array($lqry);
    $logo = 'photos/' . base64_decode($rslt['logo']);

    echo '
                        <div class="well">
                       <div class="col-md-offset-0">
                       <p><img src="' . $logo . '" height="50"/></p></div><div class="col-md-offset-4"> </div>
                          <div class="col-md-offset-4">
                        '. base64_decode($Row['compname']) .'<br/>
 <p> ' . base64_decode($Row['slogan']) . ' <a href="Esacco_User_Manual.pdf" target="_blank"><img src="images/ya.png" class="icons"/></a></p>
                       </div> </div>
                        
                       ';
}

function headerinfo() {
    $Rows = mysql_query('SELECT * FROM saccodetails');

    $Row = mysql_fetch_array($Rows);
    $lqry = mysql_query('select * from saccodetails') or die(mysql_error());
    $rslt = mysql_fetch_array($lqry);
    $logo = 'photos/' . base64_decode($rslt['logo']);

    echo '<div class="art-shapes">
				<div class="col-md-3" ><div class="noprint">
<br><img src="' . $logo . '" style="width: 100%;  max-width: 50px; min-width: 100px; max-height: 60px;" />
</div></div>
<div class="col-md-7  pull-center">      
                    <br/>
                   <div class="col-md-offset-5"><p><h4><strong> ' . base64_decode($Row['compname']) . '</strong></h4></p></div>
                  <div class="col-md-offset-4">  <p style="font-size:16px; color:#509E21; font-family:verdana;">' . base64_decode($Row['slogan']) . '.....<a href="Esacco_User_Manual.pdf" target="_blank"><img src="images/ya.png" class="icons"/></a>                               </p>
                    
</div></div>

</div>';
        
}

function footer() {

    echo '
        <footer class="footer clearfix">
       
       <nav class="navbar navbar-default navbar-fixed-bottom" style="background-color:black;">
          <div class="container">
                   <p style="text-align:center; color:white;">Esacco Version 2.0 Copyright © ' . date("Y") . ' ' . compname() . ', All Rights Reserved.<br>
                                        <span id="art-footnote-links"><a href="http://www.ryanada.com" target="_blank">Ryanada limited</a> Product</span>
<br></p>
</div>
</nav>
</footer>    ';
}


function adminmenu() {

    echo '

<div class="art-vmenublockcontent">
    <ul class="art-vmenu">
        <li>
                                                <a href="">Settings</a>
                                                <ul class="active">
                                                    
                                                    <li>
                                                        <a href="backup.php"><img src="images/blue_external_drive_backup.png" class="icons"/>Backups</a>
                                                    </li>
                                                    <li>
                                                        <a href="audit.php"><img src="images/log_pencil.png" class="icons"/>User Activities</a>
                                                    </li>
                                                    <li>
                                                        <a href="loansett.php"><img src="images/emblem_money.png" class="icons"/>Loan Settings</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            </ul>
                                            </div>';
}

function admintop() {
    echo '<ul class="art-hmenu">
                    <li>
                        <a href="admingroups.php"><img src="images/usergroups.png" class="icons"/>User Groups</a>
                    </li>
                    <li>
                        <a href="adminpermissions.php"><img src="images/userpermissions.png" class="icons"/>Permissions</a>
                    </li>
                    <li>
                        <a href="adminusers.php"><img src="images/users.png" class="icons"/>Users</a>
                    </li>
                                        <li>
                        <a href="loansett.php"><img src="images/emblem_money.png" class="icons"/>Loan Settings</a>
                    </li>
                    <li>
                        <a href="adminprofile.php"><img src="images/profile.png" class="icons"/>Profile</a>
                    </li>
                    <li>
                        <a href="logout.php"><img src="images/logout.png" class="icons"/>Log Out</a>
                    </li>
                </ul>';
}
?>

