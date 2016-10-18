<?php

include('phpgraphlib.php');
include('phpgraphlib_pie.php');
include_once './conf.php';
$graph = new PHPGraphLib(1200, 550);

for ($i=1; $i<=12; $i++ ){

$jay=strtotime(date('d-'.($i).'-Y'));
$mnth= date('M',$jay).'<BR />';

//AND date='".base64_encode(date('M',  strtotime($mnth)))."' 

$query=mysql_query("SELECT * membercontribution  WHERE   transaction='".  base64_encode(getdefaultsavingsaccount())."'   ");
// date('M',  strtotime($mnth));
while($row=  mysql_fetch_array($query)){
  $amount =base64_decode($row['amount']); 
  $data = array($mnth=>$amount);
}

    
    
}
//$data = array(da=>$amount,nym(2)=>$amount1,nym(3)=>$amount2,nym(4)=>$amount3,nym(5)=>$amount4);
$graph->addData($data);
$graph->setTitle('Loan Borrowed');
$graph->setGradient('red', 'maroon');
$graph->createGraph();


