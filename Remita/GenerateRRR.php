<?php
include("/home/indexial/jsiit.indexial.tech/app/Remita/Config/BillerService.php");
include("/home/indexial/jsiit.indexial.tech/app/Remita/Config/Credentials.php");
include("/home/indexial/jsiit.indexial.tech/app/Remita/GenerateRRRObjects/Values.php");
include("/home/indexial/jsiit.indexial.tech/app/Remita/GenerateRRRObjects/CustomFields.php");
include("/home/indexial/jsiit.indexial.tech/app/Remita/GenerateRRRObjects/GenerateRRRRequest.php");
include("/home/indexial/jsiit.indexial.tech/app/Remita/Config/ServiceParam.php");
include("/home/indexial/jsiit.indexial.tech/app/Remita/ValidateRRRObjects/ValidateRRRRequest.php");
include("/home/indexial/jsiit.indexial.tech/app/Remita/BillPaymentNotificationObjects/BillPaymentNotificationRequest.php");


class GenerateRRR
{

 function call_generateRRR(){
     
       $rand = rand(000000000,9999999);
       $credentials = new Credentials();
       $credentials-> transactionId = $rand;
       $credentials->publicKey = "aGFxcUBzZXJ2ZXJzbmcuY29tfDQyNDg5NjY3fGI3YTA1MWY1Yjk5NTI2OTlmMWViZDI4MTZmMGViNTRiZTAyNGJjNGY5YjE2Mzg2OGIzY2YxZjI3MDYzMGY4YjllMWU0YjBmNjRhOTM4OTM2MTEzYTAzNGVjODdjM2Q3NjhkYjJjNWRkOGRhZmMwOGQ1MzA4ZTZkYmNiMDIzMGZi";
       $services = new BillerService($credentials);
       $customField = new CustomFields();
       $customField->setId("5162538452");
       $payload = new GenerateRRRRequest();
       $payload->setCurrency("NGN");
       $payload->setBillId("5162538452");
       $payload->setAmount(100);
       $payload->setPayerPhone("08085519759");
       $payload->setPayerEmail("t.omonubi@gmail.com");
       $payload->setPayerName("Tokunbo Omonubi");
       $value = new Values();
       $value->setAmount(100);
       $value->setQuantity(0);
       $value->setValue("45236RGGH985263");
       $value1 = new Values();
       $value1->setAmount(200);
       $value1->setQuantity(0);
       $value1->setValue("17171717");
       $value2 = new Values();
       $value2->setAmount(800);
       $value2->setQuantity(100);
       $value2->setValue("57744");
       $value3 = new Values();
       $value3->setAmount(266);
       $value3->setQuantity(50);
       $value3->setValue("100098");
       $customField->setValues(array($value, $value1, $value2));
       $payload->setCustomFields($customField);
       $get_services = $services->generateRRR($payload);
       echo json_encode($get_services);

   }

}

$test_class = new GenerateRRR();
$test_class->call_generateRRR();




?>
