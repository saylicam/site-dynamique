<?php

// Vérifie si un utilisateur existe déjà (par pseudo ou email)
function utilisateurExiste(PDO $pdo, string $pseudo, string $email): bool {
    $sql = "SELECT COUNT(*) FROM t_utilisateur_uti WHERE uti_pseudo = :pseudo OR uti_email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['pseudo' => $pseudo, 'email' => $email]);
    return $stmt->fetchColumn() > 0;
}

// Ajoute un nouvel utilisateur (le mot de passe est déjà hashé en amont)
function ajouterUtilisateur(PDO $pdo, string $pseudo, string $email, string $motDePasseHashe): void {
    $sql = "INSERT INTO t_utilisateur_uti (uti_pseudo, uti_email, uti_motdepasse) 
            VALUES (:pseudo, :email, :motdepasse)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'pseudo' => $pseudo,
        'email' => $email,
        'motdepasse' => $motDePasseHashe
    ]);
}

// Récupère un utilisateur par son email (pour la connexion)
function obtenirUtilisateurParEmail(PDO $pdo, string $email): ?array {
    $sql = "SELECT * FROM t_utilisateur_uti WHERE uti_email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['email' => $email]);
    $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);
    return $utilisateur ?: null;
}

