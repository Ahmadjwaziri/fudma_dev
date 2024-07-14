<?php include 'header2.php';
include 'Remitacredentials.php';

?>

  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

            <link media="all" type="text/css" rel="stylesheet" href="assets/libs/data-table/datatables.min.css">

    
    <section class="wrapper-bottom-sec">
        <div class="p-30">
            <h2 class="page-title">Request History List</h2>
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
         $tt_query = $dBASE->query("SELECT * FROM transcript_request where app_id='$appid'");

         if($tt_query->num_rows > 0){?>
         
         <?php 
         }else{

            echo '<h3><center>You have not make any request<br>
            <br>
            <a href="MakePayment.php" class="btn btn-primary">Make Request</a>
            </center></h3>';
         }
         ?>
         
         
          

                            <table class="table data-table table-hover table-ultra-responsive">
                                <thead>
                                <tr>
                                    <th style="width: 10%;">id#</th>
                                    <th style="width: 10%;">ReferenceNo</th>
                                    <th style="width: 10%;">Payment_Status</th>
                                    <th style="width: 10%;">Application_Status</th>
                                    <th style="width: 10%;">Transcript_Generated</th>
                                    <th style="width: 10%;">Transcript_Approved</th>
                                    <th style="width: 10%;">Transcript_Sent</th>
                                    <th style="width: 10%;">Actions</th>
                                </tr>
                                </thead>
                                <tbody>


<?php 
$i = 1;
$t_query = $dBASE->query("SELECT * FROM transcript_request where app_id='$appid' and application_status=1 ");

while ($t_row = $t_query->fetch_array()) {
  echo ' <tr>
                <td data-label="SL">'.$t_row['id'].'</td>
                <td data-label="ReferenceNo">'.$t_row['reference_id'].'</td>
                
                
                
                ';

?> 
<td data-label="PaymentStatus">
<?php 
                        if ($t_row['payment_status'] == "1") {
                          echo '<p class="btn btn-success btn-xs">Paid</p>';
                        }else{
                          echo '<p class="btn btn-danger btn-xs">Pending</p>';
                        }?>
                          </td>
                          <td data-label="ApptStatus">
<?php 
                        if ($t_row['application_status'] == "1") {
                          echo '<p class="btn btn-success btn-xs">Submitted</p>';
                        }else{
                          echo '<p class="btn btn-danger btn-xs">Pending</p>';
                        }?>
                          </td>

                          <td data-label="TranscriptGenerated">
<?php 
                        if ($t_row['trans_generated'] == "1") {
                          echo '<p class="btn btn-success btn-xs">Yes</p>';
                        }else{
                          echo '<p class="btn btn-danger btn-xs">No</p>';
                        }?>
                          </td>

                          <td data-label="TranscriptApproved">
<?php 
                        if ($t_row['trans_approved'] == "1") {
                          echo '<p class="btn btn-success btn-xs">Yes</p>';
                        }else{
                          echo '<p class="btn btn-danger btn-xs">No</p>';
                        }?>
                          </td>

                          <td data-label="TranscriptSent">
<?php 
                        if ($t_row['trans_sent'] == "1") {
                          echo '<p class="btn btn-success btn-xs">Yes</p>';
                        }else{
                          echo '<p class="btn btn-danger btn-xs">No</p>';
                        }?>
                          </td>
                       
                                    <td data-label="Actions">
                                        
                                        <?php if ($t_row['application_status'] == "1") { ?>
                                            
                                            <a class="btn btn-success btn-xs"  target="_blank" href="TCPDF/examples/acknowledgement_form?formid=<?php echo $t_row['reference_id'];?>"><i class="fa fa-print"></i> Print</a>
                                        <?php }else{} ?>
                                        
                                       
                                        

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