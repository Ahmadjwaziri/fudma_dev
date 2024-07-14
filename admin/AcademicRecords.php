<?php include 'header2.php';?>

  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

  
  <!--<script src="jquery-1.11.0.min.js" type="text/javascript"></script>-->

  <!--<script type="text/javascript" src="Dynamic_State_LGA.js"></script>-->

            <link media="all" type="text/css" rel="stylesheet" href="assets/libs/data-table/datatables.min.css">

    
    <section class="wrapper-bottom-sec">
        <div class="p-30">
            <h2 class="page-title">Academic Records</h2>
        </div>
        <div class="p-30 p-t-none p-b-none">
                        <div class="row">


  <center>  <?php if (isset($_SESSION['response'])) {
                            echo $_SESSION['response'];
                        }?></center>
                <div class="col-lg-12">

 <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add New</button>
 <br>
                    <div class="panel">
                        <div class="panel-heading">
                            <!--<h3 class="panel-title">Olevel</h3>-->
                        </div>
                        <div class="panel-body p-none">
   <div class="container">                      
                                  <div class="row">
                        <div class="col-lg-10">

    
</div>
</div>


<table class="table table-stripe">
	<tr>
		<td>Institution</td>
		<td>Certificate</td>
		<td>From</td>
		<td>TO</td>
	</tr>

<?php

if (isset($_POST['delete'])) {
$query = $dBASE->query("DELETE FROM applicant_academic where app_id='$appid' And id='$iid'");
}
$query = $dBASE->query("SELECT * FROM applicant_academic where app_id='$appid'");
while ($row = $query->fetch_assoc()) {
	echo '
<tr>
<td>'.$row['institution'].'</td>
<td>'.$row['certificate'].'</td>
<td>'.$row['datefrom'].'</td>
<td>'.$row['dateto'].'</td>
<td><form method="POST">
<input type="hidden" name="iid" value="'.$row['id'].'">
<button name="delete" class="btn btn-danger">Delete</button>
</form></td>
</tr>
	';
}
?>
</table>

                      
                       
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
          <h4 class="modal-title">Add new</h4>
        </div>
        <div class="modal-body">


      	
<form id="app_form" name="app_form" action="process" method="POST">



<div class="row">
	
	<div class="col-4">
		<label for="institution">Institution</label>
		<input type="text" name="institution" id="institution" class="form-control" required="true">
	</div>

	<div class="col-4">
		<label for="certificate">Certificate</label>
		<input type="text" name="certificate" id="certificate" class="form-control" required="true">
	</div>

	<div class="col-2">
		<label for="datefrom">From</label>
		<input type="text" name="datefrom" id="datefrom" class="form-control" required="true">
	</div>
	<div class="col-2">
		<label for="datefrom">To</label>
		<input type="text" name="dateto" id="dateto" class="form-control" required="true">
	</div>
</div>
		
<br>
		<!--<button class="btn btn-success" name="add_school">ADD</button>-->
	</form>

        </div>
        <div class="modal-footer">
             <button type="submit" name="add_school" class="btn btn-success">Add</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      </form>
    </div>
  </div>
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