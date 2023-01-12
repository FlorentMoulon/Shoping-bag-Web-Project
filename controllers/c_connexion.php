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

            $nom =  $this->verifie_champ('Nom');
            $prenom =  $this->verifie_champ('Prenom');
            $rue = $this->verifie_champ('Rue');
            $c_rue = $_POST['C_Rue'];
            $ville = $this->verifie_champ('Ville');
            $code_p = $this->verifie_champ('Postal');
            $tel = $this->verifie_champ('Telephone');
            $mail = $this->verifie_champ('Mail');
            $pseudo=$this->verifie_champ('Username');
            $pwd = $this->verifie_champ('Password'); //faire des trucs plus spécifique pour mdp/adresse
            $pwd_confirmation = $this->verifie_champ('C_Password');

            //booléen qui indique si toutes les conditions que l'ont pose à la connexion sont remplies 
            $enregistrement_valide = ($nom[0] and $prenom[0] and $rue[0] and $ville[0] and $code_p[0] and $tel[0]);
            $enregistrement_valide = $enregistrement_valide and $mail[0] and $pseudo[0] and $pwd[0] and $pwd_confirmation[0];

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
    private function verifie_champ($nom_champ){ 
        if (isset($_POST[$nom_champ])){
            return array(1, $_POST[$nom_champ], "");
        }
        return array(0, "", "Erreur, le champ ". $nom_champ. " est obligatoire");
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
