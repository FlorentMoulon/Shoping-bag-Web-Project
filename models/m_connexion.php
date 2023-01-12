<?php
require_once PATH_MODELS . 'Model.php';

class Connexion extends Model{
    
    function verifieConnexion()
    {
        $sql = "SELECT customer_id
        FROM Logins 
        WHERE username = ? and password = ?";

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
    function enregistrer($array_customer, $array_delivery, $array_logins)
    {
        $id_customer =  $this->executerRequete("Select max(id) from customers")->fetch()['max(id)']+1;
        //$this->getIdMax("customers");
        
        $insert_customer = "INSERT INTO customers 
        VALUES (?,?,?,?,?,?,?,?,?,?)";

        $tab_customer =  array_merge(array($id_customer), $array_customer, array(1));
        print_r($tab_customer);
        $this->executerRequete($insert_customer, $tab_customer);


        $id_log =  $this->executerRequete("Select max(id) from logins")->fetch()['max(id)']+1;

        $insert_logins = "INSERT INTO LOGINS 
        VALUES  (?, ?, ?, ?);";

        $tab_logins = array_merge(array($id_log, $id_customer), $array_logins);

        $this->executerRequete($insert_logins, $tab_logins);
        
        $_SESSION['id_customer'] = $id_customer;
        return "<p class = \" success-warning\"> Compte correctement créé</p>";
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

