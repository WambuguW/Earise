<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once '../conf.php';
include_once '../froms.php';
include_once '../function.php';
$q = $_GET["q"];
$query=mysql_query(" SELECT * FROM uploads WHERE mno ='$q'   ");
   if(($query)<1){echo"No Result Found!";}
   else{
       echo'<table  class="table table-striped table-bordered table-hover table-full-width" >
                                                        <thead  class="style">
                                                            <tr>
                                                                <th class="style">Member Signature</th>
                                                                <th class="style">Member Passport</th>
                                                                <th class="style">Other Image</th>
                                                                <th class="style">Other Image 2</th>
                                                                
                                                         </tr>
                                                        </thead>';
       while ($row = mysql_fetch_array($query)) {
 echo'<tbody><tr><td><img src="signature/'.$row['signature'].'"alt="no image" height="100" width="100"> </td>'
           . '<td><img src="passport/'.$row['passport'].'"alt="no image" height="100" width="100"></td>'
           . '<td><img src="img1/'.$row['file1'].'"alt="no image" height="100" width="100"></td><td>
           <img src="img2/'.$row['file2'].'"alt="no image" height="100" width="100"></td></tr>';
       }
   
    
    echo'</tbody></table>';

   }
?>
