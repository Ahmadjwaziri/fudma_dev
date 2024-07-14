<?php include 'header2.php';
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
    
    <form id="paymentForm">
  <div class="form-group">
    <!--<label for="email">Email Address</label>-->
    <input type="hidden" id="email-address" value="<?php echo $row['email'];?>" required />
  </div>
  <div class="form-group">
    <!--<label for="amount">Amount</label>-->
    <input type="hidden" id="amount" value="3200" required />
  </div>
  <div class="form-group">
    <!--<label for="first-name">First Name</label>-->
    <input type="hidden" id="first-name" value="<?php echo $row['fullname'];?>" />
  </div>
  <div class="form-group">
    <!--<label for="last-name">Last Name</label>-->
    <input type="hidden" id="last-name" value="<?php echo $row['fullname'];?>" />
  </div>
  <!--<div class="form-submit">-->
    <center>

    <button type="submit" class="btn btn-info" onclick="payWithPaystack()"> Pay Now </button>
    
            
    </center>
  <!--</div>-->
</form>
<script src="https://js.paystack.co/v1/inline.js"></script>
    
    
    
          <br>
          



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


const paymentForm = document.getElementById('paymentForm');
paymentForm.addEventListener("submit", payWithPaystack, false);
function payWithPaystack(e) {
  e.preventDefault();
  let handler = PaystackPop.setup({
    key: 'pk_live_c562420ad2dbd9c6e65c6fffc7f84fd5ada70d5a', // Replace with your public key
    email: document.getElementById("email-address").value,
    amount: document.getElementById("amount").value * 100,
    firstname: document.getElementById("first-name").value,
    lastname: document.getElementById("first-name").value,
    ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
    // label: "Optional string that replaces customer email"
    onClose: function(){
    //   alert('Window closed.');
    },
    callback: function(response){
    //   let message = 'Payment complete! Reference: ' + response.reference;
      
      location = "process?paystack=" + response.reference;
    //   alert(message);
    }
  });
  handler.openIframe();
}
 
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