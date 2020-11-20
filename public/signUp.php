
<?php 
    require_once __DIR__. "/../autoload/autoload.php";
    $error = "";
    //xử lý submit
    $username = $psw = $fullname = $date = $email = $phone = "";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
      if(isset($_POST['username']) && $_POST['username']!=NULL){
        $username = $_POST['username'];
      }
      if(isset($_POST['psw']) && $_POST['psw']!=NULL){
        $psw = $_POST['psw'];
        $hash = password_hash($psw,PASSWORD_DEFAULT);
      }
      if(isset($_POST['fullname']) && $_POST['fullname']!=NULL){
        $fullname = $_POST['fullname'];
      }
      if(isset($_POST['birthday']) && $_POST['birthday']!=NULL){
        $date = $_POST['birthday'];
      }
      if(isset($_POST['email']) && $_POST['email']!=NULL){
        $email = $_POST['email'];
      }
      if(isset($_POST['phone']) && $_POST['phone']!=NULL){
        $phone = $_POST['phone'];
      }
      $rand = random_int(0,1000);
      $vkey = md5($username .'+'.$rand);
      $data = [
        "user_name" => $username,
        "password" => $hash,
        "fullname" => $fullname,
        "date" => $date,
        "email" => $email,
        "phone" => $phone,
        "vkey"  => $vkey
      ];
      //kiểm tra email có tồn tại chưa 
      $check_email = $db -> fetchOne('user',"email = '".$data['email']."'");  
      if($check_email>0){
        $error = "This email has already existed";
      }
      else{
        //gửi email xác nhận 
        $db -> insert('user',$data);
        verify_email($email,$vkey);
        header("Location:thanksScreen.php");
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
  <!--container top-->
  <body class="signUp-body">
    <div class="top-container">
      <span><img class="logo" src="image/logov2.png" /></span>
    </div>
  <!--alert-->
      <?php if($error !=""):?>
        <div class="alert alert-danger alert-dismissible fade show m-2" role="alert">
        <?php echo $error ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
       </div>
      <?php endif ?>
      
    <!--form start-->
    <div class="form-container">
      <form action="#" method="post" onsubmit="return validateInputSignUp()">
        <div class="form-signUp-container">
          <h1>Create an account</h1>
          <br />
          <label for="username">User name</label>
          <input
            type="text"
            placeholder="Enter your username"
            name="username"
            id ="username-signup"
            value="<?php echo $username ?>"
             
          /><br />
          <label for="psw">Password</label>
          <input
            type="password"
            placeholder="Enter Password"
            name="psw"
            id ="psw-signup"
            value="<?php echo $psw ?>"
             
          /><br />
          <label for="fullname">Fullname</label>
          <input
            type="text"
            placeholder="Enter your fullname"
            name="fullname"
            id="fullname-signup"
            value="<?php echo $fullname ?>"
             
          /><br />
          <label for="birthday">Date of birth</label>
          <input type="date" name="birthday"  value="<?php echo $date ?>" required /><br />
          <label for="email">Email address</label>
          <input
            type="text"
            placeholder="Enter Email"
            name="email"
            id ="email-signup"
             
          /><br />
          <label for="phone">Phone number</label>
          <input
            type="text"
            placeholder="Enter your phone number"
            name="phone"
            id="phone-signup"
            value="<?php echo $phone ?>"
             
          /><br />
          <p class="error-notification" id="error-message-signup">
            <i class="fa fa-times-circle"></i>
          </p>
          <button class="btn-signUp">Sign up</button><br />
        </div>
      </form>
    </div>
  </body>
</html>
