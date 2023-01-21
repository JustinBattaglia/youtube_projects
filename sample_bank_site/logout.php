<?php
    if(!isset($_SESSION)) 
    { 
        $session = session_start();
    } 

    if(session_destroy()) {
        header("Location: index.php");
    }
?>