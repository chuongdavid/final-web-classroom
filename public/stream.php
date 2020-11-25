<?php 

    require_once __DIR__. "/../autoload/autoload.php";
    $id = $_GET['id'];
    $EditClass = $db -> fetchOne('class',"id = '".$id."'");
    if(empty($EditClass)){
        $_SESSION['error'] = "Class does not exist";
        header('Location:index-giaovien.php');
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
                        <input type ="checkbox" id="showhiddenstreamcontent">
                        <div class="banner3 classanounce" id="commute2">
                            <label for ="showaddannouncement"><i class=" fas fa-user-graduate"></i> Share something with your class </label>
                        </div>
                        
                        <div class="banner3 commute" id="commute3">
                            <b>Communicate with your class here</b></br>
                            <div id="announce">
                                <i class="far fa-comment-alt"> </i>  Create and schedule annnouncements </br>
                                <i class="far fa-comment"> </i> Respond to student posts
                            </div>
                        </div>
                        
                        <div class="hiddenstreamcontent" >
                        
                            <div id="hiddenstreamcontent-content">
                                <i class="far fa-window-maximize"></i> 
                                
                                Dang Trung Tin <label for="show-stream-edit-delete"> <i class="fa fa-ellipsis-v" id="more"></i></label>
                                <p id="datestream"> Nov 24</p>
                            
                            </div> 

                            <!--  <div id="teachercontent">
                                fdsfhklsdflksjfl;sdjl;fsk
                                
                            </div>
                            
                            <div id="announce">
                                <input id="classcomment" type="text" placeholder="Add class comment"> </input> <label><i class="far fa-paper-plane"></i></label></br> 
                            </div>  -->

                            
                        </div>     
                    </div>
                </div>
            </div>
        </div>
        <div class="tableshowannouncement col-12">  
            <form enctype="multipart/form-data" >
                <div class="formcode">
                    <div class="form-inf">
                        <label> <p id="assignmenclasswork"><b>Share with your class</b> </p></label>
                        <hr style="width:60%; text-align:center; margin-left:0">
                        <h4> For</h4>
                        <select id="announce-select" name="carlist" form="carform">
                            <option value="volvo">All student</option>
                            <option value="saab">Trung Tin</option>
                        </select></br></br>
                        <textarea class="class-inform-textarea" placeholder="Type here"></textarea></br></br>
                        <b> Chọn ảnh</b></br>
                        <input type="file" id="fileanh" >
                        
                        </br></br>
                        <label for="showhiddenstreamcontent">  <button class="btnform">Post</button></label>
                        <button class="btnform" type="reset">Reset</button>
                        <hr style="width:60%; text-align:center; margin-left:0"></br>
                    </div>    
                </div> 
            </form>
        </div>
        <div class="stream-edit-delete col-lg-4">  
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