<?php



try

{

	$bdd = new PDO('mysql:host=185.98.131.148;dbname=db;charset=utf8', 'db', 'db');

}

catch(Exception $e)

{

        die('Erreur : '.$e->getMessage());

}
