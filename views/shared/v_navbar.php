<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">ISIWEB4SHOP</a>
    </div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link active" href="index.php">Accueil</a></li>
        <li class="nav-item"><a class="nav-link active" href="index.php?action=boissons">Boissons</a></li>
        <li class="nav-item"><a class="nav-link active" href="index.php?action=biscuits">Biscuits</a></li>
        <li class="nav-item"><a class="nav-link active" href="index.php?action=fruitsSecs">Fruits Secs</a></li>
      </ul>

      <ul class="float-right navbar-nav ms-md-auto pull-right">
        <?php
        if (isset($_SESSION['id'])) {
          if (isset($_GET['action']) and $_GET['action'] == 'deconnexion') {
            echo "<li class=\"nav-item\"><a class=\"nav-link active pull-right\" href=\"index.php?action=connexion\">Connexion</a></li>";
          } else {
            echo "<li class=\"nav-item\"><a class=\"nav-link active pull-right\" href=\"index.php?action=moncompte\">Mon compte</a></li>";
            //echo "<li class=\"nav-item\"><a class=\"nav-link dropdown-toggle show\" data-bs-toggle=\"dropdown\" href=\"index.php?action=moncompte\"role=\"button\" aria-haspopup=\"true\" aria-expanded=\"true\">Mon compte</a></li>";
        }
        } else echo "<li class=\"nav-item\"><a class=\"nav-link active pull-right\" href=\"index.php?action=connexion\">Connexion</a></li>";
        ?>

        <li class="nav-item"><a class="nav-link active pull-right" href="index.php?action=panier"><!--<img src="assets/otherimages/panier.png" alt = "Panier">-->Panier</a></li>
      </ul>
    </div>
  </div>
</nav>