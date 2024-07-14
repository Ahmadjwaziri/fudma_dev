<?php include 'header2.php';
$app_query = $dBASE->query("SELECT * FROM applicant_info where app_id='$appid'");
$app_row = $app_query->fetch_array();
?>

  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

  
  <!--<script src="jquery-1.11.0.min.js" type="text/javascript"></script>-->

  <!--<script type="text/javascript" src="Dynamic_State_LGA.js"></script>-->

            <link media="all" type="text/css" rel="stylesheet" href="assets/libs/data-table/datatables.min.css">

    
    <section class="wrapper-bottom-sec">
        <div class="p-30">
            <h2 class="page-title">PERSONAL INFO</h2>
        </div>
        <div class="p-30 p-t-none p-b-none">
                        <div class="row">


  <center>  <?php if (isset($_SESSION['response'])) {
                            echo $_SESSION['response'];
                        }?></center>
                <div class="col-lg-12">

 <!--<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Update Passport</button>-->
 <br>
                    <div class="panel">
                        <div class="panel-heading">
                            <!--<h3 class="panel-title">Application Form</h3>-->
                        </div>
                        <div class="panel-body p-none">
   <div class="container">                      
                    <form action="process.php" method="POST">

                         <div class="row">
                             <div class="col-lg-4">
                                  <div class="form-group">
                                     <label>First Name</label>
                                     <input type="text" name="firstname" class="form-control" value="<?php echo $app_row['firstname'];?>" required>
                                 </div>
                             </div>
                             
                              <div class="col-lg-4">
                                 
                                  <div class="form-group">
                                     <label>Surname</label>
                                     <input type="text" name="surname" class="form-control" value="<?php echo $app_row['surname'];?>" required>
                                 </div>
                             </div>
                         </div>   
                         
                         
                                 <div class="row">
                             <div class="col-lg-4">
                                  <div class="form-group">
                                     <label>Middle Name</label>
                                     <input type="text" name="middlename" class="form-control" value="<?php echo $app_row['middlename'];?>">
                                 </div>
                             </div>
                             
                              <div class="col-lg-4">
                                 
                                  <div class="form-group">
                                     <label>Gender</label>
                    <select class="form-control selectpicker" data-live-search="true" name="gender">
                                           <option><?php echo $app_row['gender'];?></option>
                                           <option value="MALE">MALE</option>
                                           <option value="FEMALE">FEMALE</option>
                                                                            </select>
                                 </div>
                             </div>
                         </div>   
                         
                         
                         
                         
                             <div class="row">
                             <div class="col-lg-4">
                                  <div class="form-group">
                                     <label>Date of Birth</label>
                                     <input type="date" name="dob" class="form-control" value="<?php echo $app_row['dob'];?>" required>
                                 </div>
                             </div>
                             
                              <div class="col-lg-4">
                                                                      <label>Marital Status</label>

                                  <div class="form-group">
                                      <select class="form-control selectpicker" data-live-search="true" name="mstatus">
                                           <option><?php echo $app_row['mstatus'];?></option>
                                           <option value="SINGLE">SINGLE</option>
                                           <option value="MARRIED">MARRIED</option>
                                           <option value="DIVORCED">DIVORCED</option>
                                           <option value="WIDOW">WIDOW</option>
                                                                            </select>
                                      
                                  
                                 </div>
                             </div>
                         </div>   
                         
                         
                         
                         
                             <div class="row">
                             <div class="col-lg-4">
                                  <div class="form-group">
                                     <label>Blood Group</label>
                                       <select class="form-control selectpicker" data-live-search="true" name="blood">
                                           <option><?php echo $app_row['blood'];?></option>
                                           <option value="A">A</option>
                                           <option value="A+">A+</option>
                                           <option value="B">B</option>
                                           <option value="B+">B+</option>
                                           <option value="O+">O+</option>                   </select>
                                      
                                 </div>
                             </div>
                             
                              <div class="col-lg-4">
                                                                      <label>Profession</label>

                                  <div class="form-group">
                                      <select class="form-control selectpicker" data-live-search="true" name="profession">
                                           <option><?php echo $app_row['profession'];?></option>
                                           <option value="Student">Student</option>
                                           <option value="Business">Business</option>
                                           <option value="Civil Servant">Civil Servant</option>
               </select>
                                      
                                  
                                 </div>
                             </div>
                         </div>   
                         
                         
                             <div class="row">
                             <div class="col-lg-4">
                                  <div class="form-group">
                                     <label>Email Address</label>
                                     <input type="text" name="email" class="form-control" value="<?php echo $app_row['email'];?>" required>
                                 </div>
                             </div>
                             
                              <div class="col-lg-4">
                                 
                                  <div class="form-group">
                                          
                                     <label>Phone Number</label>
                                     <input type="text" name="phone" class="form-control" value="<?php echo $app_row['phone'];?>" required>
                                     
                                     
                                 </div>
                             </div>
                         </div>   
                         
                         
                         
                             <div class="row">
                             <div class="col-lg-4">
                                  <div class="form-group">
                                     <label>Present Address</label>
                                     <input type="text" name="p_address" class="form-control" value="<?php echo $app_row['p_address'];?>" required>
                                 </div>
                             </div>
                             
                              <div class="col-lg-4">
                                 
                                  <div class="form-group">
                                     <label>Current Address</label>
                                     <input type="text" name="c_address" class="form-control" value="<?php echo $app_row['c_address'];?>" required>
                                 </div>
                             </div>
                         </div>   
                         
                         
                             
                             
                            
                            
                              <div class="row">
                             <div class="col-lg-4">
                                  <div class="form-group">
                                     <label>State Address</label>
                                     <select name="state" id="state" data-live-search="true" class="form-control selectpicker">
                                           <option value="<?php echo $app_row['state'];?>"><?php echo $app_row['state'];?></option>
                 <option value="" selected="selected" >- Select -</option>
               
							  <option value='Abia'>Abia</option>
							  <option value='Adamawa'>Adamawa</option>
							  <option value='AkwaIbom'>AkwaIbom</option>
							  <option value='Anambra'>Anambra</option>
							  <option value='Bauchi'>Bauchi</option>
							  <option value='Bayelsa'>Bayelsa</option>
							  <option value='Benue'>Benue</option>
							  <option value='Borno'>Borno</option>
							  <option value='Cross River'>Cross River</option>
							  <option value='Delta'>Delta</option>
							  <option value='Ebonyi'>Ebonyi</option>
							  <option value='Edo'>Edo</option>
							  <option value='Ekiti'>Ekiti</option>
							  <option value='Enugu'>Enugu</option>
							  <option value='FCT'>FCT</option>
							  <option value='Gombe'>Gombe</option>
							  <option value='Imo'>Imo</option>
							  <option value='Jigawa'>Jigawa</option>
							  <option value='Kaduna'>Kaduna</option>
							  <option value='Kano'>Kano</option>
							  <option value='Katsina'>Katsina</option>
							  <option value='Kebbi'>Kebbi</option>
							  <option value='Kogi'>Kogi</option>
							  <option value='Kwara'>Kwara</option>
							  <option value='Lagos'>Lagos</option>
							  <option value='Nasarawa'>Nasarawa</option>
							  <option value='Niger'>Niger</option>
							  <option value='Ogun'>Ogun</option>
							  <option value='Ondo'>Ondo</option>
							  <option value='Osun'>Osun</option>
							  <option value='Oyo'>Oyo</option>
							  <option value='Plateau'>Plateau</option>
							  <option value='Rivers'>Rivers</option>
							  <option value='Sokoto'>Sokoto</option>
							  <option value='Taraba'>Taraba</option>
							  <option value='Yobe'>Yobe</option>
							  <option value='Zamfara'>Zamafara</option>
                </select>
              
                                     
                                     
                                     
                                    
                                 </div>
                             </div>
                             
                              <div class="col-lg-4">
                                 
                                  <div class="form-group">
                                     <label>LGA</label>
                                     
                                     
                <select name="lga" id="lga" data-live-search="true" class="form-control selectpicker">
                      <option value="<?php echo $app_row['lga'];?>"><?php echo $app_row['lga'];?></option>
                  <option selected="selected">Select item...</option>
                </select>
                                 </div>
                             </div>
                         </div>   
                         
                         
                         
                            <div class="row">
                             <div class="col-lg-4">
                                  <div class="form-group">
                                     <label>Means of Identification</label>
                                    
                                     <input type="text" name="nationalid" class="form-control" value="<?php echo $app_row['nationalid'];?>">
                                 </div>
                             </div>
                             
                              <div class="col-lg-4">
                                 
                                  <div class="form-group">
                                     <label>Religion</label>
                                     <select class="form-control selectpicker" data-live-search="true" name="religion">
                                           <option><?php echo $app_row['religion'];?></option>
                                           <option value="ISLAM">ISLAM</option>
                                           <option value="CRISTIANITY">CRISTIANITY</option>
                                           <option value="OTHERS">OTHERS</option>
                                                                            </select>
                                 </div>
                             </div>
                         </div>   
                         
                                 
                                
                             
                             
                             
                                <div class="row">
                           
                              <div class="col-lg-4">
                                 
                                  <div class="form-group">
                                     <label>Qualification</label>
                                     <select class="form-control selectpicker" data-live-search="true" name="qualification">
                                           <option><?php echo $app_row['qualification'];?></option>
                                           <option value="SSCE">SSCE</option>
                                           <option value="DIPLOMA">DIPLOMA</option>
                                           <option value="NCE">NCE</option>
                                                                            </select>
                                 </div>
                             </div>
                         </div>   
                         
                         
                         
                         
                             <div class="row">
                             <div class="col-lg-4">
                                  <div class="form-group">
                                     <label>Language Spoken</label>
                                     <input type="text" name="language" class="form-control" value="<?php echo $app_row['language'];?>" required>
                                 </div>
                             </div>
                             
                              <div class="col-lg-4">
                                 
                                  <div class="form-group">
                                     <label>Profession</label>
                                     <input type="text" name="profession" class="form-control" value="<?php echo $app_row['profession'];?>" required>
                                 </div>
                             </div>
                         </div>   
                         
                       
                       
                       
                       
                       
                          
                             <div class="row">
                             <div class="col-lg-4">
                                  <div class="form-group">
                                     <label>Programme Choice</label>
                                     
                                      <select class="form-control selectpicker" name="program" diabled="true">
                                           <option><?php echo $row['program'];?></option>
                                         
                                                                            </select>
                                     
                                 </div>
                             </div>
                             
                              <div class="col-lg-4">
                                 
                                  <div class="form-group">
                                     <label>Course</label>
                                     <select class="form-control selectpicker" data-live-search="true" name="course" diabled>
                                         
                                         <option><?php echo $app_row['course'];?></option>
                                           <?php
                                           $q = $dBASE->query("SELECT * FROM app_course WHERE program='".$row['program']."'");
                                           while($r = $q->fetch_array()){
                                              echo '<option value="'.$r['course'].'">'.$r['course'].'</option>'; 
                                           }
                                          
                                           ?>
                                           
                                           </select>
                                         
                                     
                                 </div>
                             </div>
                         </div>   
                         
                         
                         
                         
                         
                         
                            <div class="row">
                             <div class="col-lg-4">
                                  <div class="form-group">
                                     <label>Sponsor Type</label>
                                      <select class="form-control selectpicker" data-live-search="true" name="sponsortype" diabled>
                                           <option><?php echo $row['sponsortype'];?></option>
                                           <option value="SELF">SELF</option>
                                           <option value="GOVERNMENT">GOVERNMENT</option>
                                           </select>
                                 </div>
                             </div>
                             
                              <div class="col-lg-4">
                                 
                                  <div class="form-group">
                                     <label>Sponsor Name</label>
                                     <input type="text" name="sponsorname" class="form-control" value="<?php echo $app_row['sponsorname'];?>" required>
                                 </div>
                             </div>
                         </div>   
                         
                         
                         
                         
                             <div class="row">
                             <div class="col-lg-4">
                                  <div class="form-group">
                                     <label>Sponsor Address</label>
                                       <input type="text" name="sponsoraddress" class="form-control" value="<?php echo $app_row['sponsoraddress'];?>" required>
                                 </div>
                             </div>
                             
                         </div>   
                         
                         
                         
                         
                                 <div class="row">
                             <div class="col-lg-4">
                                  <div class="form-group">
                                    
                                     <button type="submit" class="btn btn-info btn-lg" name="save_app">Save Application</button>
                                 </div>
                             </div>
                             
                             
                         </div>   
                         
                   </form>    
                       
                        </div></div>
                    </div>
                </div>

            </div>


             <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
   <form class="" role="form" method="post" action="process.php" enctype="multipart/form-data">      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add new Food</h4>
        </div>
        <div class="modal-body">



          <div class="form-group">
      
                      
                                </div>
          

        </div>
        <div class="modal-footer">
             <button type="submit" name="add-food" class="btn btn-success">Upload</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      </form>
    </div>
  </div>

        </div>
    </section>

    

<?php include 'footer2.php';?>
 
 
  <!--   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
  <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
  <script src="js/lga.min.js"></script>
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