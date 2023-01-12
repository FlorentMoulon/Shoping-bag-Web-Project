<?php $titre = "Connexion"; ?>

<?php ob_start(); ?>

<h1>Création d'un compte Client</h1>

<?php echo $msg?>

<form action="index.php?action=enregistrement" method = "post">
    <h3>Identité</h3>
    <div class="form-inline ligne_form" >
        <input type="text" placeholder = "Pseudonyme" class="form-control"
        id="Username" name="Username" required value = <?php echo $pseudo ?>>
    </div>
    <div class="form-inline ligne_form" >    
        <input type="text" placeholder = "Nom" class="form-control"
        id="Nom" name="Nom" required value = <?php echo $pseudo ?>>
        <input type="text" placeholder = "Prénom" class="form-control"
        id="Prenom" name="Prenom" required value = <?php echo $pseudo ?>>
    </div>
    <div class="form-inline ligne_form" >    
        <input type="password" placeholder="Mot de passe" class="form-control"
        id="Password" name="Password" pattern="(?=.*\d)(?=.*[a-z]).{6,}"
        title = "Votre mot de passe doit comprendre au moins 6 caractères avec un caractère spécial et un nombre" required>
        <input type="password" placeholder="Confirmation mot de passe" class="form-control" id="C_Password" name="C_Password" required>
    </div>
    
    <h3>Adresse</h3>
    <div class="form-group" >
        <input type="text" placeholder = "Adresse" class="form-control" 
        id="Rue" name="Rue"  required value = <?php echo $rue ?>>
    </div>
    <div class="form-group" >
        <input type="text" placeholder = "Complément d'adresse" class="form-control" 
        id="C_Rue" name="C_Rue" value = <?php echo $c_rue ?>>
    </div>
    <div class="form-inline ligne_form" >    
        <input type="text" placeholder="Code postal" class="form-control" 
        id="Postal" name="Postal" required value = <?php echo $code_p ?>>
        <input type="text" placeholder="Ville" class="form-control" 
        id="Ville" name="Ville" required value = <?php echo $ville ?>>
    </div>
        
    <h3>Contact</h3>
    <div class="form-inline ligne_form" >    
        <input type="email" placeholder="Mail" class="form-control mail" 
        id="Mail" name="Mail" required value = <?php echo $mail ?>>
        <input type="tel" placeholder="Téléphone" class="form-control" 
        id="Telephone" name="Telephone" required value=<?php echo $tel ?>>
        
    </div>


    <input type="submit" name="Creer" id="Creer" value="Creer">
</form>



<?php $contenu = ob_get_clean(); ?>