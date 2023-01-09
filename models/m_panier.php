<?php
require_once PATH_MODELS . 'Model.php';



class Panier extends Model
{
    //a faire
    // Renvoie la liste des objets dans le panier
    function getPanier()
    {

        $idPanier = 0;

        $sql = 'select id, name, description, image, price, quantity from order'
            . ' where id = ' . $idPanier;
        $panier = $this->executerRequete($sql, array($idPanier));
        return   $panier;
    }
}
