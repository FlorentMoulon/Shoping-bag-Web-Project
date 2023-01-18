<?php

abstract class Model
{
    // Objet PDO d'accès à la BD 
    private $bdd;

    // Exécute une requête SQL éventuellement paramétrée
    protected function executerRequete($sql, $params = null)
    {
        if ($params == null) {
            $resultat = $this->getBdd()->query($sql); // exécution directe 
        } else {
            $resultat = $this->getBdd()->prepare($sql); // requête préparée 
            $resultat->execute($params);
        }
        return $resultat;
    }

    // Renvoie un objet de connexion à la BD en initialisant la connexion au besoin 
    private function getBdd()
    {
        if ($this->bdd == null) { // Création de la connexion 
            $this->bdd = new PDO(
                BD_HOST,
                BD_USER,
                BD_PWD,
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
            );
        }
        return $this->bdd;
    }
}
