<?php
session_start();
extract($_SESSION);
include 'config/config.php';

	$pdf_query = $dBASE->query("SELECT * FROM rems_app INNER JOIN  rems_app_info ON rems_app.appid=rems_app_info.app_id INNER JOIN rems_sch_attended ON rems_app.appid=rems_sch_attended.app_id INNER JOIN rems_nkin_detail ON rems_app.appid=rems_nkin_detail.app_id where appid='$appid'");
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
$pdf->SetTitle(''.$pdf_row['app_name'].' - '.$pdf_row['appid'].' Application Form');
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

// set alpha to semi-transparency
$pdf->SetAlpha(0.3);


// draw jpeg image
$pdf->Image('images/naublogo.png', 67, 100, 80, 80, '', '', '', true, 72);

// restore full opacity
$pdf->SetAlpha(1);

// set font
$pdf->SetFont('times', 'B', 30);

$pdf->Write(0, 'NIGERIAN ARMY UNIVERISTY BIU', '', 0, 'C', true, 0, false, false, 0);

$pdf->SetFont('helvetica', '', 10);
$html = '<span style="text-align:center;">

<i>No 1 Biu-Gombe Road, PMB 1500 Biu, Borno State.</i><br>
<b>
SCHOOL OF REMEDIAL STUDIES</b><br>
</span>

';
$pdf->writeHTML($html, true, 0, true, true);
$pdf->Image('../../pics/'.$pdf_row['pic'].'', 170, 35, 30, 30, '', '', '', true, 72);




$html = '
<span style="text-align:center;"><img src="images/naublogo.png" WIDTH="100">
<br>

<b style="font-size: 15; color: white; background-color:blue;"><span style="background-color:black">ACKNOWLEDGEMENT SLIP<span></b>
</span>

<br>



';

$pdf->writeHTML($html, true, 0, true, true);


$html = '

<span style="text-align:center; font-size: 15;"><i>APP-ID: ('.$pdf_row['appid'].')</i></span>
<span style="font-size: 11;">
<br>
<span style="text-align:justify;">
<h3>PERSONAL INFO:</h3>


<table><hr>
<tr style="text-align:left;background-color:#F3F3F3;">
<td>FIRSTNAME</td>
<td>SURNAME</td>
<td>MIDDLENAME</td>

</tr>

<tr style="text-align:left;">

<td>'.$pdf_row['firstname'].'</td>
<td>'.$pdf_row['surname'].'</td>
<td>'.$pdf_row['middlename'].'</td>
</tr>

<hr>

<tr style="text-align:left;background-color:#F3F3F3;">
<td>DATE OF BIRTH</td>
<td>GENDER</td>
<td>MARITAL STATUS</td>

</tr>

<tr style="text-align:left;">

<td>'.$pdf_row['dob'].'</td>
<td>'.$pdf_row['sex'].'</td>
<td>'.$pdf_row['mstatus'].'</td>
</tr>


<hr>

<tr style="text-align:left;background-color:#F3F3F3;">
<td>NATIONALITY</td>
<td>STATE</td>
<td>LGA</td>

</tr>

<tr style="text-align:left;">

<td>'.$pdf_row['country'].'</td>
<td>'.$pdf_row['state'].'</td>
<td>'.$pdf_row['lga'].'</td>
</tr>



<hr>

<tr style="text-align:left;background-color:#F3F3F3;">
<td>CONTACT ADDRESS</td>

</tr>

<tr style="text-align:left;">
<td>'.$pdf_row['address'].'</td>
</tr>



<hr>

<tr style="text-align:left;background-color:#F3F3F3;">
<td>PHONE NUMBER</td>
<td>EMAIL</td>

</tr>

<tr style="text-align:left;">

<td>'.$pdf_row['phone'].'</td>
<td>'.$pdf_row['email'].'</td>
</tr>
</table>

<table>

<br>
<h3>SCHOOLS ATTENDED WITH DATES:</h3>
<hr>

<tr style="text-align:left;background-color:#F3F3F3;">
<td width="350">SCHOOLS</td>
<td>QUALIFICATION</td>
<td>YEAR</td>

</tr>

<tr style="text-align:left;">

<td width="350">'.$pdf_row['sch1'].'</td>
<td>'.$pdf_row['qua1'].'</td>
<td>'.$pdf_row['from1'].'-'.$pdf_row['to1'].'</td>
</tr>


<hr>


<tr style="text-align:left;">

<td width="350">'.$pdf_row['sch2'].'</td>
<td>'.$pdf_row['qua2'].'</td>
<td>'.$pdf_row['from2'].'-'.$pdf_row['to2'].'</td>
</tr>


<hr>


<tr style="text-align:left;">

<td width="350">'.$pdf_row['sch3'].'</td>
<td>'.$pdf_row['qua3'].'</td>
<td>'.$pdf_row['from3'].'-'.$pdf_row['to3'].'</td>
</tr>


<hr>


<tr style="text-align:left;">

<td width="350">'.$pdf_row['sch4'].'</td>
<td>'.$pdf_row['qua4'].'</td>
<td>'.$pdf_row['from4'].'-'.$pdf_row['to4'].'</td>
</tr>


</table>




<table>

<br>
<h3>NEXT OF KIN DETAIL:</h3>
<hr>

<tr style="text-align:left;background-color:#F3F3F3;">
<td>NEXT OF KIN NAME</td>
<td>'.$pdf_row['fullname'].'</td>
</tr>
<tr style="text-align:left;background-color:#F3F3F3;">
<td>RELATIONSHIP</td>
<td>'.$pdf_row['relation'].'</td>
</tr>

<tr style="text-align:left;background-color:#F3F3F3;">
<td>PHONE NUMBER</td>
<td>'.$pdf_row['nphone'].'</td>
</tr>
<tr style="text-align:left;background-color:#F3F3F3;">
<td>ADDRESS</td>
<td>'.$pdf_row['naddress'].'</td>
</tr>

</table>
</span>
';



$pdf->writeHTML($html, true, 0, true, true);
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
$pdf->write2DBarcode(' '.$pdf_row['fullname'].', has successfully appliead with appno: '.$pdf_row['jambno'].'', 'QRCODE,L', 165, 242, 30, 30, $style, 'N');
$pdf->Text(155, 235, 'Verify Application Status');

$pdf->SetLineWidth(2);



// reset pointer to the last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output(''.$pdf_row['app_name'].' - '.$pdf_row['appid'].' Application Form.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
