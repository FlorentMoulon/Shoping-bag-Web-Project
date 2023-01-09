<?php
require_once PATH_MODELS . 'Model.php';



class Panier extends Model
{
    // Renvoie la liste des objets dans le panier
    function getPanier($idPanier)
    {
        $sql = 'select P.id, P.name, P.description, P.image, P.price, OI.quantity from orders O
            join orderitems OI on OI.order_id=O.id
            join products P on P.id=OI.product_id
            where O.id = ' . $idPanier;
        $panier = $this->executerRequete($sql, array($idPanier));
        return   $panier;
    }

    function getTotal($idPanier)
    {
        $sql = 'select O.total from orders O
            where O.id = ' . $idPanier;
        $panier = $this->executerRequete($sql, array($idPanier));

        if ($panier->rowCount() == 1)   return $panier->fetch()['total']; // Accès à la première ligne de résultat 
        else throw new Exception("Aucune commande ne correspond à l'identifiant '$idPanier'");
    }
}
