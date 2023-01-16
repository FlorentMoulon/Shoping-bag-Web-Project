<?php $titre = "Vérification de la commandes n°" . $id; ?>

<?php ob_start(); ?>




<h1 class="mb-3">Adresse de livraison :</h1>

<?php
echo "
        <div class=\"mb-5\">
            <b>Adresse :</b> " . $adresse['add1'] . " " . $adresse['add2'] . " " . $adresse['city'] . " " . $adresse['postcode'] . " <br>
            <b>Client :</b>  " . $adresse['firstname'] . " " . $adresse['lastname'] . "
        </div>";
?>


<h1 class="mb-3">Contenue de la commande :</h1>


<?php
foreach ($panier as $d) {
    echo
    "<div class=\"ProduitPanier\">
        <div class=\"ligne center\">
            <img class=\"ImageProduitPetit\" src=\"" . IMAGE . $d['image'] . "\" alt=\"image : " . $d['name'] . "\">
            <h4 class=\"mr-3\">" . $d['name'] . "</h2>
            <h4>Quantité : " . $d['quantity'] . "</h2>
        </div>  
    </div>";
}
?>

<div class="BoutonsConfirmer">
    <a class="mr-3" href="index.php?action=confirmerCommande&id= <?php echo $id; ?>"><button type="button" class="btn btn-secondary">Confimer la commande</button></a>
    <a href="index.php?action=refuserCommande&id= <?php echo $id; ?>"><button type="button" class="btn btn-secondary">Refuser la commande</button></a>
</div>

<?php $contenu = ob_get_clean(); ?>