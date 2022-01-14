<?php
session_start();
$mdp = $_SESSION['mdp'];
$pseudo = $_SESSION['pseudo'];

setcookie('pseudo', $pseudo, time()+36000);
setcookie('mdp', $mdp, time()+36000);

ob_start();
$sous_titre = 'Index XSS';

?>

<h3>Bonjour <?php echo $_SESSION['pseudo']; ?>, vos identifiant / mot de passe viennent d'être enregistrés à l'aide d'un cookie. C'est sécurisé, ne vous inquiétez pas, personne ne pourra y acceder, ni même le serveur. </h3>

<a href="FailleSQL/logout.php">Se Déconnecter</a>
<br><a href="vueStoredXSS.php">Minichat (simulation d'un Forum)</a></p>   
<?php
$contenu = ob_get_clean();
require 'gabarit.php';
?>