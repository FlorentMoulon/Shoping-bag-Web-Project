<?php $titre = "Caisse"; ?>

<?php ob_start(); ?>

<h1 class="mb-5 btn-outline-warning"> Commande effectuée ! </h1>

<h5 class="mb-5"> Veuillez cliquer sur le bouton ci-dessous pour procéder au paiement avec paypal </h5>

<a href="https://www.paypal.com/fr/webapps/mpp/home"><button type="button" class="large btn btn-secondary btn-lg"> Paypal </button></a>

<?php $contenu = ob_get_clean(); ?>