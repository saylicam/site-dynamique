<?php
$pageTitre = "Contact";
$metaDescription = "Formulaire de contact.";
include '../includes/header.php';

$errors = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $nom = trim($_POST["nom"]);
  $prenom = trim($_POST["prenom"]);
  $email = trim($_POST["email"]);
  $message = trim($_POST["message"]);

  if (empty($nom) || strlen($nom) < 2 || strlen($nom) > 255) {
      $errors['nom'] = "Nom invalide.";
  }

  if (!empty($prenom) && (strlen($prenom) < 2 || strlen($prenom) > 255)) {
      $errors['prenom'] = "Prénom invalide.";
  }

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors['email'] = "Email invalide.";
  }

  if (strlen($message) < 10 || strlen($message) > 3000) {
      $errors['message'] = "Message invalide.";
  }

  if (empty($errors)) {
      echo "<p class='success'>Formulaire envoyé !</p>";
  } else {
      echo "<p class='error'>Erreur dans le formulaire.</p>";
  }
}
?>

<h1>Contact</h1>
<form method="POST" action="">
  <label for="nom">Nom *</label>
  <input type="text" id="nom" name="nom" required minlength="2" maxlength="255">

  <label for="prenom">Prénom</label>
  <input type="text" id="prenom" name="prenom" minlength="2" maxlength="255">

  <label for="email">Email *</label>
  <input type="email" id="email" name="email" required>

  <label for="message">Message *</label>
  <textarea id="message" name="message" required minlength="10" maxlength="3000"></textarea>

  <button type="submit">Envoyer</button>
</form>

<?php include '../includes/footer.php'; ?>

