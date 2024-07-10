<?php
$serverName = getenv('DB_SERVER');
$database = getenv('DB_NAME');
$username = getenv('DB_USER');
$password = getenv('DB_PASS');

try {
    $conn = new PDO("sqlsrv:server=$serverName;Database=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connexion réussie!";
} catch (PDOException $e) {
    echo "Erreur de connexion: " . $e->getMessage();
}
?>
