<?php
// ===========================================
// 💻 Connexion locale (Laragon/XAMPP)
$host = 'localhost';
$dbname = 'site-dynamique';
$username = 'root';
$password = '';

// 🌐 Connexion OVH (commentée temporairement)
// $host = 'inductmilyas.mysql.db';
// $dbname = 'inductmilyas';
// $username = 'inductmilyass';
// $password = 'Moustapha6116'; //

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
