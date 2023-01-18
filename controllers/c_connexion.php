<?php
//Appel du modèle
require_once(PATH_MODELS . 'connexion.php');
require_once(PATH_MODELS . 'admin.php');

//Appel de la class View
require_once(PATH_VIEWS . 'View.php');

class C_Connexion
{
    private $admin;

    public function __construct()
    {
        $this->admin = new Admin();
    }


    public function connexion()
    {
        if (isset($_POST['connexion'])) {
            $connection = new Connexion();
            $msg = $connection->verifieConnexion();
        } else {
            $msg = "";
        }
        $vue = new View("connexion");
        $vue->generer(array('Co' => $msg));
    }
    

    public function enregistrement()
    {
        if (isset($_POST['Creer'])) {

            $nom =  $_POST['Nom'];
            $prenom =  $_POST['Prenom'];
            $rue = $_POST['Rue'];
            $c_rue = $_POST['C_Rue'];
            $ville = $_POST['Ville'];
            $code_p = $_POST['Postal'];
            $tel = $_POST['Telephone'];
            $mail = $_POST['Mail'];
            $pseudo = $_POST['Username'];
            $pwd = $_POST['Password'];

            //booléen qui indique si toutes les conditions que l'ont pose à la connexion sont remplies 
            $mdp_valide = $this->verifie_mdp();
            $mail_valide = $this->mail_dispo($mail);

            $enregistrement_valide = $mdp_valide and $mail_valide;

            if ($enregistrement_valide) {
                $customer = array($nom, $prenom, $rue, $c_rue, $ville, $code_p, $tel, $mail);
                $delivery = array($nom, $prenom, $rue, $c_rue, $ville, $code_p, $tel, $mail); //c les mêmes
                $logins = array($pseudo, $pwd);
                $enregistrement = new Enregistrement();
                $msg = $enregistrement->enregistrer($customer, $delivery, $logins);
            } else if (!$mdp_valide) {
                $msg = $this->genere_erreur("vos mots de passe ne correspondent pas");
            } else if (!$mail_valide) {
                $msg = $this->genere_erreur("il y a déjà un compte associé à votre mail");
            }
        } else {
            $msg = $prenom = $nom = $rue = $c_rue = $ville = $code_p = $tel = $mail = $pseudo = ""; //déclaration des variables vides
            $enregistrement_valide = false;
        }
        $donnees = array(
            'msg' => $msg,
            'nom' => $nom,
            'prenom' => $prenom,
            'rue' => $rue,
            'c_rue' => $c_rue,
            'ville' => $ville,
            'code_p' => $code_p,
            'tel' => $tel,
            'mail' => $mail,
            'pseudo' => $pseudo
        );

        if ($enregistrement_valide) {
            $vue = new View("home");
            $vue->generer(array());
        } else {
            $vue = new View("enregistrement");
            $vue->generer($donnees);
        }
    }

    //Vérifie la validité d'un champ
    private function verifie_mdp()
    {
        return ($_POST['Password'] == $_POST['C_Password']);
    }

    private function mail_dispo($mail)
    {
        $enr = new Enregistrement;
        return $enr->verifieMail($mail);
    }

    //Genere une erreur en fonction 
    private function genere_erreur($msg_erreur)
    {
        return ("<h4 class = \"alert alert-warning\"> Formulaire invalide : $msg_erreur </h4>");
    }

    public function majCompte($infos, $compte){
        $nom =  $_POST['Nom'];
        $prenom =  $_POST['Prenom'];
        $rue = $_POST['Rue'];
        $c_rue = $_POST['C_Rue'];
        $ville = $_POST['Ville'];
        $code_p = $_POST['Postal'];
        $tel = $_POST['Telephone'];
        $mail = $_POST['Mail'];
        $pseudo = $infos['pseudo'];

        if(!empty($_POST['Password'])){
            $pwd = $_POST['Password'];
            $logins = array($pseudo, $pwd, $_SESSION['id']);
            $compte->majLogins($logins);
        }

        $customer = array($nom, $prenom, $rue, $c_rue, $ville, $code_p, $tel, $mail, $_SESSION['id']); 
        $compte->majCustomer($customer);
        
        

    }

    public function compte()
    {
        $compte = new Compte();
        $infos = $compte->getInfos();
        if(isset($_POST['Enregistrer'])){
            $this->majCompte($infos, $compte);
            $infos = $compte->getInfos();
        }
        if (isset($_SESSION['admin'])) {
            $vue = new View("admin");
        } else {
            $vue = new View("compte");
        }
        $vue->generer($infos);
    }

    public function deconnexion()
    {
        session_destroy();
        $vue = new View("home");
        $vue->generer(array());
    }

    function verifierCommande($idCommande)
    {
        if (isset($_SESSION['admin'])) {
            $panier = $this->admin->getPanier($idCommande);
            $adresse = $this->admin->getAdresse($idCommande);

            $vue = new View("verifierCommande");
        } else {
            $vue = new View("404");
        }

        $vue->generer(array('panier' => $panier, 'adresse' => $adresse, 'id' => $idCommande));
    }

    function confirmerCommande($idCommande)
    {
        if (isset($_SESSION['admin'])) {
            $this->admin->cloturer($idCommande);
            $this->listeCommandes();
        } else {
            $vue = new View("404");
            $vue->generer(array());
        }
    }

    function refuserCommande($idCommande)
    {
        if (isset($_SESSION['admin'])) {
            $this->admin->refuser($idCommande);
            $this->listeCommandes();
        } else {
            $vue = new View("404");
            $vue->generer(array());
        }
    }


    function listeCommandes()
    {
        if (isset($_SESSION['admin'])) {
            $commandes = $this->admin->getCommandes();
            $vue = new View("listeCommandes");
        } else {
            $vue = new View("404");
        }
        $vue->generer(array('commandes' => $commandes));
    }

    function gererStock()
    {
        if (isset($_SESSION['admin'])) {
            $produits = $this->admin->getProduits();
            $vue = new View("gererStock");
        } else {
            $vue = new View("404");
        }
        $vue->generer(array('produits' => $produits));
    }

    function changerQuantiteStock($idProsuit, $quantite)
    {
        if (isset($_SESSION['admin'])) {
            $this->admin->changerQuantiteStock($idProsuit, $quantite);
            $this->gererStock();
        } else {
            $vue = new View("404");
            $vue->generer(array());
        }
    }

    function changerPrixStock($idProsuit, $prix)
    {
        if (isset($_SESSION['admin'])) {
            $this->admin->changerPrixStock($idProsuit, $prix);
            $this->gererStock();
        } else {
            $vue = new View("404");
            $vue->generer(array());
        }
    }

    function nettoyerBDD()
    {
        if (isset($_SESSION['admin'])) {
            $this->admin->nettoyerBDD();
            $this->compte();
        } else {
            $vue = new View("404");
            $vue->generer(array());
        }
    }
}
