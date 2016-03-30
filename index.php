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

<!-- Versuch, um die Bilder herum Text zu schreiben-->
			<div id="content">
				<div id="inner">
				<div id="text">
					<p align="justify"> 
						<h1>Final Fantasy Fanseite</h1> 
							Hier ist ein bisschen Text. Das ist die Startseite f&uumlr alle neuesten Infos zur Final Fantasy Serie.
							Zus&auml;tzlich besteht hier die M&ouml;glichkeit eine simple JSON-Response zu kriegen auf die Auswahl, die man getroffen hat (s.u.)
					</p>
					<form action="index.php" class="json" method="post" accept-charset="utf-8">
						<select name="series">
							<option value="FF7">FF7</option>
							<option value="FF8">FF8</option>
							<option value="FF9">FF9</option>
						</select>
						<select name="bereich">
							<option value="Geschichte">Geschichte</option>
							<option value="Musik">Musik</option>
							<option value="Links">Weitere Links</option>
						</select>
						<input type="submit" name="submit" value="Submit" />
					</form>
					<div class="the-return">
					</div>
				</div>
				</div>
				<?php include 'partials/footer.php';?>	
			</div>


	</body>
</html>