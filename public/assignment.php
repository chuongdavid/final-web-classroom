<?php

require_once __DIR__. "/../autoload/autoload.php";
var_dump($_SESSION);
$id_class = $_GET['id'];
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
            header('Location: classwork.php?id='.$id_class.'');
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
                
                <a href="" class="btn btn-warning">Cancle</a>
            
            </div>    
        </form>
    </div>
</body>
<html>