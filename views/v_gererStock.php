<?php $titre = "Gestion des stocks"; ?>

<?php ob_start(); ?>


<h1>Tous les produits :</h1>


<?php
foreach ($produits as $d) {
    switch ($d['cat_id']) {
        case 1:
            $action = 'boisson';
            break;
        case 2:
            $action = 'biscuit';
            break;
        case 3:
            $action = 'fruitSec';
            break;
        default:
            break;
    }


    echo
    "<div class=\"ProduitPanier\">
        <div><img class=\"ImageProduit\" src=\"" . IMAGE . $d['image'] . "\" alt=\"image : " . $d['name'] . "\"></div>

        <div>
            <a href=\"index.php?action=" . $action . "&id=" . $d['id'] . "\"><h2>" . $d['name'] . "</h2></a>
            
            <form method=\"Post\" action=\"index.php?action=changerQuantiteStock&id=" . $d['id'] . "\">
                <div class=\"row\">
                    <label for='Quantite'> Quantité : </label>
                    <input type=\"number\" name=\"Quantite\" min=\"0\" id=\"Quantite\" value=\"" . $d['quantity'] . "\">
                    <input type=\"submit\" name=\"Actualiser\" value=\"Actualiser quantité\">
                </div>
            </form>

            <form method=\"Post\" action=\"index.php?action=changerPrixStock&id=" . $d['id'] . "\">
                <div class=\"row\">
                    <label for='Prix'> Prix : </label>
                    <input type=\"number\" name=\"Prix\" step=0.01 min=0 id=\"Prix\" value=\"" . $d['price'] . "\">
                    <input type=\"submit\" name=\"Actualiser\" value=\"Actualiser quantité\">
                </div>
            </form>
        </div>
                
    </div>";
}

?>

<?php $contenu = ob_get_clean(); ?>