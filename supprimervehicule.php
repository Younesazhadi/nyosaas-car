<?php
include 'connect.php'; // Inclure le fichier de connexion à la base de données

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Assurez-vous de valider et de sécuriser l'ID avant l'utilisation dans la requête
    $id = mysqli_real_escape_string($con, $id);

    // Requête SQL pour supprimer le véhicule
    $sql = "DELETE FROM vehicule WHERE id='$id'";
    
    if (mysqli_query($con, $sql)) {
        // Rediriger vers la page d'affichage après suppression réussie
        header("Location: vehicule.php");
        exit();
    } else {
        // Gérer les erreurs de suppression
        die("Erreur de suppression : " . mysqli_error($con));
    }
} else {
    // Gérer le cas où l'ID n'est pas défini
    die("ID non défini.");
}
?>
