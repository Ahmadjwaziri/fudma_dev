<?php include 'header2.php';
// $app_query = $dBASE->query("SELECT * FROM applicant_info where app_id='$appid'");
// $app_row = $app_query->fetch_array();

$query2 = $dBASE->query("SELECT * FROM olevel where app_id='$appid'");
$o_row = $query2->fetch_array();
$subjects = array('ARABIC',
'AGRICULTURAL SCIENCE',
'AUTO PARTS MERCHANDISING',
'MATHEMATICS',
'AUTO MECHANICS',
'AUTO MECHANICAL WORK',
'AUTO ELECTRICAL WORK',
'AUTO BODY REPAIRS AND SPRAY PAINTING',
'APPLIED ELECTRICITY OR BASIC ELECTRICITY',
'ANIMAL HUSBANDRY',
'BUSINESS MANAGEMENT',
'BUILDING CONSTRUCTION',
'BOOK KEEPING',
'BLOCKLAYING, BRICKLAYING AND CONCRETING',
'BIOLOGY',
'BASKETRY',
'CROP HUSBANDRY AND HORTICULTURE',
'COSMETOLOGY',
'COMPUTER STUDIES',
'COMMERCE',
'CLOTHING AND TEXTILES',
'CLERICAL OFFICE DUTIES',
'CIVIC EDUCATION',
'CHRISTIAN RELIGIOUS STUDIES',
'CHEMISTRY',
'CERAMICS',
'CATERING CRAFT PRACTICE',
'CAPENTRY AND JOINERY',
'DYEING & BLEACHING',
'DATA PROCESSING',
'ENGLISH LANGUAGE',
'ELECTRONICS OR BASIC ELECTRONICS',
'ELECTRICAL INSTALLATION AND MAINTENANCE',
'EFIK',
'EDO',
'ECONOMICS',
'FURTHER MATHEMATICS',
'FURNITURE MAKING',
'FRENCH',
'FORESTRY',
'FOODS AND NUTRITION',
'FISHERIES',
'FINANCIAL ACCOUNTING',
'TYPEWRITING',
'TOURISM',
'TEXTILES',
'TECHNICAL DRAWING',
'STORE MANAGEMENT',
'STORE KEEPING WAEC',
'SOCIAL STUDIES',
'SHORTHAND',
'SCULPTURE',
'SALESMANSHIP',
'REFRIGERATION AND AIR CONDITIONING',
'RADIO,TELEVISION AND ELECTRONICS WORKS',
'PRINTING CRAFT PRACTICE',
'PRINCIPLES OF COST ACCOUNTING',
'PLUMBING AND PIPE FITTING',
'PICTURE MAKING',
'PHYSICS',
'PHYSICAL EDUCATION',
'PHOTOGRAPHY',
'PAINTING AND DECORATING',
'OFFICE PRACTICE',
'MUSIC',
'MINING',
'METALWORK',
'MARKETING',
'MACHINE WOODWORKING',
'LITERATURE IN ENGLISH',
'LEATHERWORK',
'LEATHER GOODS',
'JEWELLERY',
'ISLAMIC RELIGIOUS STUDIES',
'INTEGRATED SCIENCE',
'INSURANCE',
'INFORMATION AND COMMUNICATION TECHNOLOGY',
'IGBO',
'IBIBIO',
'HOME MANAGEMENT',
'HISTORY',
'HEALTH EDUCATION OR HEALTH SCIENCE',
'HAUSA',
'GSM PHONES MAINTENANCE AND REPAIRS',
'GRAPHIC DESIGN',
'GOVERNMENT',
'GHANAIAN LANGUAGES',
'GEOGRAPHY',
'GENERAL MATHEMATICS OR MATHEMATICS',
'GENERAL KNOWLEDGE IN ART',
'GENERAL AGRICULTURE',
'GARMENT MAKING',
'VISUAL ART',
'UPHOLSTERY',
'WOODWORK',
'WEST AFRICAN TRADITIONAL RELIGION',
'WELDING AND FABRICATION ENGINEERING CRAFT PRACTICE',
'YORUBA');

$grades = array('A1','B2','B3', 'C6', 'C5', 'C4', 'D7', 'E8');
$exams = array('NECO', 'WAEC', 'NABTEB', 'NBAIS');
?>

  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

  
  <!--<script src="jquery-1.11.0.min.js" type="text/javascript"></script>-->

  <!--<script type="text/javascript" src="Dynamic_State_LGA.js"></script>-->

            <link media="all" type="text/css" rel="stylesheet" href="assets/libs/data-table/datatables.min.css">

    
    <section class="wrapper-bottom-sec">
        <div class="p-30">
            <h2 class="page-title">O'LEVEL</h2>
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
    <div class="col-lg-5">
        <h5>First Sitting</h5>
        <hr>
        <form action="process.php" method="POST">
    <div class="form-group">     
<select name="exam_1" class="form-control selectpicker" data-live-search="true">
<option><?php echo $o_row['exam_1'];?></option>
<?php
foreach($exams As $exam){
echo '<option value="'.$exam.'">'.$exam.'</option>';
} ?>
</select>
</div> 

<div class="form-group">     
<?php 
$already_selected_value = $o_row['year_1'];
$earliest_year = 1950;
print '<select name="year_1" class="form-control selectpicker" data-live-search="true">';
foreach (range(date('Y'), $earliest_year) as $x) {
    print '<option value="'.$x.'"'.($x === $already_selected_value ? ' selected="selected"' : '').'>'.$x.'</option>';
}
print '</select>';
?>
</div>
<div class="form-group">     
<input type="text" name="regno_1" class="form-control" placeholder="Reg No" value="<?php echo $o_row['regno_1'];?>">
</div>            
            <table class="table">
                <tr>
                    <td>Subject</td>
                    <td>Grade</td>
                </tr>
                
                <tr>
                    <td>
                        <select name="sub_1_1" class="form-control selectpicker" data-live-search="true">
                            <option><?php echo $o_row['sub_1_1'];?></option>
                            <?php
                            foreach($subjects As $sub){
                            echo '<option value="'.$sub.'">'.$sub.'</option>';
                            }
                            ?>
                        </select>
                    </td>
                    
                    <td>
                        <select name="grade_1_1" class="form-control selectpicker" data-live-search="true">
                            <option><?php echo $o_row['grade_1_1'];?></option>
                            <?php
                            foreach($grades As $grade){
                            echo '<option value="'.$grade.'">'.$grade.'</option>';
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                
                
                
                   <tr>
                    <td>
                        <select name="sub_1_2" class="form-control selectpicker" data-live-search="true">
                            <option><?php echo $o_row['sub_1_2'];?></option>
                            <?php
                            foreach($subjects As $sub){
                            echo '<option value="'.$sub.'">'.$sub.'</option>';
                            }
                            ?>
                        </select>
                    </td>
                    
                    <td>
                        <select name="grade_1_2" class="form-control selectpicker" data-live-search="true">
                            <option><?php echo $o_row['grade_1_2'];?></option>
                            <?php
                            foreach($grades As $grade){
                            echo '<option value="'.$grade.'">'.$grade.'</option>';
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                
                
                <tr>
                    <td>
                        <select name="sub_1_3" class="form-control selectpicker" data-live-search="true">
                            <option><?php echo $o_row['sub_1_3'];?></option>
                            <?php
                            foreach($subjects As $sub){
                            echo '<option value="'.$sub.'">'.$sub.'</option>';
                            }
                            ?>
                        </select>
                    </td>
                    
                    <td>
                        <select name="grade_1_3" class="form-control selectpicker" data-live-search="true">
                            <option><?php echo $o_row['grade_1_3'];?></option>
                            <?php
                            foreach($grades As $grade){
                            echo '<option value="'.$grade.'">'.$grade.'</option>';
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                
                
                
                <tr>
                    <td>
                        <select name="sub_1_4" class="form-control selectpicker" data-live-search="true">
                            <option><?php echo $o_row['sub_1_4'];?></option>
                            <?php
                            foreach($subjects As $sub){
                            echo '<option value="'.$sub.'">'.$sub.'</option>';
                            }
                            ?>
                        </select>
                    </td>
                    
                    <td>
                        <select name="grade_1_4" class="form-control selectpicker" data-live-search="true">
                            <option><?php echo $o_row['grade_1_4'];?></option>
                            <?php
                            foreach($grades As $grade){
                            echo '<option value="'.$grade.'">'.$grade.'</option>';
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                
                
                <tr>
                    <td>
                        <select name="sub_1_5" class="form-control selectpicker" data-live-search="true">
                            <option><?php echo $o_row['sub_1_5'];?></option>
                            <?php
                            foreach($subjects As $sub){
                            echo '<option value="'.$sub.'">'.$sub.'</option>';
                            }
                            ?>
                        </select>
                    </td>
                    
                    <td>
                        <select name="grade_1_5" class="form-control selectpicker" data-live-search="true">
                            <option><?php echo $o_row['grade_1_5'];?></option>
                            <?php
                            foreach($grades As $grade){
                            echo '<option value="'.$grade.'">'.$grade.'</option>';
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <select name="sub_1_6" class="form-control selectpicker" data-live-search="true">
                            <option><?php echo $o_row['sub_1_6'];?></option>
                            <?php
                            foreach($subjects As $sub){
                            echo '<option value="'.$sub.'">'.$sub.'</option>';
                            }
                            ?>
                        </select>
                    </td>
                    
                    <td>
                        <select name="grade_1_6" class="form-control selectpicker" data-live-search="true">
                            <option><?php echo $o_row['grade_1_6'];?></option>
                            <?php
                            foreach($grades As $grade){
                            echo '<option value="'.$grade.'">'.$grade.'</option>';
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                
                
                <tr>
                    <td>
                        <select name="sub_1_7" class="form-control selectpicker" data-live-search="true">
                            <option><?php echo $o_row['sub_1_7'];?></option>
                            <?php
                            foreach($subjects As $sub){
                            echo '<option value="'.$sub.'">'.$sub.'</option>';
                            }
                            ?>
                        </select>
                    </td>
                    
                    <td>
                        <select name="grade_1_7" class="form-control selectpicker" data-live-search="true">
                            <option><?php echo $o_row['grade_1_7'];?></option>
                            <?php
                            foreach($grades As $grade){
                            echo '<option value="'.$grade.'">'.$grade.'</option>';
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                
                
                <tr>
                    <td>
                        <select name="sub_1_8" class="form-control selectpicker" data-live-search="true">
                            <option><?php echo $o_row['sub_1_8'];?></option>
                            <?php
                            foreach($subjects As $sub){
                            echo '<option value="'.$sub.'">'.$sub.'</option>';
                            }
                            ?>
                        </select>
                    </td>
                    
                    <td>
                        <select name="grade_1_8" class="form-control selectpicker" data-live-search="true">
                            <option><?php echo $o_row['grade_1_8'];?></option>
                            <?php
                            foreach($grades As $grade){
                            echo '<option value="'.$grade.'">'.$grade.'</option>';
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                
                
                <tr>
                    <td></td>
                    <td><button name="save_1_1" class="btn btn-success" type="submit">Save</button></td>
                </tr>
            </table>
            
        </form>
        
    </div>
    
    
    <div class="col-lg-5">
        <h5>Second Sitting</h5>
        <hr>
        <form action="process.php" method="POST">
    
    <div class="form-group">     
<select name="exam_2" class="form-control selectpicker" data-live-search="true">
<option><?php echo $o_row['exam_2'];?></option>
<?php
foreach($exams As $exam){
echo '<option value="'.$exam.'">'.$exam.'</option>';
} ?>
</select>
</div> 

<div class="form-group">     
<?php 
$already_selected_value = $o_row['year_2'];
$earliest_year = 1950;
print '<select name="year_2" class="form-control selectpicker" data-live-search="true">';
foreach (range(date('Y'), $earliest_year) as $x) {
    print '<option value="'.$x.'"'.($x === $already_selected_value ? ' selected="selected"' : '').'>'.$x.'</option>';
}
print '</select>';
?>
</div>
<div class="form-group">     
<input type="text" name="regno_2" class="form-control" placeholder="Reg No" value="<?php echo $o_row['exam_2'];?>">
</div>
            
            
            <table class="table">
                <tr>
                    <td>Subject</td>
                    <td>Grade</td>
                </tr>
                
                <tr>
                    <td>
                        <select name="sub_2_1" class="form-control selectpicker" data-live-search="true">
                            
<option><?php echo $o_row['sub_2_1'];?></option>
                            <?php
                            foreach($subjects As $sub){
                            echo '<option value="'.$sub.'">'.$sub.'</option>';
                            }
                            ?>
                        </select>
                    </td>
                    
                    <td>
                        <select name="grade_2_1" class="form-control selectpicker" data-live-search="true">
                            <option><?php echo $o_row['grade_2_1'];?></option>
                            <?php
                            foreach($grades As $grade){
                            echo '<option value="'.$grade.'">'.$grade.'</option>';
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                
                
                
                   <tr>
                    <td>
                        <select name="sub_2_2" class="form-control selectpicker" data-live-search="true"">
                            <option><?php echo $o_row['sub_2_2'];?></option>
                            <?php
                            foreach($subjects As $sub){
                            echo '<option value="'.$sub.'">'.$sub.'</option>';
                            }
                            ?>
                        </select>
                    </td>
                    
                    <td>
                        <select name="grade_2_2" class="form-control selectpicker" data-live-search="true">
                            <option><?php echo $o_row['grade_2_2'];?></option>
                            <?php
                            foreach($grades As $grade){
                            echo '<option value="'.$grade.'">'.$grade.'</option>';
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                
                
                <tr>
                    <td>
                        <select name="sub_2_3" class="form-control selectpicker" data-live-search="true">
                            <option><?php echo $o_row['sub_2_3'];?></option>
                            <?php
                            foreach($subjects As $sub){
                            echo '<option value="'.$sub.'">'.$sub.'</option>';
                            }
                            ?>
                        </select>
                    </td>
                    
                    <td>
                        <select name="grade_2_3" class="form-control selectpicker" data-live-search="true">
                           <option><?php echo $o_row['grade_2_3'];?></option>
                            <?php
                            foreach($grades As $grade){
                            echo '<option value="'.$grade.'">'.$grade.'</option>';
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                
                
                
                <tr>
                    <td>
                        <select name="sub_2_4" class="form-control selectpicker" data-live-search="true">
                            <option><?php echo $o_row['sub_2_4'];?></option>
                            <?php
                            foreach($subjects As $sub){
                            echo '<option value="'.$sub.'">'.$sub.'</option>';
                            }
                            ?>
                        </select>
                    </td>
                    
                    <td>
                        <select name="grade_2_4" class="form-control selectpicker" data-live-search="true">
                            <option><?php echo $o_row['grade_2_4'];?></option>
                            <?php
                            foreach($grades As $grade){
                            echo '<option value="'.$grade.'">'.$grade.'</option>';
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                
                
                <tr>
                    <td>
                        <select name="sub_2_5" class="form-control selectpicker" data-live-search="true">
                            <option><?php echo $o_row['sub_2_5'];?></option>
                            <?php
                            foreach($subjects As $sub){
                            echo '<option value="'.$sub.'">'.$sub.'</option>';
                            }
                            ?>
                        </select>
                    </td>
                    
                    <td>
                        <select name="grade_2_5" class="form-control selectpicker" data-live-search="true">
                            <option><?php echo $o_row['grade_2_5'];?></option>
                            <?php
                            foreach($grades As $grade){
                            echo '<option value="'.$grade.'">'.$grade.'</option>';
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <select name="sub_2_6" class="form-control selectpicker" data-live-search="true">
                            <option><?php echo $o_row['sub_2_6'];?></option>
                            <?php
                            foreach($subjects As $sub){
                            echo '<option value="'.$sub.'">'.$sub.'</option>';
                            }
                            ?>
                        </select>
                    </td>
                    
                    <td>
                        <select name="grade_2_6" class="form-control selectpicker" data-live-search="true">
                            <option><?php echo $o_row['grade_2_6'];?></option>
                            <?php
                            foreach($grades As $grade){
                            echo '<option value="'.$grade.'">'.$grade.'</option>';
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                
                
                <tr>
                    <td>
                        <select name="sub_2_7" class="form-control selectpicker" data-live-search="true">
                            <option><?php echo $o_row['sub_2_7'];?></option>
                            <?php
                            foreach($subjects As $sub){
                            echo '<option value="'.$sub.'">'.$sub.'</option>';
                            }
                            ?>
                        </select>
                    </td>
                    
                    <td>
                        <select name="grade_2_7" class="form-control selectpicker" data-live-search="true"">
                            <option><?php echo $o_row['grade_2_7'];?></option>
                            <?php
                            foreach($grades As $grade){
                            echo '<option value="'.$grade.'">'.$grade.'</option>';
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                
                
                <tr>
                    <td>
                        <select name="sub_2_8" class="form-control selectpicker" data-live-search="true">
                            <option><?php echo $o_row['sub_2_8'];?></option>
                            <?php
                            foreach($subjects As $sub){
                            echo '<option value="'.$sub.'">'.$sub.'</option>';
                            }
                            ?>
                        </select>
                    </td>
                    
                    <td>
                        <select name="grade_2_8" class="form-control selectpicker" data-live-search="true">
                            <option><?php echo $o_row['grade_2_8'];?></option>
                            <?php
                            foreach($grades As $grade){
                            echo '<option value="'.$grade.'">'.$grade.'</option>';
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                
                
                <tr>
                    <td></td>
                    <td><button name="save_2_2" class="btn btn-success" type="submit">Save</button></td>
                </tr>
            </table>
            
        </form>
        
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