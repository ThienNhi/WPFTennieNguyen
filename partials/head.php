<meta name="description" content="Dies ist eine Final Fantasy Fanseite, die auf neue Releases zeitnah News hochlädt. Zudem können anhand der Gallerie neu veröffentlichte Bilder gesehen werden.">
<meta name="author" content="Nguyen und Tennie">
<link rel="stylesheet" href="../css/stylesheet.css">
<link rel="stylesheet" href="../css/lightbox.min.css">
<script src="../js/lightbox-plus-jquery.min.js"></script>

<!-- Für Font und Co -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script type="text/javascript">
	$("document").ready(function(){
	$(".json").submit(function(){
		var data = {
		"action": "success"
		};
		data = $(this).serialize() + "&" + $.param(data);
		$.ajax({
			type: "POST",
			dataType: "json",
			url: "response.php", //Relative or absolute path to response.php file
			data: data,
			success: function(data) {
				$(".the-return").html(
				"Final Fantasy Serie: " + data["series"] + "<br /> Bereich: " + data["bereich"] + "<br />" + data["json"]
				);
				alert("Submitted successfully.\nReturned json: " + data["json"]);
				window.location.href = "index.php";
			}
		});
	return false;
	});
	});
</script>

<title> Final Fantasy Fanseite</title>