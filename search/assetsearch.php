<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once '../conf.php';
include_once '../froms.php';
include_once '../function.php';
$q = $_GET["q"];
assetsearch($q);

function assetsearch($m) {
    $chqry = mysql_query('select * from fixed_assets where id="' .($m) . '" ') or die(mysql_error());
     {
        $row = mysql_fetch_array($chqry);
        echo '<div class="two">
        <label>Asset value</label>
        <input class="input-medium form-control" type="text" name="value" value="' . base64_decode($row['asset_value']) . '" readonly required placeholder="Enter Member Name" title="Enter Member Name"/>
        </div
          <div class="two">
        <label>Purchase Date</label>
        <input class="input-medium form-control" type="text" name="date" value="' . base64_decode($row['purchase_date']) . '" readonly required placeholder="Enter Member Name" title="Enter Member Name"/>
        </div>
            
                <div class="two">
        <label>Salvage Value</label>
        <input class="input-medium form-control" type="text" name="salvage" value="' . base64_decode($row['salvage_value']) . '" readonly required placeholder="Enter Member Name" title="Enter Member Name"/>
        </div>
                
                <div class="two">
        <label>Useful life</label>
        <input class="input-medium form-control" type="text" name="life" value="' . base64_decode($row['useful_life']) . '"   readonly required placeholder="Enter Member Name" title="Enter Member Name"/>
        </div>
          <div class="two">
        <label>Depreciation Rate</label>
        <input class="input-medium form-control" type="text" name="dep" value="' . base64_decode($row['dep_rate']) . '"          readonly required placeholder="Enter Member Name" title="Enter Member Name"/>
        </div>
        <input type="hidden" name="type" value="' . base64_decode($row['dep_type']) . '" />';
        
    }
}

