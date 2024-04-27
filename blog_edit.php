<?php
include_once ('includes/inc.php');
$e = new Blog();
$titel = '';
$inhalt = '';
$key = '';

// Prüfen, ob 'key' über GET übergeben wurde
if (isset($_GET['key'])) {
	$key = htmlspecialchars($_GET['key']);
	$eintrag = $e->getEintrag($key);

	// Überprüfen, ob ein Eintrag zurückgegeben wurde
	if ($eintrag) {
		$titel = $eintrag->getTitel();
		$inhalt = $eintrag->getInhalt();
	}
}

// Bearbeiten des Eintrags bei POST-Anfrage
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['key'], $_POST['titel'], $_POST['inhalt'])) {
	$e->editEintrag(htmlspecialchars($_POST['key']), htmlspecialchars($_POST['titel']), htmlspecialchars($_POST['inhalt']));
	header('Location: blog_eintraege.php');
	die;
}
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
		<form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
			<input type="hidden" name="key" value="<?= htmlspecialchars($key) ?>" />
			<pre>Titel:  <input type="text" name="titel" value="<?= htmlspecialchars($titel) ?>" placeholder="Titel"></pre>
			<pre>Inhalt: <textarea name="inhalt" rows="4" cols="50" placeholder="Inhalt"><?= htmlspecialchars($inhalt) ?></textarea></pre>
			<pre><button name="submit" class="btn">Senden</button></pre>
		</form>
	</main>
</body>
</html>
