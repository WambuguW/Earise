<?php
error_reporting(0);
include_once 'conf.php';
$username = $_POST['username'];
$passwd = $_POST['pswd'];
$status = $_POST['status'];


if( empty($username))
{
    echo 'Please enter your email!';
}elseif (empty ($passwd))
{
    echo "Please enter your password!";
}else{
    //Check if the provided username exists in the database
    
        //Check if the provided username exists in the database
    $counts = mysql_query("SELECT * FROM sms_settings");
    $c = mysql_num_rows($counts);
    if($c > 0){
        $updt = mysql_query("UPDATE sms_settings SET username = '".  base64_encode($username)."', password = '".  base64_encode($passwd)."', status = '".  base64_encode($status)."'");
        echo "Details captured  successfully!";
        
    }else{
    
    $counts = mysql_query("SELECT * FROM sms");
    $c = mysql_num_rows($counts);
    $getusernames = mysql_query("SELECT * FROM sms_settings WHERE username = '".  base64_encode($username)."'");
    if(mysql_num_rows($getusernames)>0)
    {
        echo "Email already in use. Please enter a different email";
    }else{
    $createuser = mysql_query("INSERT INTO sms_settings(username,password,status) VALUE('".  base64_encode($username)."','".  base64_encode($passwd)."','".  base64_encode($status)."')");
    echo "Details captured  successfully!";
    }
}

}
?>
