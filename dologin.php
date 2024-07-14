<?php
session_start();
extract($_SESSION);
extract($_POST);
extract($_GET);
    include 'config/connection.php';
    $pass = md5($password);
    $query = $dBASE->query("SELECT * FROM applicants where email='$email' And password='$pass' ")or die($dBASE->error);
    //if user and pass are correct render the services
     
    if($query->num_rows > 0){
        // this guy is tocheck if you have verified your email or phone with otp sent to you
        $row = $query->fetch_array();
       
    if($row['otp_status']==1){
        ?><button class="btn btn-default btn-block" id="btn_sign_in"><span class="fa fa-spinner"></span> Verify Please wait...</button><?php 
        // $row = $query->fetch_assoc();
        $_SESSION["email"] = $row["email"];
        $_SESSION["appid"] = $row["appid"];
        
        if($row['program'] == ""){
            $_SESSION['response'] = "no";
        }else{
            
        }
        ?>
        <script src="build/js/jquery.min.js"></script>
            <script>
                $(document).ready(function(){
                    $("#btn_sign_in").prop("disabled", true);
                    $("#email").prop("disabled", true);
                    $("#password").prop("disabled", true);
                    
                    var setInteva = setTimeout(function(){
                            $("#btn_sign_in").html("Please wait...");
                            $("#btn_sign_in").addClass("#h");
                            $("#btn_sign_in").removeClass("btn-default");
                    }, 5000);
                    var setInteral = setTimeout(function(){
    location = "dashboard.php";
    }, 5000);
                })
            </script>
        <?php
        }else{
            // we must make sure that you have navigated to otp validation page....... if not verified 
            ?>
            <button class="btn btn-default btn-block" id="btn_sign_in"><span class="fa fa-spinner"></span>You must Verify OTP...</button>
        
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
    location = "OtpValidate.php";
    }, 5000);
                })
            </script>
            <?php
        }
    }else{
        ?><button class="btn btn-danger btn-block" id="btn_sign_in">Invalid sign-in credentials</button><?php
        ?>
            <script>
                $(document).ready(function(){
                    $("#btn_sign_in").prop("disabled", true);
                    $("#email").prop("disabled", true);
                    $("#password").prop("disabled", true);
              
                    var SetInterval = setTimeout(function(){
                        $("#btn_sign_in").html("Rolling back Please wait...");
                        $("#btn_sign_int").addClass("ajax_loader");
                        $("#btn_sign_in").removeClass("btn-danger");
                    }, 3000);
                    var setnterval = setTimeout(function(){
                        $("#btn_sign_in").prop("disabled", false);
                        $("#email").prop("disabled", false);
                         $("#password").prop("disabled", false);
                       
                        $("#btn_sign_in").html("SIGN IN");
                        $("#haqq").removeClass("ajax_loader");
                        $("#btn_sign_in").addClass("btn-primary");
                    }, 5000);
                })
            </script>
        <?php
    }

?>

