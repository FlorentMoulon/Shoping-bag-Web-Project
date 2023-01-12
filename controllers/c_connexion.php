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

    //Vérifie la validité d'un champ obligatoire en renvoyant celui-ci ainsi que 
    //Le message d'erreur s'il y en a un d'associé 
    private function verifie_mdp()
    {
        return ($_POST['Password'] == $_POST['C_Password']);
    }

    private function mail_dispo($mail)
    {
        $enr = new Enregistrement;
        return $enr->verifieMail($mail);
    }

    private function genere_erreur($msg_erreur)
    {
        return ("<h4 class = \" alert-warning\"> Formulaire invalide : $msg_erreur </h4>");
    }

    public function compte()
    {
        if (isset($_SESSION['admin'])) {
            $vue = new View("admin");
        } else {
            $vue = new View("compte");
        }
        $compte = new Compte();
        $username = $compte->getPseudo();
        $vue->generer(array('pseudo' => $username));
    }

    public function deconnexion()
    {
        session_destroy();
        $vue = new View("home");
        $vue->generer(array());
    }

    function verifierCommande($idCommande)
    {
        $panier = $this->admin->getPanier($idCommande);
        $adresse = $this->admin->getAdresse($idCommande);

        $vue = new View("verifierCommande");
        $vue->generer(array('panier' => $panier, 'adresse' => $adresse, 'id' => $idCommande));
    }

    function confirmerCommande($idCommande)
    {
        $this->admin->cloturer($idCommande);

        $this->listeCommandes();
    }

    function listeCommandes()
    {
        $commandes = $this->admin->getCommandes();

        $vue = new View("listeCommandes");
        $vue->generer(array('commandes' => $commandes));
    }

    function gererStock()
    {
        $produits = $this->admin->getProduits();

        $vue = new View("gererStock");
        $vue->generer(array('produits' => $produits));
    }

    function changerQuantiteStock($idProsuit, $quantite)
    {
        $this->admin->changerQuantiteStock($idProsuit, $quantite);

        $this->gererStock();
    }

    function changerPrixStock($idProsuit, $prix)
    {
        $this->admin->changerPrixStock($idProsuit, $prix);

        $this->gererStock();
    }
}
