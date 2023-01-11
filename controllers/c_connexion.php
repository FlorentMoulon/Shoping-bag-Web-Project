<?php

//Appel du modèle
require_once(PATH_MODELS . 'connexion.php');

//Appel de la class View
require_once(PATH_VIEWS . 'View.php');

class C_Connexion
{
    public function __construct()
    {
       
    }



    public function connexion()
    {
        if (isset($_POST['connexion'])){
            $connection = new Connexion();
            $msg = $connection->verifieConnexion();
        }else{$msg="";} 
        $vue = new View("connexion");
        $vue->generer(array('Co'=>$msg));
    }

    public function enregistrement()
    {
        $vue = new View("enregistrement");
        $vue->generer(array());
    }

    public function compte(){
        $vue = new View("compte");
        $compte = new Compte();
        $username = $compte->getPseudo();
        $vue->generer(array('pseudo'=>$username));
    }

    public function deconnexion(){
        session_destroy();
        $vue = new View("home");
        $vue->generer(array());
    }
}
