<?php 
    require_once __DIR__. "/../autoload/autoload.php";
    $error = "";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
      $data = [
        "email" => postInput('email'),
        "password" => postInput('psw')
      ];
      $data_user = $db -> fetchOne('user',"email = '".$data['email']."'");  
      if (password_verify($data['password'],$data_user['password'])) {
          $_SESSION['success'] = "Sign up successful";
          unset($_SESSION['error']);
          Header("Location:index.html");
          
      } else {
        $error = "Email or password is incorrect. Please enter again";
      }
    }
    
    
    
    
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
  <body class="login-body">
    <!--container top-->
    <div class="top-container">
      <span><img class="logo" src="image/logov2.png" /></span>
    </div>

    <!--form start-->
    <div class="form-container" >
      <form method="post" action="#" onsubmit= "return validateInput()">
        <div class="form-login-container">
          <h1>Sign In</h1>
          <br />

          <label for="email"><i class="fa fa-envelope"></i>Email address</label>
          <input
            type="text"
            placeholder="Enter Email"
            name="email"
            id="email"
            
          /><br />

          <label for="psw"><i class="fa fa-lock"></i>Password</label>
          <input
            type="password"
            placeholder="Enter Password"
            name="psw"
            id="psw"
            
          /><br />
          <p class="error-notification" id = "error-message" >
            <i class="fa fa-times-circle"></i> 
          </p>
          <?php if($error!=""):?>
          <p class="error-notification" id = "error-message" >
            <i class="fa fa-times-circle"></i> <?php echo $error ?>
          </p>
          <?php endif?>
          <label>
            <input type="checkbox" name="remember" />
            Remember me </label
          ><br />
          <button class="btn-login">Sign in</button><br />
          <button class="btn-login">Create an account</button><br />
          <a href="forget_password.php" dodgerblue>Forgot your password?</a>
        </div>
      </form>
    </div>
  </body>
</html>
