<?php
require_once PATH_MODELS . 'Model.php';

class Connexion extends Model{
    
    function verifieConnexion()
    {
        $sql = 'select ';
        $id_user = $this->executerRequete($sql);
        if($id_user == null){
            //cas faux
        }
        else {
            //cas vrai
        }
    }
}

//Requete SQL a faire
/* 
SELECT id_user
FROM Logins
WHERE Username = $username AND Password = $password */