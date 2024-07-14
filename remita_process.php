<?php
session_start();
extract($_SESSION);
extract($_POST);
extract($_GET);
include 'config/connection.php';


 ini_set('display_errors', 1);
 ini_set('display_startup_errors', 1);
 error_reporting(E_ALL);
include 'Remitacredentials.php';
include 'functions.php';

if(isset($_POST['generate_rrr'])){
    $tid = rand(00000000000,9999999999);
$amount = "3000";
$hash = "$marchantid$serviceid$tid$amount$api_key";
$hashed = openssl_digest($hash, 'sha512');

$curl = curl_init();
curl_setopt_array($curl, array(
  // CURLOPT_URL => "https://login.remita.net/remita/exapp/api/v1/send/api/echannelsvc/merchant/api/paymentinit",
  CURLOPT_URL => "https://remitademo.net/remita/exapp/api/v1/send/api/echannelsvc/merchant/api/paymentinit",
 
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS =>"{\r\n\t\"serviceTypeId\": \"$serviceid\",\r\n\t\"amount\": \"$amount\",\r\n\t\"orderId\": \"$tid\",\r\n\t\"payerName\": \"$fullname\",\r\n\t\"payerEmail\": \"$email\",\r\n\t\"payerPhone\": \"$phone\",\r\n\t\"hash\":\"$hashed\"\r\n}\r\n",
  
  CURLOPT_HTTPHEADER => array(
    "Content-Type: application/json",
    "Authorization: remitaConsumerKey=$marchantid,remitaConsumerToken=$hashed"
  ),
));
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($curl);
 $re = substr($response, 7, -1);
 $result = json_decode($re);
 var_dump($result);
 echo $result->statuscode;
 echo "<br>";
 echo $result->RRR;
 echo "<br>";
 echo $result->status; 
curl_close($curl);
   
   if(isset($result->RRR)) {
        $rrr = $result->RRR;
        $query = $dBASE->query("INSERT INTO app_rrr (rrr,billId,app_id,amount) VALUES ('$rrr', '$tid', '$appid', '$amount')");
        $query_t = $dBASE->query("INSERT INTO transcript_request (app_id,reference_id) VALUES ('$appid', '$tid')");
   
    // $query = $dBASE->query("INSERT INTO app_rrr (rrr,billId,app_id,amount) VALUES ('".$result->RRR."', '$tid', '$appid', '$amount')") or die($dBASE->error);
    // $query_t = $dBASE->query("INSERT INTO transcript_request (app_id,reference_id) VALUES ('$appid' ,'$tid')") or die($dBASE->error);
    $sendinvoce = SendInvoice($email,$fullname,$rrr,$amount);
    $_SESSION['response'] = '
            <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        Payment Generated Successfully!
    </div>'; 
		
		header("Location: MakePayment.php");
     } else {
        $_SESSION['response'] = '<div class="alert alert-danger alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    Payment Generation Failed!
                                 </div>';
        header("Location: MakePayment.php");
    }

  
}


if(isset($_GET['status'])){
$hash = "$rrr$api_key$marchantid";


$hashed = openssl_digest($hash, 'sha512');

// echo $hashed;
 $curl = curl_init();
 
curl_setopt_array($curl, array(
  //CURLOPT_URL => "https://login.remita.net/remita/exapp/api/v1/send/api/echannelsvc/$marchantid/$rrr/$hashed/status.reg",
  CURLOPT_URL => "https://remitademo.net/remita/exapp/api/v1/send/api/echannelsvc/$marchantid/$rrr/$hashed/status.reg",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "Content-Type: application/json",
    "Authorization: remitaConsumerKey=$marchantid,remitaConsumerToken=$hashed"
  ),
));

$response = curl_exec($curl);


 $result = json_decode($response);
//  var_dump($result);
//  echo $result->status;
 $result->RRR;
 $result->orderId;
 $result->message;
 $result->transactiontime;
 $status = $result->status;
 
//  echo $status;
if($status == "00"){
 $query = $dBASE->query("UPDATE app_rrr SET status='PAID' WHERE rrr='".$result->RRR."'");
 
 $query2 = $dBASE->query("SELECT * FROM app_rrr WHERE rrr='".$result->RRR."'");
 $row = $query2->fetch_array();
 $query = $dBASE->query("UPDATE applicants SET payment_status='PAID' WHERE appid='".$row['app_id']."'");
 $query1 = $dBASE->query("UPDATE transcript_request SET payment_status='1'  WHERE   reference_id = '".$row['billId']."'");
 
   $_SESSION['response'] = '
       <div class="alert alert-success alert-dismissible" role="alert">
         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       '.$result->data->message.'    </div>'; 
		header("Location: MakePayment.php");
 }else{
      $_SESSION['response'] = '
       <div class="alert alert-danger alert-dismissible" role="alert">
         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       '.$result->message.'    </div>'; 
		header("Location: MakePayment.php");
 }
curl_close($curl);
// echo $response;
}

if(isset($_GET['remita_yes'])){
 $query2 = $dBASE->query("SELECT * FROM app_rrr WHERE rrr='$rrr' and billId='$oderid'");
 $row = $query2->fetch_array();
 $query = $dBASE->query("UPDATE applicants SET payment_status='PAID' WHERE appid='".$row['app_id']."'");
 
  $query1 = $dBASE->query("UPDATE app_rrr SET status='PAID' WHERE app_id='".$row['app_id']."'");
  $query2 = $dBASE->query("UPDATE transcript_request SET payment_status='1'  WHERE   reference_id='$oderid'");
//   if($query->num_rows> 0){
       $_SESSION['response'] = '
       <div class="alert alert-success alert-dismissible" role="alert">
         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Payment Approved Successfully!</div>'; 
		header("Location: MakePayment.php");
//   }else{
//       $_SESSION['response'] = '
//       <div class="alert alert-danger alert-dismissible" role="alert">
//          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Payment Approved Failed!</div>'; 
// 		header("Location: MakePayment");
//   }
}



?>