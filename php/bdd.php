<?php
// PHP Data Objects(PDO) Sample Code:
try {
    $conn = new PDO("sqlsrv:server = tcp:elderly.database.windows.net,1433; Database = elderly-database", "elderly", "Maxime3869");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

// SQL Server Extension Sample Code:
$connectionInfo = array("UID" => "elderly", "pwd" => "Maxime3869", "Database" => "elderly-database", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:elderly.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);
?>