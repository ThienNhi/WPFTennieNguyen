<?php 
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=wpf', 'meinewelt', '12345');
?>

    <!DOCTYPE HTML>
    <html>

    <head>
        <?php include 'partials/head.php';?>
    </head>
    <?php
        if(isset($_GET['register'])) {
        $error = false;
        $email = $_POST['email'];
        $passwort = $_POST['passwort'];
        $passwort2 = $_POST['passwort2'];

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo 'Bitte eine gültige E-Mail-Adresse eingeben<br>';
            $error = true;
        } 	
        if(strlen($passwort) == 0) {
            echo 'Bitte ein Passwort angeben<br>';
            $error = true;
        }
        if($passwort != $passwort2) {
            echo 'Die Passwörter müssen übereinstimmen<br>';
            $error = true;
        }

        //Überprüfe, dass die E-Mail-Adresse noch nicht registriert wurde
        if(!$error) { 
            $statement = $pdo->prepare("SELECT * FROM users WHERE email = :email");
            $result = $statement->execute(array('email' => $email));
            $user = $statement->fetch();

            if($user !== false) {
                echo 'Diese E-Mail-Adresse ist bereits vergeben<br>';
                $error = true;
            }	
        }

        //Keine Fehler, wir können den Nutzer registrieren
        if(!$error) {	
            $passwort_hash = password_hash($passwort, PASSWORD_DEFAULT);

            $statement = $pdo->prepare("INSERT INTO users (email, passwort) VALUES (:email, :passwort)");
            $result = $statement->execute(array('email' => $email, 'passwort' => $passwort_hash));

            if($result) {		
                echo 'Du wurdest erfolgreich registriert. <a href="login.php">Zum Login</a>';
                $showFormular = false;
            } else {
                echo 'Beim Abspeichern ist leider ein Fehler aufgetreten<br>';
            }
        }

        } ?>

        <body class="test">
            <!-- Menü-->
            <?php include 'partials/menue.php';?>
                <?php include 'partials/navbar.php';?>
                    <div id="content">
                        <div id="inner">
                            <div id="text">
                                <h2>Registration</h2>
                                <div class="in">
                                    <form action="?register=1" method="post">
                                        <ul id="login">
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
                                                Passwort wiederholen:
                                                <br>
                                                <input type="password" name="passwort2">
                                            </li>
                                            <li>
                                                <input class="button" value="Registrieren" type="submit" name="registrieren">
                                            </li>
                                        </ul>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php include 'partials/footer.php';?>

                    </div>
        </body>

    </html>