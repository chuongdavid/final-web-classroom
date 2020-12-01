<?php 

require_once __DIR__. "/../autoload/autoload.php";
// check login
if(!isset($_SESSION['email'])){
    header("Location: login.php");
}
$data_user = $db -> fetchOne('user',"email = '".$_SESSION['email']."'"); 
$id_student = $data_user['id'];
//get information class student did join
$sql = "SELECT class.*
FROM student_class 
INNER JOIN class 
ON class.id = student_class.id_class 
WHERE student_class.id_student = ".$id_student."";
$data = [];
$result = mysqli_query($db->link,$sql) or die("Lỗi Truy Vấn fetchAll " .mysqli_error($db->link));
if( $result)
{
    while ($num = mysqli_fetch_assoc($result))
    {
        $data[] = $num;
    }
}
$class = $data;

if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST['class_code'])){
        $class_code = $_POST['class_code'];
        $code = $db -> fetchOne('class',"id = '".$class_code."'");
        if($code > 0){
            $data = [
            'id_student'=>$id_student,
            'id_class' => $class_code];
            
            $check_duplicate = $db -> fetchAllCondition('student_class',"id_student = ".$id_student." AND id_class = '".$class_code."'"); 
            if(count($check_duplicate)>0){
                $_SESSION['error'] ='You have already joined this class';
            }      
            else{
                $create_class_by = $db -> fetchOne('user',"id = '".$code['created_by_id']."'");
                $checkSent = send_join_request($id_student,$class_code,$create_class_by['email']);
                if($checkSent){
                    $_SESSION['success'] ='Your request has been sent. Please wait for your teacher to accept your request';
                }
                else{
                    $_SESSION['error'] ='Send invitation fail';
                }
            }
        }
        else{
            $_SESSION['error'] ='Code class does not exist';
        }
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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>

        <!--font-awnsome-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>

    <body>
        <!--navbar-->
        <nav class="navbar navbar-expand bg-primary navbar-dark p-0 sticky-top">
            <ul class="navbar-nav w-100">
                <!--sidenav-->
                <div id="mySidenav" class="sidenav p-0">
                    <div class="text-right">
                        <i class="fa fa-times-circle fa-2x opacity color" aria-hidden="true" onclick="closeNav()"></i>
                    </div>
                    <a href="#" class="sidenav-item">
                        <div class="class-title ">
                            Môn học
                        </div>
                        <div>
                            Thay A
                        </div>
                    </a>
                    <a href="#" class="sidenav-item">Services</a>
                    <a href="#" class="sidenav-item">Clients</a>
                    <a href="#" class="sidenav-item">Contact</a>
                    <a href="#" class="sidenav-item">Log out</a>
                </div>

                <span onclick="openNav()"><img class="logo" src="image/logov2.png"></span>

                <!--left nav-->
                <li class="nav-item active">
                    <a class="nav-link" href="index.html">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">To-do</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Calendar</a>
                </li>

                <!--right nav-->
                <li class="nav-item col-md-2 ml-auto mr-0"> 
                    <a class="nav-link" href="#">
                        <label for="search"><i class="fa fa-search fa-2x"></i> </label> 
                        <input onkeyup="search(this.value)" type="text" id="search" class="search">
                    </a>
                </li>
                <li class="nav-item ml-2 mr-2">
                    <a class="nav-link" href="#">   
                        <label for="showaddjoinclassroomsinhvien"><i class="fa fa-plus fa-2x"></i> </label>
                    </a>
                </li>

                <li class="nav-item ml-2 mr-2">
                    <a class="nav-link" href="logout.php">
                        <label for="logoutbutton"><i class="fas fa-sign-out-alt fa-2x"></i></label>
                    </a>
                </li>
            </ul>
        </nav>
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
        <!--add class form-->
        <div class="form-popup full-height" id="myForm">
            <form action="/action_page.php" class="form-container">
                <h1>Login</h1>

                <label for="email"><b>Email</b></label>
                <input type="text" placeholder="Enter Email" name="email" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required>

                <button type="submit" class="btn">Login</button>
                <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
            </form>
        </div>
        <input type ="checkbox" id="showaddjoinclassroomsinhvien">
        <!--classes-->
        <div class=" index container">
            <div class="class-place">
                <div class="row">
                    <?php foreach ($class as $item):?>
                        <!-- each class -->
                        <a href="stream.php?id=<?php echo $item['id']?>" style="text-decoration: none; color:black">
                            <div class="classcard col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6">
                                <div class="cell">

                                    <div class="class-inf">
                                        <div>
                                            <h1 class="class-title text-left ml-3 mb-1"> <?php echo $item['name'] ?> </h1>
                                        </div>
                                        <div class="text-left ml-3 mt-0"><img src="<?php echo base_url() ?>/public/uploads/class/<?php echo $item['image'] ?>" class="avatar" style="width:13%; border-radius: 50%"> <?php $item['teacher'] ?><?php echo $item['teacher'] ?></div>
                                        <a></a>
                                    </div>

                                    <div class="class-main p-2">
                                        <p class="title"> <?php echo $item['subject'] ?></p>
                                    </div>

                                    <div class="class-footer ">
                                        <span class="circle">
                                            <div class="work-icon">
                                                <i class="fa fa-user-o " aria-hidden="true"></i>
                                            </div>
                                        </span>

                                        <span class="circle">
                                            <div class="folder-icon">
                                                <i class="fa fa-folder-o" aria-hidden="true"></i>
                                            </div>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    <?php endforeach ?>
                    <!-- end each class -->
                </div>
            </div> 
                <!-- div class class-place -->
        </div>
        <!-- form-join-class -->
        <div class="table-add-join-class-sinhvien col-12">  
            <form method="POST">
                <div class="formcode">
                    <label> <p id="assignmenclasswork"><b>Join Class</b> </p></label>
                    <hr class="line"></br>
                    <div class="titleintruction">
                    <h4> Class code</h4>
                    <p> Ask your teacher for the class code </p>
                        <input id="classcode" type = "text" placeholder="Class code" name="class_code">
                    </div>
                    </br>
                    
                    <button class="btn btn-primary">Join</button>
                    <a class="btn btn-warning" href="index-sinhvien.php">Cancel</a>
                    
                
                </div> 
            </form>
        </div>
                <hr class="line">   
    
    </body>
</html>