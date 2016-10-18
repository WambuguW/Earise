<?php

function get_pdf_details($data, $header, $table, $company) {
//get all those other things you don't need to scratch your head to figure out
    require_once('tcpdf_include.php');
    require_once('navigation/navigations.php');
//include file doing all the dirty work for you :-)
    include ('generate_pdf.php');
    $docs = explode(',', $data);
    $names = explode(',', $det);
    
    foreach ($docs as $nm => $doc) {
        $str = explode('_', $doc);
        $name1 = $str[0];
        $name = explode('/', $name1);
        $fname = getMem(base64_encode($name[1]));
//define the pdf xtics and intantiate a new class
        $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
//send the data and parameters to be used in the pdf creation
        if($doc!=''){
        $pdf->ppd($pdf, $doc, $header, base64_decode($fname['firstname']), $table, $company, headerinfos(), $nm, $fname);
        }
    }
  header('location: stat.php');
}
