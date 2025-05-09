<?php
// Démarre la session si nécessaire
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function connecter_utilisateur(array $utilisateur): void {
    $_SESSION['utilisateur'] = $utilisateur;
}

function est_connecte(): bool {
    return isset($_SESSION['utilisateur']);
}

function deconnecter_utilisateur(): void {
    session_unset();
    session_destroy();
}

