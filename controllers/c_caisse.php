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
        $idUser = 1;
        $vue = new View("choisirAdresse");
        $donnes = array('adresse' => $this->caisse->getAdresse($idUser));
        $vue->generer($donnes);
    }

    // A faire
    public function choisirPaiement()
    {
        $idUser = 2;
        $vue = new View("choisirPaiement");
        $donnes = array();
        $vue->generer($donnes);
    }
}
