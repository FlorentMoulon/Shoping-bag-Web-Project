<?php $titre = "Caisse"; ?>

<?php ob_start(); ?>

<h1 class="mb-5">Veuillez choisir un mode de paiement</h1>



<div class="col-12 mt-4">
    <div class="card p-3">
        <p class="mb-0 fw-bold h4">Mode de paiement :</p>
    </div>
</div>
<div class="col-12 card p-3">
    <div class="ligne space">
        <a href="index.php?action=paiementPaypal"><button type="button" class="btn btn-secondary btn-lg"> Paypal </button></a>
        <a href="index.php?action=paiementCheque"><button type="button" class="btn btn-secondary btn-lg"> Chèque </button></a>
    </div>
</div>






<?php $contenu = ob_get_clean(); ?>