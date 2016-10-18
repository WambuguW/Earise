<?php
include_once './classes.php';
membersguranteeds($_GET['q']);
function membersguranteeds($tid) {

    echo'
        <div id="mt2"><table  class="table table-striped  table-bordered table-hover sorting_asc_disabled"  id="sample_2"><button class="btn green" onclick="parentNode.remove()">Hide</button>
   <thead><tr><th colspan="6"><h3 align="center"> <b>Members Guaranteed by ' . getMembername(base64_encode($tid)) . '</b> </h3>             </th></tr>
   <tr><th> Member Name	</th><th>  Gurantor Name</th><th> 	Amount 	</th><th>  Date 	</th><th>	Comment 	</th><th>	Status </th></tr></thead><tbody>';
    $stmt = mysql_query(" SELECT * FROM  guarantors   WHERE  guarantorno='" . (base64_encode($tid)) . "'  ");
    while ($row = mysql_fetch_array($stmt)) {
        echo'<tr><td>' . getMembername($row['memberno']) . '</td><td>' . getMembername($row['guarantorno']) . '</td><td>' . getsymbol() . ' ' . number_format(base64_decode($row['sharesoffered']), 2) . '</td><td>' . base64_decode($row['date']) . '</td><td>' . ucwords(strtolower(base64_decode($row['comment']))) . '</td><td>' . ucwords(strtolower(base64_decode($row['status']))) . '</td></tr>';
    }
}