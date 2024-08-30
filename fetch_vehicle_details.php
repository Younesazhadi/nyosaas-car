<?php
include 'connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = mysqli_query($con, "SELECT * FROM vehicule WHERE id='$id'");
    $vehicle = mysqli_fetch_assoc($result);

    if ($vehicle) {
        echo '<div class="detail-item"><label>Modèle:</label><p>' . htmlspecialchars($vehicle['model']) . '</p></div>';
        echo '<div class="detail-item"><label>Matricule:</label><p>' . htmlspecialchars($vehicle['matricule']) . '</p></div>';
        echo '<div class="detail-item"><label>Disponibilité:</label><p>' . htmlspecialchars($vehicle['disponibilite']) . '</p></div>';
        echo '<div class="detail-item"><label>Marque:</label><p>' . htmlspecialchars($vehicle['marque']) . '</p></div>';
        echo '<div class="detail-item"><label>Couleur:</label><p>'  . '</p><span class="color-preview" style="background-color:' . htmlspecialchars($vehicle['couleur']) . ';"></span></div>';
        echo '<div class="detail-item"><label>Assurance:</label><p>' . htmlspecialchars($vehicle['assurance']) . '</p></div>';
        echo '<div class="detail-item"><label>Visite Technique:</label><p>' . htmlspecialchars($vehicle['visittechnique']) . '</p></div>';
        echo '<div class="detail-item"><label>Vidange:</label><p>' . htmlspecialchars($vehicle['vidange']) . '</p></div>';
        echo '<div class="detail-item"><label>Chaine de Distribution:</label><p>' . htmlspecialchars($vehicle['chainededistribution']) . '</p></div>';
        echo '<div class="detail-item"><label>Carburant:</label><p>' . htmlspecialchars($vehicle['carburant']) . '</p></div>';
        echo '<div class="detail-item"><label>Prix:</label><p>' . htmlspecialchars($vehicle['prix']) . '</p></div>';
        echo '<div class="detail-item"><label>Catégorie:</label><p>' . htmlspecialchars($vehicle['categorie']) . '</p></div>';
        echo '<div class="detail-item"><label>Image:</label><p><img src="' . htmlspecialchars($vehicle['image']) . '"  style="max-width: 100%; height: auto;"></p></div>';
        echo '<div class="detail-item"><label>Kilométrage:</label><p>' . htmlspecialchars($vehicle['kilometrage']) . '</p></div>';
    } else {
        echo '<p>Véhicule non trouvé.</p>';
    }
}
?>
