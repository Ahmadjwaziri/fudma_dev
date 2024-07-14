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
        <li>Click on <strong>Validate</strong> to verify your identity and create account</li>
        <li>Input your Matriculation Number for UG,PG OR SCE</li>
        <li>For Undergraduate use this format  SCI/2012/XXXX</li>
        <li>For Undergraduate use this format  PG8/PSC/2024/XXXX</li>
        <li>For School of Continuing Education use this format  CEC/EDU/2021/XXXX or SCE/EDU/2021/XXXX</li>
        <li>Check your email or Phone Number for OTP</li>
        <li>Follow the instruction in your email</li>
        <li>Choose your account password</li>
        <li>If the steps above are successful, you will be logged in</li>
    </ul>

    <p><strong>NOTE:</strong></p>
    <ul>
        <li>All payments for Transcript processing must be processed only through this portal</li>
        <li>If you are return applicant here, just click the "Already Applied" link below to login</li>
    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="container-left">
                    <div class="flip">
                        <div class="card"> 
                            <div class="face front"> 
                                <div class="panel panel-default">
                                      <!-- 
                                  a form check on api call request   
                                  -->
                                 <form method="post" action="">
                                 <input class="form-control" placeholder="Matric Number" name="matric_no" id="matric_no" type="text" autocomplete="on" required="true" />
                                <button class="btn btn-primary btn-block" type="submit" name="submit" >Validate</button>
    </form> 
    <?php
if (isset($_POST['submit'])) {
    
    $matricno = $_POST['matric_no'];
    // Assuming $matricno is your variable containing the matriculation number
    
    //here is to determine the alumni is Graduate (UG), Postgraduate (PG) or School of Continuining Education (SCE)
    // Check if $matricno starts with "SCE/" or "CEC/"
    if (strpos($matricno, "SCE/") === 0 || strpos($matricno, "CEC/") === 0) {
        $apiUrl = 'https://api.fudutsinma.edu.ng/v4/';
        $school = 'SCE';
    } 
    // Check if $matricno starts with "PG8/"
    elseif (strpos($matricno, "PG8/") === 0 || strpos($matricno,"PG7/") === 0 || strpos($matricno,"PG9/")===0) {
        $apiUrl = 'https://api.fudutsinma.edu.ng/v6/';
        $school = 'PGS';
    } 
    // If it doesn't match any of the above conditions
    else {
        $apiUrl = 'https://api.fudutsinma.edu.ng/v2/';
        $school = 'UG';
    }
    
   // echo $apiurl; // Output the value of $apiurl
   
    

    // Set the API endpoint URL
   // $apiUrl = 'https://api.fudutsinma.edu.ng/v3/';

    // Set the parameters (matric_no or jamb_no)
    $params = [
        'matric_no' => isset($_POST['matric_no']) ? $_POST['matric_no'] : '',
        'jamb_no' => isset($_POST['jamb_no']) ? $_POST['jamb_no'] : '',
    ];

    // Build the full URL with the query string
    $fullUrl = $apiUrl . '?' . http_build_query($params);

    // Initialize cURL session
    $ch = curl_init($fullUrl);

    // Set cURL options
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Execute cURL session and get the response
    $response = curl_exec($ch);

    // Check for cURL errors
    if (curl_errno($ch)) {
        echo '<p>cURL error: ' . curl_error($ch) . '</p>';
    } else {
        // Check HTTP status code
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if ($httpCode >= 200 && $httpCode < 300) {
            // Success: Output the response
            $responseData = json_decode($response, true);

            // Output each column in input fields
            if ($responseData['status'] == 200) {
                $studentData = $responseData['data'];

               
           
?>


                                    <form class="form-horizontal" name="sign_in_form" id="sign_in_form" >
               

                                        <h1 class="text-center"><img  src="img/fudma.png" width="100"></h1>
                                        <center><h4>TPS Portal</h4></center>
                                        <center> <?php if (isset($_SESSION['response'])) {
                            echo $_SESSION['response'];
                        } ?></center>
                        
                                        <br>
                               
                        
                        <input class="form-control" type="text" name="fullname1" class="disabled" disabled value="<?php echo $studentData['FullName']; ?>" required style="width: 100%;">
                                                <input type="hidden" name="fullname" id="fullname" class="form-control"  value="<?php echo $studentData['FullName']; ?>" required>
                                                <input type="hidden" name="matricno" id="matricno" class="form-control"  value="<?php echo $studentData['matric_number']; ?>" required>
                                                <input type="hidden" name="dept" id="dept" class="form-control"  value="<?php echo $studentData['departmentName']; ?>" required>
                                                <input type="hidden" name="program" id="program" class="form-control"  value="<?php echo $studentData['DegreeName']; ?>" required>
                                                <input type="hidden" name="deptid" id="deptid" class="form-control"  value="<?php echo $studentData['departmentID']; ?>" required>
                                                <input type="hidden" name="school" id="school" class="form-control"  value="<?php echo $school; ?>" required>
                        
                                       <input class="form-control" placeholder="Email" id="email" name="email" type="email" autocomplete="on" required="true" />
                                       <input class="form-control" placeholder="Phone" id="phone" name="phone" type="text" autocomplete="on" required="true" />
                                       

                        
                                       <input class="form-control" placeholder="Password" id="password" name="password" type="password" required="true" />
                             <p id="sign_in_result"><button class="btn btn-primary btn-block" id="btn_sign_in">CREATE ACCOUNT</button></p>
                        
                        <div id="haqq"></div>
                        
                                        <hr>
                        
                        
                                        <center><a href="index">Already Applied?</a></center>
                                      </form>
                        
                                </div>
                                <?php
} else {
                
                // Output error message
                echo '<p>Error: ' . $responseData['message'] . '</p>';
            }
        } else {
            // HTTP error: Output error message
            if (isset($responseData) && is_array($responseData) && isset($responseData['message'])) {
                echo '<p style="text-align: center; color: red;"> ' . $responseData['message'] . '</p>';
            } else {
                echo '<p style="text-align: center; color: red;"> Validation Failed, No record found </p>';
            }
        }
    }

    // Close cURL session
    curl_close($ch);
}
?>
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
                    <p>&copy; 2024 Federal University Dutsinma. All rights reserved.</p>
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
          $("#fullanme").prop('disabled', true);
          $("#progam").prop('disabled', true);
          $("#dept").prop('disabled', true);
          $("#deptid").prop('disabled', true);
          $("#matricno").prop('disabled', true);
          $("#phone").prop('disabled', true);
          $("#school").prop('disabled', true);
         
          

          $("#btn_sign_in").prop("disabled", true);
          $("#btn_sign_in").html("");
          $("#btn_sign_in").blur();
          $("#btn_sign_in").removeClass("btn-primary");
          $("#haqq").addClass("ajax_loader")

          $.ajax({
            url: "doregister.php",
            type: "POST",
            data: {
              email: $("#email").val(),
              password: $("#password").val(),
              fullname: $("#fullname").val(),
              program: $("#program").val(),
              dept: $("#dept").val(),
              deptid: $("#deptid").val(),
              matricno: $("#matricno").val(),
              phone: $("#phone").val(),
              school: $("#school").val()
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


