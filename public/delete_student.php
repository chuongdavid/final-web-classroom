
<?php
        require_once __DIR__. "/../autoload/autoload.php";
        $id_class = $_GET['id'];
        $id_student = $_GET['student'];
        $EditClass = $db -> fetchOne('class',"id = '".$id_class."'");
        $EditStudent = $db -> fetchOne('user',"id = '".$id_student."'");
        if(empty($EditClass)){
            $_SESSION['error'] = "Class does not exist";
            header('Location:people.php?id='.$id_class.'');
        }
        if(empty($EditClass)){
            $_SESSION['error'] = "Student does not exist";
            header('Location:people.php?id='.$id_class.'');
        }
        $num = $db ->deleteQuery("student_class","id_student = '".$id_student."'");
        if(count($num) >0){
            $_SESSION['success'] = ' Delete successfully ';
            header('Location:people.php?id='.$id_class.'');
        }
        else {
            $_SESSION['error'] = ' Delete fail ';
            header('Location:people.php?id='.$id_class.'');
        }
?>