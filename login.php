<?php 
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
$pdo = new PDO('mysql:host=localhost;dbname=wpf', 'root', '');
 
if(isset($_GET['login'])) {
	$email = $_POST['email'];
	$passwort = $_POST['passwort'];
	
	$statement = $pdo->prepare("SELECT * FROM users WHERE email = :email");
	$result = $statement->execute(array('email' => $email));
	$user = $statement->fetch();
		
	//Überprüfung des Passworts
	if ($user !== false && password_verify($passwort, $user['passwort'])) {
		$_SESSION['userid'] = $user['id'];
        header("Location: index.php"); 
		die('Login erfolgreich. Weiter zu <a href="index.php">internen Bereich</a>');
        exit();
	} else {
		$errorMessage = "E-Mail oder Passwort war ungültig<br>";
	}
	
}
?>

    <!DOCTYPE HTML>
    <html>

    <head>
        <?php include 'partials/head.php';?>
            <title>Login</title>
    </head>

    <?php 
        if(isset($errorMessage)) {
	       echo $errorMessage;
        }?>

        <body class="test">
            <!-- Menü-->
            <?php include 'partials/menue.php';?>
                <?php include 'partials/navbar.php';?>
                    <div id="content">
                        <div id="inner">
                            <div id="text">
                                <h2>Login</h2>
                                <div class="in">
                                    <form action="?login=1" method="post">
                                        <ul id="login">
                                            <div class="form">
                                                <li>
                                                    Email:
                                                    <br>
                                                    <input type="text" name="email">
                                                </li>
                                                <li>
                                                    Passwort:
                                                    <br>
                                                    <input type="password" name="passwort">
                                                </li>
                                                <li>
                                                    <input class="button" type="submit" name="login">
                                                </li>
                                            </div>
                                        </ul>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php include 'partials/footer.php';?>

                    </div>
        </body>

    </html>