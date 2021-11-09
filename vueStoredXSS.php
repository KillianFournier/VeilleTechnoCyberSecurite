<?php ob_start(); 
session_start();
$sous_titre = "Stored XSS";

?>
<?php
// Connexion à la base de données
require("FailleXSS/config.php");

// Insertion du message à l'aide d'une requête préparée
$req = $bdd->prepare('INSERT INTO minichat (pseudo, message) VALUES(?, ?)');
$req->execute(array($_SESSION['pseudo'], $_POST['message']));

?>
    <style>
    form
    {
        text-align:center;
    }
    </style>

    
    <form method="post">
        <p>
        <label for="message">Message</label> :  <input type="text" name="message" id="message" /><br />

        <input type="submit" value="Envoyer" />
	</p>
    </form>

<?php

//Selectionne les 10 derniers messages
$reponse = $bdd->query('SELECT pseudo, message FROM minichat ORDER BY id DESC LIMIT 0, 10');

//Affiche les messages un par un dansle format Pseudo : message
while ($donnees = $reponse->fetch())
{
	echo '<p><strong>' . /*htmlentities(*/$donnees['pseudo']/*)*/ . '</strong> : ' . /*htmlentities(*/$donnees['message']/*)*/ . '</p>';
}

$reponse->closeCursor();

$contenu = ob_get_clean();
require 'gabarit.php';
?>