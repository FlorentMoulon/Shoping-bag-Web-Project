<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">ISIWEB4SHOP</a>
    </div>

    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link active" href="index.php">Accueil</a></li>
        <li class="nav-item"><a class="nav-link active" href="index.php?action=boissons">Boissons</a></li>
        <li class="nav-item"><a class="nav-link active" href="index.php?action=biscuits">Biscuits</a></li>
        <li class="nav-item"><a class="nav-link active" href="index.php?action=fruitsSecs">Fruits Secs</a></li>
      </ul>

      <ul class="float-right navbar-nav ms-md-auto">
        <?php
        if (isset($_SESSION['id'])) {
          if (isset($_GET['action']) and $_GET['action'] == 'deconnexion') {
            echo "<li class=\"nav-item\"><a class=\"nav-link active\" href=\"index.php?action=connexion\">Connexion</a></li>";
          } else {
            echo "<li class=\"nav-item dropdown\">
                    <a class=\"nav-link dropdown-toggle show\" data-bs-toggle=\"dropdown\" href=\"index.php?action=moncompte\"role=\"button\" aria-haspopup=\"true\" aria-expanded=\"true\">Mon compte</a>
                    <div class=\"dropdown-menu\" data-bs-popper=\"static\">
                      <a class=\"dropdown-item\" href=\"index.php?action=deconnexion\">Se déconnecter</a>
                      <div class=\"dropdown-divider\"></div>
                      <a href=\"index.php?action=listeCommandes\">Confirmer les commandes</a>
                      <a href=\"index.php?action=gererStock\">Gérer les stocks</a>.
                    </div>
                  </li>";
          }
        } else echo "<li class=\"nav-item\"><a class=\"nav-link active\" href=\"index.php?action=connexion\">Connexion</a></li>";
        ?>

        <li class="nav-item"><a class="nav-link active" href="index.php?action=panier">Panier</a></li>
      </ul>
    </div>
  </div>
</nav>