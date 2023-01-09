<?php $titre = "Nos boissons"; ?>

<?php ob_start(); ?>

<h1>Pages des boissons</h1>

<?php
foreach ($boissons as $d) {
    echo
    "<div class=\"Produit\">
        <div><img class=\"ImageProduit\" src=\"" . IMAGE . $d['image'] . "\" alt=\"image : " . $d['name'] . "\"></div>
        <div>
            <h2>" . $d['name'] . "</h2>
            <p>" .  $d['description'] . "</p>
            <b>Notre prix :" . $d['price'] . "€</b>
            <a href=\"index.php?action=boisson&id=" . $d['id'] . "\">[acheter]</a>
        </div>
    </div>";
}
?>




<?php $contenu = ob_get_clean(); ?>