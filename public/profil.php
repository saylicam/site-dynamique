<?php
require_once '../controllers/gestionAuthentification.php';
require_once '../includes/header.php';

// Vérifie que l'utilisateur est connecté
if (!est_connecte()) {
    header('Location: connexion.php');
    exit;
}

$utilisateur = $_SESSION['utilisateur'];
?>

<h1>Profil de <?= htmlspecialchars($utilisateur['uti_pseudo']) ?></h1>

<ul>
    <li><strong>Pseudo :</strong> <?= htmlspecialchars($utilisateur['uti_pseudo']) ?></li>
    <li><strong>Email :</strong> <?= htmlspecialchars($utilisateur['uti_email']) ?></li>
</ul>

<form method="post" action="deconnexion.php">
    <button type="submit">Déconnexion</button>
</form>

<?php require_once '../includes/footer.php'; ?>
