<?php
require_once('./config/config.php');

require PATH_CONTROLLERS . 'routeur.php';
$routeur = new Routeur();
$routeur->routerRequete();
