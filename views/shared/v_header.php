<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">ISIWEB4SHOP</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="index.php">Accueil</a></li>
      <li><a href="index.php?action=boissons">Boissons</a></li>
      <li><a href="index.php?action=biscuits">Biscuits</a></li>
      <li><a href="index.php?action=fruitsSecs">Fruits Secs</a></li>
    </ul>
    <ul class="nav navbar-nav ms-md-auto pull-right">
      <?php
      if (isset($_SESSION['id_customer']) and (!isset($_GET['action']) || $_GET['action'] != 'deconnexion')) {
        echo "<li><a href=\"index.php?action=moncompte\">Mon compte</a></li>";
      } else echo "<li><a href=\"index.php?action=connexion\">Connexion</a></li>";
      ?>



      <li class="pull-right"><a href="index.php?action=panier"><span class="glyphicon glyphicon-shopping-cart"> Panier </span></a></li>
    </ul>
  </div>
</nav>