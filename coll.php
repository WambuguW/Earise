<?php
include 'conf.php';
$one = mysql_query("select * from collateral where mno='" . base64_encode($_GET['q']) . "'") or die(mysql_error());

    while ($two = mysql_fetch_array($one)) {
        echo '<option value="' . $two['id'] . '">' . base64_decode($two['name']) . ' - ' . base64_decode($two['value']) . '</option>';
    }

