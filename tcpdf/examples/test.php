<?php
require_once('tcpdf_include.php');

include 'example_011.php';
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
ppd($pdf);
