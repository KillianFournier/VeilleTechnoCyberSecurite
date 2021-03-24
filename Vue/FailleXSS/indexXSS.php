<?php
ob_start();
$sous_titre = "Index XSS";
?>

<?php 
session_start();
?>

<h1>Bienvenue <?php echo $_SESSION['pseudo']; ?>!</h1>

<?php
$contenu = ob_get_clean();
require 'http://veilletechnobts.fr/Vue/gabarit.php';
?>