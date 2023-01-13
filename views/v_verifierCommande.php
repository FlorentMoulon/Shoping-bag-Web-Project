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

<a href="index.php?action=confirmerCommande&id= <?php echo $id; ?>">Confimer la commande</a>
<a href="index.php?action=refuserCommande&id= <?php echo $id; ?>">Refuser la commande</a>


<?php $contenu = ob_get_clean(); ?>