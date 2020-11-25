<?php
    include './connect_db.php';
    require_once __DIR__. "/../autoload/autoload.php";
    $student_arr = $db -> fetchAllCondition('student_class, user', "user.id = student_class.id_student AND student_class.id_class ='".$_GET['id']."'");
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
                <li class="nav-item ">
                    <a class="nav-link" href="#">Stream</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="#">Classwork</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">People</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Grades</a>
                </li>

                <!--right nav-->
                
            </ul>
        </nav>
        <input type ="checkbox" id="showinvite">
        <div class="container-sm">
            <div class=" teacher col-lg-8">
                <table >
                    <tr>
                        <h2 >Teachers <a href="#" id="teacheradd"> <label for="showinvite"><i id="buttonteacher" class="fa fa-user-plus"></i> </label> </a> </h2>
                        <hr style="width:100%; text-align:left; margin-left:0">
                    </tr>
                    <tr>
                       <i class="studentlist fas fa-user-graduate"></i> Dang Trung Tin
                       
                    </tr>   
                    <tr>
                        <h2 id="student"> Students <a href="#" id="teacheradd"> <label for="showinvite"> <i id="buttonteacher"  class="fa fa-user-plus"></i> </lablel> </a> </h2>
                        <hr style="width:100%; text-align:left; margin-left:0">
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
                                        <td class="text-right pr-2"><a href="./delete_student.php?student=<?= $student['id'] ?>&id=<?= $_GET['id'] ?>"><i id="buttonstudent"  class="fas fa-minus" onclick="return confirm('Are u sure u want to delete this student?');"></i></a></td>
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
                <form >
                    <div class="formtext">
                        <label> <b>Invite</b> </label></br>
                        <input class="input" type = "text" placeholder="Type a name or email">
                    </div>
                    <hr style="width:60%; text-align:center; margin-left:0">
                    </br>
                    </br>
                    </br>
                    <div class="btnsform">
                        
                        <button class="btnform">Invite</button>
                        
                        <button class="btnform">Cancel</button>
                    
                    </div>    
                </form>
            </div>
        

        
    </body>
</html>