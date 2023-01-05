<?php $titre = "Connexion"; ?>

<?php ob_start(); ?>

<h1>Création d'un compte Client</h1>

<p>
    Merci d'entrer un identifiant et un mot de passe pour créér un compte client.
</p>

<form action="index.php?action=connexion">
    <label for="Username">Username</label>
    <input type="text" id="Username" name="Username">
    <label for="Password">Password</label>
    <input type="password" id="Password" name="Password">

    <input type="submit" name="Créer" id="Créer" value="Créer">
</form>

<?php $contenu = ob_get_clean(); ?>