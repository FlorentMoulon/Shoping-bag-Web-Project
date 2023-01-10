<?php

//Appel du modèle
require_once(PATH_MODELS . 'caisse.php');
require_once(PATH_MODELS . 'panier.php');

//Appel de la class View
require_once(PATH_VIEWS . 'View.php');

class C_Caisse
{
    private $caisse;
    private $commande;

    public function __construct()
    {
        $this->caisse = new Caisse();
        $this->commande = new Panier();
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

    // A faire
    public function paiementCheque()
    {
        $idUser = 2;
        $idPanier = 63;
        $vue = new View("paiementCheque");
        $donnes = array('commande' => $this->commande->getPanier($idPanier), 'total' => $this->commande->getTotal($idPanier));
        $vue->generer($donnes);
    }
}
