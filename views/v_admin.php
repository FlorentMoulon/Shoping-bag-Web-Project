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


<div>
    <h3>Voulez-vous supprimmer les panier non validé de plus d'un jour ?</h3>

    <p>
        A chaque fois qu'une personne commence son shopping, une nouvelle commande est généré dans la base de donnée.
        En appuyant sur le bouton si dessus, vous supprimerez les commandes et les informations liés de la base de données.
    </p>

    <p>
        <a href="index.php?action=nettoyerBDD"><b>Supprimer les commandes inachevés</b></a>.
    </p>
</div>

<?php $contenu = ob_get_clean(); ?>