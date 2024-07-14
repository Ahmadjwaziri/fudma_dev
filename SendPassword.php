<?php
session_start();
extract($_POST);
extract($_GET);
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

$check = $dBASE->query("SELECT email,fullname FROM `applicants` WHERE (`email` = '$email' ) ") or die($dBASE->error);

if ($check->num_rows > 0) {

    $tpsData = $check->fetch_assoc();

    // Access the email from the tps data
    $useremail = $tpsData['email'];
    $name = $tpsData['fullname'];

// Function to send OTP via email
function sendOTPByEmail($useremail,$otp,$name) {
   

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
    $mail->addAddress($useremail);
    $mail->Subject = 'FUDUTSINMA Transcript Processing System Password Reset';
   
   // $mail->Body = "Dear $name ($staffid), Your New Password is: $otp , Please login to the Staff Portal Federal University Dutsin-Ma using the following link: <a href='https://staffdata.fudutsinma.edu.ng'>Staff Portal</a>";
  
   // Set the content type as HTML
   $mail->IsHTML(true);
   
   // Set the email body with HTML and PHP tags
   $mail->Body = "Dear <b>$name, </b> You requested for a Transcript Processing Account password reset on Federal University Dutsinma Transcript Processing System, Your Password is:<b> $otp</b> <br>, Click here to login  your Account: <a href=http://localhost/tps/applicantion/'>Login</a>";
   
   $mail->IsHTML(true);

    return $mail->send();

}



    // Generate OTP
    $otp = generateOTP();

    // Send OTP via email
    $emailSent = sendOTPByEmail($useremail,$otp,$name);

    if (!$emailSent) {
        // Handle email sending failure
        echo "Error sending OTP. Please try again.";
    } else {
        // Store OTP in session for verification
        $_SESSION['reset_otp'] = $otp;
       $pass= md5($_SESSION['reset_otp']);
        // Insert new password reset request
        $query4 = $dBASE->query("UPDATE applicants set password='$pass' where  email='$useremail' ") or die($dBASE->error);

        if (!$query4) {
            // Handle database insertion failure
            echo "Error inserting into the database. Please try again.";
        } else {
            ?>
            <button class="btn btn-success btn-block" id="btn_sign_up">Password Reset succesfull, Check your email for the new password</button>
            <script>
                $(document).ready(function(){
                    $("#btn_sign_up").prop("disabled", true);
                    var setInteval = setTimeout(function(){
                        $("#btn_sign_up").html("");
                        $("#haqq").removeClass("ajax_loader");
                        $("#btn_sign_up").removeClass("btn-success");
                    }, 3000);
                });

                var setInterval = setTimeout(function(){
                    // location.reload();
                    location = "index.php";
                },5000);
            </script>
            <?php
        }
    }

} else { 
    ?>
    <button class="btn btn-danger btn-block" id="btn_sign_up">Invalid email, not found</button>
    <script>
        $(document).ready(function(){
            $("#btn_sign_up").prop("disabled", true);
            var setInteval = setTimeout(function(){
                $("#btn_sign_up").html("");
                $("#haqq").removeClass("ajax_loader");
                $("#btn_sign_up").removeClass("btn-success");
            }, 3000);
        });

        var setInterval = setTimeout(function(){
           
            location = "index.php";
        },5000);
   </script>
   <?php
}
?>
