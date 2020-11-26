
<?php
        require_once __DIR__. "/../autoload/autoload.php";
        $id = $_GET['id'];
        $EditClass = $db -> fetchOne('class',"id = '".$id."'");
        if(empty($EditClass)){
            $_SESSION['error'] = "Class does not exist";
            header('Location:index-giaovien.php');
        }
        $num = $db ->deleteQuery("class","id = '".$id."'");
        if(count($num) >0){
            $_SESSION['success'] = ' Delete successfully ';
            header('Location:index-giaovien.php');
        }
        else {
            $_SESSION['error'] = ' Delete fail ';
            header('Location:index-giaovien.php');
        }
?>