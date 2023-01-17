<?php $titre = "Caisse"; ?>

<?php ob_start(); ?>

<h1 class="mb-5">Veiller suivre les instructions pour procéder au paiement</h1>



<div class="card border-secondary mb-5">
    <div class="card-header">Remplisser le chèque avec les informations suivantes :</div>
    <div class="card-body">
        <div class="ligne">
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
    </div>
</div>





<h5 class="mb-4"> Une fois rempli, envoyer le chèque par courrier postal à : </h5>
<h4 class="color-gold mb-4 card border-warning padding"> 15 Bd André Latarjet, 69100 Villeurbanne </h4>

<p class="mb-5">
    N'oubliez pas de timbrer votre enveloppe et de noter une adresse de retour, afin que vous puissiez le renvoyer en cas d'erreur ou de problème.
</p>


<a href="index.php?action=factureCheque"><button type="button" class="large btn btn-secondary btn-lg"> Confirmer la commande </button></a>



<?php $contenu = ob_get_clean(); ?>