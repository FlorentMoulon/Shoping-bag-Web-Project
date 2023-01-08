<?php
require_once PATH_MODELS . 'Model.php';

class Connexion extends Model{
    
    function verifieConnexion()
    {
        $sql = "SELECT *
        FROM Logins 
        WHERE username = '". $_POST['Username']. "' and motdepasse = '".$_POST['Password'] ."'; ";
        $id_user = $this->executerRequete($sql)->fetch();
        try{
            echo $id_user['customer_id'];
            if($id_user==''){
                echo "<p class = \" alert-warning\"> Mot de passe ou login incorrect </p>";
            } 
            else{
                echo "<p class = \" alert-success\"> Connection effectuée </p>";
                $_SESSION['id_user'] = $id_user;  
            }
        }
        catch (Exception $e){
            echo "<p class = \" alert-warning\"> Erreur : Mot de passe ou login incorrect </p>";
        }
    }
}

//Requete SQL a faire
/* 
SELECT id_user
FROM Logins
WHERE Username = $username AND Password = $password */