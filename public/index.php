<?php
$pageTitre = "Accueil";
$metaDescription = "Bienvenue sur notre page d’accueil.";
include '../includes/header.php';
?>

<h1>Accueil</h1>
<p>Bienvenue sur notre site dynamique.</p>

<hr>

<div class="joke-section">
  <h2>Envie d’une blague ?</h2>
  <button id="jokeBtn">Afficher une blague</button>
  <p id="jokeText"></p>
</div>


<?php include '../includes/footer.php'; ?>
