<?php $titre = "Caisse"; ?>

<?php ob_start(); ?>

<h1>Veuiller Choisir une adresse</h1>


<form action="index.php?action=choisirPaiement">
    <span>
        <h2>Adresse de votre compte</h2>
        <?php
        if ($adresse == 0) {
            echo "Vous n'avez pas d'adresse enregistrer ou vous n'êtes pas connecté. </br>";
        } else {
            echo
            "<div class\"row\">
            <div>
                Adresse :<br>
                Complément d'adresse :<br>
                Code postal :<br>
                Ville :<br>
                </div>
                
                <div>" .

                $adresse['add1'] . "</br>" .
                $adresse['add2'] . "</br>" .
                $adresse['add3'] . "</br>" .
                $adresse['postcode'] . "</br>
                    <input type=\"submit\" name\"AncienneAdresse\" value=\"Choisir l'adresse de votre compte\">
                </div>
                </div>";
        }
        ?>
    </span>

    <span>
        <h2>Ou rentrer une nouvelle adresse</h2>

        <div class="form-group">
            <input type="text" placeholder="Adresse" id="Rue" name="Rue">
        </div>
        <div class="form-group">
            <input type="text" placeholder="Complément d'adresse" id="C_Rue" name="C_Rue">
        </div>
        <div class="form-inline ligne_form">
            <input type="text" placeholder="Code postal" id="Postal" name="Postal">
            <input type="text" placeholder="Ville" id="Ville" name="Ville">
        </div>
        <input type="submit" name="NvAdresse" value="Choisir l'adresse que vous avez saisie">
    </span>

</form>

<?php $contenu = ob_get_clean(); ?>