<?php

//Appel du modèle
require_once(PATH_MODELS . 'caisse.php');

//Appel de la class View
require_once(PATH_VIEWS . 'View.php');

class C_Caisse
{
    private $caisse;

    public function __construct()
    {
        $this->caisse = new Caisse();
    }

    // A faire
    public function choisirAdresse()
    {
        $idUser = 2;
        $vue = new View("choisirAdresse");
        $donnes = array('adresses' => $this->caisse->getAdresse($idUser));
        $vue->generer($donnes);
    }

    // A faire
    public function choisirPayement()
    {
        $idUser = 2;
        $vue = new View("choisirPayement");
        $donnes = array();
        $vue->generer($donnes);
    }
}
