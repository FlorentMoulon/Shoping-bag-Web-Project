<?php $titre = "Caisse"; ?>

<?php ob_start(); ?>

<h3 class="mb-4">Veuillez choisir une adresse</h3>

<span class="row align-items-start">
    <div class="col">
        <form method="POST" action="index.php?action=NvAdresse">
            <h4 class="mb-1">Nouvelle adresse</h4>

            <h5>Adresse</h5>
            <div class="form-inline ligne_form">
                <input class="form-control border-secondary" type="text" placeholder="Adresse" id="Rue" name="Rue" required>
                <input class="form-control border-secondary" type="text" placeholder="Complément d'adresse" id="C_Rue" name="C_Rue" required>
            </div>
            <div class="form-inline ligne_form">
                <input class="form-control border-secondary" type="text" placeholder="Code postal" id="Postal" name="Postal" required>
                <input class="form-control border-secondary" type="text" placeholder="Ville" id="Ville" name="Ville" required>
            </div>

            <h5>Contact</h5>
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
            <h4 class="mb-5">Adresse de votre compte</h4>
            <?php
            if ($adresse == 0) {
                echo "Vous n'avez pas d'adresse enregistrer ou vous n'êtes pas connecté. </br>";
            } else {
                echo
                "<div>
                    <h5 class=\"mb-3\">Adresse</h5>
                    <div class=\"mb-5 row align-items-start\">
                        <div class=\"col\">
                            Nom :<br>
                            Prénom :<br></br>

                            Adresse :<br>
                            Complément d'adresse :<br>
                            Code postal :<br>
                            Ville :<br></br>

                            Mail: <br>
                            Téléphone :<br>
                        </div>
                        <div class=\"col\">" .
                    $adresse['surname'] . "</br>" .
                    $adresse['forname'] . "</br></br>" .
                    $adresse['add1'] . "</br>" .
                    $adresse['add2'] . "</br>" .
                    $adresse['add3'] . "</br>" .
                    $adresse['postcode'] . "</br></br>" .
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