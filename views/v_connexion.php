<?php $titre = "Connexion"; ?>

<?php ob_start(); ?>

<h1 class="mb-3">Identification Client</h1>

<p>
    Merci d'entrer votre identifiant et votre mot de passe pour acceder à votre espace client. Si vous n'avez pas
    de compte client vous pouvez en créér un gratuitement ici : <a href="index.php?action=enregistrement"><button class="btn btn-secondary btn-sm">Enregistrement</button></a>
</p>
<?php 
echo $Co;

?>
<form action="index.php?action=connexion" method="post">
    <div class="form-inline ligne_form">
        <label for="Username">Username</label>
        <input class="mb-3 form-control border-secondary" type="text" id="Username" name="Username">

        <label for="Password">Password</label>
        <input class="mb-5 form-control border-secondary" type="password" id="Password" name="Password">

        <input class="mb-4 btn btn-secondary btn-lg" type="submit" name="connexion" id="connexion" value="Connexion">
    </div>
</form>
<?php
echo "<h1 class=\"btn-outline-warning\">" . $Co . "</h2>";
?>
<?php $contenu = ob_get_clean(); ?>