<?php
require_once PATH_MODELS . 'Model.php';

class Boisson extends Model
{
    // Renvoie la liste des boissons
    function getBoissons()
    {
        $sql = 'select name, description, image, price, quantity from products'
            . ' where cat_id = 1';
        $boissons = $this->executerRequete($sql);

        //affichage de teste
        /*foreach ($boissons as $donnee) {
            echo $donnee['name'] . '<br>';
        }*/

        return $boissons;
    }

    // Renvoie les informations sur une boisson précise
    function getBoisson($idBoisson)
    {
        $sql = 'select '
            . ' where cat_id = 1';
        $boisson = $this->executerRequete($sql, array($idBoisson));

        if ($boisson->rowCount() == 1)   return $boisson->fetch(); // Accès à la première ligne de résultat 
        else throw new Exception("Aucune boisson ne correspond à l'identifiant '$idBoisson'");
    }
}
