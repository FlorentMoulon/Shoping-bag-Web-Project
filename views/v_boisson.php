<?php $titre = "Notre Offre- " . $boisson['titre']; ?>

<?php ob_start(); ?>

<article>
    <header>
        <h1 class="titreBoisson"><?= $boisson['nom'] ?></h1>
    </header>
    <p><?= $boisson['contenu'] ?></p>
</article>

<?php $contenu = ob_get_clean(); ?>