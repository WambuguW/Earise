<?php

//============================================================+
// File name   : generate_pdf.php
// 
//
// Description : gets data from query
//               output converts the data to csv
//               saves it in a temporary directory
//               then uses tcpdf to convert the csv file to pdf
//               
//
//Original Author: Nicola Asuni
//Modified by: William Mwai
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Colored Table
 * @author Nicola Asuni
 * @since 2008-03-04
 */
//extract csv
//
//
//
//this is where all the dirty work starts
class MYPDF extends TCPDF {

    // Load table data from file
    public function LoadData($file) {
        // Read file lines
        $lines = file($file);
        $data = array();
        foreach ($lines as $line) {
            $data[] = explode(';', chop($line));
        }
        return $data;
    }

    // Colored table
    public function ColoredTable($header, $data) {
        $this->Ln(10);
        // Colors, line width and bold font
        $this->SetFillColor(0, 159, 0);
        $this->SetTextColor(255);
        $this->SetDrawColor(0, 0, 0);
        $this->SetLineWidth(0.3);
        $this->SetFont('dejavusans', '', 12);
        // Header
        $w = 0;
        $num_headers = count($header);
        $sizes = 400/$num_headers;
        for ($i = 0; $i < $num_headers; ++$i) {
                //get the cell widths and add 10 for data to border allowance
                //check which cell is larger and use as default width
                    $this->Cell($sizes, 7, $header[$i], 1, 0, 'C', 1);
            }
        $this->Ln();
        // Color and font restoration
        $this->SetFillColor(224, 235, 255);
        $this->SetTextColor(0);
        $this->SetFont('dejavusans', '', 12);
        // Data
        $fill = 0;
        $size = 0;
        foreach ($data as $row) {
            for ($s = 0; $s < $num_headers; ++$s) {
                //get the cell widths and add 10 for data to border allowance
                //check which cell is larger and use as default width
                    $this->Cell($sizes, 6, ($row[$s]), 'LR', 0, 'L', $fill);
                    //get total table size from individual cell sizes
                    $size += $sizes;
                }
            $this->Ln();
            $fill = !$fill;
        }
        //use the table size to display footer line
        $this->Cell($size, 0, '', 'T');
    }

// create new PDF document
    function ppd($pdf, $export, $heads, $name, $table, $company, $logo, $nn, $det) {

// add time to fileName
        $date = time();
        $path = 'files/';
// output the file 
// we can set a header to send it directly to the browser
        //file_put_contents($path . $date .$nn. '_' . $table . "_export.csv", $export);
        //$doc = $path . $date .$nn. '_' . $table . "_export.csv";
// set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor($company);
        $pdf->SetTitle('Report');
        $pdf->SetSubject('ESACCO');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');


// set default header data
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

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
        if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
            require_once(dirname(__FILE__) . '/lang/eng.php');
            $pdf->setLanguageArray($l);
        }

// ---------------------------------------------------------
// set font
        $pdf->SetFont('helvetica', '', 12);

// add a page
        $pdf->AddPage();

        //$docs = explode(',', $export);
        //$names = explode(',', $name);

        $path = __DIR__ . "/files/";

        //$zip = new ZipArchive();
        //$zips = $path . "final.zip";
        //$zip->open($zips, ZipArchive::CREATE);

// data loading
            $data = $pdf->LoadData($export);
//convert the header into string
            
            $header = explode(',', $heads);
            $pdf->ColoredTable($header, $data);


// ---------------------------------------------------------
// close and output PDF document
            $filename = $name . "_" . time() . $nn . '_' . $table . ".pdf";
            $pdf->Output($path . $filename, 'F');
           // $zip->addFile($path . $filename, $filename);
           // $zip->close();
           // $pdf->Close();
            unlink($export);
        

        //include mailing file
         include 'mail.php';
        mailing($det, $path, $filename);
        //delete the files after emailing them
    }

}

//============================================================+
// END OF FILE
//============================================================+
?>