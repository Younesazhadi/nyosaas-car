<?php
require_once'connect.php'?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nyosaas</title>
    <!-- ======= Styles ====== -->
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
                    <label>
                        <input type="text" placeholder="Search here">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>

                <div class="user">
                    <img src="assets/imgs/customer01.jpg" alt="">
                </div>
            </div>

            <!-- ======================= Cards ================== -->
            <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers">1,504</div>
                        <div class="cardName">Véhicules disponibles</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="checkmark"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">80</div>
                        <div class="cardName">Véhicules loués</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="close"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">284</div>
                        <div class="cardName">Entretiens et règlements</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="construct-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">$7</div>
                        <div class="cardName">Revenus</div>

                        
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cash-outline"></ion-icon>
                    </div>
                </div>
            </div>

            <!-- ================ Order Details List ================= -->
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <?php
                        $urg=false;
                        if(!$urg)
                            {echo "<h2>Liste des véhicules disponibles</h2>";}
                        else
                            {echo "<h2>Entretiens et règlements</h2>";}
                        ?>

                       
                        
<a href="vehicule.php" class="btn">Voir tout</a>
                    </div>
<?php
                    $select = mysqli_query($con, "SELECT * FROM vehicule WHERE disponibilite LIKE '%Disponible%'");
?>
                    <table>
                        <thead>
                            <tr>
                            <th>#</th>
                <th>Nom</th>
                <th>Matricule</th>
                <th>Disponibilite</th>
                            </tr>
                        </thead>

                        <tbody>
            <?php
            $cpt = 1;
            foreach ($select as $row) {
                $cpt++;
            ?>
            <tr>
                <td scope="row"><?= $cpt; ?></td>
                <td><?= $row['model']; ?></td>
                <td><?= $row['matricule']; ?></td>
                <td><?= $row['disponibilite']; ?></td>

            </tr>
            <?php
            } // Fermeture de la boucle foreach
            ?>
        </tbody>
                    </table>
                </div>

                <!-- ================= New Customers ================ -->
                <div class="recentCustomers">
                    <div class="cardHeader">
                        <h2>Recent Customers</h2>
                    </div>

                    <table>
                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="assets/imgs/customer02.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>David <br> <span>Italy</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="assets/imgs/customer01.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>Amit <br> <span>India</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="assets/imgs/customer02.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>David <br> <span>Italy</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="assets/imgs/customer01.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>Amit <br> <span>India</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="assets/imgs/customer02.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>David <br> <span>Italy</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="assets/imgs/customer01.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>Amit <br> <span>India</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="assets/imgs/customer01.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>David <br> <span>Italy</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="assets/imgs/customer02.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>Amit <br> <span>India</span></h4>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- =========== Scripts =========  -->
    <script src="assets/js/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>