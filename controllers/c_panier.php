<?php

//Appel du modèle
require_once(PATH_MODELS . 'panier.php');

//Appel de la class View
require_once(PATH_VIEWS . 'View.php');

class C_Panier
{
    public function __construct()
    {
    }

    // Affiche la liste des objets dans le panier
    public function panier()
    {
        $vue = new View("panier");
        $vue->generer(array());
    }
}
