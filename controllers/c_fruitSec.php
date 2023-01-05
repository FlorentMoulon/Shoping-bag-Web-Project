<?php

//Appel du modèle
require_once(PATH_MODELS . 'fruitSec.php');

//Appel de la class View
require_once(PATH_VIEWS . 'View.php');

class C_FruitSec
{
    public function __construct()
    {
    }

    // Affiche la liste de toute les fruits sec
    public function fruitsSecs()
    {
        $vue = new View("fruitsSecs");
        $vue->generer(array());
    }



    //A faire
    // Affiche un fruti sec spécifique
    public function fruitSec($idFruitSec)
    {
        $vue = new View("fruitSec");
        $vue->generer(array());
    }
}
