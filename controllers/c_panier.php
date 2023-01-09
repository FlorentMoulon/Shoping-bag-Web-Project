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
        $this->panier = new Panier();
    }

    // Affiche la liste des objets dans le panier
    public function panier()
    {
        $idPanier = 63;
        $vue = new View("panier");
        $donnes = array('produits' => $this->panier->getPanier($idPanier), 'total' => $this->panier->getTotal($idPanier));
        $vue->generer($donnes);
    }

    public function supprimer($idProduit)
    {
        $idPanier = 63;
        $this->panier->supprimerProduit($idPanier, $idProduit);

        $this->panier();
    }

    public function ajouter($idProduit, $nvQuantite)
    {
        $idPanier = 63;

        if ($nvQuantite > 0) {
            $this->panier->ajouterProduit($idPanier, $idProduit, $nvQuantite);
        } else {
            $this->panier->supprimerProduit($idPanier, $idProduit);
        }

        $this->panier();
    }
}
