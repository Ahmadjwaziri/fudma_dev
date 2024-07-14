<?php include 'header2.php';

?>

  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

            <link media="all" type="text/css" rel="stylesheet" href="assets/libs/data-table/datatables.min.css">
<script src="https://cdn.jsdelivr.net/gh/linways/table-to-excel@v1.0.4/dist/tableToExcel.js"></script>
    
    <section class="wrapper-bottom-sec">
        <div class="p-30">
            <h2 class="page-title">Payment Schedule</h2>
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
                <button id="btnExport">EXPORT REPORT</button>

                            <table class="table data-table table-hover table-ultra-responsive">
                                <thead>
                                <tr>
                                    <th style="width: 10%;">id#</th>
                                    <th style="width: 20%;">Type</th>
                                    <th style="width: 20%;">Program</th>
                                    <th style="width: 20%;">Level</th>
                                    <th style="width: 20%;">Indigene</th>
                                    <th style="width: 20%;">Non-Indigene</th>
                                    <!--<th style="width: 20%;">Actions</th>-->
                                </tr>
                                </thead>
                                <tbody>

<?php $query = $dBASE->query("SELECT * FROM payment_schedule ORDER BY id DESC");
$i = 1;
while ($row = $query->fetch_array()) {
   echo '<tr>

                                        <td>'.$i++.'</td>
                                       <td>'.$row['paymentname'].'</td>
                                       <td>'.$row['program'].'</td>
                                       <td>'.$row['level'].'</td>
                                       <td>'.number_format($row['indigene'],2).'</td>
                                       <td>'.number_format($row['non-indigene'],2).'</td>
                
                                   </tr>';

  
}

?>
                                
                                </tbody>
                            </table>
                        </div>
       
                      
                       
                        </div></div>
                    </div>
                </div>
</div>
                </div>

            </div>

<?php include 'footer2.php';?>
 
 <script>
 
 
 $(document).ready(function(){
    $("#btnExport").click(function() {
        let table = document.getElementsByTagName("table");
        TableToExcel.convert(table[0], { // html code may contain multiple tables so here we are refering to 1st table tag
           name: `JSIITApplicantsHistory.xlsx`, // fileName you could use any name
           sheet: {
              name: 'Sheet 1' // sheetName
           }
        });
    });
});
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