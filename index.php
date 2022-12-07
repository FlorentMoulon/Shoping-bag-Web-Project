<?php
require_once('./config/config.php');


//On démare la session
session_start();

//Si l'utilisateur n'avait pas encore de session, on lui créer un id unique
if (!isset($_SESSION['id'])) {
	$_SESSION['customer_id'] = 0;
	$_SESSION['id'] = uniqid();
	$_SESSION['admin'] = false;
	$_SESSION['connected'] = false;
}



/*if(isset($_GET['page']))
{
	$page = htmlspecialchars($_GET['page']); 
	if(!is_file(PATH_CONTROLLERS.$_GET['page'].".php"))
	{ 
	$page = "404"; //page demandée inexistante
	}
}
else*/
$page = "home"; //page d'accueil du site




//On appel les vues
require_once(PATH_SHARED_VIEWS . 'header.php');
require_once(PATH_SHARED_VIEWS . 'navbar.php');


require_once(PATH_CONTROLLERS . $page . '.php');


require_once(PATH_SHARED_VIEWS . 'footer.php');











require 'Controleur/Routeur.php';
$routeur = new Routeur();
$routeur->routerRequete();
