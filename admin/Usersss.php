<?php include 'header2.php';?>

        <link media="all" type="text/css" rel="stylesheet" href="assets/libs/data-table/datatables.min.css">
    <section class="wrapper-bottom-sec">
        <div class="p-30">
            <h2 class="page-title">Department</h2>
        </div>
        <div class="p-30 p-t-none p-b-none">

  <center>  <?php if (isset($_SESSION['response'])) {
                            echo $_SESSION['response'];
                        }?></center>
    
                        <div class="row">

                <div class="col-lg-4">
                    <div class="panel">
                        <div class="panel-body">
                            <form class="" role="form" action="process.php" method="post">
                                <div class="panel-heading">
                                    <h3 class="panel-title"> Add Department</h3>
                                </div>

                                <div class="form-group">
                                    <label>Department Name</label>
                                    <span class="help">e.g. "Account Department"</span>
                                    <input type="text" class="form-control" required name="department">
                                </div>

                                <input type="hidden" name="_token" value="QVLz2OyOFnao3cpU9kvorOhlfzHKWpFUnrSfXyez">
                                <button type="submit" name="add-department" class="btn btn-success btn-sm pull-right"><i class="fa fa-plus"></i> Add </button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">All Departments</h3>
                        </div>
                        <div class="panel-body p-none">
                            <table class="table data-table table-hover table-ultra-responsive">
                                <thead>
                                <tr>
                                    <th style="width: 10%;">SL#</th>
                                    <th style="width: 55%;">Department Name</th>
                                    <th style="width: 35%;">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                                               


                                    <?php

                                    $t_query = $dBASE->query("SELECT * FROM sys_department");
while ($t_row = $t_query->fetch_array()) {
  echo ' <tr>
                <td data-label="SL">'.$t_row['id'].'</td>
                <td data-label="Department">'.$t_row['department'].'</td>
    ';


?> 

                                    <td>
                                        <a class="btn btn-success btn-xs" href="#" data-toggle="modal" data-target=".modal_edit_department_<?php echo $t_row['did'];?>"><i class="fa fa-edit"></i> Edit</a>
                                        <div class="modal fade modal_edit_department_<?php echo $t_row['did'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Edit Department</h4>
            </div>
            <form class="form-some-up form-block" role="form" action="process.php" method="post">

                <div class="modal-body">
                    <div class="form-group">
                        <label>Department Name :</label>
                        <input type="text" class="form-control" required="" name="department" value="<?php echo $t_row['department'];?>">
                    </div>

                </div>
                <div class="modal-footer">
                    <input type="hidden" name="_token" value="QVLz2OyOFnao3cpU9kvorOhlfzHKWpFUnrSfXyez">
                    <input type="hidden" name="id" value="<?php echo $t_row['did'];?>">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" name="edit-department" class="btn btn-primary">Update</button>
                </div>

            </form>
        </div>
    </div>

</div>



                                        <a href="#" class="btn btn-danger btn-xs cdelete" id="<?php echo $t_row['did'];?>"><i class="fa fa-trash"></i> Delete</a>

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
<?php echo $_SESSION['response'] = "";?>
 <script>
        $(document).ready(function(){
            $('.data-table').DataTable();


            /*For Delete Department*/
            $(".cdelete").click(function (e) {
                e.preventDefault();
                var id = this.id;
                bootbox.confirm("Are you sure?", function (result) {
                    if (result) {
                        // var _url = $("#_url").val();
                        window.location.href = "process.php?delete_designation=" + id;
                    }
                });
            });


        });
    </script>
