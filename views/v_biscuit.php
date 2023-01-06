<?php $titre = "Notre Offre- " . $biscuit['name']; ?>

<?php ob_start(); ?>

<article>
    <header>
        <h1><?= $biscuit['name'] ?></h1>
    </header>
    <?php echo
    "<div class=\"Produit\">
        <div><img class=\"ImageProduit\" src=\"" . IMAGE . $biscuit['image'] . "\" alt=\"image : " . $biscuit['name'] . "\"></div>
        <div>
            <p>" .  $biscuit['description'] . "</p>
            <b>Notre prix :" . $biscuit['price'] . "€</b>
            <a href=\"index.php?\">[acheter]</a>
        </div>
    </div>";
    ?>
</article>




<?php $contenu = ob_get_clean(); ?>