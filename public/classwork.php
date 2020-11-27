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
                <li class="nav-item">
                    <a class="nav-link" href="index-sinhvien.php">Home</a>
                </li>
                <?php }
                #--Home giao vien-->
                    else {
                ?>
                        <li class="nav-item">
                    <a class="nav-link" href="index-giaovien.php">Home</a>
                </li>
                <?php }?>
                <li class="nav-item ">
                    <a class="nav-link" href="stream.php?id=<?=$_GET['id']?>">Stream</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="classwork.php?id=<?=$_GET['id']?>">Classwork</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="people.php?id=<?=$_GET['id']?>">People</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Grades</a>
                </li>
                
                <!--right nav-->
                
            </ul>
        </nav>
        <input type ="checkbox" id="showassignment">
        <input type ="checkbox" id="showcreate">
        
        <div class=" classworkindex container-sm">
            <div class="assign col-lg-8">
                <button id="creatework"> <label for="showcreate"> <i class=" nutcreate fas fa-plus"> </i>  Create </label> </button>
                    <div class="classwork" id="commute3">
                        <p id="assignworktoyourclass">Assign work to your class here </p>
                        <div id="assignment">
                            <i class="far fa-folder"> </i>  Create assignments and questions </br>
                            <i class="fas fa-book-open"> </i>  Use topics to organize classwork into modules or units </br>
                            <i class="far fa-bookmark"> </i>  Order work the way you want students to see it </br>
                        </div>
                    </div> 
                
            </div>

        </div>
        
        <div class="tableassignment col-lg-4">  
            <table class="table1" >
                <tr class="assignment">
                    <td> <i class="fas fa-chalkboard-teacher"></i> <label for="showassignment">Assignment</label> </td> 
                </tr>
                <tr class="assignment">
                    <td> <i class="fas fa-laptop-code"></i><label for="showassignment"> Quiz </label> </td>
                </tr>
                <tr class="assignment">
                    <td> <i class="far fa-edit"></i> <label for="showassignment">Question</label> </td>
                </tr>
                <tr class="assignment">
                    <td> <i class="fas fa-folder-open"></i> <label for="showassignment">Materials</label> </td>
                </tr>
                <tr class="assignment">
                    <td> <i class="fas fa-thumbtack"></i> <label for="showassignment"> Reuse post</label> </td>
                </tr>
                    
            </table>
        </div>  
        

        
        <div class=" createassign col-5">
            <form class="formtext">
                <div>
                    <label> <p id="assignmenclasswork"><b>Assignment</b> </p></label>
                    <hr style="width:60%; text-align:center; margin-left:0"></br>
                    <div class="titleintruction">
                        <i id="titleicon" class="fas fa-mug-hot"></i> <input id="title" type = "text" placeholder="Title" ></br></br>
                        <i id="instructionicon" class="fas fa-align-left"></i> <input id="instruction" type = "text" placeholder="Intructions"></br></br>
                        <i id="instructionicon" class="far fa-calendar-alt" style="margin-right: 14px"></i> <input type="date" id="deadline"> 
                    </div>
                </div>
                <hr style="width:60%; text-align:center; margin-left:0">
                </br>
                
                <div class="btnsform-assign">
                    
                    <button class="btnform">Create</button>
                    
                    <button class="btnform" type="reset">Reset</button>
                
                </div>    
            </form>
        </div>
        
        
    </body>
</html>