<!DOCTYPE html>
<html lang="en">
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../assets/img/logo.png">

    <title>Application - Jigawa State Institute of Information Technology, Kazaure</title>

    <!-- Bootstrap core CSS -->
    <link href="build/css/bootstrap.min.css" rel="stylesheet">
    <link href="build/css/font-awesome.min.css" rel="stylesheet">
    <link href="build/css/style.css" rel="stylesheet">

    <style>
      .ajax_loader{
        background: url(build/images/Preloader_8.gif);
        background-repeat: no-repeat;
        background-position: center; 
        background-size:auto;
        height:50px;
        cursor:default;
        z-index:-1;
      }
    </style>
   <style>
#tooltip {
}

#tooltip #tooltiptext {
    visibility: hidden;
    width: 90%;
    background-color:red;;
    color: #ED1C24;
    text-align: right;
    border-radius: 6px;
    padding: 5px;

    /* Position the tooltip */
    position: absolute;
    z-index: 1;
}

#tooltip:hover #tooltiptext {
    visibility: visible;
}
</style>
  </head>

  <body style="padding-top:70px;">

    <div class="container">

      <div class="row">

        <div class="col-md-4"></div>
        <div class="col-md-4">



          <div class="flip">
        <div class="card"> 
          <div class="face front"> 
              


            <div class="panel panel-default" >

                   <form class="form-horizontal" name="sign_in_form" id="sign_in_form">
               

                <h1 class="text-center"><img src="../assets/img/logo.png" width="100"></h1>
                <center><h4>Application Portal</h4></center>

                <br>
         <select class="form-control" id="program" name="program">
             <option value="NATIONAL">NATIONAL DIPLOMA</option>
             <option value="INTERNATIONAL">INTERNATIONAL</option>
             <option value="PROFESSIONAL">PROFESSIONAL</option>
             
         </select>
<input class="form-control" placeholder="Fullname" id="fullname" name="fullname" type="text" autocomplete="on" required="true" />


               <input class="form-control" placeholder="Email" id="email" name="email" type="email" autocomplete="on" required="true" />


               <input class="form-control" placeholder="Password" id="password" name="password" type="password" required="true" />
     <p id="sign_in_result"><button class="btn btn-primary btn-block" id="btn_sign_in">CREATE ACCOUNT</button></p>

<div id="haqq"></div>

                <hr>


                <center><a href="index">Already Applied?</a></center>
              </form>

            </div>


          </div> 
        




          </div>
        </div>   
      </div>




        </div>
        <div class="col-md-4"></div>

      </div>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="build/js/jquery.min.js"></script>
    <script src="build/js/bootstrap.min.js"></script>
    <script>

    $('.fliper-btn').click(function(){
    $('.flip').find('.card').toggleClass('flipped');

});

    
    </script>


    <script>
      $(document).ready(function(){
        $("#sign_in_form").on('submit',function(e){
          e.preventDefault();
          
          $("#email").prop('disabled', true);
          $("#password").prop('disabled', true);
          $("#fullanme").prop('disabled', true);
          $("#progam").prop('disabled', true);
          

          $("#btn_sign_in").prop("disabled", true);
          $("#btn_sign_in").html("");
          $("#btn_sign_in").blur();
          $("#btn_sign_in").removeClass("btn-primary");
          $("#haqq").addClass("ajax_loader")

          $.ajax({
            url: "doregister.php",
            type: "POST",
            data: {
              email: $("#email").val(),
              password: $("#password").val(),
              fullname: $("#fullname").val(),
              program: $("#program").val()
            },
            beforeSend: function(){
                $("#btn_sign_in").prop("disabled", true);
            },
            success: function(result){
              $("#sign_in_result").html(result);
            },
            error: function(){
              $("#btn_sign_in").prop("disabled", false);
            }
          });
        });
      });
    </script>

  </body>
</html>




      