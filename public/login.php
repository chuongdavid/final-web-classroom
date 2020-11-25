<?php
    require_once __DIR__. "/../autoload/autoload.php";
    $error = "";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
      $data = [
        "email" => postInput('email'),
        "password" => postInput('psw')
      ];
      $data_user = $db -> fetchOne('user',"email = '".$data['email']."'");  
      if($data_user['verified']==0){
        $_SESSION['error'] = "Your account hgit asn't verified yet. Please check your email to verified your account";
      }
      else{
        if (password_verify($data['password'],$data_user['password'])) {
          if(check_role($data['email'])==0){
            $_SESSION['email'] = $data_user['email'];
            $_SESSION['id_user'] = $data_user['id'];
            header('Location:index-sinhvien.php');
          }
          else{
            $_SESSION['email'] = $data_user['email'];
            $_SESSION['id_user'] = $data_user['id'];
            header('Location:index-giaovien.php');
          }

          
      } else {
        $error = "Email or password is incorrect. Please enter again";
      }
      }
      
    }
    
    var_dump($_SESSION);
    
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
          <br/>
          <div class="clearfix" >
                        <?php if(isset($_SESSION['success'])): ?>
                            <div class="alert alert-success alert-dismissible" role="alert">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <?php echo $_SESSION['success']; unset($_SESSION['success']) ?>
                            </div>
                        <?php endif ?>
                        <?php if(isset($_SESSION['error'])): ?>
                            <div class="alert alert-danger alert-dismissible" role="alert">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <?php echo $_SESSION['error']; unset($_SESSION['error']) ?>
                            </div>
                        <?php endif ?>
          </div>

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
          <a class="btn-login text-light" href="signUp.php">Create account</a>
          <br>
          <a href="forget_password.php">Forgot your password?</a>
        </div>
      </form>
    </div>
  </body>
</html>
