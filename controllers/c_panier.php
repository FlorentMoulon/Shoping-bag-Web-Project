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


    public function getIdPanier()
    {
        if (empty($_SESSION['idPanier'])) {
            $_SESSION['idPanier'] = $this->panier->creerPanier();
        }

        return $_SESSION['idPanier'];
    }

    // Affiche la liste des objets dans le panier
    public function panier()
    {
        $idPanier = $this->getIdPanier();
        $vue = new View("panier");
        $donnes = array('produits' => $this->panier->getPanier($idPanier), 'total' => $this->panier->getTotal($idPanier));
        $vue->generer($donnes);
    }


    public function ajouterProduit($idProduit, $quantite)
    {
        $this->panier->ajouterProduit($this->getIdPanier(), $idProduit, $quantite);
        $this->panier();
    }


    public function supprimer($idProduit)
    {
        $idPanier = $this->getIdPanier();
        $this->panier->supprimerProduit($idPanier, $idProduit);

        $this->panier();
    }

    public function changerQuantite($idProduit, $nvQuantite)
    {
        $idPanier = $this->getIdPanier();

        if ($nvQuantite > 0) {
            $this->panier->changerQuantite($idPanier, $idProduit, $nvQuantite);
        } else {
            $this->panier->supprimerProduit($idPanier, $idProduit);
        }

        $this->panier();
    }
}
