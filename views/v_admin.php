<?php $titre = "Admin"; ?>

<?php ob_start(); ?>

<h1>Bienvenue sur votre espace compte admin <?php echo $pseudo; ?> </h1>


<div class="center mb-5">
    <a class="mb-1" href="index.php?action=deconnexion"><button type="button" class="margeTop large btn btn-secondary btn-lg">Se déconnecter</button></a>

    <a class="mb-1" href="index.php?action=listeCommandes"><button type="button" class="margeTop large btn btn-secondary btn-lg">Confirmer les commandes</button></a>

    <a class="mb-1" href="index.php?action=gererStock"><button type="button" class="margeTop btn large btn-secondary btn-lg">Gérer les stocks</button></a>
</div>

<div class="margeTop">
    <h3>Voulez-vous supprimmer les panier non validé de plus d'un jour ?</h3>

    <p>
        A chaque fois qu'une personne commence son shopping, une nouvelle commande est généré dans la base de donnée.
        En appuyant sur le bouton si dessus, vous supprimerez les commandes et les informations liés de la base de données.
    </p>

    <p>
        <a href="index.php?action=nettoyerBDD"><button type="button" class="large btn btn-secondary btn-lg">Supprimer les commandes inachevés</button></a>.
    </p>
</div>

<?php $contenu = ob_get_clean(); ?>