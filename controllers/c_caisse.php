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

    public function getIdPanier()
    {
        if (empty($_SESSION['idPanier'])) {
            $_SESSION['idPanier'] = $this->commande->creerPanier();
        }

        return $_SESSION['idPanier'];
    }

    public function choisirPaiementAdresseCompte($idUser)
    {
        $adresse = $this->caisse->getAdresse($idUser);

        $idPanier = $this->getIdPanier();
        $this->commande->changerAdresse($idPanier, $adresse['forname'], $adresse['surname'], $adresse['add1'], $adresse['add2'], $adresse['add3'], $adresse['postcode'], $adresse['phone'], $adresse['email']);

        $vue = new View("choisirPaiement");
        $donnes = array();
        $vue->generer($donnes);
    }

    public function choisirPaiementNvAdresse($first_name, $last_name, $add1, $add2, $city, $postcode, $phone, $email)
    {
        $idPanier = $this->getIdPanier();
        $this->commande->changerAdresse($idPanier, $first_name, $last_name, $add1, $add2, $city, $postcode, $phone, $email);

        $vue = new View("choisirPaiement");
        $donnes = array();
        $vue->generer($donnes);
    }

    // A faire
    public function paiementCheque($idUser)
    {
        $idPanier = $this->getIdPanier();
        $vue = new View("paiementCheque");
        $donnes = array('commande' => $this->commande->getPanier($idPanier), 'total' => $this->commande->getTotal($idPanier));
        $vue->generer($donnes);
    }
}
