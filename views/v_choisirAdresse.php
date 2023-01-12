<?php $titre = "Caisse"; ?>

<?php ob_start(); ?>

<h1>Veuiller Choisir une adresse</h1>


<form method="POST" action="index.php?action=AncienneAdresse">
    <h2>Adresse de votre compte</h2>
    <?php
    if ($adresse == 0) {
        echo "Vous n'avez pas d'adresse enregistrer ou vous n'êtes pas connecté. </br>";
    } else {
        echo
        "<div class=\"row\">
            <div class=\"marginLeft\">
                Adresse :<br>
                Complément d'adresse :<br>
                Code postal :<br>
                Ville :<br>
                </br>
                Nom :<br>
                Prénom :<br>
                Mail: <br>
                Téléphone :<br>
                </div>
                
                <div class=\"marginLeft\">" .

            $adresse['add1'] . "</br>" .
            $adresse['add2'] . "</br>" .
            $adresse['add3'] . "</br>" .
            $adresse['postcode'] . "</br>
                </br>" .
            $adresse['forname'] . "</br>" .
            $adresse['surname'] . "</br>" .
            $adresse['email'] . "</br>" .
            $adresse['phone'] . "</br>

                    
                </div>
                </div>
                <input type=\"submit\" name\"AncienneAdresse\" value=\"Choisir l'adresse de votre compte\">";
    }
    ?>
</form>

<form method="POST" action="index.php?action=NvAdresse">
    <h2>Ou rentrer une nouvelle adresse</h2>

    <h3>Adresse</h3>
    <div class="form-inline ligne_form">
        <input type="text" placeholder="Adresse" id="Rue" name="Rue" required>
        <input type="text" placeholder="Complément d'adresse" id="C_Rue" name="C_Rue" required>
    </div>
    <div class="form-inline ligne_form">
        <input type="text" placeholder="Code postal" id="Postal" name="Postal" required>
        <input type="text" placeholder="Ville" id="Ville" name="Ville" required>
    </div>

    <h3>Contact</h3>
    <div class="form-inline ligne_form">
        <input type="text" placeholder="Nom" class="form-control" id="Nom" name="Nom" required>
        <input type="text" placeholder="Prénom" class="form-control" id="Prenom" name="Prenom" required>
    </div>
    <div class="form-inline ligne_form">
        <input type="text" placeholder="Mail" id="Mail" name="Mail" required>
        <input type="text" placeholder="Téléphone" id="Telephone" name="Telephone" required>
    </div>

    <input type="submit" name="NvAdresse" value="Choisir l'adresse que vous avez saisie">

</form>

<?php $contenu = ob_get_clean(); ?>