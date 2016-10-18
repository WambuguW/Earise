<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once '../conf.php';
include_once '../froms.php';
include_once '../function.php';
$q = $_GET["q"];
expesearch($q);

function expesearch($m) {

    $one = 3.65;
    $two = $m / $one;

    echo '
        <div class = "two">
        <label>Amount in USD</label>
        <input type="text" class="form-control input-medium"  name="aount" value="' . number_format($two, 2) . '" readonly required />
        </div>';
}

?>
