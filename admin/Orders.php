<?php include 'header2.php';
error_reporting(0);
?>
  
            <link media="all" type="text/css" rel="stylesheet" href="assets/libs/data-table/datatables.min.css">

    
    <section class="wrapper-bottom-sec">
        <div class="p-30">
            <h2 class="page-title">Orders</h2>
        </div>
        <div class="p-30 p-t-none p-b-none">
                        <div class="row">


  <center>  <?php if (isset($_SESSION['response'])) {
                            echo $_SESSION['response'];
                        }?></center>
    
                <div class="col-lg-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Orders</h3>
                        </div>
                        <div class="panel-body p-none">
                            <table class="table data-table table-hover table-ultra-responsive">
                                <thead>
                                <tr>
                                                                        <th style="width: 10%;">NO#</th>

                                    <th style="width: 10%;">Order id</th>
                                    <th style="width: 20%;">Amount</th>
                                    <th style="width: 20%;">Rider</th>
                                    <th style="width: 20%;">Time</th>
                                    <th style="width: 10%;">Order Status</th>
                                    <th style="width: 10%;">Payment Status</th>
                                    <th style="width: 10%;">Payment Type</th>
                                    <th style="width: 20%;">Actions</th>
                                </tr>
                                </thead>
                                <tbody>


<?php 
$i = 0;
$t_query = $dBASE->query("SELECT * FROM orders ORDER BY id DESC");
while ($t_row = $t_query->fetch_array()) {
  echo ' <tr>
  <td data-label="SL">'.$id++.'</td>
            <td data-label="SL">'.$t_row['orderid'].'</td>
            <td data-label="Amount">₦'.number_format($t_row['amount'], 2).'</td>
            <td data-label="Phone">'.$t_row['rider'].'</td>
            <td data-label="Email">'.$t_row['ontime'].'</td>
            <td data-label="Status"><p class="btn btn-success btn-xs">'.$t_row['order_status'].'</p></td>
            <td data-label="Status"><p class="btn btn-success btn-xs">'.$t_row['payment_status'].'</p></td>
            <td data-label="Type"><p class="btn btn-success btn-xs">'.$t_row['payment_type'].'</p></td>
        ';
?> 
                                    <td data-label="Actions">

<a href="view-order?id=<?php echo $t_row['id'];?>" class="btn btn-info btn-xs cdelete"><i class="fa fa-eye"></i> View Detail</a>

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
        });
    </script>


      <script>
        $(document).ready(function(){
            $('.data-table').DataTable();


            /*For Delete Designation*/
            // $(".cdelete").click(function (e) {
                // e.preventDefault();
                // var id = this.id;
                // bootbox.confirm("Are you sure?", function (result) {
                    // if (result) {
                        // var _url = $("#_url").val();
                        // window.location.href = "view-order.php?id=" + id;
                    // }
                // });
            // });

        });
    </script>
<?php echo $_SESSION['response'] = "";?>