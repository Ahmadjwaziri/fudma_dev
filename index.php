<?php 
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
include 'config/connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Federal University Dutsinma Transcript Processing System">
    <meta name="author" content="Ahmad Waziri">
    <link rel="icon" href="img/fudma_seal.png">
    <title>Federal University Dutsinma Transcript Processing System</title>
    <link href="build/css/bootstrap.min.css" rel="stylesheet">
    <link href="build/css/font-awesome.min.css" rel="stylesheet">
    <link href="build/css/style.css" rel="stylesheet">
    <style>
        .ajax_loader{
            background: url(build/images/Preloader_8.gif);
            background-repeat: no-repeat;
            background-position: center; 
            background-size:auto;
            height:50px;
            cursor:default;
            z-index:-1;
        }
    </style>
    <style>
        #tooltip {
        }
        #tooltip #tooltiptext {
            visibility: hidden;
            width: 90%;
            background-color:red;;
            color: #ED1C24;
            text-align: right;
            border-radius: 6px;
            padding: 5px;
            /* Position the tooltip */
            position: absolute;
            z-index: 1;
        }
        #tooltip:hover #tooltiptext {
            visibility: visible;
        }
    </style>
    <style>
        .container-instructions {
            margin-bottom: 20px;
            text-align: left;
            border: 1px solid rgba(218, 165, 32, 0.5); /* golden with transparency */
            padding: 15px;
            border-radius: 5px;
            
        }
        .container-left {
            border: 1px solid rgba(0, 128, 0, 0.5); /* green with transparency */
            padding: 15px;
            border-radius: 5px;
        }
        .header {
            text-align: center;
            padding: 20px 0;
            background-color: rgba(211, 211, 211, 0.5); /* ash with transparency */
            margin-bottom: 20px;
            border: 1px solid rgba(218, 165, 32, 0.5); /* golden with transparency */
            border-radius: 5px;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 9999;
        }
        @media (max-width: 576px) {
            .header h1 {
                font-size: 24px;
            }
        }

       
        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: #f5f5f5;
            text-align: center;
            padding: 10px 0;
        }
    
    </style>
</head>
<body>
    <div class="header">
        <h1>Federal University Dutsinma Transcript Processing System</h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="container-instructions">
                    
                    <h2>Instructions:Student Transcript Payment & Processing</h2>

    <ul>
        <li>Click on <strong>New Application</strong> to verify your identity and create account</li>
        <li>Input your Matriculation Number for UG,PG OR SCE</li>
        <li>Upon successful identification Fill the registration form with required information</li>
        <li>Check your email or Phone Number for OTP</li>
        <li>Follow the instruction in your email</li>
        <li>Choose your account password</li>
        <li>If the steps above are successful, you will be logged in</li>
    </ul>

    <p><strong>NOTE:</strong></p>
    <ul>
        <li>All payments for Transcript processing must be processed only through this portal</li>
        <li>If you are new here, just click the "New Application" link below to create your account</li>
    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="container-left">
                    <div class="flip">
                        <div class="card"> 
                            <div class="face front"> 
                                <div class="panel panel-default">
                                    <form class="form-horizontal" name="sign_in_form" id="sign_in_form">
                                        <h1 class="text-center"><img  src="img/fudma.png" width="100"></h1>
                                        <center><h4>TPS Portal</h4></center>
                                        <br>
                                        <input class="form-control" placeholder="Email" id="email" name="email" type="email" autocomplete="on" required="true" />
                                        <input class="form-control" placeholder="Password" id="password" name="password" type="password" required="true" />
                                        <p id="sign_in_result"><button class="btn btn-primary btn-block" id="btn_sign_in">SIGN IN</button></p>
        <a href="NewApplication.php">New Application</a> || <a href="ForgotPassword.php">Forgot Password</a>
                                        <div id="haqq"></div>
                                        
                                        
                                    </form>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

      <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p>&copy; 20241 Federal University Dutsinma. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>
    
    <script src="build/js/jquery.min.js"></script>
    <script src="build/js/bootstrap.min.js"></script>
    <script>
        $('.fliper-btn').click(function(){
            $('.flip').find('.card').toggleClass('flipped');
        });
    </script>
    <script>
        $(document).ready(function(){
            $("#sign_in_form").on('submit',function(e){
                e.preventDefault();
                $("#email").prop('disabled', true);
                $("#password").prop('disabled', true);
                $("#btn_sign_in").prop("disabled", true);
                $("#btn_sign_in").html("");
                $("#btn_sign_in").blur();
                $("#btn_sign_in").removeClass("btn-primary");
                $("#haqq").addClass("ajax_loader")
                $.ajax({
                    url: "dologin.php",
                    type: "POST",
                    data: {
                        email: $("#email").val(),
                        password: $("#password").val()
                    },
                    beforeSend: function(){
                        $("#btn_sign_in").prop("disabled", true);
                    },
                    success: function(result){
                        $("#sign_in_result").html(result);
                    },
                    error: function(){
                        $("#btn_sign_in").prop("disabled", false);
                    }
                });
            });
        });
    </script>
</body>
</html>


