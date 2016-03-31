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
                            <h1>Das ist die Profilseite des Nutzers</h1>
                            <p align="justify">Personendaten</p>
                        </div>
                    </div>
                    <div id="innerNext">
                        <div id="text">
                            <p>Bildupload</p>
                            <form method="post" id="uploadForm" action="" enctype="multipart/form-data">
                                <p>Bilddatei:</p>
                                <input type="file" name="img">
                                </br>
                                <input type="submit" id="upload" name="submit" value="Upload">
                            </form>
                        </div>
                        <h4 id='loading' hidden="true">loading..</h4>
                        <p id="message"></p>
                    </div>

                    <div id="innerLast">
                        <p>Ihre Hochgeladenen Bilder:</p>
                        <div>
                            <?php
                                if($amountImages > 0){
                                    foreach ($images as $value) {
                                        echo '<a href="' . $value->path .'"></a>'; 
                                        echo '<img src="' . $value->path .'" width="130" />';
                                    }
                                } else{
                                    echo "Es sind noch keine Bilder vorhanden!";
                                }
                            ?>
                        </div>
                    </div>

                </div>
        </div>
    </body>

    </html>