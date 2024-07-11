<?php
ini_set('display_errors','on');
error_reporting(E_ALL);

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

// Connexion à la base de données (assurez-vous d'adapter ces informations à votre configuration)
$servername = "ddd.mysql.database.azure.com";
$username = "jungproject";
$password = "2T5$9R8$cQSCrL7m";
$dbname = "jungpal";

// Création de la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

?>
