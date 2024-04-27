<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once('classes/Eintrag.class.php');
include_once('classes/Blog.class.php');


$e = new Blog();

$e->addEintrag('Heute', 'jsklalskdllslslsl');
$e->addEintrag('Morgen', 'kdkcdsssddffldsls');
$e->addEintrag('Gestern', 'kdkcdsssddffldsls');

//var_dump($e);


foreach ($e->getEintraege() as $eintrag) {
    echo $eintrag->getTitel() . " " . $eintrag->getInhalt() .  " " . $eintrag->getDatum() . "<br>";
}
