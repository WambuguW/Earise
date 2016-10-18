<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once '../conf.php';
include_once '../froms.php';
include_once '../function.php';
$q = $_GET["q"];
memberNumber($q);

function memberNumber($m) {
    $result = mysql_query("SHOW TABLE STATUS LIKE 'newmember'");
    $row = mysql_fetch_array($result);
    $nextId = $row['Auto_increment'];
    
$qrya=mysql_query("SELECT  *  FROM  member_category  where status='".base64_encode('active')."' and id='".$m."'") ;
   while ($rowq = mysql_fetch_array($qrya)) {
     $cat= base64_decode($rowq['prefix']);
   }
				echo '<div class="one">
        <label>Member Number</label>
        <input class="form-control input-medium" type="text" name="mno" value = "'.$cat.'000' . $nextId . '" readonly required placeholder="Enter Member Name" title="Enter Member Name"/>
    </div>';
		 
}

<div class = "one">
<label>Member Category</label><span class="red">  required * </span>
<select id= "membcat" onchange = "showMemberNo(this.value)" class="form-control input-medium select2me" type = "text" name = "member_cate" required  title = "Enter memeber category" data-placeholder = "Enter memeber category"/>
<option></option>';
   $qrya=mysql_query("SELECT  *  FROM  member_category  where status='".base64_encode('active')."'") ;
   while ($rowq = mysql_fetch_array($qrya)) {
     echo'<option value="'.$rowq['id'].'">'.base64_decode($rowq['category_name']).'</option>' ; 
   }
echo'</select>
</div>

<div class = "one">

<label>Title</label><br />
<select class="form-control input-medium select2me" type="text" name="title"  placeholder="Select title" title="Select title"/>
<option></option>';
    $queryq = mysql_query("SELECT * FROM  memebr_title where status='".  base64_encode('active')."'");
    while ($rowe = mysql_fetch_array($queryq)) {
        echo '<option value="' . $rowe['id'] . '">' . base64_decode($rowe['title']) . '</option>';
    }
echo'</select>
</div>

