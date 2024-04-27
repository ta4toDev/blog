<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


include_once('classes/Eintrag.class.php');
include_once('classes/Blog.class.php');

$blog = new Blog();

$eintrag = false;
$key = 0;
$titel = '';
$inhalt = '';
$meldung = 'Bitte Datenfelder ausfüllen.';


if (isset($_GET['key'])) {
    $key = $_GET['key'];
    $eintrag = $blog->getEintrag($key);

    if (!$eintrag) {
        $titel = $eintrag->getTitel();
        $inhalt = $eintrag->getInhalt();
    }
}
