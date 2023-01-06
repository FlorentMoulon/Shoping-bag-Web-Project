<?php $titre = "Nos boissons"; ?>

<?php ob_start(); ?>

<h1>Pages des boissons</h1>

<?php
foreach ($boissons as $d) {
    echo $d['name'] . '<br>';
}
?>

<?php $contenu = ob_get_clean(); ?>