<?php include 'header2.php';?>
  
            <link media="all" type="text/css" rel="stylesheet" href="assets/libs/data-table/datatables.min.css">

    
    <section class="wrapper-bottom-sec">
        <div class="p-30">
            <h2 class="page-title">Restaurant</h2>
        </div>
        <div class="p-30 p-t-none p-b-none">
                        <div class="row">

                <div class="col-lg-12">

 <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add New Restaurant</button>
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Restaurant</h3>
                        </div>
                        <div class="panel-body p-none">
                            <table class="table data-table table-hover table-ultra-responsive">
                                <thead>
                                <tr>
                                    <th style="width: 10%;">id#</th>
                                    <th style="width: 20%;">Restaurant</th>
                                    <th style="width: 20%;">Restaurant Address</th>
                                    <th style="width: 20%;">Email</th>
                                    <th style="width: 10%;">Status</th>
                                    <th style="width: 20%;">Actions</th>
                                </tr>
                                </thead>
                                <tbody>


<?php 
$i = 1;
$t_query = $dBASE->query("SELECT * FROM restaurant");

while ($t_row = $t_query->fetch_array()) {
  echo ' <tr>
                <td data-label="SL">'.$t_row['rid'].'</td>
                <td data-label="Name">'.$t_row['restaurant_name'].'</td>
                <td data-label="Phone">'.$t_row['email'].'</td>
                <td data-label="Email">'.$t_row['phone'].'</td>
                
                ';

?> 
                        <td data-label="Status"><?php 
                        if ($row['status'] = "Active") {
                          echo '<p class="btn btn-success btn-xs">'.$row['status'].'</p>';
                        }else{
                          echo '<p class="btn btn-danger btn-xs">'.$row['status'].'</p>';
                        }
                        ?> </td>
                                    <td data-label="Actions">
<!-- 
                                        <a class="btn btn-success btn-xs" href="view-employee?id=<?php echo $t_row['id'];?>"><i class="fa fa-edit"></i> Edit</a> -->
                                        <a href="#" class="btn btn-danger btn-xs cdelete" id="<?php echo $t_row['rid'];?>"><i class="fa fa-trash"></i> Delete</a>
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
          <h4 class="modal-title">Add new Restaurant</h4>
        </div>
        <div class="modal-body">



          <div class="form-group">
      
                      <label>Restaurant Name</label>
                      <input type="text" name="restaurant_name" placeholder="" class="form-control">
                      <label>Address</label>
                      <input type="text" name="restaurant_address" placeholder="" class="form-control">
                      <label>Phone Number</label>
                      <input type="text" name="phone" placeholder="" class="form-control">
                      <label>Email Address</label>
                      <input type="email" name="email" placeholder="" class="form-control">
                      
                                </div>
          
           <label>Select Image</label>
                                                    <div class="input-group input-group-file">
                                                            <span class="input-group-btn">
                                                                <span class="btn btn-primary btn-file">
                                                                    Browse <input type="file" class="form-control" name="fileToUpload">
                                                                </span>
                                                            </span>
                      
                                </div>

        </div>
        <div class="modal-footer">
             <button type="submit" name="add_restaurant" class="btn btn-success">Add</button>
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
                        window.location.href = "process.php?delete_restaurant=" + id;
                    }
                });
            });

        });
    </script>
<?php echo $_SESSION['response'] = "";?>