<?php
$pageTitre = "Carrousel";
$metaDescription = "Exemple de carrousel Bootstrap";
include '../includes/header.php';
?>

<!-- Bootstrap CSS (CDN) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<h1 style="text-align:center; margin-bottom:30px;">Carrousel d’images</h1>

<div id="carouselExampleIndicators" class="carousel slide container" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://picsum.photos/id/1015/800/400" class="d-block w-100" alt="Image 1">
    </div>
    <div class="carousel-item">
      <img src="https://picsum.photos/id/1016/800/400" class="d-block w-100" alt="Image 2">
    </div>
    <div class="carousel-item">
      <img src="https://picsum.photos/id/1024/800/400" class="d-block w-100" alt="Image 3">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>

<!-- Bootstrap JS (CDN) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<?php include '../includes/footer.php'; ?>
