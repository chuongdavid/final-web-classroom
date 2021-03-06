<?php
    include './connect_db.php';
    require_once __DIR__. "/../autoload/autoload.php";
    // check login
    if(!isset($_SESSION['email'])){
        header("Location: login.php");
    }
    $student_arr = $db -> fetchAllCondition('student_class, user', "user.id = student_class.id_student AND student_class.id_class ='".$_GET['id']."'");
    $class_code = $_GET['id'];
    $create_class_by = $db -> fetchOne('user',"id = '".$_SESSION['id_user']."'");
    $data_class = $db -> fetchOne('class',"id = '".$class_code."'");
    //invite student
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        if(isset($_POST['email_student'])){
            $email_student = $_POST['email_student'];
            $isset_user = $db -> fetchOne('user',"email = '".$email_student."'");
            if($isset_user > 0){
                $data = [
                'id_student'=>$isset_user['id'],
                'id_class' => $class_code];
                
                $check_duplicate = $db -> fetchAllCondition('student_class',"id_student = ".$isset_user['id']." AND id_class = '".$class_code."'"); 
                if(count($check_duplicate)>0){
                    $_SESSION['error'] ='This student have already joined this class';
                }      
                else{
                    //get information who created this class
                    
                    $checkSent = send_invitation_class($create_class_by['id'],$class_code,$isset_user['id'],$email_student);
                    if($checkSent){
                        $_SESSION['success'] ='Your invitation has been sent.';
                    }
                    else{
                        $_SESSION['error'] ='Send invitation fail';
                    }
                    
                }
            }
            else{
                $_SESSION['error'] ='This student does not exist';
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
                            Mon aaaaaaaaaaaaaa
                        </div>
                        <div>
                            Thay A
                        </div>
                    </a>
                    <a href="#" class="sidenav-item">Services</a>
                    <a href="#" class="sidenav-item">Clients</a>
                    <a href="#" class="sidenav-item">Contact</a>
                </div>

                <span class="align-self-center" onclick="openNav()"><img class="logo" src="image/logov2.png"></span>

                <!--left nav-->
                <!--Home sinh vien-->
                <?php if(check_role($_SESSION['email'])==0){
                    ?>
                <li class="nav-item align-self-center">
                    <a class="nav-link" href="index-sinhvien.php">Home</a>
                </li>
                <?php }
                #--Home giao vien-->
                    else {
                ?>
                        <li class="nav-item align-self-center">
                    <a class="nav-link" href="index-giaovien.php">Home</a>
                </li>
                <?php }?>
                <li class="nav-item align-self-center">
                    <a class="nav-link" href="stream.php?id=<?=$_GET['id']?>">Stream</a>
                </li>
                <li class="nav-item align-self-center">
                    <a class="nav-link" href="classwork.php?id=<?=$_GET['id']?>">Classwork</a>
                </li>
                <li class="nav-item active align-self-center">
                    <a class="nav-link" href="people.php?id=<?=$_GET['id']?>">People</a>
                </li>


                <!--right nav-->
                <li class="nav-item ml-auto mr-2">
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
        <input type ="checkbox" id="showinvite">
        <div class="container-sm">
            <div class=" teacher col-lg-8">
                <table >
                    <tr>
                        <h2 >Teachers <a id="teacheradd"> <label for="showinvite"> </label> </a> </h2>
                        <hr class="line w-100">
                    </tr>
                    <tr>
                       <i class="studentlist fas fa-user-graduate"></i> <?php echo $data_class['teacher'] ?>
                       
                    </tr>   
                    <tr>
                        <h2 id="student"> Students 
                        <?php if(check_role($_SESSION['email'])!=0):?>
                        <span class="ml-auto"><a href="#" id="teacheradd"> <label for="showinvite"> <i id="buttonteacher"  class="fa fa-user-plus"></i> </lablel> </a> </span></h2>
                        <?php endif ?>
                        <hr class="line w-100">
                    </tr>
                    <tr>
                        <!---->
                    <!--xem danh sach sinh vien-->
                       

                        <div id="user-info">
                            <table id = "user-listing">
                                <?php
                                    foreach($student_arr as $student){
                                    ?>
                                    <tr class=" border-bottom">
                                        <td class="text-left"><i class="fas fa-user"></i>   <?= $student['fullname']?></td>
                                        <?php if(check_role($_SESSION['email'])!=0):?>
                                        <td class="text-right pr-5"><a href="./delete_student.php?student=<?= $student['id'] ?>&id=<?= $_GET['id'] ?>"><i id="buttonstudent"  class="fas fa-minus" onclick="return confirm('Are you sure you want to delete this student?');"></i></a></td>
                                        <?php endif ?>
                                    </tr>
                                <?php } ?>
                            </table>
                        </div>
                    <!---->
                    </tr> 
                </table>   
            </div>

            </div> 
            <div class="teacherform col-lg-3">  
                <form method="POST" >
                    <div class="formtext">
                        <label> <b>Invite</b> </label></br>
                        <input class="input" name="email_student" type = "text" placeholder="Type a name or email">
                    </div>
                    <hr class="line">
                    </br>
                    </br>
                    </br>
                    <div class="btnsform">
                        
                        <button class="btn btn-primary">Invite</button>
                        
                        <a href="people.php?id=<?=$_GET['id']?>" class="btn btn-warning">Cancel</a>
                    
                    </div>    
                </form>
            </div>  
        

        
    </body>
</html>