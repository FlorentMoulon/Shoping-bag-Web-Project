<?php $titre = "Listes des commandes"; ?>

<?php ob_start(); ?>

<?php
echo "<h1>" . $titre . "</h1>";

foreach ($commandes as $d) {
    echo
    "<div class=\"Commande\">
        <div>
            Date :     " . $d['date'] . " <br>
            Paiement : " . $d['payment_type'] . " <br>
            Total :    " . $d['total'] . " € <br>
            Adresse : " . $d['add1'] . " " . $d['add2'] . " " . $d['city'] . " " . $d['postcode'] . "
            Client :  " . $d['firstname'] . " " . $d['lastname'] . "
        </div>

        <div>
        <a href=\"index.php?action=verifierCommande&id=" . $d['id'] . "\"><button type=\"button\" class=\"btn btn-secondary\"> Vérifier la commande </button></a>
        </div>
    </div>";
}
?>

<?php $contenu = ob_get_clean(); ?>