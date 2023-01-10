<?php 
session_start();
//Appel de la class View
require_once(PATH_VIEWS . 'View.php');

class C_Home
{

    public function __construct()
    {
    
    }
 
    public function header()
    {
        $est_connecte = empty($_SESSION['id_user']);
        echo $est_connecte;
        $vue = new View("header");
        $vue->generer(array('connecte'=>$est_connecte));
        
    }
}




