<?php $titre = "Home"; ?>

<?php ob_start(); ?>

<h1>Bienvenue!!</h1>
<p>
    Bienvenue sur ISIWeb4Shop .
    Cliquez sur ta liste de gauche pour découvrir notre offre. Nous avons en stock
    une large gamme de produits.
</p>


<a href="index.php?action=boissons">Boissons</a>
<a href="index.php?action=biscuits">Biscuits</a>
<a href="index.php?action=fruitsSecs">Fruits Secs</a>

<?php $contenu = ob_get_clean(); ?>