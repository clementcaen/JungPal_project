<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

include("bdd.php");

// Récupération des données du formulaire
$email = $_POST['email'];
$mot_de_passe = $_POST['password'];

// Requête SQL pour vérifier les informations de connexion
$sql = "SELECT * FROM users WHERE email='$email' AND password='$mot_de_passe'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // L'utilisateur est authentifié avec succès
    $row = $result->fetch_assoc();
    $nom_utilisateur = $row['surname'];
    $response = array("success" => true, "message" => "Bienvenue, " . $nom_utilisateur);
} else {
    // Les informations de connexion sont incorrectes
    $response = array("success" => false, "message" => "Identifiants incorrects. Veuillez réessayer.");
}

// Fermer la connexion à la base de données
$conn->close();

echo json_encode($response);
?>
