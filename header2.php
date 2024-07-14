<?php
session_start();
extract($_SESSION);
extract($_POST);
extract($_GET);
include 'config/connection.php';

if (isset($_SESSION['appid'])) {
  // Get User Detail
  $query = $dBASE->query("SELECT * FROM applicants WHERE appid='$appid'");
  $row = $query->fetch_array();
//   Get app detail
//   $app_query = $dBASE->query("SELECT * FROM applicant_info WHERE app_id='$appid'");
//   $app_row = $app_query->fetch_array();

}else{
  header("Location: index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <title>Federal University Dutsinma Transcript Processing System</title>
    <link rel="icon" type="image/png"  href="img/fudma_seal.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="QVLz2OyOFnao3cpU9kvorOhlfzHKWpFUnrSfXyez" />

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,500,700' rel='stylesheet' type='text/css'>
    <link media="all" type="text/css" rel="stylesheet" href="assets/libs/bootstrap/css/bootstrap.min.css">

    <link media="all" type="text/css" rel="stylesheet" href="assets/libs/bootstrap-toggle/css/bootstrap-toggle.min.css">

    <link media="all" type="text/css" rel="stylesheet" href="assets/libs/font-awesome/css/font-awesome.min.css">

    <link media="all" type="text/css" rel="stylesheet" href="assets/libs/alertify/css/alertify.css">

    <link media="all" type="text/css" rel="stylesheet" href="assets/libs/alertify/css/alertify-bootstrap-3.css">

    <link media="all" type="text/css" rel="stylesheet" href="assets/libs/bootstrap-select/css/bootstrap-select.min.css">


    
        <link media="all" type="text/css" rel="stylesheet" href="assets/libs/data-table/datatables.min.css">

    <link media="all" type="text/css" rel="stylesheet" href="assets/libs/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css">


    
    <link media="all" type="text/css" rel="stylesheet" href="assets/css/style2.css">

    <link media="all" type="text/css" rel="stylesheet" href="assets/css/admin.css">

    <link media="all" type="text/css" rel="stylesheet" href="assets/css/responsive.css">

    <link media="all" type="text/css" rel="stylesheet" href="assets/libs/bootstrap3-wysihtml5-bower/bootstrap3-wysihtml5.min.css">





</head>



<body class="has-left-bar has-top-bar">

<nav id="left-nav" class="left-nav-bar">
    <div class="nav-top-sec">
        <div class="app-logo">
            <h3>TPS</h3>
        </div>

        <a href="#" id="bar-setting" class="bar-setting"><i class="fa fa-bars"></i></a>
    </div>
    <div class="nav-bottom-sec">
        <ul class="left-navigation" id="left-navigation">

                        <li ><a href="dashboard.php"><span class="menu-text">Dashboard</span> <span class="menu-thumb"><i class="fa fa-dashboard"></i></span></a></li>



  
                                   <li ><a href="TranscriptRequestList.php"><span class="menu-text">Request Transcript</span> <span class="menu-thumb"><i class="fa fa-male"></i></span></a></li>
            

                                    <li ><a href="TranscriptRequestHistory.php"><span class="menu-text">Request History</span> <span class="menu-thumb"><i class="fa fa-list"></i></span></a></li>
            



 
              
             
     
     
             


    
    
            

                        <li ><a href="MakePayment.php"><span class="menu-text">Payment History</span> <span class="menu-thumb"><i class="fa fa-credit-card"></i></span></a></li>
                                 

            <li>
                <a href="Settings.php"><span class="menu-text">Settings</span> <span class="arrow"></span><span class="menu-thumb"><i class="fa fa-cogs"></i></span></a>
               
            </li>
            


        </ul>
    </div>
</nav>

<main id="wrapper" class="wrapper">

    <div class="top-bar clearfix">
      
 

        <div class="navbar-right">

            <div class="clearfix">


                <div class="dropdown user-profile pull-right">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        <span class="user-info"><?php echo $row['fullname'];?></span>

                                                    <img class="user-image" src="img/fudma_seal.png" alt="Passport picture">
                        
                    </a>
                    <ul class="dropdown-menu arrow right-arrow" role="menu">

                        <li class="bg-dark">
                            <a href="logout.php" class="clearfix">
                                <span class="pull-left">Logout</span>
                                <span class="pull-right"><i class="fa fa-power-off"></i></span>
                            </a>
                        </li>
                    </ul>
                </div>



               



            </div>

        </div>
    </div>
