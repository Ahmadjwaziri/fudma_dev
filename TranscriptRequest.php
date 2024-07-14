<?php include 'header2.php';
$app_query = $dBASE->query("SELECT * FROM transcript_request where app_id='$appid' and reference_id='$status'");
$app_row = $app_query->fetch_array();
?>

  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



            <link media="all" type="text/css" rel="stylesheet" href="assets/libs/data-table/datatables.min.css">

    
    <section class="wrapper-bottom-sec">
        <div class="p-30">
            <h2 class="page-title">New Application(Paper Request Form)</h2>
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
   
   <?php 
   if($app_row['payment_status'] == "0"){
       echo '<h3><center>You have an outstanding Payment<br>
       <br>
       <a href="MakePayment.php" class="btn btn-primary">Make Payment</a>
       </center></h3>';
   }else{
   
   ?>
       
                    <form action="process.php" method="POST">

                         <div class="row">
                             <div class="col-lg-4">
                                  <div class="form-group">
                                     <label>FullName</label>
                                     <input type="text" name="fullname" class="form-control" value="<?php echo $row['fullname'];?>" required>
                                 </div>
                             </div>
                             
                              <div class="col-lg-4">
                                 
                                  <div class="form-group">
                                     <label>Department</label>
                                     <input type="text" name="dept" class="form-control" value="<?php echo $row['department'];?>" required>
                                 </div>
                             </div>
                         </div>   
                         
                         
                                 <div class="row">
                             <div class="col-lg-4">
                                  <div class="form-group">
                                     <label>Degree Programme</label>
                                     <input type="text" name="degree" class="form-control" value="<?php echo $row['program'];?>">
                                 </div>
                             </div>
                             
                              <div class="col-lg-4">
                                 
                              <div class="form-group">
                                     <label>Matric Number</label>
                                     <input type="text" name="matricno" class="form-control" value="<?php echo $row['appid'];?>">
                                 </div>
                             </div>
                         </div>   
                         
                         
                         
                         
                             <div class="row">
                             <div class="col-lg-4">
                             <label>Graduation Session</label>
                             <div class="form-group">
                                      <select class="form-control selectpicker" data-live-search="true" name="gsession">
                                           <option><?php echo $app_row['graduation_session'];?></option>
                                           <option value="2010/2011">2010/2011</option>
                                           <option value="2011/2012">2011/2012</option>
                                           <option value="2012/2013">2012/2013</option>
                                           <option value="2013/2014">2013/2014</option>
                                           <option value="2014/2015">2014/2015</option>
                                           <option value="2015/2016">2015/2016</option>
                                           <option value="2016/2017">2016/2017</option>
                                           <option value="2017/2018">2017/2018</option>
                                           <option value="2018/2019">2018/2019</option>
                                           <option value="2019/2020">2019/2020</option>
                                           <option value="2020/2021">2020/2021</option>
                                           <option value="2021/2022">2021/2022</option>
                                           <option value="2022/2023">2022/2023</option>
                                           <option value="2023/2024">2023/2024</option>
                                           <option value="2024/2025">2024/2025</option>
                                           <option value="2025/2026">2025/2026</option>
                                                                            </select>
                                      
                                  
                                 </div>
                             </div>
                             
                              <div class="col-lg-4">
                                                                      <label>Mode of Delivery</label>

                                  <div class="form-group">
                                      <select class="form-control selectpicker" data-live-search="true" name="dmode" id="dmode">
                                      <option value="paper">Paper</option>
                                           <option><?php echo $app_row['mode_of_delivery'];?></option>
                                           <!-- <option value="electronic">Electronic Delivery</option>
                                           <option value="paper">Paper</option> -->
                                           
                                                                            </select>
                                      
                                  
                                 </div>
                             </div>
                         </div>   
                         
                         
                         
                         
                             <div class="row">
                             <div class="col-lg-4">
                                  <div class="form-group">
                                     <label>Delivery Location</label>
                                       <select class="form-control selectpicker" data-live-search="true" name="dlocation">
                                           <option><?php echo $app_row['delivery_location'];?></option>
                                           <option value="Nigeria">Nigeria</option>
                                           <option value="Outside">Outside Ngeria</option>
                                                         </select>
                                      
                                 </div>
                             </div>
                             
                              <div class="col-lg-4">
                                                                     

                                                                      <div class="form-group">
                                     <label>Recipient Name</label>
                                     <input type="text" name="rname" id="recipientNameRow" class="form-control" value="<?php echo $app_row['recipient_name'];?>">
                                 </div>
                             </div>
                         </div>   
                         
                         
                             <div class="row">
                             <div class="col-lg-4">
                                  <div class="form-group">
                                     <label>Recipient Address</label>
                                     <input type="text" name="raddress" class="form-control" value="<?php echo $app_row['recipient_address'];?>" required>
                                 </div>
                             </div>
                             
                              <div class="col-lg-4">
                                 
                                  <div class="form-group">
                                          
                                     <label>Recipient City</label>
                                     <input type="text" name="rcity" class="form-control" value="<?php echo $app_row['recipient_city'];?>" required>
                                     
                                     
                                 </div>
                             </div>
                         </div>   
                         
                         
                         
                             <div class="row">
                             <div class="col-lg-4">
                                  <div class="form-group">
                                     <label>Recipient State/Region/District</label>
                                     <input type="text" name="rstate" class="form-control" value="<?php echo $app_row['recipient_state'];?>" required>
                                 </div>
                             </div>
                             
                              <div class="col-lg-4">
                                 
                                  <div class="form-group">
                                     <label>Recipient Country</label>
                                     <input type="text" name="rcountry" class="form-control" value="<?php echo $app_row['recipient_country'];?>" required>
                                 </div>
                             </div>
                         </div>   
                         
                         
                             
                             
                            
                            
                              <div class="row">
                             <div class="col-lg-4">
                             <div class="form-group">
                                     <label>Recipient Area Postal Code</label>
                                     <input type="text" name="rpcode" class="form-control" value="<?php echo $app_row['recipient_area_pcode'];?>" required>
                                 </div>
                             </div>
                             
                              <div class="col-lg-4">
                                 
                              <div class="form-group">
                                     <label>Recipient Email</label>
                                     <input type="text" name="remail" class="form-control" value="<?php echo $app_row['recipient_email'];?>" required>
                                 </div>
                             </div>
                         </div>   
                         
                         
                         
                            <div class="row">
                             <div class="col-lg-4">
                                  <div class="form-group">
                                     <label>Recipient Phone</label>
                                    
                                     <input type="text" name="rphone" class="form-control" value="<?php echo $app_row['recipient_phone'];?>">
                                     <input type="hidden" name="refno" class="form-control" value="<?php echo $status;?>">
                                 </div>
                             </div>
                             
                              <!-- <div class="col-lg-4">
                                 
                                  <div class="form-group">
                                     <label>Religion</label>
                                     <select class="form-control selectpicker" data-live-search="true" name="religion">
                                           
                                           <option value="ISLAM">ISLAM</option>
                                           <option value="CRISTIANITY">CRISTIANITY</option>
                                           <option value="OTHERS">OTHERS</option>
                                                                            </select>
                                 </div>
                             </div> -->
                         </div>   
                         
                                 
                                
                             
                             
                            
                         
                         
                         
                         
                                 <div class="row">
                             <div class="col-lg-4">
                                  <div class="form-group">
                                  <P style="color:red"><input type="checkbox" required="true"> Once you've submitted your transcript request online, it's important to note that you won't be able to make any edits afterwards. Make sure all the information you provide is accurate before finalizing your submission.</P>
  <br>

                                     <button type="submit" class="btn btn-info btn-lg" name="save_app">Apply</button>
                                 </div>
                             </div>
                             
                             
                         </div>   
                         
                   </form>    
                       <?php } ?>
                       
                       <br>
                       <br>
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