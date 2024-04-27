<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


include_once('classes/Eintrag.class.php');
include_once('classes/Blog.class.php');

$blog = new Blog();
$blog->delEintrag($_GET['key']);

header('Location: blog_eintraege.php');
die;
