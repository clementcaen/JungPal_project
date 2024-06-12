<?php
include("bdd.php");

//remplissage de toutes les variables de création de compte
$name = $_POST['name'];
$surname = $_POST['surname'];
$gender = $_POST['Gdr'];
$dob = $_POST['birth'];
$address = $_POST['Addr'];
$city = $_POST['Cty'];
$postal_code = $_POST['pc'];
$email = $_POST['email'];
$password = $_POST['password'];

// Requête SQL pour vérifier les informations de connexion
$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
        // Le compte existe déjà
        $response = array("success" => true, "message" => "Le compte existe déjà.");
} else {
        // L'utilisateur est authentifié avec succès
        // Requête SQL pour vérifier les informations de connexion
        $sql = "INSERT INTO users(name, surname, gender, dob, address, city, postal_code, email, password) VALUES ('$name', '$surname', '$gender', '$dob', '$address', '$city', '$postal_code', '$email', '$password')";
        $conn->query($sql);
        $response = array("success" => false, "message" => "Compte créer avec succès");

}

// Fermer la connexion à la base de données
$conn->close();

echo json_encode($response);
?>
