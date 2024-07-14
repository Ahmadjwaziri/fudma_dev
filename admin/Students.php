<?php include 'header2.php';

?>

  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

            <link media="all" type="text/css" rel="stylesheet" href="assets/libs/data-table/datatables.min.css">

<script src="https://cdn.jsdelivr.net/gh/linways/table-to-excel@v1.0.4/dist/tableToExcel.js"></script>

    
    <section class="wrapper-bottom-sec">
        <div class="p-30">
            <h2 class="page-title">Students</h2>
        </div>
        <div class="p-30 p-t-none p-b-none">
                        <div class="row">


  <center>  <?php if (isset($_SESSION['response'])) {
                            echo $_SESSION['response'];
                        }?></center>
                <div class="col-lg-12">

 <!--<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Submit RRR Number</button>-->
 
 <!-- <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal2">Payment Guide</button>-->
 
 <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add New Student</button>
   
 <br>
                    <div class="panel">
                        <div class="panel-heading">
                            <!--<h3 class="panel-title">Olevel</h3>-->
                        </div>
                        <div class="panel-body p-none">
   <div class="container">                      
          <div class="row">
          <div class="col-lg-11">
          
          
         
<div class="panel-body p-none">
    <button id="btnExport">EXPORT REPORT</button>

    
                            <table class="table data-table table-hover table-ultra-responsive">
                                <thead>
                                <tr>
                                    <th style="width: 10%;">id#</th>
                                    <th style="width: 20%;">FullName</th>
                                    <th style="width: 20%;">StudentID</th>
                                    <th style="width: 20%;">Program</th>
                                    <th style="width: 20%;">Course</th>
                                    <th style="width: 10%;">Payment Status</th>
                                    <th style="width: 20%;">Actions</th>
                                </tr>
                                </thead>
                                <tbody>


<?php
$i = 1;
$query = $dBASE->query("SELECT * FROM students ORDER BY studentid DESC");

while ($row = $query->fetch_array()) {
   echo '<tr>
   <td>'.$i++.';</td>
                                       <td>'.$row['firstname'].' '.$row['surname'].'</td>
                                       <td>'.$row['studentid'].'</td>
                                       <td>'.$row['program'].'</td>
                                       <td>'.$row['course'].'</td>
                                       <td>'.$row['payment_status'].'</td>
                                       <td><a href="StudentView?id='.$row['studentid'].'" class="btn btn-success btn-xs">View</a></td>
                                   </tr>';
}

?>

                                
                                </tbody>
                            </table>
                        </div>
       
                      
                       
                        </div></div>
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
                      <input type="text" name="firstname" value="" class="form-control">
                      <label>Surname</label>
                      <input type="text" name="surname" value="" class="form-control">
                        
                        <label>Gender</label>
                        <input type="text" name="gender" value="" class="form-control">
                      
                        <label>Date of Birth</label>
                        <input type="text" name="dob" value="" class="form-control">
                      
                      
                        <label>Nationality</label>
                        <input type="text" name="nationality" value="" class="form-control">
                      
                        <label>State</label>
                        <input type="text" name="state" value="" class="form-control">
                      
                        <label>LGA</label>
                        <input type="text" name="lga" value="" class="form-control">
                      
                        <label>Email Address</label>
                        <input type="text" name="email" value="" class="form-control">
                      
                        <label>Phone Number</label>
                        <input type="text" name="phone" value="" class="form-control">
                      
                         <label>Programme</label>
                        <input type="text" name="pprogram" value="" class="form-control">
                        
                        
                        
                         <label>Course</label>
                        <input type="text" name="ccourse" value="" class="form-control">
                        
                        
                        
                         <label>Matric Year</label>
                        <input type="text" name="matricyear" value="" class="form-control">
                        
                    
                    <input type="hidden" name="appid" value="" class="form-control">
                        
                         <label>Level</label>
                        <input type="text" name="level" value="" class="form-control">
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

            </div>

<?php include 'footer2.php';?>
 
 <script>
 
 $(document).ready(function(){
    $("#btnExport").click(function() {
        let table = document.getElementsByTagName("table");
        TableToExcel.convert(table[0], { // html code may contain multiple tables so here we are refering to 1st table tag
           name: `JSIITApplicants.xlsx`, // fileName you could use any name
           sheet: {
              name: 'Sheet 1' // sheetName
           }
        });
    });
});
 
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