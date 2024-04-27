<?php

include_once('includes/inc.php');
$e = new Blog();
$eintraege = $e->getEintraege();
$titel = '';
$inhalt = '';

?>
<!DOCTYPE html>
<html lang="de">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Seitenname</title>
	<link rel="stylesheet" href="css/style.css" />
	<script src='js/toogleMenue.js'></script>
</head>

<body>

	<main>

		<header>
			<a href="blog_eintraege.php"><img src="images/logo.png" alt="Logo" /></a>
		</header>


		<nav class="topnav" id="myTopnav">
			<a href="blog_eintraege.php">Posts</a>
			<a href="blog_input.php" class="active">neuer Post</a>
			<a href="#">Menüpunkt_2</a>
			<a href="#">Menüpunkt_3</a>
			<a href="#">Anmelden</a>
			<a href="javascript:void(0);" class="icon" onclick="toogleMenue()">&#x2630;</a>
		</nav>



		<form action="<?= $_SERVER["PHP_SELF"]; ?>" method="POST">
			<pre>Titel:  <input type="text" name="titel" value="<?= $titel ?>" ></pre>
			<pre>Inhalt: <textarea type="text" name="inhalt" rows="4" cols="50" value="<?= $inhalt ?>"></textarea></pre>
			<pre><button name="submit" class="btn">Senden</button></pre>
		</form>

		<a href="blog_eintraege.php">Zurück</a>

		<?php
		if ($_POST) {
			$titel = strip_tags(trim($_POST["titel"]));
			$inhalt = strip_tags(trim($_POST["inhalt"]));

			if (!empty($titel) && !empty($inhalt)) {
				$e->addEintrag($titel, $inhalt);
				header('Location: blog_eintraege.php');
				die;
			} else {
				echo "Titel und Inhalt muss vorhanden sein";
			}
		}


		?>


	</main>

</body>

</html>