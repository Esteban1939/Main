<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Connexion à la base de données
    $conn = new mysqli("localhost", "root", "RTX3090Ti2005$$", "ma_base_de_donnees");

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Requête pour insérer le message dans la base de données
    $sql = "INSERT INTO contacts (nom, email, message) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Vérifier si la préparation de la requête a réussi
    if ($stmt === false) {
        die("Erreur de préparation de la requête : " . $conn->error);
    }

    // Lier les paramètres et exécuter la requête
    $stmt->bind_param("sss", $nom, $email, $message);
    if ($stmt->execute()) {
        // Message enregistré, redirection vers une page de confirmation
        header("Location: thank_you.html");
        exit(); // Assurez-vous d'arrêter le script après la redirection
    } else {
        // Afficher un message d'erreur
        echo "Erreur lors de l'envoi du message : " . $stmt->error;
    }

    $stmt->close(); // Fermer la déclaration préparée
    $conn->close(); // Fermer la connexion
}
?>