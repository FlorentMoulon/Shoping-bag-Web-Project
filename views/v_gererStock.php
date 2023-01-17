<?php $titre = "Gestion des stocks"; ?>

<?php ob_start(); ?>


<h1 class="mb-5">Tous les produits :</h1>


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
        <div><img class=\"ImageProduitMoyenne\" src=\"" . IMAGE . $d['image'] . "\" alt=\"image : " . $d['name'] . "\"></div>

        <div>
            <a href=\"index.php?action=" . $action . "&id=" . $d['id'] . "\"><h2>" . $d['name'] . "</h2></a>
            
            <form method=\"Post\" action=\"index.php?action=changerQuantiteStock&id=" . $d['id'] . "\">
                <div class=\"input-group mb-3\">
                    <label for='Quantite'> Quantité : </label>
                    <input class=\"form-control\" type=\"number\" name=\"Quantite\" min=\"0\" id=\"Quantite\" value=\"" . $d['quantity'] . "\">
                    <input class=\"btn btn-secondary\" type=\"submit\" name=\"Actualiser\" value=\"Actualiser la quantité\">
                </div>
            </form>

            <form method=\"Post\" action=\"index.php?action=changerPrixStock&id=" . $d['id'] . "\">
                <div class=\"input-group mb-3\">
                    <label for='Prix'> Prix : </label>
                    <input class=\"form-control\" type=\"number\" name=\"Prix\" step=0.01 min=0 id=\"Prix\" value=\"" . $d['price'] . "\">
                    <input class=\"btn btn-secondary\" type=\"submit\" name=\"Actualiser\" value=\"Actualiser le prix\">
                </div>
            </form>
        </div>
                
    </div>";
}

?>

<?php $contenu = ob_get_clean(); ?>