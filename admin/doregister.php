<?php
   session_start();
   extract($_POST);
extract($_GET);
 include 'config/connection.php';
    $pass = md5($password);
    $query1 = $dBASE->query("SELECT * FROM `applicants` WHERE `email` = '$email' ") or die($dBASE->error);

   if($query1->num_rows > 0){
        ?><button class="btn btn-danger btn-block" id="btn_sign_up">This email has already been used</button><?php
        ?>
            <script>
                $(document).ready(function(){
              
                    $("#btn_sign_up").prop("disabled", true);
                    $("#email").prop("disabled", true);
                    $("#fullname").prop("disabled", true);
                    $("#password").prop("disabled", true);
                   
                    var SetInerval = setTimeout(function(){
                        $("#btn_sign_in").html("Rolling Back Please wait...");
                            $("#btn_sign_in").addClass("#h");
                            $("#btn_sign_in").removeClass("btn-default");
                    }, 3000);
                    var setInterl = setTimeout(function(){
                      /*$("#pin_sign_up").prop("disabled", false);*/
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
    }else{
        
        $appid = "JSIITAPP".rand(0000,9999)."";
           $query4 = $dBASE->query("INSERT INTO applicants
            (
                `appid`,
                `fullname`,
                `email`,
                `program`,
                `password`
            )
            VALUES
            (
                '$appid',
                '$fullname',
                '$email',
                '$program',
                '$pass'
            );

            ") or die($dBASE->error);

            $queryy = $dBASE->query("INSERT INTO applicant_info (app_id)  VALUES('$appid')");
           
           $queryyy = $dBASE->query("INSERT INTO olevel (app_id)  VALUES('$appid')");

           $queryyy = $dBASE->query("INSERT INTO applicant_nkin (app_id)  VALUES('$appid')");

           $queryyy = $dBASE->query("INSERT INTO applicant_admission (app_id)  VALUES('$appid')");

        if(!$query4){}else{

                ?><button class="btn btn-success btn-block" id="btn_sign_up">Account successfully created</button><?php
                ?>
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
                            location = "index";
                        },5000);
                    </script>
                <?php
                
            
        }
    }
?>