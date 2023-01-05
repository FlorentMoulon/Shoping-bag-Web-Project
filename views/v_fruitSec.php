<?php $titre = "Notre Offre- " . $fruitSec['titre']; ?>

<?php ob_start(); ?>

<article>
    <header>
        <h1 class="titreFruitSec"><?= $fruitSec['nom'] ?></h1>
    </header>
    <p><?= $fruitSec['contenu'] ?></p>
</article>

<?php $contenu = ob_get_clean(); ?>