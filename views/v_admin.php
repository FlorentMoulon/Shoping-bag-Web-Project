<?php $titre = "Admin"; ?>

<?php ob_start(); ?>

<h1>Bienvenue sur votre espace compte admin <?php echo $pseudo; ?> </h1>

<p>
    <a href="index.php?action=deconnexion"><b>Se déconnecter</b></a>.
</p>

<form action="index.php?action=connexion" method="post">
    <label for="Username">Username</label>
    <input type="text" id="Username" name="Username">

    <label for="Password">Password</label>
    <input type="password" id="Password" name="Password">

    <input type="submit" name="connexion" id="connexion" value="Connexion">
</form>
<?php $contenu = ob_get_clean(); ?>