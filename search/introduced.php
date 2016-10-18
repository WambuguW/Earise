<?php

/*
 * To<label>Name of Introducer</label>
  <input id= "nitro"  class="form-control input-medium select2" type = "text" name = "nitro" value = "' . $_REQUEST['nitro'] . '" title = "Enter Name of Introducer" placeholder = "Enter Name of Introducer"/>
  change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once '../conf.php';
include_once '../froms.php';
include_once '../function.php';
$q = $_GET["q"];
introduced($q);

function introduced($m) {
    if ($m == 1) {
         echo'<div class="two"> <label>Select CRO</label><select type="text" class="input-medium form-control  select2me" name="nitro"  readonly required data-placeholder="Select Member Name" title="Select Member Name"/>';
        
        $stl = mysql_query('select * from users ') or die(mysql_error());
        while ($rq = mysql_fetch_array($stl)) {

           echo'<option value="'.($rq['id']).'">'. base64_decode($rq['fname']).' '. base64_decode($rq['mname']).' '. base64_decode($rq['lname']) .'</option>';
        }
        echo '</div>';
    } elseif ($m == 2) {
        echo'<div class="two"> <label>Select Agent</label><select type="text" class="input-medium form-control  select2me" name="nitro"  readonly required data-placeholder="Select Agent" title="Select Agent"/>';
        
        $stmt = mysql_query('select * from  registeragents ') or die(mysql_error());
        while ($row1 = mysql_fetch_array($stmt)) {

           echo'<option value="'.($row1['id']).'"> '.  base64_decode($row1['fname']) .' '.  base64_decode($row1['mname']).' '.  base64_decode($row1['lname']).'</option>';
        }
        echo '</div>';
    } else {
        
        echo'<div class="two"> <label>Select Member Number</label><select type="text" class="input-medium form-control  select2me" name="nitro"  readonly required data-placeholder="Select Member Name" title="Select Member Name"/>';
        
        $sth = mysql_query('select * from newmember ') or die(mysql_error());
        while ($row = mysql_fetch_array($sth)) {

           echo'<option value="'.base64_decode($row['membernumber']).'">'. base64_decode($row['membernumber']).' '.  getMembername($row['membernumber']) .'</option>';
        }
        echo '</div>';
    }
}
