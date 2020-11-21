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
      <?php 
      $message = "Enter your email to continue.";
      $error = "";
      $email = '';
      if(isset($_POST['email'])){
        $email = $_POST['email'];
        if(empty($email)){
          $error = 'Please enter your email';
        }
        else if(filter_var($email,FILTER_VALIDATE_EMAIL)==false){
          $error = "This is not a valid email address";
        }
        else{
          reset_password($email);
          $message = "If your email exists in database, you will receive an email to reset your pass word.";
        }
      }
      ?>
      <div class="top-container">
        <span><img class="logo" src="image/logov2.png" /></span>
      </div>
      <!--form start-->
    <div class="form-container">
      <form
        action="#"
        method="post"
      >
        <div class="form-change-pass-container">
          <h1>Reset password</h1>
          <br />

          <label for="email">Email address</label>
          <input
            type="text"
            placeholder="Enter Email"
            name="email"
            id="email-changepass"
          /><br />
          <div class="form-group text-primary pl-1">
              <strong><p><?php echo $message ?></p></strong>
          </div>
          <?php 
            if(!empty($error)){
              ?>           
              <div class="alert alert-danger"><i class="fa fa-times-circle"></i><?php echo $error ?></div>
              <?php
            }
          ?>
          <button class="btn-change-password">Change password</button><br />
        </div>
      </form>
    </div>
    </body>