<?php
$pageTitre = "Inscription";
$metaDescription = "Formulaire d'inscription";
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../controllers/gestionFormulaire.php';
?>

<h1>Inscription</h1>

<form method="POST" action="">
    <label for="pseudo">Pseudo* :</label><br>
    <input type="text" id="pseudo" name="inscription_pseudo" minlength="2" maxlength="255" required value="<?= htmlspecialchars($donnees['inscription_pseudo'] ?? '') ?>"><br>
    <?= $erreurs['inscription_pseudo'] ?? '' ?><br>

    <label for="email">Email* :</label><br>
    <input type="email" id="email" name="inscription_email" required value="<?= htmlspecialchars($donnees['inscription_email'] ?? '') ?>"><br>
    <?= $erreurs['inscription_email'] ?? '' ?><br>

    <label for="motdepasse">Mot de passe* :</label><br>
    <input type="password" id="motdepasse" name="inscription_motDePasse" minlength="8" maxlength="72" required><br>
    <?= $erreurs['inscription_motDePasse'] ?? '' ?><br>

    <label for="motdepasse2">Confirmer le mot de passe* :</label><br>
    <input type="password" id="motdepasse2" name="inscription_motDePasse_confirmation" minlength="8" maxlength="72" required><br>
    <?= $erreurs['inscription_motDePasse_confirmation'] ?? '' ?><br>

    <button type="submit" name="inscription_submit">S'inscrire</button>
</form>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
