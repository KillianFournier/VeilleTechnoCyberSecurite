<?php
// Connexion à la base de données MySQL 
$conn = mysqli_connect("185.98.131.148", "veill1513693", "Veilletechno42", "veill1513693");

// Vérifier la connexion
if ($conn -> connect_errno) {
    echo "Failed to connect to MySQL: " . $conn -> connect_error;
    exit();
  }
?>