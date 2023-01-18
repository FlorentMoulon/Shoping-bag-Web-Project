<?php $titre = "Caisse"; ?>

<?php ob_start(); ?>

<p>Commande effectuée !</p>

<h1>Veuillez suivre les instructions pour procéder au paiement</h1>

Remplisser le chèque avec les informations suivantes :<br><br>

<div class="row">
    <div class="marginLeft">
        Nom complet de l'émetteur : <br>
        Le montant de la somme à payer en chiffres et en toute lettre : <br>
        La date d'émission : <br>
        La signature de l'émetteur : <br>
    </div>
    <div class="marginLeft">
        votre nom<br>
        <?php echo $total; ?> €<br>
        <?php echo date('d F Y'); ?><br>
        votre signature<br>
    </div>
</div>


<p>
    Une fois rempli, envoyez le chèque par courrier postal à : <b>15 Bd André Latarjet, 69100 Villeurbanne</b>
</p>
<p>
    N'oubliez pas de timbrer votre enveloppe et de noter une adresse de retour, afin que vous puissiez le renvoyer en cas d'erreur ou de problème.
</p>


<?php $contenu = ob_get_clean(); ?>