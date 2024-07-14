<?php 
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
include 'header2.php';
include 'Remitacredentials.php';

?>

  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

            <link media="all" type="text/css" rel="stylesheet" href="assets/libs/data-table/datatables.min.css">

    
    <section class="wrapper-bottom-sec">
        <div class="p-30">
            <h2 class="page-title">Payment History</h2>
        </div>
        <div class="p-30 p-t-none p-b-none">
                        <div class="row">


  <center>  <?php if (isset($_SESSION['response'])) {
                            echo $_SESSION['response'];
                        }?></center>
                <div class="col-lg-12">

 <!--<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Submit RRR Number</button>-->
 
 <!-- <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal2">Payment Guide</button>-->
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
          
         <?php 
        $tt_query = $dBASE->query("SELECT * FROM app_rrr WHERE app_id='" . $appid . "' AND is_used='0'");
         if($tt_query->num_rows > 0){?>
         
         <?php 
         }else{
         ?>
         
         <h5>Generate New Payment</h5>
          <form action="remita_process.php" method="POST">
              <div class="form-group">
              <input class="form-control" type="text" name="fullname" value="<?php echo $row['fullname'];?>">
              </div> <div class="form-group">
              <input class="form-control" type="text" name="email" value="<?php echo $row['email'];?>">
              </div> <div class="form-group">
              <input class="form-control" type="text" name="phone" value="<?php echo $row['phone'];?>">
              </div> <div class="form-group">
              <input class="form-control" disabled="true" type="text" name="amount" value="3000">
              </div>
              <button name="generate_rrr" class="btn btn-danger">Generate RRR</button>
          </form>
          <br>
          
<?php } ?>
                            <table class="table data-table table-hover table-ultra-responsive">
                                <thead>
                                <tr>
                                    <th style="width: 10%;">id#</th>
                                    <th style="width: 20%;">RRR</th>
                                    <th style="width: 20%;">OrderID</th>
                                    <th style="width: 20%;">Date</th>
                                    <th style="width: 10%;">Usage</th>
                                    <th style="width: 10%;">Status</th>
                                    <th style="width: 20%;">Actions</th>
                                </tr>
                                </thead>
                                <tbody>


<?php 
$i = 1;
$t_query = $dBASE->query("SELECT * FROM app_rrr where app_id='$appid'");

while ($t_row = $t_query->fetch_array()) {
  echo ' <tr>
                <td data-label="SL">'.$t_row['id'].'</td>
                <td data-label="RRR">'.$t_row['rrr'].'</td>
                <td data-label="Orderid">'.$t_row['billId'].'</td>
                <td data-label="Date">'.$t_row['ondate'].'</td>
                
                ';

?> 
<td data-label="Usage">
<?php 
                        if ($t_row['is_used'] == "1") {
                          echo '<p class="btn btn-success btn-xs">Used</p>';
                        }else{
                          echo '<p class="btn btn-danger btn-xs">Not-Used</p>';
                        }?>
                          </td>
                        <td data-label="Status"><?php 
                        if ($t_row['status'] == "PAID") {
                          echo '<p class="btn btn-success btn-xs">'.$t_row['status'].'</p>';
                        }else{
                          
                          ?>
                         
                        
                        <?php 
                        $rrr = $t_row['rrr'];
                        //action="https://login.remita.net/remita/ecomm/finalize.reg" 
                        ?>
<form action="https://remitademo.net/remita/ecomm/finalize.reg" method="POST">
<input name="merchantId" value="<?php echo $marchantid;?>" type="hidden">
<input name="hash" value="<?php
$hash = "$marchantid$rrr$api_key";
echo openssl_digest($hash, 'sha512');
?>" type="hidden">
<input name="rrr" value="<?php echo $rrr;?>" type="hidden">
<input name="responseurl" value="http://tps.fudutsinma.edu.ng/remita_process.php?status=true&orderid=<?php echo $t_row['billId'];?>&rrr=<?php echo $t_row['rrr'];?>"
type="hidden">
<input type ="submit" name="submit_btn" value="Pay Via Remita">
</form>

<?php } ?>
                        
                        
                        </td>
                                    <td data-label="Actions">
 <?php if($t_row['status'] != "PAID"){?>
                                        <a class="btn btn-success btn-xs" href="remita_process?status=true&orderid=<?php echo $t_row['billId'];?>&rrr=<?php echo $t_row['rrr'];?>"><i class="fa fa-edit"></i> Get Status</a>
                                        <!--<a href="#" class="btn btn-danger btn-xs cdelete" id="<?php echo $t_row['rid'];?>"><i class="fa fa-trash"></i> Delete</a>-->
                                        
<?php } ?>
                                    </td>
                                </tr>
<?php } ?>
                                
                                </tbody>
                            </table>
                        </div>
       
                      
                       
                        </div></div>
                    </div>
                </div>
</div>
                </div>

            </div>


             <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
   <form class="" role="form" method="post" action="process.php" enctype="multipart/form-data">      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Submit RRR Number</h4>
        </div>
        <div class="modal-body">



          <div class="form-group">
      
                      <input type="text" placeholder="Remita Retrival Reference" class="form-control" name="rrr">
                                </div>
          

        </div>
        <div class="modal-footer">
             <button type="submit" name="add_rrr" class="btn btn-success">Submit</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      </form>
    </div>
  </div>
  


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
                        window.location.href = "process.php?delete_food=" + id;
                    }
                });
            });

        });
    </script>
<?php echo $_SESSION['response'] = "";
?>