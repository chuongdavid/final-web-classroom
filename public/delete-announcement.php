
<?php
        require_once __DIR__. "/../autoload/autoload.php";
        $id = $_GET['id'];
        $id_class = $_GET['id_class'];
        $EditAnnouncement = $db -> fetchOne('announcement',"id = '".$id."'");
        if(empty($EditAnnouncement)){
            $_SESSION['error'] = "Announcement does not exist";
            if(check_role($_SESSION['email'])==0){
                header('Location:index-sinhvien.php');
            }
            else{
                header('Location:index-giaovien.php');
            }
        }
        $num = $db ->deleteQuery("announcement","id = '".$id."'");
        if(count($num) >0){
            $_SESSION['success'] = ' Delete successfully ';
            header('Location:stream.php?id='.$id_class.'');
        }
        else {
            $_SESSION['error'] = ' Delete fail ';
            header('Location:stream.php?id='.$id_class.'');
        }
?>