<?php

//Appel du modèle
require_once(PATH_MODELS . 'home.php');

//Appel de la vue
require_once(PATH_VIEWS . 'View.php');

class C_Home
{
    public function __construct()
    {
    }
    // Affiche la liste de tous les billets du blog public
    function home()
    {
        $vue = new View("home");
        $vue->generer(array());
    }
}
