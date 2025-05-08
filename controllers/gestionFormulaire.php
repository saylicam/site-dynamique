<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/utilisateur.php';

$erreurs = [];
$donnees = [];

if (isset($_POST['inscription_submit'])) {
    $donnees = $_POST;

    $pseudo = trim($_POST['inscription_pseudo']);
    $email = trim($_POST['inscription_email']);
    $mdp = $_POST['inscription_motDePasse'];
    $mdpConfirm = $_POST['inscription_motDePasse_confirmation'];

    if (strlen($pseudo) < 2 || strlen($pseudo) > 255) {
        $erreurs['inscription_pseudo'] = "Le pseudo doit faire entre 2 et 255 caractères.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erreurs['inscription_email'] = "Email invalide.";
    }

    if ($mdp !== $mdpConfirm) {
        $erreurs['inscription_motDePasse_confirmation'] = "Les mots de passe ne correspondent pas.";
    }

    if (strlen($mdp) < 8 || strlen($mdp) > 72) {
        $erreurs['inscription_motDePasse'] = "Le mot de passe doit faire entre 8 et 72 caractères.";
    }

    if (utilisateurExiste($pdo, $pseudo, $email)) {
        $erreurs['inscription_email'] = "Ce pseudo ou email existe déjà.";
    }

    if (empty($erreurs)) {
        // ✅ Le mot de passe est haché ici une seule fois
        $hash = password_hash($mdp, PASSWORD_DEFAULT);
        ajouterUtilisateur($pdo, $pseudo, $email, $hash);
        echo "<p>✅ Inscription réussie !</p>";
        $donnees = []; // Reset du formulaire
    } else {
        echo "<p>❌ Veuillez corriger les erreurs.</p>";
    }
}
