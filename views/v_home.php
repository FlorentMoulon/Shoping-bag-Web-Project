<?php $titre = "Home"; ?>

<?php ob_start(); ?>

<h1>Bienvenue!!</h1>
<p>
    Bienvenue sur ISIWeb4Shop .
    Cliquez sur ta liste de gauche pour découvrir notre offre. Nous avons en stock
    une large gamme de produits.
</p>

<form method="post" action="index.php?action=boisson">
    <input type="submit" value="boisson" />
</form>


<?php $contenu = ob_get_clean(); ?>