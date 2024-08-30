<?php
require_once'connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nyosaas</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/style1.css">
</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                            <img src="assets/imgs/logo.png"  style="width: 24px; height: 24px;">
                        </span>
                        <span class="title" >Nyosaas</span>
                    </a>
                </li>

                <li>
                    <a href="#"onclick="redirectToaccueil()">
                        <span class="icon">
                            <ion-icon name="home" ></ion-icon>
                        </span>
                        <span class="title" >Accueil</span>
                    </a>
                </li>

                <script>
function redirectToaccueil() {
    window.location.href = "index.php"; }
</script>
                

                <li>
                    <a href="#" onclick="redirectTovehicule()">
                        <span class="icon">
                            <ion-icon name="car" ></ion-icon>
                        </span>
                        <span class="title">Véhicules</span>
                    </a>
                </li>
                
                <script>
function redirectTovehicule() {
    window.location.href = "vehicule.php"; }
</script>

            


                <li>
                    <a href="#"onclick="redirectToclients()">
                        <span class="icon" >
                            <ion-icon name="person"></ion-icon>
                        </span>
                        <span class="title">Clients</span>
                    </a>
                </li>
                <script>
function redirectToclients() {
    window.location.href = "client.php"; }
</script>
                <li>
                    <a href="#"onclick="redirectToreservations()">
                        <span class="icon">
                            <ion-icon name="calendar" ></ion-icon>
                        </span>
                        <span class="title">Réservations</span>
                    </a>
                </li>
                <script>
function redirectToreservations() {
    window.location.href = "reservation.php"; }
</script>
                <li>
                    <a href="#"onclick="redirectTocontrats()">
                        <span class="icon">
                            <ion-icon name="document-text" ></ion-icon>
                        </span>
                        <span class="title">Contrats</span>
                    </a>
                </li>
                <script>
function redirectTocontrats() {
    window.location.href = "contrat.php"; }
</script>
                

                <li>
                    <a href="#"onclick="redirectTostatistiques()">
                        <span class="icon">
                            <ion-icon name="bar-chart" ></ion-icon>
                        </span>
                        <span class="title">Statistiques</span>
                    </a>
                </li>
                <script>
function redirectTostatistiques() {
    window.location.href = "statistique.php"; }
</script>
                <li>
                    <a href="#" onclick="redirectTologin()">
                        <span class="icon">
                            <ion-icon name="log-out" ></ion-icon>
                        </span>
                        <span class="title">Se déconnecter</span>
                    </a>
                </li>
                <script>
function redirectTologin() {
    window.location.href = "login.php"; }
</script>
            </ul>
        </div>


        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="list"></ion-icon>
                </div>

                <div class="search">
    <form method="GET" action="vehicule.php" id="searchForm">
        <label>
            <input type="text" name="search" placeholder="chercher par disponibilité/nom/matricule" value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
            <button type="submit" style="background: none; border: none; cursor: pointer;">
                <ion-icon name="search-outline"></ion-icon>
            </button>
        </label>
    </form>
</div>


                <div class="user">
                    <img src="assets/imgs/customer01.jpg" alt="">
                </div>
            </div>



<?php
$selectedValue = "5"; // Valeur par défaut
$search = isset($_GET['search']) ? $_GET['search'] : '';

// Récupération de la valeur de table_size depuis le formulaire ou l'URL
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['table_size'])) {
    $selectedValue = $_POST['table_size'];
} elseif (isset($_GET['table_size'])) {
    $selectedValue = $_GET['table_size'];
}

// Requête de recherche
$searchQuery = '';
if (!empty($search)) {
    $search = mysqli_real_escape_string($con, $search);
    $searchQuery = "WHERE model LIKE '%$search%' OR matricule LIKE '%$search%' OR disponibilite LIKE '%$search%'";
}

// Récupération du nombre total de lignes
$record = mysqli_query($con, "SELECT * FROM vehicule $searchQuery");
$numrow = mysqli_num_rows($record);

// Calcul du nombre de pages
$pages = ceil($numrow / $selectedValue);

// Récupération de la valeur de la page actuelle
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($current_page - 1) * $selectedValue;

// Sélection des enregistrements pour la page actuelle
$select = mysqli_query($con, "SELECT * FROM vehicule $searchQuery LIMIT $start, $selectedValue");
?>


<button type="button" id="addButton" onclick="window.location.href='formvehicule.php';">Ajouter véhicule</button>

<form method="POST" action="vehicule.php" id="form">
    <div class="entries">
        Afficher 
        <select name="table_size" id="table_size" onchange="document.getElementById('form').submit();">
            <option value="5" <?php if ($selectedValue == "5") echo 'selected="selected"'; ?>>5</option>
            <option value="10" <?php if ($selectedValue == "10") echo 'selected="selected"'; ?>>10</option>
            <option value="20" <?php if ($selectedValue == "20") echo 'selected="selected"'; ?>>20</option>
            <option value="50" <?php if ($selectedValue == "50") echo 'selected="selected"'; ?>>50</option>
            <option value="100" <?php if ($selectedValue == "100") echo 'selected="selected"'; ?>>100</option>
        </select>
    </div>
</form>

<div class="table-container">
    <div class="table-wrapper">
        <table class="styled-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Matricule</th>
                    <th>Disponibilite</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <h1 style="color: #d6d2d2;">Total des voitures : <?= $numrow ?></h1>
                <br></br>
                <?php
$cpt = $start;
foreach ($select as $row) {
    $cpt++;
?>
<tr>
    <td scope="row"><?= $cpt; ?></td>
    <td><?= htmlspecialchars($row['model']); ?></td>
    <td><?= htmlspecialchars($row['matricule']); ?></td>
    <td><?= htmlspecialchars($row['disponibilite']); ?></td>
    <td>
        <button class="action-btn" onclick="openModal('<?= $row['id']; ?>')"><i class="fas fa-eye"></i></button>
        <a href="modificarionvehiculeform.php?id=<?= $row['id']; ?>">
            <button class="action-btn"><i class="fas fa-edit"></i></button>
        </a>
        <!-- Formulaire de suppression avec confirmation -->
        <form action="supprimervehicule.php" method="post" style="display:inline;" onsubmit="return confirmDeletion();">
            <input type="hidden" name="id" value="<?= $row['id']; ?>">
            <button type="submit" class="action-btn delete"><i class="fas fa-trash-alt"></i></button>
        </form>
    </td>
</tr>
<?php
}
?>




            </tbody>
        </table>
    </div>
</div>
<!-- Modal HTML -->
<div id="vehicleModal" class="modal">
    <div class="modal-content">
        <span class="close-btn" onclick="closeModal()">&times;</span>
        <h2>Détails du Véhicule</h2>
        <div id="vehicleDetails">
            <!-- Les détails du véhicule seront affichés ici -->
        </div>
    </div>
</div>


<script>
function confirmDeletion() {
    return confirm("Êtes-vous sûr de vouloir supprimer cet élément ? Cette action est irréversible.");
}

function openModal(vehicleId) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'fetch_vehicle_details.php?id=' + vehicleId, true);
    xhr.onload = function() {
        if (this.status == 200) {
            document.getElementById('vehicleDetails').innerHTML = this.responseText;
            document.getElementById('vehicleModal').style.display = "block";
        }
    };
    xhr.send();
}

function closeModal() {
    document.getElementById('vehicleModal').style.display = "none";
}

// Fermer le modal si l'utilisateur clique en dehors de celui-ci
window.onclick = function(event) {
    if (event.target == document.getElementById('vehicleModal')) {
        closeModal();
    }
}

</script>




<!-- Pagination -->
<div class="pagination-container">
    <div class="pagination">
        <!-- Bouton Précédent avec icône -->
        <?php if ($current_page > 1): ?>
            <a href="?page=<?= $current_page - 1 ?>&table_size=<?= $selectedValue ?>&search=<?= urlencode($search) ?>">
                <button><i class="fas fa-chevron-left"></i></button>
            </a>
        <?php endif; ?>

        <!-- Boutons de pages -->
        <?php for ($i = 1; $i <= $pages; $i++): ?>
            <a href="?page=<?= $i ?>&table_size=<?= $selectedValue ?>&search=<?= urlencode($search) ?>">
                <button class="<?= $current_page == $i ? 'active' : '' ?>"><?= $i ?></button>
            </a>
        <?php endfor; ?>

        <!-- Bouton Suivant avec icône -->
        <?php if ($current_page < $pages): ?>
            <a href="?page=<?= $current_page + 1 ?>&table_size=<?= $selectedValue ?>&search=<?= urlencode($search) ?>">
                <button><i class="fas fa-chevron-right"></i></button>
            </a>
        <?php endif; ?>
    </div>
</div>


    <!-- =========== Scripts =========  -->
    <script src="assets/js/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>