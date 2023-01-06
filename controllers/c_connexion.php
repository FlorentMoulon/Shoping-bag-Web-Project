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
        $vue = new View("connexion");
        $vue->generer(array());
    }

    public function enregistrement()
    {
        $vue = new View("enregistrement");
        $vue->generer(array());
    }
}
