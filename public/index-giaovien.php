
<?php 

require_once __DIR__. "/../autoload/autoload.php";
if(!isset($_SESSION['email'])){
    header("Location: login.php");
}

$data_user = $db -> fetchOne('user',"email = '".$_SESSION['email']."'"); 
//load class with specific role
if(check_role($_SESSION['email'])==2){
    $class = $db ->fetchAll('class');
}
if(check_role($_SESSION['email'])==1){
    $class = $db -> fetchAllCondition('class',"created_by_id = '".$data_user['id']."'"); 
}

//give permission php
if(isset($_POST['permission']) && isset($_POST['email_permission'])){
    $data = [
        "role" => (int)postInput('permission'),
    ];
    $error = [];
        if($db->fetchOne('user',"email = '".$_POST["email_permission"]."'")==0){
            $error['email_not_exist'] = " Email does not exist ";
        }
        else{//no error
            if(empty($error)){
                $db -> update('user',$data,array('email'=>$_POST["email_permission"]));
                $_SESSION['success'] = "Give permission successfully";
            }
        }

}
//create class php
if(isset($_POST['class_name']) && isset($_POST['class_subject']) && isset($_POST['class_room']) && isset($_POST['class_teacher'])){
    $id = uniqid(); 
    $class_name = $_POST['class_name'];
    $class_subject = $_POST['class_subject'];
    $class_teacher = $_POST['class_teacher'];
    $class_room = $_POST['class_room'];
    $data_class = [
        "id"     => $id,
        "name"   => $class_name,
        "subject"=> $class_subject,
        "teacher"=> $class_teacher,
        "room" => $class_room,
        "created_by_who" => $data_user["fullname"],
        "created_by_id" => $data_user["id"]
    ];
    $isset = $db -> fetchOne('class',"id = '" .$data_class['id']. "'");
    if(count($isset)>0){ //data bi trùng
        $_SESSION['error'] = "Class id adready exist in data base !";
    }else{
        if(isset($_FILES['class_image'])){
            $file_name = $_FILES['class_image']['name'];
            $file_tmp = $_FILES['class_image']['tmp_name'];
            $file_type = $_FILES['class_image']['type'];
            $file_error = $_FILES['class_image']['error'];
            if($file_error == 0){
                $part = ROOT ."class/";
                $data_class['image'] = $file_name;
                move_uploaded_file($file_tmp,$part.$file_name);
            }
        }
        $id_insert = $db -> insert("class",$data_class);
        $_SESSION['success'] = "Create class successfully";
        header("refresh: 0.5"); 
    }
    
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
<input type ="checkbox" id="showeditclassroom">
<input type ="checkbox" id="showaddjoinclassroom">
<input type ="checkbox" id="showphanquyen">
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
            <!--Home sinh vien-->
            <?php if(check_role($data_user['email'])==0){
                ?>
            <li class="nav-item active">
                <a class="nav-link" href="index-hocsinh.php">Home</a>
            </li>
            <?php }
            #--Home giao vien-->
                else {
            ?>
                    <li class="nav-item active">
                <a class="nav-link" href="index-giaovien.php">Home</a>
            </li>
            <?php }?>

            <li class="nav-item ">
                <a class="nav-link" href="stream.php">Stream</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="classwork.php">Classwork</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Grades</a>
            </li>

            <!--right nav-->
            <li class="nav-item ml-auto mr-0"> 
                <a class="nav-link" href="#">
                    <label for="search"><i class="fa fa-search fa-2x"></i> </label> 
                    <input onkeyup="search(this.value)" type="text" id="search" class="search">
                </a>
            </li>
            <!--only available for admin-->
            <?php if(check_role($data_user['email'])==2){
                ?>               
                <li class="nav-item  ml-2 mr-2">
                <a class="nav-link" href="#">
                    <label for="showphanquyen"><i class="fa fa-user fa-2x"></i> </label>
                </a>
            </li><?php
            }
            ?>
            
             <!--end this button-->
            <li class="nav-item ml-2 mr-2">
                <a class="nav-link" href="#">
                    <label for="showaddjoinclassroom"><i class="fa fa-plus fa-2x"></i> </label>
                </a>
            </li>

            <li class="nav-item ml-2 mr-2">
                <a class="nav-link" href="logout.php">
                    <label for="logoutbutton"><i class="fas fa-sign-out-alt fa-2x"></i></label>
                </a>

            </li>
        </ul>
    </nav>
    <?php if(!empty($error['email_not_exist'])){
        ?>
        <div class="alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Fail</strong> <?php echo $error['email_not_exist'] ?>.
        </div>
        <?php
    } ?>
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
    <!--classes-->
    <div class=" index container"> 
        <div class="class-place">
            <div class="row class-container">
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
                            <a href="edit-class.php?id=<?php echo $item['id']?>"><i class="editclassroom fas fa-pen text-dark"></i></a>
                            <a href="delete-class.php?id=<?php echo $item['id']?>" onclick="return confirm('Are you sure to delete this class!');"><i class="editclassroom far fa-trash-alt text-dark"></i></a>
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


    <!-- form tạo lớp -->
    <div class="table-add-join-class col-12">  
        <form method="post" action="#" onsubmit= "return validateInputaddClass()" enctype="multipart/form-data" >
            <div class="formcreate">
                <label> <p id="assignmenclasswork"><b>Create Class</b> </p></label>
                <hr style="width:60%; text-align:center; margin-left:0"></br>
                <div class="class-info">
                    <input class="class-info-box" id="class-name" type = "text" placeholder="Class name (required)" name="class_name"></br>
                    <input class="class-info-box" id="class-subject" type = "text" placeholder="Subject" name="class_subject"></br>
                    <input class="class-info-box" id="class-teacher" type = "text" placeholder="Teacher's name" name="class_teacher"></br>
                    <input class="class-info-box" id="class-room" type = "text" placeholder="Room" name="class_room"></br>
                    </br> <b>Choose image for classr</b></br>
                    <input type="file" id="fileanh" name="class_image" >
                </div>
                </br>
                <p class="error-notification" id = "error-message-addClass" >
                    <i class="fa fa-times-circle"></i> 
                </p>
                </br>
                
                <button class="btn btn-primary">Create</button>
                <a class="btn btn-warning" href="index-giaovien.php">Cancel</a>
                
            
            </div> 
        </form>
    </div>
    <!-- form phân quyền -->
    <div class="tablephanquyen col-12">  
        <form method="post" action="#" onsubmit= "return validateInputphanquyen()">
            <div class="formcreate">
                <label> <p id="assignmenclasswork"><b>Decentralization</b> </p></label>
                <hr style="width:60%; text-align:center; margin-left:0"></br>
                <input type="text" class="form-control col-md-4 mb-2" 
                placeholder="Enter email to give permission" id="email-phanquyen" name="email_permission">
                <div class="form-group row">
                                <div class="col-sm-10">
                                    <select id ="permission" name="permission" class="form-control col-md-3">
                                        <option value="">--Please choose permission--</option>
                                        <option value="2">Admin</option>
                                        <option value="1">Teacher</option>
                                        <option value="0">Student</option>
                                    </select>
                                </div>
                </div>
                </br>
                </br>
                <p class="error-notification" id = "error-message-phanquyen" >
                    <i class="fa fa-times-circle"></i> 
                </p>
                <button class="btn btn-success">Update</button>
                <a class="btn btn-warning" href="index-giaovien.php">Cancel</a>
            </div> 
        </form>
    </div>

            <hr style="width:60%; text-align:center; margin-left:0">
    </div>
</body>
</html>