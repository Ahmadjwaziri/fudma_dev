<?php include 'header2.php';
extract($_GET);
$query = $dBASE->query("SELECT * FROM applicants INNER JOIN applicant_info ON applicants.appid=applicant_info.app_id INNER JOIN applicant_nkin ON applicants.appid=applicant_nkin.app_id where appid='$id'");
$row = $query->fetch_array();

?>

  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

            <link media="all" type="text/css" rel="stylesheet" href="assets/libs/data-table/datatables.min.css">

    
    <section class="wrapper-bottom-sec">
        <div class="p-30">
            <h2 class="page-title">Applicants</h2>
        </div>
        <div class="p-30 p-t-none p-b-none">
                        <div class="row">


  <center>  <?php if (isset($_SESSION['response'])) {
                            echo $_SESSION['response'];
                        }?></center>
                <div class="col-lg-12">

<?php 
if($row['payment_status'] == "UNPAID"){
    ?>
<a href="process?approve_payment=<?php echo $id;?>" type="button" class="btn btn-info btn-lg">Approve Payment</a>
<?php } ?>


   <?php
  $queryy = $dBASE->query("SELECT * FROM applicant_admission where app_id='$id' And status='ADMITTED'");
                         if ($queryy->num_rows > 0) {
                
                         	?>

<?php
  $queryyy = $dBASE->query("SELECT * FROM students where app_id='$id'");
if ($queryyy->num_rows > 0) {
                
                         	?>
   <a href="https://portal.mis-jsiit.net/process?auto_login=<?php echo $id;?>" type="button" class="btn btn-info btn-lg" target="_blank">Login to Student Portal</a>
   
   
   <?php }else{ ?>
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Create Portal Account</button>
   
   
   <?php } ?>
   <?php } ?>
 <br>                    <br/>
                    <div class="panel">
                        <div class="panel-heading">
                            <!--<h3 class="panel-title">Olevel</h3>-->
                        </div>
                        <div class="panel-body p-none">
   <div class="container">                      
          <div class="row">
          <div class="col-lg-11">
          
          
         
<div class="panel-body p-none">
                
                <div class="container-fluid">
               <h3 class="text-dark mb-4">Applicant View</h3>
               <div class="card shadow">
                   <div class="card-header py-3">
                       <p class="text-primary m-0 font-weight-bold"><?php echo $row['fullname'];?> - <?php echo $id;?></p>
                   </div>
                   <div class="card-body">
                       <div class="row">

                         <div class="col-3">

                         <div id="preview"><img width="150" class="img-thumbnail" src="https://app.mis-jsiit.net/<?php echo $row['pic'];?>" /></div>

                         <br>

                         <!--<a href="docs-upload?id=<?php echo $id;?>" target="_blank">View Docs</a><hr>-->
                         <!-- <a href="school-attended?id=<?php echo $id;?>" target="_blank">Academic History</a> -->
                         <!-- <a href="#" onClick="MyWindow=window.open('school-attended?id=<?php echo $id;?>','MyWindow',width=1600,height=300); return false;">Click Here</a> -->


                         <br>
                         <hr>
                         <?php
                         // echo $year = date("y");

                         $queryy = $dBASE->query("SELECT * FROM applicant_admission where app_id='$id' And status='ADMITTED'");
                         if ($queryy->num_rows > 0) {
                         	echo "<center>ADMITTED</center>";


                         	?>
                         <form action="process" method="POST">
                         <input type="hidden" name="appid" value="<?php echo $row['appid'];?>">
                         <button name="revoke" class="btn btn-danger">Revoke Admission</button>
                         </form>

                         	<?php
                         }else{

                         ?>
                         	<form action="process" method="POST">

                         		<input type="hidden" name="appid" value="<?php echo $row['appid'];?>">
                         	

                         		<br>	<br>
                         		<button name="addmit" class="btn btn-info">Admit Applicant</button>
                         	</form>
                         <?php } ?>
                         
                         
                         <hr>
                         <a href="process?unsubmit=<?php echo $row['appid'];?>" class="btn btn-danger">Un-submit Application</a>
                         </div>

<BR/>
<BR/>

                        <h5>Change Programme</h5>

                        <form action="process" method="POST">
                         <input type="hidden" name="appid" value="<?php echo $id;?>">
                         
                           <select class="form-control" name="pprogram">
                               <option><?php echo $row['program'];?></option>
             <option value="NATIONAL">NATIONAL DIPLOMA</option>
             <option value="INTERNATIONAL">INTERNATIONAL</option>
             <option value="PROFESSIONAL">PROFESSIONAL</option>
             
                         </select>
                         <BR/>

                         <button name="change-programme" class="btn btn-info">Change Programme</button>
                         </form>
                         <HR/>


                         <div class="col-8">
                         	<!--  -->


                         <!-- <form id="app_form" name="app_form" action="process" method="POST">
                          -->		<label for="firstname">First Name</label>
                         		<input type="text" name="firstname" id="firstname" class="form-control" required="true" value="<?php echo $row['firstname'];?>" disabled>

                         		<label for="surname">Surname</label>
                         		<input type="text" name="surname" id="surname" class="form-control" required="true" value="<?php echo $row['surname'];?>" disabled>

                         		<label for="othersname">Others Name</label>
                         		<input type="text" name="othersname" id="othersname" class="form-control" value="<?php echo $row['middlename'];?>" disabled>

                         		<label for="address">Present Address</label>
                         		<input type="text" name="address" id="address" class="form-control" required="true" value="<?php echo $row['p_address'];?>" disabled>

                         		<label for="email">Email</label>
                         		<input type="text" name="email" id="email" value="<?php echo $row['email'];?>" class="form-control" required="true" disabled>

                         		<label for="phone">Phone</label>
                         		<input type="text" name="phone" id="phone" class="form-control" required="true" value="<?php echo $row['phone'];?>" disabled>

                         		<label for="dob">Date of Birth</label>
                         		<div id="blog-overview-date-range" class="input-daterange input-group input-group-sm my-auto ml-auto mr-auto ml-sm-auto mr-sm-0">
                         		<input type="text" name="dob" id="dob" class="input-sm form-control" required="true" value="<?php echo $row['dob'];?>" disabled>
                         </div>

                         		<label for="gender">Gender</label>
                         		<select class="custom-select custom-select-sm" name="gender" required="true" disabled>
                         			<option><?php echo $row['gender'];?></option>
                         			<option value="MALE">MALE</option>
                         			<option value="FEMALE">FEMALE</option>
                         			<option value="OTHERS">OTHERS</option>
                         		</select>
                         		<label for="mstatus">Marital Status</label>
                         		<select class="custom-select custom-select-sm" name="mstatus" required="true" disabled>
                         			<option><?php echo $row['mstatus'];?></option>
                         			<option value="SINGLE">SINGLE</option>
                         			<option value="MARRIED">MARRIED</option>
                         			<option value="DIVORCE">DIVORCE</option>
                         		</select>

                         <label for="nationality">Nationality</label>
                         		<select class="custom-select custom-select-sm" name="nationality" required="true" disabled>
                         			<option><?php echo $row['nationality'];?></option>
                         			<option value="NIGERIA">NIGERIA</option>
                         		</select>

                         <label for="state">State</label>
                         		<select class="custom-select custom-select-sm" name="state" required="true" disabled>
                         			<option><?php echo $row['state'];?></option>
                         			<option value="BAUCHI">BAUCHI</option>
                         			<option value="KANO">KANO</option>
                         		</select>


                         <label for="lga">LGA</label>
                         		<select class="form-control" name="lga" required="true" disabled>
                         			<option><?php echo $row['lga'];?></option>
                         			<option value="Bichi">Bichi</option>
                         		</select>


                            <label for="surname">Language Spoken</label>
                            <input type="text" name="surname" id="surname" class="form-control" required="true" value="<?php echo $row['language'];?>" disabled>

                            <label for="surname">Blood Group</label>
                            <input type="text" name="surname" id="surname" class="form-control" required="true" value="<?php echo $row['blood'];?>" disabled>


                            <label for="religion">Religion</label>
                            <input type="text" name="surname" id="surname" class="form-control" required="true" value="<?php echo $row['religion'];?>" disabled>

                            <label for="religion">Profession</label>
                            <input type="text" name="surname" id="surname" class="form-control" required="true" value="<?php echo $row['profession'];?>" disabled>

                            <label for="religion">Qualification</label>
                            <input type="text" name="surname" id="surname" class="form-control" required="true" value="<?php echo $row['qualification'];?>" disabled>


<hr>

<h3>Sponsorship</h3>
                            <label for="religion">Sponsor Type</label>
                            <input type="text" name="surname" id="surname" class="form-control" required="true" value="<?php echo $row['sponsortype'];?>" disabled>

                            <label for="religion">Sponsor Name</label>
                            <input type="text" name="surname" id="surname" class="form-control" required="true" value="<?php echo $row['sponsorname'];?>" disabled>

                            <label for="religion">Sponsor Address</label>
                            <input type="text" name="surname" id="surname" class="form-control" required="true" value="<?php echo $row['sponsoraddress'];?>" disabled>


                         <hr>
                         <h3>Next of Kin Info</h3>
                         		<label for="nkin_name">Father's Name</label>
                         		<input type="text" name="nkin_name" id="nkin_name" class="form-control" required="true" value="<?php echo $row['fathername'];?>" disabled>

                         		<label for="nkin_phone">Father's Phone</label>
                         		<input type="text" name="nkin_phone" id="nkin_phone" class="form-control" required="true" value="<?php echo $row['fatherphone'];?>" disabled>

                            <label for="nkin_name">Mothers's Name</label>
                            <input type="text" name="nkin_name" id="nkin_name" class="form-control" required="true" value="<?php echo $row['mothername'];?>" disabled>

                            <label for="nkin_phone">Mothers's Phone</label>
                            <input type="text" name="nkin_phone" id="nkin_phone" class="form-control" required="true" value="<?php echo $row['motherphone'];?>" disabled>


                            <hr>
                            <h3>Referee Info</h3>

                         		<label for="nkin_address">Referee Name</label>
                         		<input type="text" name="nkin_address" id="nkin_address" class="form-control" required="true" value="<?php echo $row['refereename'];?>" disabled>

                         		<label for="nkin_relation">Referee Phone</label>
                         		<input type="text" name="nkin_relation" id="nkin_relation" class="form-control" required="true" value="<?php echo $row['refphone'];?>" disabled>
                         		<label for="nkin_relation">Referee Address</label>
                         		<input type="text" name="nkin_relation" id="nkin_relation" class="form-control" required="true" value="<?php echo $row['refaddress'];?>" disabled>
                         		<label for="nkin_relation">Relation</label>
                         		<input type="text" name="nkin_relation" id="nkin_relation" class="form-control" required="true" value="<?php echo $row['relation'];?>" disabled>

                         <br>


                         </div>
                         </div></div>
                
                
                        </div>
       
                      
    <h3>Uploaded Documents</h3>
         <table class="table">

                           <tr>
                             <td>DESCRIPTION</td>
                             <td>ACTIONS</td>
                           </tr>

                           <?php



                             $query2 = $dBASE->query("SELECT * FROM applicant_uploads where app_id='$id'");
                         while ($file =  $query2->fetch_assoc()) {
                           echo '
                         <tr>
                         <td>'.$file['type'].'</td>
                         <td><a href="https://app.mis-jsiit.net/docs/'.$file['url'].'" class="btn btn-info" target="b_lank">View</a>
                     
                         </td>

                         </tr>
                           ';
                         }
                         ?>


                         </table>
    
                       
                        </div></div>
                    </div>
                </div>
</div>
                </div>





            
             <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
       <form class="" role="form" method="post" action="process.php" enctype="multipart/form-data"> 
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Create Portal Account</h4>
        </div>
        <div class="modal-body">



          <div class="form-group">
      <label>Matric Number</label>
        <input type="text" name="matricno" class="form-control">
                      <label>First Name</label>
                      <input type="text" name="firstname" value="<?php echo $row['firstname'];?>" class="form-control">
                      <label>Surname</label>
                      <input type="text" name="surname" value="<?php echo $row['surname'];?> <?php echo $row['middlename'];?>" class="form-control">
                        
                        <label>Gender</label>
                        <input type="text" name="gender" value="<?php echo $row['gender'];?>" class="form-control">
                      
                        <label>Date of Birth</label>
                        <input type="text" name="dob" value="<?php echo $row['dob'];?>" class="form-control">
                      
                      
                        <label>Nationality</label>
                        <input type="text" name="nationality" value="<?php echo $row['nationality'];?>" class="form-control">
                      
                        <label>State</label>
                        <input type="text" name="state" value="<?php echo $row['state'];?>" class="form-control">
                      
                        <label>LGA</label>
                        <input type="text" name="lga" value="<?php echo $row['lga'];?>" class="form-control">
                      
                        <label>Email Address</label>
                        <input type="text" name="email" value="<?php echo $row['email'];?>" class="form-control">
                      
                        <label>Phone Number</label>
                        <input type="text" name="phone" value="<?php echo $row['phone'];?>" class="form-control">
                      
                         <label>Programme</label>
                        <input type="text" name="pprogram" value="<?php echo $row['program'];?>" class="form-control" readonly>
                        
                        
                        
                         <label>Course</label>
                        <input type="text" name="ccourse" value="<?php echo $row['course'];?>" class="form-control" readonly>
                        
                        
                        
                         <label>Matric Year</label>
                        <input type="text" name="matricyear" value="<?php echo date("Y");?>" class="form-control" readonly>
                        
                    
                    <input type="hidden" name="appid" value="<?php echo $id;?>" class="form-control">
                        
                         <label>Level</label>
                        <input type="text" name="level" value="<?php echo $row['level'];?>" class="form-control">
                        <p>fomart ND1/ND2/HND1/HND2/IDITC/CIFS/FCHE/ADIC/ADNCS (without space)</p>
                        
                      <label>Password</label>
                      <input type="password" name="password" class="form-control">
                      
                     
                                </div>
          
        </div>
        <div class="modal-footer">
             <button type="submit" name="create_student" class="btn btn-success">Create Student</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      </form>
    </div>
  </div>


            </div>
            
            </section>

<?php include 'footer2.php';?>
 
 <script>
 
        $(document).ready(function(){
            $('.data-table').DataTable();
        });
    </script>

      <script>
        $(document).ready(function(){
            $('.data-table').DataTable();


            /*For Delete Designation*/
            $(".cdelete").click(function (e) {
                e.preventDefault();
                var id = this.id;
                bootbox.confirm("Are you sure?", function (result) {
                    if (result) {
                        // var _url = $("#_url").val();
                        window.location.href = "process.php?delete_food=" + id;
                    }
                });
            });

        });
    </script>
<?php echo $_SESSION['response'] = "";?>