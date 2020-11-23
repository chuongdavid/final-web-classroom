<?php 

    require_once __DIR__. "/../autoload/autoload.php";
    $data_user = $db -> fetchOne('user',"email = 'ssadasdtudent@gmail.com'"); 
    var_dump($data_user);
    if(is_array($data_user)){
        echo "yes";
    }
    else{
        echo "not";
    }
?>