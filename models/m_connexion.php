<?php
require_once PATH_MODELS . 'Model.php';

class Connexion extends Model{
    
    function verifieConnexion()
    {
        $sql = "SELECT customer_id
        FROM Logins 
        WHERE username = ? and motdepasse = ?";

        $id_user = $this->executerRequete($sql, array($_POST['Username'], $_POST['Password']))->fetch();
        try{
            if($id_user==''){
                return "<p class = \" alert-warning\"> Mot de passe ou login incorrect </p>";
            }
            else{
                $_SESSION['id_customer'] = $id_user['customer_id'];
                return "<p class = \" alert-success\"> Connection effectuée </p>";
            }
        }
        catch (Exception $e){
            return "<p class = \" alert-warning\"> Erreur : Mot de passe ou login incorrect </p>";
        }
    }
}


class Enregistrement extends Model{
    function enregistrement()
    {
        $sql = "INSERT INTO LOGINS 
        VALUES  (7, 5, ?, ?);";
        
        $this->executerRequete($sql, array( $_POST['Username'], $_POST['Password']));
    }

}

class Compte extends Model{
    function getPseudo(){
        $sql = "SELECT username
        FROM LOGINS 
        WHERE customer_id = ?";
        $pseudo = $this->executerRequete($sql, array($_SESSION['id_customer']));
        
        if ($pseudo->rowCount() == 1)   return $pseudo->fetch()['username']; // Accès à la première ligne de résultat 
        else throw new Exception("Erreur dans l'accès au compte");
    }
}

