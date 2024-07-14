<?php include 'header2.php';
?>

  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

  
  <!--<script src="jquery-1.11.0.min.js" type="text/javascript"></script>-->

  <!--<script type="text/javascript" src="Dynamic_State_LGA.js"></script>-->

            <link media="all" type="text/css" rel="stylesheet" href="assets/libs/data-table/datatables.min.css">

    
    <section class="wrapper-bottom-sec">
        <div class="p-30">
            <h2 class="page-title">Documents Upload</h2>
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
          
       
       


	<form action="process" method="post" enctype="multipart/form-data">

    
<table class="table">


  <tr>
    <td>
   <select class="form-control" name="filename">
     
     <option>Select Description</option>
     <option value="Olevel">Olevel</option>
     <option value="Birth Certiifcate">Birth Certificate/Declaration of Age</option>
<option value="National Identification">National Identification</option>
<option value="Last Education Qualificafication">Last Education Qualificafication</option>
   </select>
    </td>

    <td>
       <input type="file" id="upload_file" class="form-control" name="upload_file" onchange="preview_image(event)"/>

   
    </td>
<tr>
  <td></td>
  <td>    <button class="btn btn-success" name="uploads">Upload File</button></td>
</tr>

  </tr>

    <tr>
<td>    <img id="output_image"/ width="200" ></td>
  </tr>

</table>
      </form>  


<table class="table">
  
  <tr>
    <td>DESCRIPTION</td>
    <td>ACTIONS</td>
  </tr>

  <?php

  extract($_POST);
  if (isset($_POST['delete'])) {
  $query3 = $dBASE->query("DELETE FROM applicant_uploads where id='$fid' And app_id='$appid'");


 echo '<script>alert("Deleted Successfully")</script>';
  }


    $query2 = $dBASE->query("SELECT * FROM applicant_uploads where app_id='$appid'");
while ($file =  $query2->fetch_assoc()) {
  echo '
<tr>
<td>'.$file['type'].'</td>
<td><form action="" method="post"><a href="docs/'.$file['url'].'" class="btn btn-info" target="b_lank">View</a>
<input type="hidden" value="'.$file['id'].'" name="fid">
<button name="delete" class="btn btn-danger">DELETE</button>
</form>
</td>

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