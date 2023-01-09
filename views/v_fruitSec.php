<?php $titre = "Notre Offre- " . $fruitSec['name']; ?>

<?php ob_start(); ?>

<article>
    <header>
        <h1><?= $fruitSec['name'] ?></h1>
    </header>
    <?php echo
    "<div class=\"Produit\">
        <div><img class=\"ImageProduit\" src=\"" . IMAGE . $fruitSec['image'] . "\" alt=\"image : " . $fruitSec['name'] . "\"></div>
        <div>
            <p>" .  $fruitSec['description'] . "</p>
            <b>Notre prix :" . $fruitSec['price'] . "€</b>
            <a href=\"index.php?\">[acheter]</a>
        </div>
    </div>";
    ?>
</article>


<?php $contenu = ob_get_clean(); ?>