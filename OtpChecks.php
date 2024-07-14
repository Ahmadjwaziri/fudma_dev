<?php
session_start();
extract($_SESSION);
extract($_POST);
extract($_GET);
    include 'config/connection.php';
    include 'functions.php';
    
    $query = $dBASE->query("SELECT * FROM applicants where otp_code='$otp' ")or die($dBASE->error);

    if($query->num_rows > 0){
        ?><button class="btn btn-default btn-block" id="btn_sign_in"><span class="fa fa-spinner"></span> OTP Successfully Verify Please wait for login page...</button><?php 
        $row = $query->fetch_assoc();
        //know the alumni matricno
         $matricno = $row["appid"];
         $email =  $row["email"];
         $name  = $row["fullname"];
        
       
        $validate =  $dBASE->query("UPDATE applicants set otp_status='1' where otp_code='$otp' and appid='$matricno'  ") or die($dBASE->error);
        
        $emailSent = SuccesOtp($email,$matricno,$name)
 ?>
        <script src="build/js/jquery.min.js"></script>
            <script>
                $(document).ready(function(){
                    $("#btn_sign_in").prop("disabled", true);
                    
                    
                    var setInteva = setTimeout(function(){
                            $("#btn_sign_in").html("Please wait...");
                            $("#btn_sign_in").addClass("#h");
                            $("#btn_sign_in").removeClass("btn-default");
                    }, 5000);
                    var setInteral = setTimeout(function(){
    location = "index";
    }, 5000);
                })
            </script>
        <?php
    }else{
        ?><button class="btn btn-danger btn-block" id="btn_sign_in">Invalid OTP CODE</button><?php
        ?>
            <script>
                $(document).ready(function(){
                    $("#btn_sign_in").prop("disabled", true);
                    $("#otp").prop("disabled", true);
                    
              
                    var SetInterval = setTimeout(function(){
                        $("#btn_sign_in").html("Rolling back Please wait...");
                        $("#btn_sign_int").addClass("ajax_loader");
                        $("#btn_sign_in").removeClass("btn-danger");
                    }, 3000);
                    var setnterval = setTimeout(function(){
                        $("#btn_sign_in").prop("disabled", false);
                        $("#otp").prop("disabled", false);
                       
                       
                        $("#btn_sign_in").html("VALIDATE");
                        $("#haqq").removeClass("ajax_loader");
                        $("#btn_sign_in").addClass("btn-primary");
                    }, 5000);
                })
            </script>
        <?php
    }

?>

