<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once '../froms.php';
include_once '../conf.php';
include_once '../function.php';
$q = $_GET["q"];
contributionsearch($q);
function contributionsearch($m) {
    $vqry=  mysql_query('select * from membercontribution where memberno like "%'.  base64_encode($m).'%"') or die(mysql_error());
    if(mysql_num_rows($vqry)>=1){
        personalcontributionsearch("user", $m);
    }  else {
        echo '<span class="red" >Sorry member number did not match..proceed and complete member number</span>';        
        include_once '../loading.html';

    }
}

