<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
extract($_POST);
extract($_GET);
include 'config/connection.php';
include 'functions.php';

$pass = md5($password);
$query1 = $dBASE->query("SELECT * FROM `applicants` WHERE `appid` = '$matricno' OR email='$email' ") or die($dBASE->error);

if ($query1->num_rows > 0) {
    ?>
    <button class="btn btn-danger btn-block" id="btn_sign_up">This matric No or email already exists. Please login.</button>
    <script>
        $(document).ready(function () {
            $("#btn_sign_up").prop("disabled", true);
            $("#email").prop("disabled", true);
            $("#fullname").prop("disabled", true);
            $("#password").prop("disabled", true);

            var SetInerval = setTimeout(function () {
                $("#btn_sign_in").html("Rolling Back Please wait...");
                $("#btn_sign_in").addClass("#h");
                $("#btn_sign_in").removeClass("btn-default");
            }, 5000);

            var setInterl = setTimeout(function () {
                $("#btn_sign_up").prop("disabled", false);
                $("#email").prop("disabled", false);
                $("#fullname").prop("disabled", false);
                $("#password").prop("disabled", false);
                $("#btn_sign_up").html("CREATE ACCOUNT");
                $("#haqq").removeClass("ajax_loader");
                $("#btn_sign_up").addClass("btn-primary");
            }, 5000);
        })
    </script>
    <?php
} else {
    // Generate OTP
    $otp = generateOTP();

    $query4 = $dBASE->query("INSERT INTO applicants
            (
                `appid`,
                `fullname`,
                `program`,
                `department`,
                `dept_id`,
                `school`,
                `email`,
                `password`,
                `phone`,
                `otp_code`
            )
            VALUES
            (
                '$matricno',
                '$fullname',
                '$program',
                '$dept',
                '$deptid',
                '$school',
                '$email',
                '$pass',
                '$phone',
                '$otp'
            );
    ") or die($dBASE->error);

    if (!$query4) {
        // Handle database insertion failure
    } else {
        // Send OTP via email
       // Send OTP via email
        $emailSent = sendOTPByEmail($email, $otp, $matricno, $fullname);

        // Send OTP via SMS
        $smsSent = false;
        if ($emailSent) {
            $smsSent = sendSMS('FUDMA', "$otp is your FUDMA", $phone);
            
        }

        if ($smsSent) {
            ?>
            <button class="btn btn-success btn-block" id="btn_sign_up">Account successfully created. OTP sent via your email and SMS.</button>
            <script>
                $(document).ready(function () {
                    $("#btn_sign_up").prop("disabled", true);
                    var setInterval = setTimeout(function () {
                        location = "OtpValidate.php";
                    }, 5000);
                });
            </script>
            <?php
        } else {
            ?>
            <button class="btn btn-danger btn-block" id="btn_sign_up">Failed to send OTP via SMS. Please try again.</button>
            <script>
                $(document).ready(function () {
                    $("#btn_sign_up").prop("disabled", true);
                    var setInterval = setTimeout(function () {
                        location.reload();
                    }, 5000);
                });
            </script>
            <?php
        }
    }
}
?>