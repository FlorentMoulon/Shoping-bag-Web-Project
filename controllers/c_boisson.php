<?php

//Appel du modèle
require_once(PATH_MODELS . 'boisson.php');

//Appel de la class View
require_once(PATH_VIEWS . 'View.php');

class C_Boisson
{
    private $boisson;

    public function __construct()
    {
        $this->boisson = new Boisson();
    }

    // Affiche la liste de toute les boissons
    public function boissons()
    {
        $vue = new View("boissons");
        $donnes = array('boissons' => $this->boisson->getBoissons());
        $vue->generer($donnes);
    }

    // Affiche une boisson spécifique
    public function boisson($idBoisson)
    {
        $vue = new View("boisson");
        $donnes = array('boisson' => $this->boisson->getBoisson($_GET['id']));
        $vue->generer($donnes);
    }
}
