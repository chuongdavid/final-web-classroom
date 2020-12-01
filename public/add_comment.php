<?php
require_once __DIR__. "/../autoload/autoload.php";
    if (isset($_POST['commentSubmit'])){
        $id = uniqid();
    
        $data = [
            "id" => $id,
            "id_announce" => $_POST['id_announce'],
            "id_class" => $_POST['id_class'],
            "created_by_who" => $_POST['created_by_who'],
            "content" => $_POST['content'],
          ];
        $db -> insert('comment', $data);
        header("Location: announcement.php?id=$_POST[id_announce]");
    }
?>