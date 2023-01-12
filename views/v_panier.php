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
    "<div class=\"ProduitPanier\">
        <div><img class=\"ImageProduit\" src=\"" . IMAGE . $d['image'] . "\" alt=\"image : " . $d['name'] . "\"></div>

        <div>
            <a href=\"index.php?action=" . $action . "&id=" . $d['id'] . "\"><h2>" . $d['name'] . "</h2></a>
            
            <p>Prix unitaire :<b>" . $d['price'] . "€</b></p>

            <form method=\"Post\" action=\"index.php?action=changer&id=" . $d['id'] . "\">
                <div class=\"row\">
                    <label for='Quantite'> Quantité : </label>
                    <input type=\"number\" name=\"Quantite\" id=\"Quantite\" value=\"" . $d['quantity'] . "\">
                    <input type=\"submit\" name=\"Actualiser\" value=\"Actualiser quantité\">
                </div>
            </form>

            <p>Prix global :<b>" . $d['price'] * $d['quantity'] . "€</b></p>

            <a href=\"index.php?action=supprimer&id=" . $d['id'] . "\" class=\"btn-default\"><h1>X</h1></a>
        </div>
                
    </div>";
}


if ($total == 0) {
    echo "<h2> Vous n'avez rien dans votre panier </h2>
        <a href=\"index.php?action=boissons\">Aller à la boutique</a>";
} else {
    echo "<div> Le montant total de votre panier est de " . $total . " € </div>
        <a href=\"index.php?action=choisirAdresse\">Aller à la caisse</a>";
}



?>


<?php $contenu = ob_get_clean(); ?>