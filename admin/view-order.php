<?php include 'header2.php';
$order_query = $dBASE->query("SELECT * FROM orders where id='$id'");
$order_row = $order_query->fetch_array();

$s_query = $dBASE->query("SELECT * FROM users where id='".$order_row['userid']."'");
                                        $s_row = $s_query->fetch_array();
?>
            <link media="all" type="text/css" rel="stylesheet" href="assets/libs/data-table/datatables.min.css">


    
    <section class="wrapper-bottom-sec">
        <div class="p-30">
            <h2 class="page-title">ORDER SUMMARY - #<?php echo $order_row['orderid'];?> </h2>
        </div>
        <div class="p-30 p-t-none p-b-none">

                        <div class="row">

                <div class="col-lg-4">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">SAMIU SALIHU </h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-block">

                                <div class="form-group">
                                    <label>Customer Name:</label>
                                    <span><?php echo $s_row['fullname'];?></span>
                                </div>

                                <div class="form-group">
                                    <label>Email</label>
                                    <span><?php echo $s_row['email'];?></span>
                                </div>

                                <div class="form-group">
                                    <label>Phone</label>
                                    <span><?php echo $s_row['phone'];?></span>
                                </div>


<hr>

<p>Order Detaail</p>
                                <div class="form-group">
                                    <label>Order ID:</label>
                                    <span><?php echo $order_row['orderid'];?></span>
                                </div>

                                <div class="form-group">
                                    <label>Amount:</label>
                                    <span><?php echo $order_row['amount'];?></span>
                                </div>

                                <div class="form-group">
                                    <label>Payment Type:</label>
                                    <span><?php echo $order_row['payment_type'];?></span>
                                </div>

                                <div class="form-group">
                                    <label>Rider ID:</label>
                                    <span style="color: red;"><?php 
                                    if($order_row['rider'] == null){
                                        echo '<span class="label label-danger" data-toggle="modal" data-target="#myModal">Assign a Rider</span>

                                        ';
                                    }else{
                                        $r_query = $dBASE->query("SELECT * FROM drivers where id='".$order_row['rider']."'");
                                        $r_row = $r_query->fetch_array();
                                        echo $r_row['fullname']. " - " . $r_row['phone'];

                                    }?></span>
                                </div>

                                <div class="form-group">
                                    <label>Payment Status:</label>
                                    <span><?php echo $order_row['payment_status'];?></span>
                                </div>

                                <div class="form-group">
                                    <label>Order Status:</label>
                                    <span><?php echo $order_row['order_status'];?></span>
                                </div>

                                <div class="form-group">
                                    <label>Date Of Birth:</label>
                                    <span></span>
                                </div>

                                <div class="form-group">
                                    <label>Date:</label>
                                    <span><?php echo $order_row['ontime'];?></span>
                                </div>

                                

                                

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">

                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Order Items</h3>
                        </div>
                        <div class="panel-body">
                            <table class="table data-table table-hover table-ultra-responsive">
                                <thead>
                                <tr>
                                    <th style="width: 10%;">id#</th>
                                    <th style="width: 30%;">Food Name</th>
                                    <th style="width: 20%;">Price</th>
                                    <th style="width: 20%;">Quantity</th>
                                    <th style="width: 20%;">RESTAURANT</th>
                                </tr>
                                </thead>
                                <tbody>


<?php 
$i = 1;
$t_query = $dBASE->query("SELECT * FROM cart INNER JOIN foods on foods.id=cart.foodid where order_id='".$order_row['orderid']."'") or die($dBASE->error);


while ($t_row = $t_query->fetch_array()) {
    
    $r_query = $dBASE->query("SELECT * FROM restaurant where rid='".$t_row['restaurant']."'");
    $r_row = $r_query->fetch_array();
  echo ' <tr>
                <td data-label="SL">'.$t_row['id'].'</td>
                <td data-label="Name">'.$t_row['title'].'</td>
                <td data-label="Amount">₦'.number_format($t_row['price'], 2).'</td>
                <td data-label="Quantity">'.$t_row['qty'].'</td>
                     <td data-label="Status"><p class="btn btn-success btn-xs">'.$r_row['restaurant_name'].'</p></td>
                ';

?> 

                                                                            </tr>
<?php } ?>
                                
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Order Note</h3>
                        </div>
                        <div class="panel-body">
                            <p align="justify"><?php echo $order_row['note'];?></p>
                        </div>
                    </div>

                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Delivery Location</h3>
                        </div>
                        <div class="panel-body">
                            <p align="justify"><?php echo $order_row['location'];?></p>
                        </div>
                    </div>

                   


                </div>

            </div>




 <!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button> -->

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
            <form method="POST" action="process">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Assign a Rider</h4>
        </div>
        <div class="modal-body">

          <div class="form-group">
                                    <label>Assign To</label>
<select class="form-control selectpicker" data-live-search="true" name="rider">
<?php
$d_query = $dBASE->query("SELECT * FROM drivers");
while ($d_row = $d_query->fetch_array()) {
echo '<option value="'.$d_row['id'].'">'.$d_row['fullname'].' '.$d_row['phone'].' - '.$d_row['id'].'</option>';
}
                                    ?>
</select>
                                </div>

        <input type="hidden" name="id" value="<?php echo $order_row['id'];?>">
        <input type="hidden" name="userid" value="<?php echo $order_row['userid'];?>">
        </div>
        <div class="modal-footer">
             <button type="submit" name="add_rider" class="btn btn-success">Assign</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      </form>
    </div>
  </div>
  



        </div>
    </section>


<?php include 'footer2.php';?>

<?php echo $_SESSION['response'] = "";?>
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
                        window.location.href = "process.php?delete_loan=" + id;
                    }
                });
            });

        });
    </script>