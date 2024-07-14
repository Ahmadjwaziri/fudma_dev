<?php include 'header2.php';?>
  
            <link media="all" type="text/css" rel="stylesheet" href="assets/libs/data-table/datatables.min.css">

    
    <section class="wrapper-bottom-sec">
        <div class="p-30">
            <h2 class="page-title">Categories</h2>
        </div>
        <div class="p-30 p-t-none p-b-none">
                        <div class="row">

                <div class="col-lg-12">

 <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add New Category</button>
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Categories</h3>
                        </div>
                        <div class="panel-body p-none">
                            <table class="table data-table table-hover table-ultra-responsive">
                                <thead>
                                <tr>
                                    <th style="width: 10%;">id#</th>
                                    <th style="width: 20%;">Name</th>
                                    <th style="width: 20%;">Actions</th>
                                </tr>
                                </thead>
                                <tbody>


<?php 
$i = 1;
$t_query = $dBASE->query("SELECT * FROM categories");

while ($t_row = $t_query->fetch_array()) {
  echo ' <tr>
                <td data-label="SL">'.$t_row['id'].'</td>
                <td data-label="Name">'.$t_row['category'].'</td>
                
                ';

?> 
                      
                                    <td data-label="Actions">
                                        
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
    
            <form method="POST" action="process.php">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add new Category</h4>
        </div>
        <div class="modal-body">



          <div class="form-group">
      
                      <label>Category Name</label>
                      <input type="text" name="category" placeholder="" class="form-control">
                    
                                </div>
          

        </div>
        <div class="modal-footer">
             <button type="submit" name="add-category" class="btn btn-success">Add</button>
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
                        window.location.href = "process.php?delete_category=" + id;
                    }
                });
            });

        });
    </script>
<?php echo $_SESSION['response'] = "";?>