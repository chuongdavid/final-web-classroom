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
      <?php 
        $error = '';
        $message = '';
        if(isset($_GET['email']) && isset($_GET['vkey'])){
          $email = $_GET['email'];
          $vkey = $_GET['vkey'];
          if(filter_var($email,FILTER_VALIDATE_EMAIL)==false){
            $error = 'Invalid email address';
          }
          else if(strlen($vkey)!=32){
            $error = 'Invalid vkey format';
          }
          else{
            //check data base
            $result = $db -> fetchOne('user',"email = '".$email."' AND vkey = '".$vkey."' ");
            if(count($result)==0){
              $error = 'Email adress or vkey not found';
            }
            else{
              $data = [
                "verified" => 1,
                "vkey" => ""
              ];
              $db -> update('user',$data,array('email' => $email));
              $message = "Your account has been activated. Please login to countinue.";
            }
          }
        }
        else{
          $error = 'Invalid activation url';
        }
      ?>
      <?php 
        if(!empty($error)){
            ?>
            <!-- error message -->
            <div class="container">
              <div class="row">
                <div class="col-md-6 mt-5 mx-auto p-3 border rounded bg-light">
                  <h4>Account Verification</h4>
                  <div class="alert alert-danger pl-1">
                    <strong>Fail!</strong> <?php echo $error ?>.
                  </div>
                  <p><a href="login.php">Click here</a>&nbsp to log in</p>
                  <a href="login.php" class="btn btn-primary px-5">Log in</a>
                </div>
              </div>
            </div>
            <?php
        }else{
          ?>
            <!-- success message -->
            <div class="container">
              <div class="row">
                <div class="col-md-6 mt-5 mx-auto p-3 border rounded bg-light">
                  <h4>Account Verification</h4>
                  <div class="alert alert-success pl-1">
                    <strong>Success!</strong> <?php echo $message ?>.
                  </div>
                  <p><a href="login.php">Click here</a>&nbsp to log in</p>
                  <a href="login.php" class="btn btn-primary px-5">Log in</a>
                </div>
              </div>
            </div>
          <?php
        }
      ?>
      
    </body>
  </body>
</html>
