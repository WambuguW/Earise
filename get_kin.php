<?php
include 'function.php';
include 'conf.php';
echo '<div id="mt"><table class="table table-striped table-bordered table-hover table-full-width" id="sample_2">
                                                     <thead>
                                                     <tr><th colspan="9"><h3 align="center"><b> Next of Kin Report for '.getMembername(base64_encode($_GET['q'])).'  </b></h3></th></tr>
                                                     <tr>
                                                     
                                                     <th>Next of Kin First Name</th>
                                                     <th>Next of Kin Middle Name</th>
                                                     <th>Next of Kin Last Name</th>
                                                     <th>Relationship</th>
                                                     <th>ID Number</th>
                                                     <th>Mobile Number</th>
                                                     <th>Comments</th>
                                                     <th>Percentage</th>
                                                     <th>Status</th>
                                                     </thead>
                                                     </tr>';

$qry = mysql_query('select * from nextofkin WHERE memberno = "'. base64_encode($_GET['q']) .'"') or die(mysql_errno());
while ($row = mysql_fetch_array($qry)) {

    echo '<tr>
              
              <td>' . ucwords(strtolower(base64_decode($row['fname']))) . '</td>
              <td>' . ucwords(strtolower(base64_decode($row['mname']))) . '</td>
              <td>' . ucwords(strtolower(base64_decode($row['lname']))) . '</td>
              <td>' . ucwords(strtolower(base64_decode($row['relationship']))) . '</td>
              <td>' . base64_decode($row['idno']) . '</td>
              <td>' . base64_decode($row['mobile']) . '</td>
                  <td>' . ucwords(strtolower(base64_decode($row['comments']))) . '</td>'
            . '<td>' . base64_decode($row['percentage']) . '</td>
              <td>' . base64_decode($row['status']) . '</td></tr>';
}
echo '</table></div><div class="col-md-4"><button class="btn green" value="Print this page" onClick="return printResults()">Print</button></div>';
?>