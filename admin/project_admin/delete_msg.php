<?php
include "../../includes/config.php";


// Vérifier si l'ID est présent dans la requête GET
if (isset($_GET['id'])) {
    // Récupérer l'ID à supprimer
    $id = $_GET['id'];

    // Préparer la requête SQL pour supprimer les données correspondant à l'ID
    $sql = "DELETE FROM contact WHERE id=$id";

    // Exécuter la requête SQL
    if (mysqli_query($conn, $sql)) {
        // Rediriger vers la page d'affichage des données avec un message de confirmation
        header("Location: ../message.php?message=success");
        exit;
    } else {
        // Afficher un message d'erreur si la suppression a échoué
        echo "Erreur de suppression de données: " . mysqli_error($conn);
    }
} else {
    // Rediriger vers la page d'affichage des données si l'ID n'est pas présent dans la requête GET
    header("Location: index.php");
    exit;
}
