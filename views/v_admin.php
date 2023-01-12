<?php $titre = "Admin"; ?>

<?php ob_start(); ?>

<h1>Bienvenue sur votre espace compte admin <?php echo $pseudo; ?> </h1>

<p>
    <a href="index.php?action=deconnexion"><b>Se déconnecter</b></a>.
</p>

<p>
    <a href="index.php?action=listeCommandes"><b>Confirmer les commandes</b></a>.
</p>

<p>
    <a href="index.php?action=gererStock"><b>Gérer les stocks</b></a>.
</p>

<?php $contenu = ob_get_clean(); ?>