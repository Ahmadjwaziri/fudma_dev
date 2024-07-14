<?php 
session_start();
extract($_SESSION);
extract($_POST);
extract($_GET);
include 'config/connection.php';




//paper request
if(isset($_POST['save_app'])){
    
    $sql = $dBASE->query("UPDATE `transcript_request` SET `graduation_session`='$gsession',`Mode_of_delivery`='$dmode',`delivery_location`='$dlocation',`recipient_name`='$rname',`recipient_address`='$raddress',`recipient_city`='$rcity',`recipient_state`='$rstate',`recipient_country`='$rcountry',`recipient_area_pcode`='$rpcode',`recipient_email`='$remail',`recipient_phone`='$rphone',`application_status`='1' WHERE app_id='$appid' and reference_id='$refno'");
    $sql_1 = $dBASE->query("UPDATE `app_rrr` SET	is_used=1 WHERE billId='$refno' and app_id='$appid'");
    $query = $dBASE->query("UPDATE applicants SET payment_status='UNPAID' where appid='$appid'");
    $_SESSION['response'] = '
            <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       Paper Transcript Request Successfully
    </div>'; 
		header("Location: TranscriptRequestHistory.php");
    
    
}

//electronic request 
if(isset($_POST['save_appE'])){
    
  $sql = $dBASE->query("UPDATE `transcript_request` SET `graduation_session`='$gsession',`Mode_of_delivery`='$dmode',`recipient_name`='$rname',`recipient_email`='$remail',`application_status`='1' WHERE app_id='$appid' and reference_id='$refno'");
  $sql_1 = $dBASE->query("UPDATE `app_rrr` SET	is_used=1 WHERE billId='$refno' and app_id='$appid'");
  $query = $dBASE->query("UPDATE applicants SET payment_status='UNPAID' where appid='$appid'");

  $_SESSION['response'] = '
          <div class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      Electronic Transcript Request Successfully
  </div>'; 
  header("Location: TranscriptRequestHistory.php");
  
  
}

if(isset($_POST['uploads']))
{
  $maxsize=1000;
  if($_FILES['upload_file']['size'] < $maxsize){
        $error_1='File Size must not be more than 1MB';
        // echo '<script>alert("'.$error_1.'")</script>';
        	$_SESSION['response'] = '
            <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        '.$error_1.'
    </div>'; 
		header("Location: DocsUpload");
        
    }else{
 $uploadfile=$_FILES["upload_file"]["tmp_name"];
 $folder="docs/";
 move_uploaded_file($_FILES["upload_file"]["tmp_name"], "$folder".$_FILES["upload_file"]["name"]);

 $query2 = $dBASE->query("INSERT INTO `applicant_uploads`
(`type`,
`url`,
`app_id`)
VALUES
('$filename',
'".$_FILES["upload_file"]["name"]."',
'$appid');
");

	$_SESSION['response'] = '
            <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        Uploaded Successfully
    </div>'; 
		header("Location: DocsUpload");
}
}




if (isset($_POST['submit_app'])) {
	$query = $dBASE->query("UPDATE applicants SET app_status='SUBMITTED' where appid='$appid'");
	header("Location: dashboard.php");
}

// if (isset($_GET['print'])) {
// 	$a_query = $dBASE->query("SELECT * FROM admissions where app_id='$appid'");
// 	if ($a_query->num_rows > 0) {
// 	    $a_row = $a_query->fetch_array();
// 	    if($a_row['admission_fee'] == "NO"){
// 	        header("Location: AdmissionPay");
// 	    }else{
//      	   header("Location: TCPDF/PDF/admission_letter");
// 	    }
	    
		
// 	}
// }


if (isset($_GET['print_form'])) {
	$a_query = $dBASE->query("SELECT * FROM applicants where appid='$appid'");
	if ($a_query->num_rows > 0) {
	    $a_row = $a_query->fetch_array();
	    if($a_row['payment_status'] == "UNPAID"){
	        $_SESSION['response'] =  "<div class='alert alert-danger wow fadeInUp animated' data-wow-duration='500ms' data-wow-delay='900ms'><button class='close' data-dismiss='alert'>&times;</button><strong>Error: </strong>You have an outstanding payment!</div>";
	        header("Location: MakePayment");
	    }else{
     	   header("Location: TCPDF/examples/acknowledgement_form.php");
	    }
	    
		
	}
}

if(isset($_POST['save_nkin'])){
    $query = $dBASE->query("UPDATE applicant_nkin SET fathername='$fathername', mothername='$mothername', fatherphone='$fatherphone', motherphone='$motherphone', refereename='$refereename', refphone='$refphone', refaddress='$refaddress', relation='$relation' WHERE app_id='$appid'");
     $_SESSION['response'] =  "<div class='alert alert-success wow fadeInUp animated' data-wow-duration='500ms' data-wow-delay='900ms'><button class='close' data-dismiss='alert'>&times;</button><strong>Success: </strong>Next of KIN Updated successfully!</div>";
                header('location: NextOfKin.php');
}


if (isset($_GET['print'])) {
	$a_query = $dBASE->query("SELECT * FROM applicant_admission where app_id='$appid'");
	if ($a_query->num_rows > 0) {
	    $a_row = $a_query->fetch_array();
	   // if($a_row['admission_fee'] == "NO"){
	   //     header("Location: AdmissionPay");
	   // }else{
     	   header("Location: TCPDF/examples/admission_letter");
	   // }
	    
		
	}
}

if (isset($_POST['change_password'])) {
    $old = md5($oldpassword);
    $new = md5($newpassword);
    $query1 = $dBASE->query("SELECT password,appid FROM applicants WHERE appid='$appid' And password='$old'");

    if (!$query1->num_rows > 0) {
       $_SESSION['response'] =  "<div class='alert alert-danger wow fadeInUp animated' data-wow-duration='500ms' data-wow-delay='900ms'><button class='close' data-dismiss='alert'>&times;</button><strong>Error: </strong>Old Password Is Incorrect</div>";
                header('location: settings');
    }else{
    $query = $dBASE->query("UPDATE applicants SET password='$new' where appid='$appid'");

    $_SESSION['response'] =  "<div class='alert alert-success wow fadeInUp animated' data-wow-duration='500ms' data-wow-delay='900ms'><button class='close' data-dismiss='alert'>&times;</button><strong>Success: </strong>Password Updated Successfully</div>";
                header('location:Settings.php');
}

}





// Delete User
if (isset($_POST['delete_user'])) {
	$query = $dBASE->query("DELETE FROM users where id='$id'");
	$_SESSION['response'] = '
            <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        User Deleted Successfully
    </div>'; 
		header("Location: Users.php");
}






if(isset($_GET['paystack'])){
    $curl = curl_init();
  
  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.paystack.co/transaction/verify/$paystack",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
      "Authorization: Bearer sk_live_3e6919c84d627394de6fe096111970d03b577e18",
      "Cache-Control: no-cache",
    ),
  ));
  
  $response = curl_exec($curl);
  $err = curl_error($curl);
  curl_close($curl);
  
  if ($err) {
    // echo "cURL Error #:" . $err;
  } else {
    //   echo $response;
    $result = json_decode($response);
     $r = $result->data->status;
  if($r == "success"){
   $query = $dBASE->query("UPDATE applicants SET payment_status='PAID' WHERE appid='$appid'") or die($dBASE->error);
   
   
   $query1 = $dBASE->query("INSERT INTO paystack_pay (appid,amount,ref) VALUES('$appid','$amount','$paytsack')");
 
   $_SESSION['response'] = '
       <div class="alert alert-success alert-dismissible" role="alert">
         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       '.$result->message.'    </div>'; 
		header("Location: dashboard");
     }
    
    
    
  }
}
?>