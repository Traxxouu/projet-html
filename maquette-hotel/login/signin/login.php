<?php
session_start();

// Connexion à la base de données
$servername = "localhost";
$username = "root"; // Par défaut sur WampServer
$password = ""; // Laissez vide si vous n'avez pas défini de mot de passe
$dbname = "inscriptions"; // Remplacez par le nom de votre base de données

// Crée la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifie la connexion
if ($conn->connect_error) {
    die("La connexion a échoué: " . $conn->connect_error);
}

// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifie si les champs email et password sont définis
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $pass = $_POST['password'];

        // Requête SQL pour récupérer l'utilisateur par email
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // L'utilisateur existe, on récupère les informations
            $row = $result->fetch_assoc();

            // Vérifie si le mot de passe est correct
            if (password_verify($pass, $row['password'])) {
                // Mot de passe correct, démarrer la session
                $_SESSION['userid'] = $row['id']; // Sauvegarde l'ID utilisateur dans la session
                $_SESSION['username'] = $row['username'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['gender'] = $row['gender'];
                $_SESSION['country'] = $row['country'];
                $_SESSION['loggedin'] = true;

                // Redirige vers la page de gestion du compte
                header("Location: account.php");
                exit();
            } else {
                // Mot de passe incorrect
                echo "Mot de passe incorrect.";
            }
        } else {
            // Aucun utilisateur trouvé avec cet email
            echo "Aucun utilisateur trouvé avec cet email.";
        }
    } else {
        echo "Veuillez entrer un email et un mot de passe.";
    }
} else {
    echo "Le formulaire n'a pas été soumis.";
}

$conn->close();
?>
