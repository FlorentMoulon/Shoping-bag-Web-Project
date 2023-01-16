<?php

//Appel du modèle
require_once(PATH_MODELS . 'caisse.php');
require_once(PATH_MODELS . 'panier.php');
require_once(PATH_MODELS . 'facture.php');

//Appel de la class View
require_once(PATH_VIEWS . 'View.php');

class C_Caisse
{
    private $caisse;
    private $commande;
    private $facture;

    public function __construct()
    {
        $this->caisse = new Caisse();
        $this->commande = new Panier();
        $this->facture = new Facture();
    }


    public function choisirAdresse()
    {
        if (isset($_SESSION['id']) && !isset($_SESSION['admin'])) {
            $idUser = $_SESSION['id'];
            $donnes = array('adresse' => $this->caisse->getAdresse($idUser));
        } else {
            $donnes = array('adresse' => 0);
        }
        $vue = new View("choisirAdresse");
        $vue->generer($donnes);
    }

    public function getIdPanier()
    {
        if (empty($_SESSION['idPanier'])) {
            $_SESSION['idPanier'] = $this->commande->creerPanier();
        }

        return $_SESSION['idPanier'];
    }

    public function choisirPaiementAdresseCompte()
    {
        $idUser = $_SESSION['id'];
        $adresse = $this->caisse->getAdresse($idUser);

        $idPanier = $this->getIdPanier();
        $this->caisse->changerAdresse($idPanier, $adresse['forname'], $adresse['surname'], $adresse['add1'], $adresse['add2'], $adresse['add3'], $adresse['postcode'], $adresse['phone'], $adresse['email']);

        $vue = new View("choisirPaiement");
        $donnes = array();
        $vue->generer($donnes);
    }

    public function choisirPaiementNvAdresse($first_name, $last_name, $add1, $add2, $city, $postcode, $phone, $email)
    {
        $idPanier = $this->getIdPanier();
        $this->caisse->changerAdresse($idPanier, $first_name, $last_name, $add1, $add2, $city, $postcode, $phone, $email);

        $vue = new View("choisirPaiement");
        $donnes = array();
        $vue->generer($donnes);
    }

    public function paiementCheque()
    {
        $idPanier = $this->getIdPanier();

        //On change le mode de paiement
        $this->caisse->changerModeDePaiement($idPanier, 'cheque');
        //On fini la comande
        $this->caisse->finirCommande($idPanier);

        //On génére la facture
        $this->facture->generer_facture();

        $vue = new View("paiementCheque");
        $donnes = array('commande' => $this->commande->getPanier($idPanier), 'total' => $this->commande->getTotal($idPanier));
        $vue->generer($donnes);

        //On génére la facture
        $this->facture->generer_facture();
    }

    public function paiementPaypal()
    {
        $idPanier = $this->getIdPanier();

        //On change le mode de paiement
        $this->caisse->changerModeDePaiement($idPanier, 'paypal');
        //On fini la comande
        $this->caisse->finirCommande($idPanier);

        $vue = new View("paiementPaypal");
        $donnes = array('commande' => $this->commande->getPanier($idPanier), 'total' => $this->commande->getTotal($idPanier));
        $vue->generer($donnes);
    }
}
