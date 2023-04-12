<?php
include "../../includes/config.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM project WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        header("Location: ../project.php?message=success");
        exit;
    } else {
        echo "Erreur de suppression de données: " . mysqli_error($conn);
    }
} else {
    header("Location: index.php");
    exit;
}
