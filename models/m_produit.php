<?php
require_once PATH_MODELS . 'Model.php';

class Produit extends Model
{
    // Renvoie la liste des boissons
    function getProduits($categorie)
    {
        $sql = "select id, name, description, image, price, quantity from products
            where cat_id = ?";
        $produits = $this->executerRequete($sql, array($categorie));
        return $produits;
    }

    // Renvoie les informations sur une boisson précise
    function getProduit($categorie, $idProduit)
    {
        $sql = 'select id, name, description, image, price, quantity from products'
            . ' where cat_id = ? and id = ?';
        $produit = $this->executerRequete($sql, array($categorie, $idProduit));

        if ($produit->rowCount() == 1)   return $produit->fetch(); // Accès à la première ligne de résultat 
        else throw new Exception("Aucune produit de la catégorie '$categorie' ne correspond à l'identifiant '$idProduit'");
    }

    //Renvoi la liste des commantaire du produit
    function getCommentaire($idProduit)
    {
        $sql = 'select name_user, photo_user, stars, title, description from reviews
                where id_product = ?';
        $commentaire = $this->executerRequete($sql, array($idProduit));

        return $commentaire;
    }
}
