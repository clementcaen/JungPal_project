<?php
include("bdd.php");

$party = $_POST['party'];
$garden = $_POST['garden'];
$cleaning = $_POST['cleaning'];
$rooms = $_POST['rooms'];
$price = $_POST['price'];
$size = $_POST['size'];
$internet = $_POST['internet'];
$deposit = $_POST['deposit'];
$campus_time = $_POST['campus-time'];

$stmt = $conn->prepare("INSERT INTO ads (party, garden, cleaning, rooms, price, size, internet, deposit, campus_time) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssidsssi", $party, $garden, $cleaning, $rooms, $price, $size, $internet, $deposit, $campus_time);

if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
