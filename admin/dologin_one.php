<?php
session_start();
extract($_POST);
extract($_GET);
    include 'config/connection.php';
    $pass = md5($password);
    $query = $dBASE->query("SELECT * FROM admin where username='$username' And password='$pass'")or die($dBASE->error);

    if($query->num_rows > 0){
        ?><button class="btn btn-default btn-block" id="btn_sign_in"><span class="fa fa-spinner"></span> Verify Please wait...</button><?php 
        $row = $query->fetch_assoc();
        $_SESSION["username"] = $row["username"];
        $_SESSION["role"] = $row["role"];
        ?>
        <script src="build/js/jquery.min.js"></script>
            <script>
                $(document).ready(function(){
                    $("#btn_sign_in").prop("disabled", true);
                    $("#username").prop("disabled", true);
                    $("#password").prop("disabled", true);
                    
                    var setInteva = setTimeout(function(){
                            $("#btn_sign_in").html("Rolling Back Please wait...");
                            $("#btn_sign_in").addClass("#h");
                            $("#btn_sign_in").removeClass("btn-default");
                    }, 5000);
                    var setInteral = setTimeout(function(){
    location = "dashboard";
    }, 5000);
                })
            </script>
        <?php
    }else{
        ?><button class="btn btn-danger btn-block" id="btn_sign_in">Invalid sign-in credentials</button><?php
        ?>
            <script>
                $(document).ready(function(){
                    $("#btn_sign_in").prop("disabled", true);
                    $("#username").prop("disabled", true);
                    $("#password").prop("disabled", true);
              
                    var SetInterval = setTimeout(function(){
                        $("#btn_sign_in").html("Rolling back Please wait...");
                        $("#btn_sign_int").addClass("ajax_loader");
                        $("#btn_sign_in").removeClass("btn-danger");
                    }, 3000);
                    var setnterval = setTimeout(function(){
                        $("#btn_sign_in").prop("disabled", false);
                        $("#username").prop("disabled", false);
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

