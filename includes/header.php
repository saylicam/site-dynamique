<?php
// Démarre la session si ce n'est pas déjà fait
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$pageTitre = $pageTitre ?? "Titre du site";
$metaDescription = $metaDescription ?? "Description par défaut";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="<?= htmlspecialchars($metaDescription) ?>">
  <title><?= htmlspecialchars($pageTitre) ?></title>
  <link rel="stylesheet" href="assets/css/style.css">
  <script src="assets/js/form-validation.js" defer></script>
  <script src="assets/js/app.js" defer></script>
</head>
<body>

<?php include 'navigation.php'; ?>


