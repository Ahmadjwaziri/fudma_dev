<?php include 'header2.php';
?>
    
    <section class="wrapper-bottom-sec">
        <div class="p-30"></div>
        <div class="p-15 p-t-none p-b-none m-l-10 m-r-10">
                </div>
        
   <div class="row">

            <div class="col-lg-12">
                <div class="panel-body">
                    <div class="row text-center">

                        <div class="col-sm-3 m-b-15">
                            <div class="z-shad-1">
                                <div class="bg-success text-white p-15 clearfix">
                                    <span class="pull-left font-45 m-l-10"><i class="fa fa-users"></i></span>

                                    <div class="pull-right text-right m-t-15">
                                        <span class="small m-b-5 font-15"><?php
                                        $query1 = $dBASE->query("SELECT * FROM applicants");
                                        $count1 = $query1->num_rows;
                                        echo $count1; 
                                        ?> Applicants</span>
                                        <br>
                                        <!--<a href="Applicants" class="btn btn-complete btn-xs text-uppercase">View All</a>-->
                                    </div>

                                </div>
                            </div>
                        </div>


                        <div class="col-sm-3 m-b-15">
                            <div class="z-shad-1">
                                <div class="bg-complete text-white p-15 clearfix">
                                    <span class="pull-left font-45 m-l-10"><i class="fa fa-users"></i></span>

                                    <div class="pull-right text-right m-t-15">
                                        <span class="small m-b-5 font-15"><?php
                                        $query2 = $dBASE->query("SELECT * FROM students");
                                        $count2 = $query2->num_rows;
                                        echo $count2; 
                                        ?> Students</span>
                                        <br>
                                        <!--<a href="#" class="btn btn-success btn-xs text-uppercase">View All</a>-->
                                    </div>

                                </div>
                            </div>
                        </div>


                        <div class="col-sm-3 m-b-15">
                            <div class="z-shad-1">
                                <div class="bg-primary text-white p-15 clearfix">
                                    <span class="pull-left font-45 m-l-10"><i class="fa fa-credit-card"></i></span>

                                    <div class="pull-right text-right m-t-15">
                                        <span class="small m-b-5 font-15"><?php
                                        $query2 = $dBASE->query("SELECT * FROM paystack_pay WHERE status='PAID'");
                                        $count2 = $query2->num_rows;
                                        echo $count2;
                                        ?>  Payment (approved)</span>
                                        <br>
                                        <!--<a href="Orders" class="btn btn-complete btn-xs text-uppercase">View All</a>-->
                                    </div>

                                </div>
                            </div>
                        </div>


                        <div class="col-sm-3 m-b-15">
                            <div class="z-shad-1">
                                <div class="bg-complete-darker text-white p-15 clearfix">
                                    <span class="pull-left font-45 m-l-10"><i class="fa fa-credit-card"></i></span>

                                    <div class="pull-right text-right m-t-15">
                                        <span class="small m-b-5 font-15"><?php
                                        $query2 = $dBASE->query("SELECT * FROM applicant_admission WHERE status='ADMITTED'");
                                        $count2 = $query2->num_rows;
                                        echo $count2;
                                        ?> Admitted (applicant)</span>
                                        <br>
                                        <!--<a href="PaymentHis"-->
                                        <!--   class="btn btn-success btn-xs text-uppercase">View All</a>-->
                                    </div>

                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>




                        </div>
                    </div>
                </div>

            </div>
        </div>


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

