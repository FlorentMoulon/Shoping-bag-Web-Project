<?php $titre = "Caisse"; ?>

<?php ob_start(); ?>

<h1>Veuiller sélectionner votre adresse</h1>

<form action="">
    <input type="text" name="Adresse" placeholder="Votre adresse">
    <input type="submit" value="sélectionner">
</form>

<?php $contenu = ob_get_clean(); ?>