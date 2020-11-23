<?php 
    require_once __DIR__. "/../autoload/autoload.php";
    $id = $_GET['id'];
    $EditClass = $db -> fetchOne('class',"id = '".$id."'");
    if(empty($EditClass)){
        $_SESSION['error'] = "Class does not exist";
        header('Location:index-giaovien.php');
    }
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $class_name = $_POST['class_name'];
        $class_subject = $_POST['class_subject'];
        $class_teacher = $_POST['class_teacher'];
        $class_room = $_POST['class_room'];
        $data_class = [
            "name"   => $class_name,
            "subject"=> $class_subject,
            "teacher"=> $class_teacher,
            "room" => $class_room,
        ];
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
        $id_insert = $db -> update("class",$data_class,array('id' => $id));
        if($id_insert>0){
            $_SESSION['success'] = 'Update successfully';
            header('Location:index-giaovien.php');
        }
        else{
            $_SESSION['error'] = 'Nothing change.';
            header('Location:index-giaovien.php');
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
    <!-- form edit lớp -->
    <div class="col-12 m-2">  
                <form method="post" action="#" onsubmit= "return validateInputEditClass()" enctype="multipart/form-data">
                    <div class="formcreate">
                        <label> <p id="assignmenclasswork"><b>Edit Classroom</b> </p></label>
                        <hr style="width:90%; text-align:left; margin-left:10"></br>
                        <div class="class-info">
                            <input class="class-info-box" value="<?php echo $EditClass['name']  ?>" id="class-name-edit" type = "text" placeholder="Class name (required)" name="class_name"></br>
                            <input class="class-info-box" value="<?php echo $EditClass['subject']  ?>" id="class-subject-edit" type = "text" placeholder="Subject" name="class_subject"></br>
                            <input class="class-info-box" value="<?php echo $EditClass['teacher']  ?>" id="class-teacher-edit" type = "text" placeholder="Teacher's name" name="class_teacher"></br>
                            <input class="class-info-box" value="<?php echo $EditClass['room']  ?>" id="class-room-edit" type = "text" placeholder="Room" name="class_room"></br>
                            </br> <b>Choose image</b></br>
                            <input type="file" id="fileanh-edit" name="class_image" >
                        </div>
                        </br>
                        </br>
                        <p class="error-notification" id = "error-message-edit" >
                            <i class="fa fa-times-circle"></i> 
                        </p>
                        <button class="btn btn-primary">Update</button>
                        <button class="btn btn-warning">Cancel</button>
                    </div> 
                </form>
    </div>  
</body>
