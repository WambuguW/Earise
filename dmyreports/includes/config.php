<?php
// Basic Parameters
$pageTitle = "Report Manager"; 

// Database To Be Queired
$hostname_connDB = "localhost"; 	// The host name of the MySql server
$database_connDB = "esacco_main"; 			// The name of the Database to be queired
$username_connDB = "root";			// Username to login to the server
$password_connDB = "";			// Password to the MySQL server
$dbVisTables = "newmember,paymentout,paymentin,loans,membercontribution,accounts,assets,banking,dividends,fines,expenses,loanbal,loandisburse,loandisbursment,loanpayment,memberacc,organisation,users,withdrawals";			// The name of the tables to be displayed seperated by commas. 
					// Leave this blank if all the tables and views are to be displayed.
					// eg $dbVisTables = "table1,table2,table3";

//Databse To Save Reports
$hostname_connSave = "localhost"; 	// The host name of the MySql server where the generated reports are to be saved
$database_connSave = "esacco_main"; 	// The name of the Database to save the generated reports
$username_connSave = "root";		// Username to login to the server
$password_connSave = "";		// Password to the MySQL server

//Do not edit after this point
$connDB = mysql_pconnect($hostname_connDB, $username_connDB, $password_connDB) or trigger_error(mysql_error(),E_USER_ERROR); 
$connSave = mysql_pconnect($hostname_connSave, $username_connSave, $password_connSave) or trigger_error(mysql_error(),E_USER_ERROR); 
?>