<?php
require_once 'PATH_CONTROLLERS/home.php';
require_once 'PATH_CONTROLLERS/commande.php';
require_once 'Vue/Vue.php';


class Routeur
{
    private $c_home;

    public function __construct()
    {
        $this->c_home = new C_Home();
    }

    // Traite une requête entrante 
    public function routerRequete()
    {
        try {
            if (isset($_GET['action'])) {
                if ($_GET['action'] == 'billet') {
                } else throw new
                    Exception("Action non valide");
            } else { // aucune action définie : affichage de l'accueil
                $this->c_home->home();
            }
        } catch (Exception $e) {
            $this->erreur($e->getMessage());
        }
    }


    // Affiche une erreur 
    private function erreur($msgErreur)
    {
        $vue = new View("404");
        $vue->generer(array('msgErreur' => $msgErreur));
    }
}
