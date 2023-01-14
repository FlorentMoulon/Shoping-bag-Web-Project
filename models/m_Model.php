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
    } //vardump pour débugage

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

<<<<<<< HEAD
    public function get_adresse_commande($delivery_id){ //Récupération d'une adresse a partir de l'id associée
        $sql = "SELECT firstname, lastname, add1, add2, city, postcode, phone, email
                FROM delivery_adress 
                WHERE id = ?";
        return $this->executerRequete($sql, array($delivery_id))->fetch();
=======
    protected function getIdMax($nomTable)
    {

        $sql = 'SELECT max(id) 
        FROM ?';

        $id = $this->executerRequete($sql, array($nomTable));
        print_r($id);
        if ($id->rowCount() == 1)   return $id->fetch()['max(id)'];
        else throw new Exception("Erreur dans les champs requête");
>>>>>>> 0f91347df48433fd0e1d618ea2ad561bf0fe9602
    }
}
