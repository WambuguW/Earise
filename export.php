<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once './classes.php';
if (isset($_REQUEST['exportstmt'])) {
		stmtexport($_SESSION['users'], $_REQUEST['exportstmt'],$_REQUEST['mno'], $_REQUEST['datefrom'], $_REQUEST['dateto']);
}
if (isset($_REQUEST['sumstmt'])) {
		sumstmtexport($_SESSION['users'], $_REQUEST['sumstmt'],$_REQUEST['mno'], $_REQUEST['datefrom'], $_REQUEST['dateto']);
}
if (isset($_REQUEST['exportcontribution'])) {
		contributionexport("user", $_REQUEST['exportcontribution']);
}
if (isset($_REQUEST['exportaccount'])) {
		accountexport("user", $_REQUEST['exportaccount']);
} 
if (isset($_REQUEST['exportinactivemem'])) {
		inactivemembersexport("user", $_REQUEST['exportinactivemem']);
}
if (isset($_REQUEST['exportwithdrawnmem'])) {
		withdrawnmembersexport("user", $_REQUEST['exportwithdrawnmem']);
} 
if (isset($_REQUEST['exportinactivemem'])) {
		activemembersexport("user", $_REQUEST['exportactivemem']);
} 
if (isset($_REQUEST['export'])) {
		membersexport("user", $_REQUEST['export']);
}

if (isset($_REQUEST['vexport'])) {
		vehileexport("user", $_REQUEST['vexport']);
}
if (isset($_REQUEST['cexport'])) {
		contriutionexport("user", $_REQUEST['cexport']);
}
if (isset($_REQUEST['lexport'])) {
		loanexport("user", $_REQUEST['lexport']);
}
if (isset($_REQUEST['iexport'])) {
		incomexport("user", $_REQUEST['iexport']);
}
if (isset($_REQUEST['eexport'])) {
		expexport("user", $_REQUEST['eexport']);
}
if (isset($_REQUEST['fexport'])) {
		feedxport("user", $_REQUEST['fexport']);
}
if (isset($_REQUEST['epexport'])) {
		inspectxport("user", $_REQUEST['epexport']);
}
if (isset($_REQUEST['mexport'])) {
		gmemexport("user", $_REQUEST['mexport'], $_REQUEST['gname']);
}
if (isset($_REQUEST['loanexp'])) {
		loanexpo($_SESSION['users'], $_REQUEST['loanexp'], $_REQUEST['tid']);
}
if (isset($_REQUEST['guarantorsexpo'])) {
		guraexpo($_SESSION['users'], $_REQUEST['guarantorsexpo'], $_REQUEST['tid']);
}
if (isset($_REQUEST['amortexpo'])) {
		amortexport($_REQUEST['amortexpo'], $_REQUEST['tid']);
}
if (isset($_REQUEST['dynap'])) {
		dynexxp( $_REQUEST['datefrom'], $_REQUEST['dateto']);
}
if (isset($_REQUEST['guaranteedexpo'])) {
		guexport($_SESSION['users'], $_REQUEST['guaranteedexpo'], $_REQUEST['tid']);
}
if (isset($_REQUEST['acstaexp'])) {
		eccouexpo($_SESSION['users'], $_REQUEST['acstaexp'], $_REQUEST['mno'], $_REQUEST['datefrom'], $_REQUEST['dateto']);
}



if (isset($_REQUEST['divexp'])) {
		divvexpo($_SESSION['users'], $_REQUEST['divexp'], $_REQUEST['datefrom'], $_REQUEST['dateto']);
}

if (isset($_REQUEST['benev'])) {
		benevexpo($_SESSION['users'], $_REQUEST['benev'], $_REQUEST['mno'], $_REQUEST['datefrom'], $_REQUEST['dateto']);
}

if (isset($_REQUEST['accstep'])) {
		accstexpo($_SESSION['users'], $_REQUEST['accstep'],$_REQUEST['mno'], $_REQUEST['datefrom'], $_REQUEST['dateto']);
}

if(isset($_REQUEST['jay'])){
    statementgen($_SESSION['users'], $_REQUEST['jay'],$_REQUEST['mno'], $_REQUEST['datefrom'], $_REQUEST['dateto']);
}

if (isset($_REQUEST['divrep'])) {
		diviport($_SESSION['users'], $_REQUEST['yfrom'], $_REQUEST['divrep']);
}

if (isset($_REQUEST['bookcashex'])) {
		bookcashexp($_SESSION['user'], $_REQUEST['bookcashex']);
}
if (isset($_REQUEST['trialexp'])) {
		trialexport($_SESSION['user'], $_REQUEST['trialexp']);
}
if (isset($_REQUEST['balanceexp'])) {
		balanceexport($_SESSION['user'], $_REQUEST['balanceexp']);
}

if (isset($_REQUEST['bankingexp'])) {
		bankingep($_SESSION['user'], $_REQUEST['bankingexp']);
}
if (isset($_REQUEST['viewwith'])) {
		viewwithdr($_SESSION['user'], $_REQUEST['viewwith']);
}
if (isset($_REQUEST['auditex'])) {
		aexp($_SESSION['user'], $_REQUEST['auditex']);
}
if (isset($_REQUEST['expjournal'])) {
		expjour($_SESSION['users'], $_REQUEST['expjournal'], $_REQUEST['datefrom'], $_REQUEST['dateto']);
}
if (isset($_REQUEST['injournal'])) {
		injour($_SESSION['users'], $_REQUEST['injournal'], $_REQUEST['datefrom'], $_REQUEST['dateto']);
}
if (isset($_REQUEST['pandlexp'])) {
		pandlexpo($_SESSION['users'], $_REQUEST['pandlexp'], $_REQUEST['datefrom'], $_REQUEST['dateto']);
}
if (isset($_REQUEST['dai'])) {
		dailyx($_SESSION['users'], $_REQUEST['dai'], $_REQUEST['datefrom'], $_REQUEST['dateto']);
}

if (isset($_REQUEST['fexport'])) {
		viewm("user", $_REQUEST['fexport']);
}
?>
