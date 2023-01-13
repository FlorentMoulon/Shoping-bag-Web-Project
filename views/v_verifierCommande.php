<?php $titre = "Vérification de la commandes n°" . $id; ?>

<?php ob_start(); ?>




<h1>Adresse de livraison :</h1>

<?php
echo "
        <div>
            <b>Adresse :</b> " . $adresse['add1'] . " " . $adresse['add2'] . " " . $adresse['city'] . " " . $adresse['postcode'] . " <br>
            <b>Client :</b>  " . $adresse['firstname'] . " " . $adresse['lastname'] . "
        </div>";
?>


<h1>Contenue de la commande :</h1>


<?php
foreach ($panier as $d) {
    echo
    "<div class=\"ProduitPanier\">
        <div><img class=\"ImageProduit\" src=\"" . IMAGE . $d['image'] . "\" alt=\"image : " . $d['name'] . "\"></div>

        <div>
            <h2>" . $d['name'] . "</h2>
            <h2>Quantité : " . $d['quantity'] . "</h2>
        </div>  
    </div>";
}
?>

<div class="BoutonConfirmer">
    <a href="index.php?action=confirmerCommande&id= <?php echo $id; ?>"><button type="button" class="btn btn-primary">Confimer la commande</button></a>
    <a href="index.php?action=refuserCommande&id= <?php echo $id; ?>"><button type="button" class="btn btn-primary">Refuser la commande</button></a>
</div>

<?php $contenu = ob_get_clean(); ?>