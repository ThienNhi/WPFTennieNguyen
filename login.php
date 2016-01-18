<!DOCTYPE HTML>
<html>

	<head>
		<?php include 'partials/head.php';?>
	</head>


<body>
	
<!-- Banner -->
 			<img id="banner" src="http://vignette4.wikia.nocookie.net/finalfantasy2/images/a/ae/Final_Fantasy_logo.jpg/revision/latest?cb=20100825204826&path-prefix=de">
<!-- Menü-->
            <?php include 'partials/menue.php';?> 
            <?php include 'partials/navbar.php';?>
	<h2>Login / Registration</h2>
	<div class ="in">
	<form action="login.php" method="post">
		<ul id="login">
			<li>
				Username:<br>
				<input type="text" name="username">
			</li>
			<li>
				Passwort:<br>
				<input type="password" name="password"></li>
			<li>
				<input type="submit" name="login"></li>
			<li>
				<a href="../register.php" name="Register"></li>
		</ul>
	</form>
	</div>
</body>
</html>