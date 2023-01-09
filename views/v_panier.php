<?php $titre = "Panier"; ?>

<?php ob_start(); ?>

<h1>Votre panier :</h1>


<?php
foreach ($produits as $d) {
    echo
    "<div class=\"Produit\">
        <div><img class=\"ImageProduit\" src=\"" . IMAGE . $d['image'] . "\" alt=\"image : " . $d['name'] . "\"></div>
        <div>
            <h2>" . $d['name'] . "</h2>
            Notre prix :<b>" . $d['price'] . "€</b>
            <form action=\"#\">
                <input type=\"number\" id=\"Quantite\" value=\"" . $d['quantite'] . "\">
                <label for='Quantite'>
                <input type=\"submit\" value=\"Actualiser quantité\">
            </form>
        </div>
    </div>";
}
?>


<?php $contenu = ob_get_clean(); ?>