<?php
require_once __DIR__. "/../autoload/autoload.php";
$id_class = $_GET['id'];
if(!isset($_SESSION['email'])){
    header("Location: login.php");
}
//get assignment
$assignment = $db -> fetchAllCondition('assignment',"id_class = '". $id_class ."'");


//create assignment
if(isset($_POST['title']) && isset($_POST['instruction']) && isset($_POST['dateStart']) && isset($_POST['dateEnd'])){
    $title = $_POST['title'];
    $instruction = $_POST['instruction'];
    $date_start = strtotime($_POST['dateStart']);
    $date_end = strtotime($_POST['dateEnd']);

    if(($date_end-$date_start)<0){

        $_SESSION['error'] = 'Assignment must be created before deadline !';
    }else{
        $data = ['title'=>$title,
                'instruction'=> $instruction,
                'id_class' => $id_class,
                'date_start' => $_POST['dateStart'],
                'date_end' => $_POST['dateEnd'],
                'created_by_id' => $_SESSION['id_user']
    ];
        $insert_assignment = $db -> insert('assignment',$data);
        if(count($insert_assignment)>0){
            $_SESSION['success'] = 'Create assignment successfully';
            header('refresh:0.7');
        }
        else{
            $_SESSION['error'] = 'Create assignment fail';
        }
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
        <div class = "container-sm">
            
            <?php foreach($assignment as  $item): ?>
                <a href="">
            <div class="assignment-classwork col-lg-8" >             
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
        

        
        <div class=" createassign col-5">
            <form class="formtext" method="POST">
                <div>
                    <label> <p id="assignmenclasswork"><b>Assignment</b> </p></label>
                    <hr class="line"></br>
                    <div class="titleintruction">
                        <i id="titleicon" class="fas fa-mug-hot"></i> <input name="title" id="title" type = "text" placeholder="Title" ></br></br>
                        <i id="instructionicon" class="fas fa-align-left"></i> <input name="instruction" id="instruction" type = "text" placeholder="Intructions"></br></br>
                        <i id="instructionicon" class="far fa-calendar-alt" style="margin-right: 14px"></i> <input name="dateStart" type="datetime-local" id="startdate"></br></br>
                        <i id="instructionicon" class="far fa-calendar-alt" style="margin-right: 14px"></i> <input name="dateEnd" type="datetime-local" id="deadline"> 
                    </div>
                </div>
                <hr classs="line">
                </br>
                
                <div class="btnsform-assign">
                    
                    <button class="btn btn-primary">Create</button>
                    
                    <a href="#" class="btn btn-warning">Cancle</a>
                
                </div>    
            </form>
        </div>
        
        
    </body>
</html>