<?php
	$connect_error = "Sorry, hier ist ein Problem.";
	mysqli_connect("localhost","", "") or die($connect_error);
	mysql_select_db("new");
?>