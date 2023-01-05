<?php $titre = "Connexion"; ?>

<?php ob_start(); ?>

<h1>Idnetification Client</h1>

<p>
    Merci d'en trer votre identifiant et votre mot de passe pour acceder à votre espace dient. Si vous n'avez pas
    de compte dient vous pouvez en créér un gratuitement ici : <a href="index.php?action=enregistrement"><b>Enregistrement</b></a>.
</p>

<form action="index.php?action=connexion">
    <label for="Username">Username</label>
    <input type="text" id="Username" name="Username">

    <label for="Password">Password</label>
    <input type="password" id="Password" name="Password">

    <input type="submit" name="connexion" id="connexion">
</form>

<?php $contenu = ob_get_clean(); ?>