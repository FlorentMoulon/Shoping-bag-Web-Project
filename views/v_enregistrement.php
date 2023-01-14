<?php $titre = "Connexion"; ?>

<?php ob_start(); ?>

<h1 class="mb-5">Création d'un compte Client</h1>

<?php echo $msg ?>

<form action="index.php?action=enregistrement" method="post">

    <span class="row align-items-start">

        <div class="col tier">
            <h3>Identité</h3>
            <div class="form-inline ligne_form">
                <input type="text" placeholder="Pseudonyme" class="border-secondary form-control" id="Username" name="Username" required value=<?php echo $pseudo ?>>
            </div>
            <div class="form-inline ligne_form">
                <input type="text" placeholder="Nom" class="mb-1 border-secondary form-control" id="Nom" name="Nom" required value=<?php echo $pseudo ?>>
                <input type="text" placeholder="Prénom" class="border-secondary form-control" id="Prenom" name="Prenom" required value=<?php echo $pseudo ?>>
            </div>
            <div class="form-inline ligne_form">
                <input type="password" placeholder="Mot de passe" class="mb-1 border-secondary form-control" id="Password" name="Password" pattern="(?=.*\d)(?=.*[a-z]).{6,}" title="Votre mot de passe doit comprendre au moins 6 caractères avec un caractère spécial et un nombre" required>
                <input type="password" placeholder="Confirmation mot de passe" class="border-secondary form-control" id="C_Password" name="C_Password" required>
            </div>
        </div>


        <div class="col tier">
            <h3>Adresse</h3>
            <div class="form-inline ligne_form">
                <input type="text" placeholder="Adresse" class="mb-1 border-secondary form-control" id="Rue" name="Rue" required value=<?php echo $rue ?>>
                <input type="text" placeholder="Complément d'adresse" class="border-secondary form-control" id="C_Rue" name="C_Rue" value=<?php echo $c_rue ?>>
            </div>
            <div class="form-inline ligne_form">
                <input type="text" placeholder="Code postal" class="mb-1 border-secondary form-control" id="Postal" name="Postal" required value=<?php echo $code_p ?>>
                <input type="text" placeholder="Ville" class="border-secondary form-control" id="Ville" name="Ville" required value=<?php echo $ville ?>>
            </div>
        </div>

        <div class="col tier">
            <h3>Contact</h3>
            <div class="form-inline ligne_form">
                <input type="email" placeholder="Mail" class="mb-1 border-secondary form-control" id="Mail" name="Mail" required value=<?php echo $mail ?>>
                <input type="tel" placeholder="Téléphone" class="border-secondary form-control" id="Telephone" name="Telephone" required value=<?php echo $tel ?>>
            </div>
            <div class="center">
                <input class="btn btn-secondary btn-lg" type="submit" name="Creer" id="Creer" value="Creer">
            </div>
        </div>
    </span>

</form>



<?php $contenu = ob_get_clean(); ?>