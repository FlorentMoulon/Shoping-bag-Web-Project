<?php $titre = "Notre Offre- " . $biscuit['titre']; ?>

<?php ob_start(); ?>

<article>
    <header>
        <h1 class="titreBiscuit"><?= $biscuit['nom'] ?></h1>
    </header>
    <p><?= $biscuit['contenu'] ?></p>
</article>

<?php $contenu = ob_get_clean(); ?>