<?php $titre = "Compte"; ?>

<?php ob_start(); ?>

<h1 class="mb-5">Bienvenue sur votre espace compte <?php echo $pseudo; ?> </h1>


<a href="index.php?action=deconnexion"><button class="btn btn-secondary btn-lg">Se déconnecter</button></a>.



<?php $contenu = ob_get_clean(); ?>