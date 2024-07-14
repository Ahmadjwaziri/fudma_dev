<?php include 'header2.php';
extract($_GET);
$query = $dBASE->query("SELECT * FROM students WHERE studentid='$id'");
$row = $query->fetch_array();

?>

  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

            <link media="all" type="text/css" rel="stylesheet" href="assets/libs/data-table/datatables.min.css">

    
    <section class="wrapper-bottom-sec">
        <div class="p-30">
            <h2 class="page-title">Student Profile</h2>
        </div>
        <div class="p-30 p-t-none p-b-none">
                        <div class="row">


  <center>  <?php if (isset($_SESSION['response'])) {
                            echo $_SESSION['response'];
                        }?></center>
                <div class="col-lg-12">

<?php 
if($row['payment_status'] == "NONE"){
    ?>
<a href="process?approve_payment_students=<?php echo $id;?>" type="button" class="btn btn-info btn-lg">Approve Payment</a>
<?php } ?>


 <a href="https://portal.mis-jsiit.net/process?auto_login2=<?php echo $id;?>" type="button" class="btn btn-info btn-lg" target="_blank">Login to Student Portal</a>
 <a href="process?change_pass=<?php echo $id;?>" type="button" class="btn btn-info btn-lg" target="_blank">Change Student Password</a>
 
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

                         <div id="preview"><img width="150" class="img-thumbnail" src="https://portal.mis-jsiit.net/<?php echo $row['pic'];?>" /></div>
                         <br>

                       

                        
                         <HR/>


                         <div class="col-8">
                         	<!--  -->


                         <!-- <form id="app_form" name="app_form" action="process" method="POST">
                          -->		<label for="firstname">First Name</label>
                         		<input type="text" name="firstname" id="firstname" class="form-control" required="true" value="<?php echo $row['firstname'];?>" disabled>

                         		<label for="surname">Surname</label>
                         		<input type="text" name="surname" id="surname" class="form-control" required="true" value="<?php echo $row['surname'];?>" disabled>

                         	
                         		<label for="address">Gedner</label>
                         		<input type="text" name="address" id="address" class="form-control" required="true" value="<?php echo $row['gender'];?>" disabled>

                         		<label for="email">Email</label>
                         		<input type="text" name="email" id="email" value="<?php echo $row['email'];?>" class="form-control" required="true" disabled>

                         		<label for="phone">Phone</label>
                         		<input type="text" name="phone" id="phone" class="form-control" required="true" value="<?php echo $row['phone'];?>" disabled>

                         		<label for="dob">Date of Birth</label>
                         		<div id="blog-overview-date-range" class="input-daterange input-group input-group-sm my-auto ml-auto mr-auto ml-sm-auto mr-sm-0">
                         		<input type="text" name="dob" id="dob" class="input-sm form-control" required="true" value="<?php echo $row['dob'];?>" disabled>
                         </div>

                         	

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


                            <label for="religion">Program</label>
                            <input type="text" name="surname" id="surname" class="form-control" required="true" value="<?php echo $row['program'];?>" disabled>

                            <label for="religion">Course</label>
                            <input type="text" name="surname" id="surname" class="form-control" required="true" value="<?php echo $row['course'];?>" disabled>

                         


    <br/>
    <br/>
    <br/>
                       
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