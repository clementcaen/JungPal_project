<?php
ini_set('display_errors','on');
error_reporting(E_ALL);

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

// // Connexion à la base de données (assurez-vous d'adapter ces informations à votre configuration)
// $servername = "tcp:jung-project.database.windows.net,1433";
// $username = "jung-project";
// $password = "19e82fe8-2cd2-47a0-917c-cd16ebf5b389";
// $dbname = "jung-project";

// // Création de la connexion
// $conn = new mysqli($servername, $username, $password, $dbname);

// // Vérifier la connexion
// if ($conn->connect_error) {
//     die("La connexion a échoué : " . $conn->connect_error);
// }
    
try {
    $conn = new PDO("sqlsrv:server = tcp:jung-project.database.windows.net,1433; Database = jung-project", "jung-project", "19e82fe8-2cd2-47a0-917c-cd16ebf5b389");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

// SQL Server Extension Sample Code:
$connectionInfo = array("UID" => "jung-project", "pwd" => "{your_password_here}", "Database" => "jung-project", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:jung-project.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);

?>
