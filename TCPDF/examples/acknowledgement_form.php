<?php
session_start();
extract($_SESSION);
extract($_GET);
include 'config/config.php';

	$pdf_query = $dBASE->query("SELECT *
	FROM applicants AS a
	INNER JOIN transcript_request AS tr ON a.appid = tr.app_id
	WHERE tr.reference_id = '$formid';
	");
	  $pdf_row = $pdf_query->fetch_array();
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
$pdf->SetTitle(''.$pdf_row['fullname'].' - '.$pdf_row['jambno'].' Application Form');
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
$pdf->SetAlpha(0.3);


// draw jpeg image
$pdf->Image('images/logo.png', 67, 100, 80, 80, '', '', '', true, 72);

// restore full opacity
$pdf->SetAlpha(1);

$pdf->SetFont('times', 'B', 20);

$pdf->Write(0, 'FEDERAL UNIVERSITY DUTSIN-MA ', '', 0, 'C', true, 0, false, false, 0);

$pdf->SetFont('helvetica', '', 10);
$html = '<span style="text-align:center;">
<i>P. M. B. 5001, Dutsinma, Katsina State, Nigeria.</i>


</span>

';
$pdf->writeHTML($html, true, 0, true, true);
$pdf->Image('../../'.$pdf_row['pic'].'', 170, 35, 30, 30, '', '', '', true, 72);




$html = '
<span style="text-align:center;"><img src="images/logo.png" WIDTH="100">
<br>

<b style="font-size: 15; color: white; background-color:blue;"><span style="background-color:black">'.$pdf_row['mode_of_delivery'].' TRANSCRIPT APPLICATION FORM<span></b>
</span>

<br>



';

$pdf->writeHTML($html, true, 0, true, true);


$html = '

<span style="text-align:center; font-size: 15;"><i>APPID: ('.$pdf_row['reference_id'].')</i></span>
<span style="font-size: 11;">

<span style="text-align:justify;">
<h3>APPLICANT INFORMATION:</h3>


<table><hr>
<tr style="text-align:left;background-color:#F3F3F3;">
<td>FULLNAME</td>
<td>MATRIC NO</td>
<td>DEGREE PROGRAME</td>

</tr>

<tr style="text-align:left;">

<td>'.$pdf_row['fullname'].'</td>
<td>'.$pdf_row['appid'].'</td>
<td>'.$pdf_row['program'].'</td>
</tr>

<hr>

<tr style="text-align:left;background-color:#F3F3F3;">
<td>DEPARTMENT</td>
<td>PHONE</td>
<td>EMAIL</td>

</tr>

<tr style="text-align:left;">

<td>'.$pdf_row['department'].'</td>
<td>'.$pdf_row['phone'].'</td>
<td>'.$pdf_row['email'].'</td>
</tr>


<hr>

<tr style="text-align:left;background-color:#F3F3F3;">
<td>SCHOOL CATEGORY</td>
<td>SESSION GRADUATED</td>
<td>APPLICATION STATUS</td>

</tr>
<tr style="text-align:left;">

<td>'.$pdf_row['school'].'</td>
<td>'.$pdf_row['graduation_session'].'</td>
<td>'.$pdf_row['application_status'].'</td>
</tr>


<hr>

<tr style="text-align:left;background-color:#F3F3F3;">
<td>NATIONALITY</td>
<td>STATE</td>
<td>LGA</td>

</tr>

<tr style="text-align:left;">

<td>'.$pdf_row['nationality'].'</td>
<td>'.$pdf_row['state'].'</td>
<td>'.$pdf_row['lga'].'</td>
</tr>



<hr>



</table>





<table>

<h3>NEXT OF KIN DETAIL:</h3>
<hr>

<tr style="text-align:left;background-color:#F3F3F3;">
<td>FATHER NAME</td>
<td>'.$pdf_row['fathername'].'</td>
</tr>
<tr style="text-align:left;background-color:#F3F3F3;">
<td>FATHER PHONE</td>
<td>'.$pdf_row['fatherphone'].'</td>
</tr>

<tr style="text-align:left;background-color:#F3F3F3;">
<td>MOTHER NAME</td>
<td>'.$pdf_row['mothername'].'</td>
</tr>
<tr style="text-align:left;background-color:#F3F3F3;">
<td>MOTHER PHONE</td>
<td>'.$pdf_row['motherphone'].'</td>
</tr>


<br>
</table>



<table>

<h3>TRANSCRIPT REQUEST DETAILS:</h3>
<hr>

<tr style="text-align:left;background-color:#F3F3F3;">
<td>RECIPIENT NAME</td>
<td>'.$pdf_row['recipient_name'].'</td>
</tr>
<tr style="text-align:left;background-color:#F3F3F3;">
<td>RECIPIENT EMAIL</td>
<td>'.$pdf_row['refphone'].'</td>
</tr>

<tr style="text-align:left;background-color:#F3F3F3;">
<td>DELIVERY METHOD</td>
<td>'.$pdf_row['mode_of_delivery'].'</td>
</tr>
<tr style="text-align:left;background-color:#F3F3F3;">
<td>RECIPIENT ADDRESS</td>
<td>'.$pdf_row['recipient_address'].'</td>
</tr>


<br>
</table>
</span>
';



$pdf->writeHTML($html, true, 0, true, true);




$i=1;
$cq = $dBASE->query("SELECT * FROM applicant_academic where app_id='".$pdf_row['appid']."'");
// $ccount = $cq->num_rows;
  while($row = $cq->fetch_assoc()) 
    {

}







// set UTF-8 Unicode font
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
$pdf->write2DBarcode(' '.$pdf_row['firstname'].' , has successfully appliead for transcript with appid: '.$pdf_row['reference_id'].'', 'QRCODE,L', 165, 245, 27, 27, $style, 'N');
// $pdf->Text(155, 242, 'Verify Application Status');

$pdf->SetLineWidth(2);



// reset pointer to the last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output(''.$pdf_row['firstname'].'  - '.$pdf_row['appid'].' Transcript Application Form.pdf', 'I');
// $pdf->Output('/home/n2c12b5/public_html/jsiit/PDF/'.$pdf_row['appid'].'-bio.pdf','F');
//============================================================+
// END OF FILE
//============================================================+
