<?php
    session_start();
    
    if ($precisa_sesion){
        if($_SESSION['id'] == ""){
            header("location: login.php");
            die();
        }
    }
    else if ($_SESSION['id'] != ""){
        header("location: mapa.php");
        die();
    }
    
    define('DB_HOST', "localhost");
    define('DB_USER', "wence");
    define('DB_PASS', "wence");
    define('DB_DB', "SGS");
    
    $db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_DB);
?>