<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once '../conf.php';
include_once '../froms.php';
$q = $_GET["q"];
personalvehiclesearch($q);
function personalvehiclesearch($m) {
    $vqry=  mysql_query('select * from newvehicle where vehicleregno like "%'.  strtoupper(base64_encode($m)).'%" or nickname like "%' . strtoupper(base64_encode($m)) . '%"') or die(mysql_error());
    if(mysql_num_rows($vqry)>=1){
        pvehiclelistsearch("user", $m);
    }  else {
        echo '<span class="red" >Sorry member number did not match..proceed and complete member number</span>';        
        include_once '../loading.html';

    }
}
?>
