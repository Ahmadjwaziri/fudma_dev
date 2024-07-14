<?php

include 'config/connection.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
 
//required files
require '/var/www/html/PHPMailer/src/Exception.php';
require '/var/www/html/PHPMailer/src/PHPMailer.php';
require '/var/www/html/PHPMailer/src/SMTP.php';



// Function to generate OTP
function generateOTP() {
    $otpLength = 6; // Adjust the length of your OTP
    $otp = rand(pow(10, $otpLength-1), pow(10, $otpLength)-1);
    return $otp;
}


// Function to send OTP via email
// without this guy no way to go, respect this bro function 
function sendOTPByEmail($email, $otp,$matricno,$name) {
   

    $mail = new PHPMailer;
    //Server settings
    $mail->isSMTP();                              //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';       //Set the SMTP server to send through
    $mail->SMTPAuth   = true;             //Enable SMTP authentication
    $mail->Username   = 'fudmatps@gmail.com';   //SMTP write your email
    $mail->Password   = 'beijyxatoqzwpwkh';      //SMTP password
    $mail->SMTPSecure = 'ssl';            //Enable implicit SSL encryption
    $mail->Port       = 465;      
    $mail->setFrom('fudmatps@gmail.com', 'No-reply');
    $mail->addAddress($email);
    $mail->Subject = 'FUDUTSINMA Transcript Processing System';
   
   
   // Set the content type as HTML
   $mail->IsHTML(true);
   
   // Set the email body with HTML and PHP tags
   $mail->Body = "Dear <b>$name ($matricno), </b> You requested for a Transcript Processing Account to be created on Federal University Dutsinma Transcript Processing System, Your OTP is:<b> $otp</b> <br>, Click here to Activate your Account: <a href='http://tps.fudutsinma.edu.ng/OtpValidate.php'>Activate</a>";
  $mail->IsHTML(true);

    return $mail->send();

}

/// this guy is to transport success email and instruction for the transcript request this function is midlle guy in the house
function SuccesOtp($email,$matricno,$name) {
   

    $mail = new PHPMailer;
    //Server settings
    $mail->isSMTP();                              //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';       //Set the SMTP server to send through
    $mail->SMTPAuth   = true;             //Enable SMTP authentication
    $mail->Username   = 'fudmatps@gmail.com';   //SMTP write your email
    $mail->Password   = 'beijyxatoqzwpwkh';      //SMTP password
    $mail->SMTPSecure = 'ssl';            //Enable implicit SSL encryption
    $mail->Port       = 465;      
    $mail->setFrom('fudmatps@gmail.com', 'No-reply');
    $mail->addAddress($email);
    $mail->Subject = 'FUDUTSINMA Transcript Processing System';
   
   
   // Set the content type as HTML
   $mail->IsHTML(true);
   
   // Set the email body with HTML and PHP tags
   $mail->Body = 
// Set the email body with HTML and PHP tags
$mail->Body = "
    <p>Dear <b>$name ($matricno),</b></p>
    <p>
        You have successfully Verified your Account for a Transcript Processing   on the Federal University Dutsinma Transcript Processing System.
        Below are the instructions to proceed with your transcript request:
    </p>
    <ol>
        <li>Log in to the Transcript Processing System using your credentials.</li>
        <li>Proceed to make the necessary payment for the transcript request.</li>
        <li>Once payment is confirmed, your transcript request will be processed accordingly.</li>
        <li>Locate and click on the 'Request Transcript' option in the dashboard.</li>
        <li>Fill out the required details accurately, including the recipient's information and delivery method.</li>
        <li>Review your information carefully to ensure accuracy.</li>
        <li>Track your request progress.</li>
        
    </ol>
    <p>
        Please visit: <b>TPS</b>.<br>
        <a href='http://tps.fudutsinma.edu.ng'>Click here</a> to proceed.
    </p>
    <p>
        If you encounter any issues or have further inquiries, feel free to contact the Transcript Processing System support team for assistance.
    </p>
    <p>Best Regards,<br>
    Federal University Dutsinma Transcript Processing System</p>
";



   //"Dear <b>$name ($matricno), </b> You requested for a Transcript Processing Account to be created on Federal University Dutsinma Transcript Processing System, Your OTP is:<b> $otp</b> <br>, Click here to Activate your Account: <a href=http://localhost/tps/applicantion/OtpValidate'>Activate</a>";
  $mail->IsHTML(true);

    return $mail->send();

}



//Send sms to applicant phone for One time password

// Send SMS function
function sendSMS($from, $message, $to) {
    $postData = array(
        'from' => $from,
        'message' => $message,
        'to' => $to
    );

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.getspendo.com/gateway/api/v1/send/sms',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode($postData),
        CURLOPT_HTTPHEADER => array(
            'apiKey: pk_live_kXIY0RHjDPSFFYI8LkMXhQSO18Zi77gW1d2WP27adN4B4QX70T',
            'Content-Type: application/json'
        ),
    ));

    $response = curl_exec($curl);
    $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

    if ($response === false) {
        // Error occurred during the request
        $error = curl_error($curl);
        curl_close($curl);
        return "Error: $error";
    }

    curl_close($curl);

    if ($httpCode !== 200) {
        // API returned an error
        return "Error: HTTP $httpCode";
    }

    // SMS sent successfully
    return true;
}


// function sendSms2($from, $message, $to, $api_token, $customer_reference, $gateway, $callback_url) {
//     $postData = array(
//         'body' => $message,
//         'from' => $from,
//         'to' => $to,
//         'api_token' => $api_token,
//         'gateway' => $gateway,
//         'customer_reference' => $customer_reference,
//         'callback_url' => $callback_url
//     );

//     $curl = curl_init();

//     curl_setopt_array($curl, array(
//         CURLOPT_URL => 'https://www.bulksmsnigeria.com/api/v2/sms',
//         CURLOPT_RETURNTRANSFER => true,
//         CURLOPT_ENCODING => '',
//         CURLOPT_MAXREDIRS => 10,
//         CURLOPT_TIMEOUT => 0,
//         CURLOPT_FOLLOWLOCATION => true,
//         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//         CURLOPT_CUSTOMREQUEST => 'POST',
//         CURLOPT_POSTFIELDS => json_encode($postData),
//         CURLOPT_HTTPHEADER => array(
//             'Accept: application/json',
//             'Content-Type: application/json'
//         ),
//     ));

//     $response = curl_exec($curl);

//     curl_close($curl);

//     return $response;
// }

function SendInvoice($email,$name,$rrr,$amount) {
   

    $mail = new PHPMailer;
    //Server settings
    $mail->isSMTP();                              //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';       //Set the SMTP server to send through
    $mail->SMTPAuth   = true;             //Enable SMTP authentication
    $mail->Username   = 'fudmatps@gmail.com';   //SMTP write your email
    $mail->Password   = 'beijyxatoqzwpwkh';      //SMTP password
    $mail->SMTPSecure = 'ssl';            //Enable implicit SSL encryption
    $mail->Port       = 465;      
    $mail->setFrom('fudmatps@gmail.com', 'No-reply');
    $mail->addAddress($email);
    $mail->Subject = 'FUDUTSINMA Transcript Processing System Payment Invoice';
   
   
   // Set the content type as HTML
   $mail->IsHTML(true);
   
   // Set the email body with HTML and PHP tags
   $mail->Body = 
// Set the email body with HTML and PHP tags
$mail->Body = "
    <p>Dear <b>$name ,</b></p>
    <p>
        You have successfully generated invoice for a Transcript Processing with RRR: <b> $rrr </b>  on the Federal University Dutsinma Transcript Processing System.
        Below are the instructions to proceed with your transcript request:
    </p>
    <ol>
        <li>Log in to the Transcript Processing System using your credentials.</li>
        <li>Proceed to make the necessary payment for the transcript request.</li>
        <li>Once payment is confirmed, your transcript request will be processed accordingly.</li>
        
        
    </ol>
    <p>
        Please visit: <b>TPS</b>.<br>
        <a href='http://tps.fudutsinma.edu.ng/'>Make Payment via Remita</a> to pay N$amount.
    </p>
    <p>
        If you encounter any issues or have further inquiries, feel free to contact the Transcript Processing System support team for assistance.
    </p>
    <p>Best Regards,<br>
    Federal University Dutsinma Transcript Processing System</p>
";



   //"Dear <b>$name ($matricno), </b> You requested for a Transcript Processing Account to be created on Federal University Dutsinma Transcript Processing System, Your OTP is:<b> $otp</b> <br>, Click here to Activate your Account: <a href=http://localhost/tps/applicantion/OtpValidate'>Activate</a>";
  $mail->IsHTML(true);

    return $mail->send();

}


    

?>
