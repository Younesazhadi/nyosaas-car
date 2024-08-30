<?php
$errorMessage = ''; // Variable pour stocker le message d'erreur

// Vérifiez si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['login'])) {
        if ($_POST['username'] == "yns" && $_POST['password'] == "1234") {
            header("Location: index.php");
            exit(); // Assure que le script s'arrête après la redirection
        } else {
            $errorMessage = 'Nom d\'utilisateur ou mot de passe incorrect.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/login.css"/>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  </head>
  <body>
    <div class="wrapper">
      <div class="title"><span>Nyosaas</span></div>
      <form method="post" action="">
        <div class="row">
          <i class="fas fa-user"></i>
          <input type="text" name="username" placeholder="username" required />
        </div>
        <div class="row">
          <i class="fas fa-lock"></i>
          <input type="password" name="password" placeholder="Password" required />
        </div>

        <!-- Conteneur pour le message d'erreur -->
        <?php if (!empty($errorMessage)) : ?>
          <div class="error-message">
            <?php echo $errorMessage; ?>
          </div>
        <?php endif; ?>

        <div class="row button">
          <input type="submit" value="Se connecter" name="login" />
        </div>
      </form>
    </div>
  </body>
</html>
