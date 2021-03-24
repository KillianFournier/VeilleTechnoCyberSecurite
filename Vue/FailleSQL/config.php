<?php
// Connexion à la base de données MySQL 
$conn = mysqli_connect("db", "db", "db", "db");

// Vérifier la connexion
if ($conn -> connect_errno) {
    echo "Failed to connect to MySQL: " . $conn -> connect_error;
    exit();
  }
?>
