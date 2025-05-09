<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/../lib/phpmailer/src/PHPMailer.php';
require_once __DIR__ . '/../lib/phpmailer/src/SMTP.php';
require_once __DIR__ . '/../lib/phpmailer/src/Exception.php';

$mail = new PHPMailer(true);

try {
    // Paramètres SMTP
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com'; // ou 'ssl0.ovh.net' pour OVH
    $mail->SMTPAuth   = true;
    $mail->Username   = 'ton.email@gmail.com'; // Ton adresse
    $mail->Password   = 'motdepasse-application'; // ⚠️ Un mot de passe d’application, pas ton vrai mot de passe Gmail
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    // Destinataire
    $mail->setFrom('ton.email@gmail.com', 'Ton Nom');
    $mail->addAddress('destinataire@exemple.com', 'Destinataire');

    // Contenu
    $mail->isHTML(true);
    $mail->Subject = 'Test de mail depuis PHPMailer';
    $mail->Body    = 'Ceci est un test <strong>avec PHPMailer</strong>.';
    $mail->AltBody = 'Ceci est un test avec PHPMailer.';

    $mail->send();
    echo "✅ Message envoyé avec succès.";
} catch (Exception $e) {
    echo "❌ Le message n'a pas pu être envoyé. Erreur : {$mail->ErrorInfo}";
}
