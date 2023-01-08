<?php
require_once PATH_MODELS . 'Model.php';

class BIscuit extends Model
{
    // Renvoie la liste des bisuits
    function getBiscuits()
    {
        $sql = 'select id, name, description, image, price, quantity from products'
            . ' where cat_id = 2';
        $biscuits = $this->executerRequete($sql);

        return $biscuits;
    }


    // Renvoie les informations sur un biscuit précis
    function getBiscuit($idBiscuit)
    {
        $sql = 'select id, name, description, image, price, quantity from products'
            . ' where cat_id = 2 and id =' . $idBiscuit;
        $biscuit = $this->executerRequete($sql, array($idBiscuit));

        if ($biscuit->rowCount() == 1)   return $biscuit->fetch(); // Accès à la première ligne de résultat 
        else throw new Exception("Aucune boisson ne correspond à l'identifiant '$idBiscuit'");
    }
}
