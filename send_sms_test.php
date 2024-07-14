<?php
// Include or require the functions.php file if it's in a separate file
require_once 'functions.php';

// Assuming $phone and $otp are defined somewhere before this point
$phone = '08107814105'; // Replace with the recipient's phone number
$otp = '283059'; // Replace with the generated OTP

// Call the SendSmsOtp function
$smsSent = SendSmsOtp($phone, $otp);

// Check if SMS was sent successfully
if ($smsSent === true) {
    echo "OTP sent successfully!";
} else {
    echo "Error occurred: $smsSent";
}
?>
