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

            <p>Prix unitaire :<b>" . $d['price'] . "€</b></p>

            <form action=\"#\">
                <div>
                    <input type=\"number\" id=\"Quantite\" value=\"" . $d['quantity'] . "\">
                    <label for='Quantite'>
                    <input type=\"submit\" name=\"Actualiser\" value=\"Actualiser quantité\">
                </div>


                <p>Prix global :<b>" . $d['price'] * $d['quantity'] . "€</b></p>


                <input type=\"submit\" name=\"Supprimmer\" value=\"X\">
            </form>
        </div>
    </div>";
}

echo "<div> Le montant total de votre panier est de " . $total . " € </div>";
?>


<?php $contenu = ob_get_clean(); ?>