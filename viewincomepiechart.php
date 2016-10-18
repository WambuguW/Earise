<?php
include('phpgraphlib.php');
include('phpgraphlib_pie.php');
include_once './conf.php';
$graph = new PHPGraphLibPie(700, 700);

 $insfee=0;
$regfee=0;
$loanint=0;
$profee=0;
$legalfee=0;
 $sth = mysql_query("select * from  paymentin  WHERE   transname='".  base64_encode(125)."'   ");
while($row1=mysql_fetch_array($sth)){
 $loanint +=base64_decode($row1['amount']);


}


$stmt = mysql_query("select * from  paymentin WHERE   transname='".  base64_encode(68)."'  ");
while($row2=mysql_fetch_array($stmt)){
 $regfee+=base64_decode($row2['amount']);


}


$query = mysql_query("select * from paymentin WHERE   transname='".  base64_encode(123)."'");
while($row3=mysql_fetch_array($query)){
 $insfee +=base64_decode($row3['amount']);


}

$qry = mysql_query("select * from paymentin WHERE   transname='".  base64_encode(122)."'");
while($row4=mysql_fetch_array($qry)){
 $profee +=base64_decode($row4['amount']);


}
$qryy = mysql_query("select * from paymentin WHERE   transname='".  base64_encode(142)."'");
while($row7=mysql_fetch_array($qryy)){
    
 $legalfee +=base64_decode($row7['amount']);


}
//$data = array("PHP" => 8.3, "ANDROID" => 4.5,"JAVA" => 2.8, "C++" => 2.7, "C#" => 1.4);
$data = array("Loan Interest"=>$loanint, "Registration Fee"=> $regfee,"Loan Insurance Fee" => $insfee, "Loan Processing Fees"=>$profee,"Legal Fees"=>$legalfee);

$graph->addData($data);
$graph->setTitle(date('d-M-Y') .' ' .'Income Pie Chart');
$graph->setLabelTextColor('50, 50, 50');
$graph->setLegendTextColor('40, 50, 50');
$graph->createGraph();
