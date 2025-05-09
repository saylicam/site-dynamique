<?php
require_once '../controllers/gestionAuthentification.php';

deconnecter_utilisateur();
header('Location: index.php');
exit;
