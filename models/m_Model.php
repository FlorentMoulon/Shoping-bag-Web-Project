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

    public function get_adresse_commande($delivery_id){ //Récupération d'une adresse a partir de l'id associée
        $sql = "SELECT firstname, lastname, add1, add2, city, postcode, phone, email
                FROM delivery_adress 
                WHERE id = ?";
        return $this->executerRequete($sql, array($delivery_id))->fetch();
    }
}
