<?php
session_start();

// Connexion à la BDD
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "inscriptions";

// connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifie la connexion
if ($conn->connect_error) {
    die("La connexion a échoué: " . $conn->connect_error);
}

// données du formulaire d'inscription
$user = $_POST['username'];
$email = $_POST['email'];
$pass = $_POST['password'];
$gender = $_POST['gender'];
$country = $_POST['country'];

// Hache du mot de passe
$hashed_password = password_hash($pass, PASSWORD_DEFAULT);

// Prépare / exécute la requête SQL 
$sql = "INSERT INTO users (username, email, password, gender, country) VALUES ('$user', '$email', '$hashed_password', '$gender', '$country')";

if ($conn->query($sql) === TRUE) {
    // Démarrer la session pour l'utilisateur
    $_SESSION['userid'] = $conn->insert_id; // Récupère l'ID inséré
    $_SESSION['username'] = $user;
    $_SESSION['email'] = $email;
    $_SESSION['gender'] = $gender;
    $_SESSION['country'] = $country;
    $_SESSION['loggedin'] = true;

    // Redirige l'utilisateur vers la page de gestion de compte
    header("Location: signin/account.php");
    exit();
} else {
    echo "Erreur: " . $sql . "<br>" . $conn->error;
}

// Ferme la connexion
$conn->close();
?>
