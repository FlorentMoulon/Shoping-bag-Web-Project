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
    }//vardump pour débugage

    // Renvoie un objet de connexion à la BD en initialisant la connexion au besoin 
    private function getBdd()
    {
        if ($this->bdd == null) { // Création de la connexion 
            $this->bdd = new PDO(
                'mysql:host=localhost;dbname=web4shop;charset=utf8',
                'root',
                '',
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
            );
        }
        return $this->bdd;
    }

    private function getIdMax($nomTable, $nomId)
    {
        $sql = "SELECT max(?) 
        FROM ?";
        $id = $this->executerRequete($sql, array($nomId, $nomTable));
        if ($id->rowCount() == 1)   return $id->fetch();  
        else throw new Exception("Erreur dans les champs requête");
    }
}
