<?php
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "portfolio");



// Connexion à la base de données
$conn = mysqli_connect("localhost", "root", "", "portfolio");

// Vérifier la connexion
if (mysqli_connect_errno()) {
    // Erreur de connexion à la base de données
    echo "Erreur de connexion à la base de données: " . mysqli_connect_error();
    exit();
}
?>