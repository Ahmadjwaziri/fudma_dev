<?php include 'header2.php';

?>
    
    <section class="wrapper-bottom-sec">
        <div class="p-30"></div>
        <div class="p-15 p-t-none p-b-none m-l-10 m-r-10">
                </div>
        



        <div class="p-15 p-t-none p-b-none">
            <div class="row">

                <div class="col-lg-6">
                    <div class="panel-body">
                        <div class="row">
                            <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Transcript Status</h3>
                                </div>
                                <div class="panel-body p-none">
            
            <div class="container">
                
                 <?php 
                 echo '<br><br><a href="TranscriptRequestHistory.php" class="btn btn-info">Track Progress</a>';
               

  ?>
  
  <br/>
  <br/>
  </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="panel-body">
                        <div class="row">
                            <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Payment Status</h3>
                                </div>
                                <div class="panel-body p-none">
                                          
            <div class="container">
                
                 <?php 
                 
                //  echo $appid;
$a_query = $dBASE->query("SELECT * FROM applicants where appid='$appid'");
$a_row = $a_query->fetch_array();



if ($a_row['payment_status'] == "PAID") {
//  echo $a_row['status'];
 echo 'You dont have an outstanding Payment<br><br>';
}else{
    echo '<br><br><a href="MakePayment.php" class="btn btn-info">MAKE PAYMENT</a>';
  
 
}
  ?>
  
  <br/>
  <br/>
  </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>


        <!-- <div class="p-15 p-t-none p-b-none">
            <div class="row">

                <div class="col-lg-6">
                    <div class="panel-body">
                        <div class="row">
                            <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Update Profile Picture</h3>
                                </div>
                                <div class="panel-body p-none">
                                    <div class="container">
                                        
                                        <div class="row">
                                            
                                            <div class="col-lg-4">
                                                     <form id="form" method="post" enctype="multipart/form-data">
<div id="preview"><img width="200" class="user-avatar rounded-circle mr-5" src="<?php echo $row['pic'];?>" /></div>
	
	<input id="uploadImage" type="file" accept="image/*" name="image" class="form-control" />
<br>


<input class="btn btn-success" type="submit" value="Upload">

</form>


<br/>                                                
<br/>                                                
                                            </div>
                                        </div>
                                   
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="panel-body">
                        <div class="row">
                            <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Recent Support Tickets</h3>
                                </div>
                                <div class="panel-body p-none">
                                    <table class="table table-hover table-ultra-responsive">
                                        <thead>
                                        <tr>
                                            <th style="width: 30px;">Email</th>
                                            <th style="width: 50px;">Subject</th>
                                            <th style="width: 20px;">Date</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                                                                </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div> -->


    </section>
<?php include 'footer2.php';?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<script>
	
	$(document).ready(function (e) {
 $("#form").on('submit',(function(e) {
  e.preventDefault();
  $.ajax({
         url: "ajaxupload.php",
   type: "POST",
   data:  new FormData(this),
   contentType: false,
         cache: false,
   processData:false,
   beforeSend : function()
   {
    //$("#preview").fadeOut();
    $("#err").fadeOut();
   },
   success: function(data)
      {
    if(data=='invalid')
    {
     // invalid file format.
     $("#err").html("Invalid File !").fadeIn();
    }
    else
    {
     // view uploaded file.
     $("#preview").html(data).fadeIn();
     $("#form")[0].reset(); 
    }
      },
     error: function(e) 
      {
    $("#err").html(e).fadeIn();
      }          
    });
 }));
});
</script>
 <script>
        $(document).ready(function(){
            $('.data-table').DataTable();
        });
    </script>

