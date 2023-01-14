<?php $titre = "Panier"; ?>

<?php ob_start(); ?>

<h1 class="mb-5">Votre panier :</h1>


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
            
            <p>Prix unitaire : <b class=\"btn-outline-dark\">" . $d['price'] . "€</b></p>

            <form method=\"Post\" action=\"index.php?action=changer&id=" . $d['id'] . "\">
                <div class=\"input-group mb-3\">
                    <label for='Quantite'> Quantité : </label>
                    <input class=\"form-control border-secondary\" type=\"number\" name=\"Quantite\" max=\"" . $d['quantity'] . "\" id=\"Quantite\" value=\"" . $d['quantity'] . "\">
                    <input class=\"btn btn-secondary\" type=\"submit\" name=\"Actualiser\" value=\"Actualiser quantité\">
                </div>
            </form>

            <p>Prix global : <b class=\"btn-outline-dark\">" . $d['price'] * $d['quantity'] . "€</b></p>

            <a href=\"index.php?action=supprimer&id=" . $d['id'] . "\"> <button type=\"button\" class=\"btn btn-secondary\"> Supprimer </button> </a>
        </div>
                
    </div>";
}


if ($total == 0) {
    echo "<h2 class=\"mb-4\"> Vous n'avez rien dans votre panier </h2>
        <a href=\"index.php?action=boissons\"> <button type=\"button\" class=\"btn btn-secondary btn-lg\"> Aller à la boutique </button></a>";
} else {
    echo "<h2 class=\"mb-4\"> Le montant total de votre panier est de <b class=\"btn-outline-warning\">" . $total . " €</b> </h2>
        <a href=\"index.php?action=choisirAdresse\"> <button type=\"button\" class=\"btn btn-secondary btn-lg\"> Aller à la caisse </button></a>";
}



?>


<?php $contenu = ob_get_clean(); ?>