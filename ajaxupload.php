<?php
session_start();
extract($_SESSION);

$valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp' , 'pdf' , 'doc' , 'ppt'); // valid extensions
$path = 'applicant_pics/'; // upload directory
if(!empty($_POST['name']) || !empty($_POST['email']) || $_FILES['image'])
{
$img = $_FILES['image']['name'];
$tmp = $_FILES['image']['tmp_name'];
// get uploaded file's extension
$ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
// can upload same image using rand function
$final_image = rand(1000,1000000).$img;
// check's valid format
if(in_array($ext, $valid_extensions)) 
{ 
$path = $path.strtolower($final_image); 
if(move_uploaded_file($tmp,$path)) 
{
echo "<img src='$path' class='img-thumbnaail' width='80' />";

//include database configuration file
include_once 'config/connection.php';
//insert form data in the database
$insert = $dBASE->query("UPDATE applicants SET pic='".$path."' where appid='$appid'") or die($dBASE->error);
//echo $insert?'ok':'err';
}
} 
else 
{
echo 'invalid';
}
}
?>