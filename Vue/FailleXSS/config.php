<?php

try
{
	$bdd = new PDO('mysql:host=185.98.131.148;dbname=veill1513693;charset=utf8', 'veill1513693', 'Veilletechno42');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}