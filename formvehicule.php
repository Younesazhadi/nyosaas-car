<?php
include 'connect.php';

if (isset($_POST['ajouter'])) {
    $id = $_POST['input1'];
    $marque = $_POST['input2'];
    $model = $_POST['input3'];
    $couleur = $_POST['input4'];
    $matricule = $_POST['input5'];
    $assurance = $_POST['input6'];
    $visittec = $_POST['input7'];
    $vidange = $_POST['input8'];
    $chaindis = $_POST['input9'];
    $carburant = $_POST['input10'];
    $prix = $_POST['input11'];
    $categorie = $_POST['input12'];
    $image = $_POST['input13'];
    $km = $_POST['input14'];
    $dispo = $_POST['input15'];

    // Retirer la virgule supplémentaire après 'disponibilite'
    $sql = "INSERT INTO vehicule (id, marque, model, couleur, matricule, assurance, visittechnique, vidange, chainededistribution, carburant, prix, categorie, image, kilometrage, disponibilite) 
            VALUES ('$id', '$marque', '$model', '$couleur', '$matricule', '$assurance', '$visittec', '$vidange', '$chaindis', '$carburant', '$prix', '$categorie', '$image', '$km', '$dispo')";

    $res = mysqli_query($con, $sql);
    if (!$res) {
        die(mysqli_error($con));
    } else {
        header("Location: vehicule.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Véhicule</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #1d1b1b;
            padding: 20px;
        }
        .form-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-container h2 {
            margin-bottom: 20px;
            text-align: center;
            color: #333;
        }
        .form-group {
            margin-bottom: 15px;
            display: flex;
            flex-direction: column;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-size: 14px;
            color: #555;
        }
        .form-group input[type="text"] {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 15px;
        }
        @media (max-width: 600px) {
            .form-container {
                padding: 10px;
            }
            .form-group label {
                font-size: 12px;
            }
            .form-group input[type="text"] {
                font-size: 12px;
                padding: 8px;
            }
            .submit-btn, .cancel-btn {
                font-size: 14px;
                padding: 8px;
            }
            .form-grid {
                grid-template-columns: 1fr;
            }
        }
        .submit-btn, .cancel-btn {
            display: block;
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 10px;
        }
        .submit-btn {
            background-color: #1d1b1b;
            color: #fff;
        }
        .submit-btn:hover {
            background-color: #2e2c2c;
        }
        .cancel-btn {
            background-color: #d9534f;
            color: #fff;
        }
        .cancel-btn:hover {
            background-color: #c9302c;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Ajouter Véhicule</h2>
        <form action="#" method="post">
        
            <div class="form-grid">
            
                <div class="form-group">
                    <label for="input2">Marque :</label>
                    <input type="text" value="<?= htmlspecialchars($vehicle['marque'] ?? '') ?>" id="input2" name="input2" required>
                </div>
                <div class="form-group">
                    <label for="input3">Modèle :</label>
                    <input type="text" value="<?= htmlspecialchars($vehicle['model'] ?? '') ?>" id="input3" name="input3" required>
                </div>
                <div class="form-group">
                    <label for="input4">Couleur :</label>
                    <input type="color" value="<?= htmlspecialchars($vehicle['couleur'] ?? '#ffffff') ?>" id="input4" name="input4">
                </div>

                <div class="form-group">
                    <label for="input5">Matricule :</label>
                    <input type="text" value="<?= htmlspecialchars($vehicle['matricule'] ?? '') ?>" id="input5" name="input5" required>
                </div>
                <div class="form-group">
    <label for="input6">Assurance :</label>
    <input type="date" value="<?= htmlspecialchars($vehicle['assurance'] ?? '') ?>" id="input6" name="input6" required>
</div>

<div class="form-group">
    <label for="input7">Visite Technique :</label>
    <input type="date" value="<?= htmlspecialchars($vehicle['visittechnique'] ?? '') ?>" id="input7" name="input7" required>
</div>
<div class="form-group">
    <label for="input8">Vidange :</label>
    <input type="date" value="<?= htmlspecialchars($vehicle['vidange'] ?? '') ?>" id="input8" name="input8" required>
</div>
<div class="form-group">
    <label for="input9">Chaine de Distribution :</label>
    <input type="date" value="<?= htmlspecialchars($vehicle['chainededistribution'] ?? '') ?>" id="input9" name="input9" required>
</div>
                <div class="form-group">
                    <label for="input10">Carburant :</label>
                    <input type="text" value="<?= htmlspecialchars($vehicle['carburant'] ?? '') ?>" id="input10" name="input10" required>
                </div>
                <div class="form-group">
                    <label for="input11">Prix :</label>
                    <input type="text" value="<?= htmlspecialchars($vehicle['prix'] ?? '') ?>" id="input11" name="input11" required>
                </div>
                <div class="form-group">
                    <label for="input12">Catégorie :</label>
                    <input type="text" value="<?= htmlspecialchars($vehicle['categorie'] ?? '') ?>" id="input12" name="input12" >
                </div>
                <div class="form-group">
    <label for="input13">Image :</label>
    <input type="file" id="input13" name="input13" accept="image/*" required>
</div>
                <div class="form-group">
                    <label for="input14">Kilométrage :</label>
                    <input type="text" value="<?= htmlspecialchars($vehicle['kilometrage'] ?? '') ?>" id="input14" name="input14" required>
                </div>
                <div class="form-group">
                    <label for="input15">Disponibilité :</label>
                    <input type="text" value="<?= htmlspecialchars($vehicle['disponibilite'] ?? '') ?>" id="input15" name="input15" required>
                </div>
            </div>
            <button type="submit" name="ajouter" class="submit-btn">Valider</button>
            <button type="button" class="cancel-btn" onclick="window.location.href='vehicule.php';">Annuler</button>
        </form>
    </div>
</body>
</html>
