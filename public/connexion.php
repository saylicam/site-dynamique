<?php
session_start(); // Toujours en haut

require_once '../config/database.php';
require_once '../models/utilisateur.php';

$erreur = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['mot_de_passe'] ?? '';

    $utilisateur = obtenirUtilisateurParEmail($pdo, $email);

    if ($utilisateur && isset($utilisateur['uti_motdepasse']) && password_verify($password, $utilisateur['uti_motdepasse'])) {
        $_SESSION['utilisateur'] = $utilisateur;
        header('Location: index.php');
        exit;
    } else {
        $erreur = "Identifiants invalides.";
    }
}
?>

<?php include '../includes/header.php'; ?>

<h1>Connexion</h1>

<?php if (!empty($erreur)): ?>
    <p class="error"><?= htmlspecialchars($erreur) ?></p>
<?php endif; ?>

<form method="POST" action="">
    <label for="email">Email :</label>
    <input type="email" name="email" id="email" required>

    <label for="mot_de_passe">Mot de passe :</label>
    <input type="password" name="mot_de_passe" id="mot_de_passe" required>

    <button type="submit">Se connecter</button>
</form>

<?php include '../includes/footer.php'; ?>
