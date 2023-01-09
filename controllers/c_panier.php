<?php

//Appel du modèle
require_once(PATH_MODELS . 'panier.php');

//Appel de la class View
require_once(PATH_VIEWS . 'View.php');

class C_Panier
{
    private $panier;

    public function __construct()
    {
        $this->panier;
    }

    // Affiche la liste des objets dans le panier
    public function panier()
    {
        $vue = new View("panier");
        $donnes = array('produits' => $this->panier->getPanier());
        $vue->generer(array($donnes));
    }
}
