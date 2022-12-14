<?php

//Appel du modèle
require_once(PATH_MODELS . 'boisson.php');

//Appel de la class View
require_once(PATH_VIEWS . 'View.php');

class C_Boisson
{
    public function __construct()
    {
    }

    // Affiche la liste de toute les boissons
    public function boissons()
    {
        $vue = new View("boisson");
        $vue->generer(array());
    }



    //A faire
    // Affiche une boisson spécifique
    public function boisson($idBoisson)
    {
        $vue = new View("boisson");
        $vue->generer(array());
    }
}
