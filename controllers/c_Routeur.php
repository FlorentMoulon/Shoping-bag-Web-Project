<?php
require_once PATH_CONTROLLERS . 'home.php';
require_once PATH_CONTROLLERS . 'boisson.php';

require_once PATH_MODELS . 'commande.php';
require_once PATH_VIEWS . 'View.php';


class Routeur
{
    private $c_home;
    private $c_boisson;

    public function __construct()
    {
        $this->c_home = new C_Home();
        $this->c_boisson = new C_Boisson();
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
        try {
            if (isset($_GET['action'])) {
                echo "******************" . $_GET['action'] . "********************";
                //Page des boissons
                if ($_GET['action'] == 'boisson') {
                    $idBoisson = intval($this->getParametre($_GET, 'id'));
                    if ($idBoisson != 0) {
                        $this->c_boisson->boisson($idBoisson);
                    } else throw new Exception("Identifiant de boisson non valide");
                } else {
                    throw new Exception("Action non valide");
                    echo $_GET['action'];
                }
            } else { // aucune action définie : affichage de l'accueil
                $this->c_home->home();
            }
        } catch (Exception $e) {
            echo "je suis dans l'erreur";
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
