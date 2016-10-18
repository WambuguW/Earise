<?php
include "./classes.php";

    $Rows = mysql_query('select * from newmember  where status="' . base64_encode("active") . '"') or die(mysql_error());

        while ($row = mysql_fetch_array($Rows)) {

echo '<table>
    
    <thead>
<tr>
    <th>no</th>
      <th>name</th>
        <th>balance</th>
    </thead>
</tr>
    <tr>
        <td>' . $s . '</td>
		<td>' . getMembername($row['membernumber']) . '</td>';
          /*          
 $qry = mysql_query('select * from membercontribution where memberno="' . ($row['primarykey']) . '"') or die(mysql_error());

        while ($row = mysql_fetch_array($qry)) {
            $sum+=base64_decode($row['amount']);
        }
 echo '<td>' . $sum . '</td>    
           
           */
echo '</tr>
</table>';

}

?>