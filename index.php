<!DOCTYPE html>
<head>
	<link href="assets/bootstrap/css/bootstrap.css" rel="stylesheet">
</head>
<?php
require_once('./config/config.php');

//On appel les vues
require_once(PATH_SHARED_VIEWS . 'header.php');
require_once(PATH_SHARED_VIEWS . 'navbar.php');


require_once(PATH_CONTROLLERS . $page . '.php');


require_once(PATH_SHARED_VIEWS . 'footer.php');











require 'Controleur/Routeur.php';
$routeur = new Routeur();
$routeur->routerRequete();
