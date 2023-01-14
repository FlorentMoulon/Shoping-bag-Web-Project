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
            <p><b>Notre prix : " . $produit['price'] . "€</b></p>
            <p><b>Quantité restante : " . $produit['quantity'] . "</b></p>";


    if ($produit['quantity'] > 0) {
        echo "<div class=\"Achat\">
                <form method='POST' action=\"index.php?action=ajouter&id=" . $produit['id'] . "\">
                    <div class=\"input-group mb-3\">
                        <label for=\"Nombre\"></label>
                        <input class=\"form-control\" type=\"number\" min=\"1\" max=\"" . $produit['quantity'] . "\" id='Nombre' name='Nombre' value=\"1\">
                        <input class=\"btn btn-primary\" type=\"submit\" name='Acheter' value=\"Acheter\">
                    </div>
                </form>
            </div>";
    } else {
        echo "<h2> Désolé mais ce produit en rupture de stocks, revenez plus tard.</h2>";
    }

    echo "        </div>
                </div>";


    ?>


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