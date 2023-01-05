<?php
session_start(); //Démarage de la session 
require_once('./config/config.php');

require PATH_CONTROLLERS . 'routeur.php';
$routeur = new Routeur();
$routeur->routerRequete();
