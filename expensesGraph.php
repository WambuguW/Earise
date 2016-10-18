<?php

include('phpgraphlib.php');
include('phpgraphlib_pie.php');
include_once './conf.php';
$graph = new PHPGraphLibPie(700, 700);
$amount2=0;

function nym($type){
    
    $stmt = mysql_query("SELECT * FROM  glaccounts WHERE  id='$type' 	 ");
while($row=mysql_fetch_array($stmt)){
    return base64_decode($row['acname']);

}
  
}

  
    $stmt = mysql_query("SELECT * FROM  paymentout   GROUP BY  transname");
while($row=mysql_fetch_array($stmt)){
    $amount2 += base64_decode($row['amount']) ;
    $transname= base64_decode($row['transname']);
     $data=array(nym($transname)=>$amount2);
   
    
}
 

$graph->addData($data);
$graph->setTitle( 'Exepenses Pie Chart As At'.date('d-M-Y') );
$graph->setLabelTextColor('50, 50, 50');
$graph->setLegendTextColor('40, 50, 50');
$graph->createGraph();


/*
 * 


include('phpgraphlib.php');
include('phpgraphlib_pie.php');
$graph = new PHPGraphLibPie(700, 700);


$data = array("PHP" => 8.3, "ANDROID" => 4.5,"JAVA" => 2.8, "C++" => 2.7, "C#" => 1.4);



$graph->addData($data);
$graph->setTitle('<h1>'.date('d-M-Y') .' For Top Programming Languages in Kenya'.'</h1>');
$graph->setLabelTextColor('50, 50, 50');
$graph->setLegendTextColor('40, 50, 50');
$graph->createGraph();




 * 
 */