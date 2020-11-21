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
  <body class="change-pass-body">
    <?php 
    
    $error = '';
    $message = '';
    $dis_message = filter_input(INPUT_GET,FILTER_VALIDATE_EMAIL);
    if(isset($_GET['email']) && isset($_GET['token'])){
        $email = $_GET['email'];
        $token = $_GET['token'];
        if(filter_var($email,FILTER_SANITIZE_EMAIL)===false){
          $error = 'This is not a valid email adress';
        }
        else if(strlen($token) != 32){
          $error = 'This is not a valid reset token';
        }
        else{
          // xử lý post
          $data_user = $db -> fetchOne('reset_token',"email = '".$email."'");
            if($data_user['expire_on'] < time()){
              header('Location: token_expired.php');
            }
            else{
              if(isset($_POST['new-pass'])){
                $data = [
                  'password' => password_hash($_POST['new-pass'],PASSWORD_DEFAULT) 
                ];
                $db -> update('user',$data,array('email' => $email));
                header('Location: success_reset_pass.php');
              }
            }
            
        }
    }
    else{
        $error = "Invalid email address or token";
    }

    
    ?>
    <!--container top-->
    <div class="top-container">
      <span><img class="logo" src="image/logov2.png" /></span>
    </div>
    <?php
    if(!empty($error)){
      //do something right
      ?>
      <div class="form-container">
      <form
        action="#"
        method="post">
        <div class="form-change-pass-container">
          <h1>Reset password</h1>
          <br />
        <div class='alert alert-danger'><?php echo $error ?></div>
        </div>
      </form>
      </div>
      <?php
    }
    else{
      //do something wrong
      ?> 
      
       <!--form start-->
    <div class="form-container">
      <form
        action="#"
        method="post"
        onsubmit="return validateInputchangePass2()"
      >
        <div class="form-change-pass-container">
          <h1>Reset password</h1>
          <br />
          <label for="email">Email</label>
          <input
            type="text"
            name="email"
            id="email"
            value="<?php echo $email ?>"
            readonly
          /><br />
          <label for="new-pass">New password</label>
          <input
            type="text"
            placeholder="Enter your password"
            name="new-pass"
            id="new-pass"
          /><br />
          <label for="repass">Confirm password</label>
          <input
            type="text"
            placeholder="Enter your password again"
            name="repass"
            id="repass"
          /><br />
          <p class="error-notification" id="error-message-changepass2">
            <i class="fa fa-times-circle"></i>Error
          </p>
          <button class="btn-change-password">Reset password</button><br />
        </div>
      </form>
    </div>
      
      <?php
    }
    ?>
  </body>
</html>
