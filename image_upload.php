<?php
session_start();
include('classes/bilder.php');
$gallery = new Bilder();

$data = $_FILES["img"];
$userid = $_SESSION['userid'];
    
$gallery->upload($data, $userid);

?>