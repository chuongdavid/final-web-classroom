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
    <body class="signUp-body">
      <div class="top-container">
        <span><img class="logo" src="image/logov2.png" /></span>
      </div>
      <?php 
        $error = '';
        $message = '';
        if(isset($_GET['email']) && isset($_GET['id_student']) && isset($_GET['id_class'])){
            $id_student = $_GET['id_student'];
            $email = $_GET['email'];
            $id_class = $_GET['id_class'];
          if(filter_var($email,FILTER_VALIDATE_EMAIL)==false){
            $error= 'Invalid email address';
          }
          else{
            //check data base
            $data_student = $db -> fetchOne('user',"id = '".$id_student."'");
            $data_class = $db -> fetchOne('class',"id = '".$id_class."'");
            if(count($data_student)==0){
              $error= ' Student not found ';
            }
            elseif(count($data_class)==0){
              $error= ' Class not found ';
            }
            else{
                $data = ['id_student'=>$id_student,
                        'id_class'=>$id_class,
            ];
                if(isset($_POST['accept'])){
                    $insert_class = $db -> insert('student_class',$data);
                    if(count($insert_class)>0){
                        $message=' Accept this student ';
                    }
                    else{
                        $error =' Join class fail! ';
                    }
                }
                if(isset($_POST['refuse'])){
                    $error =' Refuse this student. ';
                }
            }
          }
        }
        else{
          $error = ' Invalid activation url ';
        }
      ?>

            <div class="container">
              <div class="row">
                <div class="col-md-6 mt-5 mx-auto p-3 border rounded bg-light">
                  <h4>Join in class request</h4>
                  <?php if(!empty($error)){
                      ?> 
                        <div class="alert alert-danger pl-1">
                        <strong>Fail!</strong> <?php echo $error ?>.
                        </div>
                      <?php
                  }
                      ?> 
                      <?php if(!empty($message)) {
                        ?>
                        <div class="alert alert-success pl-1">
                        <strong>Success!</strong><?php echo $message ?>.
                        </div>
                        <?php
                      } 
                      ?>
                        

                    
                    
                  <form action="" method="POST">
                    <p>Student's name: <?php echo $data_student['fullname'] ?> </p>
                    <p>Student's email: <?php echo $data_student['email'] ?> </p>
                    <p>Class name: <?php echo $data_class['name'] ?> </p>
                    <p>Class code: <?php echo $data_class['id'] ?> </p>
                    <input type="submit" name="accept" value="Accept" class="btn btn-primary">
                    <input type="submit" name="refuse" value="Refuse" class="btn btn-danger">
                </form>
                </div>
              </div>
            </div>
      
    </body>
</html>
