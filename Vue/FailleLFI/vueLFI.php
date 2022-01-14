<?php 
ob_start();
$sous_titre ='Local File Include (LFI) / Remote File Include (RFI)';

$fichier = $_GET['fichier']; //On récupére le contenu après "?fichier=" dans l'url

/*
if($fichier == "") //Si le contenu correspond à ""
{
    include("FailleLFI/LFIaccueil.php"); //On inclue la page classique 
}
else //Si le contenu correpond à autre chose
{
    include($fichier);  //inclue le fichier s'il existe
}
*/

//-----------------PATCH------------------

if ($_GET['fichier'] == "") {
    include("FailleLFI/LFIaccueil.php");
} else {
    include("http://veilletechnobts.fr/Vue/$fichier");
}



$contenu = ob_get_clean();
require 'gabarit.php';
?>