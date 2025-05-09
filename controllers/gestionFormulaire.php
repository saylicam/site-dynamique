<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/Utilisateur.php';

$utilisateurModel = new Utilisateur($pdo);
$erreurs = [];
$donnees = [];

if (isset($_POST['inscription_submit'])) {
    $donnees = $_POST;

    $pseudo = trim($_POST['inscription_pseudo']);
    $email = trim($_POST['inscription_email']);
    $mdp = $_POST['inscription_motDePasse'];
    $mdpConfirm = $_POST['inscription_motDePasse_confirmation'];

    if (strlen($pseudo) < 2 || strlen($pseudo) > 255)
        $erreurs['inscription_pseudo'] = "Le pseudo doit faire entre 2 et 255 caractères.";

    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        $erreurs['inscription_email'] = "Email invalide.";

    if ($mdp !== $mdpConfirm)
        $erreurs['inscription_motDePasse_confirmation'] = "Les mots de passe ne correspondent pas.";

    if (strlen($mdp) < 8 || strlen($mdp) > 72)
        $erreurs['inscription_motDePasse'] = "Le mot de passe doit faire entre 8 et 72 caractères.";

    if ($utilisateurModel->existe($pseudo, $email))
        $erreurs['inscription_email'] = "Ce pseudo ou email existe déjà.";

    if (empty($erreurs)) {
        $hash = password_hash($mdp, PASSWORD_DEFAULT);
        $utilisateurModel->ajouter($pseudo, $email, $hash);
        echo "<p>✅ Inscription réussie !</p>";
        $donnees = [];
    } else {
        echo "<p>❌ Veuillez corriger les erreurs.</p>";
    }
}
