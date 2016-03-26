<!DOCTYPE HTML>
<html>

	<head>
		<?php include 'partials/head.php';?>
	</head>

	<body class="test">
		<div class="content">

<!-- Menü-->
            <?php include 'partials/menue.php';?> 
            <?php include 'partials/navbar.php';?>

			<div id="content">
				<div id="inner">
				<div id="text">
					<p align="justify"> 
					<h1>Gallerie</h1> 
					<div class="row">
                <div class="col-xs-12 col-sm-8 col-md-12">
                    <div class="inner">
                       
                    	<ul id="galerie">
                        <div class="grid">
                            <?php
							$ordner = "bspimages";
							$alledateien = scandir($ordner);          				
 
							foreach ($alledateien as $datei) {
								$dateiinfo = pathinfo($ordner."/".$datei); 
								$size = ceil(filesize($ordner."/".$datei)/1024); 
								if ($datei != "." && $datei != ".."  && $datei != "_notes" && $dateiinfo['basename'] != "Thumbs.db") { 
 
									//Bildtypen sammeln
									$bildtypen= array("jpg", "jpeg", "gif", "png");
									//Dateien nach Typ prüfen, in dem Fall nach Endungen für Bilder filtern
									if(in_array($dateiinfo['extension'],$bildtypen)){
							?>
            				<div class="galerie">
                				<a href="<?php echo $dateiinfo['dirname']."/".$dateiinfo['basename'];?>" data-lightbox="images">
                				<img src="<?php echo $dateiinfo['dirname']."/".$dateiinfo['basename'];?>" width="130" alt="Vorschau" /></a> 
                				<span><?php echo $dateiinfo['filename']; ?> (<?php echo $size ; ?>kb)</span>
            				</div>
    						<?php 
								// wenn keine Bildeindung dann normale Liste für Dateien ausgeben
								} else { ?>
            					<div class="file">
            						<a href="<?php echo $dateiinfo['dirname']."/".$dateiinfo['basename'];?>">&raquo <?php echo $dateiinfo['filename']; ?></a> (<?php echo $dateiinfo['extension']; ?> | <?php echo $size ; ?>kb)
            					</div>
            				<?php } ?>
							<?php
								};
 							};
							?>

						</ul>
                        </div>
                        </div>
                </div>
            </div>
				</p>
				</div>
				</div>
				<?php include 'partials/footer.php';?>	
			</div>
	</body>
</html>