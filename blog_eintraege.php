<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once('includes/inc.php');
$e = new Blog();
$eintraege = $e->getEintraege();

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


		<?php

		if ($eintraege > 0) {
		?>
			<pre>Anzahl der Eintr&auml;ge: <?= $e->countEintraege($eintraege) ?></pre>

			<table class="tabelle">
				<tr>
					<th>Key</th>
					<th>Titel</th>
					<th>Inhalt</th>
					<th>Datum</th>
					<th>Bearbeiten</th>
					<th>L&ouml;schen</th>
				</tr>
				<?php foreach ($eintraege as $key => $eintrag) { ?>
					<tr>
						<td><?= $key ?></td>
						<td><a href="zeige_eintrag.php?key=<?= $key ?>"><?= $eintrag->getTitel() ?></a></td>
						<td><?= substr($eintrag->getInhalt(), 0, 50) . '...' ?></td>
						<td><?= $eintrag->getDatum() ?></td>
						<td><a href="blog_edit.php?key=<?= $key ?>">&#128397;</a></td>
						<td><a href=" del_eintrag.php?key=<?= $key ?>" onclick="return confirm('Sind Sie sicher?');">&#128465;</a></td>

					</tr>

				<?php } ?>
			</table>
		<?php
		}
		?>


	</main>

</body>

</html>