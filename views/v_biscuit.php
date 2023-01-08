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
        </div>
    </div>";
    ?>

    <div class="Achat">
        <?php echo "<form method='POST' action=\"index.php?action=pannier&id=" . $biscuit['id'] . "\">"; ?>
        <label for="Nombre"></label>
        <input type="number" id='Nombre' name='Nombre' value="1">
        <input type="submit" name='Acheter' value="Acheter">
        </form>
    </div>


</article>





<?php $contenu = ob_get_clean(); ?>