<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/style.css" />
    <title><?= $titre ?></title>
</head>

<body>
    <?php require_once(PATH_SHARED_VIEWS . 'navbar.php'); ?>

    <div class="page">

        <?= $contenu ?>

    </div>

    <?php require_once(PATH_SHARED_VIEWS . 'footer.php'); ?>
</body>

</html>