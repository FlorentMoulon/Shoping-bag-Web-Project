<?php

switch ($categorie) {
    case 1:
        $titre = "Nos boissons";
        $action = 'boisson';
        break;
    case 2:
        $titre = "Nos biscuits";
        $action = 'biscuit';
        break;
    case 3:
        $titre = "Nos fruits secs";
        $action = 'fruitSec';
        break;
    default:
        $titre = "Nottre offre";
        break;
}
?>

<?php ob_start(); ?>

<?php
echo "<h1 class=\"mb-5\">" . $titre . "</h1>";

foreach ($produits as $d) {

    //On regarde la quantité récente pour afficher les rupture de stocks
    if ($d['quantity'] <= 0) {
        $comment = 'Rupture de stock !!!';
    } else if ($d['quantity'] <= 5) {
        $comment = 'Plus que ' . $d['quantity'] . ' disponible !';
    } else {
        $comment = '';
    }

    echo
    "<div class=\"Produit\">
        <div><img class=\"ImageProduitMoyenne\" src=\"" . IMAGE . $d['image'] . "\" alt=\"image : " . $d['name'] . "\"></div>
        <div class=\"InfoProduit\">
            <div class=\"ligne center\">
                <h3 class=\"mr-3\">" . $d['name'] . "</h3>
                <h6 class=\"Alert \">" . $comment . "</h6>
            </div>

            <div class=\"ligne\">
                <p class= \"mr-3 d-none d-none d-lg-block\">" .  $d['description'] . "</p>
                <a class=\" pull-righ\" href=\"index.php?action=" . $action . "&id=" . $d['id'] . "\"><button type=\"button\" class=\"btn btn-secondary\">Acheter</button></a>
            </div>
            <p class=\"mr-3\"><b>Notre prix : " . $d['price'] . "€</b></p>
                
        </div>
    </div>";
}
?>

<?php $contenu = ob_get_clean(); ?>