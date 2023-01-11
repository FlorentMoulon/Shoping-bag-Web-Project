<?php $titre = "Connexion"; ?>

<?php ob_start(); ?>

<h1>Création d'un compte Client</h1>

<p>
    Merci d'entrer un identifiant et un mot de passe pour créér un compte client.
</p>

<formaction="index.php?action=enregistrement" method = "post">
    <h3>Identité</h3>
    <div class="form-inline ligne_form" >
        <input type="text" placeholder = "Pseudonyme" class="form-control" id="Username" name="Username">
    </div>
    <div class="form-inline ligne_form" >    
        <input type="text" placeholder = "Nom" class="form-control" id="Nom" name="Nom">
        <input type="text" placeholder = "Prénom" class="form-control" id="Prenom" name="Prenom">
    </div>
    <div class="form-inline ligne_form" >    
        <input type="password" placeholder="Mot de passe" class="form-control" id="Password" name="Password">
        <input type="password" placeholder="Confirmation mot de passe" class="form-control" id="C_Password" name="C_Password">
    </div>
    
    <h3>Adresse</h3>
    <div class="form-group" >
        <input type="text" placeholder = "Adresse" class="form-control" id="Rue" name="Rue">
    </div>
    <div class="form-group" >
        <input type="text" placeholder = "Complément d'adresse" class="form-control" id="C_Rue" name="C_Rue">
    </div>
    <div class="form-inline ligne_form" >    
        <input type="text" placeholder="Code postal" class="form-control" id="Postal" name="Postal">
        <input type="text" placeholder="Ville" class="form-control" id="Ville" name="Ville">
    </div>
        
    <h3>Contact</h3>
    <div class="form-inline ligne_form" >    
        <input type="text" placeholder="Mail" class="form-control" id="Mail" name="Mail">
        <input type="text" placeholder="Téléphone" class="form-control" id="Telephone" name="Telephone">
        
    </div>


    <input type="submit" name="Créer" id="Créer" value="Créer">
</form>

<?php
if (isset($_POST['Créer'])){
    $enregistrement = new Enregistrement();
    $enregistrement->enregistrement();
}

?>

<?php $contenu = ob_get_clean(); ?>