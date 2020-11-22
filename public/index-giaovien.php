
<?php 

    require_once __DIR__. "/../autoload/autoload.php";
    $data_user = $db -> fetchOne('user',"email = '".$_SESSION['email']."'"); 
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $data = [
            "role" => (int)postInput('permission'),
        ];
        $error = [];
        $success =[];
            if($db->fetchOne('user',"email = '".$_POST["email_permission"]."'")==0){
                $error['email_not_exist'] = " Email does not exist ";
            }
            else{//no error
                if(empty($error)){
                    $db -> update('user',$data,array('email'=>$_POST["email_permission"]));
                    $success['permission'] = "Give permission successfully";
                }
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
                <li class="nav-item ml-auto mr-0"> 
                    <a class="nav-link" href="#">
                        <label for="search"><i class="fa fa-search fa-2x"></i> </label> 
                        <input type="text" id="search">
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
            </ul>
        </nav>
        <!--Success message-->
        <?php if(!empty($success)){
            ?>
            <div class="alert alert-success alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong> <?php echo $success['permission'] ?>.
            </div>
            <?php
        } ?>
        <?php if(!empty($error['email_not_exist'])){
            ?>
            <div class="alert alert-danger alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Fail</strong> <?php echo $error['email_not_exist'] ?>.
            </div>
            <?php
        } ?>
        
        <!--classes-->
        <div class=" index container m-0 ">
            <div class="row">
                <div class="classcard col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6">
                    <div class="cell">

                        <div class="class-inf">
                            <div >
                                <h1 class="class-title text-left ml-3 mb-1">Môn học </h1> 
                            </div>
                            <div class="text-left ml-3 mt-0"><img src="image/avatar.png" class="avatar" style="width:13%; border-radius: 50%"> Thầy A</div>
                            <label for="showeditclassroom"> <i class="editclassroom fas fa-pen"></i></label>
                             <i class="editclassroom far fa-trash-alt"></i>
                        </div>

                        <div class="class-main p-2">
                            <p class="title"> Jane Dode</p>

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

                <div class="classcard col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6">
                    <div class="cell">

                        <div class="class-inf">
                        <div>
                            <h1 class="class-title text-left ml-3 mb-1">Môn học </h1>
                        </div>
                            <div class="text-left ml-3 mt-0"><img src="image/avatar.png" class="avatar" style="width:13%; border-radius: 50% "> Thầy A</div>
                            <label for="showeditclassroom"> <i class="editclassroom fas fa-pen"></i></label>
                             <i class="editclassroom far fa-trash-alt"></i>
                        </div>

                        <div class="class-main p-2">
                            <p class="title"> Jane Dode</p>

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
                </div><div class="classcard col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6">
                    <div class="cell">

                        <div class="class-inf">
                        <div>
                            <h1 class="class-title text-left ml-3 mb-1">Môn học </h1>
                        </div>
                            <div class="text-left ml-3 mt-0"><img src="image/avatar.png" class="avatar" style="width:13%; border-radius: 50% "> Thầy A</div>
                            <label for="showeditclassroom"> <i class="editclassroom fas fa-pen"></i></label>
                             <i class="editclassroom far fa-trash-alt"></i>
                        </div>

                        <div class="class-main p-2">
                            <p class="title"> Jane Dode</p>

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
                </div><div class="classcard col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6">
                    <div class="cell">

                        <div class="class-inf">
                        <div>
                            <h1 class="class-title text-left ml-3 mb-1">Môn học </h1>
                        </div>
                            <div class="text-left ml-3 mt-0"><img src="image/avatar.png" class="avatar" style="width:13%; border-radius: 50% "> Thầy A</div>
                            <label for="showeditclassroom"> <i class="editclassroom fas fa-pen"></i></label>
                             <i class="editclassroom far fa-trash-alt"></i>
                        </div>

                        <div class="class-main p-2">
                            <p class="title"> Jane Dode</p>

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
                </div><div class="classcard col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6">
                    <div class="cell">

                        <div class="class-inf">
                        <div>
                            <h1 class="class-title text-left ml-3 mb-1">Môn học </h1>
                        </div>
                            <div class="text-left ml-3 mt-0"><img src="image/avatar.png" class="avatar" style="width:13%; border-radius: 50% "> Thầy A</div>
                            <label for="showeditclassroom"> <i class="editclassroom fas fa-pen"></i></label>
                            <i class="editclassroom far fa-trash-alt"></i>
                        </div>

                        <div class="class-main p-2">
                            <p class="title"> Jane Dode</p>

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
                </div><div class="classcard col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6">
                    <div class="cell">

                        <div class="class-inf">
                        <div>
                            <h1 class="class-title text-left ml-3 mb-1">Môn học </h1>
                        </div>
                            <div class="text-left ml-3 mt-0"><img src="image/avatar.png" class="avatar" style="width:13%; border-radius: 50% "> Thầy A</div>
                            <label for="showeditclassroom"> <i class="editclassroom fas fa-pen"></i></label>
                             <i class="editclassroom far fa-trash-alt"></i>
                        </div>

                        <div class="class-main p-2">
                            <p class="title"> Jane Dode</p>

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
                </div><div class="classcard col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6">
                    <div class="cell">

                        <div class="class-inf">
                        <div>
                            <h1 class="class-title text-left ml-3 mb-1">Môn học </h1>
                        </div>
                            <div class="text-left ml-3 mt-0"><img src="image/avatar.png" class="avatar" style="width:13%; border-radius: 50% "> Thầy A</div>
                            <label for="showeditclassroom"> <i class="editclassroom fas fa-pen"></i></label>
                             <i class="editclassroom far fa-trash-alt"></i>
                        </div>

                        <div class="class-main p-2">
                            <p class="title"> Jane Dode</p>

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
                <div class="classcard col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6">
                    <div class="cell">

                        <div class="class-inf">
                        <div>
                            <h1 class="class-title text-left ml-3 mb-1">Môn học  </h1> 
                        </div>
                            <div class="text-left ml-3 mt-0"><img src="image/avatar.png" class="avatar" style="width:13%; border-radius: 50% "> Thầy A</div>
                            <label for ="showeditclassroom"> <i class="editclassroom fas fa-pen"></i></label>
                             <i class="editclassroom far fa-trash-alt"></i>
                        </div>

                        <div class="class-main p-2">
                            <p class="title"> Jane Dode</p>

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
                
            </div>
        </div>


        <!-- form tạo lớp -->
        <div class="table-add-join-class col-12">  
            <form method="post" action="#" onsubmit= "return validateInputaddClass()" enctype="multipart/form-data" >
                <div class="formcreate">
                    <label> <p id="assignmenclasswork"><b>Create Class</b> </p></label>
                    <hr style="width:90%; text-align:left; margin-left:10"></br>
                    <div class="class-info">
<<<<<<< HEAD
                        <input class="class-info-box" id="class-name" type = "text" placeholder="Class name (required)" name="class_name"></br>
                        <input class="class-info-box" id="class-subject" type = "text" placeholder="Subject" name="class_subject"></br>
                        <input class="class-info-box" id="class-room" type = "text" placeholder="Room" name="class_name"></br>
                        </br> <b>Choose avatar</b></br>
                        <input type="file" id="fileanh" >
                    </div>
                    </br>
                    </br></br>
                    <button class="btn btn-primary">Create</button>
                    <button class="btn btn-warning">Cancel</button>
=======
                        <input class="class-info-box" id="class-name" type = "text" placeholder="Class name (required)"></br>
                        <input class="class-info-box" id="class-subject" type = "text" placeholder="Subject"></br>
                        <input class="class-info-box" id="class-room" type = "text" placeholder="Room"></br>
                        </br> <b>Chọn ảnh đại diện</b></br>
                        <input type="file" id="fileanh" >
                    </div>
                    </br>
                    <p class="error-notification" id = "error-message-addClass" >
                        <i class="fa fa-times-circle"></i> 
                    </p>
                    </br>
                    
                    <button class="btnform">Create</button>
                    <button class="btnform">Cancel</button>
>>>>>>> a374f2b752ac9db019ce293ea9ac9773ebb9c872
                    
                
                </div> 
            </form>
        </div>
        <!-- form phân quyền -->
        <div class="tablephanquyen col-12">  
            <form method="post" action="#" onsubmit= "return validateInputphanquyen()">
                <div class="formcreate">
                    <label> <p id="assignmenclasswork"><b>Decentralization</b> </p></label>
                    <hr style="width:90%; text-align:left; margin-left:10"></br>
                    <input type="text" class="form-control col-md-4 mb-2" placeholder="Enter email to give permission" id="email-phanquyen">
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
                    <button class="btn btn-warning">Cancel</button>
                </div> 
            </form>
        </div>

        
        <!-- form edit lớp -->
        <div class="tableeditclassroom col-12">  
            <form method="post" action="#" onsubmit= "return validateInputEditClass()" enctype="multipart/form-data">
                <div class="formcreate">
                    <label> <p id="assignmenclasswork"><b>Edit Classroom</b> </p></label>
                    <hr style="width:90%; text-align:left; margin-left:10"></br>
                    <div class="class-info">
<<<<<<< HEAD
                        <input class="class-info-box" id="class-name" type = "text" placeholder="Class name (required)"></br>
                        <input class="class-info-box" id="class-subject" type = "text" placeholder="Subject"></br>
                        <input class="class-info-box" id="class-room" type = "text" placeholder="Room">
                        <input class="class-info-box" id="class-section" type = "text" placeholder="Avatar"></br>
=======
                        <input class="class-info-box" id="class-name-edit" type = "text" placeholder="Class name (required)"></br>
                        <input class="class-info-box" id="class-subject-edit" type = "text" placeholder="Subject"></br>
                        <input class="class-info-box" id="class-room-edit" type = "text" placeholder="Room"></br>
                        </br> <b>Chọn ảnh đại diện</b></br>
                        <input type="file" id="fileanh-edit" >
>>>>>>> a374f2b752ac9db019ce293ea9ac9773ebb9c872
                    </div>
                    </br>
                    </br>
                    <p class="error-notification" id = "error-message-edit" >
                        <i class="fa fa-times-circle"></i> 
                    </p>
                    <button class="btnform">Update</button>
                    <button class="btnform" type="cancel"> Cancel</button>
                </div> 
            </form>
        </div>    
                <hr style="width:90%; text-align:left; margin-left:10">
        </div>
    </body>
</html>