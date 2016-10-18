<?php
include 'classes.php';
$today = date('d-M');
$member = mysql_query('SELECT * FROM newmember');
while($mem = mysql_fetch_array($member)){
$bdate = base64_decode($mem['dob']);
$day = explode('-', $bdate);
$bday = $day[0].'-'.$day[1];
if($bday==$today){
    $mno = base64_decode($mem['membernumber']);
    $sms = 'happy bday '.  base64_decode($mem['firstname']).' '.base64_decode($mem['lastname']).' from '.  compname().', we wish you joy and prosperity today and the days to come. Thank you for saving with us.';
    echo "<script type=\"text/javascript\">
        window.open('http://sms.truehost.org/sms/send_sms.php?res=" . (phonenumber($mno)) . "&mess=" . $sms . "', '_blank')
    </script>";
}
}

