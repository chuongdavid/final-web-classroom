<?php
require_once __DIR__. "/../autoload/autoload.php";
$id_class = $_GET['id'];
if(!isset($_SESSION['email'])){
    header("Location: login.php");
}
//get assignment
$assignment = $db -> fetchAllCondition('assignment',"id_class = '". $id_class ."'");


//create assignment


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
                <li class="nav-item active align-self-center">
                    <a class="nav-link" href="classwork.php?id=<?=$_GET['id']?>">Classwork</a>
                </li>
                <li class="nav-item align-self-center">
                    <a class="nav-link" href="people.php?id=<?=$_GET['id']?>">People</a>
                </li>
                
                <!--right nav-->
                <li class="nav-item ml-auto mr-2">
                <a class="nav-link" href="logout.php">
                    <label for="logoutbutton"><i class="fas fa-sign-out-alt fa-2x"></i></label>
                </a>
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
        <input type ="checkbox" id="showassignment">
        <input type ="checkbox" id="showcreate">
        
        <div class=" classworkindex container-sm">
            <div class="assign col-lg-8">
                <a href="assignment.php?id=<?=$_GET['id']?>"><button id="creatework" ><i class=" nutcreate fas fa-plus">&nbsp;Create</i></button></a>
                <?php if (count($assignment)==0):?>    
                <div class="classwork" id="commute3">
                        <p id="assignworktoyourclass">Assign work to your class here </p>
                        <div id="assignment">
                            <i class="far fa-folder"> </i>  Create assignments and questions </br>
                            <i class="fas fa-book-open"> </i>  Use topics to organize classwork into modules or units </br>
                            <i class="far fa-bookmark"> </i>  Order work the way you want students to see it </br>
                        </div>
                    </div> 
                <?php endif?>
            </div>

        </div>
        <div class ="container-sm ">
            <?php foreach($assignment as  $item): ?>
            <div class=" assignment-classwork col-lg-6" >             
                <div id="assignment-classwork-content">
                    <i class="far fa-window-maximize"></i> <?= $item['title'] ?></br>
                    <label > <i class="fa fa-ellipsis-v" id="more"></i></label>
                    <p id="datestream"> Date start:&nbsp;<?= $item['date_start'] ?></p>
                    <label > <i class="fa fa-ellipsis-v" id="more"></i></label>
                    <p id="datestream">Deadline:&nbsp;<?= $item['date_end'] ?> </p>  
                </div>      
            </div> 
        
            </a>
            <?php endforeach   ?>
        </div>
        

        
        
        
        
    </body>
</html>