<?php
require_once PATH_MODELS . 'Model.php';



class Caisse extends Model
{
    // Renvoie l'adresse d'un utilisateur, s'il en a une
    function getAdresse($idUser)
    {
        $sql = 'select add1, add2, add3, postcode from customers
            where id = ?';
        $adresse = $this->executerRequete($sql, array($idUser));

        if ($adresse->rowCount() == 1) return $adresse->fetch(); // Accès à la première ligne de résultat
        else return;
    }
}
