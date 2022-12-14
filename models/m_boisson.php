<?php
require_once PATH_MODELS . 'Model.php';

class Boisson extends Model
{
    // Renvoie la liste des billets du blog public
    function getBoissons()
    {
        $sql = 'select ';
        $boissons = $this->executerRequete($sql);
        return   $boissons;
    }

    // Renvoie les informations sur un billet public
    function getBoisson($idBoisson)
    {
        $sql = 'select '
            . ' where =';
        $boisson = $this->executerRequete($sql, array($idBoisson));

        if ($boisson->rowCount() == 1)   return $boisson->fetch(); // Accès à la première ligne de résultat 
        else throw new Exception("Aucune boisson ne correspond à l'identifiant '$idBoisson'");
    }
}
