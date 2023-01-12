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
echo "<h1>" . $titre . "</h1>";

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
        <div><img class=\"ImageProduit\" src=\"" . IMAGE . $d['image'] . "\" alt=\"image : " . $d['name'] . "\"></div>
        <div>
            <h3 class=\"Alert\">" . $comment . "</h3>
            <h2>" . $d['name'] . "</h2>
            <p>" .  $d['description'] . "</p>
            <b>Notre prix :" . $d['price'] . "€</b>
            <a href=\"index.php?action=" . $action . "&id=" . $d['id'] . "\">[acheter]</a>
        </div>
    </div>";
}
?>

<?php $contenu = ob_get_clean(); ?>