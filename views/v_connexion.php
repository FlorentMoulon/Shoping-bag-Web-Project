<?php $titre = "Connexion"; ?>

<?php ob_start(); ?>

<h1>Identification Client</h1>

<p>
    Merci d'entrer votre identifiant et votre mot de passe pour acceder à votre espace client. Si vous n'avez pas
<<<<<<< HEAD
    de compte client vous pouvez en créér un gratuitement ici : <a href="index.php?action=enregistrement"><b>Enregistrement</b></a>.
=======
    de compte dient vous pouvez en créér un gratuitement ici : <a href="index.php?action=enregistrement"><b>Enregistrement</b></a>.
>>>>>>> b1f6291082226d9c7a5ce6c512159cdf36adfd8e
</p>

<form action="index.php?action=connexion" method="post">
    <label for="Username">Username</label>
    <input type="text" id="Username" name="Username">

    <label for="Password">Password</label>
    <input type="password" id="Password" name="Password">

<<<<<<< HEAD
    <input type="submit" name="connexion" id="connexion" value="Connexion">
=======
    <input type="submit" name="Connexion" id="Connexion" value="Connexion">
>>>>>>> b1f6291082226d9c7a5ce6c512159cdf36adfd8e
</form>
<?php 
//Lorsque le formulaire est soumis
//Structure de base : IL FAUT ENCORE AJOUTER LES VERIFICATION AVEC la BDD
if (isset($_POST['connexion'])){
    if($_POST['Username']!=''){
        if($_POST['Password']!=''){
            echo 'Connexion valide';
        } 
        else{echo 'Connexion échoué, veuillez remplir le champ mdp';}
    }
    else{
        echo 'Veuillez rentrer un nom d\'utilisateur';
    }
} 

?>
<?php $contenu = ob_get_clean(); ?>