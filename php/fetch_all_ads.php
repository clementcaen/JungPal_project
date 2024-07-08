<?php
// Display all PHP errors (for development purposes only)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("bdd.php");

$query = "SELECT id, rooms, price, size, deposit, internet, campus_time, party, garden, cleaning FROM ads";
$result = $conn->query($query);

$ads = [];
while ($row = $result->fetch_assoc()) {
    $ads[] = $row;
}

header('Content-Type: application/json');
echo json_encode([
    'success' => true,
    'ads' => $ads
]);

$conn->close();
?>
