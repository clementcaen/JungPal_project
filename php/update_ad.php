<?php
header('Content-Type: application/json');
include("bdd.php");

$ad_id = isset($_POST['ad_id']) ? $_POST['ad_id'] : null;
$party = $_POST['party'];
$garden = $_POST['garden'];
$cleaning = $_POST['cleaning'];
$rooms = $_POST['rooms'];
$price = $_POST['price'];
$size = $_POST['size'];
$internet = $_POST['internet'];
$deposit = $_POST['deposit'];
$campus_time = $_POST['campus-time'];

if ($ad_id) {
    // Update existing ad
    $stmt = $conn->prepare("UPDATE ads SET party=?, garden=?, cleaning=?, rooms=?, price=?, size=?, internet=?, deposit=?, campus_time=? WHERE id=?");
    $stmt->bind_param("sssidsssii", $party, $garden, $cleaning, $rooms, $price, $size, $internet, $deposit, $campus_time, $ad_id);
    $success = $stmt->execute();
    $message = $success ? "Ad updated successfully" : "Error updating ad: " . $stmt->error;
    
    $stmt->close();
    $conn->close();

    // Prepare JSON response
    $response = [
        'success' => $success,
        'message' => $message,
        'ad_id' => $ad_id
    ];

    echo json_encode($response);
} else {
    // Handle case where ad_id is not set
    echo json_encode([
        'success' => false,
        'message' => 'Invalid ad ID'
    ]);
}
?>
