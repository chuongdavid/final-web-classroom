<?php
    require_once __DIR__. "/../autoload/autoload.php";
    $id = $_GET['id'];
    $detail_announcement = $db -> fetchOne('announcement',"id = '".$id."'");
    if(empty($detail_announcement)){
        $_SESSION['error'] = "Url does not exist";
        header('Location:index-giaovien.php');
    }
    $data_class = $db -> fetchOne('class',"id = '".$detail_announcement['id_class']."'");
    $data_user_created = $db -> fetchOne('user',"id = '".$detail_announcement['created_by_id']."'");
    $uploaded_files =$db -> fetchAllCondition('file_upload_announce',"id_announce = '".$detail_announcement['id']."'");
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
                
                
                <li class="nav-item active">
                    <a class="nav-link anouncementnav" href="#">
                       <b id="tenlopannounce">Lập trình web và ứng dụng</b> </br>
                       Mai Văn Mạnh 
                    </a>
                </li>
               
                <!--right nav-->
                
            </ul>
        </nav>
        <input type ="checkbox" id="show-announce-edit-delete">
       
        
        <div class="container-sm ">
            <div class="row">
                <div class="col-lg-9"> 
                    </br>
                    
                    <div class="announce"> 
                        <p id="tenannounce" > <i class="far fa-window-maximize"></i> <?php echo $detail_announcement['title'] ?> 
                        <?php if(($_SESSION['id_user']==$data_user_created['id']) || ($_SESSION['id_user']==$data_class['created_by_id'])): ?>
                            <div class="dropdown dropdownannounce" >
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton-announcement" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    
                                </button>
                                
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="edit-announcement.php?id=<?php echo $detail_announcement['id'] ?>">Edit</a>
                                    <a class="dropdown-item" href="delete-announcement.php?id=<?php echo $detail_announcement['id'] ?>&id_class=<?php echo $detail_announcement['id_class'] ?>" onclick="return confirm('Are you sure you want to delete this announcement?');">Delete </a>
                                </div>
                                
                            </div>     
                            <?php endif ?> 
                        </p> 
                    </div>
                    <p id="dateannounce"> <?php echo $data_user_created['fullname'] ?> posted at <?php echo $detail_announcement['created_at'] ?></p>
                    
                    <p id="teachercontent"> 
                    <?php echo $detail_announcement['news'] ?>
                    <hr style="width:80%; text-align:center; margin-left:0"> 
                    <p>class comment</p>
                    <div id="announce">
                        <div class=" commentcontent">
                            <p >
                                <div id="hiddenstreamcontent-content">
                                    <i class="far fa-window-maximize"></i> 
                                    Ten svfffffffffff<p id="datecomment"> Nov 25</p>
                                    <div class="dropdown dropdown-comment" >
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton-announcement" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="#">Edit</a>
                                            <a class="dropdown-item" href="#">Delete </a>
                                        </div>
                                    </div>
                                </div>    
                            </p>  
                            
                        </div>
                    </div></br></br>
                    <i class="classcomment fas fa-graduation-cap"></i><input id="classcomment" type="text" placeholder="Add class comment"> </input> <label><i class="far fa-paper-plane"></i></label></br> 
                    
                    
                </div>
                <div class="col-lg-3 "> 
                    <div class="upload-announce">
                        </br>
                        <p><b>Uploaded files</b></p>
                        <hr style="width:100%; text-align:center; margin-left:0">
                        <?php foreach ($uploaded_files as $item):?>
                            <p> <a href="<?php echo base_url() ?>/public/uploads/announcement/<?php echo $item['name'] ?>" download ><?php echo $item['name'] ?></a> </p>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>

        </div>
    </body>
</html>