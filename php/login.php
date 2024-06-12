<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

// Connexion à la base de données (assurez-vous d'adapter ces informations à votre configuration)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jungpal";

// Création de la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

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
