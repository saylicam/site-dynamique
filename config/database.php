<?php
$host = 'inductmilyas.mysql.db';      // ✅ ton serveur OVH
$dbname = 'inductmilyas';             // ✅ ta base de données OVH
$username = 'inductmilyas';           // ✅ identifiant MySQL OVH
$password = 'Moustapha6116';   // ⛔ remplace ceci par ton vrai mot de passe MySQL

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
