<?php
    require_once __DIR__. "/../autoload/autoload.php";
    $id = $_GET['id'];
    $detail_announcement = $db -> fetchOne('announcement',"id = '".$id."'");
    if(empty($detail_announcement)){
        $_SESSION['error'] = "Url does not exist";
        header('Location:index-giaovien.php');
    }
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
       
        
        <div class=" anouncement container-sm col-lg-8">
            </br>
            <p id="tenannounce"> <i class="far fa-window-maximize"></i> <?php echo $detail_announcement['title'] ?>  <label for="show-announce-edit-delete"> <i class="fa fa-ellipsis-v" id="more-announce"></i></label></p>
            <p id="dateannounce"> <?php echo $data_user_created['fullname'] ?> posted at <?php echo $detail_announcement['created_at'] ?></p>
            <hr style="width:80%; text-align:center; margin-left:0"> 
            <p id="teachercontent">
            <?php echo $detail_announcement['news'] ?>
            <p>Uploaded files</p>
            <?php foreach ($uploaded_files as $item):?>
                <a href="#"><?php echo $item['name'] ?></p>
            <?php endforeach ?>

            
                
            
            <div id="announce">
                <div class=" commentcontent">
                    <div id="hiddenstreamcontent-content">
                        <i class="far fa-window-maximize"></i> 
                        
                        Ten sv
                        <label for="show-stream-edit-delete"><i class="fa fa-ellipsis-v" id="more-comment"></i></label>
                        <p id="datecomment"> Nov 25</p>
                    
                    </div>      
                </div></br></br>
        
                <form> 
                    <i class="classcomment fas fa-graduation-cap"></i><input id="classcomment" type="text" placeholder="Add class comment"> </input><i class="far fa-paper-plane"></i></label></br>
                </form>
            </div>

        </div>

        <div class="table-announce-edit-delete">  
            <table class="table1 table-stream" >
                <tr class="assignment-stream">
                    <td> <i class="fas fa-chalkboard-teacher"></i> <label> Edit</label> </td> 
                </tr>
                <tr class="assignment-stream">
                    <td> <i class="fas fa-laptop-code"></i><label> Delete </label> </td>
                </tr>
            </table>
        </div>
        
        
      
        
        
    </body>
</html>