<?php

/*
//Appel du modèle
require_once(PATH_MODELS . 'home.php');

//Appel de la class View
require_once(PATH_VIEWS . 'View.php');

class C_Home
{
    public function __construct()
    {
    }

    // Affiche la page d'aceuil
    public function home()
    {
        $vue = new View("home");
        $vue->generer(array());
    }
}*/


require_once(PATH_MODELS . 'boisson.php');
require_once(PATH_VIEWS . 'View.php');

class ControleurAccueil
{
    private   $billet;

    public function __construct()
    {
        $this->billet = new Boisson();
    }

    // Affiche la liste de tous les billets du blog 
    public function accueil()
    {
        $billets = $this->billet->getBoissons();
        $vue = new Vue("Accueil");
        $vue->generer(array('billets' => $billets));
    }
}
