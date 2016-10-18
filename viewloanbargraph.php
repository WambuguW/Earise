<?php

include('phpgraphlib.php');
include('phpgraphlib_pie.php');
include_once './conf.php';
$graph = new PHPGraphLib(1200, 650);
function totalloan($tid){
    $total=0;
    $stmtt = mysql_query("SELECT * FROM   loans WHERE  	transid='$tid' 	 ");
while($roww=mysql_fetch_array($stmtt)){
    $total +=base64_decode($roww['amount']);

} return $total;
    
}
function nym($type){
    
    $sth = mysql_query("SELECT * FROM   loansettings WHERE  id='$type' 	 ");
while($row1=mysql_fetch_array($sth)){
    return base64_decode($row1['lname']);

} 
    
}
 $sth1 = mysql_query("SELECT * FROM   loanapplication  GROUP BY  loantype 	 ");
while($row1=mysql_fetch_array($sth1)){
    if(base64_decode($row1['loantype'])==1){
 $amount=totalloan($row1['transactionid']);

    }else if(base64_decode($row1['loantype'])==2){
  $amount1=totalloan($row1['transactionid']);      
    }elseif(base64_decode($row1['loantype'])==3){
      $amount2=totalloan($row1['transactionid']);  
    }elseif(base64_decode($row1['loantype'])==4){
        $amount3= totalloan($row1['transactionid']);   
    }else{
         $amount4=  totalloan($row1['transactionid']);   
    }


}
$data = array(nym(1)=>$amount,nym(2)=>$amount1,nym(3)=>$amount2,nym(4)=>$amount3,nym(5)=>$amount4);
$graph->addData($data);
$graph->setTitle('Loan Borrowed');
$graph->setGradient('red', 'maroon');
$graph->createGraph();

