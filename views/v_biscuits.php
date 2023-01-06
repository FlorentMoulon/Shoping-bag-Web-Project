<?php $titre = "Nos biscuits"; ?>

<?php ob_start(); ?>

<h1>PAges des biscuits</h1>


<?php
foreach ($biscuits as $d) {
    echo
    "<a href=\"index.php?action=biscuit&id=" . $d['id'] . "\"><div class=\"Produit\">
        <div><img class=\"ImageProduit\" src=\"" . IMAGE . $d['image'] . "\" alt=\"image : " . $d['name'] . "\"></div>
        <div>
            <h2>" . $d['name'] . "</h2>
            <p>" .  $d['description'] . "</p>
            <b>Notre prix :" . $d['price'] . "€</b>
            <a href=\"index.php\">[acheter]</a>
        </div>
    </div></a>";
}
?>

<?php $contenu = ob_get_clean(); ?>