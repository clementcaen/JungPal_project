<?php

include("bdd.php");

header('Content-Type: application/json'); // Définir l'en-tête de la réponse comme JSON

$response = array(); // Initialiser le tableau de réponse

if (isset($_POST['email']) && isset($_POST['password'])) {
    // Récupération des données du formulaire
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Requête SQL pour vérifier les informations de connexion
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // L'utilisateur est authentifié avec succès
        $row = $result->fetch_assoc();
        $nom_utilisateur = $row['name'];

        // Démarrer la session et stocker les informations de l'utilisateur
        session_start();
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['user_name'] = $nom_utilisateur;

        $response = array("success" => true, "message" => "Bienvenue, " . $nom_utilisateur);
    } else {
        // Les informations de connexion sont incorrectes
        $response = array("success" => false, "message" => "Identifiants incorrects. Veuillez réessayer.");
    }
} else {
    // Les données du formulaire ne sont pas complètes
    $response = array("success" => false, "message" => "Veuillez fournir une adresse email et un mot de passe.");
}

// Fermer la connexion à la base de données
$conn->close();

// Envoyer la réponse JSON au client
echo json_encode($response);
?>
