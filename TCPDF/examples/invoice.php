<?php
session_start();
extract($_SESSION);
extract($_GET);
include 'config/config.php';

	$pdf_query = $dBASE->query("SELECT * FROM invoices INNER JOIN students on invoices.student_id=students.studentid where studentid='$studentid' AND id ='$id'");
	  $pdf_row = $pdf_query->fetch_assoc();
//============================================================+
// File name   : example_039.php
// Begin       : 2008-10-16
// Last Update : 2014-01-13
//
// Description : Example 039 for TCPDF class
//               HTML justification
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
 * @abstract TCPDF - Example: HTML justification
 * @author Nicola Asuni
 * @since 2008-10-18
 */

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('SAMIUL HAQQ');
$pdf->SetTitle(''.$pdf_row['surname'].', '.$pdf_row['firstname'].' Generated Invoice');
$pdf->SetSubject('HAQQ IT TECHNOLOGIES NG');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');


$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 039', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);



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

// add a page
$pdf->AddPage();

// set font
$pdf->SetFont('times', 'B', 20);

$pdf->Write(0, 'JIGAWA STATE INSTITUTE OF INFORMATION TECHNOLOGY, KAZAURE', '', 0, 'C', true, 0, false, false, 0);

$pdf->SetFont('helvetica', '', 10);
$html = '<span style="text-align:center;">
<i>P. M. B. 5002, Kazaure, Jigawa State, Nigeria.</i>


</span>

';

$pdf->writeHTML($html, true, 0, true, true);

$html = '
<span style="text-align:center;"><img src="images/logo.png" width="100">
<br>

<b style="font-size: 20; color: white;"><span style="background-color:black">PAYMENT INVOICE<span></b>
</span>
<br><br>
';

$pdf->writeHTML($html, true, 0, true, true);
// create some HTML content
$pdf->SetFont('Times', '', 13);
$html = '
<span style="text-align:right; font-size: 14;"><b>Invoice ID: <span style="color: blue;">'.$pdf_row['ref'].'</span></b></span>
<br/><br>
';
$pdf->writeHTML($html, false, 0, false, false);
$pdf->SetFont('Times', '', 13);
$html = '
<span style="text-align:center; font-size: 15;"><i>('.$pdf_row['surname'].', '.$pdf_row['firstname'].'  - '.$pdf_row['studentid'].')</i></span>
<br><br>


<br>
<span style="background-color:black; color: white; font-size: 13;"> COURSE: </span> '.$pdf_row['course'].' <hr></hr>
<br>
<span style="background-color:black; color: white; font-size: 13;"> LEVEL: </span> '.$pdf_row['level'].' <hr></hr>

<br><br><br>
<span style="background-color:black; color: white; text-align:right; font-size: 13;"> Payment Name: </span> '.$pdf_row['paymentname'].' 
<br>
<span style="background-color:black; color: white; text-align:right; font-size: 13;"> Payment Amount: </span> N'.$pdf_row['amount'].' 
<br>
<span style="background-color:black; color: white; text-align:right; font-size: 13;"> Generated Date: </span> '.$pdf_row['ondate'].'

<br/><br>
';
// set core font


// output the HTML content


// set UTF-8 Unicode font
$pdf->SetFont('dejavusans', '', 10);

// output the HTML content
$pdf->writeHTML($html, true, 0, true, true);


$style = array(
	'border' => 2,
	'vpadding' => 'auto',
	'hpadding' => 'auto',
	'fgcolor' => array(0,0,0),
	'bgcolor' => false, //array(255,255,255)
	'module_width' => 1, // width of a single module in points
	'module_height' => 1 // height of a single module in points
);

// QRCODE,L : QR-CODE Low error correction
$pdf->write2DBarcode('The Payment Status of '.$pdf_row['surname'].' was: '.$pdf_row['pstatus'].'', 'QRCODE,L', 165, 242, 30, 30, $style, 'N');
$pdf->Text(155, 235, 'Verify Payment Status');

$pdf->SetLineWidth(2);


// set alpha to semi-transparency
$pdf->SetAlpha(0.4);


// draw jpeg image
if ($pdf_row['pstatus'] == "UNPAID") {
$pdf->Image('images/isunpaid.png', 55, 120, 110, 80, '', '', '', true, 72);
}elseif ($pdf_row['pstatus'] == "PAID") {
$pdf->Image('images/waspaid.png', 55, 120, 110, 80, '', '', '', true, 72);
}


// restore full opacity
$pdf->SetAlpha(1);


// reset pointer to the last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
// $pdf->Output(''.$pdf_row['surname'].' - '.$pdf_row['studentid'].' Generated Invoice.pdf', 'I');
$pdf->Output('/public_html/jsiit/PDF/'.$pdf_row['firstname'].'-invoice-'.$pdf_row['surname'].'.pdf','F');
//============================================================+
// END OF FILE
//============================================================+
