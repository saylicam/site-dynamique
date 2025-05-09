<?php

class Utilisateur {
    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function existe(string $pseudo, string $email): bool {
        $sql = "SELECT COUNT(*) FROM t_utilisateur_uti WHERE uti_pseudo = :pseudo OR uti_email = :email";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['pseudo' => $pseudo, 'email' => $email]);
        return $stmt->fetchColumn() > 0;
    }

    public function ajouter(string $pseudo, string $email, string $motDePasseHashe): void {
        $sql = "INSERT INTO t_utilisateur_uti (uti_pseudo, uti_email, uti_motdepasse) 
                VALUES (:pseudo, :email, :motdepasse)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'pseudo' => $pseudo,
            'email' => $email,
            'motdepasse' => $motDePasseHashe
        ]);
    }

    public function trouverParEmail(string $email): ?array {
        $sql = "SELECT * FROM t_utilisateur_uti WHERE uti_email = :email";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['email' => $email]);
        $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);
        return $utilisateur ?: null;
    }
}

