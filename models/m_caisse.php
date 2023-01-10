<?php
require_once PATH_MODELS . 'Model.php';



class Caisse extends Model
{
    // Renvoie la liste des objets dans le panier
    function getAdresse($idUser)
    {
        $sql = 'select add1, add2, add3, postcode from customers
            where id = ?';
        $panier = $this->executerRequete($sql, array($idUser));
        return   $panier;
    }
}
