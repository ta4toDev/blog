<?php

include_once ('includes/inc.php');
$e = new Blog();
$key = htmlspecialchars($_GET['key']);


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
			<a href="blog_eintraege.php" class="active">Posts</a>
			<a href="blog_input.php">neuer Post</a>
			<a href="#">Menüpunkt_2</a>
			<a href="#">Menüpunkt_3</a>
			<a href="#">Anmelden</a>
			<a href="javascript:void(0);" class="icon" onclick="toogleMenue()">&#x2630;</a>
		</nav>

		<pre>
<?php
$eintrag = $e->getEintrag($key);
$titel = $eintrag->getTitel();
$inhalt = nl2br($eintrag->getInhalt());
?>
<table class="tabelle">
<tr>
	<th>Key</th>
	<th>Titel</th>
	<th>Inhalt</th>
	<th>Datum</th>
</tr>

	<tr>
		<td><?= $key ?></td>
		<td><?= $titel ?></td>
		<td><?= $inhalt ?></td>
		<td><?= $eintrag->getDatum() ?></td>
	</tr>

</table>
<a href="blog_eintraege.php">Zurück</a>

</pre>

	</main>

</body>

</html>