<?php $titre = "Caisse"; ?>

<?php ob_start(); ?>

<p>Commande effectué !</p>

<h1>Veiller suivre cliquer sur le bouton ci dessus pour procéder au paiement avec paypal</h1>

<a href="https://www.paypal.com/fr/webapps/mpp/home">Paypal</a>

<?php $contenu = ob_get_clean(); ?>