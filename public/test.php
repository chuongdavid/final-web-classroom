<?php 
    $current = time();
    var_dump($current);
    $current2 = time()+24*3600;
    var_dump($current2);
    if(time()<time()+24*3600){
        echo "yes";
    }
    else{
        echo "no";
    }
?>