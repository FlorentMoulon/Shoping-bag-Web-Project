<?php $titre = "Home"; ?>

<?php ob_start(); ?>

<h1>Bienvenue!!</h1>
<p>
    Bienvenue sur ISIWeb4Shop .
    Cliquez sur un menu pour découvrir notre offre. Nous avons en stock
    une large gamme de produits.
</p>


<div id="Accueil" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#Accueil" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#Accueil" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#Accueil" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="2000">
      <img src="assets/otherimages/biscuits.png" class="d-block w-100" alt="Image de biscuits">
      <div class="carousel-caption d-none d-md-block">
        <h2>BISCUITS</h2>
        <p>Notre gamme biscuit.</p>
      </div>
    </div>
    <div class="carousel-item" data-bs-interval="2000">
      <img src="assets/otherimages/boissons.png" class="d-block w-100" alt="Image de boissons">
      <div class="carousel-caption d-none d-md-block">
        <h2>BOISSONS</h2>
        <p>L'ensemble de nos boissons pour vous rafraichir.</p>
      </div>
    </div>
    <div class="carousel-item" data-bs-interval="2000">
      <img src="assets/otherimages/fruits_sec.png" class="d-block w-100" alt="Image de fruits sec">
      <div class="carousel-caption d-none d-md-block">
        <h2>FRUITS SEC</h2>
        <p>Retrouvez toutes notre offres fruits sec pour vos en cas.</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#Accueil" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#Accueil" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<?php $contenu = ob_get_clean(); ?>