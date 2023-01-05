<?php $titre = "Panier"; ?>

<?php ob_start(); ?>

<h1>Votre panier :</h1>

<?php $contenu = ob_get_clean(); ?>