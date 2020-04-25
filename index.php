<?php
    session_start();

    require_once './mvc/application.php';
    $a=new App();
    echo $_GET['url'];
?>
