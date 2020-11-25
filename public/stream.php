<?php 
    require_once __DIR__. "/../autoload/autoload.php";
    if(!isset($_SESSION['email'])){
        header("Location: login.php");
    } 
    $id = $_GET['id'];
    $EditClass = $db -> fetchOne('class',"id = '".$id."'");
    if(empty($EditClass)){
        $_SESSION['error'] = "Class does not exist";
        header('Location:index-giaovien.php');
    }
    //if exist class do below
        //load announcement
        $load_announcement = $db -> fetchAllCondition('announcement',"id_class = '".$id."'");

        //create announcement
        if(isset($_POST['news']) && isset($_POST['title'])){
            $id_announcement = uniqid(); 
            $data_announcement = ['id' => $id_announcement,
                    'news'=>$_POST['news'],
                    'id_class'=>$EditClass['id'],
                    'created_by_id'=> $_SESSION['id_user'],
                    'title' => $_POST['title']
            ];
            if(isset($_FILES['file'])){
                $fileCount = count($_FILES['file']['name']);
                for($i=0;$i<$fileCount;$i++){
                    $file_name = $_FILES['file']['name'][$i];
                    $file_tmp = $_FILES['file']['tmp_name'][$i];
                    $file_type = $_FILES['file']['type'][$i];
                    $file_error = $_FILES['file']['error'][$i];
                    if($file_error == 0){
                        $part = ROOT ."announcement/";
                        $data_file_up =['id_announce' => $id_announcement,
                                        'name' => $file_name
                    ];
                        move_uploaded_file($file_tmp,$part.$file_name);
                        $id_insert = $db -> insert("file_upload_announce",$data_file_up);
                    }
                    else{
                        $numberError = "error file number:".$i;
                        $error = [ $numberError => $i ];
                    }
                }
                if((!empty($error))){
                    $_SESSION['error'] = "Error occured when uploading files or you didn't choose any file";
                }
                else{
                    $_SESSION['success']="Upload announcement successfully";
                }
            }
            $insert_announce = $db -> insert("announcement",$data_announcement);
            if(count($insert_announce>0)){
                $_SESSION['success'] = "Upload announcemnet successfully";
            }
            else{
                $_SESSION['error'] = "Upload annoucemnet fail";
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

                <span onclick="openNav()"><img class="logo" src="image/logov2.png"></span>

                <!--left nav-->
                <!--Home sinh vien-->
                <?php if(check_role($_SESSION['email'])==0){
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
                <li class="nav-item active">
                    <a class="nav-link" href="#">Stream</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Classwork</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="people.php?id=<?php echo $EditClass['id'] ?>">People</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Grades</a>
                </li>

                <!--right nav-->
                
            </ul>
        </nav>
        <input type ="checkbox" id="showaddannouncement">
        <input type ="checkbox" id="show-stream-edit-delete">
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
        <div class=" stream container-sm">
            <div class="row head">
                <div class="banner col-12"> 
                <p id="tenlophoc">
                    <b><?php echo $EditClass['name'] ?></b></br>
                </p>
                <p id="tengiaovien">
                    <?php echo $EditClass['teacher'] ?>
                </p>
                <p id="cntt">
                <?php echo $EditClass['subject'] ?></br>
                    <b>Class code: </b> <?php echo $EditClass['id'] ?>  <i class="far fa-paper-plane"></i>
                </p>
                </div>
            </div>
            
            <div class="content">
                <div class="row">
                    <div class="banner2 col-lg-3" >
                            <div class="banner3 " id="commute1">
                                <b>Upcomming</b></br>
                                No work due soon</br>
                                <p id="viewall"><a href="#">View all</a></p>
                                
                            </div>
                    </div>
                    
                    <div class="banner2 class-anounce col-lg-8">
                        <input type ="checkbox" id="showhiddenstreamcontent"/>
                        <div class="banner3 classanounce" id="commute2">
                            <label for ="showaddannouncement"><i class=" fas fa-user-graduate"></i> Share something with your class </label>
                        </div>
                        <?php foreach ($load_announcement as $item):?>
                        <a href="announcement.php?id=<?php echo $item['id']?>">
                        <div class="hiddenstreamcontent" >
                        
                            <div id="hiddenstreamcontent-content">
                                <i class="far fa-window-maximize"></i> 
                                
                                <?php echo $item['title'] ?> 
                                <label for="show-stream-edit-delete"> <i class="fa fa-ellipsis-v" id="more"></i></label>
                                <p id="datestream"> <?php echo $item['created_at'] ?> </p>
                            
                            </div>      
                        </div> 
                        </a>
                        <?php endforeach?>
                        <?php if(count($load_announcement)==0) :?>
                        <div class="banner3 commute" id="commute3">
                            <b>Communicate with your class here</b></br>
                            <div id="announce">
                                <i class="far fa-comment-alt"> </i>  Create and schedule annnouncements </br>
                                <i class="far fa-comment"> </i> Respond to student posts
                            </div>
                        </div>
                        <?php endif ?>
                        
                            
                    </div>
                </div>
            </div>
        </div>
        <div class="tableshowannouncement col-12">  
            <form method="post" action="#" onsubmit= "return validateInputannouncement()" enctype="multipart/form-data" >
                <div class="formcode">
                    <div class="form-inf">
                        <label> <p id="assignmenclasswork"><b>Share with your class</b> </p></label>
                        <hr style="width:60%; text-align:center; margin-left:0">
                        
                        <h4>Title</h4>
                        <input id="stream-title" type="text" placeholder="Title"> </br></br>
                        <h6>Nội dung</h6>
                        <textarea name="news" class="class-inform-textarea" id="stream-announce" placeholder="Type here"></textarea></br></br>
                        <b> Chọn ảnh</b></br>
                        <input type="file" id="fileanh" name="file[]" multiple  >
                        
                        </br> </br>
                        <p class="error-notification noti-stream" style="width:300px" id = "error-message-stream" ></p>
                        
                        <label for="showhiddenstreamcontent"> <button class="btn btn-primary">Post</button></label>
                        <a href="stream.php?id=<?php echo $EditClass['id']?>" class="btn btn-warning">Cancel</a>
                        <hr style="width:60%; text-align:center; margin-left:0"></br>
                    </div>    
                </div> 
            </form>
        </div>
        <div class="stream-edit-delete ">  
            <table class="table1 table-stream" >
                <tr class="assignment-stream">
                    <td> <i class="fas fa-chalkboard-teacher"></i> <label> Edit</label></td> 
                </tr>
                <tr class="assignment-stream">
                    <td> <i class="fas fa-laptop-code"></i><label> Delete </label> </td>
                </tr>
            </table>
        </div>
    </body>
</html>