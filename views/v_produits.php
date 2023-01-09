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
        $titre = "Nos frutis secs";
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
    echo
    "<div class=\"Produit\">
        <div><img class=\"ImageProduit\" src=\"" . IMAGE . $d['image'] . "\" alt=\"image : " . $d['name'] . "\"></div>
        <div>
            <h2>" . $d['name'] . "</h2>
            <p>" .  $d['description'] . "</p>
            <b>Notre prix :" . $d['price'] . "€</b>
            <a href=\"index.php?action=" . $action . "&id=" . $d['id'] . "\">[acheter]</a>
        </div>
    </div>";
}
?>

<?php $contenu = ob_get_clean(); ?>