<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    include('classes/bilder.php');
    $bilder = new Bilder();

if (isset($_SESSION)) {
    $images       = $bilder->getImages($_SESSION['userid']);
	$amountImages = sizeof($images);
    $id = $_SESSION['userid'];
    
    $pdo = new PDO('mysql:host=localhost;dbname=wpf', 'root', '');
    
    $statement = $pdo->prepare("SELECT * FROM users WHERE id = :id");
	$result = $statement->execute(array('id' => $id));
	$user = $statement->fetch();

    $email = $user["email"];
    $created = $user["created_at"];
}

?>
    <!DOCTYPE HTML>
    <html>

    <head>
        <?php include 'partials/head.php';?>
    </head>

    <body class="test">
        <div class="content">
            <!-- Menü-->
            <?php include 'partials/menue.php';?>
                <div id="content">
                    <div id="inner">
                        <div id="text">
                            <h2>Profilseite von <?php echo $email?></h2>
                            <p align="justify">Mitglied seit:
                                <?php echo $created?>
                            </p>
                        </div>
                    </div>
                    <div id="innerNext">
                        <div id="text">
                            <p>Bildupload</p>
                            <form method="post" id="uploadForm" class="uploadForm" action="" enctype="multipart/form-data">
                                <p align="justify">Bilddatei:</p>
                                <label class="file">
                                    <input type="file" id="file" name="img">
                                    <span class="file-custom"></span>
                                    <input type="submit" id="upload" name="submit" value="Upload">
                                </label>

                                </br>


                            </form>
                        </div>
                        <p id='loading' hidden="true">loading..</p>
                        <p id="message"></p>
                    </div>

                    <div id="innerLast">
                        <p>Ihre Hochgeladenen Bilder:</p>
                        <div>
                            <?php
                                if($amountImages > 0){
                                    foreach ($images as $value) {
                                    echo '<a href="' . $value->path .'" data-lightbox="images" ><img src="' . $value->path .'" width="130" /></a>'; 
                                       
                                } } else{ echo "Es sind noch keine Bilder vorhanden!"; } ?>
                        </div>
                    </div>

                </div>
        </div>
    </body>

    </html>