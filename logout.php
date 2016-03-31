<?php

if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

session_destroy();
echo "logout erfolgreich <a href='index.php'>externer Bereich</a>";
header("Location: index.php"); 


?>