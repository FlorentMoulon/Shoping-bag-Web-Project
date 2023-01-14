<?php $titre = "Home"; ?>

<?php ob_start(); ?>

<h1>Bienvenue!!</h1>
<p>
    Bienvenue sur ISIWeb4Shop .
    Cliquez sur un menu pour découvrir notre offre. Nous avons en stock
    une large gamme de produits.
</p>


<a href="index.php?action=boissons"><button type="button" class="mb-4 btn btn-secondary btn-lg"> Boissons </button></a>
<a href="index.php?action=biscuits"><button type="button" class="mb-4 btn btn-secondary btn-lg"> Biscuits </button></a>
<a href="index.php?action=fruitsSecs"><button type="button" class="mb-4 btn btn-secondary btn-lg"> Fruits Secs </button></a>

<?php $contenu = ob_get_clean(); ?>