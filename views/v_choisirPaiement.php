<?php $titre = "Caisse"; ?>

<?php ob_start(); ?>

<h1>Veuiller Choisir un mode de paiment</h1>


<a href="index.php?action=paiementPaypal">Paypal</a>
<a href="index.php?action=paiementCheque">Chèque</a>

<?php $contenu = ob_get_clean(); ?>