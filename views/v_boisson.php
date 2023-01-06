<?php $titre = "Notre Offre- " . $boisson['name']; ?>

<?php ob_start(); ?>

<article>
    <header>
        <h1><?= $boisson['name'] ?></h1>
    </header>
    <?php echo
    "<div class=\"Produit\">
        <div><img class=\"ImageProduit\" src=\"" . IMAGE . $boisson['image'] . "\" alt=\"image : " . $boisson['name'] . "\"></div>
        <div>
            <p>" .  $boisson['description'] . "</p>
            <b>Notre prix :" . $boisson['price'] . "€</b>
            <a href=\"index.php?\">[acheter]</a>
        </div>
    </div>";
    ?>
</article>

<?php $contenu = ob_get_clean(); ?>