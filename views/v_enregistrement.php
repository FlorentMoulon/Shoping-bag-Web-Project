<?php $titre = "Connexion"; ?>

<?php ob_start(); ?>

<h1>Création d'un compte Client</h1>

<p>
    Les champs marqués d'une étoile .
</p>

<form action="index.php?action=enregistrement" method = "post">
    <h3>Identité</h3>
    <div class="form-inline ligne_form" >
        <input type="text" placeholder = "Pseudonyme" class="form-control"
        id="Username" name="Username" required>
    </div>
    <div class="form-inline ligne_form" >    
        <input type="text" placeholder = "Nom" class="form-control"
        id="Nom" name="Nom" pattern="[A-Za-z]" required>
        <input type="text" placeholder = "Prénom" class="form-control"
        id="Prenom" name="Prenom" pattern="[A-Za-z]" required>
    </div>
    <div class="form-inline ligne_form" >    
        <input type="password" placeholder="Mot de passe" class="form-control"
        id="Password" name="Password" pattern="(?=.*\d)(?=.*[a-z]).{6,}"
        title = "Votre mot de passe doit comprendre au moins 6 caractères avec un caractère spécial et un nombre" required>
        <input type="password" placeholder="Confirmation mot de passe" class="form-control" id="C_Password" name="C_Password" required>
    </div>
    
    <h3>Adresse</h3>
    <div class="form-group" >
        <input type="text" placeholder = "Adresse" class="form-control" id="Rue" name="Rue" required>
    </div>
    <div class="form-group" >
        <input type="text" placeholder = "Complément d'adresse" class="form-control" id="C_Rue" name="C_Rue">
    </div>
    <div class="form-inline ligne_form" >    
        <input type="text" placeholder="Code postal" class="form-control" id="Postal" name="Postal" required>
        <input type="text" placeholder="Ville" class="form-control" id="Ville" name="Ville" required>
    </div>
        
    <h3>Contact</h3>
    <div class="form-inline ligne_form" >    
        <input type="email" placeholder="Mail" class="form-control mail" id="Mail" name="Mail" required>
        <input type="tel" placeholder="Téléphone" class="form-control" id="Telephone" name="Telephone">
        
    </div>


    <input type="submit" name="Creer" id="Creer" value="Creer">
</form>
<? echo $msg ?>


<?php $contenu = ob_get_clean(); ?>