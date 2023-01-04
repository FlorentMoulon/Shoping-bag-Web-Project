<?php

//require_once(PATH_MODELS . 'boisson.php');
require_once(PATH_VIEWS . 'View.php');

class C_Home
{
    private   $billet;

    public function __construct()
    {
        //$this->billet = new Boisson();
    }

    // Affiche la liste de tous les billets du blog 
    public function home()
    {
        //$billets = $this->billet->getBoissons();
        $vue = new View("home");
        $vue->generer(array());
    }
}
