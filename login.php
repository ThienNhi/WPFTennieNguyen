<!DOCTYPE HTML>
<html>

	<head>
		<?php include 'partials/head.php';?>
	</head>


<body class="test">
<!-- Menü-->
            <?php include 'partials/menue.php';?> 
            <?php include 'partials/navbar.php';?>
    <div id="content">
				<div id="inner">
				<div id="text">        
					<h2>Login / Registration</h2>
					<div class ="in">
						<form action="login.php" method="post">
							<ul id="login">
								<li>
									Username:<br>
									<input type="text" name="username"></li>
								<li>
									Passwort:<br>
									<input type="password" name="password"></li>
								<li>
									<input type="submit" name="login"></li>
							</ul>
						</form>
					</div>
				</div>
				</div>
				<?php include 'partials/footer.php';?>	

	</div>
</body>
</html>