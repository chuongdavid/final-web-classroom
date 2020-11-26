<?php
    include 'connect_db.php';
    var_dump($_POST);

    $name = $_POST['name'];
    $comment = $_POST['comment'];

    $comment_length =  str_len($comment);

    if($comment_length > 100){
        header("Location: announcement.php?error=1");
    }
    else{
        mysql_query("INSERT INTO  comments VALUES ('','$name','$comment')");
        header("Location: announcement.php");
    }

?>