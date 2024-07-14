<?php
session_start();
extract($_GET);
include 'config/config.php';

	$pdf_query = $dBASE->query("SELECT * FROM students INNER JOIN hostel_applicants ON students.studentid=hostel_applicants.student_id where studentid='$studentid'");
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
$pdf->SetTitle(''.$pdf_row['surname'].' '.$pdf_row['firstname'].' - '.$pdf_row['studentid'].' Hostel Form');
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
$pdf->Image('images/logo.png', 67, 100, 80, 80, '', '', '', true, 72);

// restore full opacity
$pdf->SetAlpha(1);

// set font
$pdf->SetFont('times', 'B', 20);

$pdf->Write(0, 'JIGAWA STATE INSTITUTE OF INFORMATION TECHNOLOGY, KAZAURE', '', 0, 'C', true, 0, false, false, 0);

$pdf->SetFont('helvetica', '', 10);
$html = '<span style="text-align:center;">
<i>P. M. B. 5002, Kazaure, Jigawa State, Nigeria.</i>


</span>

';
$pdf->writeHTML($html, true, 0, true, true);
$pdf->Image('../../'.$pdf_row['pic'].'', 170, 35, 30, 30, '', '', '', true, 72);




$html = '
<span style="text-align:center;"><img src="images/logo.png" WIDTH="100">
<br>

<b style="font-size: 15; color: white; background-color:blue;"><span style="background-color:black">HOSTEL ACCOMODATION FORM<span></b>
</span>

<br>





';

$pdf->writeHTML($html, true, 0, true, true);


$html = '


<span style="font-size: 11;text-align:left;">
<table border="1px" style="background-color:#F3F3F3;">
  <tr>
    <td>NAME:</td>
    <td>'.$pdf_row['surname'].', '.$pdf_row['firstname'].'</td>
  </tr>

   <tr>
    <td>MATRIC NO:</td>
    <td>'.$pdf_row['studentid'].'</td>
  </tr>

 
   <tr>
    <td>DEPARTMENT:</td>
    <td>'.$pdf_row['department'].'</td>
  </tr>

   <tr>
    <td>COURSE:</td>
    <td>'.$pdf_row['course'].'</td>
  </tr>

  <tr>
    <td>PROGRAM:</td>
    <td>'.$pdf_row['program'].'</td>
  </tr>


   <tr>
    <td>LEVEL:</td>
    <td>'.$pdf_row['level'].'</td>
  </tr>

   <tr>
    <td>SESSION:</td>
    <td>2016/2017</td>
  </tr>
</table>
</span>
';
$pdf->writeHTML($html, true, 0, true, true);


$pdf->SetFont('times', 'B', 12);
$uq = $dBASE->query("SELECT * FROM hostel_block where block='".$pdf_row['block']."'");
$qrow = $uq->fetch_array();
$html = '
<br><br/>

Hostel Allocated: '.$qrow['block'].'
<br>
Room Allocated: '.$pdf_row['room'].'

<br><br><br><br>
';

$pdf->writeHTML($html, true, 0, true, true);


$pdf->SetFont('times', 'i', 12);
$html = '
<table>
  

 <tr>
   
  <td>Hostel Administrator:......................................</td>
  <td>Hostel Supervisor:......................................</td>

  
 </tr>
 
</table>

';
$pdf->writeHTML($html, true, 30, true, false);

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
$pdf->write2DBarcode(' '.$pdf_row['surname'].', has successfully Appplied for '.$qrow['block'].' room '.$pdf_row['room'].': '.$pdf_row['studentid'].'', 'QRCODE,L', 165, 245, 27, 27, $style, 'N');
// $pdf->Text(155, 242, 'Verify Application Status');

$pdf->SetLineWidth(2);



// reset pointer to the last page
$pdf->lastPage();

// ---------------------------------------------------------
// /home/username/public_html/app/admin/pdfs/filename.pdf
//Close and output PDF document
// $pdf->Output(''.$pdf_row['surname'].' '.$pdf_row['firstname'].' - '.$pdf_row['studentid'].' Hostel Form.pdf', 'S');
$pdf->Output('/public_html/jsiit/PDF/'.$pdf_row['firstname'].'-hostel-'.$pdf_row['surname'].'.pdf','F');

// $pdf_string = $pdf->Output('pseudo.pdf', 'S');
// file_put_contents('../../PDF/myfile.pdf', $pdf_string);

//============================================================+
// END OF FILE
//============================================================+
