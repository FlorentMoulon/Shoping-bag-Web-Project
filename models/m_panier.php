<?php
require_once PATH_MODELS . 'Model.php';

class Panier extends Model
{
    //a faire
    // Renvoie la liste des objets dans le panier
    function getPanier()
    {
        $sql = 'select ';
        $panier = $this->executerRequete($sql);
        return   $panier;
    }
}
