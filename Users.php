<?php include 'header2.php';?>
  
            <link media="all" type="text/css" rel="stylesheet" href="assets/libs/data-table/datatables.min.css">

    
    <section class="wrapper-bottom-sec">
        <div class="p-30">
            <h2 class="page-title">Users</h2>
        </div>
        <div class="p-30 p-t-none p-b-none">
                        <div class="row">

                <div class="col-lg-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Users</h3>
                        </div>
                        <div class="panel-body p-none">
                            <table class="table data-table table-hover table-ultra-responsive">
                                <thead>
                                <tr>
                                    <th style="width: 10%;">id#</th>
                                    <th style="width: 20%;">Name</th>
                                    <th style="width: 20%;">Phone</th>
                                    <th style="width: 20%;">Email</th>
                                    <th style="width: 10%;">Status</th>
                                    <th style="width: 20%;">Actions</th>
                                </tr>
                                </thead>
                                <tbody>


<?php 
$i = 1;
$t_query = $dBASE->query("SELECT * FROM users");

while ($t_row = $t_query->fetch_array()) {
  echo ' <tr>
                <td data-label="SL">'.$t_row['id'].'</td>
                <td data-label="Name">'.$t_row['fullname'].'</td>
                <td data-label="Phone">'.$t_row['phone'].'</td>
                <td data-label="Email">'.$t_row['email'].'</td>
                
                ';

?> 
                        <td data-label="Status"><?php 
                        if ($row['status'] = "Active") {
                          echo '<p class="btn btn-success btn-xs">Active</p>';
                        }else{
                          echo '<p class="btn btn-danger btn-xs">Inactive</p>';
                        }
                        ?> </td>
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