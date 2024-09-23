<?php
session_start();

// Vérifie si l'utilisateur est connecté
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login/index.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Compte</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <div class="form-container">
        <div class="form-card">
            <h2>Mon Compte</h2>
            <p><strong>Nom d'utilisateur:</strong> <?php echo $_SESSION['username']; ?></p>
            <p><strong>Email:</strong> <?php echo $_SESSION['email']; ?></p>
            <p><strong>Genre:</strong> <?php echo $_SESSION['gender'] == 'male' ? 'Homme' : 'Femme'; ?></p>
            <p><strong>Pays:</strong> <?php echo $_SESSION['country']; ?></p>
            <a href="logout.php">Se déconnecter</a>
        </div>
    </div>
</body>
</html>
