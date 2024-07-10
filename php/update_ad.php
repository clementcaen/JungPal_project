<?php
include("bdd.php");

// Initialize the response variables
$success = false;
$message = '';

$ad_id = isset($_POST['ad_id']) ? $_POST['ad_id'] : null;
$user_id = $_POST['user_id'];
$party = $_POST['party'];
$garden = $_POST['garden'];
$cleaning = $_POST['cleaning'];
$rooms = $_POST['rooms'];
$price = $_POST['price'];
$size = $_POST['size'];
$internet = $_POST['internet'];
$deposit = $_POST['deposit'];
$campus_time = $_POST['campus_time'];

if ($user_id) {
    // Update existing ad
    $stmt = $conn->prepare("UPDATE ads SET party=?, garden=?, cleaning=?, rooms=?, price=?, size=?, internet=?, deposit=?, campus_time=? WHERE user_id=?");
    if ($stmt) {
        $stmt->bind_param("sssssssssi", $party, $garden, $cleaning, $rooms, $price, $size, $internet, $deposit, $campus_time, $user_id);
        $success = $stmt->execute();
        $message = $success ? "Ad updated successfully" : "Error updating ad: " . $stmt->error;
        $stmt->close();
    } else {
        $message = "Failed to prepare the SQL statement.";
    }
} else {
    $message = "Ad ID is missing.";
}

$conn->close();

echo json_encode([
    'success' => $success,
    'message' => $message
]);
?>
