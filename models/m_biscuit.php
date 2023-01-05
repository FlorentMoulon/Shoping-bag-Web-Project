<?php
require_once PATH_MODELS . 'Model.php';

class BIscuit extends Model
{
    // Renvoie la liste des bisuits
    function getBiscuits()
    {
        $sql = 'select ';
        $biscuits = $this->executerRequete($sql);
        return   $biscuits;
    }

    // Renvoie les informations sur un biscuit précis
    function getBiscuit($idBiscuit)
    {
        $sql = 'select '
            . ' where =';
        $biscuit = $this->executerRequete($sql, array($idBiscuit));

        if ($biscuit->rowCount() == 1)   return $biscuit->fetch(); // Accès à la première ligne de résultat 
        else throw new Exception("Aucun biscuit ne correspond à l'identifiant '$idBiscuit'");
    }
}
