<?php
    session_start();
    session_destroy();
    unset($_SESSION['username']);
    $_SESSION['message'] = "Logged out success.";
    header("Location: login.php");
?>