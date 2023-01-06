<?php

//Appel du modèle
require_once(PATH_MODELS . 'biscuit.php');

//Appel de la class View
require_once(PATH_VIEWS . 'View.php');

class C_Biscuit
{
    private $biscuit;

    public function __construct()
    {
        $this->biscuit = new Biscuit();
    }


    // Affiche la liste de toute les boissons
    public function biscuits()
    {
        $vue = new View("biscuits");
        $donnes = array('biscuits' => $this->biscuit->getBiscuits());
        $vue->generer($donnes);
    }


    // Affiche une boisson spécifique
    public function biscuit($idBiscuit)
    {
        $vue = new View("biscuit");
        $donnes = array('biscuit' => $this->biscuit->getBiscuit($_GET['id']));
        $vue->generer($donnes);
    }
}
