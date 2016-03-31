<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>

    <ul id="menue">
        <li><a href="../index.php">Home</a></li>
        <li><a href="../gallery.php">Gallerie</a></li>
        <ul id="login">
            <?php
    if(isset($_SESSION['userid'])) {
        ?>
                <li><a href="../profil.php">Profile</a></li>
                <li><a href="../logout.php">Logout</a></li>
                <?php
    } else{
    ?>
                    <li><a href="../registration.php">Registration</a></li>
                    <li><a href="../login.php">Login</a></li>
                    <?php
                    } ?>

        </ul>
    </ul>