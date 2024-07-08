<?php
header('Content-Type: application/json');
include("bdd.php");

try {
    $stmt = $conn->prepare("SELECT * FROM ads"); // Assuming you have a 'visible' column to show only active ads
    $stmt->execute();
    $result = $stmt->get_result();
    $ads = $result->fetch_all(MYSQLI_ASSOC);

    echo json_encode(['success' => true, 'ads' => $ads]);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Error fetching ads: ' . $e->getMessage()]);
}

$conn->close();
?>
