<?php
session_start();
extract($_SESSION);
extract($_POST);
extract($_GET);
include 'config/connection.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


include("../remita/Config/BillerService.php");
include("../remita/Config/Credentials.php");
include("../remita/GenerateRRRObjects/Values.php");
include("../remita/GenerateRRRObjects/CustomFields.php");
include("../remita/GenerateRRRObjects/GenerateRRRRequest.php");
include("../remita/Config/ServiceParam.php");
include("../remita/ValidateRRRObjects/ValidateRRRRequest.php");
include("../remita/BillPaymentNotificationObjects/BillPaymentNotificationRequest.php");

$key = "3843497054";
if(isset($_POST['generate_rrr'])){
    
    $tid = rand(00000,99999);
    $rid = rand(00000, 9999);
    $credentials = new Credentials();
       $credentials-> transactionId = $tid;
       $credentials->publicKey = $key;
       $services = new BillerService($credentials);
       $payload = new GenerateRRRRequest();
       $payload->setRequestId($rid);
       $payload->setCurrency("NGN");
       $payload->setBillId("41502008");
       $payload->setAmount("3000");
       $payload->setPayerPhone($phone);
       $payload->setPayerEmail($email);
       $payload->setPayerName($fullname);
       $get_services = $services->generateRRR($payload);
      echo json_encode($get_services);
    
    
    foreach($get_services['responseData'] As $gRRR){
        $rrr = $gRRR['rrr'];
        $query = $dBASE->query("INSERT INTO app_rrr (rrr,billId,app_id,amount) VALUES ('".$gRRR['rrr']."', '$tid', '$appid', '".$gRRR['amountDue']."')") or die($dBASE->error);
    // header("Location: https://remitademo.net/remita/exapp/api/v1/send/api/bgatesvc/billing/$key/$rrr/$rid/rest.reg");
    
    }
    
//     	$_SESSION['response'] = '
//             <div class="alert alert-success alert-dismissible" role="alert">
//         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
//         RRR Generated Successfully!
//     </div>'; 
		
// 		header("Location: MakePayment");
    

  
}

if(isset($_GET['tid'])){
        //  $credentials = new Credentials();
        // $credentials->publicKey = $key;
        // $billers = new BillerService($credentials);
        // $param =new ServiceParam();
        // $param->setRequestId(rand());
        // $param->setRRR($rrr);
        // $get_billers = $billers->getRRRDetails($param);
        // //var_dump($get_billers);
        // // echo $get_billers->responseCode['responseCode'];
        // echo json_encode($get_billers);
        
        // $credentials = new Credentials();
        // $credentials->publicKey = $key;
        // $services = new BillerService($credentials);
        // $param =new ServiceParam();
        // $param->setRequestId(rand());
        // $param->setTranactionId($tid);
        // $get_services = $services->getPaymentStatus($param);
        // //var_dump($get_billers);
        // // echo $get_billers->responseCode['responseCode'];
        // echo json_encode($get_services);
        
        
//         $_SESSION['response'] = '
//             <div class="alert alert-success alert-dismissible" role="alert">
//         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
//         '.$get_services['status'].'
//     </div>'; 
// 		header("Location: MakePayment");


$credentials = new Credentials();
        $credentials->publicKey = $key;
        $services = new BillerService($credentials);
        $param =new ServiceParam();
        $param->setTranactionId("123456");
        $param->setRequestId();

        $get_services = $services->getPaymentStatus($param);
        echo json_encode($get_services);
}



?>