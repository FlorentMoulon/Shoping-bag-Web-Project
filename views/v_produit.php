<?php $titre = "Notre Offre- " . $produit['name']; ?>

<?php ob_start(); ?>

<article>
    <header>
        <h1><?= $produit['name'] ?></h1>
    </header>
    <?php echo
    "<div class=\"Produit\">
        <div><img class=\"ImageProduit\" src=\"" . IMAGE . $produit['image'] . "\" alt=\"image : " . $produit['name'] . "\"></div>
        <div>
            <p>" .  $produit['description'] . "</p>
            <b>Notre prix :" . $produit['price'] . "€</b>
        </div>
    </div>";
    ?>

    <div class="Achat">
        <?php echo "<form method='POST' action=\"index.php?action=pannier&id=" . $produit['id'] . "\">"; ?>
        <label for="Nombre"></label>
        <input type="number" id='Nombre' name='Nombre' value="1">
        <input type="submit" name='Acheter' value="Acheter">
        </form>
    </div>


    <?php
    foreach ($commentaires as $d) {

        $etoile = '';
        for ($i = 0; $i < $d['stars']; $i++) {
            $etoile = $etoile . '⭐';
        }



        echo
        "<div class=\"Commentaire\">
            <div><img class=\"ImageCommentaire\" src=\"" . IMAGE . $d['photo_user'] . "\" alt=\"image de l'utilisateur : " . $d['photo_user'] . "\"></div>
            <div>
                <h2>" . $d['name_user'] . "</h2>
                <p>" .  $d['description'] . "</p>
                <b> " . $etoile . "</b>
            </div>
        </div>";
    }
    ?>
</article>


<?php $contenu = ob_get_clean(); ?>