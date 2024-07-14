<?php include 'header2.php';?>
  
            <link media="all" type="text/css" rel="stylesheet" href="assets/libs/data-table/datatables.min.css">

    
    <section class="wrapper-bottom-sec">
        <div class="p-30">
            <h2 class="page-title">Staffs</h2>
        </div>
        <div class="p-30 p-t-none p-b-none">
                        <div class="row">



  <center>  <?php if (isset($_SESSION['response'])) {
                            echo $_SESSION['response'];
                        }?></center>
                <div class="col-lg-12">
                    
                     <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add New</button>
 
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Staffs</h3>
                        </div>
                        <div class="panel-body p-none">
                            <table class="table data-table table-hover table-ultra-responsive">
                                <thead>
                                <tr>
                                    <th style="width: 10%;">id#</th>
                                    <th style="width: 20%;">Name</th>
                                    <th style="width: 10%;">Role</th>
                                    <th style="width: 20%;">Actions</th>
                                </tr>
                                </thead>
                                <tbody>


<?php 
$i = 1;
$t_query = $dBASE->query("SELECT * FROM staff");

while ($t_row = $t_query->fetch_array()) {
  echo ' <tr>
                <td data-label="SL">'.$t_row['id'].'</td>
                <td data-label="Name">'.$t_row['fullname'].'</td>
                <td data-label="Phone">'.$t_row['role'].'</td>
                ';

?> 
                                    <td data-label="Actions">
<!-- 
                                        <a class="btn btn-success btn-xs" href="view-employee?id=<?php echo $t_row['id'];?>"><i class="fa fa-edit"></i> Edit</a> -->
                                        <a href="#" class="btn btn-danger btn-xs cdelete" id="<?php echo $t_row['id'];?>"><i class="fa fa-trash"></i> Delete</a>
                                    </td>
                                </tr>
<?php } ?>
                                
                                </tbody>
                            </table>
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
          <h4 class="modal-title">Add new Staff</h4>
        </div>
        <div class="modal-body">



          <div class="form-group">
      
                      <label>Full Name</label>
                      <input type="text" name="fullname" placeholder="" class="form-control">
                      <label>Staff ID</label>
                      <input type="text" name="staffid" placeholder="" class="form-control">
                      <label>Password</label>
                      <input type="password" name="password" placeholder="" class="form-control">
                      <label>Role</label>
                     <select class="form-control" name="role">
                         <option value="ADMIN">ADMIN</option>
                         <option value="ADMISSION">ADMISSION</option>
                         <option value="BURSARY">BURSARY</option>
                         <option value="STAFF">STAFF</option>
                         <option value="LIBRARIAN">LIBRARIAN</option>
                     </select>
                     
                                </div>
          
        </div>
        <div class="modal-footer">
             <button type="submit" name="add_user" class="btn btn-success">Add</button>
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
                        window.location.href = "process.php?delete_user=" + id;
                    }
                });
            });

        });
    </script>
<?php echo $_SESSION['response'] = "";?>