<?php
require_once PATH_MODELS . 'Model.php';

class FruitSec extends Model
{
    // Renvoie la liste des billets du blog public
    function getFruitsSecs()
    {
        $sql = 'select ';
        $fruitsSecs = $this->executerRequete($sql);
        return   $fruitsSecs;
    }

    // Renvoie les informations sur un billet public
    function getFruitSec($idFruitSec)
    {
        $sql = 'select '
            . ' where =';
        $fruitSec = $this->executerRequete($sql, array($idFruitSec));

        if ($fruitSec->rowCount() == 1)   return $fruitSec->fetch(); // Accès à la première ligne de résultat 
        else throw new Exception("Aucun fruit sec ne correspond à l'identifiant '$idFruitSec'");
    }
}
