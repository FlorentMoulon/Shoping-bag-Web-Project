<?php

//Appel du modèle
require_once(PATH_MODELS . 'biscuit.php');

//Appel de la class View
require_once(PATH_VIEWS . 'View.php');

class C_Biscuit
{
    public function __construct()
    {
    }

    //A faire
    // Affiche la liste de toute les boissons
    public function biscuits()
    {
        $vue = new View("biscuits");
        $vue->generer(array());
    }



    //A faire
    // Affiche une boisson spécifique
    public function biscuit($idBiscuit)
    {
        $vue = new View("biscuit");
        $vue->generer(array());
    }
}
