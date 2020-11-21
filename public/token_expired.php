<?php 
    require_once __DIR__. "/../autoload/autoload.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <!--title-->
    <title>Classroom</title>

    <!--css file-->
    <link href="css/style.css" rel="stylesheet" type="text/css" />

    <!--js file-->
    <script src="main.js"></script>

    <!--Bootstrap 4-->
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!--font-awnsome-->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
  </head>
  <body>
    <body class="signUp-body">
      <div class="top-container">
        <span><img class="logo" src="image/logov2.png" /></span>
      </div>
    
            
            <!-- success message -->
            <div class="container">
              <div class="row">
                <div class="col-md-6 mt-5 mx-auto p-3 border rounded bg-light">
                  <h3 class="text-danger"><i class="fa fa-times-rectangle m-2 text-danger"></i>Unfortunately </h4>
                  
                  <div class="alert alert-danger pl-1">
                    <strong>Fail!</strong> Your token has been expired. 
                  </div>
                  <a href="forget_password.php">Click here</a> <span>to request one more time</span>
                </div>
              </div>
            </div>

      
    </body>
  </body>
</html>
