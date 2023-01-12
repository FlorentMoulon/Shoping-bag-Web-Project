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
        if (isset($_POST['Creer'])){

            $nom =  $_POST['Nom'];
            $prenom =  $_POST['Prenom'];
            $rue = $_POST['Rue'];
            $c_rue = $_POST['C_Rue'];
            $ville = $_POST['Ville'];
            $code_p = $_POST['Postal'];
            $tel = $_POST['Telephone'];
            $mail = $_POST['Mail'];
            $pseudo=$_POST['Username'];
            $pwd = $_POST['Password'];

            //booléen qui indique si toutes les conditions que l'ont pose à la connexion sont remplies 
            $enregistrement_valide = $this->verifie_mdp();

            if ($enregistrement_valide){
                $customer = array($nom, $prenom, $rue, $c_rue, $ville, $code_p, $tel, $mail);
                $delivery = array($nom, $prenom, $rue, $c_rue, $ville, $code_p, $tel, $mail); //c les mêmes
                $logins = array($pseudo, $pwd);
                $enregistrement = new Enregistrement();
                $msg = $enregistrement->enregistrer($customer, $delivery, $logins);
            } 
        }else{$msg="";}
        $vue = new View("enregistrement");
        $vue->generer(array('msg'=>$msg));
    }

    //Vérifie la validité d'un champ obligatoire en renvoyant celui-ci ainsi que 
    //Le message d'erreur s'il y en a un d'associé 
    private function verifie_mdp(){ 
        return ($_POST['Password']==$_POST['C_Password']);
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
