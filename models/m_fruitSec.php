<?php
require_once PATH_MODELS . 'Model.php';

class FruitSec extends Model
{
    // Renvoie la liste des fruits secs
    function getFruitsSecs()
    {
        $sql = 'select id, name, description, image, price, quantity from products'
            . ' where cat_id = 3';
        $fruitsSecs = $this->executerRequete($sql);
        return   $fruitsSecs;
    }

    // Renvoie les informations sur un fruit sec précis
    function getFruitSec($idFruitSec)
    {
        $sql = 'select id, name, description, image, price, quantity from products'
            . ' where cat_id = 3 and id =' . $idFruitSec;
        $fruitSec = $this->executerRequete($sql, array($idFruitSec));

        if ($fruitSec->rowCount() == 1)   return $fruitSec->fetch(); // Accès à la première ligne de résultat 
        else throw new Exception("Aucun fruit sec ne correspond à l'identifiant '$idFruitSec'");
    }
}
