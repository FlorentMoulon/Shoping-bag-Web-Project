<?php
require_once PATH_MODELS . 'Model.php';

class BIscuit extends Model
{
    // Renvoie la liste des billets du blog public
    function getBiscuits()
    {
        $sql = 'select ';
        $biscuits = $this->executerRequete($sql);
        return   $biscuits;
    }

    // Renvoie les informations sur un billet public
    function getBiscuit($idBiscuit)
    {
        $sql = 'select '
            . ' where =';
        $biscuit = $this->executerRequete($sql, array($idBiscuit));

        if ($biscuit->rowCount() == 1)   return $biscuit->fetch(); // Accès à la première ligne de résultat 
        else throw new Exception("Aucun biscuit ne correspond à l'identifiant '$idBiscuit'");
    }
}
