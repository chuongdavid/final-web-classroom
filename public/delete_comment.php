<?php

    require_once __DIR__. "/../autoload/autoload.php";
    $announce = $_GET['id_announce'];
    $announceChk = $db -> fetchOne('announcement', "id = '".$announce."'");
    $cmtID = $_GET['id'];
    $cmtChk = $db -> fetchOne('comment', "id = '".$cmtID."'");
        if(empty($announceChk)){
            $_SESSION['error'] = "Announce does not exist";
            header('Location:stream.php?id='.$announce.'');
        }
        if(empty($cmtChk)){
            $_SESSION['error'] = "Comment does not exist";
            header('Location:announcement.php?id='.$announce.'');
        }
        $num = $db ->deleteQuery("comment","id = '".$cmtID."'");
        if(count($num) >0){
            $_SESSION['success'] = ' Delete successfully ';
            header('Location:announcement.php?id='.$announce.'');
        }
        else {
            $_SESSION['error'] = ' Delete fail ';
            header('Location:announcement.php?id='.$announce.'');
        }
?>