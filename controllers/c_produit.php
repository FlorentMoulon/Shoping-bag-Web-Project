<?php

//Appel du modèle
require_once(PATH_MODELS . 'produit.php');

//Appel de la class View
require_once(PATH_VIEWS . 'View.php');

class C_Produit
{
    private $produit;

    public function __construct()
    {
        $this->produit = new Produit();
    }

    // Affiche la liste de toute les boissons
    public function produits($categorie)
    {
        $vue = new View("produits");
        $donnes = array('produits' => $this->produit->getProduits($categorie), 'categorie' => $categorie);
        $vue->generer($donnes);
    }

    // Affiche une boisson spécifique
    public function produit($categorie, $idProduit)
    {
        $vue = new View("produit");
        $donnes = array(
            'produit' => $this->produit->getProduit($categorie, $idProduit),
            'commentaires' => $this->produit->getCommentaire($idProduit)
        );
        $vue->generer($donnes);
    }
}
