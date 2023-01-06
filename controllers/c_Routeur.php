<?php
require_once PATH_CONTROLLERS . 'home.php';
require_once PATH_CONTROLLERS . 'boisson.php';
require_once PATH_CONTROLLERS . 'biscuit.php';
require_once PATH_CONTROLLERS . 'fruitSec.php';
require_once PATH_CONTROLLERS . 'connexion.php';
require_once PATH_CONTROLLERS . 'panier.php';

require_once PATH_VIEWS . 'View.php';


class Routeur
{
    private $c_home;
    private $c_boisson;
    private $c_biscuit;
    private $c_fruitSec;
    private $c_connexion;
    private $c_panier;

    public function __construct()
    {
        $this->c_home = new C_Home();
        $this->c_boisson = new C_Boisson();
        $this->c_biscuit = new C_Biscuit();
        $this->c_fruitSec = new C_FruitSec();
        $this->c_connexion = new C_Connexion();
        $this->c_panier = new C_Panier();
    }

    // Recherche un paramètre dans un tableau
    private function getParametre($tableau, $nom)
    {
        if (isset($tableau[$nom])) {
            return $tableau[$nom];
        } else throw new Exception("Paramètre '$nom' absent");
    }


    // Traite une requête entrante 
    public function routerRequete()
    {
        //try {
        if (isset($_GET['action'])) {
            //Page des boissons
            if ($_GET['action'] == 'boissons') {
                $this->c_boisson->boissons();
            } else if ($_GET['action'] == 'boisson') {
                $idBoisson = intval($this->getParametre($_GET, 'id'));
                if ($idBoisson != 0) {
                    $this->c_boisson->boisson($idBoisson);
                } else throw new Exception("Identifiant de boisson non valide");
            }
            //Page des biscuits
            else if ($_GET['action'] == 'biscuits') {
                $this->c_biscuit->biscuits();
            } else if ($_GET['action'] == 'biscuit') {
                $idBiscuit = intval($this->getParametre($_GET, 'id'));
                if ($idBiscuit != 0) {
                    $this->c_biscuit->biscuit($idBiscuit);
                } else throw new Exception("Identifiant de boisson non valide");
            }
            //Page des fruits secs
            else if ($_GET['action'] == 'fruitsSecs') {
                $this->c_fruitSec->fruitsSecs();
            } else if ($_GET['action'] == 'fruitSec') {
                $idFruitSec = intval($this->getParametre($_GET, 'id'));
                if ($idFruitSec != 0) {
                    $this->c_fruitSec->fruitSec($idFruitSec);
                } else throw new Exception("Identifiant de boisson non valide");
            }
            //Page de connexion
            else if ($_GET['action'] == 'connexion') {
                $this->c_connexion->connexion();
            } else if ($_GET['action'] == 'enregistrement') {
                $this->c_connexion->enregistrement();
            }
            //Panier
            else if ($_GET['action'] == 'panier') {
                $this->c_panier->panier();
            }
            //Action invalide
            else {
                throw new Exception("Action non valide");
                echo $_GET['action'];
            }
        } else { // aucune action définie : affichage de l'accueil
            $this->c_home->home();
        }
        /*} catch (Exception $e) {
           echo "je suis dans l'erreur";
            echo "******************" . $_GET['action'] . "********************";
            $this->erreur($e->getMessage());
        }*/
    }





    // Affiche une erreur 
    private function erreur($msgErreur)
    {
        $vue = new View("404");
        $vue->generer(array('msgErreur' => $msgErreur));
    }
}
