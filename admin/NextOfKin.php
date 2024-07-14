<?php include 'header2.php';
if ($row['payment_status'] == "UNPAID") {
       echo '<script>location = "MakePayment";</script>';
}
$in_query = $dBASE->query("SELECT * FROM applicant_info where app_id='$appid'");
$in_row = $in_query->fetch_array();

?>

  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

  
  <!--<script src="jquery-1.11.0.min.js" type="text/javascript"></script>-->

  <!--<script type="text/javascript" src="Dynamic_State_LGA.js"></script>-->

            <link media="all" type="text/css" rel="stylesheet" href="assets/libs/data-table/datatables.min.css">

    
    <section class="wrapper-bottom-sec">
        <div class="p-30">
            <h2 class="page-title">Next of KIN</h2>
        </div>
        <div class="p-30 p-t-none p-b-none">
                        <div class="row">


  <center>  <?php if (isset($_SESSION['response'])) {
                            echo $_SESSION['response'];
                        }?></center>
                <div class="col-lg-12">

 <!--<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Update Passport</button>-->
 <br>
                    <div class="panel">
                        <div class="panel-heading">
                            <!--<h3 class="panel-title">Olevel</h3>-->
                        </div>
                        <div class="panel-body p-none">
   <div class="container">                      
          
<div class="row">
    
    <div class="col-lg-10">
               
       
<form id="app_form" name="app_form" action="process" method="POST">



<div class="row">
	
	<div class="col-4">
		<label for="institution">Father Name</label>
		<input type="text" name="fathername" id="fathername" class="form-control" value="<?php echo $in_row['fathername'];?>" required="true">
	</div>
	

	<div class="col-4">
		<label for="certificate">Mother Name</label>
		<input type="text" name="mothername" id="mothername" class="form-control" value="<?php echo $in_row['mothername'];?>" required="true">
	</div>
	
	
	
	<div class="col-4">
		<label for="institution">Father Phone</label>
		<input type="text" name="fatherphone" id="fatherphone" class="form-control" value="<?php echo $in_row['fatherphone'];?>" required="true">
	</div>

	<div class="col-4">
		<label for="certificate">Mother Phone</label>
		<input type="text" name="motherphone" id="motherphone" class="form-control" value="<?php echo $in_row['motherphone'];?>" required="true">
	</div>



	
	
	
	<div class="col-4">
		<label for="institution">Referee Name</label>
		<input type="text" name="refereename" id="refereename" class="form-control" value="<?php echo $in_row['refereename'];?>" required="true">
	</div>

	<div class="col-4">
		<label for="certificate">Referee Phone</label>
		<input type="text" name="refphone" id="refphone" class="form-control"  value="<?php echo $in_row['refphone'];?>" required="true">
	</div>





	
	
	
	<div class="col-4">
		<label for="institution">Referee Name</label>
		<input type="text" name="refaddress" id="refaddress" class="form-control" value="<?php echo $in_row['refaddress'];?>" required="true">
	</div>

	<div class="col-4">
		<label for="certificate">Referee Address</label>
		<input type="text" name="relation" id="relation"  value="<?php echo $in_row['relation'];?>" class="form-control" required="true">
	</div>



</div>
		
<br>
		<button class="btn btn-success" name="save_nkin">SAVE</button>
	</form>
</div>
</div>
                     
                     
                     <br/>  
                     <br/>  
    </div>
</div>
                        </div></div>
                    </div>
                </div>

            </div>


             <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
   <form class="" role="form" method="post" action="process.php" enctype="multipart/form-data">      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add new Food</h4>
        </div>
        <div class="modal-body">



          <div class="form-group">
      
                      
                                </div>
          

        </div>
        <div class="modal-footer">
             <button type="submit" name="add-food" class="btn btn-success">Upload</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      </form>
    </div>
  </div>

        </div>
    </section>

    

<?php include 'footer2.php';?>
 
 
  <!--   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
  <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
  <script src="js/lga.min.js"></script>
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
<?php echo $_SESSION['response'] = "";?>