<?php
//============================================================+
// File name   : example_011.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 011 for TCPDF class
//               Colored Table (very simple table)
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Colored Table
 * @author Nicola Asuni
 * @since 2008-03-04
 */
//extract csv


//
//
//
//function gen_pdf($doc){
// Include the main TCPDF library (search for installation path).

// extend TCPF with custom functions
class MYPDF extends TCPDF {

	// Load table data from file
	public function LoadData($file) {
		// Read file lines
		$lines = file($file);
		$data = array();
		foreach($lines as $line) {
			$data[] = explode(';', chop($line));
		}
		return $data;
	}

	// Colored table
	public function ColoredTable($header,$data) {
		// Colors, line width and bold font
		$this->SetFillColor(255, 0, 0);
		$this->SetTextColor(255);
		$this->SetDrawColor(128, 0, 0);
		$this->SetLineWidth(0.3);
		$this->SetFont('', 'B');
		// Header
		$w = array(40, 35, 40, 45);
		$num_headers = count($header);
		for($i = 0; $i < $num_headers; ++$i) {
			$this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', 1);
		}
		$this->Ln();
		// Color and font restoration
		$this->SetFillColor(224, 235, 255);
		$this->SetTextColor(0);
		$this->SetFont('');
		// Data
		$fill = 0;
		foreach($data as $row) {
			$this->Cell($w[0], 6, base64_decode($row[0]), 'LR', 0, 'L', $fill);
			$this->Cell($w[1], 6, base64_decode($row[1]), 'LR', 0, 'L', $fill);
			$this->Cell($w[2], 6, base64_decode($row[2]), 'LR', 0, 'R', $fill);
			$this->Cell($w[3], 6, base64_decode($row[3]), 'LR', 0, 'R', $fill);
			$this->Ln();
			$fill=!$fill;
		}
		$this->Cell(array_sum($w), 0, '', 'T');
	}
}
// create new PDF document
function ppd($pdf){
    
$db_name     = "esacco_main";
$db_password = "";
$db_link     = mysql_connect("localhost", "root", $db_password);
mysql_select_db($db_name, $db_link);
mysql_query("SET NAMES UTF8");

$table = "membercontribution";

function assoc_query_2D($sql, $id_name = false){
  $result = mysql_query($sql);
  $arr = array();
  $row = array();
  if($result){
    if($id_name == false){
      while($row = mysql_fetch_assoc($result))
        $arr[] = $row;
    }else{
      while($row = mysql_fetch_assoc($result)){
        $id = $row['id'];
        $arr[$id] = $row;
      }
    }
  }else
      return 0;

  return $arr;
}

function query_whole_table($table, $value = '*'){
    $sql = "SELECT $value FROM $table";
  return assoc_query_2D($sql);
}

$export_str = "";
$result = query_whole_table($table);

foreach($result as $record){
  $export_str .= implode(";",$record) . "\n";
}
// add time to fileName
$date = time(); 
$path = 'files/';
// output the file 
// we can set a header to send it directly to the browser
file_put_contents($path.$date.'_'.$table."_export.csv", $export_str);
$doc = $path.$date.'_'.$table."_export.csv";


// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 011');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 011', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', '', 12);

// add a page
$pdf->AddPage();

// column titles
$header = array('Country', 'Capital', 'Area (sq km)', 'Pop. (thousands)');

// data loading
$data = $pdf->LoadData($doc);

// print colored table
$pdf->ColoredTable($header, $data);

// ---------------------------------------------------------

// close and output PDF document
$pdf->Output('example_011.pdf', 'I');
}
//============================================================+
// END OF FILE
//============================================================+
