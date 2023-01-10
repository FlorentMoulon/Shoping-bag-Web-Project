<?php $titre = "Panier"; ?>

<?php ob_start(); ?>

<h1>Votre panier :</h1>


<?php
foreach ($produits as $d) {
    switch ($d['cat_id']) {
        case 1:
            $action = 'boisson';
            break;
        case 2:
            $action = 'biscuit';
            break;
        case 3:
            $action = 'fruitSec';
            break;
        default:
            break;
    }


    echo
    "<div class=\"Produit\">
        <div><img class=\"ImageProduit\" src=\"" . IMAGE . $d['image'] . "\" alt=\"image : " . $d['name'] . "\"></div>
        <div>
        <a href=\"index.php?action=" . $action . "&id=" . $d['id'] . "\"><h2>" . $d['name'] . "</h2></a>

            <p>Prix unitaire :<b>" . $d['price'] . "€</b></p>

            <form method=\"Post\" action=\"index.php?action=ajouter&id=" . $d['id'] . "\">
                <div>
                    <input type=\"number\" name=\"Quantite\" id=\"Quantite\" value=\"" . $d['quantity'] . "\">
                    <label for='Quantite'>
                    <input type=\"submit\" name=\"Actualiser\" value=\"Actualiser quantité\">
                </div>
            </form>

            <p>Prix global :<b>" . $d['price'] * $d['quantity'] . "€</b></p>

            <a href=\"index.php?action=supprimer&id=" . $d['id'] . ">X</a>
                
        </div>
    </div>";
}

echo "<div> Le montant total de votre panier est de " . $total . " € </div>
        <a href=\"index.php?action=caisse\">Aller à la caisse</a>";

?>


<?php $contenu = ob_get_clean(); ?>