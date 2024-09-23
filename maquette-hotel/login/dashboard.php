<?php
session_start();

// Vérifie si l'utilisateur est connecté
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Redirige vers la page de connexion si l'utilisateur n'est pas connecté
    header("Location: signin/index.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord</title>
</head>
<body>
    <h1>Bienvenue, <?php echo $_SESSION['username']; ?> !</h1>
    <p>Vous êtes maintenant connecté.</p>
    <a href="signin/logout.php">Se déconnecter</a>
</body>
</html>
