<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Pour ajouter dynamiquement la classe "active" au menu
if (!function_exists('activeClass')) {
    function activeClass(string $page): string {
        return basename($_SERVER['PHP_SELF']) === $page ? 'class="active"' : '';
    }
}
?>

<nav>
    <ul>
        <li <?= activeClass('index.php') ?>>
            <a href="index.php">Accueil</a>
        </li>
        <li <?= activeClass('contact.php') ?>>
            <a href="contact.php">Contact</a>
        </li>
        <li <?= activeClass('carrousel.php') ?>>
            <a href="carrousel.php">Carrousel</a>
        </li>

        <?php if (!isset($_SESSION['utilisateur'])): ?>
            <li <?= activeClass('inscription.php') ?>>
                <a href="inscription.php">Inscription</a>
            </li>
            <li <?= activeClass('connexion.php') ?>>
                <a href="connexion.php">Connexion</a>
            </li>
        <?php else: ?>
            <li <?= activeClass('profil.php') ?>>
                <a href="profil.php">
                    Bonjour <?= htmlspecialchars($_SESSION['utilisateur']['uti_pseudo']) ?>
                </a>
            </li>
            <li>
                <a href="deconnexion.php">Déconnexion</a>
            </li>
        <?php endif; ?>
    </ul>
</nav>

