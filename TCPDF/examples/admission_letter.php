<?php
session_start();
extract($_GET);
extract($_SESSION);
include 'config/config.php';


	$pdf_query = $dBASE->query("SELECT * FROM applicants INNER JOIN applicant_info ON applicants.appid=applicant_info.app_id where appid='$appid'") or die($dBASE->error);
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
$tdate = date("D/M/Y");
// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('SAMIUL HAQQ');
$pdf->SetTitle(''.$pdf_row['firstname'].' - '.$pdf_row['appid'].' Admission Letter');
$pdf->SetSubject('INDEXIAL TECHNOLOGIES LTD');
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
// set alpha to semi-transparency
$pdf->SetAlpha(0.4);


// draw jpeg image
$pdf->Image('images/logo.png', 67, 130, 80, 80, '', '', '', true, 72);

// restore full opacity
$pdf->SetAlpha(1);
// set font
$pdf->SetFont('times', 'B', 30);
// set font
$pdf->SetFont('times', 'B', 20);

$pdf->Write(0, 'JIGAWA STATE INSTITUTE OF INFORMATION TECHNOLOGY, KAZAURE', '', 0, 'C', true, 0, false, false, 0);

$pdf->SetFont('helvetica', '', 10);
$html = '<span style="text-align:center;">
<i>P. M. B. 5002, Kazaure, Jigawa State, Nigeria.</i>


</span>

';
$pdf->Image('../../'.$pdf_row['pic'].'', 170, 35, 30, 30, '', '', '', true, 72);

$pdf->writeHTML($html, true, 0, true, true);
$pdf->SetFont('times', 'I', 14);
$html = '
<span style="text-align:center;"><img src="images/logo.png" WIDTH="100">
<br>
</span>



<br>

';
$pdf->writeHTML($html, true, 0, true, true);
$pdf->SetFont('times', 'B', 14);
$html = '
<span style="text-align:left;">
'.$pdf_row['firstname'].' '.$pdf_row['surname'].' '.$pdf_row['middlename'].'<BR>
'.$pdf_row['appid'].'


</span><br><br>
<span style="text-align:center;">
<b style="font-size: 15; color: black;"><span><u>OFFER OF PROVISIONAL ADMISSION INTO  FIRST THE '.$pdf_row['program'].'  PROGRAMME</u><span></b>
</span>
<br>
';

$pdf->writeHTML($html, true, 0, true, true);

// set core font
$pdf->SetFont('Times', 'i', 12);

$html = '
<span style="text-align:justify;">
Futher to the formal letter Admission sent to you by the <b>Joint Admission and Marticulation Board (JAMB)</b>, I am pleased to inform you that the <b>Jigawa State Institute of Information Technology, Kazaure </b> has offered you Admission into '.$pdf_row['program'].' programme to study <b>'.$pdf_row['course'].'</b>.

<br><br>
The confirmation of this subject to your obtaining the minimum entry qualification for the course to which you have been offered admission.<br><br>

At the tome of registration, you will be required to present the originals of your certificate(s) or other acceptable evidence of the qualification on which this offer of admission was based.<br><br>

If it is discovered at any time that you do not process any of the qualification which you claimed to have obtained tou will be withrawn from the Univerisity.
<br><br>
Your schedule of fees is herewith attached.

<br><br><br><br><br>
<span style="text-align: left; font-weight:italic; font-size: 20;"><b>Accept my Congratulations</b></span>

</span>


';
// output the HTML content
$pdf->writeHTML($html, true, 0, true, true);
$pdf->SetFont('Times', '', 12);


$html = '

';
$pdf->writeHTML($html, true, 0, true, true);



$html = '
<br><br>
<span style="text-align:right;">

<img src="images/sign.jpg" width="130"><br>
<b style="font-size: 14;">Registrar Name</b><br>
<br>
Registrar

<BR>

';

$pdf->writeHTML($html, true, 0, true, true);


$pdf->SetFont('dejavusans', '', 10);




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
$pdf->write2DBarcode(' '.$pdf_row['firstname'].' '.$pdf_row['surname'].' '.$pdf_row['middlename'].', has offered Admission into NAUB appno: '.$pdf_row['appid'].'', 'QRCODE,L', 10, 245, 27, 27, $style, 'N');
// $pdf->Text(155, 242, 'Verify Application Status');

$pdf->SetLineWidth(2);



// reset pointer to the last page
$pdf->lastPage();


// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output(''.$pdf_row['firstname'].' '.$pdf_row['surname'].' '.$pdf_row['middlename'].' - '.$pdf_row['appid'].' Admission Letter.pdf', 'I');
// $pdf->Output('/public_html/jsiit/PDF/'.$pdf_row['appid'].'-admission.pdf','F');
//============================================================+
// END OF FILE
//============================================================+
