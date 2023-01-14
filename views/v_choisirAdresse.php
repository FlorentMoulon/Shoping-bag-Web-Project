<?php $titre = "Caisse"; ?>

<?php ob_start(); ?>

<h1 class="mb-4">Veuiller Choisir une adresse</h1>

<span class="row align-items-start">
    <div class="col">
        <form method="POST" action="index.php?action=NvAdresse">
            <h2 class="mb-1">Rentrer une nouvelle adresse</h2>

            <h4>Adresse</h4>
            <div class="form-inline ligne_form">
                <input class="form-control border-secondary" type="text" placeholder="Adresse" id="Rue" name="Rue" required>
                <input class="form-control border-secondary" type="text" placeholder="Complément d'adresse" id="C_Rue" name="C_Rue" required>
            </div>
            <div class="form-inline ligne_form">
                <input class="form-control border-secondary" type="text" placeholder="Code postal" id="Postal" name="Postal" required>
                <input class="form-control border-secondary" type="text" placeholder="Ville" id="Ville" name="Ville" required>
            </div>

            <h4>Contact</h4>
            <div class="form-inline ligne_form">
                <input class="form-control border-secondary" type="text" placeholder="Nom" class="form-control" id="Nom" name="Nom" required>
                <input class="form-control border-secondary" type="text" placeholder="Prénom" class="form-control" id="Prenom" name="Prenom" required>
            </div>
            <div class="form-inline ligne_form">
                <input class="form-control border-secondary" type="text" placeholder="Mail" id="Mail" name="Mail" required>
                <input class="form-control border-secondary" type="text" placeholder="Téléphone" id="Telephone" name="Telephone" required>
            </div>

            <input class="btn btn-secondary" type="submit" name="NvAdresse" value="Choisir l'adresse que vous avez saisie">

        </form>
    </div>


    <div class="col">
        <form method="POST" action="index.php?action=AncienneAdresse">
            <h2 class="mb-5">Ou utiliser l'adresse de votre compte</h2>
            <?php
            if ($adresse == 0) {
                echo "Vous n'avez pas d'adresse enregistrer ou vous n'êtes pas connecté. </br>";
            } else {
                echo
                "<div>
                    <h4 class=\"mb-3\">Adresse</h4>
                    <div class=\"mb-5 row align-items-start\">
                        <div class=\"col\">
                            Adresse :<br>
                            Complément d'adresse :<br>
                            Code postal :<br>
                            Ville :<br>
                        </div>
                        <div class=\"col\">" .
                    $adresse['add1'] . "</br>" .
                    $adresse['add2'] . "</br>" .
                    $adresse['add3'] . "</br>" .
                    $adresse['postcode'] . "</br>
                        </div>
                    </div>

                    <h4 class=\"mb-3\">Contact</h4>
                    <div class=\"mb-5 row align-items-start\">
                        <div class=\"col\">
                            Nom :<br>
                            Prénom :<br>
                            Mail: <br>
                            Téléphone :<br>
                        </div>
                        <div class=\"col\">" .
                    $adresse['forname'] . "</br>" .
                    $adresse['surname'] . "</br>" .
                    $adresse['email'] . "</br>" .
                    $adresse['phone'] . "</br>
                        </div>
                    </div>
                        
                </div>

                <input class=\"btn btn-secondary\" type=\"submit\" name\"AncienneAdresse\" value=\"Choisir l'adresse de votre compte\">";
            }
            ?>
        </form>
    </div>
</span>

<?php $contenu = ob_get_clean(); ?>