<?php
session_start();
extract($_SESSION);
extract($_POST);
extract($_GET);
include 'config/connection.php';

if (isset($_SESSION['staffid'])) {
  // Get User Detail
  $query = $dBASE->query("SELECT * FROM staff WHERE staffid='$staffid'");
  $row = $query->fetch_array();
//   Get app detail

}else{
  header("Location: index");
}

?>
<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <title>JSIIT Kazaure</title>
    <link rel="icon" type="image/png"  href="img/logo.png" />
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
            <h3>JSIIT</h3>
        </div>

        <a href="#" id="bar-setting" class="bar-setting"><i class="fa fa-bars"></i></a>
    </div>
    <div class="nav-bottom-sec">
        <ul class="left-navigation" id="left-navigation">

                        <li ><a href="dashboard"><span class="menu-text">Dashboard</span> <span class="menu-thumb"><i class="fa fa-dashboard"></i></span></a></li>

<?php if($_SESSION['role'] == "ADMISSION"){?>
                        
<li ><a href="Applicants"><span class="menu-text">Applicants</span> <span class="menu-thumb"><i class="fa fa-list"></i></span></a></li>
            

<li ><a href="ApplicantSubmitted"><span class="menu-text">Submitted Applicants</span> <span class="menu-thumb"><i class="fa fa-list"></i></span></a></li>
            

<li ><a href="AdmittedApplicants"><span class="menu-text">Admitted Applicants</span> <span class="menu-thumb"><i class="fa fa-list"></i></span></a></li>
            

<?php }else if($_SESSION['role'] == "ADMIN"){?>
                        
<li ><a href="Users"><span class="menu-text">Manage Staffs</span> <span class="menu-thumb"><i class="fa fa-users"></i></span></a></li>
            
<?php }else if($_SESSION['role'] == "STUDENT"){?>



<li ><a href="Students"><span class="menu-text">Students</span> <span class="menu-thumb"><i class="fa fa-list"></i></span></a></li>
            

<?php  }else{ ?>

     
 <li ><a href="ApplicantBursary"><span class="menu-text">Applicants</span> <span class="menu-thumb"><i class="fa fa-credit-card"></i></span></a></li>
     

<li ><a href="Students"><span class="menu-text">Students</span> <span class="menu-thumb"><i class="fa fa-list"></i></span></a></li>
     
 <li ><a href="ApplicantBursaryPaid"><span class="menu-text">Paid Applicants</span> <span class="menu-thumb"><i class="fa fa-credit-card"></i></span></a></li>
 <li ><a href="PaymentSchedule"><span class="menu-text">Payment Schedule</span> <span class="menu-thumb"><i class="fa fa-credit-card"></i></span></a></li>
     
 <li ><a href="PaymentHistoryApplicants"><span class="menu-text">Payment History App</span> <span class="menu-thumb"><i class="fa fa-credit-card"></i></span></a></li>

 <li ><a href="PaymentHistoryStudents"><span class="menu-text">Payment History Students</span> <span class="menu-thumb"><i class="fa fa-credit-card"></i></span></a></li>

     <?php } ?>
            <li>
                <a href="Settings"><span class="menu-text">Settings</span> <span class="arrow"></span><span class="menu-thumb"><i class="fa fa-cogs"></i></span></a>
               
            </li>
            


        </ul>
    </div>
</nav>

<main id="wrapper" class="wrapper">

    <div class="top-bar clearfix">
      <!--<ul class="top-info-bar">-->
        <!--    <li class="dropdown bar-notification ">-->
        <!--        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-bed"></i></a>-->
        <!--        <ul class="dropdown-menu user-dropdown arrow" role="menu">-->
        <!--            <li class="title">Recent 5 Leave Applications</li>-->

                    
        <!--            <li class="footer"><a href="https://smslight.com.ng/hr/leave">See All Applications</a></li>-->
        <!--        </ul>-->
        <!--    </li>-->

        <!--    <li class="dropdown bar-notification ">-->
        <!--        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-cloud-download"></i></a>-->
        <!--        <ul class="dropdown-menu arrow" role="menu">-->
        <!--            <li class="title">Recent 5 Pending Tasks</li>-->

                    
        <!--            <li class="footer"><a href="https://smslight.com.ng/hr/task">See All Tasks</a></li>-->
        <!--        </ul>-->
        <!--    </li>-->

        <!--    <li class="dropdown bar-notification ">-->
        <!--        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-envelope"></i></a>-->
        <!--        <ul class="dropdown-menu arrow message-dropdown" role="menu">-->
        <!--            <li class="title">Recent 5 Pending Tickets</li>-->
                    
        <!--            <li class="footer"><a href="https://smslight.com.ng/hr/support-tickets/all">See All Tickets</a></li>-->
        <!--        </ul>-->
        <!--    </li>-->
        <!--</ul>-->
 

        <div class="navbar-right">

            <div class="clearfix">


                <div class="dropdown user-profile pull-right">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        <span class="user-info"><?php echo $row['fullname'];?></span>

                                                    <img class="user-image" src="img/logo.png" alt="<?php echo $row['fullname'];?> ">
                        
                    </a>
                    <ul class="dropdown-menu arrow right-arrow" role="menu">
<!--                         <li><a href="edit-profile"><i class="fa fa-edit"></i>Update Profile</a></li>
                        <li><a href="change-password.php"><i class="fa fa-lock"></i>Change Password</a></li> -->
                        <li class="bg-dark">
                            <a href="logout" class="clearfix">
                                <span class="pull-left">Logout</span>
                                <span class="pull-right"><i class="fa fa-power-off"></i></span>
                            </a>
                        </li>
                    </ul>
                </div>



                <!-- 
                <div class="top-info-bar m-r-10">

                    <div class="dropdown pull-right bar-notification">
                        <a href="#" class="dropdown-toggle text-success" data-toggle="dropdown" role="button" aria-expanded="false">
                            <img src="assets/country_flag/us.gif" alt="Language">
                        </a>
                        <ul class="dropdown-menu lang-dropdown arrow right-arrow" role="menu">
                                                            <li>
                                    <a href="language/change/1"  class="text-complete" >
                                        <img class="user-thumb" src="assets/country_flag/us.gif" alt="user thumb">
                                        <div class="user-name">English</div>
                                    </a>
                                </li>
                                                    </ul>
                    </div>
                </div> -->



            </div>

        </div>
    </div>
