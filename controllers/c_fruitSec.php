<?php

//Appel du modèle
require_once(PATH_MODELS . 'fruitSec.php');

//Appel de la class View
require_once(PATH_VIEWS . 'View.php');

class C_FruitSec
{
    private $fruitSec;

    public function __construct()
    {
        $this->fruitSec = new FruitSec();
    }

    // Affiche la liste de toute les fruits secs
    public function fruitsSecs()
    {
        $vue = new View("fruitsSecs");
        $donnes = array('fruitsSecs' => $this->fruitSec->getFruitsSecs());
        $vue->generer($donnes);
    }

    // Affiche un fruti sec spécifique
    public function fruitSec($idFruitSec)
    {
        $vue = new View("fruitSec");
        $donnes = array('fruitSec' => $this->fruitSec->getFruitSec($idFruitSec));
        $vue->generer($donnes);
    }
}
